<?php

namespace App\Livewire\Praja;

use App\Models\Praja;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        // if ($this->search !== null) {
        //     $users = User::query()->with('role')->where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate();
        // } else {
        //     $users = User::query()->with('role')->latest()->paginate();
        // }

        $users = User::with('role')->when(
            $this->search, function($query, $search) {
                return $query->where('name', 'LIKE', '%'. $search .'%');
            }
        )->latest()->paginate();

        $praja = Praja::query()->when(
            $this->search, function($query, $search) {
                return $query->where('PRAJA_NPP', 'LIKE', $search . '%');
            }
        )->latest()->paginate();

        return view('livewire.praja.table', [
            'praja' => $praja
        ]);
    }
}
