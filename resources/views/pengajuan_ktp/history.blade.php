<!-- resources/views/pengajuan_ktp/history.blade.php -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction History</title>

</head>
<body>
@section('content')
<div class="container">
<div class="header"><h3><Strong>History Pengajuan</Strong> 🔍</h3></div>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form untuk memasukkan ID pengajuan -->
    <form action="{{ route('pengajuan.fetchHistory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="pengajuan_id">ID Pengajuan</label>
            <input type="number" name="pengajuan_id" id="pengajuan_id" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Cari History</button>
    </form>
    <br>
    <!-- Menampilkan hasil history jika tersedia -->
    @if(isset($historyData['response']['history']))
        <h3>Riwayat Pengajuan:</h3>
        @if(count($historyData['response']['history']) > 0)
            <ul class="list-group mt-3">
                @foreach($historyData['response']['history'] as $history)
                    <li class="list-group-item">
                        <strong>Status:</strong> {{ $history['value']['applicationState']['status'] ?? 'N/A' }} <br>
                        <strong>Tanggal:</strong> 
                        {{ isset($history['timestamp']['seconds']) ? \Carbon\Carbon::createFromTimestamp($history['timestamp']['seconds'])->toDateTimeString() : 'N/A' }} <br>
                        

                        <!-- Menampilkan status dan mengambil nama pengguna dari ID -->
                        @if(isset($history['value']['applicationState']['submittedBy']))
                        <strong>Deskripsi:</strong> 
                        @if(isset($history['value']['application']))
                            Pengajuan dengan ID {{ $history['value']['application']['formID'] ?? 'N/A' }} 
                            Atas Nama {{ $history['value']['application']['fullName'] ?? 'N/A' }}
                        @else
                            Data aplikasi tidak tersedia.
                        @endif
                            <br><strong>Submitted By:</strong> 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['submittedBy'])->value('name') ?? 'N/A' }}
                          <br>  <strong>Hash Transaction : </strong>  {{ $history['txId']?? 'N/A' }}
                        @endif

                        @if(isset($history['value']['applicationState']['verifiedBy']))
                            <strong>Deskripsi:</strong> 
                        @if(isset($history['value']['applicationState']))
                            Aplikasi Sudah Diverifikasi Oleh 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['verifiedBy'])->value('name') ?? 'N/A' }}
                        @else
                            Data aplikasi tidak tersedia.
                        @endif
                            <br><strong>Verified By:</strong> 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['verifiedBy'])->value('name') ?? 'N/A' }}
                           <br> <strong>Hash Transaction : </strong>  {{ $history['txId']?? 'N/A' }}
                        @endif

                        @if(isset($history['value']['applicationState']['approvedBy']))
                        <strong>Deskripsi:</strong> 
                        @if(isset($history['value']['applicationState']))
                            Aplikasi Sudah Disetujui Oleh 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['approvedBy'])->value('name') ?? 'N/A' }}
                        @else
                            Data aplikasi tidak tersedia.
                        @endif
                            <br><strong>Approved By:</strong> 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['approvedBy'])->value('name') ?? 'N/A' }}
                           <br> <strong>Hash Transaction : </strong> {{ $history['txId']?? 'N/A' }}
                        @endif

                        @if(isset($history['value']['applicationState']['issuedBy']))
                        <strong>Deskripsi:</strong> 
                        @if(isset($history['value']['applicationState']))
                            KTP Sudah diterbitkan Oleh 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['issuedBy'])->value('name') ?? 'N/A' }}
                            Dengan NIK {{ $history['value']['applicationState']['NIK'] ?? 'N/A' }}
                        @else
                            Data aplikasi tidak tersedia.
                        @endif

                            <br><strong>Issued By:</strong> 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['issuedBy'])->value('name') ?? 'N/A' }}
                            <br>
                            <strong>Hash Transaction : </strong> {{ $history['txId']?? 'N/A' }}
                            
                        @endif
                        @if(isset($history['value']['applicationState']['repealedBy']))
                        <strong>Deskripsi:</strong> 
                        @if(isset($history['value']['applicationState']))
                            Pengajuan ini sudah dibatalkan
                        @else
                            Data aplikasi tidak tersedia.
                        @endif

                            <br><strong>Repealed By:</strong> 
                            {{ DB::table('users')->where('id', $history['value']['applicationState']['repealedBy'])->value('name') ?? 'N/A' }}
                            <br>
                            <strong>Hash Transaction : </strong> {{ $history['txId']?? 'N/A' }}
                            
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada riwayat pengajuan yang ditemukan untuk ID ini.</p>
        @endif
    @endif
</div>
@endsection
</body>
</html>