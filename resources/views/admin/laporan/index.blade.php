@extends('layouts.admin')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="font-size: 12px">
                <div class="d-flex mb-4">
                    <div class="h5">Laporan Alumni</div>
                    <div class="text-right ml-auto">
                        <form action="" method="get">
                            <div class="input-group">
                                <select name="tahun" class="custom-select" style="min-width: 100px" id="inputGroupSelect04">
                                  <option value=""> Tahun </option>
                                  @for($i = 0; $i < 5; $i++)
                                        <option @if(request('tahun') == date('Y')-$i) selected @endif value="{{ date('Y')-$i }}">{{ date('Y')-$i }}</option>
                                  @endfor
                                </select>
                                <select name="status" class="custom-select" id="inputGroupSelect04" style="min-width: 130px">
                                  <option value=""> Status </option>
                                  <option @if(request('status') == 'Bekerja') selected @endif value="Bekerja">Bekerja</option>
                                  <option @if(request('status') == 'Studi') selected @endif value="Studi">Studi</option>
                                </select>
                                <div class="input-group-append">
                                  <button class="btn btn-primary px-3" type="submit"> Tampil </button>
                                  <a href="{{ url('admin/laporan/print?tahun='.request('tahun').'&status='.request('status')) }}" class="btn btn-danger px-3" type="submit"> Print <i class="ion ml-2 ion-md-print"></i> </a>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
                <table id="data" class="table table-striped my-3 table-centered dt-responsive  table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $b)
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
                                <td>{{$b->status}}</td>
                              
                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>

   
</div>

<script>
    var objDiv = document.getElementById("data");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>
@endsection