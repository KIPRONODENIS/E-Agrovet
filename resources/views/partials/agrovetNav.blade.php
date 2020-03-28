<div class="nav my-2  bg-green-200 w-full col-md-10 mx-auto">
  <ul class="nav nav-pills my-1 col-md-8 mx-auto">
    	<li class="nav-item "><a href="{{route('agrovet.home')}}" class="nav-link {{$active=='home'? 'active':''}}">Home</a></li>
    	<li class="nav-item"><a href="{{route('agrovet.products')}}" class="nav-link  {{$active=='products'? 'active':''}}">  Products</a></li>
    	<li class="nav-item "><a href="{{route('agrovet.profile')}}" class="nav-link {{$active=='profile'? 'active':''}}">Profile</a></li>
    	 <li class="nav-item"><a href="{{route('agrovet.account')}}" class="nav-link {{$active=='account'? 'active':''}}">Account <i class="fa fa-money"></i></a></li>
    </ul>
</div>