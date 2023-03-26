<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StockDetail
 * 
 * @property int $id
 * @property int $user_id
 * @property int $stock_send_qty
 * @property int $p_id
 * @property int $qty
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class StockDetail extends Model
{
	protected $table = 'stock_detail';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'stock_send_qty' => 'int',
		'p_id' => 'int',
		'qty' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'user_id',
		'stock_send_qty',
		'p_id',
		'qty',
		'status',
		'date'
	];
}
