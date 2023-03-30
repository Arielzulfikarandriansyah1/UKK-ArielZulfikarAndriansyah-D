@extends('layouts.master')
@section('content')
@if(Auth::user()->role !='Admin')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center" style="margin-top:200px;">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="{{asset('dashboard')}}">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endif

@if(Auth::user()->role !='Petugas')
@if(Auth::user()->role !='Siswa')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Laporan Tunggakan</h2>
            </div>
            <hr>
            <div class="pull-right" style="float: left;">
                <a class="btn btn-success" href="/exportexcel">Export  <i class="fa-sharp fa-solid fa-file-export"></i></a>
                <a class="btn btn-primary" href="/exportpdf">ExportPdf  <i class="fa-sharp fa-solid fa-file-export"></i></a>
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Tunggakan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>kelas</th>
                            <th>rayon</th>
                            <th>spp</th>
                            <th>Bulan Nunggak</th>
                            <th>Total Tunggakan</th>
                            <th width="112px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tunggakans as $tunggakan)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $tunggakan->nis}}</td>
                                <td>{{ $tunggakan->nama}}</td>
                                <td>{{ $tunggakan->id_kelas}}</td>
                                <td>{{ $tunggakan->id_rayon}}</td>
                                <td>{{ $tunggakan->id_spp}}</td>
                                <td>{{ $tunggakan->bulan }}bulan</td>
                                <td>-Rp.{{$tunggakan->total_tunggakan }}</td>
                                <td>
                                    <form action="{{ route('tunggakan.destroy',$tunggakan->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('tunggakan.edit',$tunggakan->id) }}">
                                            <i class="fa-solid fa-pen"> </i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endif
@endif
@endsection

@section('title')
Tunggakan
@stop
