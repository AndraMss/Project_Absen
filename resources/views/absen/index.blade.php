@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Absensi</h2>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                        <tr>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->asal_sekolah }}</td>
                            <td>
                                @if($d->status == 'H')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($d->status == 'I')
                                    <span class="badge bg-warning text-dark">Izin</span>
                                @elseif($d->status == 'S')
                                    <span class="badge bg-primary">Sakit</span>
                                @else
                                    <span class="badge bg-danger">Alpha</span>
                                @endif
                            </td>
                            <td>
                                @if($d->bukti)
                                    <a href="{{ asset('storage/'.$d->bukti) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        📷 Lihat Bukti
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $d->created_at ? $d->created_at->format('d M Y, H:i') : '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data absensi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
