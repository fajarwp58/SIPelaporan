@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')

@if(Auth::user()->role_id == 3)
<div class="card">

    <div class="card-body">
         <table id="tlaporan" class="table">
             <thead>
             <tr>
                 <th>No Laporan</th>
                 <th>Nama Pelapor</th>
                 <th>Lokasi Hilang</th>
                 <th>Tanggal Lapor</th>
                 <th>Detail</th>
             </tr>
             </thead>
         </table>
 </div>

</div>
{{--    MODAL DAN FORM DETAIL Laporan--}}
<div class="modal fade" id="mdlaporan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="card">
                        <div class="card-body">
                            <table width="400">
                                <tr>
                                    <td>
                                        <a class="text-gray">NO Laporan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dlaporan_no"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama Pelapor</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dpelapor_nama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Lokasi Hilang</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dlaporan_lokasi"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Keterangan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dlaporan_keterangan"></a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <a class="text-gray">File Dokumen Pendukung</a>
                                    </td>
                                    <td>:</td>
                                </tr>
                                {{-- <tr>
                                    <td>
                                        <img width="150px" id="ddoc_pendukung_file" src="#">
                                    </td>
                                </tr> --}}
                            </table>
                            <div id="image_preview"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@else
 <div class="card">
        <div class="card-body">
             <table id="tlaporan" class="table">
                 <thead>
                 <tr>
                     <th>No Laporan</th>
                     <th>Nama Pelapor</th>
                     <th>Lokasi Hilang</th>
                     <th>Tanggal Lapor</th>
                     <th>Aksi</th>
                 </tr>
                 </thead>
             </table>
     </div>

 </div>

 {{--    MODAL DAN FORM DATA laporan--}}
    <div class="modal fade" id="mlaporan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formlaporan">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="laporan_no">NO Laporan</label>
                            <input type="text" class="form-control" id="laporan_no" name="laporan_no" placeholder="NO Lapor" disabled >
                        </div>

                        <div class="form-group">
                            <label for="laporan_lokasi">Lokasi hilang</label>
                            <input type="text" class="form-control" id="laporan_lokasi" name="laporan_lokasi" placeholder="Lokasi">
                        </div>

                        <div class="form-group">
                            <label for="laporan_keterangan">Keterangan</label>
                            <input type="textarea" class="form-control" id="laporan_keterangan" name="laporan_keterangan" placeholder="Keterangan">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

  {{--    MODAL DAN FORM DETAIL Laporan--}}
    <div class="modal fade" id="mdlaporan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="card">
                            <div class="card-body">
                                <table width="400">
                                    <tr>
                                        <td>
                                            <a class="text-gray">NO Laporan</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dlaporan_no"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Nama Pelapor</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dpelapor_nama"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Lokasi Hilang</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dlaporan_lokasi"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Keterangan</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dlaporan_keterangan"></a>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            <a class="text-gray">File Dokumen Pendukung</a>
                                        </td>
                                        <td>:</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>
                                            <img width="150px" id="ddoc_pendukung_file" src="#">
                                        </td>
                                    </tr> --}}
                                </table>
                                <div id="image_preview"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection

@section('js')
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
@if(Auth::user()->role_id == 3)
    <script type="text/javascript">

        $(document).ready(function() {
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

            function loadData() {
                $('#tlaporan').dataTable({
                    "ajax": "{{ url('/kelolalaporan/data') }}",
                    "columns": [
                        { "data": "laporan_no" },
                        { "data": "pelapor.pelapor_nama"},
                        { "data": "laporan_lokasi"},
                        { "data": "laporan_tgllapor"},
                        {
                            data: 'detail_laporan_id',
                            sClass: 'text-center',
                            render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="detail" class="text-info" title="detail"><i class="anticon anticon-eye"></i></i> </a> &nbsp;';
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            width: "200px",
                            targets: [0]
                        },
                        {
                            width: "250px",
                            targets: [1]
                        },
                        {
                            width: "250px",
                            targets: [2]
                        },
                        {
                            width: "250px",
                            targets: [3]
                        },
                        {
                            width: "50px",
                            targets: [4]
                        },
                    ],
                    scrollX: true,
                    scrollY: '350px',
                    scrollCollapse: true,
                });
            } loadData();

            $(document).on('click', '#detail', function() {
                var data = $('#tlaporan').DataTable().row($(this).parents('tr')).data();
                $('#mdlaporan').modal('show');
                $('#dlaporan_no').text(data.laporan_no);
                $('#dpelapor_nama').text(data.pelapor.pelapor_nama);
                $('#dlaporan_lokasi').text(data.laporan_lokasi);
                $('#dlaporan_keterangan').text(data.laporan_keterangan);
                var images = data.doc_pendukung.doc_pendukung_file.split("|");
                for (var i = 0, j = images.length; i < j; i++){
                    // $('#ddoc_pendukung_file').attr('src','DocumentLaporan/'+images[i]);
                    $('#image_preview').append("<img width='150px'  src='DocumentLaporan/"+images[i]+"'>");
                }
                $('#mdlaporan').on('hidden.bs.modal', function () {
	                document.location.reload();
	            })
            });
        });
        </script>
@else
    <script type="text/javascript">

        $(document).ready(function() {
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

            function loadData() {
                $('#tlaporan').dataTable({
                    "ajax": "{{ url('/kelolalaporan/data') }}",
                    "columns": [
                        { "data": "laporan_no" },
                        { "data": "pelapor.pelapor_nama"},
                        { "data": "laporan_lokasi"},
                        { "data": "laporan_tgllapor"},
                        {
                            data: 'detail_laporan_id',
                            sClass: 'text-center',
                            render: function(data) {
                                return'<a href="#" data-id="'+data+'" id="detail" class="text-info" title="detail"><i class="anticon anticon-eye"></i></i> </a> &nbsp;'+
                                    '<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
                                    '<a href="#" data-id="'+data+'" id="print" class="text-danger" title="print"><i class="anticon anticon-printer"></i> </a>';
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            width: "200px",
                            targets: [0]
                        },
                        {
                            width: "250px",
                            targets: [1]
                        },
                        {
                            width: "250px",
                            targets: [2]
                        },
                        {
                            width: "250px",
                            targets: [3]
                        },
                        {
                            width: "100px",
                            targets: [4]
                        },
                    ],
                    scrollX: true,
                    scrollY: '350px',
                    scrollCollapse: true,
                });
            } loadData();

            $('#formlaporan').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'laporan_no': $('#laporan_no').val(),
                        'laporan_lokasi': $('#laporan_lokasi').val(),
                        'laporan_keterangan': $('#laporan_keterangan').val(),
                    },
                    success :function () {

                        $('#tlaporan').DataTable().destroy();
                        loadData();
                        $('#mlaporan').modal('hide');
                    },

                });
            });


            $(document).on('click', '#edit', function() {
                var data = $('#tlaporan').DataTable().row($(this).parents('tr')).data();
                $('#mlaporan').modal('show');
                $('#laporan_no').val(data.laporan_no).change();
                $('#laporan_lokasi').val(data.laporan_lokasi).change();
                $('#laporan_keterangan').val(data.laporan_keterangan).change();
                $('#formlaporan').attr('action', '{{ url('kelolalaporan/update') }}/'+data.id);
            });

            $(document).on('click', '#detail', function() {
                var data = $('#tlaporan').DataTable().row($(this).parents('tr')).data();
                $('#mdlaporan').modal('show');
                $('#dlaporan_no').text(data.laporan_no);
                $('#dpelapor_nama').text(data.pelapor.pelapor_nama);
                $('#dlaporan_lokasi').text(data.laporan_lokasi);
                $('#dlaporan_keterangan').text(data.laporan_keterangan);
                var images = data.doc_pendukung.doc_pendukung_file.split("|");
                for (var i = 0, j = images.length; i < j; i++){
                    // $('#ddoc_pendukung_file').attr('src','DocumentLaporan/'+images[i]);
                    $('#image_preview').append("<img width='150px'  src='DocumentLaporan/"+images[i]+"'>");
                }

                $('#mdlaporan').on('hidden.bs.modal', function () {
	                document.location.reload();
	            })
                // window.location.reload();

            });

            $(document).on('click', '#print', function() {
                var data = $('#tlaporan').DataTable().row($(this).parents('tr')).data();
                window.location.href = '{{ url('kelolalaporan/print') }}/'+data.id ;
            });

    });


    </script>
@endif
@endsection
