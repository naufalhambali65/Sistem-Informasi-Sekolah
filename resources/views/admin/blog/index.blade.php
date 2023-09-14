@extends('admin.layouts.main')

@section('container')

<div class="col-lg-8">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="table-responsive small col-lg-8">
    <a href="/admin/blog/create" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr >
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($datas->count() > 0)
            @foreach ( $datas as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->author->name }}</td>
                <td style="text-align:center">
                    <a href="/admin/blog/{{ $data->slug }}" class="btn btn-success"><i class="bi bi-clipboard-data-fill"></i></a>
                    <a href="/admin/blog/{{ $data->slug }}/edit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                    <form action="/admin/blog/{{ $data->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger border-0" onclick="return confirm('yakin hapus data?')"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="4">Data Tidak Ditemukan..</td>
                </tr>
            @endif

        </tbody>

    </table>
    {{ $datas->links() }}
</div>

@endsection
