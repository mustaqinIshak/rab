@extends('layouts.layout')
@section('content')
   <div class='barang'>
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
                        <td>{{$barang->material}}</td>
                        <td>{{$barang->jasa}}</td>
                        <td>{{$barang->keterangan}}</td>
                        <td>
                            <button type="button" class="btn btn-info">detail</button>
                            <button type="button" class="btn btn-secondary">edit</button>
                            <button type="button" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
@endsection