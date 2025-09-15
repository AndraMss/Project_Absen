@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Form Absensi</h2>
            {{-- Notifikasi sukses --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{-- Notifikasi error --}}
            @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>

                {{-- Asal Sekolah --}}
                <div class="mb-3">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" placeholder="Masukkan asal sekolah" required>
                </div>

                {{-- Status Kehadiran --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status Kehadiran</label>
                    <select name="status" id="status" class="form-select" onchange="toggleBukti()" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="H">Hadir</option>
                        <option value="I">Izin</option>
                        <option value="S">Sakit</option>
                        <option value="A">Alpha</option>
                    </select>
                </div>

                {{-- Bukti Upload --}}
                <div id="bukti-div" class="mb-3" style="display:none;">
                    <label for="bukti" class="form-label">Upload Bukti (Foto)</label>
                    <input type="file" id="bukti" name="bukti" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleBukti() {
        const status = document.getElementById('status').value;
        const buktiDiv = document.getElementById('bukti-div');

        // tampilkan jika Hadir, Izin, atau Sakit
        if (status === 'H' || status === 'I' || status === 'S') {
            buktiDiv.style.display = 'block';
        } else {
            buktiDiv.style.display = 'none';
        }
    }
</script>
@endsection