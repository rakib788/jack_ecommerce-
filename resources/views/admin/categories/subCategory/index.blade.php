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
                <h4 class="col-md-8 heading_h4 text-black" >All SubCategorey List</h4>
                <div class="col-md-4 folat-right">
                    <a href="{{route('sub_create')}}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <tr>
                        <th>Serial no.</th>
                        <th>SubCategory Name</th>
                        <th>Cat_Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    @foreach($sub_category as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->cat_name}}</td>
                            <td>{{$subcategory->category->cat_name}}</td>
                            <td>{{$subcategory->slug}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td class="center"><span class="badge text-success">{{$subcategory->status}}</span> </td>
                            <td>
                                <a href="{{ route('sub_show',$subcategory->id) }}" data-href="" class="badge bg-dark" data-toggle="modal" data-target="#logoutModal"><i class=""></i>view</a>
                                <a href="{{ route('sub_delete',$subcategory->id) }}" data-href="" class="badge bg-danger" data-toggle="modal" data-target="#logoutModal"><i class=""></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
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