<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>


<a id="printPageButton" href="{{ url('downloadlaporan/') }}">Back</a>
<button id="printPageButton" onClick="window.print();">Print</button>
</head>
<body>

    <tr>
        <td>
        <center>
            <table>
                 <tr>
                     <td align="center" style=" text-align: center">

                         <font size="3">
                             KEPOLISIAN DAERAH SUMATERA BARAT <br>
                             RESOR KOTA PADANG <br>
                             SEKTOR PAUH <br>
                             Jalan DR. M. Hatta 1 Padang 21562 <br><br>
                         </font>
                     </td>
                 </tr>
            </table>
        </center>
        </td>
     </tr>


     <table class="table">
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

        <tbody>
            @foreach($detail as $dd)
            <tr>
                <td>{{ $dd->laporan_no }}</td>

                <td>{{ $dd->laporan_tglhilang }}</td>

                <td>{{ $dd->laporan_tgllapor }}</td>

                <td>{{ $dd->laporan_lokasi }}</td>

                <td>
                    <b> A.N :</b>{{ $dd->pelapor->pelapor_nama }} <br/>
                    <b> Alamat :</b>{{ $dd->pelapor->pelapor_alamat }} <br/>
                    <b> Pekerjaan :</b>{{ $dd->pelapor->pelapor_pekerjaan }} <br/>
                    <b> Tgl Lahir :</b>{{ $dd->pelapor->pelapor_tgl_lahir }}
                </td>

                <td>
                    @foreach ($dd->jenis as $jj )
                    {{ $jj->jenis_nama}} ,
                    @endforeach
                </td>
            </tr>
            @endforeach
           </tbody>
    </table>

    <br>
    <tr>
        <td>
            <font size="3">
                <table align="center" style="text-align: center;">
                    <tr>
                        <td width="550px"></td>
                        <td>
                            Padang, {{ $now }} <br><br>
                            <b>a.n. KEPALA RESOR SEKTOR PAUH</b> <br>
                            <b>BA SPK “B”</b><br>

                            <img src="{{ asset('signature/signature.jpg') }}"  width="160" height="100"> <br>

                            <b>{{ $detail3->user_nama }}</b> <br>
                            <b>____________________</b><br>
                            <b>{{ $detail3->pangkat_name }} NRP {{ $detail3->user_nrp }}</b>
                        </td>
                    </tr>
                </table>
            </font>
        </td>
    </tr>

</body>
</html>

<script>
    window.onload = function() { window.print(); }
</script>
