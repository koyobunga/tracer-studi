@extends('layouts.admin')
@section('main')

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body" style="overflow: auto; max-height: 450px; font-size: 12px">
                <table class="table my-3" id="tabel_alumni">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                        <tr>
                            <td style="width: 30px">
                                @if($u->foto)
                                <img class="rounded-circle" width="30" height="30" src="{{ url('img/alumni/'.$u->foto) }}" alt="Header Avatar">
                                @else
                                <img class="rounded-circle" width="30" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                    @endif
                                </td>
                            <td>
                                <a style="font-weight: bold" href="{{ url('admin/pesan?id='.$u->id) }}">{{ $u->nama }}</a>
                                <div class="text-muted small">
                                    {{ $u->jurusan }} | Lulus ({{ $u->masuk }})
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-8" style="">
        @if($data)
        <div class="card">
            <div class="card-body">
                <div class="div" id="data" style="overflow: auto; max-height: 350px">
                <table class="table">
                    @foreach ($data as $p)
                        @if($p->pengirim == 0)
                            <div class="d-flex py-1">
                                <div class="text-right w-100">
                                    {{ $p->ket }}
                                    <div class="text-muted small">{{ $p->created_at->diffforhumans() }}</div>
                                </div>
                                <div class="pl-3">
                                    <img class="rounded-circle" width="30" src="{{ url('assets/alumni/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                                </div>
                            </div>
                            
                        @else
                            <div class="d-flex py-1">
                                <div class="pr-3">
                                    @if($buka->foto)
                                        <img class="rounded-circle" width="30" height="30" src="{{ url('img/alumni/'.$buka->foto) }}" alt="Header Avatar">
                                    @else
                                        <img class="rounded-circle" width="30" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                    @endif
                                </div>
                                <div>
                                    {{ $p->ket }}
                                    <div class="text-muted small">{{ $p->created_at->diffforhumans() }}</div>
                                </div>
                            </div>
                        @endif                        
                    @endforeach
                </table>
                </div>
                <form action="{{ url('admin/pesan') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="row">
                        <input type="hidden" name="penerima" value="{{ request('id') }}">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="metadescription">Kirim Pesan</label>
                                <textarea required class="form-control" name="ket" id="metadescription" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light">Kirim Pesan</button>

                </form>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    var objDiv = document.getElementById("data");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>
@endsection