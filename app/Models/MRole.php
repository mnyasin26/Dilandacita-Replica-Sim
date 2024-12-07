<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MRole
 * 
 * @property int $id_role
 * @property string $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MKategoriUser[] $m_kategori_users
 * @property Collection|MUser[] $m_users
 *
 * @package App\Models
 */
class MRole extends Model
{
	protected $table = 'm_role';
	protected $primaryKey = 'id_role';

	protected $fillable = [
		'role'
	];

	public function m_kategori_users()
	{
		return $this->hasMany(MKategoriUser::class, 'role_id');
	}

	public function m_users()
	{
		return $this->hasMany(MUser::class, 'role_id');
	}
}
