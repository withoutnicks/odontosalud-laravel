<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Central extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name'
	];

	/**
	 * Get all of the quotes for the Central
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function quotes(): HasMany
	{
			return $this->hasMany(Quote::class);
	}
}
