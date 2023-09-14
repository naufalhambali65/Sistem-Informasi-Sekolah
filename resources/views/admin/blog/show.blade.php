@extends('admin.layouts.main')
@section('container')

<div class="container">
    <div class="row ">
        <div class="col-lg-8">
            <h1>{{ $data->title }}</h1>
            @if ($data->image)
            {{-- bisa juga diambil dari /{{ $data->image }} --}}
            <div style="max-height: 400px; overflow:hidden">
                <img src="{{asset('storage/'. $data->image) }}" class="card-img-top mb-2 img-fluid" alt="children">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?childern" class="card-img-top mb-2 img-fluid" alt="children">
            @endif
            <a href="/admin/blog" class="btn btn-success" ><i class="bi bi-arrow-left"></i></a>
            <a href="/admin/blog/{{ $data->slug }}/edit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
            <form action="/admin/blog/{{ $data->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin hapus data?')"><i class="bi bi-trash3-fill"></i></button>
                {{-- <a href="#" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a> --}}
            </form>
            <article class="fs-5">
                <small class="mr-3"
                    ><i class="bi bi-person-fill"></i> {{ $data->author->name }}</small
                  >
                  <small class="mr-3"
                    ><i class="bi bi-clock"></i>{{ $data->created_at->diffForHumans() }}</small
                  >
                {!! $data->body !!}
            </article>
        </div>
    </div>
</div>
@endsection
