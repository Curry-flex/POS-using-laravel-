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