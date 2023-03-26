<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CiSession
 * 
 * @property int $id
 * @property string $data
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 * @property int $last_activity
 * @property string $user_data
 *
 * @package App\Models
 */
class CiSession extends Model
{
	protected $table = 'ci_sessions';
	public $timestamps = false;

	protected $casts = [
		'last_activity' => 'int'
	];

	protected $fillable = [
		'data',
		'timestamp',
		'ip_address',
		'user_agent',
		'last_activity',
		'user_data'
	];
}
