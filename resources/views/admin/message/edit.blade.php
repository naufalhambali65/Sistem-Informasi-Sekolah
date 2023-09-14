@extends('admin.layouts.main')
@section('container')

<div class="container">
    <div class="row ">
        <div class="col-lg-8">
            <h1>{{ $data->subject }}</h1>
            <a href="/admin/contact" class="btn btn-success" ><i class="bi bi-arrow-left"></i></a>
            <article class="fs-5">
                <small class="mr-3"
                    ><i class="bi bi-person-fill"></i> {{ $data->user->name }}</small
                  >
                  <small class="mr-3"
                    ><i class="bi bi-clock"></i>{{ $data->created_at->diffForHumans() }}</small
                  >
                {!! $data->message !!}
            </article>
        </div>
    </div>
</div>
@endsection
