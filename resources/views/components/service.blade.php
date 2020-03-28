<div class="card mx-auto mb-3" style="width:20rem;">
  <img src="{{asset('storage/'.$image)}}" class="card-img-top" style="height:200px !important">
    <div class="card-body">
    <h4 class="card-title bold my-2">{{$name}} by:<span class=" p-1 rounded  text-white" style="color:#00b712 !important">{{$user}}<span></h4>

    <p class="my-2">
    	@guest
        <a href="{{route('service.show',$id)}}" class="btn btn-outline-success">Order now!</a>
        @else

        @if(!Auth::user()->services()->where('id',$id)->count()>0) 

        <a href="{{route('service.show',$id)}}" class="btn btn-outline-success">Order now!</a>
        @endif
        @endguest




      <p>
  </div>
</div>
