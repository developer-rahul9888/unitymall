<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UploadReceipt
 * 
 * @property int $id
 * @property string $website
 * @property string $product
 * @property string $image
 * @property string $description
 * @property string $amount
 * @property string $status
 * @property string $customer_id
 * @property int $commission
 * @property int $cashback
 *
 * @package App\Models
 */
class UploadReceipt extends Model
{
	protected $table = 'upload_receipt';
	public $timestamps = false;

	protected $casts = [
		'commission' => 'int',
		'cashback' => 'int'
	];

	protected $fillable = [
		'website',
		'product',
		'image',
		'description',
		'amount',
		'status',
		'customer_id',
		'commission',
		'cashback'
	];
}
