@extends('layouts.alumni')
@section('main')

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('alumni/pesan/post') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="metadescription">Kirim Pesan</label>
                                <textarea required class="form-control" name="ket" id="metadescription" rows="6"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success waves-effect waves-light">Kirim Pesan</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-6" style="">
        <div class="card">
            <div class="card-body">
                <div class="pb-5" id="data" style="overflow: auto; max-height: 350px">
                    @foreach ($data as $p)
                        @if($p->pengirim == Auth::user()->alumni->id)
                                <div class="d-flex py-1">
                                    <div class="text-right w-100">
                                        {{ $p->ket }}
                                        <div class="text-muted small">{{ $p->created_at->diffforhumans() }}</div>
                                    </div>
                                    <div class="pl-3">
                                        @if(Auth::user()->alumni->foto)
                                        <img class="rounded-circle" width="30" height="30" src="{{ url('img/alumni/'.Auth::user()->alumni->foto) }}" alt="Header Avatar">
                                        @else
                                            <img class="rounded-circle" width="30" src="{{ url('assets/alumni/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                        @endif
                                    </div>
                                </div>
                                
                            </tr>
                        @else
                        <tr>
                            <div class="d-flex py-1">
                                <div class="pr-3">
                                    <img class="rounded-circle" width="30" src="{{ url('assets/alumni/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                                </div>
                                <div>
                                    {{ $p->ket }}
                                    <div class="text-muted small">{{ $p->created_at->diffforhumans() }}</div>
                                </div>
                            </div>
                            
                        @endif                        
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var objDiv = document.getElementById("data");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>
@endsection