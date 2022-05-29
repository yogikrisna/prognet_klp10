@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
      <div id="user-activity" class="card">
        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel">
              <div class="container">
               
              </div>
              <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                    Chart di atas akan menampilkan grafik transaksi product selama setahun dengan dua jenis transaksi yaitu kredit (pembelian) dan debit (penjualan).
                </p>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scriptjs')

 <!-- Chart -->
 <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    
    var debits = ['{{$january}}','{{$february}}','{{$march}}','{{$april}}','{{$may}}','{{$june}}','{{$july}}','{{$august}}','{{$september}}','{{$october}}','{{$november}}','{{$december}}'];
    var kredits = [0,0,0,0,0,0,0,0,0,0,0,0];
   Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Aktivitas Transaksi Product'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Nominal Transaksi'
        },
        labels: {
            formatter: function () {
                return this.value + 'K';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Debit',
        marker: {
            symbol: 'square'
        },
        data: debits,

    }, {
        name: 'Kredit',
        marker: {
            symbol: 'diamond'
        },
        data: kredits
    }]
});
           
  </script>
 

@endsection