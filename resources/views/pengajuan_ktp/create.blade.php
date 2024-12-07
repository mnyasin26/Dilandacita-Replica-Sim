<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulir Pendaftaran KTP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h3>Form Pendaftaran KTP</h3>

        <form action="{{ route('pengajuan_ktp.store') }}" method="POST" class="was-validated">
            @csrf
            <div class="mb-3 mt-3">
                <label for="fullName" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Masukan nama" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>
            <div class="mb-3">
                <label for="birthPlace" class="form-label">Tempat Lahir:</label>
                <input type="text" class="form-control" id="birthPlace" name="birthPlace" placeholder="Masukan tempat lahir" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="birthDate" class="form-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin:</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">--Pilih jenis kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib dipilih.</div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Masukan alamat sesuai KTP" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="rtRw" class="form-label">RT/RW:</label>
                <input type="text" class="form-control" id="rtRw" name="rtRw" placeholder="Contoh: 001/002" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="village" class="form-label">Desa/Kelurahan:</label>
                <input type="text" class="form-control" id="village" name="village" placeholder="Masukan desa/kelurahan" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="subdistrict" class="form-label">Kecamatan:</label>
                <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="Masukan kecamatan" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="religion" class="form-label">Agama:</label>
                <select class="form-select" id="religion" name="religion" required>
                    <option value="">--Pilih agama--</option>
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib dipilih.</div>
            </div>

            <div class="mb-3">
                <label for="maritalStatus" class="form-label">Status Pernikahan:</label>
                <select class="form-select" id="maritalStatus" name="maritalStatus" required>
                    <option value="">--Pilih status--</option>
                    <option value="Belum menikah">Belum menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai">Cerai</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib dipilih.</div>
            </div>

            <div class="mb-3">
                <label for="occupation" class="form-label">Pekerjaan:</label>
                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Masukan pekerjaan" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="citizenship" class="form-label">Kewarganegaraan:</label>
                <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Contoh: Indonesia" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="mb-3">
                <label for="bloodType" class="form-label">Golongan Darah:</label>
                <input type="text" class="form-control" id="bloodType" name="bloodType" placeholder="Masukan golongan darah" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Wajib diisi.</div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="confirmCheck" name="confirmCheck" required>
                <label class="form-check-label" for="confirmCheck">Data yang saya masukan adalah benar.</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Checklist box ini untuk melanjutkan.</div>
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

</body>

</html>
