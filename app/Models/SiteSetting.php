<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteSetting
 * 
 * @property int $id
 * @property string $maintenance
 * @property string $meta_val
 * @property string $status
 *
 * @package App\Models
 */
class SiteSetting extends Model
{
	protected $table = 'site_setting';
	public $timestamps = false;

	protected $fillable = [
		'maintenance',
		'meta_val',
		'status'
	];
}
