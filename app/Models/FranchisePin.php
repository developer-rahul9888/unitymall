<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FranchisePin
 * 
 * @property int $fid
 * @property string $user_id
 * @property float $amount
 * @property string $package
 * @property string $status
 * @property Carbon $edate
 *
 * @package App\Models
 */
class FranchisePin extends Model
{
	protected $table = 'franchise_pin';
	protected $primaryKey = 'fid';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float'
	];

	protected $dates = [
		'edate'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'package',
		'status',
		'edate'
	];
}
