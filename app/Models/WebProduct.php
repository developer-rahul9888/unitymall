<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WebProduct
 * 
 * @property int $id
 * @property string|null $p_id
 * @property int $web_id
 * @property string $pname
 * @property string $s_name
 * @property string $category
 * @property string $description
 * @property string $s_discription
 * @property string $image
 * @property string $visibility
 * @property string $sku
 * @property float $price
 * @property float $cost
 * @property string $status
 * @property string $product_type
 * @property string $attribute
 * @property string $url
 * @property Carbon $s_date
 * @property string $e_date
 *
 * @package App\Models
 */
class WebProduct extends Model
{
	protected $table = 'web_product';
	public $timestamps = false;

	protected $casts = [
		'web_id' => 'int',
		'price' => 'float',
		'cost' => 'float'
	];

	protected $dates = [
		's_date'
	];

	protected $fillable = [
		'p_id',
		'web_id',
		'pname',
		's_name',
		'category',
		'description',
		's_discription',
		'image',
		'visibility',
		'sku',
		'price',
		'cost',
		'status',
		'product_type',
		'attribute',
		'url',
		's_date',
		'e_date'
	];
}
