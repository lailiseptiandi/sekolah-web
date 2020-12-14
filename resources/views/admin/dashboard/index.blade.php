@extends('layouts.admin')

@section('title')
<title>Dashboard Admin</title>
@endsection


@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fa fa-book-open text-white fa-2x mt-4"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>BERITA</h4>
            </div>
            <div class="card-body">
              {{ App\Models\Post::count() ?? '0' }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-bell text-white fa-2x mt-4"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>AGENDA</h4>
            </div>
            <div class="card-body">
              {{ App\Models\Event::count() ?? '0' }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-tag text-white fa-2x mt-4"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>TAGS</h4>
            </div>
            <div class="card-body">
              {{ App\Models\Tags::count() ?? '0' }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-users text-white fa-2x mt-4"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>USERS</h4>
            </div>
            <div class="card-body">
              {{ App\User::count() ?? '0' }}
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>
</div>
@endsection