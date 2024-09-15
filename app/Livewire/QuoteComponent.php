<?php

namespace App\Livewire;

use App\Models\Central;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuoteComponent extends Component
{
    public $form_quotes = false;

    public function getQuotesProperty()
    {
        return Quote::where('user_id', Auth::id())->with('central')->get();
    }

    public function render()
    {
        return view('livewire.quote-component', [
            'quotes' => $this->quotes,
        ]);
    }

    public function toggleFormQuotes()
    {
        $this->form_quotes = !$this->form_quotes;
    }
}
