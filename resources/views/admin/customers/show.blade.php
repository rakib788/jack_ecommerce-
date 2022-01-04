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
                    <a href="{{ route('edit_customer', $customer->id) }}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-plus-circle"></i> Edit</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <tr>
                        <th>Serial no.</th>
                        <td>{{$customer->id}}</td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$customer->email}}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{$customer->username}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$customer->address}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$customer->city}}</td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td><img src="{{URL::to($customer->photo)}}" alt="" style="height: 80px; width:80px" ></td>
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