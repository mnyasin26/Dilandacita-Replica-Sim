<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TSyaratAjuanLayanan
 * 
 * @property int $id_syarat_ajuan_layan
 * @property int|null $pengajuan_id
 * @property string|null $nik
 * @property string|null $img_1
 * @property string|null $img_thumb_1
 * @property string|null $img_2
 * @property string|null $img_thumb_2
 * @property string|null $img_3
 * @property string|null $img_thumb_3
 * @property string|null $img_4
 * @property string|null $img_thumb_4
 * @property string|null $img_5
 * @property string|null $img_thumb_5
 * @property string|null $img_6
 * @property string|null $img_thumb_6
 * @property string|null $img_7
 * @property string|null $img_thumb_7
 * @property string|null $img_8
 * @property string|null $img_thumb_8
 * @property string|null $img_9
 * @property string|null $img_thumb_9
 * @property string|null $img_10
 * @property string|null $img_thumb_10
 * @property string|null $img_11
 * @property string|null $img_thumb_11
 * @property string|null $img_12
 * @property string|null $img_thumb_12
 * @property string|null $img_13
 * @property string|null $img_thumb_13
 * @property string|null $img_14
 * @property string|null $img_thumb_14
 * @property string|null $img_15
 * @property string|null $img_thumb_15
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TPengajuan|null $t_pengajuan
 *
 * @package App\Models
 */
class TSyaratAjuanLayanan extends Model
{
	protected $table = 't_syarat_ajuan_layanan';
	protected $primaryKey = 'id_syarat_ajuan_layan';

	protected $casts = [
		'pengajuan_id' => 'int'
	];

	protected $fillable = [
		'pengajuan_id',
		'nik',
		'img_1',
		'img_thumb_1',
		'img_2',
		'img_thumb_2',
		'img_3',
		'img_thumb_3',
		'img_4',
		'img_thumb_4',
		'img_5',
		'img_thumb_5',
		'img_6',
		'img_thumb_6',
		'img_7',
		'img_thumb_7',
		'img_8',
		'img_thumb_8',
		'img_9',
		'img_thumb_9',
		'img_10',
		'img_thumb_10',
		'img_11',
		'img_thumb_11',
		'img_12',
		'img_thumb_12',
		'img_13',
		'img_thumb_13',
		'img_14',
		'img_thumb_14',
		'img_15',
		'img_thumb_15'
	];

	public function t_pengajuan()
	{
		return $this->belongsTo(TPengajuan::class, 'pengajuan_id');
	}
}
