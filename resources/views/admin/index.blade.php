@extends('admin.layouts.main')

@section('container')

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $dataTeacher }}</h3>

          <p>Teachers</p>
        </div>
        <div class="icon">
          <i class="ion ion-university"></i>
        </div>
        <a href="/admin/teacher" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $dataBlog }}</h3>

          <p>Blogs</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-bookmark"></i>
        </div>
        <a href="/admin/blog" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $dataMessage }}</h3>

          <p>Messages</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-mail"></i>
        </div>
        <a href="/admin/contact" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    @can('admin')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $dataUser }}</h3>

          <p>Users</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    @endcan
    <!-- ./col -->
  </div>
  <!-- /.row -->

@endsection
