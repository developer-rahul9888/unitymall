<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSale
 * 
 * @property int $id
 * @property int $p_id
 * @property string $pname
 * @property string $slip_no
 * @property string $slip_img
 * @property string $address
 * @property float $amount
 * @property string $status
 * @property Carbon $rdate
 * @property string $user_id
 * @property string $repurchase
 * @property string $dis_date
 * @property Carbon $deliverd_date
 *
 * @package App\Models
 */
class ProductSale extends Model
{
	protected $table = 'product_sale';
	public $timestamps = false;

	protected $casts = [
		'p_id' => 'int',
		'amount' => 'float'
	];

	protected $dates = [
		'rdate',
		'deliverd_date'
	];

	protected $fillable = [
		'p_id',
		'pname',
		'slip_no',
		'slip_img',
		'address',
		'amount',
		'status',
		'rdate',
		'user_id',
		'repurchase',
		'dis_date',
		'deliverd_date'
	];
}
