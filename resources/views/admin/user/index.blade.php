@extends('layouts.admin')

@section('title')
<title>user</title>
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
          <h4><i class="fas fa-users"></i> users</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('admin.user.index') }}" method="GET">
            <div class="form-group">
              <div class="input-group mb-3">
                @can('users.create')
                <div class="input-group-append">
                  <a href="{{ route('admin.user.create') }}" class="btn btn-primary" style="padding-top: 10px"><i
                      class="fas fa-plus"></i> Tambah</a>
                </div>
                @endcan

                <input type="text" class="form-control" name="q" placeholder="Cari berdasarkan nama item">

                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari </button>
                </div>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="text-align:center; width: 6%">No.</th>
                  <th scope="col">Nama User</th>
                  <th scope="col" style="width: 15%">Role</th>
                  <th scope="col" style="width: 15%; text-align:center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $no => $item)
                <tr>
                  <th scope="row" style="text-align:center">{{ ++$no +($users->currentPage()-1)* $users->perPage() }}
                  </th>
                  <td>{{ $item->name }}</td>
                  <td>
                    @foreach ($item->getRoleNames() as $role)
                    <button class="btn-sm btn-success mb-1 mt-1 mr-1">{{ $role }}</button>
                    @endforeach
                  </td>
                  <td class="text-center">
                    {{-- <form action="{{route('admin.item.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method('DELETE') --}}
                    @can('users.edit')
                    <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-pencil-alt"></i></a>
                    @endcan

                    @can('users.delete')
                    <button class="btn btn-danger btn-sm" onclick="Delete(this.id)" id="{{ $item->id }}"><i
                        class="fas fa-trash"></i></button>
                    @endcan
                    {{-- </form> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div style="text-align: center">
              {{ $users->links("vendor.pagination.bootstrap-4") }}
            </div>

          </div>
        </div>
      </div>



  </section>
</div>
@endsection
