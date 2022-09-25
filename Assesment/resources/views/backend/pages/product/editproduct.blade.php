@extends('backend.masterTempale.master')

@section('man')
<div class="container-fluid px-4">
     <h1 class="mt-4">DASHBOARD</h1>
     <div class="text-warning ml-auto" style="margin-left: 70% !important;">
        <a class="btn btn-sm btn-success" href="{{Route('dashboard')}}">Dashboard</a>       
        <a class="btn btn-sm btn-success" href="{{Route('manageproduct')}}">ManageProduct</a>       
        <a class="btn btn-sm btn-success" href="{{Route('addproduct')}}">create Product</a>       
    </div >
     <ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">Product Edit</li>
    </ol>
    <div class="row">
     <div class=" col-md-12">
    <div class="card bg-dark text-white mb-4">
                <form action="{{Route('productupdate',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Name :</label>
                                <input type="text" value="{{old('name',$product->name)}}" name="name" placeholder="Enter Your Product Name" class="form-control">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">category_name :</label>
                                <select name="category_name" id="" class="form-control">
                                    <option value="">----Select Category---</option>
                                    <option value="PANT" @if($product->category_name == "PANT") selected @endif >PANT</option>
                                    <option value="SHiRT" @if($product->category_name == "SHiRT") selected @endif >SHiRT</option>
                                    <option value="JUTA" @if($product->category_name == "JUTA") selected @endif >JUTA</option>
                                    <option value="PANJABi" {@if($product->category_name == "PANJABi") selected @endif >PANJABi</option>
                                </select>
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">brand_name :</label>
                                <input type="text" value="{{old('brand_name',$product->brand_name)}}" name="brand_name" placeholder="Enter Your Product brand_name" class="form-control">
                                @error('brand_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="">description :</label>
                                    <textarea class="form-control" name="description" id="" cols="4" rows="3" placeholder="Enter Your Product Description">{{old('description',$product->description)}}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            <div class="form-group">
                              <img height="80" src="{{asset('backend/productimage/'.$product->image)}}" alt="ALMAMOON">
                                    
                              <br><label for="">image :</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">category_Status :</label>
                                    <select name="status" id="" class="form-control mb-3">
                                        <option value="">----Category status---</option>
                                        <option value="1" @if($product->status == "1") selected @endif >Active</option>
                                        <option value="2" @if($product->status == "2") selected @endif >iactive</option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="form-group ">
                                  <button type="submit" class="form-control btn btn-warning">Update Product</button>
                              </div>

                        </div>
                    </div>

                </form>
                
         </div>
</div>
@endsection