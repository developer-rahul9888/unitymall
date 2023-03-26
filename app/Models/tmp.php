<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class /tmp
 * 
 * @property int $id
 * @property string $data
 * @property string $ip_address
 * @property string $timestamp
 *
 * @package App\Models
 */
class /tmp extends Model
{
	protected $table = '/tmp';
	public $timestamps = false;

	protected $fillable = [
		'data',
		'ip_address',
		'timestamp'
	];
}
