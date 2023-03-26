<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $image
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class News extends Model
{
	protected $table = 'news';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'title',
		'description',
		'type',
		'image',
		'status',
		'date'
	];
}
