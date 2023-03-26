<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MatrixO
 * 
 * @property int $id
 * @property int $user_id
 * @property int $parent_id
 * @property int $direct_id
 * @property int $children
 * @property Carbon $rdate
 *
 * @package App\Models
 */
class MatrixO extends Model
{
	protected $table = 'matrix_o';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'parent_id' => 'int',
		'direct_id' => 'int',
		'children' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'user_id',
		'parent_id',
		'direct_id',
		'children',
		'rdate'
	];
}
