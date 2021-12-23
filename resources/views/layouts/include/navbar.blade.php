<a href=""  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{route('users.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i>User</a>
<a href="{{route('products.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i>Product</a>
<a href="{{route('orders.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i>Cashier</a>

<a href="{{route('barcode.index')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user-chart"></i>Barcode</a>

<style>
    .btn-outline{
        border-color:#008B8B;
        color:#008B8B
    }
    .btn-outline:hover{
        background:#008B8B;
        color:white
    }
    a{
        margin-right:5px;
    }
</style>