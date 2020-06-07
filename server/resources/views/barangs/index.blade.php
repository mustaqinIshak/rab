@extends('layouts.layout')
@section('content')
<div class="col-6">
    @if(session('mssg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{(session('mssg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
   <div class='barang'>
        <div class="tambah-barang">
            <a href="/barangs/buat" >
                <i class="material-icons">
                    add
                </i>
                <span class="text">
                    Tambah Barang
                </span>
            </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">satuan</th>
                    <th scope="col">material</th>
                    <th scope="col">jasa</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $barang)
                    <tr>
                        <th scope="col">{{$barang->id}}</th>
                        <td>{{$barang->nama}}</td>
                        <td>{{$barang->satuan}}</td>
                        <td> 
                            @if($barang->material)
                                Rp.{{$barang->material}}
                            @else
                                    -
                            @endif
                        </td>
                        <td>@if($barang->jasa)
                                Rp.{{$barang->jasa}}
                            @else
                                    -
                            @endif</td>
                        <td>{{$barang->keterangan}}</td>
                        <td>
                            <a href="/barangs/{{$barang->id}}" class="btn btn-secondary">detail</a>
                            <a href="/barangs/destroy/{{$barang->id}}" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
@endsection