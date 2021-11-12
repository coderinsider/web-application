@extends('admin.layouts.app')
@section('breadcrumb')
<ol class="breadcrumb custombreadcrumb">
    <li class="bread-item"><a href="/admin/dashboard"><h4>Dashboard</h4></a></li>
    <li class="bread-item active" aria-current="page"><a href="/admin/product-sec-category"><i class="fas fa-chevron-right"></i><h4>Second Category Lists</h4></a></li>
</ol>
@endsection
@section('content')
<div class="backend-right-main-panel">
    @include('admin.inc.messagestatus')    
    <div class="backend-head-box">
        <div class="nav-name-text">
            <h3>Second Category Lists</h3>
        </div>
        <div class="nav-post-add">
            <a href="{{ route('productseccategorynew') }}">Add New</a>
        </div>
    </div>
    <div class="backend-body-box">
        <div class="table-box-panel">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Display Page</th>
                    <th>Category Name</th>
                    <th>Second Category</th>
                    <th>Actions</th>
                </tr>
                @foreach($findall as $eachItem => $eachValue)
                <tr>
                    <td>{{ $eachItem + 1 }}</td>
                    <td>{{ $eachValue['lang_format'] }}</td>
                    <td>{{ $eachValue['category_id'] }}</td>
                    <td>{{ $eachValue['sec_category_name'] }}</td>
                    <td>
                        <div class="moreactions">
                            <div class="editme">
                                <button><a href="{{ route('productseccategoryedit', ['id' => $eachValue['id']])}}"><i class="fas fa-edit"></i> Edit</a></button>  
                            </div>
                            <div class="deleteme"> 
                                <button data-bs-toggle="modal" data-bs-target="#myModal{{ $eachValue['id'] }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal{{$eachValue['id']}}" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
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
                                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('deletenow{{$eachValue['id']}}').submit();">Delete</button>
                                                <form id="deletenow{{$eachValue['id']}}" method="post" action="{{ route('productseccategorydelete', ['id' => $eachValue['id']])}}"></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                    </td>
                </tr>   
                @endforeach                             
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection