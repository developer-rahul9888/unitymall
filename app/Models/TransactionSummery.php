<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionSummery
 * 
 * @property int $id
 * @property string $user_id
 * @property string $dis
 * @property float $dr
 * @property float $cr
 * @property int $qty
 * @property int $comment
 * @property string $how_to_pay
 * @property string $coupon_val
 * @property string $coupon
 * @property string $status
 * @property Carbon $e_date
 *
 * @package App\Models
 */
class TransactionSummery extends Model
{
	protected $table = 'transaction_summery';
	public $timestamps = false;

	protected $casts = [
		'dr' => 'float',
		'cr' => 'float',
		'qty' => 'int',
		'comment' => 'int'
	];

	protected $dates = [
		'e_date'
	];

	protected $fillable = [
		'user_id',
		'dis',
		'dr',
		'cr',
		'qty',
		'comment',
		'how_to_pay',
		'coupon_val',
		'coupon',
		'status',
		'e_date'
	];
}
