<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'reason',
    'date_quote',
    'status',
    'user_id',
    'central_id',
  ];

  /**
   * Get the central that owns the Quote
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function central(): BelongsTo
  {
      return $this->belongsTo(Central::class);
  }

  /**
   * Get the user that owns the Quote
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class);
  }

}
