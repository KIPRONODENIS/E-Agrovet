<div>
    {{-- The whole world belongs to you --}}

  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-3/4 mx-auto mt-5">
    <div class="bg-white shadow-md rounded pt-4 pb-3 mb-4 text-green-800">
  <h1 class="h4 mx-3 bold">Checkout</h1>
    </div>

    <div class="-mx-3 md:flex mb-6">
      <div class="md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        YOUR MPESA PHONE:*
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" name="phone" type="phone" placeholder="0799012907" required pattern='^0\d{9}'>
        @error('phone')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div>

    </div>

    <div class="-mx-3 md:flex mb-2">
      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city" required>
          Town
        </label>

        <select wire:model="town" wire:change='SwitchTown()' name="town" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Albuquerque">
        	@if(count($towns)>0)
        	@foreach($towns as $town)
        	<option value="{{$town['id']}}">{{$town['name']}}</option>
       
        	@endforeach
        	@endif
        </select>
        @error('town')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div>
      <!-- <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
        SubCounty
        </label>
        <div class="relative">
          <select name="subcounty" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
            <option>Imenti North</option>
            <option>Imenti South</option>
            <option>Maua Town</option>
          </select>
          <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
        </div>
        @error('subcounty')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div> -->

      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
        Pick up Station
        </label>
        <select wire:model.lazy='station' name="station" class=" block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="90210" required>
        	<option value="" selected>Selecte pickup</option>
        	@if(count($Stations)>0)
        	@foreach($Stations as $station)
        	<option value="{{$station['id']}}" {{$Stations[0]['id']==$station['id'] ? 'selected' :''}}>{{$station['name']}}</option>
        	

        	@endforeach
        	@endif
        </select>
        @error('station')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div>

    </div>

    <button type="submit" class="shadow-sm btn-success w-full py-4 mt-4 rounded">Pay Now</button>
  </div>
</div>
