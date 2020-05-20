@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')

<div class="card">

    <div class="card-header">
        <div class="card-title">
            <div class="form-row">
                <form id="formcari">
                    {{ csrf_field() }}
                <div class="form-group col-md-9">
                    <label> Masukkan Tanggal (Waktu Melaporkan):</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control datepicker-input" id="mulai"  name="mulai" placeholder="Awal">
                            <span class="p-h-10">dan</span>
                            <input type="text" class="form-control datepicker-input" id="akhir" name="akhir" placeholder="Akhir">
                            <span class="p-h-10"></span>
                            <button id="btncari" type="submit" class="btn btn-primary">Download Laporan</button>
                        </div>
                        {{-- <br>
                        <button id="btnpdf" type="submit" class="btn btn-primary">pdf</button> --}}
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="tdownload" class="table">
            <thead>
                <tr>
                    <th>LAPORAN POLISI</th>
                    <th>WAKTU HILANG</th>
                    <th>WAKTU MELAPORKAN</th>
                    <th>TEMPAT KEJADIAN</th>
                    <th>IDENTITAS PELAPOR</th>
                    <th>BENDA / SURAT BERHARGA YANG DILAPORKAN</th>
                </tr>
            </thead>
        </table>
    </div>

</div>
@endsection
@section('js')
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.buttons.min.js"></script>
<script src="assets/vendors/datatables/jszip.min.js"></script>
<script src="assets/vendors/datatables/buttons.html5.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/vendors/datatables/buttons.print.min.js"></script>
<script src="assets/vendors/datatables/pdfmake.min.js"></script>
<script src="assets/vendors/datatables/vfs_fonts.js"></script>



    <script type="text/javascript">


            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                responsive: true,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

            loadData();

                function loadData(mulai = '', akhir = '') {

                    $('#tdownload').dataTable({

                        "searching": false,
                        dom: 'Bfrtip',
                        buttons: [

                        ],

                        ajax: {
                            url: "{{ url('/downloadlaporan/data') }}",
                            data:{mulai:mulai, akhir:akhir}
                        },

                        columns: [
                            { "data": "laporan_no" },
                            { "data": "laporan_tglhilang"},
                            { "data": "laporan_tgllapor"},
                            { "data": "laporan_lokasi"},
                            { "data": function (data) {
                                return '<b> A.N :</b> '+data.pelapor.pelapor_nama+' <br/>'+
                                       '<b> Alamat :</b>'+data.pelapor.pelapor_alamat+' <br/>'+
                                       '<b> Pekerjaan :</b>'+data.pelapor.pelapor_pekerjaan+' <br/>'+
                                       '<b> Usia :</b>'+data.pelapor.pelapor_tgl_lahir+'';
                            }},
                            { "data": "jenis"}
                        ],

                        columnDefs: [
                            {
                                width: "150px", targets: [0]

                            } ,
                            {
                                width: "100px", targets: [1]

                            } ,
                            {
                                width: "100px", targets: [2]
                            },
                            {
                                width: "200px", targets: [3]
                            },
                            {
                                width: "250px", targets: [4]
                            },
                            {
                                width: "300px", targets: [5],
                                render: function (data, type, full, meta) {
                                    var hasil = '';
                                    data.forEach((item, id)=>{
                                        hasil += '- '+item.jenis_nama+'<br> ';
                                    });
                                    return hasil;
                                }
                            },
                        ],

                        scrollX: true,
                        scrollY: "375",
                        scrollCollapse: true,
                        paging: false,
                        info: false,
                    });
                }



            $('#btncari').click(function(){
                var mulai = $('#mulai').val();
                var akhir = $('#akhir').val();
                if(mulai != '' &&  akhir != '')
                {
                    $('#tdownload').DataTable().destroy();
                    loadData(mulai, akhir);
                    $('#formcari').attr('action', '{{ url('downloadlaporan/pdf') }}');
                }
                else
                {
                    alert('Isi kedua fild');
                }
            });






    </script>



@endsection
