@extends('layouts.admin')


@section('main')
    <div class="card p-4">


          <form action="{{ url('admin/info/'.$data->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Label</label>
              <input value="{{ $data->label }}" name="label" type="text" class="form-control" id="exampleInputEmail1" aria-ketribedby="emailHelp">
            </div>

            <div>
              <label for="formFile" class="form-label">Cover</label>
              <input name="image" id="image" class="form-control" type="file" id="formFile" onchange="previewImage()">
            </div>
            @if ($data->image)
                  <img src="{{ url('img/info/'.$data->image) }}" class="img-preview img-fluid mt-2 col-sm-3 mb-3 d-block">
              @else
                  <img class="img-preview img-fluid mt-2 col-sm-3 mb-3">
              @endif

            <textarea id="elm1"  name="ket" id="" cols="30" rows="10">
              {!! $data->ket !!}
            </textarea>



            <div class="d-flex mt-4">
                <a href="{{ url('admin/info') }}" class="btn btn-secondary"> <i class="mdi mdi-keyboard-backspace"></i> Kembali </a>
                <button type="submit" class="btn ml-auto btn-warning"> Perbarui </button>
            </div>
          </form>

    </div>

    <script>
      function previewImage(){
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display='block';

        const oFreader = new FileReader();
        oFreader.readAsDataURL(image.files[0]);
        oFreader.onload = function(oFREvent){
          imagePreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection

