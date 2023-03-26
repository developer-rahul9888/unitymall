<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantMetum
 * 
 * @property int $id
 * @property int $merchant_id
 * @property string $b_details
 * @property string $brands
 * @property string $brand_proof
 * @property string $images
 * @property string $video
 * @property string $business_type
 * @property string $address_s_1
 * @property string $address_s_2
 * @property string $city
 * @property string $state
 * @property int $zip
 * @property string $country
 * @property string $pickup_checkbox
 * @property string $p_address_s_1
 * @property string $p_address_s_2
 * @property string $p_city
 * @property string $p_state
 * @property int $p_zip
 * @property string $p_country
 * @property string $return_checkbox
 * @property string $r_address_s_1
 * @property string $r_address_s_2
 * @property string $sector
 * @property string $r_city
 * @property string $r_state
 * @property int $r_zip
 * @property string $r_country
 * @property string $o_name
 * @property string $attribute
 * @property string $o_email
 * @property string $o_designation
 * @property string $o_phone
 *
 * @package App\Models
 */
class MerchantMetum extends Model
{
	protected $table = 'merchant_meta';
	public $timestamps = false;

	protected $casts = [
		'merchant_id' => 'int',
		'zip' => 'int',
		'p_zip' => 'int',
		'r_zip' => 'int'
	];

	protected $fillable = [
		'merchant_id',
		'b_details',
		'brands',
		'brand_proof',
		'images',
		'video',
		'business_type',
		'address_s_1',
		'address_s_2',
		'city',
		'state',
		'zip',
		'country',
		'pickup_checkbox',
		'p_address_s_1',
		'p_address_s_2',
		'p_city',
		'p_state',
		'p_zip',
		'p_country',
		'return_checkbox',
		'r_address_s_1',
		'r_address_s_2',
		'sector',
		'r_city',
		'r_state',
		'r_zip',
		'r_country',
		'o_name',
		'attribute',
		'o_email',
		'o_designation',
		'o_phone'
	];
}
