<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    //
    public function userlists() {
        $findAllUsers = User::where('userrole', '=', 'user')->orderBy('id', 'desc')->get(['password', 'avatar', 'email', 'gender', 'id', 'name', 'phone', 'status']);
        return response()->json(['status' => true, 'data' => $findAllUsers], 200);
    }
    public function usercreate(Request $req) {
        $maxSize = 1024 * 2 * 1000;
        $file = $req->file('photo');
        $findMail = User::where('email', '=', $req->input('email'))->first('email');
        $findPhone = User::where('phone', '=', $req->input('phone'))->first('phone');
        if($req->hasFile('photo')) {
            $fileFormat = date('Y-m-dh-i-s') . "." . $file->getClientOriginalExtension();
            if($file->getSize() < $maxSize) {
                $moveFile = $file->move('uploads/', $fileFormat);
                if($moveFile) {
                    $data = [
                        'name' => $req->input('name'),
                        'email' => $req->input('email'),
                        'password' => Hash::make($req->input('password')),
                        'phone' => $req->input('phone'),
                        'gender' => $req->input('gender'),
                        'avatar' => "/uploads/" . $fileFormat
                    ];
                    if($findMail === null && $findPhone === null) {
                        User::create($data);
                        return response()->json(['status' => true, 'message' => 'Your create record is successfully'], 200);
                    } else {
                        return response()->json(['status' => false, 'message' => 'Your current mail and password are already exist in our records'], 200);
                    }
                    
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Your upload file size is too larges.'], 200);
            }
        } else {
            $data = [
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'password' =>  Hash::make($req->input('password')),
                'phone' => $req->input('phone'),
                'gender' => $req->input('gender'),
            ];
            if($findMail === null && $findPhone === null) {
                User::create($data);
                return response()->json(['status' => true, 'message' => 'Your create record is successfully'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Your current mail and password are already exist in our records'], 200);
            }
        }
    }

    public function useredit($id, Request $req) {
        $maxSize = 1024 * 2 * 1000;
        $file = $req->file('photo');
        $findMail = User::where('id', '!=', $id)->where('email', '=', $req->input('email'))->first('email');
        $findPhone = User::where('id', '!=', $id)->where('phone', '=', $req->input('phone'))->first('phone');
        if($req->hasFile('photo')) {
            $fileFormat = date('Y-m-dh-i-s') . "." . $file->getClientOriginalExtension();
            if($file->getSize() < $maxSize) {
                $moveFile = $file->move('uploads/', $fileFormat);
                $findRecord = User::find($id);
                // remove current Image
                $removeFile = ltrim($findRecord->avatar, "/");
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
                if($moveFile) {
                    $data = [
                        'name' => $req->input('name'),
                        'email' => $req->input('email'),
                        'password' => Hash::make($req->input('password')),
                        'phone' => $req->input('phone'),
                        'gender' => $req->input('gender'),
                        'avatar' => "/uploads/" . $fileFormat
                    ];
                    if($findMail === null && $findPhone === null) {
                        User::find($id)->update($data);
                        return response()->json(['status' => true, 'message' => 'Your update record is successfully'], 200);
                    } else {
                        return response()->json(['status' => false, 'message' => 'Your current mail and password are already exist in our records'], 200);
                    }
                    
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Your upload file size is too larges.'], 200);
            }
        } else {
            $data = [
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'password' =>  Hash::make($req->input('password')),
                'phone' => $req->input('phone'),
                'gender' => $req->input('gender'),
            ];
            if($findMail === null && $findPhone === null) {
                User::find($id)->update($data);
                return response()->json(['status' => true, 'message' => 'Your updated record is successfully'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Your current mail and password are already exist in our records'], 200);
            }
        }  
    }

    public function currentuser($id) {
        $findUser = User::where('id',$id)->first();
        return response()->json(['status' => true, 'data' => $findUser], 200);
    }

    public function deleteItem(Request $req, $id) {
        $findOne = User::find($id);
        // remove current Image
        if($req->isMethod('post')) {
            $deleteOne = $findOne->delete();
            $removeFile = ltrim($findOne->avatar, "/");
            if(file_exists($removeFile)) {
                unlink($removeFile);
            }
            if($deleteOne) {
                return response()->json(['status' => true, 'message' => 'Your item record delete successfully.'], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Your item record cannot delete?. Something went wrong'], 200);
            }

        }
        
    }
    public function accountstatus($id) {
        $findOne = User::find($id);
        $updateOne = $findOne->update([
            'status' => ($findOne->status == 0) ? 1 : 0
        ]);
    }
    public function filterresults(Request $req) {
        $searchBy = $req->input('filterrsults') ?? '';
        $totalPagi = $req->input('totalPagi') ?? '';
        return response()->json(['status' => true, 'data' => $req->input('filterrsults')], 200);
        $findRecords = User::where('userrole', '!=', 'admin')->where('name', 'like', '%' . $searchBy . '%')->get();//(1);

        return response()->json(['status' => true, 'data' => $findRecords], 200);
    }
}
