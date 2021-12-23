@extends('layouts.app')


@section('content')
<div class="container">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                
            <h4>ORDER PRODUCT</h4>  
            </div>
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
            <div class="card-body">
                <table class="table table-bordered table-left ">
                 <thead>
                    <tr>
                      <th></th>
                     <th>Product Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Discount(%)</th>
                     <th>Total</th>
                     <th><a href="#"  class="btn btn-success add_more"><i class="fa fa-plus"></i></a></th>
                   
                    </tr>
                 </thead>
                 <tbody class="addMoreProduct">
                <tr>
                    <td>1</td>
                   <td>
                   <select name="product_id[]" id="product_id" class="form-control product_id">
                       <option value="">Select Item</option>
                   @foreach($product as $products)
                      <option data-price="{{$products->price}}" value="{{$products->id}}">{{$products->productname}}</option>
                   @endforeach
                 </select>
                   </td>
                   <td>
                       <input type="number" name="quantity[]" id="qt" class="form-control qt">
                   </td>
                   <td>
                       <input type="number" name="price[]" id="price" class="form-control price">
                   </td>
                   <td>
                       <input type="number" name="discount[]" id="discount" class="form-control discount">
                   </td>
                   <td>
                       <input type="number" name="total[]" id="total" class="form-control total">
                   </td>
                   <td>
                       <a href="" class="btn btn-danger"><i class="fa fa-times"></i></a>
                   </td>
                </tr>
                 <tbody>
                  
          </tbody>
                
                </table>
            </div>
        </div>
          
        </div>
        <div class="col-md-3">
        <div class="card">
            <div class="card-header">
               <h3>Total <b class="mytotal"></b></h3>
              
            </div>
            <div class="card-body">
               <div class="row jumbotron">
                   <div class="col-md-12">
                       <div class="form-group">
                        <label for="">Customer name</label>
                        <input type="text" readonly
                         value="{{auth()->user()->name}}" name="cname" class="form-control" style="width:180px">
                       </div>
                       <div class="form-group">
                        <label for="">Customer Phone</label>
                        <input type="text" name="phone" class="form-control" style="width:180px">
                       </div>
                       <div class="form-group">
                        <label for="">Payments</label>
                        <input type="number" name="payment" id="payment" class="form-control" style="width:180px">
                       </div>
                       <div class="form-group">
                        <label for="">Remain Amount</label>
                        <input type="text" name="remain" id="remain" readonly class="form-control" style="width:180px">
                       </div>
                       <div class="form-group">
                        <button class="btn btn-success btn-block">save</button>
                       </div>
                   </div>
               
               </div> 
            </div>
        </div>
        
    </div>
    
    </div>
    </form>
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

@section('script')
  <script>
    
       $('.add_more').on('click',function(){
        var product =$('.product_id').html();
            var numrows=($('.addMoreProduct tr').length  - 0)+ 1;
            var tr='<tr><td class="no" ">' +numrows + '</td>'+
            '<td><select class="form-control product_id" name="product_id[]">' +product + '</select></td>' +
            '<td><input type="number" name="quantity[]" class="form-control qt" ></td>' +
            '<td><input type="number" name="price[]" class="form-control price"> </td>' +
            '<td><input type="number" name="discount[]" class="form-control discount"> </td>' +
            '<td><input type="number" name="total[]" class="form-control total total"> </td>' +
            '<td><a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i>  </a></td>';

            
             
            $('.addMoreProduct').append(tr);
   });

   $('.addMoreProduct').delegate('.delete','click', function(){
       $(this).parent().parent().remove()
   })

   
   function total()
   {
       var total=0;
       $('.total').each(function(i, e){
           var amount =$(this).val() -0;
           total += amount
       });
       $('.mytotal').html(total);
   }
   $('.addMoreProduct').delegate('.product_id','change',function(){
       var tr =$(this).parent().parent()
       var price=tr.find('.product_id option:selected').attr('data-price');
       tr.find('.price').val(price)
       var qty = tr.find('.qt').val()-0;
       var disc = tr.find('.discount').val()-0;
       var price = tr.find('.price').val()-0;
       var total_amount =(qty*price) -((qty*price*disc)/100)
       tr.find('.total').val(total_amount)
       total()

   })

   $('.addMoreProduct').delegate('.qt , .discount' ,'keyup', function(){
    var tr =$(this).parent().parent()
    var qty = tr.find('.qt').val()-0
    var disc = tr.find('.discount').val()-0
    var price = tr.find('.price').val()-0
    var total_amount =(qty*price) -((qty*price*disc)/100)
     tr.find('.total').val(total_amount)
    total()
   })

   $('#payment').keyup(function(){
       var total =$('.mytotal').html();
       var paid= $(this).val()
       var remain =total-paid;
       $('#remain').val(remain);
   })

 
    
  </script>

  



@endsection