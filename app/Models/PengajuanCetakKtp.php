<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PengajuanCetakKtp
 * 
 * @property int $id
 * @property string $fullName
 * @property string $birthPlace
 * @property Carbon $birthDate
 * @property string $gender
 * @property string $address
 * @property string $rtRw
 * @property string $village
 * @property string $subdistrict
 * @property string $religion
 * @property string $maritalStatus
 * @property string $occupation
 * @property string $citizenship
 * @property string $bloodType
 * @property string $submittedBy
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PengajuanCetakKtp extends Model
{
	protected $table = 'pengajuan_cetak_ktps';

	protected $casts = [
		'birthDate' => 'datetime'
	];

	protected $fillable = [
		'fullName',
		'birthPlace',
		'birthDate',
		'gender',
		'address',
		'rtRw',
		'village',
		'subdistrict',
		'religion',
		'maritalStatus',
		'occupation',
		'citizenship',
		'bloodType',
		'submittedBy'
	];
}
