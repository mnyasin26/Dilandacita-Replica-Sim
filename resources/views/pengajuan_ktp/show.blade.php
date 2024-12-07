@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Penerbitan</title>
    <style>
        table {
            width: 50%;
            border-collapse: separate;
            border-spacing: 4px;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 8px;
        }
        .left-column {
            width: 40%;
        }
        .bordered {
            border: 1px solid black;
            width: 60%;
        }
        h3 {
            margin-bottom: 20px;
        }
        .btn-custom {
            margin-top: 20px;
            margin-bottom: 40px;
            border-radius: 20px;
            width: 128px;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
@section('content')
<div class="container">
    <h1>Detail Pengajuan KTP</h1>
    <p><strong>ID Form:</strong> {{ $formID }}</p>
    <br>
    <p><strong>Application Form</strong></p>
    <!-- <pre>{{ json_encode($application, JSON_PRETTY_PRINT) }}</pre><div class="container mt-4">
     -->
    @if ($application['response']['application']['applicationState']['status'] === 'Issued')
        <!-- Tabel untuk status Issued -->
        <div class="container mt-4">
            <h3>Penerbitan</h3>
            <table>
                <tbody>
                    <tr>
                        <td class="left-column">Status</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['status'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">NIK</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['NIK'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">ID Penerbit</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['issuedBy'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Diterbitkan oleh</td>
                        <td class="bordered">{{ DB::table('users')->where('id', $application['response']['application']['applicationState']['issuedBy'])->value('name') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="bordered">
                            Pengajuan nomor {{ $formID }} sudah menerbitkan KTP dengan NIK {{ $application['response']['application']['applicationState']['NIK'] ?? 'N/A' }}
                            oleh penerbit {{ DB::table('users')->where('id', $application['response']['application']['applicationState']['issuedBy'])->value('name') ?? 'N/A' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    
    @elseif ($application['response']['application']['applicationState']['status'] === 'Pending')
        <!-- Tabel untuk status Pending -->
        <div class="container mt-4">
            <h3>Verifikasi</h3>
            <table>
                <tbody>
                    <tr>
                        <td class="left-column">Nomor Induk Kependudukan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['NIK'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Alamat Rumah</td>
                        <td class="bordered">{{ $application['response']['application']['application']['address'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Tanggal Lahir</td>
                        <td class="bordered">{{ $application['response']['application']['application']['birthDate'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Tempat Lahir</td>
                        <td class="bordered">{{ $application['response']['application']['application']['birthPlace'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Golongan Darah</td>
                        <td class="bordered">{{ $application['response']['application']['application']['bloodType'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Kewarganegaraan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['citizenship'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">ID Form</td>
                        <td class="bordered">{{ $application['response']['application']['application']['formID'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Nama Lengkap</td>
                        <td class="bordered">{{ $application['response']['application']['application']['fullName'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Jenis Kelamin</td>
                        <td class="bordered">{{ $application['response']['application']['application']['gender'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Status Pernikahan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['maritalStatus'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Pekerjaan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['occupation'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Agama</td>
                        <td class="bordered">{{ $application['response']['application']['application']['religion'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">RT/RW</td>
                        <td class="bordered">{{ $application['response']['application']['application']['rtRw'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Kecamatan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['subdistrict'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Kelurahan</td>
                        <td class="bordered">{{ $application['response']['application']['application']['village'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Status</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['status'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Disubmit oleh</td>
                        <td class="bordered">{{ DB::table('users')->where('id', $application['response']['application']['applicationState']['submittedBy'])->value('name') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="bordered">Pengajuan nomor {{ $formID }} sedang dalam status Pending dan menunggu verifikasi.</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('pengajuan_ktp.repeal') }}" method="POST" style="margin-top: 20px;">
    @csrf
    <input type="hidden" name="formID" value="{{ $application['response']['application']['application']['formID'] }}">
    <input type="hidden" name="userID" value="{{ auth()->user()->id }}">

    <button type="submit" class="btn btn-danger">Batalkan Pengajuan</button>
            </form>

        </div>
        @elseif ($application['response']['application']['applicationState']['status'] === 'Verified')
        <!-- Tabel untuk status Verified -->
        <div class="container mt-4">
            <h3>Persetujuan</h3>
            <table>
                <tbody>
                    <tr>
                        <td class="left-column">Status</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['status'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">ID Verifikator</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['verifiedBy'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Diverifikasi oleh</td>
                        <td class="bordered">{{ DB::table('users')->where('id', $application['response']['application']['applicationState']['verifiedBy'])->value('name') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="bordered">Pengajuan nomor {{ $formID }} telah diverifikasi oleh 
                            {{ DB::table('users')->where('id', $application['response']['application']['applicationState']['verifiedBy'])->value('name') ?? 'N/A' }}.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @elseif ($application['response']['application']['applicationState']['status'] === 'Approved')
        <!-- Tabel untuk status Verified -->
        <div class="container mt-4">
            <h3>Persetujuan</h3>
            <table>
                <tbody>
                    <tr>
                        <td class="left-column">Status</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['status'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">ID Verifikator</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['approvedBy'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Diverifikasi oleh</td>
                        <td class="bordered">{{ DB::table('users')->where('id', $application['response']['application']['applicationState']['approvedBy'])->value('name') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="bordered">Pengajuan nomor {{ $formID }} telah diverifikasi oleh 
                            {{ DB::table('users')->where('id', $application['response']['application']['applicationState']['approvedBy'])->value('name') ?? 'N/A' }}.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @elseif ($application['response']['application']['applicationState']['status'] === 'Repealed')
        <!-- Tabel untuk status Verified -->
        <div class="container mt-4">
            <h3>Penolakan Pengajuan</h3>
            <table>
                <tbody>
                    <tr>
                        <td class="left-column">Status</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['status'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Id Pembatal</td>
                        <td class="bordered">{{ $application['response']['application']['applicationState']['repealedBy'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Dibatalkan oleh</td>
                        <td class="bordered">{{ DB::table('users')->where('id', $application['response']['application']['applicationState']['repealedBy'])->value('name') ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="left-column">Deskripsi</td>
                        <td class="bordered">Pengajuan nomor {{ $formID }} telah dibatalkan oleh 
                            {{ DB::table('users')->where('id', $application['response']['application']['applicationState']['repealedBy'])->value('name') ?? 'N/A' }}.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

    <br>
<form action="{{ route('pengajuan_ktp.verify', ['id' => $formID]) }}" method="POST">
        @csrf
        <input type="hidden" name="method" value="verifyApplication">
        <input type="hidden" name="args[]" value="{{ $formID }}">
        <input type="hidden" name="args[]" value="modifier1">

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>

    <form action="{{ route('pengajuan_ktp.approve', ['id' => $formID]) }}" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="approvedBy" value="{{ auth()->user()->id }}">

        <button type="submit" class="btn btn-success">Approve</button>
    </form>

    <form action="{{ route('pengajuan_ktp.issue', ['id' => $formID]) }}" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="hidden" name="nik" value="3273221010020002"> <!-- Fixed NIK -->
        <input type="hidden" name="issuedBy" value="{{ auth()->user()->id }}"> <!-- ID user yang melakukan issue -->

        <button type="submit" class="btn btn-warning">Issue KTP</button>
    </form>
    <br>
    <!-- show.blade.php -->
<a href="{{ route('pengajuan.history') }}" class="btn btn-primary">Lihat History Pengajuan</a>
<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

</div>
@endsection
</body>
</html>