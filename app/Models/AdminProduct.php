<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminProduct
 * 
 * @property int $id
 * @property string|null $p_id
 * @property string $pname
 * @property string $s_name
 * @property string $category
 * @property string $description
 * @property string $s_discription
 * @property string $image
 * @property string $sku
 * @property string $weight
 * @property string $t_class
 * @property int $mid
 * @property string $visibility
 * @property float $price
 * @property float $cost
 * @property float $actual_price
 * @property float $p_d_price
 * @property int $p_qty
 * @property string $hsn
 * @property string $dimensions
 * @property string $origin
 * @property int $free_product
 * @property string $m_name
 * @property string $b_code
 * @property string $color
 * @property string $colors
 * @property string $free_id
 * @property string $model
 * @property string $s_p_n_f_date
 * @property string $rdate
 * @property string $status
 * @property string $product_type
 * @property string $images
 * @property string $attribute
 * @property string $s_p_n_to_date
 * @property string $spfdate
 * @property string $sptdate
 * @property int $comm_dis
 *
 * @package App\Models
 */
class AdminProduct extends Model
{
	protected $table = 'admin_product';
	public $timestamps = false;

	protected $casts = [
		'mid' => 'int',
		'price' => 'float',
		'cost' => 'float',
		'actual_price' => 'float',
		'p_d_price' => 'float',
		'p_qty' => 'int',
		'free_product' => 'int',
		'comm_dis' => 'int'
	];

	protected $fillable = [
		'p_id',
		'pname',
		's_name',
		'category',
		'description',
		's_discription',
		'image',
		'sku',
		'weight',
		't_class',
		'mid',
		'visibility',
		'price',
		'cost',
		'actual_price',
		'p_d_price',
		'p_qty',
		'hsn',
		'dimensions',
		'origin',
		'free_product',
		'm_name',
		'b_code',
		'color',
		'colors',
		'free_id',
		'model',
		's_p_n_f_date',
		'rdate',
		'status',
		'product_type',
		'images',
		'attribute',
		's_p_n_to_date',
		'spfdate',
		'sptdate',
		'comm_dis'
	];
}
