<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantsBankDetail
 * 
 * @property int $id
 * @property string $merchant_id
 * @property string $ac_h_name
 * @property string $ac_no
 * @property string $gst
 * @property string $b_name
 * @property string $city
 * @property string $br_detail
 * @property string $ifce_code
 * @property string $mirc_code
 *
 * @package App\Models
 */
class MerchantsBankDetail extends Model
{
	protected $table = 'merchants_bank_detail';
	public $timestamps = false;

	protected $fillable = [
		'merchant_id',
		'ac_h_name',
		'ac_no',
		'gst',
		'b_name',
		'city',
		'br_detail',
		'ifce_code',
		'mirc_code'
	];
}
