<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ScoLink
 * 
 * @property int $id
 * @property string $url
 * @property string $title
 * @property string $discription
 * @property string $keywords
 *
 * @package App\Models
 */
class ScoLink extends Model
{
	protected $table = 'sco_links';
	public $timestamps = false;

	protected $fillable = [
		'url',
		'title',
		'discription',
		'keywords'
	];
}
