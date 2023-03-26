<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Merchant
 * 
 * @property int $id
 * @property string $d_name
 * @property string $email
 * @property string $gst
 * @property string $pass_word
 * @property string $merchant_id
 * @property string $phone
 * @property string $store_name
 * @property string $m_comm
 * @property string $status
 * @property string $delivery_charge
 * @property int $merchant_type
 * @property Carbon $rdate
 * @property int $access
 *
 * @package App\Models
 */
class Merchant extends Model
{
	protected $table = 'merchants';
	public $timestamps = false;

	protected $casts = [
		'merchant_type' => 'int',
		'access' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'd_name',
		'email',
		'gst',
		'pass_word',
		'merchant_id',
		'phone',
		'store_name',
		'm_comm',
		'status',
		'delivery_charge',
		'merchant_type',
		'rdate',
		'access'
	];
}
