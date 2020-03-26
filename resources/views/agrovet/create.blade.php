@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="card bg-green-200">

 <div class="card-body">

   <form class="w-1/2 mx-auto" enctype="multipart/form-data" method="post" action="{{route('agrovet.product.store')}}">
@csrf
 <h1 class="h2 my-2">Create New Product</h1>
   	<div class="form-row">
   		<div class="col">
        <label>Product Name</label>
   			<input type="text" name="name" class="form-control" value="{{old('name')}}" required>
   		</div>
   		<div class="col">
          <label>Product price</label>
   			<input type="number" name="price" class="form-control" value="{{old('price')}}" required>
   		</div>
   	</div>

    <div class="form-row my-4">
      <div class="col">
        <label>Product stock</label>
        <input type="number" name="stock" class="form-control" value="{{old('stock')}}" required>
      </div>
      <div class="col">
          <label>Product Image</label>
        <input type="file" name="image" class="form-control"  required>
      </div>
    </div>

    <div class="form-row my-4">
      <div class="col">
        <label>Product Description</label>
        <textarea  name="description" class="form-control" required>{{old('description')}}</textarea>
      </div>

    </div>



   <button type="submit" class="btn btn-success">Create</button>
   </form>

 </div>
</div>

@endsection
