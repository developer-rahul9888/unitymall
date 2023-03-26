<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RepurchaseBv
 * 
 * @property int $id
 * @property int $user_id
 * @property float $lbv
 * @property float $rbv
 * @property float $sbv
 * @property int $plcount
 * @property int $prcount
 * @property Carbon $rdate
 *
 * @package App\Models
 */
class RepurchaseBv extends Model
{
	protected $table = 'repurchase_bv';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'lbv' => 'float',
		'rbv' => 'float',
		'sbv' => 'float',
		'plcount' => 'int',
		'prcount' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'user_id',
		'lbv',
		'rbv',
		'sbv',
		'plcount',
		'prcount',
		'rdate'
	];
}
