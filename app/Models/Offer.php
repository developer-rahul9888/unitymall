<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Offer
 * 
 * @property int $id
 * @property int $pname
 * @property string $s_name
 * @property string $status
 * @property string $description
 * @property string $s_discription
 * @property string $product_type
 * @property string $image
 * @property string $attribute
 * @property string $category
 * @property string $p_id
 * @property string $url
 * @property string $web_id
 * @property string $sku
 * @property Carbon $rdate
 *
 * @package App\Models
 */
class Offer extends Model
{
	protected $table = 'offer';
	public $timestamps = false;

	protected $casts = [
		'pname' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'pname',
		's_name',
		'status',
		'description',
		's_discription',
		'product_type',
		'image',
		'attribute',
		'category',
		'p_id',
		'url',
		'web_id',
		'sku',
		'rdate'
	];
}
