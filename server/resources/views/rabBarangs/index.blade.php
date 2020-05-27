@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 detail-rab">
            <h4>Nomor RAB : {{$rab->noRab}}</h4>
            <h4>Nama : {{$rab->nama}}</h4>
            <h4>Tanggal : {{$rab->created_at}}</h4>
        </div>
    </div>
    <div class="row tambah-barang">
        <button class="btn btn-primary">tambah Barang</button>
    </div>
    <div class="row">
        <div class="col-12 daftar-barang-rab">
            @if($errors->any()) 
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <table class="table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">volume</th>
                    <th scope="col">Harga Material</th>
                    <th scope="col">Harga jasa</th>
                    <th scope="col">Total Material</th>
                    <th scope="col">Total Jasa</th>
                    <th scope="col">Ket</th>
                </thead>
                <tbody>
                    @foreach($rab->barangs as $barang)
                    <th scope="row">{{$barang->nama}}</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection