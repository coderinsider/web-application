@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item"><a href="/admin/productitem"><i class="fas fa-chevron-right"></i><h4>Product Items</h4>
    <li class="bread-item active" aria-current="page"><a href="/admin/productitem/new"><i class="fas fa-chevron-right"></i><h4>New</h4></a></li>
</ol>
@endsection
@section('content')
    <div class="markappwrapper">
        @include('admin.inc.messagestatus')
        <div class="markappboxing">
            <div class="markappheader">
                <h5>Product Item</h5>
            </div>
            <form id="createnow" action="{{ route('productitemnewcreate') }}" method="post" enctype="multipart/form-data">
                <div class="form-group-flex">
                    <div class="form-group custom-form-group">
                        <label for="name">Display language<span style="color:red;">*</span></label>
                        <select class="form-control" name="lang_format">
                            <option value="my">Myanmar</option>
                            <option value="en">English</option>
                            <option value="ch">China</option> 
                        </select>
                    </div>      
                    <div class="form-group custom-form-group"> 
                       <label for="name">Category<span style="color:red;">*</span></label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>              
                </div>
                <div class="form-group-flex">
                    <div class="form-group custom-form-group">
                        <label for="name">Second Category<span style="color:red;">*</span></label>
                        <select class="form-control" name="sec_category_id">
                            @foreach($sec_categories as $sec_cate)
                            <option value="{{ $sec_cate->id }}">{{ $sec_cate->sec_category_name }}</option>
                            @endforeach
                        </select>
                    </div>      
                    <div class="form-group custom-form-group"> 
                       <label for="name">Third Category<span style="color:red;">*</span></label>
                        <select class="form-control" name="thi_category_id">
                            @foreach($thi_categories as $thi_cate)
                            <option value="{{ $thi_cate->id }}">{{ $thi_cate->third_category_name }}</option>
                            @endforeach
                        </select>
                    </div>                         
                </div>
                <div class="markappbody">
                    <div class="userformdata">
                        <div class="form-group-flex">
                            <div class="form-group custom-form-group">
                                <label for="name">Parcentage <span style="color:red;">*</span></label>
                                <input type="text" name="has_discount" placeholder="Parcentage" value="0" class="form-control" />
                            </div>                            
                        </div>

                        <div class="form-group custom-form-group">
                            <label for="name">Product Name <span style="color:red;">*</span></label>
                            <input type="text" placeholder="Product Name" name="product_name" class="form-control" />
                        </div> 
                        <div class="form-group custom-form-group">
                            <label for="name">Product Price <span style="color:red;">*</span></label>
                            <input type="text" placeholder="Product Price" name="product_price" class="form-control" />
                        </div>     
                        <div class="form-group custom-form-group">
                            <label for="email">Product Description <span style="color:red;">*</span></label>
                            <textarea class="form-control" name="product_desc" placeholder="Product Description"></textarea>
                        </div>
                        <div class="form-group custom-form-group">
                            <label for="email">Product Image <span style="color:red;">*</span></label>
                            <input type="file" placeholder="Product Price" name="product_avatar" class="form-control" />
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