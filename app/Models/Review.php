<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $pro_id
 * @property int $mer_id
 * @property int $rating
 * @property string $status
 * @property Carbon $r_date
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	public $timestamps = false;

	protected $casts = [
		'pro_id' => 'int',
		'mer_id' => 'int',
		'rating' => 'int'
	];

	protected $dates = [
		'r_date'
	];

	protected $fillable = [
		'name',
		'email',
		'comment',
		'pro_id',
		'mer_id',
		'rating',
		'status',
		'r_date'
	];
}
