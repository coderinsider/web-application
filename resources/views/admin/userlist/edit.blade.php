@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item"><a href="/admin/users-list"><i class="fas fa-chevron-right"></i> <h4>User lists</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/users-list/new"><i class="fas fa-chevron-right"></i><h4>Edit</h4></a></li>
</ol>
@endsection
@section('content')
    <div class="markappwrapper">
        @include('admin.inc.messagestatus')        
        <div class="markappboxing" id="employeelistsedit">
            <div class="markappheader">
                <h5>User Create</h5>
            </div>
            <div class="markappbody">
                <div class="userformdata">
                    <div class="form-group custom-form-group">
                        <label for="name">Username <span style="color:red;">*</span></label>
                        <input type="text" class="form-control"  placeholder="Enter Users"/>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="email">Email <span style="color:red;">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter Email address" />
                        </div>
                        <div class="form-group custom-form-group">
                            <label for="name">Phone <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Phone" />
                        </div>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="gender">Gender <span style="color:red;">*</span></label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group custom-form-group">
                            <label for="password">Password <span style="color:red;">*</span></label>
                            <input type="password" placeholder="Enter Password" class="form-control"/>
                        </div>
                        <div class="form-group custom-form-group">
                            <label for="password">Confirm Password <span style="color:red;">*</span></label>
                            <input type="password" placeholder="Enter Confirm Password" class="form-control"/>
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