<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransactionLog
 * 
 * @property int $id
 * @property int $userid
 * @property string $type
 * @property string $description
 * @property float $amount
 * @property float $tds
 * @property float $admin
 * @property float $net_income
 * @property string $status
 * @property string $bank_tran
 * @property Carbon $rdate
 * @property Carbon $udate
 *
 * @package App\Models
 */
class TransactionLog extends Model
{
	protected $table = 'transaction_log';
	public $timestamps = false;

	protected $casts = [
		'userid' => 'int',
		'amount' => 'float',
		'tds' => 'float',
		'admin' => 'float',
		'net_income' => 'float'
	];

	protected $dates = [
		'rdate',
		'udate'
	];

	protected $fillable = [
		'userid',
		'type',
		'description',
		'amount',
		'tds',
		'admin',
		'net_income',
		'status',
		'bank_tran',
		'rdate',
		'udate'
	];
}
