@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item"><a href="/admin/productcategory"><i class="fas fa-chevron-right"></i><h4>Product Category</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/productcategory/edit/{{$id}}"><i class="fas fa-chevron-right"></i><h4>Category Edit</h4></a></li>
</ol>
@endsection
@section('content')
    @include('admin.inc.messagestatus')
    <div class="markappwrapper">
        <div class="markappboxing">
            <div class="markappheader">
                <h5>Product Category</h5>
            </div>
            <form id="createnow" action="{{ route('productcategoryeditcreate', ['id' => $id]) }}" method="post">
                <div class="form-group custom-form-group">
                    <label for="name">Display language<span style="color:red;">*</span></label>
                    <select class="form-control" name="lang_format">
                        <option value="my" {{($lang_format == 'my') ? 'selected' : ''}} >Myanmar</option>
                        <option value="en" {{($lang_format == 'en') ? 'selected' : ''}} >English</option>
                        <option value="ch" {{($lang_format == 'ch') ? 'selected' : ''}} >China</option> 
                    </select>
                </div>
                <div class="markappbody">
                    <div class="userformdata">
                        <div class="form-group custom-form-group">
                            <label for="name">Category Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" value="{{$category_name}}" name="category_name" placeholder="Category Name"/>
                        </div>

                        <div class="form-group custom-form-group">
                            <label for="email">Category Description <span style="color:red;">*</span></label>
                            <textarea class="form-control" value="{{$category_des}}" name="category_des" placeholder="Category Description"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="markappfooter">
                <div class="action-button-process">
                    <div class="form-group">
                        <button type="button" class="isAction form-control" data-bs-toggle="modal" data-bs-target="#myModal">Update</button>
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
                                            <p>Are you sure want to update this record?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('createnow').submit()">Update</button>

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