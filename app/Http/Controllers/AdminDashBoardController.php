<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MarkCategories as Category;
use App\Models\ProductLists;
use App\Models\SecondCategory;
use App\Models\ThirdCategory;
use App\Models\CouponCards;
use Auth;
use App\Models\ProductItemImage;
class AdminDashBoardController extends Controller
{
    //
    public function __construct(Request $req) {
        $this->request = $req;
    }
    public function admindashboard_mm() {
        $data = [];
        $data['page_title'] = " | Dashboard";
        $data['current_page'] = "dashboard";
        return view('admin.dashboard.index', $data);
    }
    public function adminuserslist_mm() {
        $data = [];
        $data['page_title'] = " | User lists";
        $data['current_page'] = "users";
        if(Auth::user()->userrole != 'admin') {
            return redirect()->route('admindashboard_mm')->with('failed', "Sorry, You don't access admin control");
        }
        return view("admin.userlist.index", $data);        
    }
    public function adminusernew_mm() {
        $data = [];
        $data['page_title'] = " | User Create";
        $data['current_page'] = "users";
        return view("admin.userlist.create", $data);
    }
    public function adminuseredit_mm() {
        $data = [];
        $data['page_title'] = " | User Edit";
        $data['current_page'] = "users";
        return view("admin.userlist.edit", $data);        
    }
    public function adsbanner() {
        $data = [];
        $data['page_title'] = " | Ads Banner";
        $data['current_page'] = "adsbanner";
        return view('admin.adsbanner.index', $data);
    }
    public function adsbannernew() {
        $data = [];
        $data['page_title'] = " | Ads Banner Create";
        $data['current_page'] = "adsbanner";
        return view('admin.adsbanner.create', $data);        
    }

