<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $c_name
 * @property string $c_description
 * @property string $type
 * @property string $image
 * @property string $icon
 * @property string $position
 * @property string $status
 * @property int $p_id
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categorys';
	public $timestamps = false;

	protected $casts = [
		'p_id' => 'int'
	];

	protected $fillable = [
		'c_name',
		'c_description',
		'type',
		'image',
		'icon',
		'position',
		'status',
		'p_id'
	];
}
