@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="card bg-green-200">

 <div class="card-body">

   <form class="w-1/2 mx-auto" enctype="multipart/form-data" method="post" action="{{route('agrovet.product.update',$product->id)}}">
@csrf
@method('put')
 <h1 class="h2 my-2">Edit New Product</h1>
   	<div class="form-row">
   		<div class="col">
        <label>Product Name</label>
   			<input type="text" name="name" class="form-control" value="{{$product->name}}" required>
   		</div>
   		<div class="col">
          <label>Product price</label>
   			<input type="number" name="price" class="form-control" value="{{$product->price}}" required>
   		</div>
   	</div>

    <div class="form-row my-4">
      <div class="col">
        <label>Product stock</label>
        <input type="number" name="stock" class="form-control" value="{{$product->stock}}" required>
      </div>
      <div class="col">
          <label>Product Image</label>
        <input type="file" name="image" class="form-control" >
      </div>
    </div>

    <div class="form-row my-4">
      <div class="col">
        <label>Product Description</label>
        <textarea  name="description" class="form-control" required>{{$product->description}}</textarea>
      </div>

    </div>



   <button type="submit" class="btn btn-success">update</button>
   </form>

 </div>
</div>

@endsection
