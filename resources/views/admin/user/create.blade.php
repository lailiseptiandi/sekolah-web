@extends('layouts.admin')

@section('title')
Tambah User
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Users</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4><i class="fas fa-users"></i> Tambah User</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="">Nama User</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Masukan Nama">

              @error('name')
              <div class="invalid-feedback" style="display:block">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control @error('title') is-invalid @enderror" name="email"
                value="{{ old('email') }}" placeholder="Masukan Email">

              @error('email')
              <div class="invalid-feedback" style="display:block">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="password"
                  value="{{ old('password') }}" placeholder="Masukan Password">

                @error('password')
                <div class="invalid-feedback" style="display:block">
                  {{ $message }}
                </div>
                @enderror
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="password_confirmation"
                  value="{{ old('password_confirmation') }}" placeholder="Masukan Konfirmasi Password">
              </div>
              </div>
            </div>
        

            <div class="form-group">
              <label class="font-weight-bold">Role</label>
              <br>
              @foreach ($roles as $item)
              <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $item->name }}"
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