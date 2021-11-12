@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item"><a href="/admin/couponcards"><i class="fas fa-chevron-right"></i><h4>Coupon Cards</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/couponcards/new"><i class="fas fa-chevron-right"></i><h4>Create New</h4></a></li>
</ol>
@endsection
@section('content')
    <div class="markappwrapper">
        @include('admin.inc.messagestatus')
        <div class="markappboxing">
            <div class="markappheader">
                <h5>Coupon Create</h5>
            </div>
            <form id="createnow" action="{{ route('couponcardsnewcreate') }}" method="post">
                <div class="markappbody">
                    <div class="userformdata">
                        <div class="form-group custom-form-group">
                            <label for="name">Coupon Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  name="coupon_code" old="coupon_code" placeholder="Enter Code"/>
                        </div>

                        <div class="form-group custom-form-group">
                            <label for="email">Coupon Prices <span style="color:red;">*</span></label>
                            <input type="email" class="form-control" name="coupon_price" old="coupon_price" placeholder="Enter Coupon Price" />
                        </div>
                    </div>
                </div>
            </form>
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
                                        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('createnow').submit()">Create</button>
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