@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <form action="/rabBarangs" method="post">
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
                    <label for="material">harga material</label>
                    <input type="text" class="form-control" id="material">
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  
        $('#barang').on('change', function(){
            var id = $('#barang').val()
            console.log(id)
            // $.ajax({
            //     type : 'GET',
            //     url : "/barangs/",
            //     success : function(data) {
            //         console.log(data)
            //     },
            //     error : function(){
            //         console.log(data)
            //     }
            // });
            $.get('/barangs/' + id, function(data){
                console.log(data);
            });
        });
</script>
@endsection