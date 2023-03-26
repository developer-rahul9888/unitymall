<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantsCommSuppAuth
 * 
 * @property int $id
 * @property string $merchant_id
 * @property string $r_l_e_name
 * @property string $e_reg_no
 * @property string $s_tax_no
 * @property string $s_e_goods
 * @property string $pan_no
 * @property string $pan_proof
 * @property string $tan
 * @property string $t_proof
 * @property string $vt_no
 * @property string $vt_proof
 * @property string $cst_no
 * @property string $cst_proof
 * @property string $vrg_date
 * @property string $cst_rg_dt
 * @property string $brfa_sign
 * @property string $ci_crt
 * @property string $a_prf
 * @property string $can_chq
 * @property string $as_si_name
 * @property string $as_si_desi
 * @property string $as_si_email
 * @property string $as_si_mob
 * @property string $as_si_scnd_cpy
 *
 * @package App\Models
 */
class MerchantsCommSuppAuth extends Model
{
	protected $table = 'merchants_comm_supp_auth';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'merchant_id',
		'r_l_e_name',
		'e_reg_no',
		's_tax_no',
		's_e_goods',
		'pan_no',
		'pan_proof',
		'tan',
		't_proof',
		'vt_no',
		'vt_proof',
		'cst_no',
		'cst_proof',
		'vrg_date',
		'cst_rg_dt',
		'brfa_sign',
		'ci_crt',
		'a_prf',
		'can_chq',
		'as_si_name',
		'as_si_desi',
		'as_si_email',
		'as_si_mob',
		'as_si_scnd_cpy'
	];
}
