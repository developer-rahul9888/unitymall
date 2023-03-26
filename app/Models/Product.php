<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\OrderItem;

/**
 * Class Product
 * 
 * @property int $id
 * @property string|null $p_id
 * @property string $pname
 * @property string $s_name
 * @property string $category
 * @property int $sub_category
 * @property string $description
 * @property string $s_discription
 * @property string $image
 * @property string $on_hover
 * @property string $sku
 * @property string $weight
 * @property string $t_class
 * @property string $u_key
 * @property string $visibility
 * @property float $price
 * @property float $cost
 * @property float $bv
 * @property int $delivery_charge
 * @property string $hsn
 * @property string $dimensions
 * @property string $origin
 * @property int $actual_price
 * @property float $p_d_price
 * @property int $comm_dis
 * @property int $reward
 * @property int $p_qty
 * @property string $m_name
 * @property string $b_code
 * @property string $color
 * @property string $colors
 * @property string $free_id
 * @property int $mid
 * @property string $model
 * @property int $web_id
 * @property string $s_p_n_f_date
 * @property string $rdate
 * @property string $status
 * @property string $brand
 * @property string $product_type
 * @property string $images
 * @property string $attribute
 * @property string $s_p_n_to_date
 * @property string $spfdate
 * @property string $sptdate
 * @property int $free_product
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	public $timestamps = false;

	protected $casts = [
		'sub_category' => 'int',
		'price' => 'float',
		'cost' => 'float',
		'bv' => 'float',
		'delivery_charge' => 'int',
		'actual_price' => 'int',
		'p_d_price' => 'float',
		'comm_dis' => 'int',
		'reward' => 'int',
		'p_qty' => 'int',
		'mid' => 'int',
		'web_id' => 'int',
		'free_product' => 'int'
	];

	protected $fillable = [
		'p_id',
		'pname',
		's_name',
		'category',
		'sub_category',
		'description',
		's_discription',
		'image',
		'on_hover',
		'sku',
		'weight',
		't_class',
		'u_key',
		'visibility',
		'price',
		'cost',
		'bv',
		'delivery_charge',
		'hsn',
		'dimensions',
		'origin',
		'actual_price',
		'p_d_price',
		'comm_dis',
		'reward',
		'p_qty',
		'm_name',
		'b_code',
		'color',
		'colors',
		'free_id',
		'mid',
		'model',
		'web_id',
		's_p_n_f_date',
		'rdate',
		'status',
		'brand',
		'product_type',
		'images',
		'attribute',
		's_p_n_to_date',
		'spfdate',
		'sptdate',
		'free_product'
	];

	public function orderItems(){
		return $this->hasMany(OrderItem::class, 'product_id', 'id');
	}
}
