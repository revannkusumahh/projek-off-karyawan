@extends('layouts.app')

@section('content')

<div class="header">
    <h1>📋 Tracking Off Karyawan</h1>
    <p>Monitoring Jadwal Off Karyawan</p>
</div>

<div
    class="grid"
    style="
        display:grid;
        grid-template-columns:380px 1fr;
        gap:20px;
    "
>

    {{-- FORM INPUT --}}
    <div class="card">

        <form action="/simpan" method="POST">

            @csrf

            <label>Bulan</label>

            <select name="bulan" required>
                <option value="">Pilih Bulan</option>

                <option>Januari</option>
                <option>Februari</option>
                <option>Maret</option>
                <option>April</option>
                <option>Mei</option>
                <option>Juni</option>
                <option>Juli</option>
                <option>Agustus</option>
                <option>September</option>
                <option>Oktober</option>
                <option>November</option>
                <option>Desember</option>
            </select>

            <label>Nama Karyawan</label>
            <input
                type="text"
                name="nama"
                required
            >

            <label>Off Terakhir</label>
            <input
                type="date"
                name="off_terakhir"
                required
            >

            <label>Schedule Off</label>
            <input
                type="date"
                name="schedule"
                required
            >

            <label>Realisasi Off</label>
            <input
                type="date"
                name="realisasi"
            >

            <button
                type="submit"
                class="btn"
            >
                Simpan Data
            </button>

        </form>

    </div>

    {{-- TABEL --}}
    <div class="card">

        <form method="GET" style="margin-bottom:15px;">

            <select
                name="bulan"
                onchange="this.form.submit()"
            >

                <option value="">
                    Semua Bulan
                </option>

                @foreach([
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ] as $bulan)

                <option
                    value="{{ $bulan }}"
                    {{ request('bulan') == $bulan ? 'selected' : '' }}
                >
                    {{ $bulan }}
                </option>

                @endforeach

            </select>

        </form>

        <table>

            <thead>

                <tr>
                    <th>Nama</th>
                    <th>Off Terakhir</th>
                    <th>Schedule</th>
                    <th>Realisasi</th>
                    <th>Selisih</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($data as $row)

                <tr>

                    <td>
                        {{ $row->nama }}
                    </td>

                    <td>
                        {{ date('d-m-Y', strtotime($row->off_terakhir)) }}
                    </td>

                    <td>
                        {{ date('d-m-Y', strtotime($row->schedule)) }}
                    </td>

                    <td>

                        @if($row->realisasi)

                            {{ date('d-m-Y', strtotime($row->realisasi)) }}

                        @else

                            -

                        @endif

                    </td>

                    <td>
                        {{ $row->selisih_hari }} Hari
                    </td>

                    <td>

                        @if($row->status == 'SUDAH BISA OFF')

                            <span class="badge success">
                                🟢 SUDAH BISA OFF
                            </span>

                        @else

                            <span class="badge danger">
                                🔴 BELUM 22 HARI
                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="/hapus/{{ $row->id }}"
                            class="btn-delete"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" align="center">
                        Belum ada data
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection