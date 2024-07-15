@extends('layouts.admin')
@section('main')
    <div class="page-description">
        <div class="d-flex mb-4">
            <div class="fw-bold h4">{{ $title }}</div>
            <a href="{{ route('info.create')}}" class="btn btn-primary ml-auto">Tambah data</a>
        </div>

        <div class="card">
            <div class="card-body" style="font-size: 12px">
                <table id="tabel_info" class="table table-striped my-3 table-centered dt-responsive  table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: 13px">
                        <th>#</th>
                        <th>info</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($info as $b)
                            <tr>
                                <td class="product-list-img">
                                    <img src="{{url('img/info/'.$b->image)}}" class="img-fluid avatar-md rounded" alt="tbl">
                                </td>
                                <td>
                                    <h6 class="mt-0 mb-1">{{ $b->label }}</h6>
                                    <p class="m-0 ">{!! Str::limit($b->desc, 200, '...'); !!}</p>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ url('admin/info/'.$b->id.'/edit') }}" class="btn btn-sm btn-info mr-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit info">
                                        <i class="mdi mdi-file-document-edit-outline"></i>
                                    </a>
                                    <form action="{{ url('admin/info/'.$b->id) }}" method="POST">
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

        @foreach($info as $b)


        @endforeach

        {{ $info->links() }}

    </div>

@endsection
