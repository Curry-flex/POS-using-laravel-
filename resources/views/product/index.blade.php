@extends('layouts.app')


@section('content')
<div class="container">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                
            <h4>ADD PRODUCT</h4>   <a href="" style="float:right" data-toggle="modal" data-target="#addmodal"  class="btn btn-dark"><i class="fa fa-plus"></i>Add Product</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-left">
                 <thead>
                    <tr>
                    <th>#</th>
                     <th>Product Name</th>
                     <th>Brand</th>
                     <th>Quantity</th>
                     <th>Alert Stock</th>
                     <th>Action</th>
                    </tr>
                 </thead>

                 <tbody>
                     @foreach($product as $products)
                     <tr>
                      <td>{{$products->id}}</td>
                      <td>{{$products->productname}}</td>
                      <td>{{$products->brand}}</td>
                      <td>{{$products->quantity}}</td>
                      <td>@if($products->alert_stock>=$products->quantity)
                        <span class="badge badge-danger">Low stock {{$products->alert_stock}}</span>
                        @else
                        <span class="badge badge-success">{{$products->alert_stock}}</span>
                        @endif
                      </td>
                     
                      <td>
                          <div class="btn-group">
                           <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editmodal{{$products->id}}"><i class="fa fa-edit">Edit</i></a>
                           <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser{{$products->id}}"><i class="fa fa-trash">Delete</i></a>
                           
                          </div>
                      </td>
                      </tr>

 <div class="modal right fade" id="editmodal{{$products->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('products.update',$products->id)}}" method="POST">
            @csrf
            @method('put')
           
            <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" name="product" value="{{$products->productname}}" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Brand</label>
            <input type="text" name="brand"  value="{{$products->brand}}" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Quanity</label>
            <input type="text" name="quanty"  value="{{$products->quantity}}" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Alert stock</label>
            <input type="text" name="alert"  value="{{$products->alert_stock}}" class="form-control">
            </div>

    
            <div class="modal-footer">
               <button class="btn btn-info btn-block">Save</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<div class="modal right fade" id="deleteuser{{$products->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('products.destroy',$products->id)}}" method="POST">
            @csrf
            @method('delete')
           
            <p>Are you sure you want to delete this {{$products->name}} ?</p>

           
    
            <div class="modal-footer">
            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
               <button class="btn btn-danger btn-block">Delete</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
                     @endforeach
                 
                     {{ $product->links('pagination::bootstrap-4') }}
          </tbody>
                
                </table>
            </div>
        </div>
          
        </div>
        <div class="col-md-3">
        <div class="card">
            <div class="card-header">
               <h3>SEARCH USER</h3>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>

    </div>
</div>

<!-- Modal -->
<div class="modal right fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('products.store')}}" method="POST">
            @csrf
           
            <div class="form-group">
             <label for="">Product Name</label>
             <input type="text" name="product" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Description</label>
             <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <div class="form-group">
            <label for="">Brand</label>
            <input type="text" name="brand" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control">
            </div>

            <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Alert stock</label>
             <input type="number" class="form-control" name="alert">
            </div>
            <div class="modal-footer">
               <button class="btn btn-info btn-block">Save Product</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>



<style>
    .modal.right .modal-dialog{
        top:0;
        right:0;
        margin-right:0;
    }
</style>

@endsection