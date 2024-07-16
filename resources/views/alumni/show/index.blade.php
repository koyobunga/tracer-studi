@extends('layouts.alumni')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="text-center mt-3">
            @if($data->foto)
                <img class="rounded-circle" width="120" height="120" src="{{ url('img/alumni/'.Auth::user()->alumni->foto) }}" alt="Header Avatar">
            @else
                <img class="rounded-circle" width="120" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
            @endif

            <div class="mt-3 h5">{{ $data->nama }}</div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                

                <table class="table table-striped mt-5">
                    <tr>
                        <td>NIS</td>
                        <td>: {{ $data->nis }}</td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: {{ $data->jurusan }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Masuk</td>
                        <td>: {{ $data->masuk }}</td>
                    </tr>
                    <tr>
                        <td>Tahun Selesai</td>
                        <td>: {{ $data->selesai }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Kontak</td>
                        <td>: {{ $data->kontak }}</td>
                    </tr>
                </table>
                
                <div class="mt-5 text-center h5">Riwayat</div>
                <table class="table mt-3">
                    <thead>
                        <tr class="small text-muted">
                            <td>Date</td>
                            <td>Status</td>
                            <td>Instansi</td>
                            <td>Desc</td>
                        </tr>
                    </thead>
                    @foreach ($data->riwayat as $r)
                        <tr>
                            <td>{{ $r->mulai }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ $r->instansi }}</td>
                            <td>{{ $r->bidang }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>



@endsection