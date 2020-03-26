<div class="hero-main mt-4  bg-transparent w-3/4 mx-auto  shadow">
<div class=" mx-auto my-auto  text-center py-3">
<h1 class="display-3 my-2 text-white shadow-sm">Welcome to E-agrovet</h1>
<p class="h3 text-md text-yellow-500 "> The no 1 Agricultural Ecommerce Platform</p>
</div>

<div class=" flex hero-buttons text-center  mt-3 mx-auto">
  @guest
  <a href="{{route('register')}}" class=" mx-auto bg-blue-700 hover:bg-blue-500 text-white font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded w-2/5 my-2 mx-2 shadow ">
  Register
</a>
  @else
  <a href="{{route('home')}}" class=" mx-auto bg-blue-700 hover:bg-blue-500 text-white font-semibold hover:text-white py-4 px-4 border border-blue-500 hover:border-transparent rounded w-2/5 my-2 mx-2 shadow ">
  Dashboard
</a>
@endguest
</div>
</div>
