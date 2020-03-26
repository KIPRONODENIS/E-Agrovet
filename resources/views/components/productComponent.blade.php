<div class="card mx-auto mb-3" style="width:20rem;">
  <img src="{{asset('storage/'.$image)}}" class="card-img-top" style="height:200px !important">
    <div class="card-body">
    <h4 class="card-title bold my-2">{{$name}} by:<span class=" p-1 rounded  text-white" style="color:#00b712 !important">{{$owner}}<span></h4>
    <h6 class="card-subtitle my-2">In Stock</h6>
    <p class="card-text lead text-green-900 my-3"> {{$price}}</p>
    <p class="my-2 flex">
        <a href="{{$route}}" class="btn btn-outline-success">Read More</a>
      @component('components.addToCartComponent')
       @slot('id')
        {{$id}}
       @endslot
       @slot('stock')
        {{$stock}}
       @endslot



      @endcomponent


      <p>
  </div>
</div>
