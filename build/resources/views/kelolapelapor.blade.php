@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')

@if(Auth::user()->role_id == 3)
<div class="card">

    {{--        TABEL USER--}}
    <div class="card-body">
        <table id="tpelapor" class="table">
            <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>No Telp</th>
                <th>Detail</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
{{--        MODAL DAN FORM DETAIL USER--}}
<div class="modal fade" id="mdpelapor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pelapor</h5>
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
                                        <a class="text-gray">NIK</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnik"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Nama</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dnama"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Alamat</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dalamat"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Pekerjaan</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dpekerjaan"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="text-gray">Suku</a>
                                    </td>
                                    <td>:</td>
                                    <td>
                                        <a class="text-gray" id="dsuku"></a>
                                    </td>
                                </tr>
                            </table>
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
        <div class="card-header">
            <h4 class="card-title">
                <button class="btn btn-primary m-r-5" id="addpelapor">
                    <i class="anticon anticon-plus"></i>
                    Add Pelapor
                </button>
            </h4>
        </div>

        {{--        TABEL USER--}}
        <div class="card-body">
            <table id="tpelapor" class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--    MODAL DAN FORM DATA USER--}}
    <div class="modal fade" id="mpelapor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pelapor</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formpelapor">
                        {{ csrf_field() }}
                        <div class="form-group" id="div_nik">
                            <label for="pelapor_nik">NIK</label>
                            <input type="number" class="form-control" id="pelapor_nik" name="pelapor_nik" placeholder="NIK" maxlength="16">
                        </div>

                        <div class="form-group">
                            <label for="pelapor_nama">Nama</label>
                            <input type="text" class="form-control" id="pelapor_nama" name="pelapor_nama" placeholder="Nama">
                        </div>

                        <div class="form-group">
                            <label for="pelapor_tgl_lahir">Tanggal Lahir</label>
                            <i class="prefix-icon anticon anticon-calendar"></i>
                            <input type="text" class="form-control datepicker-input" id="pelapor_tgl_lahir" name="pelapor_tgl_lahir" placeholder="Pick a date">
                        </div>


                            <div class="form-group ">
                                <label for="pelapor_jekel">Jenis Kelamin</label>
                                <select class="form-control" id="pelapor_jekel" name="pelapor_jekel">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pelapor_alamat">Alamat</label>
                                <input type="text" class="form-control" id="pelapor_alamat" name="pelapor_alamat" placeholder="Alamat">
                            </div>


                        <div class="form-group ">
                                <label for="pelapor_pekerjaan">Pekerjaan</label>
                                <select class="form-control" id="pelapor_pekerjaan" name="pelapor_pekerjaan">
                                    <option value="">Pilih Jenis Pekerjaan</option>
                                    <option>PNS</option>
                                    <option>Wiraswasta</option>
                                    <option>Petani</option>
                                    <option>Nelayan</option>
                                    <option>Buruh</option>
                                    <option>Dan lain-lain</option>
                                </select>
                        </div>

                        <div class="form-group">
                                <label for="pelapor_notelp">No Telp</label>
                                <input type="text" class="form-control" id="pelapor_notelp" name="pelapor_notelp" placeholder="No Telp">
                        </div>

                        <div class="form-group ">
                                <label for="pelapor_suku">Suku</label>
                                <input type="text" class="form-control" id="pelapor_suku" name="pelapor_suku" placeholder="suku">
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


