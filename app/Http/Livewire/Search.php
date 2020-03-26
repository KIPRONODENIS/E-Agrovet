<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;
class Search extends Component
{

  public $searchTerm='ki';
  public $users;
    public function render()
    {


       $this->users=User::where('name','=',"%{$this->searchTerm}%")->get()->toArray();

        return view('livewire.search');
    }
}
