@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')

@if(Auth::user()->role_id == 3)
<div class="card">

    {{--        TABEL Jenis--}}
    <div class="card-body">
        <table id="tjenis" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Jenis</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
@else
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                <button class="btn btn-primary m-r-5" id="addjenis">
                    <i class="anticon anticon-plus"></i>
                    Add Jenis
                </button>
            </h4>
        </div>

        {{--        TABEL Jenis--}}
        <div class="card-body">
            <table id="tjenis" class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{--    MODAL DAN FORM DATA Jenis--}}
    <div class="modal fade" id="mjenis">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formjenis">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="jenis_nama">Jenis</label>
                            <input type="text" class="form-control" id="jenis_nama" name="jenis_nama" placeholder="Jenis">
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
    {{--    MODAL DAN FORM DETAIL JENIS--}}
    <div class="modal fade" id="mdjenis">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Jenis</h5>
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
                                            <a class="text-gray">Jenis kehilangan</a>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <a class="text-gray" id="djenis_nama"></a>
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
                language: {
                    search: '<span>Cari:</span> _INPUT_',
                    searchPlaceholder: 'Cari...',
                    lengthMenu: '<span>Tampil:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
            function loadData() {
                $('#tjenis').dataTable({
                    "ajax": "{{ url('/kelolajenis/data') }}",
                    "columns": [
                        { "data": "jenis_id" },
                        { "data": "jenis_nama" }
                    ],
                    columnDefs: [
                        {
                            width: "250px",
                            targets: [0]
                        },
                        {
                            width: "200px",
                            targets: [1]
                        },
                    ],
                    scrollX: true,
                    scrollY: '350px',
                    scrollCollapse: true,
                });
            } loadData();
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
                $('#tjenis').dataTable({
                    "ajax": "{{ url('/kelolajenis/data') }}",
                    "columns": [
                        { "data": "jenis_id" },
                        { "data": "jenis_nama" },
                        {
                            data: 'jenis_id',
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
                            width: "250px",
                            targets: [0]
                        },
                        {
                            width: "200px",
                            targets: [1]
                        },
                        {
                            width: "200px",
                            targets: [2]
                        },
                    ],
                    scrollX: true,
                    scrollY: '350px',
                    scrollCollapse: true,
                });
            } loadData();


            $(document).on('click', '#addjenis', function() {
                $('#mjenis').modal('show');
                $('#formjenis').attr('action', '{{ url('kelolajenis/create') }}');
            });

            $('#formjenis').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action')+'?_token='+'{{ csrf_token() }}',
                    type: 'post',
                    data: {
                        'jenis_nama': $('#jenis_nama').val(),
                    },
                    success :function () {

                        $('#tjenis').DataTable().destroy();
                        loadData();
                        $('#mjenis').modal('hide');
                    },

                });
            });

            $(document).on('click', '#edit', function() {
                var data = $('#tjenis').DataTable().row($(this).parents('tr')).data();
                $('#mjenis').modal('show');
                $('#jenis_nama').val(data.jenis_nama).change();
                $('#formjenis').attr('action', '{{ url('kelolajenis/update') }}/'+data.jenis_id);
            });

            $(document).on('click', '#detail', function() {
                var data = $('#tjenis').DataTable().row($(this).parents('tr')).data();
                $('#mdjenis').modal('show');
                $('#djenis_nama').text(data.jenis_nama);
            });

            $(document).on('click', '#delete', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus data?")){
                    $.ajax({
                        url : "{{ url('kelolajenis/delete') }}/"+id,

                        success :function () {

                            $('#tjenis').DataTable().destroy();
                            loadData();


                        }
                    })
                }
            });


            $('#mjenis').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                let hapusValidasi = document.getElementById('formjenis');
                hapusValidasi.querySelectorAll('.form-control').forEach(hapusValidasi => {
                    hapusValidasi.classList.remove('label');
                    hapusValidasi.classList.remove('is-valid');
                    hapusValidasi.classList.remove('is-invalid');
                    hapusValidasi.classList.remove('required');
                });
            });



            $( "#formjenis" ).validate({
                errorElement: 'label',
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                rules: {
                    jenis_nama: {
                        required: true
                    }

                },
                messages : {
                    jenis_nama: {
                        required : false
                    }
                }

            });

        });


    </script>
    @endif
@endsection
