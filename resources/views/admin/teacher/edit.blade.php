@extends('admin.layouts.main')
@section('container')

<div class="col-lg-8">
    <form method="post" action="/admin/teacher/{{ $data->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $data->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mapel" class="form-label">Teach Subject</label>
            <select class="form-select @error('mapel') is-invalid @enderror" id="mapel" name="mapel" aria-label="Default select example">
            <option value="Mathematics" @if (old('mapel', $data->mapel) == 'Mathematics') selected @endif>Mathematics</option>
            <option value="Physics" @if (old('mapel', $data->mapel) == 'Physics') selected @endif >Physics</option>
            <option value="Sports" @if (old('mapel', $data->mapel) == 'Sports') selected @endif>Sports</option>
          </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            @if ($data->image)
            <input type="hidden" name="oldImage" value="{{ $data->image }}">
            <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/'. $data->image) }}" style="display:block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

        <button type="submit" class="btn btn-primary">Upadate Data</button>
    </form>
    </div>


    <script>

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>


@endsection
