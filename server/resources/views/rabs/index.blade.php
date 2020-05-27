@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                     <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br />
                @elseif(session('mssg'))
                    <div class="alert alert-success">
                        {{(session('mssg'))}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="/rabs" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="norab">No Rab :</label>
                        <input class="form-control" type="text" id="norab" name="noRab">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input class="form-control" type="text" id="nama" name="nama">
                    </div>
                    <button type="submit" class="btn btn-primary">create</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No RAB</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rabs as $rab)
                            <tr>
                                <th scope="row">{{$rab->id}}</th>
                                <td>{{$rab->noRab}}</td>
                                <td>{{$rab->nama}}</td>
                                <td>{{$rab->created_at}}</td>
                                <td>
                                    <a href="/rabs/{{$rab->id}}" class="btn btn-primary">Detail</a>
                                    <a href="/rabs/edit/{{$rab->id}}" class="btn btn-secondary">Edit</a>
                                    <form action="/rabs/{{$rab->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection