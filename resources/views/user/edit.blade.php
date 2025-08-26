@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Edit User</h2>

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

            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           class="form-control" 
                           value="{{ old('nama', $user->nama) }}" 
                           required>
                </div>

                {{-- Asal Sekolah --}}
                <div class="mb-3">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" 
                           id="asal_sekolah" 
                           name="asal_sekolah" 
                           class="form-control" 
                           value="{{ old('asal_sekolah', $user->asal_sekolah) }}" 
                           required>
                </div>

                {{-- Tombol --}}
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
