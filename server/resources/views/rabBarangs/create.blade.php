@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/rabBarangs" method="post">
            {{csrf_field()}}
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="barang">Barang:</label>
                   <select name="idBarang" id="barang" class="custom-select custom-select-lg mb-3">
                        <option selected>---pilih barang---</option>
                    @foreach($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                   </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="volume">volume :</label>
                    <input type="number" class="form-control" id="volume">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="satuan">satuan :</label>
                    <input type="text" class="form-control" id="satuan" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="material">harga material :</label>
                    <input type="number" class="form-control" id="material" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="jasa">harga jasa :</label>
                    <input type="number" class="form-control" id="jasa" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="totalMaterial">total Material :</label>
                    <input type="number" class="form-control" id="totalMaterial" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="totalJasa">total Jasa :</label>
                    <input type="number" class="form-control" id="totalJasa" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="keterangan">keterangan :</label>
                    <input type="text" class="form-control" id="totaljasa">
                </div>
            </div>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>
        </div>
    </div>
    
<script type="text/javascript">
  $(document).ready(function(){

        $('#barang').on('change', function(){
            let id = $('#barang').val()
            $.ajax({
                type : 'GET',
                url : `/rabBarangs/barang/${id}`,
                success : function(data) {
                    console.log(data)
                    $('#satuan').val(data.satuan)
                    $('#material').val(data.material)
                    $('#jasa').val(data.jasa)
                },
                error : function(){
                    console.log(data)
                }
            });
        });
        $('#volume').keypress(function(){
            let jasa = parseInt($('#jasa').val())
            let material = parseInt($('#material').val())
            let volume = parseInt($('#volume').val())

            $('#totalJasa').val(jasa * volume)
            $('#totalMaterial').val(material * volume)
        })
  })
</script>
@endsection