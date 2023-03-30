@extends('layouts.master')
@section('content')
@if(Auth::user()->role !='Admin')
@if(Auth::user()->role !='Petugas')
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
@endif
@if(Auth::user()->role !='Siswa')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Pembayaran</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pembayaran.index') }}">Kembali</a>
            </div>
        </div>
    </div>

    <br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Id Petugas</strong>
                    <input type="text" name="id_petugas"  class="form-control" value="{{ Auth::user()->name }}" readonly >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis</strong>
                    <select type="search"  name="nis" id="id_nis" class="form-control search" placeholder="Search.." onkeyup="filterFunction()">
                        <option selected></option>
                        @foreach($siswa as $row)
                            <option data-spp="{{ $row->id_spp }}" data-total="{{ $row->id_spp }}"  data-nama="{{ $row->nama }}" data-kelas="{{ $row->id_kelas }}" data-rayon="{{ $row->id_rayon }}"  {{ $row->nis == old('nis') ? 'selected' : '' }} value="{{$row->nis}}">
                            {{ $row->nis}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
                {{-- <div id="myDropdown" class="dropdown-content">
                  <input  placeholder="Search.." id="id_nis" onkeyup="filterFunction()"> --}}
                  {{-- <a href="#about">About</a>
                  <a href="#base">Base</a>
                  <a href="#blog">Blog</a>
                  <a href="#contact">Contact</a>
                  <a href="#custom">Custom</a>
                  <a href="#support">Support</a>
                  <a href="#tools">Tools</a> --}}
                  {{-- @foreach($siswa as $row)
                  <option data-spp="{{ $row->id_spp }}" data-total="{{ $row->id_spp }}"  data-nama="{{ $row->nama }}" data-kelas="{{ $row->id_kelas }}" data-rayon="{{ $row->id_rayon }}"  {{ $row->nis == old('nis') ? 'selected' : '' }} value="{{$row->nis}}">
                  {{ $row->nis}}
                  </option>
              @endforeach
                </div> --}}
              
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Siswa</strong>
                    <input class="form-control" type="text" name="nama" id="siswa" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kelas</strong>
                    <input class="form-control" type="text" name="id_kelas" id="kelas" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon</strong>
                    <input class="form-control" type="text" name="id_rayon" id="rayon" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Bayar</strong>
                    <input class="form-control" type="date" name="tgl_bayar" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id Spp</strong>
                    {{-- class="select" data-mdb-filter="true"> --}}
                    <select class="form-control selectric" id="spps" name="id_spp" readonly >
                        @foreach($spp as $data)
                           <option {{ $data->nominal == old('id_spp') ? 'selected' : '' }} value="{{ $data->nominal }}" data-nominal="{{ $data->nominal }}">{{$data->nominal}}</option>
                           @endforeach
                       </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Bulan</strong>
                    <select class="form-control" type="text" name="jumlah_bulan" id="jumlah_bulan1" readonly>
                        @foreach($spp as $data)
                        <option {{ $data->id_bulan == old('jumlah_bulan') ? 'selected' : '' }} value="{{ $data->id_bulan }}" data-id_bulan="{{ $data->id_bulan }}">{{$data->id_bulan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Bayar</strong>
                    <input class="form-control" type="text" id="bulan" name="tunggakan_bulan" placeholder="Isi bulan bayaran" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Bayar</strong>
                    <input class="form-control" type="text"  name="jumlah_dibayar" id="bayar" placeholder="Isi jumlah Bayar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Nunggak</strong>
                    <input class="form-control" type="text" id="bulan1" name="bulan" placeholder="Isi bulan nunggak">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Tunggakan</strong>
                    <input class="form-control" type="text" id="bayar1" name="total_tunggakan" placeholder="Isi total tunggakan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endif
<script>
        document.querySelector('#bulan').addEventListener('input', () => {
            const spps = parseInt(document.querySelector('#spps')[document.querySelector('#spps').selectedIndex].dataset.nominal)
            const bulan = parseInt(document.querySelector('#bulan').value)
            const bayar = spps * bulan
            document.querySelector('#bayar').value = bayar
        })
        
        document.querySelector('#bulan').addEventListener('input', () => {
            const jumlah_bulan1 = parseInt(document.querySelector('#jumlah_bulan1')[document.querySelector('#jumlah_bulan1').selectedIndex].dataset.id_bulan)
            // const jumlah_bulan1 = parseInt(document.querySelector('#jumlah_bulan1').value)
            const bulan = parseInt(document.querySelector('#bulan').value)
            const bulan1 = jumlah_bulan1 - bulan
            document.querySelector('#bulan1').value = bulan1
            
        })
        document.querySelector('#bulan').addEventListener('input', () => {
            const spps = parseInt(document.querySelector('#spps')[document.querySelector('#spps').selectedIndex].dataset.nominal)
            const bulan1 = parseInt(document.querySelector('#bulan1').value)
            const bayar1 = spps * bulan1
            document.querySelector('#bayar1').value = bayar1
        })
        // document.querySelector('#bulan1').addEventListener('input', () => {
        //     const spps = parseInt(document.querySelector('#spps')[document.querySelector('#spps').selectedIndex].dataset.nominal)
        //     const hasil_bulan = parseInt(document.querySelector('#bulan1')[document.querySelector('#bulan1').selectedIndex].dataset.nominal)
        //     const total_tunggakan = spps
        //     document.querySelector('#bayar1').value = hasil_bulan
        // })
           
    const id_nis = document.querySelector('#id_nis')
    const spps = document.querySelector('#spps')
    const cekbayar = document.querySelector('#cekbayar')
    const siswa = document.querySelector('#siswa')
    const kelas = document.querySelector('#kelas')
    const rayon = document.querySelector('#rayon')
    

    id_nis.addEventListener('change', (e) => {
        const id_spp = e.target.options[e.target.selectedIndex].getAttribute('data-spp')
        spps.value = id_spp
    })
    id_nis.addEventListener('change', (e) => {
        const id_spp = e.target.options[e.target.selectedIndex].getAttribute('data-total')
        cekbayar.value = id_spp
    })
    id_nis.addEventListener('change', (e) => {
        const nama = e.target.options[e.target.selectedIndex].getAttribute('data-nama')
        siswa.value = nama
    })
    id_nis.addEventListener('change', (e) => {
        const id_kelas = e.target.options[e.target.selectedIndex].getAttribute('data-kelas')
        kelas.value = id_kelas
        const id_rayon = e.target.options[e.target.selectedIndex].getAttribute('data-rayon')
        rayon.value = id_rayon
    })
    
</script>
@endsection
@section('title')
Create Bayar
@stop
