<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Webstore
 * 
 * @property int $id
 * @property string $web_name
 * @property string $category
 * @property string $web_dis
 * @property string $web_s_dis
 * @property string $web_url
 * @property string $web_img
 * @property string $web_status
 *
 * @package App\Models
 */
class Webstore extends Model
{
	protected $table = 'webstores';
	public $timestamps = false;

	protected $fillable = [
		'web_name',
		'category',
		'web_dis',
		'web_s_dis',
		'web_url',
		'web_img',
		'web_status'
	];
}
