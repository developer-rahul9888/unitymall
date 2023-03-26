<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voucher
 * 
 * @property int $id
 * @property string|null $p_id
 * @property string $pname
 * @property string $s_name
 * @property string $attribute
 * @property string $category
 * @property string $description
 * @property string $s_discription
 * @property string $image
 * @property string $sku
 * @property string $weight
 * @property float $price
 * @property int $points
 * @property int $p_qty
 * @property Carbon $rdate
 * @property string $status
 * @property int $comm_dis
 *
 * @package App\Models
 */
class Voucher extends Model
{
	protected $table = 'voucher';
	public $timestamps = false;

	protected $casts = [
		'price' => 'float',
		'points' => 'int',
		'p_qty' => 'int',
		'comm_dis' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'p_id',
		'pname',
		's_name',
		'attribute',
		'category',
		'description',
		's_discription',
		'image',
		'sku',
		'weight',
		'price',
		'points',
		'p_qty',
		'rdate',
		'status',
		'comm_dis'
	];
}
