<?php

namespace App\Livewire;

use App\Models\Quote;
use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $search = '';
    public $selectedUserId = null; // Guardamos el id del usuario seleccionado
    public $quotes = [];

    public function render()
    {
        $searches = [];

        if (strlen($this->search) > 3 ) 
        {
            $searches = User::where('name', 'like', '%' . $this->search . '%')
            ->where('permissions', '!=', '1')
            ->get();
        }
        
        return view('livewire.dashboard-component', [
            'searches' => $searches
        ]);
    }

    public function loadQuotes($userId) 
    {
        $this->selectedUserId = $userId;
        $this->quotes = Quote::where('user_id', $this->selectedUserId)->get();

        // Reseteamos el buscador
        $this->search = '';
    }
}
