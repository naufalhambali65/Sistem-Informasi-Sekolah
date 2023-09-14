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
    <a href="/downloadpdf" class="btn btn-primary mb-2"><i class="bi bi-printer-fill"></i></a>
    <table class="table table-striped table-hover">
        <thead>
            <tr >
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($datas->count() > 0)
            @foreach ( $datas as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    @if($data->authenticate == 0)
                    User
                    @elseif($data->authenticate == 1)
                    staff
                    @elseif ($data->authenticate == 2)
                    admin
                    @endif
                </td>
                <td style="text-align:center">
                    <a href="/admin/user/{{ $data->id }}" class="btn btn-success"><i class="bi bi-clipboard-data-fill"></i></a>
                    @if ($data->id != auth()->user()->id)
                    <form action="/admin/user/{{ $data->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger border-0" onclick="return confirm('yakin hapus data?')"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                    @endif
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

