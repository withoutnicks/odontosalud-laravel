<?php

namespace App\Livewire;

use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class QuoteComponent extends Component
{
    public $quoteId;
    #[Validate('required', message:'¿Por qué quiere la cita?')] 
    #[Validate('min:5', message:'Son minimo 5 caracteres')]
    public $reason;
    #[Validate('required', message:'Debes elegir un dia')]
    #[Validate('after:today', message:'Debes elegir una fecha futura')]
    public $date;
    #[Validate('required', message:'Debes eligir una ubicacion')]
    #[Validate('exists:centrals,id', message:'La ubicacion no es valida')]
    public $centralId;

    public $form_quotes = false;

    public function getQuotesProperty()
    {
        return Quote::where('user_id', Auth::id())->with('central')->get();
    }

    private function clearFields()
	{
		$this->quoteId = null;
		$this->reason = '';
		$this->date = '';
        $this->centralId = null;
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

    public function saveQuote()
	{
        $this->validate(); 

		Quote::updateOrCreate(
			['id' => $this->quoteId],
			[
				'reason' => $this->reason,
				'date_quote' => $this->date,
                'central_id' => $this->centralId,
                'status' => 'pending',
				'user_id' => Auth::id()
			]
		);

		$this->clearFields();
		$this->form_quotes = false;
	}
}
