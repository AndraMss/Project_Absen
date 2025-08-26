@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Tambah User</h2>

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           class="form-control" 
                           placeholder="Masukkan nama" 
                           required>
                </div>

                {{-- Asal Sekolah --}}
                <div class="mb-3">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" 
                           id="asal_sekolah" 
                           name="asal_sekolah" 
                           class="form-control" 
                           placeholder="Masukkan asal sekolah" 
                           required>
                </div>

                {{-- Tombol Simpan --}}
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
