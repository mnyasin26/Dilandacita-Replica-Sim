<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PengajuanAktaKelahiran
 *
 * @property int $id
 * @property int|null $pengajuan_id
 * @property int|null $provinsi
 * @property int|null $kabkota
 * @property int|null $kecamatan
 * @property int|null $kelurahan
 * @property string|null $nik_saksi_1
 * @property string|null $nama_lgkp_saksi_1
 * @property string|null $no_kk_saksi_1
 * @property string|null $kwrngrn_saksi_1
 * @property string|null $nik_saksi_2
 * @property string|null $nama_lgkp_saksi_2
 * @property string|null $no_kk_saksi_2
 * @property string|null $kwrngrn_saksi_2
 * @property string|null $nik_ayah
 * @property string|null $nama_lgkp_ayah
 * @property string|null $tmpt_lhr_ayah
 * @property Carbon|null $tgl_lhr_ayah
 * @property int|null $kwrngrn_ayah
 * @property string|null $nik_ibu
 * @property string|null $nama_lgkp_ibu
 * @property string|null $tmpt_lhr_ibu
 * @property Carbon|null $tgl_lhr_ibu
 * @property int|null $kwrngrn_ibu
 * @property string|null $nik_anak
 * @property string|null $nama_lgkp_anak
 * @property string|null $tempat_dilahirkan_anak
 * @property string|null $tempat_kelahirkan_anak
 * @property Carbon|null $tgl_kelahiran_anak
 * @property int|null $jenis_kelamin_anak
 * @property int|null $hari
 * @property Carbon|null $waktu_kelahiran
 * @property int|null $jenis_kelahiran
 * @property int|null $kelahiran_ke
 * @property int|null $penolong_klhrn
 * @property string|null $berat_anak
 * @property string|null $panjang_anak
 * @property string|null $keterangan
 *
 * @property TPengajuan|null $t_pengajuan
 *
 * @package App\Models
 */
class PengajuanAktaKelahiran extends Model
{
	protected $table = 'pengajuan_akta_kelahiran';
	public $timestamps = false;

	protected $casts = [
		'pengajuan_id' => 'int',
		'provinsi' => 'int',
		'kabkota' => 'int',
		'kecamatan' => 'int',
		'kelurahan' => 'int',
		'tgl_lhr_ayah' => 'datetime',
		'kwrngrn_ayah' => 'int',
		'tgl_lhr_ibu' => 'datetime',
		'kwrngrn_ibu' => 'int',
		'tgl_kelahiran_anak' => 'datetime',
		'jenis_kelamin_anak' => 'int',
		'hari' => 'int',
		'waktu_kelahiran' => 'datetime',
		'jenis_kelahiran' => 'int',
		'kelahiran_ke' => 'int',
		'penolong_klhrn' => 'int'
	];

	protected $fillable = [
		'pengajuan_id',
		'provinsi',
		'kabkota',
		'kecamatan',
		'kelurahan',
		'nik_saksi_1',
		'nama_lgkp_saksi_1',
		'no_kk_saksi_1',
		'kwrngrn_saksi_1',
		'nik_saksi_2',
		'nama_lgkp_saksi_2',
		'no_kk_saksi_2',
		'kwrngrn_saksi_2',
		'nik_ayah',
		'nama_lgkp_ayah',
		'tmpt_lhr_ayah',
		'tgl_lhr_ayah',
		'kwrngrn_ayah',
		'nik_ibu',
		'nama_lgkp_ibu',
		'tmpt_lhr_ibu',
		'tgl_lhr_ibu',
		'kwrngrn_ibu',
		'nik_anak',
		'nama_lgkp_anak',
		'tempat_dilahirkan_anak',
		'tempat_kelahirkan_anak',
		'tgl_kelahiran_anak',
		'jenis_kelamin_anak',
		'hari',
		'waktu_kelahiran',
		'jenis_kelahiran',
		'kelahiran_ke',
		'penolong_klhrn',
		'berat_anak',
		'panjang_anak',
		'keterangan',

		// Data Ayah
		'nik_ayah',
		'nama_ayah',
		'tanggal_lahir_ayah',
		'pekerjaan_ayah',
		// ...additional fields for Ayah...

		// Data Ibu
		'nik_ibu',
		'nama_ibu',
		'tanggal_lahir_ibu',
		'pekerjaan_ibu',
		// ...additional fields for Ibu...

		// Data Saksi 1
		'nik_saksi1',
		'nama_saksi1',
		// ...additional fields for Saksi 1...

		// Data Saksi 2
		'nik_saksi2',
		'nama_saksi2',
		// ...additional fields for Saksi 2...
	];

	public function t_pengajuan()
	{
		return $this->belongsTo(TPengajuan::class, 'pengajuan_id');
	}
}
