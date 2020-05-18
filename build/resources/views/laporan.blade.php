<!DOCTYPE html>
<html>

<style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>

<head>
    <title>Cetak Surat Kehilangan</title>
</head>

<a id="printPageButton" href="{{ url('kelolalaporan/') }}">Back</a>
<button id="printPageButton" onClick="window.print();">Print</button>

<body>
    <table  class="table" width="1050px" align="center">
        <tr>
           <td>

               <table>
                    <tr>
                        <td align="center" style=" text-align: center">

                            <font size="5">
                                KEPOLISIAN DAERAH SUMATERA BARAT <br>
                                RESOR KOTA PADANG <br>
                                SEKTOR PAUH <br>
                                Jalan DR. M. Hatta 1 Padang 21562 <br>
                                _______________________________________
                            </font>
                        </td>
                        <td width="412px">

                        </td>
                        <td>
                           <p style="text-decoration: underline;">
                              <font size="5">
                                   <br><br><br>
                                   MODEL : C-1
                               </font>
                           </p>
                        </td>
                    </tr>
               </table>

           </td>
        </tr>

        <tr style="text-align: center;">
            <td>
               <img src={{ asset("assets\images\polri.png") }}> <br> <br>
               <font size="5">
                   <b style="line-height: 0.6cm;">
                       SURAT TANDA BUKTI PENERIMAAN PELAPORAN <br>
                       KEHILANGAN BARANG / SURAT – SURAT BERHARGA <br>
                       ______________________________________________________
                   </b>
                </font>
            </td>
        </tr>

        <tr>
            <td >

                <font size="5" style="text-align: justify">
                    <p style="text-align: justify">
                            ----- Yang bertanda tangan di bawah ini menerangkan pada hari {{$daylapor}} tanggal {{$tgllapor}} jam {{$jamlapor}}
                            Wib telah datang seorang Laki-laki / Perempuan Warga Negara Indonesia melapor ke Polsek Pauh yang mengaku
                            bernama :-------------------------------------------------------------------------------------------------------
                    </p>
                    <table align="center">
                        <tr>
                            <td width="250px">
                                Nama
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <b> {{$detail->laporan->pelapor->pelapor_nama}} </b>
                            </td>
                        </tr>
                        <tr>
                            <td width="250px">
                                Umur
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{$umur}} Tahun
                            </td>
                        </tr>
                        <tr>
                            <td width="250px">
                                Suku
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{$detail->laporan->pelapor->pelapor_suku}}
                            </td>
                        </tr>
                        <tr>
                            <td width="250px">
                                Pekerjaan
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                {{$detail->laporan->pelapor->pelapor_pekerjaan}}
                            </td>
                        </tr>
                        <tr>
                            <td width="250px">
                                Alamat
                            </td>
                            <td>
                                :
                            </td>
                            <td width="500px">
                                {{$detail->laporan->pelapor->pelapor_alamat}}
                            </td>
                        </tr>

                    </table>
                </font>
            </td>

        </tr>

         <tr>
            <td>
                <br>
                <font size="5">
                  Telah melaporkan kehilangan surat penting berupa : <br><br>
                <table >

                    @foreach($detail2 as $data)
                    <tr>
                        <td width="20px">
                        <b> - </b>
                        </td>
                        <td width="500px">
                            <b> 1 (satu) buah {{ $data["detail_laporan_ket"] }}</b>
                        </td>
                        <td>
                            <b> A.n {{ $data["nama_pemilik"] }} </b>
                        </td>
                    </tr>
                        @endforeach
                </table>
                </font>
            </td>
        </tr>

        <tr>
            <td>
                <br><br>
                <font size="5">
                    ----- Yang diketahui hilang / tercecer / dicuri orang pada : <br><br>

                    <table >
                        <tr>
                            <td width="20px"></td>
                            <td width="200px">
                                Hari / Tanggal
                            </td>
                            <td>
                                : {{ $dayhilang }}/{{$tglhilang}}
                            </td>
                        </tr>
                        <tr>
                            <td width="20px"></td>
                            <td width="200px">
                                Di Sekitar
                            </td>
                            <td>
                               : {{$detail->laporan->laporan_lokasi}}
                            </td>
                        </tr>
                    </table>
                </font>
            </td>
        </tr>

        <tr>
            <td>
                <font size="5">

                    <p style="text-align: justify">
                        Atas peristiwa tersebut kemudian Pelapor sudah berusaha untuk mencari namun belum ditemukan, kemudian
                        melporkannya ke Polsek Pauh Padang sesuai dengan Laporan Polisi Nomor : {{$detail->laporan->laporan_no}}/ Sektor
                        Pauh, tanggal : {{ $tglhilang }}. ------------------------------------------------------------------------------
                    </p>
                    <p style="text-align: justify">
                        ----- Demikianlah surat tanda penerimaan laporan / pengaduan yang kehilangan barang - barang surat – surat
                        berharga ini dibuat, bukan sebagai pangganti surat yang hilang, namun dipergunakan sebagai syarat dalam
                        pengurusan ke instansi yang bersangkutan.-----------------------------------------------------------------------------
                    </p>
                </font>
            </td>
        </tr>

        <tr>
            <td>
                <font size="4">
                    <table align="center" style="text-align: center;">
                        <tr>
                            <td>
                                <b>PELAPOR</b>

                                <br><br><br><br><br><br><br>

                                <b><u>
                                        {{$detail->laporan->pelapor->pelapor_nama}}
                                </u></b>
                            </td>
                            <td width="350px"></td>
                            <td>
                                Padang, {{ $tgllapor }} <br><br>
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

    </table>



</body>

<script>
    window.onload = function() { window.print(); }
</script>

</html>
