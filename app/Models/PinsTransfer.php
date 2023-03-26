<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PinsTransfer
 * 
 * @property int $id
 * @property string $pinid
 * @property string $status
 * @property string $amount
 * @property string $pin_type
 * @property string $assign_to
 * @property string $assign_from
 * @property Carbon $rdate
 *
 * @package App\Models
 */
class PinsTransfer extends Model
{
	protected $table = 'pins_transfer';
	public $timestamps = false;

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'pinid',
		'status',
		'amount',
		'pin_type',
		'assign_to',
		'assign_from',
		'rdate'
	];
}
