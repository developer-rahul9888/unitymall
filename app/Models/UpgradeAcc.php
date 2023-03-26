<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UpgradeAcc
 * 
 * @property int $up_id
 * @property int $up_user_id
 * @property string $user_email
 * @property string $up_status
 * @property string $req_for
 * @property Carbon $rdate
 * @property string $req_apr_date
 *
 * @package App\Models
 */
class UpgradeAcc extends Model
{
	protected $table = 'upgrade_acc';
	protected $primaryKey = 'up_id';
	public $timestamps = false;

	protected $casts = [
		'up_user_id' => 'int'
	];

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'up_user_id',
		'user_email',
		'up_status',
		'req_for',
		'rdate',
		'req_apr_date'
	];
}
