@extends('layouts.app')


@section('content')
<div class="container">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Barcode</h4>
            </div>
            <div class="card-body">
             <div class="print">

             <div class="row">
                 @forelse($barcode as $barcode)
                 <div class="col-md-5">
                     <div class="card">

                     <div class="card-body">
                         {!! $barcode->barcode !!}
                     
                     </div>
                     </div>

                 </div>
                  @empty
                  <h4>Nothing</h4>
                 @endforelse

                
             </div>
             </div>
          </div>
               
     
    </div>
  </div>
</div>
</div>
</div>




@endsection