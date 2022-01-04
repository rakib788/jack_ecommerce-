@extends('admin.layouts.app')
@section('main')
    <div class="container">
        <div class="row pt-2">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header cardB">
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="heading_h2 text-black">Add Customer</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('index_customer') }}" class="btn  btn-primary btn-sm ">All Customer</a>
                            </div>
                        </div>                     
                    </div>
                    <div class="card-body form_bg text-black">
                        <form action="{{ route('store_customer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name"> Customer Name</label><span class="span_star_message"> *</span>
                                <input type="text" name="name" id="name"  class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <span class="span_star_message alert-danger text-danger ">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">Email</label><span class="span_star_message"> *</span>
                                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                                        @error('email')
                                            <span class="span_star_message ">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username">Username</label><span class="span_star_message"> *</span>
                                        <input type="text" name="username" class="form-control" id="username"  value="{{old('username')}}" >
                                        @error('username')
                                            <span class="span_star_message">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label for="city">City</label><span class="span_star_message"> *</span>
                                    <input type="text" name="city" class="form-control" id="city" value="{{old('city')}}" >
                                        @error('city')
                                            <span class="span_star_message">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                    <label for="address">Address</label><span class="span_star_message"> *</span>
                                    <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}">
                                        @error('address')
                                            <span class="span_star_message">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label for="photo">Customer Images</label><span class="span_star_message"> *</span>
                                    <input type="file" name="photo" class="form-control" id="photo">
                                    </div>
                                    <div class="col-md-6">
                                    <label for="number">Phone Number</label><span class="span_star_message"> *</span>
                                    <input type="number" name="phone" class="form-control" id="number" value="{{old('phone')}}">
                                        @error('phone')
                                            <span class="span_star_message">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right pt-2">
                                <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection