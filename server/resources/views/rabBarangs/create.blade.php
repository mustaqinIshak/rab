@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
    <button class="btn btn-create" id="tambah">tambah</button>
        <div class="row" >
                <form action="/rabBarangs" method="post" id="formRabBarang">
            
                    <span id="result"></span>
                    <table class="table">
                        <thead class="thead-dark" id="barang-table">
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">volume</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Material</th>
                                <th scope="col">Harga Jasa</th>
                                <th scope="col">Total Material</th>
                                <th scope="col">Total Jasa</th>
                                <th scope="col">Ket</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control pilihBarang">
                                        <option selected>Choose...</option>
                                        @foreach($barangs as $barang)
                                            <option value="{{$barang->id}}">{{$barang->nama}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control volume" name="volume[]" >
                                </td>
                                <td>
                                    <input type="text" class="form-control satuan" name="satuan[]"  readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control hargaMaterial"  readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control hargaJasa"  readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control totalMaterial" name="totalMaterial[]"  readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control totalJasa" name="totalJasa[]" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control keterangan" name="keterangan[]"  >
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove">hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
        </div>
    </div>
    
<script type="text/javascript">
  $(document).ready(function(){
        let count = 1
        let barang = null

        $(".pilihBarang").change(function(){
            let id = $('.pilihBarang').val()
            console.log(id)
            $.ajax({    
                url: `/rabBarangs/barang/${id}`,
                method: "GET",
                success: function(data){   
                    $('.satuan').val(data.satuan)
                    $('.hargaMaterial').val(data.material)
                    $('.hargaJasa').val(data.jasa)
                },
                faill: function(error){
                    console.log(error)
                }
            })
        })

        $('#tambah').click(function(){
            addRow()
        })
       function addRow(number){
           let tr = '<tr>'
           tr += `
           <td>
                <select class="form-control pilihBarang">
                    <option selected>Choose...</option>
                    @foreach($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" class="form-control volume" name="volume[]" >
            </td>
            <td>
                <input type="text" class="form-control satuan" name="satuan[]"  readonly>
            </td>
            <td>
                <input type="number" class="form-control hargaMaterial"  readonly>
            </td>
            <td>
                <input type="number" class="form-control hargaJasa"  readonly>
            </td>
            <td>
                <input type="number" class="form-control totalMaterial" name="totalMaterial[]"  readonly>
            </td>
            <td>
                <input type="number" class="form-control totalJasa" name="totalJasa[]" readonly>
            </td>
            <td>
                <input type="text" class="form-control keterangan" name="keterangan[]"  >
            </td>
            <td>
                <a href="#" class="btn btn-danger remove">hapus</a>
            </td>
           `
            $('tbody').append(tr)
       }
  })
</script>
@endsection