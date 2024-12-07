<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MUser
 *
 * @property int $id_user
 * @property string|null $nik
 * @property string|null $no_kk
 * @property string|null $telepon
 * @property string|null $name
 * @property string|null $siak_user
 * @property string|null $email
 * @property string|null $password
 * @property string|null $pic
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property string|null $verification_code
 * @property int|null $is_email_verified
 * @property int|null $no_kec
 * @property int|null $no_kel
 * @property int $role_id
 * @property int|null $kategori_user_id
 * @property string|null $layanan_id
 * @property int|null $is_helpdesk
 * @property int|null $is_semeru
 * @property int|null $is_ketua_rw
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property MKategoriUser|null $m_kategori_user
 * @property MRole $m_role
 * @property Collection|TPengajuan[] $t_pengajuans
 *
 * @package App\Models
 */
class MUser extends Model implements AuthenticatableContract
{
    use Authenticatable;

	protected $table = 'm_user';
	protected $primaryKey = 'id_user';

	protected $casts = [
		'is_email_verified' => 'int',
		'no_kec' => 'int',
		'no_kel' => 'int',
		'role_id' => 'int',
		'kategori_user_id' => 'int',
		'is_helpdesk' => 'int',
		'is_semeru' => 'int',
		'is_ketua_rw' => 'int'
	];

	protected $hidden = [
		'password',
		'api_token',
		'remember_token'
	];

	protected $fillable = [
		'nik',
		'no_kk',
		'telepon',
		'name',
		'siak_user',
		'email',
		'password',
		'pic',
		'api_token',
		'remember_token',
		'verification_code',
		'is_email_verified',
		'no_kec',
		'no_kel',
		'role_id',
		'kategori_user_id',
		'layanan_id',
		'is_helpdesk',
		'is_semeru',
		'is_ketua_rw'
	];

	public function m_kategori_user()
	{
		return $this->belongsTo(MKategoriUser::class, 'kategori_user_id');
	}

	public function m_role()
	{
		return $this->belongsTo(MRole::class, 'role_id');
	}

	public function t_pengajuans()
	{
		return $this->hasMany(TPengajuan::class, 'verified_by');
	}

	public function pengajuans()
	{
	    return $this->hasMany(TPengajuan::class, 'created_by', 'id_user');
	}
}
