@extends('layouts.alumni')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Pribadi</h4>
                <p class="card-title-desc">Silahkan lengkapi biodata anda</p>

                <form action="{{ url('alumni/profile/post') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="manufacturerbrand">NIS</label>
                                <input readonly required value="{{ $data->nis }}" id="nis" name="nis" type="text"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required value="{{ $data->nama }}" id="nama" name="nama" type="text"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kelamin</label>
                                <select required name="kelamin" type="text"
                                    class="form-control @error('kelamin') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    <option @if($data->kelamin == 'Pria') selected @endif value="Pria">Pria</option>
                                    <option @if($data->kelamin == 'Wanita') selected @endif value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input required value="{{ $data->alamat }}" id="alamat" name="alamat" type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Jurusan</label>
                                <select required name="jurusan" type="text"
                                    class="form-control @error('jurusan') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    <option @if($data->jurusan == 'IPA') selected @endif value="IPA">IPA</option>
                                    <option @if($data->jurusan == 'IPS') selected @endif value="IPS">IPS</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="masuk">Masuk (Tahun)</label>
                                <input required value="{{ $data->masuk }}" id="masuk" name="masuk" type="date"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="selesai">Selesai (Tahun)</label>
                                <input required value="{{ $data->selesai }}" id="selesai" name="selesai" type="date"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="kontak">Kontak</label>
                                <input required value="{{ $data->kontak }}" id="kontak" name="kontak" type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Status Pekerjaan</label>
                                <select required name="status" type="text"
                                    class="form-control @error('status') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    <option @if($data->status == 'Bekerja') selected @endif value="Bekerja">Bekerja</option>
                                    <option @if($data->status == 'Studi') selected @endif value="Studi">Studi</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6 text-center">
                            <div class="form-group">
                                <label>Foto Profile</label> <br />
                                @if(!empty($data->foto))
                                <img src="{{ url('img/alumni/'.$data->foto) }}" alt="profile img" class="img-fluid rounded"
                                    style="max-width: 300px;" />
                                @else
                                <img src="{{ url('img/profile.png') }}" alt="product img" class="img-fluid"
                                    style="max-width: 200px;" />
                                @endif
                                <br />
                                <button data-toggle="modal" data-target="#exampleModal" type="button"
                                    class="btn btn-purple mt-3 waves-effect waves-light">Ubah Foto</button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Perubahan</button>

                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Riwayat </h4>
                <p class="card-title-desc">Informasikan status perkerjaan alumni saat ini</p>

                <form action="{{ url('alumni/riwayat') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="metatitle">Status Pekerjaan</label>
                                <select name="status" id="" class="form-control">
                                    <option value="Bekerja">Bekerja</option>
                                    <option value="Studi">Lanjut Studi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="metakeywords">Nama (Instansi/Perusahaan/Universitas)</label>
                                <input id="metakeywords" name="instansi" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="metakeywords">Mulai (Bekerja/Lanjut studi)</label>
                                <input id="metakeywords" name="mulai" type="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="metadescription">Deskripsi (Bidang Ilmu atau Bidang Pekerjaan)</label>
                                <textarea class="form-control" name="bidang" id="metadescription" rows="6"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan Riwayat</button>

                </form>


                <div class="text-muted mt-4">Riwayat saya</div>
                <div class="table-responsive ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Instansi</th>
                                <th>Sejak</th>
                                <th>Desc</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $r)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r->status }}</td>
                                    <td>{{ $r->instansi }}</td>
                                    <td>{{ $r->mulai }}</td>
                                    <td>{!! $r->bidang !!}</td>
                                    <td class="text-muted">{{ $r->created_at->diffforhumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('alumni/profile/foto') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('post')
                    <input required type="file" name="foto" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload foto</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection