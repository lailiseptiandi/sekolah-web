@extends('layouts.admin')

@section('title')
<title>Role</title>
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
          <h4><i class="fas fa-unlock"></i> Roles</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('admin.role.index') }}" method="GET">
            <div class="form-group">
              <div class="input-group mb-3">
                @can('roles.create')
                <div class="input-group-append">
                  <a href="{{ route('admin.role.create') }}" class="btn btn-primary" style="padding-top: 10px"><i
                      class="fas fa-plus"></i> Tambah</a>
                </div>
                @endcan

                <input type="text" class="form-control" name="q" placeholder="Cari berdasarkan nama role">

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
                  <th scope="col" style="width: 15%">Nama Role</th>
                  <th scope="col">Permission</th>
                  <th scope="col" style="width: 15%; text-align:center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $no => $role)
                <tr>
                  <th scope="row" style="text-align:center">{{ ++$no +($roles->currentPage()-1)* $roles->perPage() }}
                  </th>
                  <td>{{ $role->name }}</td>
                  <td>
                    @foreach ($role->getPermissionNames() as $permission)
                    <button class="btn-sm btn-success mb-1 mt-1 mr-1">{{ $permission }}</button>
                    @endforeach
                  </td>
                  <td class="text-center">
                    {{-- <form action="{{route('admin.role.destroy', $role->id)}}" method="POST">
                    @csrf
                    @method('DELETE') --}}
                    @can('roles.edit')
                    <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary">
                      <i class="fas fa-pencil-alt"></i></a>
                    @endcan

                    @can('roles.delete')
                    <button class="btn btn-danger btn-sm" onclick="Delete(this.id)" id="{{ $role->id }}"><i
                        class="fas fa-trash"></i></button>
                    @endcan
                    {{-- </form> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div style="text-align: center">
              {{ $roles->links("vendor.pagination.bootstrap-4") }}
            </div>

          </div>
        </div>
      </div>



  </section>
</div>
@endsection

@push('after-script')
<script>
  //ajax delete
  function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("admin.role.index") }}/"+id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@endpush