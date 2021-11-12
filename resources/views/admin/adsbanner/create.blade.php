@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item"><a href="/admin/adsbanner"><i class="fas fa-chevron-right"></i><h4>Ads Banner</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/adsbanner/new"><i class="fas fa-chevron-right"></i><h4>Create New</h4></a></li>
</ol>
@endsection
@section('content')
    <div class="markappwrapper">
        @include('admin.inc.messagestatus')
        <div class="markappboxing">
            <div class="markappheader">
                <h5>Banner Create</h5>
            </div>
            <div class="markappbody">
                <div class="userformdata">
                    <div class="form-group custom-form-group">
                        <label for="name">Banner Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control"  placeholder="Enter Banner Name"/>
                    </div>

                    <div class="form-group custom-form-group">
                        <label for="email">Banner Link <span style="color:red;">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter Banner Links" />
                    </div>


                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="password">Banner Avatar <span style="color:red;">*</span></label>
                            <input type="file" placeholder="Upload Avatar" class="form-control"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="markappfooter">
                <div class="action-button-process">
                    <div class="form-group">
                        <button type="button" class="isAction form-control" data-bs-toggle="modal" data-bs-target="#myModal">Create New</button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Record</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="asktouser">
                                            <p>Are you sure want to create record?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
<!--                     <div class="form-group">
                        <button type="button" class="isAction form-control">Clear</button>
                    </div>      -->                 
                </div>
              
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection