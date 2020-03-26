<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$id}}">
{{$title ?? 'Add to cart'}}</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-green-500">
        <h5 class="modal-title" id="exampleModalLabel">{{$title ?? 'Add to cart'}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
        <form method="post" action="{{route('cart.store')}}" id="form{{$id}}">
          @csrf
 <input type="hidden" name="update" value="{{$update ?? ''}}">
          <input type="hidden" name="id" value="{{$id}}">

        <div class="input-group mb-3">
          <label>Enter Quantity</label>
          <div class="input-group-prepend">
            <span class="input-group-text">min:1</span>
          </div>
          <input type="number" min="1" max="{{$stock}}" name="qty" class="form-control" aria-label="Amount (to the nearest dollar)">
          <div class="input-group-append">
            <span class="input-group-text">max:{{ $stock}}</span>
          </div>
        </div>

  <button type="submit" class="btn btn-success"   onclick="event.preventDefault();
                 document.getElementById('form{{$id}}').submit();">Order Now !!</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
