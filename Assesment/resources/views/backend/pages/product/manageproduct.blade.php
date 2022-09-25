@extends('backend.masterTempale.master')

@section('man')
<div class="container-fluid px-4">
     <h1 class="mt-4">Dashboard</h1>
  
     <div class="text-warning ml-auto" style="margin-left: 70% !important;">
        <a class="btn btn-sm btn-success" href="{{Route('dashboard')}}">Dashboard</a>       
        <a class="btn btn-sm btn-success" href="{{Route('manageproduct')}}">ManageProduct</a>       
        <a class="btn btn-sm btn-success" href="{{Route('addproduct')}}">create Product</a>       
    </div >
     <ol class="breadcrumb mb-4">
     <li class="breadcrumb-item active">MANAGE PRODUCT</li>
    </ol>
    <div class="row">
     <div class=" col-md-12">
         <div class="card  text-white mb-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#sl</th>
                        <th>Name</th>
                        <th>Category_name</th>
                        <th>Brand_name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=1 @endphp
                    @foreach($products as $product)
                    <tr>
                        <td>{{$sl}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <img height="80" src="{{asset('backend/productimage/'.$product->image)}}" alt="ALMAMOON">
                        </td>
                        <td>
                            @if($product->status == 1)
                            <span class="badge badge-info">Active</span>
                            @else
                            <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{Route('productedit',Crypt::encryptString($product->id))}}"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#productMOdal{{$product->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <!-- Modal -->
      <div class="modal fade" id="productMOdal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Iteam REMOVE</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="text-black text-center font-wight-bold">
             ARE YOU SURE ITEM WANT TO DELETE;
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="{{Route('productdelete',$product->id)}}" class="btn btn-danger">Confirm</a>
            </div> 
          </div>
        </div>
      </div>

                            @php $sl++ @endphp
                    @endforeach
                </tbody>

            </table>
         </div>
</div>
@endsection