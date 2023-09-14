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
    <a href="/admin/teacher/create" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr >
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th class="col-sm-4" style="text-align:center" scope="col">Image</th>
                <th scope="col" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($datas->count() > 0)
            @foreach ( $datas as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->mapel }}</td>
                <td style="text-align:center">
                    @if (!$data->image)
                        <img class="img-fluid img-thumbnail col-sm-4" src="/img/avatar.png" alt="">
                    @else
                    <img class="img-fluid img-thumbnail col-sm-4" src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->name }}">
                    @endif
                </td>
                <td style="text-align:center">
                    <a href="/admin/teacher/{{ $data->id }}/edit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                    <form action="/admin/teacher/{{ $data->id }}" method="post" class="d-inline">
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
