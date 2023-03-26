<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Popup
 * 
 * @property int $id
 * @property string $title
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $type
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Popup extends Model
{
	protected $table = 'popup';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'title',
		'name',
		'image',
		'description',
		'type',
		'status',
		'date'
	];
}
