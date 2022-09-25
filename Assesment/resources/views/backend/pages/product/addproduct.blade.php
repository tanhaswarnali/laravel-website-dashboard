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
     <li class="breadcrumb-item active">Product Added</li>
    </ol>
    <div class="row">
     <div class=" col-md-12">
    <div class="card bg-dark text-white mb-4">
                <form action="{{Route('addproductstore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Name :</label>
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Enter Your Product Name" class="form-control">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">category_name :</label>
                                <select name="category_name" id="" class="form-control">
                                    <option value="">----Select Category---</option>
                                    <option value="Mobile" {{ old('category_name') == 'Mobile' ? 'selected' : ''}}>Mobile</option>
                                    <option value="Laptop" {{ old('category_name') == 'Laptop' ? 'selected' : ''}}>Laptop</option>
                                    <option value="Charger" {{ old('category_name') == 'Charger' ? 'selected' : ''}}>Charger</option>
                                    <option value="Accesories" {{ old('category_name') == 'Accesories' ? 'selected' : ''}}>Accesories</option>
                                </select>
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">brand_name :</label>
                                <input type="text" value="{{old('brand_name')}}" name="brand_name" placeholder="Enter Your Product brand_name" class="form-control">
                                @error('brand_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="">description :</label>
                                    <textarea class="form-control" name="description" id="" cols="4" rows="3" placeholder="Enter Your Product Description">{{old('description')}}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            <div class="form-group">
                                    <label for="">image :</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">category_Status :</label>
                                    <select name="status" id="" class="form-control mb-3">
                                        <option value="">----Category status---</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : ''}} >Active</option>
                                        <option value="2" {{ old('status') == '2' ? 'selected' : ''}} >Iactive</option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="form-group ">
                                  <button type="submit" class="form-control btn btn-success">Add Product</button>
                              </div>

                        </div>
                    </div>
                    

                    

                </form>
                                        
                                    
                                  
       
         </div>
</div>
@endsection