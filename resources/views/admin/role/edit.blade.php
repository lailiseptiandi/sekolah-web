@extends('layouts.admin')

@section('title')
Edit Role
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
          <h4><i class="fas fa-unlock"></i> Edit Role</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('admin.role.update', $role->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Nama Role</label>
              <input type="text" name="name" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('name', $role->name) }}" placeholder="Masukan nama role">

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
                  id="check-{{ $item->id }}" @if($role->permissions->contains($item) )
                  checked @endif>
                <label for="check-{{ $item->id }}" class="form-check-label">
                  {{ $item->name }}
                </label>
                
              </div>
              @endforeach
            </div>
            <button class="btn btn-primary mr-2" type="submit"><i class="fas fa-save"></i> Update</button>
            <button class="btn btn-warning" type="reset"><i class="fas fa-redo"></i> Reset</button>
          </form>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection