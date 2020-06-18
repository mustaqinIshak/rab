<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <title>Document</title>

</head>
<body>
<style type="text/css" media="print">

@page { 
        size: landscape;
}

table tr td,
table tr th{
    font-size: 9pt;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 detail-rab">
            <h4>Nomor RAB : {{$rab->noRab}}</h4>
            <h4>Nama : {{$rab->nama}}</h4>
            <h4>Tanggal : {{$rab->created_at}}</h4>
        </div>
    </div>


            <table class="table table-bordered">
                <thead>
                    <th scope="col">Id Barang</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">volume</th>
                    <th scope="col">Harga per Material</th>
                    <th scope="col">Harga per jasa</th>
                    <th scope="col">Total Material</th>
                    <th scope="col">Total Jasa</th>
                    <th scope="col">Ket</th>
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
                    
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Jasa + Material<th>
                        <td id="totalKeseluruhan" colspan="3">{{$totalKeseluruhan}}</td>
                       
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">PPN 10%<th>
                        <td id="ppn" colspan="3"></td>
                        
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Diskon<th>
                        <td class="discon" colspan="3"></td>
                        
                    </tr>
                    <tr>
                        <th scope="row" colspan="4">Total<th>
                        <td id="total" colspan="3"></td>
                        
                    </tr>
                </tfoot>
            </table>
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    let material = parseInt($("#totalHargaMaterial").text()) 
    let jasa = parseInt($("#totalHargaJasa").text())
    let id = parseInt($("#idRab").text())
    let nDiskon = 0
    let totalKeseluruhan = null

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
        totalKeseluruhan = total + ppn
        return total + ppn
    }

    $("#totalKeseluruhan").text(jumlahTotal())
    $("#ppn").text(jumlahPpn())
    $("#total").text(jumlahKeseluruhan())
})
</script>
</body>
</html>