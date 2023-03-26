<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pin
 * 
 * @property int $id
 * @property string $pinid
 * @property float $p_amount
 * @property int $b_volume
 * @property int $capping
 * @property string $pin_type
 * @property string $status
 * @property Carbon $rdate
 * @property int $package
 * @property int $percentage
 * @property int $re_purchase
 * @property int $franchisee
 * @property int $area_franc
 * @property int $dist_franc
 * @property int $state_franc
 * @property string $created_by_user
 * @property string $assign_to
 * @property string $sender_id
 * @property string $move_to
 * @property Carbon $used_on
 * @property string $used_by
 *
 * @package App\Models
 */
class Pin extends Model
{
	protected $table = 'pins';
	public $timestamps = false;

	protected $casts = [
		'p_amount' => 'float',
		'b_volume' => 'int',
		'capping' => 'int',
		'package' => 'int',
		'percentage' => 'int',
		're_purchase' => 'int',
		'franchisee' => 'int',
		'area_franc' => 'int',
		'dist_franc' => 'int',
		'state_franc' => 'int'
	];

	protected $dates = [
		'rdate',
		'used_on'
	];

	protected $fillable = [
		'pinid',
		'p_amount',
		'b_volume',
		'capping',
		'pin_type',
		'status',
		'rdate',
		'package',
		'percentage',
		're_purchase',
		'franchisee',
		'area_franc',
		'dist_franc',
		'state_franc',
		'created_by_user',
		'assign_to',
		'sender_id',
		'move_to',
		'used_on',
		'used_by'
	];
}
