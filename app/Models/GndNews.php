<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GndNews
 * 
 * @property int $id
 * @property string $title
 * @property string $discription
 * @property string $type
 * @property string $visibility
 * @property string $image
 * @property string $status
 *
 * @package App\Models
 */
class GndNews extends Model
{
	protected $table = 'gnd_news';
	public $timestamps = false;

	protected $fillable = [
		'title',
		'discription',
		'type',
		'visibility',
		'image',
		'status'
	];
}
