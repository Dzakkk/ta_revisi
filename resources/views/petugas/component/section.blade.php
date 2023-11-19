@extends('petugas.dashboard')

@section('section')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <a href="/petugas/dashboard/biodata">
                            <div class="card-body">
                                <h5 class="card-title">Pegawai <span>| this year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $jumlah }}</h6>
                                        <span class="text-muted small pt-1">Pegawai mengisi biodata</span>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <a href="/petugas/dashboard/lakilaki">
                            <div class="card-body">
                                <h5 class="card-title">Pegawai <span>| Laki Laki</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $boy }}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-4">

                    <div class="card info-card customers-card">
                        <a href="/petugas/dashboard/perempuan">
                            <div class="card-body">
                                <h5 class="card-title">Pegawai <span>| Perempuan</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $girl }}</h6>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div><!-- End Customers Card -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Reports <span>/Today</span></h5>

                            <div class="row">


                                <!-- Diagram -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Jenis Kelamin Pegawai</h5>

                                            <!-- Pie Chart -->
                                            <div id="pieChart" style="min-height: 400px;" class="echart"></div>

                                            <script>
                                                document.addEventListener("DOMContentLoaded", () => {
                                                    echarts.init(document.querySelector("#pieChart")).setOption({
                                                        
                                                        tooltip: {
                                                            trigger: 'item'
                                                        },
                                                        legend: {
                                                            orient: 'vertical',
                                                            left: 'left'
                                                        },
                                                        series: [{
                                                            name: 'Pengisian Biodata',
                                                            type: 'pie',
                                                            radius: '50%',
                                                            data: [{
                                                                    value: {{ $girl }},
                                                                    name: 'Perempuan'
                                                                },
                                                                {
                                                                    value: {{ $boy }},
                                                                    name: 'Laki Laki'
                                                                },
                                                            ],
                                                            emphasis: {
                                                                itemStyle: {
                                                                    shadowBlur: 10,
                                                                    shadowOffsetX: 0,
                                                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                                }
                                                            }
                                                        }]
                                                    });
                                                });
                                            </script>
                                            <!-- End Pie Chart -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Pendidikan Pegawai</h5>

                                            <!-- Donut Chart -->
                                            <div id="donutChart" style="min-height: 400px;" class="echart"></div>

                                            <script>
                                                document.addEventListener("DOMContentLoaded", () => {
                                                    echarts.init(document.querySelector("#donutChart")).setOption({
                                                        tooltip: {
                                                            trigger: 'item'
                                                        },
                                                        legend: {
                                                            top: '5%',
                                                            left: 'center'
                                                        },
                                                        series: [{
                                                            name: 'Access From',
                                                            type: 'pie',
                                                            radius: ['40%', '70%'],
                                                            avoidLabelOverlap: false,
                                                            label: {
                                                                show: false,
                                                                position: 'center'
                                                            },
                                                            emphasis: {
                                                                label: {
                                                                    show: true,
                                                                    fontSize: '18',
                                                                    fontWeight: 'bold'
                                                                }
                                                            },
                                                            labelLine: {
                                                                show: false
                                                            },
                                                            data: [{
                                                                    value: {{ $s1 }},
                                                                    name: 'Sarjana'
                                                                },
                                                                {
                                                                    value: {{ $s2 }},
                                                                    name: 'Magister'
                                                                },
                                                                {
                                                                    value: {{ $s3 }},
                                                                    name: 'Dokter'
                                                                },
                                                            ]
                                                        }]
                                                    });
                                                });
                                            </script>
                                            <!-- End Donut Chart -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
