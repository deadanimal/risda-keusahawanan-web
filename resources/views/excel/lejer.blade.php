<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <style type="text/css">
        h4 {
            font-family: "Calibri", sans-serif;
            /* font-size: 11.1px; */
            font-weight: bold;
            font-style: normal;
            text-decoration: none;
            text-align: center
        }

        table,
        td,
        th {
            border: 1px solid black;
            font-family: "Calibri", sans-serif;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 2px
        }

    </style>
</head>

<body>
    <div>
        <h4> RINGKASAN LEJAR BULAN {{ $bulan }} TAHUN {{ $tahun }}</h4>
    </div>


    <br>
    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">TUNAI A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>
            @php
                $jumlah_credit = 0;
                $jumlah_debit = 0;
            @endphp

            @foreach ($alirans as $aliran)

                <tr>
                    @if ($aliran->id_kategori_aliran <= 8)
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                        <td></td>
                        <td></td>
                        <td></td>

                        @php
                            $jumlah_debit += $aliran->jumlah_aliran;
                        @endphp

                    @else
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                        @php
                            $jumlah_credit += $aliran->jumlah_aliran;
                        @endphp

                    @endif

                </tr>

            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td>{{ $jumlah_debit }}</td>

                <td></td>
                <td></td>
                <td>{{ $jumlah_credit }}</td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- jualan_perolehan --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">JUALAN/PEROLEHAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 1)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $jualan_perolehan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $jualan_perolehan }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $jualan_perolehan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $jualan_perolehan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>

                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $jualan_perolehan }}</td>


            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- deposit_jualan --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">DEPOSIT JUALAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 2)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $deposit_jualan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $deposit_jualan }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $deposit_jualan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $deposit_jualan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>

                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $deposit_jualan }}</td>

            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- pulangan_jualan --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">PULANGAN BELIAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 3)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $pulangan_jualan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $pulangan_jualan }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $pulangan_jualan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $pulangan_jualan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $pulangan_jualan }}</td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">STOK AKHIR A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 4)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $stok_akhir }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $stok_akhir }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $stok_akhir }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $stok_akhir }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $stok_akhir }}</td>

            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- hasil_sewaan --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">HASIL SEWAAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 5)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_sewaan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_sewaan }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_sewaan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_sewaan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $hasil_sewaan }}</td>

            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- --------------------------------------------------- --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">HASIL DIVIDEN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)
                @if ($aliran->id_kategori_aliran == 6)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_dividen }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_dividen }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_dividen }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_dividen }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>

                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $hasil_dividen }}</td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- hasil_komisen --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">HASIL KOMISEN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 7)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_komisen }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_komisen }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_komisen }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_komisen }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $hasil_komisen }}</td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- hasil_lain --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">HASIL LAIN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 8)
                    <tr>

                        @if ($loop->index == 1)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_lain }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif


                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>

                    </tr>

                @else

                    @if ($loop->index == 1)
                        <tr>
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $hasil_lain }}</td>

                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_lain }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $hasil_lain }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $hasil_lain }}</td>

            </tr>

        </tbody>
    </table>


    {{-- Tunai Keluar --}}

    {{-- --------------------------------------------------- --}}
    {{-- BELIAN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BELIAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 9)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $belian }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $belian }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $belian }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $belian }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $belian }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- DEPOSIT BELIAN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">DEPOSIT BELIAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 10)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $deposit_belian }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $deposit_belian }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $deposit_belian }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $deposit_belian }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $deposit_belian }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- PULANGAN JUALAN --}}
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">PULANGAN JUALAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 11)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $pulangan_jualan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $pulangan_jualan }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $pulangan_jualan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $pulangan_jualan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $pulangan_jualan }}</td>

                <td></td>
                <td></td>
                <td></td>

            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- STOK AWAL --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">STOK AWAL A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 12)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $stok_awal }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $stok_awal }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $stok_awal }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $stok_awal }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>


                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $stok_awal }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>



    {{-- --------------------------------------------------- --}}
    {{-- KOS PENGEPOSAN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">KOS PENGEPOSAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 13)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kos_pengeposan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kos_pengeposan }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kos_pengeposan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kos_pengeposan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $kos_pengeposan }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- KOS PENGEPOSAN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">KOS ALAT TULIS A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 14)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kos_alat_tulis }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kos_alat_tulis }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kos_alat_tulis }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kos_alat_tulis }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $kos_alat_tulis }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- bayaran_sewa --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BAYARAN SEWA A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 15)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_sewa }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_sewa }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_sewa }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_sewa }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $bayaran_sewa }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- upah_gaji_pekerja --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">UPAH/GAJI PEKERJA A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 16)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $upah_gaji_pekerja }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $upah_gaji_pekerja }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $upah_gaji_pekerja }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $upah_gaji_pekerja }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $upah_gaji_pekerja }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- upah_gaji_sendiri --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">UPAH/GAJI SENDIRI A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 17)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $upah_gaji_sendiri }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $upah_gaji_sendiri }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $upah_gaji_sendiri }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $upah_gaji_sendiri }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $upah_gaji_sendiri }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- kwsp_socso --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">KWSP/SOCSO A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 18)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kwsp_socso }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $kwsp_socso }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kwsp_socso }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $kwsp_socso }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $kwsp_socso }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>



    {{-- --------------------------------------------------- --}}
    {{-- bayaran_bil --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BAYARAN BIL (UTILITI) A/C
                </th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 19)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_bil }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_bil }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_bil }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_bil }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $bayaran_bil }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- petrol_tol_parking --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">PETROL/TOL/PARKING A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 20)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $petrol_tol_parking }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $petrol_tol_parking }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $petrol_tol_parking }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $petrol_tol_parking }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $petrol_tol_parking }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>



    {{-- --------------------------------------------------- --}}
    {{-- penyelenggaraan --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">PENYELENGGARAAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 21)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $penyelenggaraan }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $penyelenggaraan }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $penyelenggaraan }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $penyelenggaraan }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>

                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $penyelenggaraan }}</td>

                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- belian_aset --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BELIAN ASET A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 22)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $belian_aset }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $belian_aset }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $belian_aset }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $belian_aset }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $belian_aset }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- BAYARAN KOMISEN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BAYARAN KOMISEN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 23)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_komisen }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_komisen }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_komisen }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_komisen }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $bayaran_komisen }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>


    {{-- --------------------------------------------------- --}}
    {{-- CUKAI/ZAKAT --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">CUKAI/ZAKAT A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 24)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $cukai_zakat }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $cukai_zakat }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $cukai_zakat }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $cukai_zakat }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $cukai_zakat }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>



    {{-- --------------------------------------------------- --}}
    {{-- bayaran_pinjaman --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">PEMBAYARAN PINJAMAN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 25)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_pinjaman }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_pinjaman }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_pinjaman }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_pinjaman }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $bayaran_pinjaman }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>



    {{-- --------------------------------------------------- --}}
    {{-- BAYARAN LAIN --}}
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>DR</th>
                <th colspan="4" style="width: 200px; text-align:center; font-weight: bold;">BAYARAN LAIN A/C</th>
                <th style="text-align::right">CR</th>

            </tr>

        </thead>
        <tbody>

            <tr>
                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM)</td>

                <td>Date</td>
                <td>Butiran</td>
                <td>JUMLAH (RM) </td>
            </tr>

            <tr>
                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>

                <td>{{ $tahun }}</td>
                <td></td>
                <td></td>
            </tr>


            @foreach ($alirans as $aliran)


                @if ($aliran->id_kategori_aliran == 26)
                    <tr>
                        <td>{{ date('M d', strtotime($aliran->tarikh_aliran)) }}</td>
                        <td>{{ $aliran->keterangan_aliran }}</td>
                        <td>{{ $aliran->jumlah_aliran }}</td>


                        @if ($loop->index == 0)
                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_lain }}</td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @else

                    @if ($loop->index == 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>{{ date('M t', strtotime($aliran->tarikh_aliran)) }}</td>
                            <td>BAKI H/B</td>
                            <td>{{ $bayaran_lain }}</td>

                        </tr>
                    @endif

                @endif

            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_lain }}</td>

                <td></td>
                <td></td>
                <td style="font-weight: bold">{{ $bayaran_lain }}</td>

            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>

                <td></td>
                <td></td>
                <td></td>

            </tr>


            <tr>
                <td>{{ date('M d', strtotime($nextmonth)) }}</td>
                <td>BAKI B/B</td>
                <td>{{ $bayaran_lain }}</td>

                <td></td>
                <td></td>
                <td></td>


            </tr>

        </tbody>
    </table>




</body>
