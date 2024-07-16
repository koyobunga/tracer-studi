@extends('layouts.alumni')
@section('main')

<div class="row mt-2">
<div class="text-center col-7 mx-auto">
        <form action="{{ url('alumni') }}" method="GET">
        <div class="input-group mb-3" style="height: 40px">
            <input name="search" type="text" value="{{ request('search') }}" style="border-radius:30px 0 0 30px; height: 40px;" class="form-control p-3" placeholder="Ketik nama atau NIS" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary pr-4"  style="border-radius: 0 30px 30px 0;" type="button">
                <i class=" mdi mdi-file-search-outline mr-1"></i>
                Search</button>
            </div>
        </div>
    </form>
</div>
</div>

<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="small text-muted">
                            <td></td>
                            <td>Alumni</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        @if($d->nis != Auth::user()->alumni->nis)
                            <tr>
                                <td style="width: 55px">
                                    @if($d->foto)
                                        <img class="rounded-circle" width="50" height="50" src="{{ url('img/alumni/'.Auth::user()->alumni->foto) }}" alt="Header Avatar">
                                    @else
                                        <img class="rounded-circle" width="50" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                    @endif
                                </td>
                                <td class="pl-3">
                                    <div class="" style="font-weight: bold; font-size: 15px">
                                        <a href="{{ url('alumni/show/'.$d->id) }}">{{ $d->nama }}</a>
                                    </div>
                                    <div class="small text-muted">{{ $d->alamat }}</div>
                                    <div class="mt-2" style="font-size: 13px">
                                        <span class="">Jurusan </span> {{ $d->jurusan }}
                                        <span class=" ml-4">Angkatan </span> ({{ $d->masuk }})
                                        <span class=" ml-4">Selesai </span> ({{ $d->selesai }})
                                    </div>
                                </td>
                                <td>
                                    @if($d->status != null)
                                        @if($d->status == 'Studi')
                                            <span class="badge badge-primary h5 p-2">{{ $d->status }}</span>
                                        @else
                                            <span class="badge badge-success h5 p-2">{{ $d->status }}</span>
                                        @endif
                                    @endif
                                </td>
                            </tr> 
                            @endif           
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5>Info Sekolah</h5>
                <table class="table">
                    @foreach ($info as $i)
                        <tr>
                            <td>
                                <img class="rounded-circle mt-2" width="50" height="50" src="{{ url('img/info/'.$i->image) }}" alt="Header Avatar">
                            </td>
                            <td>
                                <div style="font-weight: bold">{{ $i->label }}</div>
                                <div style="">{!! Str::limit($i->ket, 80, '...') !!}</div>
                                <div class="mt-2 text-muted small">{{ $i->created_at->diffForHumans() }}</div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
