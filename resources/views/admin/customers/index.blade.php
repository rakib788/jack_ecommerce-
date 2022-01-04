@extends('admin.layouts.app')

@section('main')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active text-black" aria-current="page">Customers List</li>
    </ol>
</nav>
<div class="page-content fade-in-up">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="col-md-8 heading_h4 text-black" >All Customers List</h4>
                <div class="col-md-4 folat-right">
                    <a href="{{route('create_customer')}}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <tr>
                        <th>Serial</th>
                        <th>Customers Name</th>
                        <th>Customer Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Aciton</th>
                    </tr>
                    @foreach($allcustomer as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>
                                <img src="{{URL::to($customer->photo)}}" style="width: 50px; height: 50px " class="" alt="">
                            </td>
                            <td>
                                <a href="{{ route('show_customer',$customer->id) }}" data-href="" class="badge bg-dark" data-toggle="modal" data-target="#logoutModal"><i class=""></i>view</a>
                                <a href="{{ route('delete_customer',$customer->id) }}" data-href="" class="badge bg-danger" data-toggle="modal" data-target="#logoutModal"><i class=""></i>Delete</a>
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