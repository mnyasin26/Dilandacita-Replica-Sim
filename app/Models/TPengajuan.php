<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TPengajuan
 * 
 * @property int $id_pengajuan
 * @property int|null $layanan_id
 * @property string|null $nik
 * @property string|null $nomor_kk
 * @property Carbon|null $tgl_pengajuan
 * @property string|null $status_pengajuan
 * @property int|null $created_by
 * @property string|null $keterangan
 * @property string|null $nama_lgkp
 * @property int|null $id_petugas
 * @property string|null $pin
 * @property string|null $telepon
 * @property string|null $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $verified_by
 * @property Carbon|null $verified_timestamp
 * @property int|null $process_by
 * @property Carbon|null $process_timestamp
 * @property int|null $done_by
 * @property Carbon|null $done_timestamp
 * @property int|null $repaired_by
 * @property Carbon|null $repaired_timestamp
 * @property int|null $rejected_by
 * @property Carbon|null $rejected_timestamp
 * @property int|null $grab_by
 * @property Carbon|null $grab_timestamp
 * @property int|null $cetak_biodata_by
 * @property Carbon|null $cetak_biodata_timestamp
 * @property int|null $menunggu_by
 * @property Carbon|null $menunggu_timestamp
 * @property string|null $status_klaim
 * @property Carbon|null $claim_timestamp
 * @property Carbon|null $claim_done_timestamp
 * @property string|null $claim_notes
 * @property int|null $claim_done_by
 * @property Carbon|null $claim_reject_timestamp
 * @property int|null $claim_reject_by
 * @property string|null $claim_reject_notes
 * @property string|null $alasan_pengajuan
 * @property string|null $dokumen
 * @property int|null $layanan_id_parent
 * @property int|null $pengajuan_id_parent
 * @property string|null $nik_pemohon_lain
 * @property string|null $nama_pemohon_lain
 * @property string|null $dokumen_pemohon_lain
 * @property int|null $is_surat_kuasa
 * 
 * @property MUser|null $m_user
 * @property MLayanan|null $m_layanan
 * @property Collection|PengajuanAktaKelahiran[] $pengajuan_akta_kelahirans
 * @property Collection|PengajuanCetakKtp[] $pengajuan_cetak_ktps
 * @property Collection|TSyaratAjuanLayanan[] $t_syarat_ajuan_layanans
 *
 * @package App\Models
 */
class TPengajuan extends Model
{
	protected $table = 't_pengajuan';
	protected $primaryKey = 'id_pengajuan';

	protected $casts = [
		'layanan_id' => 'int',
		'tgl_pengajuan' => 'datetime',
		'created_by' => 'int',
		'id_petugas' => 'int',
		'verified_by' => 'int',
		'verified_timestamp' => 'datetime',
		'process_by' => 'int',
		'process_timestamp' => 'datetime',
		'done_by' => 'int',
		'done_timestamp' => 'datetime',
		'repaired_by' => 'int',
		'repaired_timestamp' => 'datetime',
		'rejected_by' => 'int',
		'rejected_timestamp' => 'datetime',
		'grab_by' => 'int',
		'grab_timestamp' => 'datetime',
		'cetak_biodata_by' => 'int',
		'cetak_biodata_timestamp' => 'datetime',
		'menunggu_by' => 'int',
		'menunggu_timestamp' => 'datetime',
		'claim_timestamp' => 'datetime',
		'claim_done_timestamp' => 'datetime',
		'claim_done_by' => 'int',
		'claim_reject_timestamp' => 'datetime',
		'claim_reject_by' => 'int',
		'layanan_id_parent' => 'int',
		'pengajuan_id_parent' => 'int',
		'is_surat_kuasa' => 'int'
	];

	protected $fillable = [
		'layanan_id',
		'nik',
		'nomor_kk',
		'tgl_pengajuan',
		'status_pengajuan',
		'created_by',
		'keterangan',
		'nama_lgkp',
		'id_petugas',
		'pin',
		'telepon',
		'email',
		'verified_by',
		'verified_timestamp',
		'process_by',
		'process_timestamp',
		'done_by',
		'done_timestamp',
		'repaired_by',
		'repaired_timestamp',
		'rejected_by',
		'rejected_timestamp',
		'grab_by',
		'grab_timestamp',
		'cetak_biodata_by',
		'cetak_biodata_timestamp',
		'menunggu_by',
		'menunggu_timestamp',
		'status_klaim',
		'claim_timestamp',
		'claim_done_timestamp',
		'claim_notes',
		'claim_done_by',
		'claim_reject_timestamp',
		'claim_reject_by',
		'claim_reject_notes',
		'alasan_pengajuan',
		'dokumen',
		'layanan_id_parent',
		'pengajuan_id_parent',
		'nik_pemohon_lain',
		'nama_pemohon_lain',
		'dokumen_pemohon_lain',
		'is_surat_kuasa'
	];

	public function m_user()
	{
		return $this->belongsTo(MUser::class, 'verified_by');
	}

	public function m_layanan()
	{
		return $this->belongsTo(MLayanan::class, 'layanan_id');
	}

	public function pengajuan_akta_kelahirans()
	{
		return $this->hasMany(PengajuanAktaKelahiran::class, 'pengajuan_id');
	}

	public function pengajuan_cetak_ktps()
	{
		return $this->hasMany(PengajuanCetakKtp::class, 'pengajuan_id');
	}

	public function t_syarat_ajuan_layanans()
	{
		return $this->hasMany(TSyaratAjuanLayanan::class, 'pengajuan_id');
	}
}
