@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/productcategory"><i class="fas fa-chevron-right"></i><h4>User Lists</h4></a></li>
</ol>
@endsection
@section('content')
<div class="backend-right-main-panel">
    @include('admin.inc.messagestatus')    
    <div class="backend-head-box">
        <div class="nav-name-text">
            <h3>Empolyee Lists</h3>
        </div>
        <div class="nav-post-add">
            <a href="{{ route('adminusernew_mm') }}">Add New Empolyee</a>
        </div>
    </div>
    <div class="backend-body-box">
        <div class="table-box-panel" id="employeelists">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Member Name</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Myat Ko Ko</td>
                    <td>09253354614</td>
                    <td>Male</td>
                    <td>
                        <div class="imgpreview" style="width: 50px;height: 50px">
                            <img src="{{ asset('uploads/usercover/default.jpeg') }}" style="border: 2px solid #6CB4FF;border-radius: 50%;width: 100%;height: 100%;" />
                        </div>
                    </td>
                    <td>coderinsider1@gmail.com</td>
                    <td>
                        <p class="isactivestatus">
                        Active
                        </p>
                    </td>
                    <td>
                        <div class="moreactions">
                            <div class="editme">
                                <i class="fas fa-edit"></i> Edit
                            </div>
                            <div class="deleteme"> 
                                <i class="fas fa-trash-alt"></i> Delete
                            </div>
                        </div>                                        
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Sandi</td>
                    <td>09253354614</td>
                    <td>Female</td>
                    <td>
                        <div class="imgpreview" style="width: 50px;height: 50px">
                            <img src="{{ asset('uploads/usercover/default.jpeg') }}" style="border: 2px solid #6CB4FF;border-radius: 50%;width: 100%;height: 100%;" />
                        </div>
                    </td>
                    <td>coderinsider1@gmail.com</td>
                    <td>
                        <p class="isactivestatus">
                        Active
                        </p>
                    </td>
                    <td>
                        <div class="moreactions">
                            <div class="editme">
                                <i class="fas fa-edit"></i> Edit
                            </div>
                            <div class="deleteme"> 
                                <i class="fas fa-trash-alt"></i> Delete
                            </div>
                        </div>                                        
                    </td>
                </tr>                             
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
document.querySelector(".justshowme").style.display = "none";
document.getElementById("dashboardright").style.marginLeft= "50px";
function openNav() {
    var x = document.getElementById("dashboardleft").style.width = "250px";
    document.getElementById("dashboardright").style.marginLeft = "250px";
    document.querySelector(".openbar").style.display = "none";
    document.querySelector(".closebar").style.display = "block";
    if(x) {
        document.querySelector(".justshowme").style.display = "block";
    }
}

function closeNav() {
    document.getElementById("dashboardleft").style.width = "50px";
    document.getElementById("dashboardright").style.marginLeft= "50px";
    document.querySelector(".openbar").style.display = "block";
    document.querySelector(".closebar").style.display = "none"; 
    document.querySelector(".justshowme").style.display = "none";
 
}
</script>
@endsection