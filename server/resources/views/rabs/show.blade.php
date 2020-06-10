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
        <a href="/rabBarangs/add/{{$rab->id}}" class="btn btn-primary">tambah Barang</a >
    </div>
    @if(session('mssg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{(session('mssg'))}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    
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
                    <th scope="col">Id Barang</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">volume</th>
                    <th scope="col">Harga per Material</th>
                    <th scope="col">Harga per jasa</th>
                    <th scope="col">Total Material</th>
                    <th scope="col">Total Jasa</th>
                    <th scope="col">Ket</th>
                    <th scopr="col">Action</th>
                </thead>
                <tbody>
                @if($barangs)
                   @foreach($barangs as $barang)
                   <tr>
                        <th scope="row">{{$barang->id}}</th>
                        <td>{{$barang->nama}}</td>
                        <td>{{$barang->pivot->volume}}</td>
                        <td>{{$barang->material}}</td>
                        <td>{{$barang->jasa}}</td>
                        <td>{{$barang->pivot->totalMaterial}}</td>
                        <td>{{$barang->pivot->totalJasa}}</td>
                        <td>{{$barang->pivot->keterangan}}</td>
                        <td>
                            <form action="/rabBarangs/{{$barang->pivot->id}}/{{$rab->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                            </form>
                        </td>
                   </tr>
                   @endforeach
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="row" colspan="4">Jumlah<th>
                        <td id="totalHargaMaterial">{{$totalHargaMaterial}}</td>
                        <td id="totalHargaJasa">{{$totalHargaJasa}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Jasa + Material<th>
                        <td id="totalKeseluruhan"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">PPN 10%<th>
                        <td id="ppn"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Total<th>
                        <td id="total"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).ready(function(){
    let material = parseInt($("#totalHargaMaterial").text()) 
    let jasa = parseInt($("#totalHargaJasa").text())

    function jumlahTotal(){
       return material + jasa
    }
    function jumlahPpn(){
        let total = parseInt($("#totalKeseluruhan").text()) 
       return (total * 10)/100
    }

    function jumlahKeseluruhan(){
        let total = parseInt($("#totalKeseluruhan").text())
        let ppn = parseInt($("#ppn").text())
        return total + ppn
    }
    
    
    $("#totalKeseluruhan").text(jumlahTotal())
    $("#ppn").text(jumlahPpn(parseInt()))
    $("#total").text(jumlahKeseluruhan() )
    
 })
</script>
@endsection