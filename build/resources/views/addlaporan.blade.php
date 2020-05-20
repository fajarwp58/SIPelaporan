@extends('layouts.main')
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">

            <div class="m-t-20 text-center">
                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                    <img src="../../assets/images/avatars/thumb-1.jpg" alt="">
                </div>
                <h4 class="m-t-30"> {{Auth::user()->user_nama}}  </h4>
                <p>{{Auth::user()->user_nrp}}</p>
            </div>

            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ url('home') }}">
                                <span class="icon-holder">
                                    <i class="fas fa-home"></i>
                                </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ url('kelolapelapor') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-team"></i>
                            </span>
                    <span class="title">Data Pelapor</span>
                </a>
            </li>

            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ url('kelolajenis') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-sort-ascending"></i>
                                </span>
                    <span class="title">Kelola Jenis Kehilangan</span>
                </a>
            </li>

            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ url('kelolalaporan') }}">
                            <span class="icon-holder">
                                <i class="anticon anticon-download"></i>
                            </span>
                    <span class="title">Kelola Laporan</span>
                </a>
            </li>

            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="{{ url('statistik') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                    <span class="title">Statistik</span>
                </a>
            </li>

        </ul>
    </div>
</div>

@section('content')

{{--    @if (count($errors) > 0)--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    {{ $error }}--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="card">
        <div class="card-header">
           <h4> Form Laporan Kehilangan</h4>
           <h4>--------------------------</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>NIK Pelapor</label>
                    <input type="text" class="form-control"  value="{{$pelapor->pelapor_nik}}" readonly >
                </div>

                <div class="form-group col-md-6">
                    <label>Nama Pelapor</label>
                    <input type="text" class="form-control" id="pelapor_nama" name="pelapor_nama" value="{{$pelapor->pelapor_nama}}" readonly >
                </div>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" id="formlaporan" action="{{ url('/kelolalaporan/create') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <input type="text" class="form-control" id="pelapor_nik" name="pelapor_nik" value="{{$pelapor->pelapor_nik}}" hidden >
                <input type="text" class="form-control" id="user_nrp" name="user_nrp" value="{{ Auth::user()->user_nrp }}" hidden>
                <input type="text" class="form-control" id="user_kepala" name="user_kepala" value="{{ $user_kepala->user_nrp }}" hidden>


                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="laproan_no">Nomor Laporan</label>
                    <input type="text" class="form-control" id="laporan_no" name="laporan_no" placeholder="nomor laporan" value={{$surat}} required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="laporan_tglhilang">Tanggal Kejadian/Kehilangan :</label>
                        <input type="text" class="form-control datepicker-input" id="laporan_tglhilang" name="laporan_tglhilang" placeholder="yyyy-mm-dd" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="laproan_lokasi">Lokasi Kejadian</label>
                        <textarea type="text" class="form-control" id="laporan_lokasi" name="laporan_lokasi" placeholder="lokasi kejadian" required></textarea>
                        <p style="color: deepskyblue">* file harus bertipe image dan ukuran <= 1mb</p>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="laproan_keterangan">Keterangan Laproan</label>
                        <textarea type="text" class="form-control" id="laporan_keterangan" name="laporan_keterangan" placeholder="keterangan laporan" required></textarea>
                    </div>


                    <div class="form-group col-md-3">
                        <input type="file" class="custom-file-input" id="doc_pendukung_file" name="doc_pendukung_file[]" onchange="validasi()" multiple required>
                        <label class="custom-file-label" for="doc_pendukung_file">Choose file</label>
                    </div>

                </div>
                <p style="color: red" id="pesan"> </p>
                <br/>

                    <div id="image_preview"></div>



                <br>
                <h5> Keterangan Surat Berharga / Barang yang Hilang</h5>
                <h5>--------------------------------------------------</h5>


                <div id="back">
                    <div  class="form row">

                        <div class="form-group col-md-5">
                            <label for="jenis_id">Jenis Kehilangan</label>
                            <select class="form-control jenis" id="jenis_id" name="jenis_id[]" required>
                                <option value="">Pilih Jenis Kehilangan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="nama_pemilik">Atas Nama :</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik[]" placeholder="nama" required>
                        </div>

                        <div class="form-group col-md-10">
                            <label for="detail_laporan_ket">Penjelasan Barang / Surat Berharga :</label>
                            <textarea type="text" class="form-control" id="detail_laporan_ket" name="detail_laporan_ket[]" placeholder="..." required></textarea>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <a id="btnadd" type="button" class="btn btn-default"><i class="anticon anticon-plus"></i> Add</a>
                    <a type="button" class="btn btn-default" data-dismiss="modal" href="{{ url('kelolapelapor/') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

            <div style="display: none">
                <div id="clone" class="form row">

                    <div class="form-group col-md-5">
                        <label for="jenis_id">Jenis Kehilangan</label>
                        <select class="form-control jenis" id="jenis_id" name="jenis_id[]" required>
                            <option value="">Pilih Jenis Kehilangan</option>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="nama_pemilik">Atas Nama :</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik[]" placeholder="nama" required>
                    </div>
                    <div class="form-group col-md-2">
                        <br>
                        <a id="btndelete" type="button" onclick="$(this).parents('#clone').remove();" class="btn btn-default" ><i class="anticon anticon-minus-circle"></i> Hapus</a>
                    </div>

                    <div class="form-group col-md-10">
                        <label for="detail_laporan_ket">Penjelasan Barang / Surat Berharga :</label>
                        <textarea type="text" class="form-control" id="detail_laporan_ket" name="detail_laporan_ket[]" placeholder="..." required></textarea>
                    </div>


                </div>

            </div>

        </div>

    </div>


@endsection

@section('js')

<script type="text/javascript">


    function validasi() {

        var fi = document.getElementById('doc_pendukung_file');
        var image = ["jpeg","jpg","png","bmp"]

        if (fi.files.length > 0) {
            $('#image_preview').html("");

            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fsize = fi.files.item(i).size;
                var nama  = fi.value;
                var fileExtension = nama.replace(/^.*\./, '');

                if (fsize > 1048576 ) {
                    document.getElementById('pesan').style.display = "block"
                    document.getElementById('pesan').innerHTML = '<b> ukuran file > 1 mb!'
                    $('#doc_pendukung_file').val("")
                }
                else {
                  var ekstensi = image.includes(fileExtension)

                    if(ekstensi === true){
                        document.getElementById('pesan').style.display = "none";
                        $('#image_preview').append("<img width='150px'  src='" + URL.createObjectURL(event.target.files[i]) + "'>");
                    }
                     else{
                        document.getElementById('pesan').style.display = "block"
                        document.getElementById('pesan').innerHTML = '<b> Tipe data tidak sesuai syarat!'
                        $('#doc_pendukung_file').val("")
                    }

                }
            }
        }
    }

        $.ajax({
            url: '{{ url('kelolalaporan/listjenis') }}',
            dataType: "json",
            success: function (data) {
                var jenis = jQuery.parseJSON(JSON.stringify(data));
                $.each(jenis, function (k, v) {
                    $('.jenis').append($('<option>', {value: v.jenis_id}).text(v.jenis_nama))
                })
            }
        });

        $('#btnadd').click(function () {
            $('#clone').clone().appendTo('#back');
        });


        // $("#formlaporan").validate({
        //     errorElement: 'label',
        //     errorClass: 'is-invalid',
        //     validClass: 'is-valid',
        //     rules: {
        //         doc_pendukung_file: {
        //             required: true,
        //             extension: "png|jpeg|jpg",
        //             filesize: 1048576,
        //         }
        //
        //     },
        //     messages: {
        //         doc_pendukung_file: "File must be JPEG or PNG, less than 1MB"
        //     },
        // });




</script>

@endsection
