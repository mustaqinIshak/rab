@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
    <button class="btn btn-create" id="tambah">tambah</button>
        <div class="row" >
                <form action="/rabBarangs" method="post" id="formRabBarang">
                    @method('POST')
                    {{csrf_field()}}
                    <span id="result"></span>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    <input type="number" value="{{$id}}" name="rab_id" id="rabId">
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

                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="save">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
        </div>
    </div>
    
<script type="text/javascript">
  $(document).ready(function(){
        let count = 1
        let barang = null
        $("#rabId").hide()
        function pilihBarang(number){
            for(let i = 0; i < number; i++){
                $(".pilihBarang"+i).change(function(){
                    let id = $('.pilihBarang'+i).val()
                    $.ajax({    
                        url: `/rabBarangs/barang/${id}`,
                        method: "GET",
                        success: function(data){   
                            $('.satuan'+i).text(data.satuan)
                            $('.hargaMaterial'+i).text(data.material)
                            $('.hargaJasa'+i).text(data.jasa)
                        },
                        faill: function(error){
                            console.log(error)
                        }
                    })
                })
            }
        }
        function volume(number){
            for(let i = 0; i < number; i++){
                $('.volume'+i).change(function(){
                    let material = parseInt($('.hargaMaterial'+i).text())
                    let jasa = parseInt($('.hargaJasa'+i).text())
                    let volume = $('.volume'+i).val()
                    $('.totalMaterial'+i).val(material * volume)
                    $('.totalJasa'+i).val(jasa * volume)
                })
            }
        }

        function deleteField(number){
            for(let i = 0; i < number; i++){
                $('tbody').on('click', '.remove'+1, function(){
                    $(this).parent().parent().remove()
                })
            }
        }
        $('#tambah').click(function(){
            addRow()
            pilihBarang(count)
            volume(count)
            deleteField(count)
        })
        
       function addRow(){
           let tr = '<tr>'
           tr += `
           <td>
                <select class="form-control pilihBarang${count}" name="barang_id[]">
                    <option selected>Choose...</option>
                    @foreach($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" class="form-control volume${count}" name="volume[]" >
            </td>
            <td>
                <span class="satuan${count}"></span>
            </td>
            <td>
                <span class="hargaMaterial${count}"></span>
            </td>
            <td>
                <span class="hargaJasa${count}"></span>
            </td>
            <td>
                <input type="number" class="form-control totalMaterial${count}" name="totalMaterial[]"  readonly>
            </td>
            <td>
                <input type="number" class="form-control totalJasa${count}" name="totalJasa[]" readonly>
            </td>
            <td>
                <input type="text" class="form-control keterangan${count}" name="keterangan[]"  >
            </td>
            <td>
                <a href="#" class="btn btn-danger remove${count}">hapus</a>
            </td>
           `
            $('tbody').append(tr)
            count++
       }
    //    $("#formRabBarang").on('submit', function(even){
    //        event.preventDefault()
    //        $.ajax({
    //            headers:{
    //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //            },
    //            url: "/rabBarangs",
    //            method: "post",
    //            data: $(this).serialize(),
    //            dataType: 'json',
    //            beforeSend: function(){
    //                $("#save").attr('disable', 'disable')
    //            },
    //            success: function(data){
    //                if(data.error)
    //                {
    //                    let error_html = ''
    //                    for(let i = 0; i < data.error.length; i++){
    //                        error_html += '<p>' + data.error[i] + '<p>'
    //                    }
    //                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>')
    //                }
    //                else {
    //                 $('#result').html('<div class="alert alert-success">'+"data berhasil di tambahkan"+'</div>')
    //                 $('#save').attr('disable', false);
    //                }
    //             console.log(data)
    //            }
    //        })
    //    })
  })
</script>
@endsection