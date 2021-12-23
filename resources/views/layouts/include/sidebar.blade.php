<nav id="mynav">

<ul class="list-unstyled lead">
 <li class="active"><a href=""><i class="fa fa-home"></i> Home</a></li>
 <li><a href="{{route('orders.index')}}"><i class="fa fa-box fa-lg"></i> Orders</a></li>
 <li><a href="{{route('products.index')}}"><i class="fa fa-truck fa-lg"></i> Product</a></li>
 <li><a href="{{route('transactions.index')}}"><i class="fa fa-money-bill fa-lg"></i> Transaction</a></li>
</ul>

</nav>

<style>
    #mynav ul.lead{
        border-bottom:1px solid #47748b;
        widith=fit-continue;
    }

    #mynav ul li a{
        padding:10px;
        display:block;
        font-size:1.2em;
        widith:30vh;
        color:blue
    }
    #mynav ul li a i{
        margin-right:10px;
    }
    #mynav ul li a:hover{
        color:white;
        background-color:blue;
    }
</style>