@extends('layouts.admin')
@section('main')

<div class="d-flex">
    <div class="w-100"></div>
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if(request('tahun'))
            {{ request('tahun') }}
          @else
            Tahun
          @endif 
          <i class="mdi mdi-calendar-month-outline ml-2"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @for($i = 0; $i < 5; $i++)
                <a class="dropdown-item" href="{{ url('admin?tahun='.date('Y')-$i) }}">{{ date('Y')-$i }}</a>
            @endfor
        </div>
      </div>
</div>
<div class="row mt-3">
<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
         <div class="mini-stat">
             <span class="mini-stat-icon bg-primary float-left"><i class="ion ion-md-people"></i></span>
             <div class="mini-stat-info text-right">
                 <span class="counter text-primary">{{ $data->count() }}</span>
                 Jumlah Alumni
             </div>
             <p class=" mb-0 mt-4 text-muted">Total alumni: {{ $data->count() }}<span class="float-right"><i class="mdi mdi-update mr-1"></i>{{ request('tahun') }}</span></p>
         </div>
        </div>
    </div>
 </div>

 <div class="col-lg-4">
    <div class="card">
        <div class="card-body">
         <div class="mini-stat clearfix">
             <span class="mini-stat-icon bg-success float-left"><i class="ion ion-ios-person-add"></i></span>
             <div class="mini-stat-info text-right">
                 <span class="counter text-success">{{ $data->where('status', '=', 'Bekerja')->count() }}</span>
                 Alumni Bekerja
             </div>
             <div class="clearfix"></div>
             <p class="text-muted mb-0 mt-4">Persentase: {{ number_format($data->where('status', '=', 'Bekerja')->count()/$data->count()*100, 2) }} %<span class="float-right"><i class="mdi mdi-update mr-1"></i>{{ request('tahun') }}</span></p>
         </div>
        </div>
    </div>
 </div>
 <div class="col-lg-4">
    <div class="card">
        <div class="card-body">
         <div class="mini-stat clearfix">
             <span class="mini-stat-icon bg-warning float-left"><i class="ion ion-md-pie"></i></span>
             <div class="mini-stat-info text-right">
                 <span class="counter text-warning">{{ $data->where('status', '=', 'Studi')->count() }}</span>
                 Alumni Lanjut Studi
             </div>
             <div class="clearfix"></div>
             <p class="text-muted mb-0 mt-4">Persentase: {{ number_format($data->where('status', '=', 'Studi')->count()/$data->count()*100, 2) }} % <span class="float-right"><i class="mdi mdi-update mr-1"></i>{{ request('tahun') }}</span></p>
         </div>
        </div>
    </div>
 </div>

</div>
@endsection
