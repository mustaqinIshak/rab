@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 rab-edit">
                @if($errors->all())
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
                @endif
                <form action="/rabs/{{$rab->id}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nomor">Nomor RAB</label>
                        <input id="nomor" name="noRab" type="text" class="form-control" value="{{$rab->noRab}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input id="nama" name="nama" type="text" class="form-control" value="{{$rab->nama}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection