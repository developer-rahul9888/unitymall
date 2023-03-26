<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Newproduct
 * 
 * @property string $Handle
 * @property string $Title
 * @property string $Body
 * @property string $Vendor
 * @property string $Product_type
 * @property string $SKU
 * @property string $Weight
 * @property string $Qty
 * @property string $variant_price
 * @property string $variant_compare_price
 * @property string $image
 * @property string $WeightUnit
 * @property string $price
 * @property string $Brand
 * @property string $Status
 *
 * @package App\Models
 */
class Newproduct extends Model
{
	protected $table = 'newproduct';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'Handle',
		'Title',
		'Body',
		'Vendor',
		'Product_type',
		'SKU',
		'Weight',
		'Qty',
		'variant_price',
		'variant_compare_price',
		'image',
		'WeightUnit',
		'price',
		'Brand',
		'Status'
	];
}
