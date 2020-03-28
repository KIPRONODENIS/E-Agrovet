  <ul class="nav nav-pills my-3 col-md-8 mx-auto">

        <li class="nav-item "><a href="{{route('home')}}" class="nav-link {{$active=='home' ? 'active':''}}">Home</a></li>
        <li class="nav-item"><a href="{{route('vet.services')}}" class="nav-link {{$active=='services' ? 'active':''}}">Services</a></li>
    	<li class="nav-item"><a href="{{route('vet.profile')}}" class="nav-link {{$active=='profile' ? 'active':''}}">Profile</a></li>
            <li class="nav-item"><a href="{{route('vet.orders')}}" class="nav-link {{$active=='orders' ? 'active':''}}">Orders</a></li>
    </ul>