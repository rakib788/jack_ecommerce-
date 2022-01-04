@extends('admin.layouts.app')

@section('main')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active text-black" aria-current="page">Category List</li>
    </ol>
</nav>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="col-md-10 text-center heading_h4 text-black" >View SubCategory</h4>
                <div class="col-md-2 folat-right">
                    <a href="{{ route('sub_edit',$sub_category->id) }}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-plus-circle"></i> Edit</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <tr>
                        <th>Serial no.</th>
                        <td>{{$sub_category->id}}</td>
                    </tr>
                    <tr>
                        <th>SubCategory Name</th>
                        <td>{{$sub_category->cat_name}}</td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td>{{$sub_category->category->cat_name}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$sub_category->slug}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$sub_category->slug}}</td>
                    </tr>
                    <tr>
                        <th>Acitve Status</th>
                        <td>{{$sub_category->status}}</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "DELETE" below if you are delete this Data.
            <form action="" method="POST">
                @csrf
                <input type="hidden" id="input" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection