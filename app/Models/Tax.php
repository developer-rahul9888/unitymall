<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tax
 * 
 * @property int $id
 * @property string $title
 * @property string $amount
 * @property string $type
 *
 * @package App\Models
 */
class Tax extends Model
{
	protected $table = 'tax';
	public $timestamps = false;

	protected $fillable = [
		'title',
		'amount',
		'type'
	];
}
