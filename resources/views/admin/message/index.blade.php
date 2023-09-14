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
    <table class="table table-striped table-hover">
        <thead>
            <tr >
                <th scope="col">#</th>
                <th scope="col">Sender</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($msgs->count() > 0)
            @foreach ( $msgs as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->user->email }}</td>
                <td>{{ $data->subject }}</td>
                <td style="text-align:center">
                    <a href="/admin/contact/{{ $data->id }}" class="btn btn-success"><i class="bi bi-clipboard-data-fill"></i></a>
                    <form action="/admin/contact/{{ $data->id }}" method="post" class="d-inline">
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
    {{-- {{ $->links() }} --}}
</div>

@endsection