{{--        MODAL DAN FORM DETAIL USER--}}
    <div class="modal fade" id="mdpelapor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pelapor</h5>
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
                                            <a class="text-gray">NIK</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dnik"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Nama</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dnama"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Alamat</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dalamat"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Pekerjaan</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dpekerjaan"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="text-gray">Suku</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="dsuku"></a>
                                        </td>
                                    </tr>
                                </table>
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
                responsive: true,
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });

                function loadData() {
                    $('#tpelapor').dataTable({
                        "ajax": "{{ url('/kelolapelapor/data') }}",
                        "columns": [
                            { "data": "pelapor_nik" },
                            { "data": "pelapor_nama" },
                            { "data": "pelapor_jekel"},
                            { "data": "pelapor_pekerjaan"},
                            { "data": "pelapor_notelp"},
                            {
                                data: 'pelapor_nik',
                                sClass: 'text-center',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="detail" class="text-info" title="detail"><i class="anticon anticon-eye"></i></i> </a> &nbsp;';
                                }
                            }
                        ],
                        columnDefs: [
                            {
                                width: "150px",
                                targets: [0]
                            },
                            {
                                width: "150px",
                                targets: [1]
                            },
                            {
                                width: "150px",
                                targets: [2]
                            },
                            {
                                width: "100px",
                                targets: [3]
                            },
                            {
                                width: "100px",
                                targets: [4]
                            },
                            {
                                width: "50px",
                                targets: [5]
                            },
                        ],
                        scrollX: true,
                        scrollY: '350px',
                        scrollCollapse: true,
                    });
                } loadData();

                $(document).on('click', '#detail', function() {
                    var data = $('#tpelapor').DataTable().row($(this).parents('tr')).data();
                    $('#mdpelapor').modal('show');
                    $('#dnik').text(data.pelapor_nik);
                    $('#dnama').text(data.pelapor_nama);
                    $('#dalamat').text(data.pelapor_alamat);
                    $('#dpekerjaan').text(data.pelapor_pekerjaan);
                    $('#dsuku').text(data.pelapor_suku);
                });
            });
        </script>
    @else
    <script type="text/javascript">
        $(document).ready(function() {
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

                function loadData() {
                    $('#tpelapor').dataTable({
                        "ajax": "{{ url('/kelolapelapor/data') }}",
                        "columns": [
                            {
                                data: 'pelapor_nik',
                                sClass: 'text-right',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="addlaporan" class="text-danger" title="tambah laporan"><i class="anticon anticon-plus-circle"></i> </a>';
                                }
                            },
                            { "data": "pelapor_nik" },
                            { "data": "pelapor_nama" },
                            { "data": "pelapor_jekel"},
                            { "data": "pelapor_pekerjaan"},
                            { "data": "pelapor_notelp"},
                            {
                                data: 'pelapor_nik',
                                sClass: 'text-right',
                                render: function(data) {
                                    return'<a href="#" data-id="'+data+'" id="detail" class="text-info" title="detail"><i class="anticon anticon-eye"></i></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="edit" class="text-warning" title="edit"><i class="anticon anticon-edit"></i> </a> &nbsp;'+
                                        '<a href="#" data-id="'+data+'" id="delete" class="text-danger" title="hapus"><i class="anticon anticon-delete"></i> </a>';
                                }
                            }
                        ],
                        columnDefs: [
                            {
                                width: "10px",
                                targets: [0]
                            },
                            {
                                width: "150px",
                                targets: [1]
                            },
                            {
                                width: "150px",
                                targets: [2]
                            },
                            {
                                width: "100px",
                                targets: [3]
                            },
                            {
                                width: "100px",
                                targets: [4]
                            },
                            {
                                width: "100px",
                                targets: [5]
                            },
                            {
                                width: "100px",
                                targets: [6]
                            },
                        ],
                        scrollX: true,
                        scrollY: '350px',
                        scrollCollapse: true,
                    });
                } loadData();

                $(document).on('click', '#addpelapor', function() {
                    $('#mpelapor').modal('show');
                    document.getElementById('div_nik').style.display = 'block';
                    $('#formpelapor').attr('action', '{{ url('kelolapelapor/create') }}');
                });

                $('#formpelapor').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                        type: 'post',
                        data: {
                            'pelapor_nik': $('#pelapor_nik').val(),
                            'pelapor_nama': $('#pelapor_nama').val(),
                            'pelapor_tgl_lahir': $('#pelapor_tgl_lahir').val(),
                            'pelapor_jekel': $('#pelapor_jekel').val(),
                            'pelapor_alamat': $('#pelapor_alamat').val(),
                            'pelapor_pekerjaan': $('#pelapor_pekerjaan').val(),
                            'pelapor_notelp': $('#pelapor_notelp').val(),
                            'pelapor_suku': $('#pelapor_suku').val(),
                        },
                        success :function (response) {

                            notify(response);
                            $('#tpelapor').DataTable().destroy();
                            loadData();
                            $('#mpelapor').modal('hide');
                        }
                    });
                });

                $(document).on('click', '#edit', function() {
                    var data = $('#tpelapor').DataTable().row($(this).parents('tr')).data();
                    $('#mpelapor').modal('show');
                    document.getElementById('div_nik').style.display = 'none';
                    $('#pelapor_nama').val(data.pelapor_nama).change();
                    $('#pelapor_tgl_lahir').val(data.pelapor_tgl_lahir).change();
                    $('#pelapor_jekel').val(data.pelapor_jekel).change();
                    $('#pelapor_alamat').val(data.pelapor_alamat).change();
                    $('#pelapor_pekerjaan').val(data.pelapor_pekerjaan).change();
                    $('#pelapor_notelp').val(data.pelapor_notelp).change();
                    $('#pelapor_suku').val(data.pelapor_suku).change();
                    $('#formpelapor').attr('action', '{{ url('kelolapelapor/update') }}/'+data.pelapor_nik);
                });

                $(document).on('click', '#addlaporan', function() {
                    var data = $('#tpelapor').DataTable().row($(this).parents('tr')).data();
                    window.location.href = '{{ url('kelolalaporan/addlaporan') }}/'+data.pelapor_nik ;
                });


                $(document).on('click', '#detail', function() {
                    var data = $('#tpelapor').DataTable().row($(this).parents('tr')).data();
                    $('#mdpelapor').modal('show');
                    $('#dnik').text(data.pelapor_nik);
                    $('#dnama').text(data.pelapor_nama);
                    $('#dalamat').text(data.pelapor_alamat);
                    $('#dpekerjaan').text(data.pelapor_pekerjaan);
                    $('#dsuku').text(data.pelapor_suku);
                });

                $(document).on('click', '#delete', function() {
                    var id = $(this).data('id');
                    if (confirm("Yakin ingin menghapus data?")){
                        $.ajax({
                            url : "{{ url('kelolapelapor/delete') }}/"+id,

                            success :function () {

                                $('#tpelapor').DataTable().destroy();
                                loadData();


                            }
                        })
                    }
                });


                $('#mpelapor').on('hidden.bs.modal', function () {
                    $(this).find('form').trigger('reset');

                    let hapusValidasi = document.getElementById('formpelapor');
                    hapusValidasi.querySelectorAll('.form-control').forEach(hapusValidasi => {
                        hapusValidasi.classList.remove('label');
                        hapusValidasi.classList.remove('is-valid');
                        hapusValidasi.classList.remove('is-invalid');
                        hapusValidasi.classList.remove('required');
                    });
                });


                function notify(response){
                $.each(response, function(key, val) {
                    new swal({
                        title: 'Oops!',
                        text: val,
                        type: 'info'
                    });
                });

            }


               $("#formpelapor").validate({
                   errorElement: 'label',
                   errorClass: 'is-invalid',
                   validClass: 'is-valid',
                   rules: {
                       pelapor_nik: {
                           required: true
                       },
                       pelapor_nama: {
                           required: true
                       },
                       pelapor_tgl_lahir: {
                           required: true
                       },
                       pelapor_jekel: {
                           required: true
                       },
                       pelapor_alamat: {
                           required: true
                       },
                       pelapor_pekerjaan: {
                           required: true
                       },
                       pelapor_notelp: {
                           required: true
                       },
                       pelapor_suku: {
                           required: true
                       }

                   },
                   messages: {
                       pelapor_nik: {
                           required: false
                       },
                       pelapor_nama: {
                           required: false
                       },
                       pelapor_tgl_lahir: {
                           required: false
                       },
                       pelapor_jekel: {
                           required: false
                       },
                       pelapor_alamat: {
                           required: false
                       },
                       pelapor_pekerjaan: {
                           required: false
                       },
                       pelapor_notelp: {
                           required: false
                       },
                       pelapor_suku: {
                           required: false
                       }

                   }

               });

        });

    </script>
    @endif
@endsection
