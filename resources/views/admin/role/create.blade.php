@extends('layouts.admin')

@section('title')
Create Data Baru
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Role</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4><i class="fas fa-unlock"></i> Tambah Role</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('admin.role.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="">Nama Role</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Masukan nama role">

              @error('name')
              <div class="invalid-feedback" style="display:block">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <label class="font-weight-bold">PERMISSIONS</label>
              <br>
              @foreach ($permission as $item)
              <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $item->name }}"
                  id="check-{{ $item->id }}">
                <label for="check-{{ $item->id }}" class="form-check-label">
                   {{ $item->name }}
                </label>
               
              </div>
              @endforeach
            </div>
            <button class="btn btn-primary mr-2" type="submit"><i class="fas fa-save"></i> Simpan</button>
            <button class="btn btn-warning" type="reset"><i class="fas fa-redo"></i> Reset</button>
          </form>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection