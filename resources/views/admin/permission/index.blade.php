@extends('layouts.admin')

@section('title')
<title>Permissions</title>
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Permissions</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4><i class="fas fa-key"> Permissions</i></h4>
        </div>

        <div class="card-body">
          <form action="" method="GET">
            <div class="form-group">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="q" placeholder="Cari berdasarkan nama permission">

                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                </div>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="text-align: center; width: 6%;"> No.</th>
                  <th scope="col"> Nama Permsission</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($permission as $no => $item)
                <tr>
                  <th scope="row" style="text-align: center">{{ ++$no + ($permission->currentPage()-1)* $permission->perPage() }}
                  </th>
                  <td>{{ $item->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div style="text-align: center">
              {{ $permission->links("vendor.pagination.bootstrap-4") }}
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
@endsection