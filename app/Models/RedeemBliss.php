<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RedeemBliss
 * 
 * @property int $rd_id
 * @property string $bank_tran
 * @property string $balance
 * @property string $redeem
 * @property int $after_tds
 * @property int $user_id
 * @property string $redeem_status
 * @property Carbon $rdate
 * @property string $status
 * @property string $voucher_email
 * @property string $my_bliss_req
 *
 * @package App\Models
 */
class RedeemBliss extends Model
{
	protected $table = 'redeem_bliss';
	protected $primaryKey = 'rd_id';
	public $timestamps = false;

	protected $casts = [
		'after_tds' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'bank_tran',
		'balance',
		'redeem',
		'after_tds',
		'user_id',
		'redeem_status',
		'rdate',
		'status',
		'voucher_email',
		'my_bliss_req'
	];
}
