<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Alumni</title>

      <!-- App favicon -->
      <link rel="shortcut icon" href="{{url('img/logo.png')}}">


      <!-- Bootstrap Css -->
      <link href="{{ url('assets/admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{ url('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{ url('assets/admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body style="background-color: #fff">
    <div class="row">
        <div class="col-12">
                    <div class="text-center h4">
                        SMA NEGERI 1 LUWUK
                    </div>
                    <div class="text-center h5">
                        DATA ALUMNI 
                    </div>
                    <div class="text-center">
                        Tahun {{ request('tahun') }}
                    </div>
                    <table class="table table-bordered mt-5 my-3 table-centered dt-responsive  table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr style="font-size: 12px">
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

    <!-- JAVASCRIPT -->
    <script src="{{url('assets/admin/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{url('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script>
        window.print()
    </script>
</body>
</html>