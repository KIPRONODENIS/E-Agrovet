<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Station;
use App\Town;
class Checkout extends Component
{
	public $phone;
	public $towns;
	public $Stations;
	public $station;
	public $town=1;

  public function mount() {
  
  	$this->towns=Town::all()->toArray();
  
  		$this->Stations=Town::find($this->town)->stations->toArray();
  }
	public function SwitchTown() {
		
		$this->Stations=Town::find($this->town)->stations->toArray();
	}
    public function render()
    {
        return view('livewire.checkout');
    }
}
