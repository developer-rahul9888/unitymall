<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditDebit
 * 
 * @property int $id
 * @property string $user_id
 * @property float $credit_amt
 * @property float $debit_amt
 * @property float $final_bal
 * @property string $receiver_id
 * @property string $sender_id
 * @property Carbon $receive_date
 * @property string $ttype
 * @property string $TranDescription
 * @property string $Cause
 * @property string $Remark
 *
 * @package App\Models
 */
class CreditDebit extends Model
{
	protected $table = 'credit_debit';
	public $timestamps = false;

	protected $casts = [
		'credit_amt' => 'float',
		'debit_amt' => 'float',
		'final_bal' => 'float'
	];

	protected $dates = [
		'receive_date'
	];

	protected $fillable = [
		'user_id',
		'credit_amt',
		'debit_amt',
		'final_bal',
		'receiver_id',
		'sender_id',
		'receive_date',
		'ttype',
		'TranDescription',
		'Cause',
		'Remark'
	];
}
