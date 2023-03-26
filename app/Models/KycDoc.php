<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KycDoc
 * 
 * @property int $id
 * @property string $user_id
 * @property string $photo_graph
 * @property string $pan_card
 * @property string $aadhar_gst
 * @property string $mail_doc
 * @property string $pass_book_cheque
 * @property string $product_id1
 * @property string $product_id2
 * @property string $product_id3
 * @property string $product_id4
 * @property string $product_id5
 * @property string $mail_doc_type
 * @property Carbon $c_date
 * @property Carbon $e_date
 * @property int $status
 *
 * @package App\Models
 */
class KycDoc extends Model
{
	protected $table = 'kyc_doc';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'c_date',
		'e_date'
	];

	protected $fillable = [
		'user_id',
		'photo_graph',
		'pan_card',
		'aadhar_gst',
		'mail_doc',
		'pass_book_cheque',
		'product_id1',
		'product_id2',
		'product_id3',
		'product_id4',
		'product_id5',
		'mail_doc_type',
		'c_date',
		'e_date',
		'status'
	];
}
