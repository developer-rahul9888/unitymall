<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantQuery
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property Carbon $sdate
 *
 * @package App\Models
 */
class MerchantQuery extends Model
{
	protected $table = 'merchant_query';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'sdate'
	];

	protected $fillable = [
		'id',
		'name',
		'email',
		'subject',
		'message',
		'sdate'
	];
}
