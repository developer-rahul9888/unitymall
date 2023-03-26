<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Order;
use App\Models\Click;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string $f_name
 * @property string $l_name
 * @property string $email
 * @property string $pass_word
 * @property string $tr_pin
 * @property string $parent_customer_id
 * @property string $customer_id
 * @property string $direct_customer_id
 * @property string $position
 * @property string $phone
 * @property string $bsacode
 * @property string $rank
 * @property int $percentage
 * @property string $image
 * @property string $gender
 * @property string $dob
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $pincode
 * @property string $nominee
 * @property string $nominee_rel
 * @property string $nominee_dob
 * @property string $pancard
 * @property string $panimage
 * @property string $applied_pan
 * @property string $aadhar
 * @property string $aadharimage
 * @property string $b_aadhar_img
 * @property string $applied_aadhar
 * @property string $bank_name
 * @property string $bank_img
 * @property string $back_adhar_img
 * @property string $bank_prof_img
 * @property string $branch
 * @property string $account_name
 * @property string $account_type
 * @property string $account_no
 * @property string $bank_city
 * @property string $bank_state
 * @property string $ifsc
 * @property string $status
 * @property string $var_status
 * @property string $repurchase
 * @property float $bliss_amount
 * @property int $points
 * @property int $reward_wallet
 * @property int $cashback_amount
 * @property int $user_level
 * @property int $capping
 * @property int $consume
 * @property int $direct
 * @property int $left_direct
 * @property int $right_direct
 * @property float $sbv
 * @property int $package
 * @property string $package_used
 * @property int $franchise
 * @property int $booster
 * @property int $reward
 * @property Carbon $rdate
 *
 * @package App\Models
 */
class Customer extends Authenticatable
{
	protected $table = 'customer';
	public $timestamps = false;

	protected $casts = [
		'percentage' => 'int',
		'pincode' => 'int',
		'bliss_amount' => 'float',
		'points' => 'int',
		'reward_wallet' => 'int',
		'cashback_amount' => 'int',
		'user_level' => 'int',
		'capping' => 'int',
		'consume' => 'int',
		'direct' => 'int',
		'left_direct' => 'int',
		'right_direct' => 'int',
		'sbv' => 'float',
		'package' => 'int',
		'franchise' => 'int',
		'booster' => 'int',
		'reward' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'f_name',
		'l_name',
		'email',
		'pass_word',
		'tr_pin',
		'parent_customer_id',
		'customer_id',
		'direct_customer_id',
		'position',
		'phone',
		'bsacode',
		'rank',
		'percentage',
		'image',
		'gender',
		'dob',
		'address',
		'city',
		'state',
		'country',
		'pincode',
		'nominee',
		'nominee_rel',
		'nominee_dob',
		'pancard',
		'panimage',
		'applied_pan',
		'aadhar',
		'aadharimage',
		'b_aadhar_img',
		'applied_aadhar',
		'bank_name',
		'bank_img',
		'back_adhar_img',
		'bank_prof_img',
		'branch',
		'account_name',
		'account_type',
		'account_no',
		'bank_city',
		'bank_state',
		'ifsc',
		'status',
		'var_status',
		'repurchase',
		'bliss_amount',
		'points',
		'reward_wallet',
		'cashback_amount',
		'user_level',
		'capping',
		'consume',
		'direct',
		'left_direct',
		'right_direct',
		'sbv',
		'package',
		'package_used',
		'franchise',
		'booster',
		'reward',
		'rdate'
	];

	public function orders($where=[]){
		$orders = $this->hasMany(Order::class, 'user_id', 'id');
		if($where) {
			foreach($where as $key=>$value) {
				$orders->where($key,$value);
			}
		}
		return $orders;
	}

	public function clicks(){
		return $this->hasMany(Click::class, 'user_id', 'id');
	}
}
