<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FinalEWallet
 * 
 * @property int $id
 * @property string $user_id
 * @property float $amount
 * @property int $status
 * @property Carbon $c_date
 *
 * @package App\Models
 */
class FinalEWallet extends Model
{
	protected $table = 'final_e_wallet';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'c_date'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'status',
		'c_date'
	];
}
