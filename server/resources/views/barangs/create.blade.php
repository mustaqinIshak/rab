@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="form-barang">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                   
                    <form action="/barangs" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Nama Barang :</label>
                            <input type="text" class="form-control" type="text" id="name" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan :</label>
                            <input type="text" class="form-control" id="satuan" name="satuan">
                        </div>
                        <div class="form-group">
                            <label for="material">Material :</label>
                            <input type="number" class="form-control" id="material" name="material">
                        </div>
                        <div class="form-group">
                            <label for="jasa">Jasa :</label>
                            <input type="number" class="form-control" id="jasa" name="jasa">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan :</label>
                            <textarea rows="3" class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>    
    </div>
@endsection