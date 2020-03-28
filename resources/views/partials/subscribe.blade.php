  
      @if(Auth::user()->subscriptions->count()==0)




    <div class="alert-info w-full mx-auto p-3">Please Subscribe to Enjoy Our Services<button class=" btn btn-primary float-right"  data-toggle="modal" data-target="#subscribe">Subscribe</button>


<!-- Modal -->
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-info">
        <h5 class="modal-title  py-2 font-bold text-gray-700 text-center text-md tracking-widest uppercase" id="exampleModalLabel">Subscribe to Premium Plan @ ksh 300</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="bg-white rounded shadow w-2/3 mx-auto">
                <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
                  Subscribe
                </div>

                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('user.subscribe')}}">
                    {{ csrf_field() }}

                    <div class="mb-3">
                      <label>Enter Phone No.</label>
                        <input class="border w-full p-3" name="phone" type="phone" placeholder="Phone" pattern='^0\d{9}'>
                        @error('phone')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                      <label> Amount </label>
                        <input class="border w-full p-3" name="amount" type="number" value="{{app('rinvex.subscriptions.plan')->first()->price}}" disabled>
                           @error('amount')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex">
                        <button type="submit" class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider rounded">
                          Subscribe
                        </button>
                    </div>
                </form>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
    </div>
  @endif
