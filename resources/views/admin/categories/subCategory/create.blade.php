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
                                <h4 class="heading_h2 text-black">Add Sub Category</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('sub_index') }}" class="btn  btn-primary btn-sm ">All Sub-Category</a>
                            </div>
                        </div>                     
                    </div>
                    <div class="card-body form_bg text-black">
                        <form action="{{ route('sub_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category"> Sub Category Name</label><span class="span_star_message"> *</span>
                                <input type="text" name="cat_name" id="category" required="" class="form-control">
                            </div>  
                            <div class="form-group">
							    <label for="">Select Category</label><span class="span_star_message"> *</span>
							    <select class="form-control" name="category" id="">
							      <option class="disabled text-dark">Select Categories</option>
							      @foreach($categories  as $category)
							      <option value="{{$category->id}}">{{$category->cat_name}}</option>
							      @endforeach
							    </select>
						    </div>
                            <div class="form-group">
                                <label for="slug">Slug</label><span class="span_star_message"> *</span>
                                <input type="text" class="form-control" required="" name="slug" id="slug">
                             
                            </div>
                            <div class="form-group">
                             <label for="description">Description</label><span class="span_star_message"> *</span>
                             <textarea name="description" required="" class="form-control" id="description" cols="8"  rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" >
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