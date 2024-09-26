<?php

namespace App\Livewire;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Url;
use Livewire\Component;

class QuoteComponent extends Component
{
  public $quoteId;
  #[Validate('required', message: '¿Por qué quiere la cita?')]
  #[Validate('min:5', message: 'Son minimo 5 caracteres')]
  public $reason;
  #[Validate('required', message: 'Debes elegir un dia')]
  #[Validate('after:today', message: 'Debes elegir una fecha futura')]
  public $date;
  #[Validate('required', message: 'Debes eligir una ubicacion')]
  #[Validate('exists:centrals,id', message: 'La ubicacion no es valida')]
  public $centralId;

  public $search = '';

  #[Url(history: true)]
  public $selectedUserId = null;
  public $form_quotes = false;

  public function getQuotesProperty()
  {
    return Quote::where('user_id', Auth::id())->with('central')->get();
  }

  public function getFilteredQuotesProperty()
  {
    if (Auth::user()->permissions && $this->selectedUserId) {
      return Quote::where('user_id', $this->selectedUserId)->with('central')->get();
    }

    return $this->getQuotesProperty();
  }


  public function selectUser($userId)
  {
    $this->selectedUserId = $userId;
    $this->search = '';
  }

  public function searchUser($search)
  {
    return User::where('name', 'like', '%' . $search . '%')
      ->where('permissions', '!=', '1')
      ->get();
  }

  private function clearFields()
  {
    $this->quoteId = null;
    $this->reason = '';
    $this->date = '';
    $this->centralId = null;
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

  public function updateQuote(Quote $q)
  {
    $this->quoteId = $q->id;
    $this->reason = $q->reason;
    $this->date = $q->date_quote;
    $this->centralId = $q->central_id;

    $this->form_quotes = true;
  }

  public function render()
  {
    $searches = strlen($this->search) > 2 && Auth::user()->permissions ? $this->searchUser($this->search) : [];

    return view('livewire.quote-component', [
      'quotes' => $this->filteredQuotes,
      'searches' => $searches,
    ]);
  }
}
