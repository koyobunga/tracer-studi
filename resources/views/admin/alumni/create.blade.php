@extends('layouts.admin')

@section('main')
    <div class="card p-4">



          <form action="{{ url('admin/alumni') }}" method="POST" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">NIS</label>
              <input required name="nis" value="{{ old('nis')}}" type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('nis')
                <div class="invalid-feedback">
                    {{ $message}}
                </div>
              @enderror
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input required name="nama" value="{{ old('nama')}}" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('nama')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select required name="kelamin" type="text" class="form-control @error('kelamin') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option @if(old('kelamin') == 'Pria') selected @endif value="Pria">Pria</option>
                    <option @if(old('kelamin') == 'Wanita') selected @endif value="Wanita">Wanita</option>
                </select>
                @error('kelamin')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input  name="alamat" value="{{ old('alamat')}}" type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('alamat')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                <select required name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <option @if(old('jurusan') == 'IPA') selected @endif value="IPA">IPA</option>
                    <option @if(old('jurusan') == 'IPS') selected @endif value="IPS">IPS</option>
                </select>
                @error('jurusan')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Masuk</label>
                <input required name="masuk" value="{{ old('masuk')}}" type="date" class="form-control @error('masuk') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('masuk')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Selesai</label>
                <input required name="selesai" value="{{ old('selesai')}}" type="date" class="form-control @error('selesai') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('selesai')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Kontak</label>
                <input  name="kontak" value="{{ old('kontak')}}" type="number" class="form-control @error('kontak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('kontak')
                  <div class="invalid-feedback">
                      {{ $message}}
                  </div>
                @enderror
              </div>




              <div class="d-flex mt-4">
                <a href="{{ url('admin/alumni') }}" class="btn btn-secondary"> <i class="mdi mdi-keyboard-backspace"></i> Kembali </a>
                <button type="submit" class="btn ml-auto btn-primary"> Tambahkan </button>
            </div>
          </form>

    </div>


@endsection

