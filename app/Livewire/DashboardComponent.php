<?php

namespace App\Livewire;

use App\Models\Quote;
use App\Models\User;
use Livewire\Component;

class DashboardComponent extends Component
{

    public function numUsers()
    {
        return User::count();
    }

    public function numQuotes()
    {
        return Quote::count();
    }

    public function numQuotesActive()
    {
        return Quote::where('status', 'active')->count();
    }

    public function render()
    {
        return view('livewire.dashboard-component', [
            'users' => $this->numUsers(),
            'quotes' => $this->numQuotes(),
            'quotesActive' => $this->numQuotesActive(),
        ]);
    }
}
