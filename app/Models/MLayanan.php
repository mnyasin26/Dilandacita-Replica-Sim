<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MLayanan
 * 
 * @property int $id_layanan
 * @property string|null $nama_layanan
 * @property string|null $path
 * @property string|null $url
 * @property string|null $keterangan
 * @property int|null $is_active
 * @property int|null $limit
 * @property int|null $is_active_limit_fo
 * @property int|null $limit_fo
 * @property string|null $redirect
 * @property int|null $status_redirect
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TPengajuan[] $t_pengajuans
 *
 * @package App\Models
 */
class MLayanan extends Model
{
	protected $table = 'm_layanan';
	protected $primaryKey = 'id_layanan';

	protected $casts = [
		'is_active' => 'int',
		'limit' => 'int',
		'is_active_limit_fo' => 'int',
		'limit_fo' => 'int',
		'status_redirect' => 'int'
	];

	protected $fillable = [
		'nama_layanan',
		'path',
		'url',
		'keterangan',
		'is_active',
		'limit',
		'is_active_limit_fo',
		'limit_fo',
		'redirect',
		'status_redirect'
	];

	public function t_pengajuans()
	{
		return $this->hasMany(TPengajuan::class, 'layanan_id');
	}
}
