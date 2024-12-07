<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MRole;
use App\Models\MLayanan;
use App\Models\MKategoriUser;
use App\Models\MUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Seed roles
        $citizenRole = MRole::firstOrCreate(['role' => 'citizen']);
        $verifierRole = MRole::firstOrCreate(['role' => 'verifier']);
        $approverRole = MRole::firstOrCreate(['role' => 'approver']);
        $issuerRole = MRole::firstOrCreate(['role' => 'issuer']);
        $superAdminRole = MRole::firstOrCreate(['role' => 'superAdmin']);

        // Seed kategori users with role_id
        $ordinaryUserKategori = MKategoriUser::firstOrCreate(['nama_kategori_user' => 'ordinary user', 'role_id' => $citizenRole->id_role]);
        $adminKategoriVerifier = MKategoriUser::firstOrCreate(['nama_kategori_user' => 'admin', 'role_id' => $verifierRole->id_role]);
        $adminKategoriApprover = MKategoriUser::firstOrCreate(['nama_kategori_user' => 'admin', 'role_id' => $approverRole->id_role]);
        $adminKategoriIssuer = MKategoriUser::firstOrCreate(['nama_kategori_user' => 'admin', 'role_id' => $issuerRole->id_role]);
        $superAdminKategori = MKategoriUser::firstOrCreate(['nama_kategori_user' => 'super admin', 'role_id' => $superAdminRole->id_role]);

        // Seed users for each role with kategori user
        MUser::firstOrCreate([
            'nik' => '1234567890123456',
            'no_kk' => '1234567890123456',
            'telepon' => '081234567890',
            'name' => 'Citizen User',
            'email' => 'citizen@example.com',
            'password' => bcrypt('password'),
            'role_id' => $citizenRole->id_role,
            'kategori_user_id' => $ordinaryUserKategori->id_kategori_user,
        ]);

        MUser::firstOrCreate([
            'nik' => '1234567890123457',
            'no_kk' => '1234567890123457',
            'telepon' => '081234567891',
            'name' => 'Verifier User',
            'email' => 'verifier@example.com',
            'password' => bcrypt('password'),
            'role_id' => $verifierRole->id_role,
            'kategori_user_id' => $adminKategoriVerifier->id_kategori_user,
        ]);

        MUser::firstOrCreate([
            'nik' => '1234567890123458',
            'no_kk' => '1234567890123458',
            'telepon' => '081234567892',
            'name' => 'Approver User',
            'email' => 'approver@example.com',
            'password' => bcrypt('password'),
            'role_id' => $approverRole->id_role,
            'kategori_user_id' => $adminKategoriApprover->id_kategori_user,
        ]);

        MUser::firstOrCreate([
            'nik' => '1234567890123459',
            'no_kk' => '1234567890123459',
            'telepon' => '081234567893',
            'name' => 'Issuer User',
            'email' => 'issuer@example.com',
            'password' => bcrypt('password'),
            'role_id' => $issuerRole->id_role,
            'kategori_user_id' => $adminKategoriIssuer->id_kategori_user,
        ]);

        MUser::firstOrCreate([
            'nik' => '1234567890123460',
            'no_kk' => '1234567890123460',
            'telepon' => '081234567894',
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role_id' => $superAdminRole->id_role,
            'kategori_user_id' => $superAdminKategori->id_kategori_user,
        ]);

        // Seed layanan
        MLayanan::firstOrCreate(['nama_layanan' => 'aktaLahir']);
    }
}
