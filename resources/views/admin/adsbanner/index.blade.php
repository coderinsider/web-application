@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/adsbanner"><i class="fas fa-chevron-right"></i><h4>Ads Banner</h4></a></li>
</ol>
@endsection
@section('content')
<div class="backend-right-main-panel">
    @include('admin.inc.messagestatus')
    <div class="backend-head-box">
        <div class="nav-name-text">
            <h3>Ads Banner Lists</h3>
        </div>
        <div class="nav-post-add">
            <a href="{{ route('adsbannernew') }}">Add New</a>
        </div>
    </div>
    <div class="backend-body-box">
        <div class="table-box-panel">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>ADS Name</th>
                    <th>ADS Link</th>
                    <th>ADS Avatar</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Myat Ko Ko</td>
                    <td>09253354614</td>
                    <td>coderinsider1@gmail.com</td>
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
                    <td>2</td>
                    <td>SanDi</td>
                    <td>09253354614</td>
                    <td>coderinsider1@gmail.com</td>
                    <td>
                        <div class="moreactions">
                            <div class="editme">
                                <button><i class="fas fa-edit"></i> Edit</button>  
                            </div>
                            <div class="deleteme"> 
                                <button data-bs-toggle="modal" data-bs-target="#myModal">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title custom-modal-title" id="exampleModalLabel">Delete Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="asktouser">
                                                    <p>Are you sure want to delete this record?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                  
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
@endsection