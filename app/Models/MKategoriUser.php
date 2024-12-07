<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MKategoriUser
 * 
 * @property int $id_kategori_user
 * @property int $role_id
 * @property string $nama_kategori_user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MRole $m_role
 * @property Collection|MUser[] $m_users
 *
 * @package App\Models
 */
class MKategoriUser extends Model
{
	protected $table = 'm_kategori_user';
	protected $primaryKey = 'id_kategori_user';

	protected $casts = [
		'role_id' => 'int'
	];

	protected $fillable = [
		'role_id',
		'nama_kategori_user'
	];

	public function m_role()
	{
		return $this->belongsTo(MRole::class, 'role_id');
	}

	public function m_users()
	{
		return $this->hasMany(MUser::class, 'kategori_user_id');
	}
}
