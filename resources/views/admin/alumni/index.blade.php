@extends('layouts.admin')
@section('main')
    <div class="page-description">
        <div class="d-flex mb-4">
            <div class="fw-bold h4">{{ $title }}</div>
            <a href="{{ route('alumni.create')}}" class="btn btn-primary ml-auto">Tambah data</a>
        </div>

        <div class="card">
            <div class="card-body" style="font-size: 12px">
                <table id="tabel_info" class="table table-striped my-3 table-centered dt-responsive  table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: 13px">
                        <th>#</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Masuk</th>
                        <th>Selesai</th>
                        <th>Kontak</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $b)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{$b->nis}}</td>
                                <td>{{$b->nama}}</td>
                                <td>{{$b->kelamin}}</td>
                                <td>{{$b->alamat}}</td>
                                <td>{{$b->jurusan}}</td>
                                <td>{{$b->masuk}}</td>
                                <td>{{$b->selesai}}</td>
                                <td>{{$b->kontak}}</td>
                                <td class="d-flex">
                                    <a href="{{ url('admin/alumni/'.$b->id.'/edit') }}" class="btn btn-sm btn-info mr-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit info">
                                        <i class="mdi mdi-file-document-edit-outline"></i>
                                    </a>
                                    <form action="{{ url('admin/alumni/'.$b->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="if(confirm('Hapus data?')){ return true;}else{ return false;}"
                                            class="btn btn-danger btn-sm ps-3 pe-1"><i class="mdi mdi-trash-can-outline"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

        @foreach($alumni as $b)


        @endforeach

        {{ $alumni->links() }}

    </div>

@endsection