    public function couponcards() {
        $data = [];
        $data['page_title'] = " | Coupon Cards";
        $data['current_page'] = "couponcards";
        $data['findall'] = CouponCards::get();
        return view('admin.couponcards.index', $data);      
    }
    public function couponcardsnew(Request $req) {
        $data = [];
        $data['current_page'] = "couponcards";
        $data['page_title'] = " | Coupon Cards Create";
        if($req->isMethod('post')) {
            $dataNew = [
                'coupon_code' => $req->input('coupon_code'),
                'coupon_price' => $req->input('coupon_price'),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $createOne = CouponCards::create($dataNew);
            if($createOne) {
                return redirect()->route('couponcards')->with('success', 'Your created record successfully');
            } else {
                return redirect()->route('couponcardsnew')->with('failed', 'Your created record successfully');
            }
        }
        return view('admin.couponcards.create', $data);          
    }

    public function couponcardsedit(Request $req, $id) {
        $data = [];
        $data['id'] = $id;
        $data['current_page'] = "couponcards";
        $data['page_title'] = " | Coupon Cards Edit";
        if($req->isMethod('post')) {
            $updateData = [
                'coupon_code' => $req->input('coupon_code'),
                'coupon_price' => $req->input('coupon_price'),
            ];

            $updateOne = CouponCards::where('id', $id)->update($updateData);
            if($updateOne) {
                return redirect()->route('couponcards')->with('success', 'Your created record successfully');
            } else {
                return redirect()->route('couponcardsnew')->with('failed', 'Your created record failed');
            }
        }
        $data['coupon_code'] = CouponCards::find($id)->coupon_code;
        $data['coupon_price'] = CouponCards::find($id)->coupon_price;
        return view('admin.couponcards.edit', $data);           
    }
    public function couponcardsdelete(Request $req, $id) {
        $findOne = CouponCards::find($id);
        $deleteRecord = $findOne->delete();
        if($deleteRecord) {
            return redirect()->route('couponcards')->with('success', 'Your delete record successfully');
        } else {
            return redirect()->route('couponcardsnew')->with('failed', 'Your created record failed');
        }
    }
    public function productcategory() {
        $data = [];
        $data['page_title'] = " | Categories";
        $data['current_page'] = "category";
        $findAll = Category::orderBy('id', 'desc')->get();
        $data['findall'] = $findAll;
        return view('admin.category.index', $data);           
    }
    public function productseccategory() {
        $data = [];
        $data['current_page'] = "secondcategory";
        $data['page_title'] = " | Second Categories";
        $findAll = SecondCategory::orderBy('id', 'desc')->get();
        $query = [];
        foreach($findAll as $findKey => $findVal) {
            $query[$findKey] = [
                'id' => $findVal->id,
                'lang_format' => $findVal->lang_format,
                'category_id' => (Category::count() > 0) ? Category::find($findVal->category_id)->category_name : "",
                'sec_category_name' => $findVal->sec_category_name,
            ];
        }
        $data['findall'] = $query;
        return view('admin.seccategory.index', $data);        
    }

    public function productcategorynew() {
        $data = [];
        $data['page_title'] = " | Categories";
        $data['current_page'] = "category";
        if($this->request->isMethod('post')) {
            $createData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_name' => $this->request->input('category_name'), 
                'category_des' => $this->request->input('category_des')
            ];
            $createOne = Category::insert($createData);
            if($createOne) {
                return redirect()->route('productcategory')->with('success', 'Your created item successfully');
            } else {
                return redirect()->route('productcategorynew')->with('success', 'Sorry, Something went wrong.');
            }
        }
        return view('admin.category.create', $data);           
    }   
    public function productseccategorynew() {
        $data['page_title'] = " | Second Category";
        $data['current_page'] = "secondcategory";
        $data['first_cate'] = Category::get();
        if($this->request->isMethod('post')) {
            $createData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_id' => $this->request->input('category_id'), 
                'sec_category_name' => $this->request->input('sec_category_name')
            ];
            $createOne = SecondCategory::insert($createData);
            if($createOne) {
                return redirect()->route('productseccategory')->with('success', 'Your created item successfully');
            } else {
                return redirect()->route('productseccategorynew')->with('success', 'Sorry, Something went wrong.');
            }
        }
        return view('admin.seccategory.create', $data);            
    }

    public function productcategoryedit($id) {
        $data = [];
        $data['page_title'] = " | Categories";
        $data['current_page'] = "category";
        $data['id'] = $id;
        $findRecord = Category::find($id);
        if($this->request->isMethod('post')) {
            $updateData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_name' => $this->request->input('category_name'), 
                'category_des' => $this->request->input('category_des')
            ];
            $updateOne = Category::where('id', $id)->update($updateData);
            if($updateOne) {
                return redirect()->route('productcategory')->with('success', 'Your update item successfully');
            } else {
                return redirect()->route('productcategorynew')->with('fail', 'Sorry, Something went wrong.');
            }
        }

        $data['lang_format'] = $findRecord->lang_format;
        $data['category_name'] = $findRecord->category_name;
        $data['category_des'] = $findRecord->category_des;        
        return view('admin.category.edit', $data);         
    }
    public function productseccategoryedit($id) {
        $data = [];
        $data['page_title'] = " | Categories";
        $data['current_page'] = "secondcategory";
        $data['id'] = $id;
        $findRecord = SecondCategory::find($id);
        $data['categories'] = Category::get();
        if($this->request->isMethod('post')) {
            $updateData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_id' => $this->request->input('category_id'), 
                'sec_category_name' => $this->request->input('sec_category_name')
            ];
            $updateOne = SecondCategory::where('id', $id)->update($updateData);
            if($updateOne) {
                return redirect()->route('productseccategory')->with('success', 'Your update item successfully');
            } else {
                return redirect()->route('productseccategorynew')->with('fail', 'Sorry, Something went wrong.');
            }
        }

        $data['lang_format'] = $findRecord->lang_format;
        $data['category_id'] = $findRecord->category_id;
        $data['sec_category_name'] = $findRecord->sec_category_name;        
        return view('admin.seccategory.edit', $data);            
    }

    public function productcategorydelete($id) {
        $findRecord = Category::find($id);
        $data['current_page'] = "category";
        $deleteRecord = $findRecord->delete();
        if($deleteRecord) {
            return redirect()->route('productcategory')->with('success', 'Your delete item successfully');
        } else {
            return redirect()->route('productcategory')->with('fail', 'Your delete item successfully');
        }
    }

    public function productitem() {
        $data = [];
        $data['page_title'] = " | Product Item";
        $data['current_page'] = "product";
        $findAll = ProductLists::orderBy('id', 'desc')->get();
        $data['findall'] = $findAll;
        return view('admin.product.index', $data);          
    }
    public function productitemnew() {
        $data = [];
        $data['page_title'] = " | Product Item New";
        $data['current_page'] = "product";
        $data['categories'] = Category::get();
        $data['sec_categories'] = SecondCategory::get();
        $data['thi_categories'] = ThirdCategory::get();
        if($this->request->isMethod('post')) {
            $file = $this->request->file('product_avatar');
            $filename = $file->getClientOriginalName();
            $fileExten = $file->getClientOriginalExtension();
            $filemineTypes = $file->getMimeType();
            $destinationPath = 'uploads/productitem';
            $fileFormat = date('Y-m-dh-i-s') . "." . $fileExten;
            $filterArray = [
                'image/gif',
                'image/svg+xml',
                'image/png',
                'image/jpeg'
            ];
            if(in_array($filemineTypes, $filterArray)) {
                $moveFile = $file->move($destinationPath, $fileFormat);
                if($moveFile) {
                    $createData = [
                        'category_id' => $this->request->input('category_id'),
                        'sec_category_id' => $this->request->input('sec_category_id'),
                        'thi_category_id' => $this->request->input('thi_category_id'),
                        'lang_format' => $this->request->input('lang_format'),
                        'has_promotion' => ($this->request->input('has_discount') > 0) ? 1 : 0,
                        'has_discount' => $this->request->input('has_discount'),
                        'product_name' => $this->request->input('product_name'),
                        'product_desc' => $this->request->input('product_desc'),
                        'product_avatar' => '/uploads/productitem/' . $fileFormat,
                        'product_price' => $this->request->input('product_price'),
                        'created_at' => date('Y-m-d h:i:s'),
                        'updated_at' => date('Y-m-d h:i:s')
                    ];
                    $createOne = ProductLists::insert($createData);
                    if($createOne) {
                        return redirect()->route('productitem')->with('success', 'Your created item successfully');
                    } else {
                        return redirect()->route('productcategorynew')->with('success', 'Sorry, Something went wrong.');
                    }
                }
            } else {
                return "Sorry";
            }
        }
        return view('admin.product.create', $data);                
    }
    public function productitemdelete($id) {
        $findRecord = ProductLists::find($id);
        $data['current_page'] = "category";
        $deleteRecord = $findRecord->delete();
        // remove current Image
        $removeFile = ltrim($findRecord->product_avatar, "/");
        if(file_exists($removeFile)) {
            unlink($removeFile);
        }
        if($deleteRecord) {
            return redirect()->route('productitem')->with('success', 'Your delete item successfully');
        } else {
            return redirect()->route('productitem')->with('fail', 'Your delete item successfully');
        }          
    }
    public function productitemedit($id) {
        $data = [];
        $data['page_title'] = " | Product Item Edit";
        $data['current_page'] = "product";
        $data['categories'] = Category::get();
        $data['sec_categories'] = SecondCategory::get();
        $data['thi_categories'] = ThirdCategory::get();
        $findRecord = ProductLists::find($id);
        if($this->request->isMethod('post')) {
            // Has Images 
            if($this->request->hasfile('product_avatar')) {
                $filterArray = [
                    'image/gif',
                    'image/svg+xml',
                    'image/png',
                    'image/jpeg'
                ];   
                $imageArray = [];
                $uploadFiles = $this->request->file('product_avatar');
                foreach($uploadFiles as $fileKey => $file) {
                    $filename = $file->getClientOriginalName();
                    $fileExten = $file->getClientOriginalExtension();  
                    $filemineTypes = $file->getMimeType();
                    $destinationPath = 'uploads/productitem';
                    $fileFormat = date('Y-m-dh-i-s') .  "_{$fileKey}." . $fileExten;
                    if(in_array($filemineTypes, $filterArray)) {
                        $imageArray[$fileKey] = "/" . $destinationPath . "/" . $fileFormat;
                        $moveFile = $file->move($destinationPath, $fileFormat);
                    }  else {
                        return "Somthing went wrong";
                    }                             
                }

                // Remove Existing Files
                $findAllImagesById = ProductItemImage::where('product_item_id', $id)->get();
                foreach($findAllImagesById as $qry) {
                    // Current File Remove
                    $removeFile = ltrim($qry->product_image_path, "/");

                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                    // Current columns remove
                    $removeCol = ProductItemImage::find($qry->id)->delete();
                }


                $createData = [
                    'category_id' => $this->request->input('category_id'),
                    'sec_category_id' => $this->request->input('sec_category_id'),
                    'thi_category_id' => $this->request->input('thi_category_id'),
                    'lang_format' => $this->request->input('lang_format'),
                    'has_promotion' => ($this->request->input('has_discount') > 0) ? 1 : 0,
                    'has_discount' => $this->request->input('has_discount'),
                    'product_name' => $this->request->input('product_name'),
                    'product_desc' => $this->request->input('product_desc'),
                    'product_price' => $this->request->input('product_price'),
                    'updated_at' => date('Y-m-d h:i:s')
                ];
                $updateOne = $findRecord->update($createData);
                foreach($imageArray as $proimg) {
                    $productImages = ProductItemImage::insert([
                        'product_item_id' => $id,
                        'product_image_path' => $proimg,
                        'created_at' => date('Y-m-d h:i:s'),
                        'updated_at' => date('Y-m-d h:i:s')
                    ]);
                }
                if($updateOne) {
                    return redirect()->route('productitem')->with('success', 'Your created item successfully');
                } else {
                    return redirect()->route('productcategorynew')->with('success', 'Sorry, Something went wrong.');
                }               
            } else {
                // Upload without image
                $createData = [
                    'category_id' => $this->request->input('category_id'),
                    'sec_category_id' => $this->request->input('sec_category_id'),
                    'thi_category_id' => $this->request->input('thi_category_id'),
                    'lang_format' => $this->request->input('lang_format'),
                    'has_promotion' => ($this->request->input('has_discount') > 0) ? 1 : 0,
                    'has_discount' => $this->request->input('has_discount'),
                    'product_name' => $this->request->input('product_name'),
                    'product_desc' => $this->request->input('product_desc'),
                    'product_price' => $this->request->input('product_price'),
                    'updated_at' => date('Y-m-d h:i:s')
                ];
                $updateOne = $findRecord->update($createData);
                if($updateOne) {
                    return redirect()->route('productitem')->with('success', 'Your created item successfully');
                } else {
                    return redirect()->route('productcategorynew')->with('success', 'Sorry, Something went wrong.');
                }                
            }
        }
        $data['id'] = $id;
        $data['has_preview_img'] = $findRecord->product_avatar;
        $data['lang_format'] = $findRecord->lang_format;        
        $data['category_id'] = $findRecord->category_id;        
        $data['has_promotion'] = $findRecord->has_promotion;        
        $data['has_discount'] = $findRecord->has_discount;   
        $data['product_name'] = $findRecord->product_name;   
        $data['product_desc'] = $findRecord->product_desc;
        $data['product_price'] = $findRecord->product_price;    
        $data['category_id'] = $findRecord->category_id;
        $data['sec_category_id'] = $findRecord->sec_category_id;
        $data['thi_category_id'] = $findRecord->thi_category_id;          
        return view('admin.product.edit', $data);          
    }

    public function productseccategorydelete($id){
        $findRecord = SecondCategory::find($id);
        $data['current_page'] = "category";
        $deleteRecord = $findRecord->delete();
        if($deleteRecord) {
            return redirect()->route('productseccategory')->with('success', 'Your delete item successfully');
        } else {
            return redirect()->route('productseccategory')->with('fail', 'Your delete item successfully');
        }        
    }

    public function productthicategory() {
        $data = [];
        $data['current_page'] = "thirdcategory";
        $data['page_title'] = " | Third Categories";
        $findAll = ThirdCategory::orderBy('id', 'desc')->get();
        
        $query = [];
        foreach($findAll as $findKey => $findVal) {
            $query[$findKey] = [
                'id' => $findVal->id,
                'lang_format' => $findVal->lang_format,
                'category_id' => (Category::count() > 0) ? Category::find($findVal->category_id)->category_name : '',
                'sec_category_id' => (SecondCategory::count() > 0) ? SecondCategory::find($findVal->sec_category_id)->sec_category_name : '',
                'third_category_name' => $findVal->third_category_name
            ];
        }
        $data['findall'] = $query;
        return view('admin.thicategory.index', $data);           
    }

    public function productthicategorynew() {
        $data['page_title'] = " | Third Category";
        $data['current_page'] = "thirdcategory";
        $data['first_cate'] = Category::get();
        $data['second_cate'] = SecondCategory::get();
        if($this->request->isMethod('post')) {
            $createData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_id' => $this->request->input('category_id'), 
                'sec_category_id' => $this->request->input('sec_category_id'),
                'third_category_name' => $this->request->input('third_category_name'),
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ];
            $createOne = ThirdCategory::insert($createData);
            if($createOne) {
                return redirect()->route('productthicategory')->with('success', 'Your created item successfully');
            } else {
                return redirect()->route('productthicategorynew')->with('success', 'Sorry, Something went wrong.');
            }
        }
        return view('admin.thicategory.create', $data);      
    }
    public function productthicategoryedit($id) {
        $data = [];
        $data['page_title'] = " | Third Categories";
        $data['current_page'] = "thirdcategory";
        $data['id'] = $id;
        $findRecord = ThirdCategory::find($id);
        $data['categories'] = Category::get();
        $data['second_category'] = SecondCategory::get();
        if($this->request->isMethod('post')) {
            $updateData = [
                'lang_format' => $this->request->input('lang_format'),
                'category_id' => $this->request->input('category_id'), 
                'sec_category_id' => $this->request->input('sec_category_id'),
                'third_category_name' => $this->request->input('third_category_name')
            ];
            $updateOne = ThirdCategory::where('id', $id)->update($updateData);
            if($updateOne) {
                return redirect()->route('productthicategory')->with('success', 'Your update item successfully');
            } else {
                return redirect()->route('productthicategorynew')->with('fail', 'Sorry, Something went wrong.');
            }
        }

        $data['lang_format'] = $findRecord->lang_format;
        $data['category_id'] = $findRecord->category_id;
        $data['sec_category_id'] = $findRecord->sec_category_id;
        $data['third_category_name'] = $findRecord->third_category_name;        
        return view('admin.thicategory.edit', $data);   
    }

    public function productthicategorydelete($id){
        $findRecord = ThirdCategory::find($id);
        $data['current_page'] = "thirdcategory";
        $deleteRecord = $findRecord->delete();
        if($deleteRecord) {
            return redirect()->route('productthicategory')->with('success', 'Your delete item successfully');
        } else {
            return redirect()->route('productthicategory')->with('fail', 'Your delete item successfully');
        }        
    }    
}
