<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class YtGallery
 * 
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property string $type
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class YtGallery extends Model
{
	protected $table = 'yt_gallery';
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'title',
		'url',
		'description',
		'type',
		'status',
		'date'
	];
}
