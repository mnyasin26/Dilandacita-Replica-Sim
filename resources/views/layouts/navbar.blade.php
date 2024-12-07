<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sticky-top" style="width: 250px; height: 100vh;">
    <h4 class="text-center">DILANDA CITA</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('grafik-layanan') ? 'active' : '' }}" href="#">Grafik
                Layanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('survey-kepuasan') ? 'active' : '' }}" href="#">Survey
                Kepuasan</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('pengajuan*') ? 'active' : '' }}"
                href="{{ route('pengajuan') }}">Pengajuan</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('daftar-pengajuan') ? 'active' : '' }}" href="#">Daftar
                Pengajuan</a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('klaim-dokumen') ? 'active' : '' }}" href="#">Klaim
                Dokumen</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('pengaturan') ? 'active' : '' }}" href="{{ route('pengaturan') }}">Pengaturan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('verifikasi') ? 'active' : '' }}"
                href="{{ route('verifikasi') }}">Verifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('persetujuan') ? 'active' : '' }}"
                href="{{ route('persetujuan') }}">Persetujuan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('penerbitan') ? 'active' : '' }}"
                href="{{ route('penerbitan') }}">Penerbitan</a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-white">Logout</button>
            </form>
        </li>
    </ul>
</div>
