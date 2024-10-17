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
  /*
   * 🚀 - Entitys 
   */
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

  #[Url(history: true)]
  public $selectedUserId = null;

  public $status = 'pending';

  public $search = '';
  public $form_quotes = false;
  public $form_delete = false;

  public function toggleFormQuotes()
  {
    $this->form_quotes = !$this->form_quotes;
  }

  public function toggleFormDelete()
  {
    $this->form_delete = !$this->form_delete;
  }

  private function clearFields()
  {
    $this->quoteId = null;
    $this->reason = '';
    $this->date = '';
    $this->centralId = null;
  }

  /**
   * Retrieves all quotes for the authenticated user, including related central data.
   *
   * @return \Illuminate\Database\Eloquent\Collection A collection of Quote models with their related Central data.
   */
  public function getQuotesProperty()
  {
    return Quote::where('user_id', Auth::id())->with('central')->get();
  }

  /**
   * Retrieves quotes based on the selected user and permissions.
   * If the authenticated user has permissions and a selected user is set,
   * it retrieves quotes for the selected user. Otherwise, it retrieves quotes for the authenticated user.
   *
   * @return \Illuminate\Database\Eloquent\Collection A collection of Quote models with their related Central data.
   */
  public function getFilteredQuotesProperty()
  {
    if (Auth::user()->permissions && $this->selectedUserId) {
      return Quote::where('user_id', $this->selectedUserId)->with('central')->get();
    }

    return $this->getQuotesProperty();
  }

  /**
   * Selects a user and clears the search field.
   *
   * This function updates the selected user ID and clears the search field.
   * It is used when a user is selected from the search results or when a new user is to be selected.
   *
   * @param int $userId The ID of the user to be selected.
   *
   * @return void
   */
  public function selectUser($userId)
  {
    $this->selectedUserId = $userId;
    $this->search = '';
  }

  /**
   * Retrieves a list of users based on the given search term and permissions.
   *
   * This function is used to search for users by their name, excluding users with admin permissions.
   * It uses Laravel's Eloquent ORM to query the database and retrieve the matching users.
   *
   * @param string $search The search term to filter users by their name.
   *
   * @return \Illuminate\Database\Eloquent\Collection A collection of User models that match the search criteria.
   */
  public function searchUser($search)
  {
    return User::where('name', 'like', '%' . $search . '%')
      ->where('permissions', '!=', '1')
      ->get();
  }

  public function saveQuote()
  {
    $this->validate();

    $status = Auth::user()->permissions ? $this->status : 'pending';
    $userId = Auth::user()->permissions ? $this->selectedUserId : Auth::id();

    Quote::updateOrCreate(
      ['id' => $this->quoteId],
      [
        'reason' => $this->reason,
        'date_quote' => $this->date,
        'central_id' => $this->centralId,
        'status' => $status,
        'user_id' => $userId
      ]
    );

    $this->clearFields();
    $this->form_quotes = false;
  }

  public function deleteQuote(Quote $q)
  {
    $q->delete();
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
