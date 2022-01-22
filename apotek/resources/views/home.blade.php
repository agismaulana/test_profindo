@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between mb-2">
        <div class="col-md-6">
            <div class="card">
                <div id="chartObat">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div id="chartKeluar">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Obat</th>
                                <th>Sisa Obat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataObat as $obat)
                                <tr>
                                    <td>{{ $obat->namaObat }}</td>
                                    <td>{{ $obat->sisaObat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Jumlah Jual</th>
                                <th>Tanggal Beli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataTransaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kodeObat }}</td>
                                    <td>{{ $transaksi->obat->namaObat }}</td>
                                    <td>{{ $transaksi->jumlahJual }}</td>
                                    <td>{{ AppHelper::date_format($transaksi->tanggalBeli) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script>
        let dataKeluar = JSON.parse('{{ $chartKeluar }}')
        let dataObat = JSON.parse('{!! $chartObat !!}')

        Highcharts.chart('chartObat', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Data Obat'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Sisa Obat'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Sisa Obat: <b>{point.y:.1f}</b>'
            },
            series: [{
                name: 'Population',
                data: dataObat,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });

        Highcharts.stockChart('chartKeluar', {
            chart: {
                alignTicks: false
            },

            rangeSelector: {
                selected: 5
            },

            title: {
                text: 'Transaksi Data Obat Keluar'
            },

            series: [{
                type: 'column',
                name: 'Jumlah Jual',
                data: dataKeluar,
                // dataGrouping: {
                //     units: [[
                //         'week', // unit name
                //         [1] // allowed multiples
                //     ], [
                //         'month',
                //         [1, 2, 3, 4, 6]
                //     ]]
                // }
            }]
        });
    </script>
@endpush
@endsection
