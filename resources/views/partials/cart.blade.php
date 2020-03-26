<li class="nav-item">
    <a class="nav-link p-2" href="{{ route('cart.index') }}">{{ __('Cart') }}
@if($cartCount>0)
      <span class="badge badge-danger  rounded">
{{$cartCount}}
    </span>
  @endif
  </a>
</li>
