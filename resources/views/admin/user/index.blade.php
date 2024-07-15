@extends('layouts.admin')

@section('main')




    <div class="card shadow-sm mt-4">
          <div class="card-body px-4">
            {{-- <a href="{{ url('admin/users/create') }}" class="btn btn-primary px-3">
                Tambah User</a> --}}
            <div class="table-responsive mt-4" style="font-size: 12px">
                <table id="tabel_user" class="table table-striped my-4" id="">
                    <thead>
                        <tr style="font-weight: bold; font-size: 13px">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 14px">
                        @foreach ($data as $h)
                            <tr style="color:  @if($h->id == Auth::user()->id) #a14716 @endif">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $h->name }}</td>
                                <td>{{ $h->username }}</td>
                                <td>{{ $h->level }}</td>
                                <td class="d-flex">
                                    <a href="{{ url('admin/user/'.$h->id.'/edit') }}" class="btn btn-sm btn-outline-info mr-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit berita">
                                        <i class="mdi mdi-file-document-edit-outline"></i>
                                    </a>
                                    @if(Auth::user()->id != $h->id)
                                    {{-- <form action="{{ url('admin/users/'. $h->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Hapus data ini?')"
                                            class="btn btn-sm btn-outline-danger"><i class="mdi mdi-trash-can-outline"></i></button>
                                    </form> --}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div class="mb-5"></div>

@endsection

