@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

{{--database show start--}}
@foreach($users as $user)
    @php
        $userId = $user->id;
        $userName = $user->name;
    @endphp
@endforeach
{{--database show end--}}

<div class="layout-page">

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

{{--Time, Weather API start--}}

        <div>
            <h4>Current Time</h4>
            <p id="clockText">Loading time...</p>

            <h4>Current Date</h4>
            <p id="dateText">Loading date...</p>
        </div>

        <!-- Weather Section -->
        <div>
            <h4>Weather Information</h4>
            <p id="weatherText">Loading weather data...</p>
        </div>

        <!-- Tips Section -->
        <div>
            <h4>Daily Tips</h4>
            <p id="tipsText">Loading daily tips...</p>
        </div>

        {{--Time, Weather API end--}}


        <div class="container-xxl flex-grow-1 container-p-y">
            <h1>{{ Auth::user()->name }}</h1>
            <div class="row">
                <div class="col-xxl-8 mb-6 order-0">
                    <div class="card">
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    @auth
                                        <h5 class="card-title text-primary mb-3">Welcome {{ Auth::user()->name }} 😊</h5>
                                    @endauth
                                    <p class="mb-6">
                                        another day another dollar.
                                    </p>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View news</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-6">
                                    <img src="../assets/img/illustrations/man-with-laptop.png" height="175" class="scaleX-n1-rtl" alt="View Badge User">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Profit</p>
                                    <h4 class="card-title mb-3">$12,628</h4>
                                    <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/wallet-info.png" alt="wallet info" class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Sales</p>
                                    <h4 class="card-title mb-3">$4,679</h4>
                                    <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-lg-8">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="card-title mb-0">
                                        <h5 class="m-0 me-2">Total Revenue</h5>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="totalRevenue" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded bx-lg text-muted"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalRevenue">
                                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="totalRevenueChart" class="px-3" style="min-height: 332px;"><div id="apexcharts35dg2998" class="apexcharts-canvas apexcharts35dg2998 apexcharts-theme-light" style="width: 587px; height: 317px;"><svg id="SvgjsSvg17235" width="587" height="317" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="587" height="317"><div class="apexcharts-legend apexcharts-align-left apx-legend-position-top" xmlns="http://www.w3.org/1999/xhtml" style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 158.5px;"><div class="apexcharts-legend-series" rel="1" seriesname="2023" data:collapsed="false" style="margin: 2px 10px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(105, 108, 255) !important; color: rgb(105, 108, 255); height: 8px; width: 8px; left: -5px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="2023" data:collapsed="false" style="color: rgb(100, 110, 120); font-size: 13px; font-weight: 400; font-family: &quot;Public Sans&quot;;">2023</span></div><div class="apexcharts-legend-series" rel="2" seriesname="2022" data:collapsed="false" style="margin: 2px 10px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(3, 195, 236) !important; color: rgb(3, 195, 236); height: 8px; width: 8px; left: -5px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="2022" data:collapsed="false" style="color: rgb(100, 110, 120); font-size: 13px; font-weight: 400; font-family: &quot;Public Sans&quot;;">2022</span></div></div><style type="text/css">

                                                    .apexcharts-legend {
                                                        display: flex;
                                                        overflow: auto;
                                                        padding: 0 10px;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
                                                        flex-wrap: wrap
                                                    }
                                                    .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                        flex-direction: column;
                                                        bottom: 0;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
                                                        justify-content: flex-start;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                        justify-content: center;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                        justify-content: flex-end;
                                                    }
                                                    .apexcharts-legend-series {
                                                        cursor: pointer;
                                                        line-height: normal;
                                                    }
                                                    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series{
                                                        display: flex;
                                                        align-items: center;
                                                    }
                                                    .apexcharts-legend-text {
                                                        position: relative;
                                                        font-size: 14px;
                                                    }
                                                    .apexcharts-legend-text *, .apexcharts-legend-marker * {
                                                        pointer-events: none;
                                                    }
                                                    .apexcharts-legend-marker {
                                                        position: relative;
                                                        display: inline-block;
                                                        cursor: pointer;
                                                        margin-right: 3px;
                                                        border-style: solid;
                                                    }

                                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{
                                                        display: inline-block;
                                                    }
                                                    .apexcharts-legend-series.apexcharts-no-click {
                                                        cursor: auto;
                                                    }
                                                    .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
                                                        display: none !important;
                                                    }
                                                    .apexcharts-inactive-legend {
                                                        opacity: 0.45;
                                                    }</style></foreignObject><g id="SvgjsG17237" class="apexcharts-inner apexcharts-graphical" transform="translate(55.6171875, 52)"><defs id="SvgjsDefs17236"><linearGradient id="SvgjsLinearGradient17241" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop17242" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop17243" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop17244" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMask35dg2998"><rect id="SvgjsRect17246" width="521.3828125" height="239.73000000000002" x="-5" y="-3" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask35dg2998"></clipPath><clipPath id="nonForecastMask35dg2998"></clipPath><clipPath id="gridRectMarkerMask35dg2998"><rect id="SvgjsRect17247" width="515.3828125" height="237.73000000000002" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect17245" width="21.91640625" height="233.73000000000002" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient17241)" class="apexcharts-xcrosshairs" y2="233.73000000000002" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG17267" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG17268" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText17270" font-family="Public Sans" x="36.52734375" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17271">Jan</tspan><title>Jan</title></text><text id="SvgjsText17273" font-family="Public Sans" x="109.58203125" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17274">Feb</tspan><title>Feb</title></text><text id="SvgjsText17276" font-family="Public Sans" x="182.63671875" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17277">Mar</tspan><title>Mar</title></text><text id="SvgjsText17279" font-family="Public Sans" x="255.69140625" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17280">Apr</tspan><title>Apr</title></text><text id="SvgjsText17282" font-family="Public Sans" x="328.74609375" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17283">May</tspan><title>May</title></text><text id="SvgjsText17285" font-family="Public Sans" x="401.80078125" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17286">Jun</tspan><title>Jun</title></text><text id="SvgjsText17288" font-family="Public Sans" x="474.85546875" y="262.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17289">Jul</tspan><title>Jul</title></text></g></g><g id="SvgjsG17304" class="apexcharts-grid"><g id="SvgjsG17305" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine17307" x1="0" y1="0" x2="511.3828125" y2="0" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17308" x1="0" y1="46.746" x2="511.3828125" y2="46.746" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17309" x1="0" y1="93.492" x2="511.3828125" y2="93.492" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17310" x1="0" y1="140.238" x2="511.3828125" y2="140.238" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17311" x1="0" y1="186.984" x2="511.3828125" y2="186.984" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17312" x1="0" y1="233.73000000000002" x2="511.3828125" y2="233.73000000000002" stroke="#e4e6e8" stroke-dasharray="7" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG17306" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine17314" x1="0" y1="233.73000000000002" x2="511.3828125" y2="233.73000000000002" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine17313" x1="0" y1="1" x2="0" y2="233.73000000000002" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG17248" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG17249" class="apexcharts-series" seriesName="2023" rel="1" data:realIndex="0"><path id="SvgjsPath17251" d="M 25.569140625 132.238L 25.569140625 64.09519999999999Q 25.569140625 56.09519999999999 33.569140625 56.09519999999999L 33.485546875 56.09519999999999Q 41.485546875 56.09519999999999 41.485546875 64.09519999999999L 41.485546875 64.09519999999999L 41.485546875 132.238Q 41.485546875 140.238 33.485546875 140.238L 33.569140625 140.238Q 25.569140625 140.238 25.569140625 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 25.569140625 132.238L 25.569140625 64.09519999999999Q 25.569140625 56.09519999999999 33.569140625 56.09519999999999L 33.485546875 56.09519999999999Q 41.485546875 56.09519999999999 41.485546875 64.09519999999999L 41.485546875 64.09519999999999L 41.485546875 132.238Q 41.485546875 140.238 33.485546875 140.238L 33.569140625 140.238Q 25.569140625 140.238 25.569140625 132.238z" pathFrom="M 25.569140625 132.238L 25.569140625 132.238L 41.485546875 132.238L 41.485546875 132.238L 41.485546875 132.238L 41.485546875 132.238L 41.485546875 132.238L 25.569140625 132.238" cy="56.09519999999999" cx="95.623828125" j="0" val="18" barHeight="84.14280000000001" barWidth="21.91640625"></path><path id="SvgjsPath17252" d="M 98.623828125 132.238L 98.623828125 115.5158Q 98.623828125 107.5158 106.623828125 107.5158L 106.54023437500001 107.5158Q 114.54023437500001 107.5158 114.54023437500001 115.5158L 114.54023437500001 115.5158L 114.54023437500001 132.238Q 114.54023437500001 140.238 106.54023437500001 140.238L 106.623828125 140.238Q 98.623828125 140.238 98.623828125 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 98.623828125 132.238L 98.623828125 115.5158Q 98.623828125 107.5158 106.623828125 107.5158L 106.54023437500001 107.5158Q 114.54023437500001 107.5158 114.54023437500001 115.5158L 114.54023437500001 115.5158L 114.54023437500001 132.238Q 114.54023437500001 140.238 106.54023437500001 140.238L 106.623828125 140.238Q 98.623828125 140.238 98.623828125 132.238z" pathFrom="M 98.623828125 132.238L 98.623828125 132.238L 114.54023437500001 132.238L 114.54023437500001 132.238L 114.54023437500001 132.238L 114.54023437500001 132.238L 114.54023437500001 132.238L 98.623828125 132.238" cy="107.5158" cx="168.678515625" j="1" val="7" barHeight="32.7222" barWidth="21.91640625"></path><path id="SvgjsPath17253" d="M 171.678515625 132.238L 171.678515625 78.119Q 171.678515625 70.119 179.678515625 70.119L 179.59492187499998 70.119Q 187.59492187499998 70.119 187.59492187499998 78.119L 187.59492187499998 78.119L 187.59492187499998 132.238Q 187.59492187499998 140.238 179.59492187499998 140.238L 179.678515625 140.238Q 171.678515625 140.238 171.678515625 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 171.678515625 132.238L 171.678515625 78.119Q 171.678515625 70.119 179.678515625 70.119L 179.59492187499998 70.119Q 187.59492187499998 70.119 187.59492187499998 78.119L 187.59492187499998 78.119L 187.59492187499998 132.238Q 187.59492187499998 140.238 179.59492187499998 140.238L 179.678515625 140.238Q 171.678515625 140.238 171.678515625 132.238z" pathFrom="M 171.678515625 132.238L 171.678515625 132.238L 187.59492187499998 132.238L 187.59492187499998 132.238L 187.59492187499998 132.238L 187.59492187499998 132.238L 187.59492187499998 132.238L 171.678515625 132.238" cy="70.119" cx="241.733203125" j="2" val="15" barHeight="70.119" barWidth="21.91640625"></path><path id="SvgjsPath17254" d="M 244.733203125 132.238L 244.733203125 12.674599999999998Q 244.733203125 4.674599999999998 252.733203125 4.674599999999998L 252.649609375 4.674599999999998Q 260.649609375 4.674599999999998 260.649609375 12.674599999999998L 260.649609375 12.674599999999998L 260.649609375 132.238Q 260.649609375 140.238 252.649609375 140.238L 252.733203125 140.238Q 244.733203125 140.238 244.733203125 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 244.733203125 132.238L 244.733203125 12.674599999999998Q 244.733203125 4.674599999999998 252.733203125 4.674599999999998L 252.649609375 4.674599999999998Q 260.649609375 4.674599999999998 260.649609375 12.674599999999998L 260.649609375 12.674599999999998L 260.649609375 132.238Q 260.649609375 140.238 252.649609375 140.238L 252.733203125 140.238Q 244.733203125 140.238 244.733203125 132.238z" pathFrom="M 244.733203125 132.238L 244.733203125 132.238L 260.649609375 132.238L 260.649609375 132.238L 260.649609375 132.238L 260.649609375 132.238L 260.649609375 132.238L 244.733203125 132.238" cy="4.674599999999998" cx="314.787890625" j="3" val="29" barHeight="135.5634" barWidth="21.91640625"></path><path id="SvgjsPath17255" d="M 317.787890625 132.238L 317.787890625 64.09519999999999Q 317.787890625 56.09519999999999 325.787890625 56.09519999999999L 325.704296875 56.09519999999999Q 333.704296875 56.09519999999999 333.704296875 64.09519999999999L 333.704296875 64.09519999999999L 333.704296875 132.238Q 333.704296875 140.238 325.704296875 140.238L 325.787890625 140.238Q 317.787890625 140.238 317.787890625 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 317.787890625 132.238L 317.787890625 64.09519999999999Q 317.787890625 56.09519999999999 325.787890625 56.09519999999999L 325.704296875 56.09519999999999Q 333.704296875 56.09519999999999 333.704296875 64.09519999999999L 333.704296875 64.09519999999999L 333.704296875 132.238Q 333.704296875 140.238 325.704296875 140.238L 325.787890625 140.238Q 317.787890625 140.238 317.787890625 132.238z" pathFrom="M 317.787890625 132.238L 317.787890625 132.238L 333.704296875 132.238L 333.704296875 132.238L 333.704296875 132.238L 333.704296875 132.238L 333.704296875 132.238L 317.787890625 132.238" cy="56.09519999999999" cx="387.842578125" j="4" val="18" barHeight="84.14280000000001" barWidth="21.91640625"></path><path id="SvgjsPath17256" d="M 390.842578125 132.238L 390.842578125 92.1428Q 390.842578125 84.1428 398.842578125 84.1428L 398.758984375 84.1428Q 406.758984375 84.1428 406.758984375 92.1428L 406.758984375 92.1428L 406.758984375 132.238Q 406.758984375 140.238 398.758984375 140.238L 398.842578125 140.238Q 390.842578125 140.238 390.842578125 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 390.842578125 132.238L 390.842578125 92.1428Q 390.842578125 84.1428 398.842578125 84.1428L 398.758984375 84.1428Q 406.758984375 84.1428 406.758984375 92.1428L 406.758984375 92.1428L 406.758984375 132.238Q 406.758984375 140.238 398.758984375 140.238L 398.842578125 140.238Q 390.842578125 140.238 390.842578125 132.238z" pathFrom="M 390.842578125 132.238L 390.842578125 132.238L 406.758984375 132.238L 406.758984375 132.238L 406.758984375 132.238L 406.758984375 132.238L 406.758984375 132.238L 390.842578125 132.238" cy="84.1428" cx="460.897265625" j="5" val="12" barHeight="56.095200000000006" barWidth="21.91640625"></path><path id="SvgjsPath17257" d="M 463.897265625 132.238L 463.897265625 106.16659999999999Q 463.897265625 98.16659999999999 471.897265625 98.16659999999999L 471.813671875 98.16659999999999Q 479.813671875 98.16659999999999 479.813671875 106.16659999999999L 479.813671875 106.16659999999999L 479.813671875 132.238Q 479.813671875 140.238 471.813671875 140.238L 471.897265625 140.238Q 463.897265625 140.238 463.897265625 132.238z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask35dg2998)" pathTo="M 463.897265625 132.238L 463.897265625 106.16659999999999Q 463.897265625 98.16659999999999 471.897265625 98.16659999999999L 471.813671875 98.16659999999999Q 479.813671875 98.16659999999999 479.813671875 106.16659999999999L 479.813671875 106.16659999999999L 479.813671875 132.238Q 479.813671875 140.238 471.813671875 140.238L 471.897265625 140.238Q 463.897265625 140.238 463.897265625 132.238z" pathFrom="M 463.897265625 132.238L 463.897265625 132.238L 479.813671875 132.238L 479.813671875 132.238L 479.813671875 132.238L 479.813671875 132.238L 479.813671875 132.238L 463.897265625 132.238" cy="98.16659999999999" cx="533.951953125" j="6" val="9" barHeight="42.071400000000004" barWidth="21.91640625"></path></g><g id="SvgjsG17258" class="apexcharts-series" seriesName="2022" rel="2" data:realIndex="1"><path id="SvgjsPath17260" d="M 25.569140625 156.238L 25.569140625 201.0078Q 25.569140625 209.0078 33.569140625 209.0078L 33.485546875 209.0078Q 41.485546875 209.0078 41.485546875 201.0078L 41.485546875 201.0078L 41.485546875 156.238Q 41.485546875 148.238 33.485546875 148.238L 33.569140625 148.238Q 25.569140625 148.238 25.569140625 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 25.569140625 156.238L 25.569140625 201.0078Q 25.569140625 209.0078 33.569140625 209.0078L 33.485546875 209.0078Q 41.485546875 209.0078 41.485546875 201.0078L 41.485546875 201.0078L 41.485546875 156.238Q 41.485546875 148.238 33.485546875 148.238L 33.569140625 148.238Q 25.569140625 148.238 25.569140625 156.238z" pathFrom="M 25.569140625 156.238L 25.569140625 156.238L 41.485546875 156.238L 41.485546875 156.238L 41.485546875 156.238L 41.485546875 156.238L 41.485546875 156.238L 25.569140625 156.238" cy="193.0078" cx="95.623828125" j="0" val="-13" barHeight="-60.769800000000004" barWidth="21.91640625"></path><path id="SvgjsPath17261" d="M 98.623828125 156.238L 98.623828125 224.38080000000002Q 98.623828125 232.38080000000002 106.623828125 232.38080000000002L 106.54023437500001 232.38080000000002Q 114.54023437500001 232.38080000000002 114.54023437500001 224.38080000000002L 114.54023437500001 224.38080000000002L 114.54023437500001 156.238Q 114.54023437500001 148.238 106.54023437500001 148.238L 106.623828125 148.238Q 98.623828125 148.238 98.623828125 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 98.623828125 156.238L 98.623828125 224.38080000000002Q 98.623828125 232.38080000000002 106.623828125 232.38080000000002L 106.54023437500001 232.38080000000002Q 114.54023437500001 232.38080000000002 114.54023437500001 224.38080000000002L 114.54023437500001 224.38080000000002L 114.54023437500001 156.238Q 114.54023437500001 148.238 106.54023437500001 148.238L 106.623828125 148.238Q 98.623828125 148.238 98.623828125 156.238z" pathFrom="M 98.623828125 156.238L 98.623828125 156.238L 114.54023437500001 156.238L 114.54023437500001 156.238L 114.54023437500001 156.238L 114.54023437500001 156.238L 114.54023437500001 156.238L 98.623828125 156.238" cy="216.38080000000002" cx="168.678515625" j="1" val="-18" barHeight="-84.14280000000001" barWidth="21.91640625"></path><path id="SvgjsPath17262" d="M 171.678515625 156.238L 171.678515625 182.3094Q 171.678515625 190.3094 179.678515625 190.3094L 179.59492187499998 190.3094Q 187.59492187499998 190.3094 187.59492187499998 182.3094L 187.59492187499998 182.3094L 187.59492187499998 156.238Q 187.59492187499998 148.238 179.59492187499998 148.238L 179.678515625 148.238Q 171.678515625 148.238 171.678515625 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 171.678515625 156.238L 171.678515625 182.3094Q 171.678515625 190.3094 179.678515625 190.3094L 179.59492187499998 190.3094Q 187.59492187499998 190.3094 187.59492187499998 182.3094L 187.59492187499998 182.3094L 187.59492187499998 156.238Q 187.59492187499998 148.238 179.59492187499998 148.238L 179.678515625 148.238Q 171.678515625 148.238 171.678515625 156.238z" pathFrom="M 171.678515625 156.238L 171.678515625 156.238L 187.59492187499998 156.238L 187.59492187499998 156.238L 187.59492187499998 156.238L 187.59492187499998 156.238L 187.59492187499998 156.238L 171.678515625 156.238" cy="174.3094" cx="241.733203125" j="2" val="-9" barHeight="-42.071400000000004" barWidth="21.91640625"></path><path id="SvgjsPath17263" d="M 244.733203125 156.238L 244.733203125 205.6824Q 244.733203125 213.6824 252.733203125 213.6824L 252.649609375 213.6824Q 260.649609375 213.6824 260.649609375 205.6824L 260.649609375 205.6824L 260.649609375 156.238Q 260.649609375 148.238 252.649609375 148.238L 252.733203125 148.238Q 244.733203125 148.238 244.733203125 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 244.733203125 156.238L 244.733203125 205.6824Q 244.733203125 213.6824 252.733203125 213.6824L 252.649609375 213.6824Q 260.649609375 213.6824 260.649609375 205.6824L 260.649609375 205.6824L 260.649609375 156.238Q 260.649609375 148.238 252.649609375 148.238L 252.733203125 148.238Q 244.733203125 148.238 244.733203125 156.238z" pathFrom="M 244.733203125 156.238L 244.733203125 156.238L 260.649609375 156.238L 260.649609375 156.238L 260.649609375 156.238L 260.649609375 156.238L 260.649609375 156.238L 244.733203125 156.238" cy="197.6824" cx="314.787890625" j="3" val="-14" barHeight="-65.4444" barWidth="21.91640625"></path><path id="SvgjsPath17264" d="M 317.787890625 156.238L 317.787890625 163.611Q 317.787890625 171.611 325.787890625 171.611L 325.704296875 171.611Q 333.704296875 171.611 333.704296875 163.611L 333.704296875 163.611L 333.704296875 156.238Q 333.704296875 148.238 325.704296875 148.238L 325.787890625 148.238Q 317.787890625 148.238 317.787890625 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 317.787890625 156.238L 317.787890625 163.611Q 317.787890625 171.611 325.787890625 171.611L 325.704296875 171.611Q 333.704296875 171.611 333.704296875 163.611L 333.704296875 163.611L 333.704296875 156.238Q 333.704296875 148.238 325.704296875 148.238L 325.787890625 148.238Q 317.787890625 148.238 317.787890625 156.238z" pathFrom="M 317.787890625 156.238L 317.787890625 156.238L 333.704296875 156.238L 333.704296875 156.238L 333.704296875 156.238L 333.704296875 156.238L 333.704296875 156.238L 317.787890625 156.238" cy="155.611" cx="387.842578125" j="4" val="-5" barHeight="-23.373" barWidth="21.91640625"></path><path id="SvgjsPath17265" d="M 390.842578125 156.238L 390.842578125 219.70620000000002Q 390.842578125 227.70620000000002 398.842578125 227.70620000000002L 398.758984375 227.70620000000002Q 406.758984375 227.70620000000002 406.758984375 219.70620000000002L 406.758984375 219.70620000000002L 406.758984375 156.238Q 406.758984375 148.238 398.758984375 148.238L 398.842578125 148.238Q 390.842578125 148.238 390.842578125 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 390.842578125 156.238L 390.842578125 219.70620000000002Q 390.842578125 227.70620000000002 398.842578125 227.70620000000002L 398.758984375 227.70620000000002Q 406.758984375 227.70620000000002 406.758984375 219.70620000000002L 406.758984375 219.70620000000002L 406.758984375 156.238Q 406.758984375 148.238 398.758984375 148.238L 398.842578125 148.238Q 390.842578125 148.238 390.842578125 156.238z" pathFrom="M 390.842578125 156.238L 390.842578125 156.238L 406.758984375 156.238L 406.758984375 156.238L 406.758984375 156.238L 406.758984375 156.238L 406.758984375 156.238L 390.842578125 156.238" cy="211.70620000000002" cx="460.897265625" j="5" val="-17" barHeight="-79.46820000000001" barWidth="21.91640625"></path><path id="SvgjsPath17266" d="M 463.897265625 156.238L 463.897265625 210.357Q 463.897265625 218.357 471.897265625 218.357L 471.813671875 218.357Q 479.813671875 218.357 479.813671875 210.357L 479.813671875 210.357L 479.813671875 156.238Q 479.813671875 148.238 471.813671875 148.238L 471.897265625 148.238Q 463.897265625 148.238 463.897265625 156.238z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke="#ffffff" stroke-opacity="1" stroke-linecap="round" stroke-width="6" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask35dg2998)" pathTo="M 463.897265625 156.238L 463.897265625 210.357Q 463.897265625 218.357 471.897265625 218.357L 471.813671875 218.357Q 479.813671875 218.357 479.813671875 210.357L 479.813671875 210.357L 479.813671875 156.238Q 479.813671875 148.238 471.813671875 148.238L 471.897265625 148.238Q 463.897265625 148.238 463.897265625 156.238z" pathFrom="M 463.897265625 156.238L 463.897265625 156.238L 479.813671875 156.238L 479.813671875 156.238L 479.813671875 156.238L 479.813671875 156.238L 479.813671875 156.238L 463.897265625 156.238" cy="202.357" cx="533.951953125" j="6" val="-15" barHeight="-70.119" barWidth="21.91640625"></path></g><g id="SvgjsG17250" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG17259" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine17315" x1="0" y1="0" x2="511.3828125" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17316" x1="0" y1="0" x2="511.3828125" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG17317" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG17318" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG17319" class="apexcharts-point-annotations"></g></g><g id="SvgjsG17290" class="apexcharts-yaxis" rel="0" transform="translate(17.6171875, 0)"><g id="SvgjsG17291" class="apexcharts-yaxis-texts-g"><text id="SvgjsText17292" font-family="Public Sans" x="20" y="53.5" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17293">30</tspan><title>30</title></text><text id="SvgjsText17294" font-family="Public Sans" x="20" y="100.24600000000001" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17295">20</tspan><title>20</title></text><text id="SvgjsText17296" font-family="Public Sans" x="20" y="146.99200000000002" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17297">10</tspan><title>10</title></text><text id="SvgjsText17298" font-family="Public Sans" x="20" y="193.73800000000003" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17299">0</tspan><title>0</title></text><text id="SvgjsText17300" font-family="Public Sans" x="20" y="240.48400000000004" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17301">-10</tspan><title>-10</title></text><text id="SvgjsText17302" font-family="Public Sans" x="20" y="287.23" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-yaxis-label " style="font-family: &quot;Public Sans&quot;;"><tspan id="SvgjsTspan17303">-20</tspan><title>-20</title></text></g></g><g id="SvgjsG17238" class="apexcharts-annotations"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(3, 195, 236);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 612px; height: 410px;"></div></div><div class="contract-trigger"></div></div></div>
                            <div class="col-lg-4 d-flex align-items-center">
                                <div class="card-body px-xl-9" style="position: relative;">
                                    <div class="text-center mb-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary">
                                                <script>
                                                    document.write(new Date().getFullYear() - 1);
                                                </script>2023
                                            </button>
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);">2021</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2020</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);">2019</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="growthChart" style="min-height: 154.875px;"><div id="apexchartsqtteius7" class="apexcharts-canvas apexchartsqtteius7 apexcharts-theme-light" style="width: 234px; height: 154.875px;"><svg id="SvgjsSvg17320" width="234" height="154.875" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG17322" class="apexcharts-inner apexcharts-graphical" transform="translate(10, -25)"><defs id="SvgjsDefs17321"><clipPath id="gridRectMaskqtteius7"><rect id="SvgjsRect17324" width="222" height="285" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskqtteius7"></clipPath><clipPath id="nonForecastMaskqtteius7"></clipPath><clipPath id="gridRectMarkerMaskqtteius7"><rect id="SvgjsRect17325" width="220" height="287" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient17330" x1="1" y1="0" x2="0" y2="1"><stop id="SvgjsStop17331" stop-opacity="1" stop-color="rgba(105,108,255,1)" offset="0.3"></stop><stop id="SvgjsStop17332" stop-opacity="0.6" stop-color="rgba(255,255,255,0.6)" offset="0.7"></stop><stop id="SvgjsStop17333" stop-opacity="0.6" stop-color="rgba(255,255,255,0.6)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient17341" x1="1" y1="0" x2="0" y2="1"><stop id="SvgjsStop17342" stop-opacity="1" stop-color="rgba(105,108,255,1)" offset="0.3"></stop><stop id="SvgjsStop17343" stop-opacity="0.6" stop-color="rgba(105,108,255,0.6)" offset="0.7"></stop><stop id="SvgjsStop17344" stop-opacity="0.6" stop-color="rgba(105,108,255,0.6)" offset="1"></stop></linearGradient></defs><g id="SvgjsG17326" class="apexcharts-radialbar"><g id="SvgjsG17327"><g id="SvgjsG17328" class="apexcharts-tracks"><g id="SvgjsG17329" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656" fill="none" fill-opacity="1" stroke="rgba(255,255,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="17.357317073170734" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"></path></g></g><g id="SvgjsG17335"><g id="SvgjsG17340" class="apexcharts-series apexcharts-radial-series" seriesName="Growth" rel="1" data:realIndex="0"><path id="SvgjsPath17345" d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481" fill="none" fill-opacity="0.85" stroke="url(#SvgjsLinearGradient17341)" stroke-opacity="1" stroke-linecap="butt" stroke-width="17.357317073170734" stroke-dasharray="5" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="234" data:value="78" index="0" j="0" data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"></path></g><circle id="SvgjsCircle17336" r="54.65121951219512" cx="108" cy="108" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG17337" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText17338" font-family="Public Sans" x="108" y="123" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="500" fill="#646e78" class="apexcharts-text apexcharts-datalabel-label" style="font-family: &quot;Public Sans&quot;;">Growth</text><text id="SvgjsText17339" font-family="Public Sans" x="108" y="99" text-anchor="middle" dominant-baseline="auto" font-size="22px" font-weight="500" fill="#384551" class="apexcharts-text apexcharts-datalabel-value" style="font-family: &quot;Public Sans&quot;;">78%</text></g></g></g></g><line id="SvgjsLine17346" x1="0" y1="0" x2="216" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17347" x1="0" y1="0" x2="216" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG17323" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                                    <div class="text-center fw-medium my-6">62% Company Growth</div>

                                    <div class="d-flex gap-3 justify-content-between">
                                        <div class="d-flex">
                                            <div class="avatar me-2">
                                                <span class="avatar-initial rounded-2 bg-label-primary"><i class="bx bx-dollar bx-lg text-primary"></i></span>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <small>
                                                    <script>
                                                        document.write(new Date().getFullYear() - 1);
                                                    </script>2023
                                                </small>
                                                <h6 class="mb-0">$32.5k</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="avatar me-2">
                                                <span class="avatar-initial rounded-2 bg-label-info"><i class="bx bx-wallet bx-lg text-info"></i></span>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <small>
                                                    <script>
                                                        document.write(new Date().getFullYear() - 2);
                                                    </script>2022
                                                </small>
                                                <h6 class="mb-0">$41.2k</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 307px; height: 374px;"></div></div><div class="contract-trigger"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
                    <div class="row">
                        <div class="col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Payments</p>
                                    <h4 class="card-title mb-3">$2,456</h4>
                                    <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Transactions</p>
                                    <h4 class="card-title mb-3">$14,857</h4>
                                    <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10" style="position: relative;">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title mb-6">
                                                <h5 class="text-nowrap mb-1">Profile Report</h5>
                                                <span class="badge bg-label-warning">YEAR 2022</span>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <span class="text-success text-nowrap fw-medium"><i class="bx bx-up-arrow-alt"></i> 68.2%</span>
                                                <h4 class="mb-0">$84,686k</h4>
                                            </div>
                                        </div>
                                        <div id="profileReportChart" style="min-height: 75px;"><div id="apexcharts5uthxckv" class="apexcharts-canvas apexcharts5uthxckv apexcharts-theme-light" style="width: 240px; height: 75px;"><svg id="SvgjsSvg17349" width="240" height="75" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG17351" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs17350"><clipPath id="gridRectMask5uthxckv"><rect id="SvgjsRect17356" width="241" height="80" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask5uthxckv"></clipPath><clipPath id="nonForecastMask5uthxckv"></clipPath><clipPath id="gridRectMarkerMask5uthxckv"><rect id="SvgjsRect17357" width="236" height="79" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter17363" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood17364" flood-color="#ffab00" flood-opacity="0.15" result="SvgjsFeFlood17364Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite17365" in="SvgjsFeFlood17364Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite17365Out"></feComposite><feOffset id="SvgjsFeOffset17366" dx="5" dy="10" result="SvgjsFeOffset17366Out" in="SvgjsFeComposite17365Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur17367" stdDeviation="3 " result="SvgjsFeGaussianBlur17367Out" in="SvgjsFeOffset17366Out"></feGaussianBlur><feMerge id="SvgjsFeMerge17368" result="SvgjsFeMerge17368Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode17369" in="SvgjsFeGaussianBlur17367Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode17370" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend17371" in="SourceGraphic" in2="SvgjsFeMerge17368Out" mode="normal" result="SvgjsFeBlend17371Out"></feBlend></filter></defs><line id="SvgjsLine17355" x1="0" y1="0" x2="0" y2="75" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="75" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG17372" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG17373" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG17381" class="apexcharts-grid"><g id="SvgjsG17382" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine17384" x1="0" y1="0" x2="232" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17385" x1="0" y1="18.75" x2="232" y2="18.75" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17386" x1="0" y1="37.5" x2="232" y2="37.5" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17387" x1="0" y1="56.25" x2="232" y2="56.25" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17388" x1="0" y1="75" x2="232" y2="75" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG17383" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine17390" x1="0" y1="75" x2="232" y2="75" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine17389" x1="0" y1="1" x2="0" y2="75" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG17358" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG17359" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath17362" d="M 0 71.25C 16.24 71.25 30.16 11.25 46.4 11.25C 62.64 11.25 76.56 58.125 92.8 58.125C 109.03999999999999 58.125 122.96 20.625 139.2 20.625C 155.44 20.625 169.35999999999999 35.625 185.6 35.625C 201.83999999999997 35.625 215.76 5.625 231.99999999999997 5.625" fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMask5uthxckv)" filter="url(#SvgjsFilter17363)" pathTo="M 0 71.25C 16.24 71.25 30.16 11.25 46.4 11.25C 62.64 11.25 76.56 58.125 92.8 58.125C 109.03999999999999 58.125 122.96 20.625 139.2 20.625C 155.44 20.625 169.35999999999999 35.625 185.6 35.625C 201.83999999999997 35.625 215.76 5.625 231.99999999999997 5.625" pathFrom="M -1 112.5L -1 112.5L 46.4 112.5L 92.8 112.5L 139.2 112.5L 185.6 112.5L 231.99999999999997 112.5"></path><g id="SvgjsG17360" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle17396" r="0" cx="0" cy="0" class="apexcharts-marker wayuy8sikl no-pointer-events" stroke="#ffffff" fill="#ffab00" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG17361" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine17391" x1="0" y1="0" x2="232" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17392" x1="0" y1="0" x2="232" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG17393" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG17394" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG17395" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect17354" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG17380" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG17352" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 37.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 171, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 398px; height: 141px;"></div></div><div class="contract-trigger"></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="mb-1 me-2">Order Statistics</h5>
                                <p class="card-subtitle">42.82k Total Sales</p>
                            </div>
                            <div class="dropdown">
                                <button class="btn text-muted p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-6" style="position: relative;">
                                <div class="d-flex flex-column align-items-center gap-1">
                                    <h3 class="mb-1">8,258</h3>
                                    <small>Total Orders</small>
                                </div>
                                <div id="orderStatisticsChart" style="min-height: 117.55px;"><div id="apexcharts5eb6kv36l" class="apexcharts-canvas apexcharts5eb6kv36l apexcharts-theme-light" style="width: 110px; height: 117.55px;"><svg id="SvgjsSvg17397" width="110" height="117.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG17399" class="apexcharts-inner apexcharts-graphical" transform="translate(-7, 0)"><defs id="SvgjsDefs17398"><clipPath id="gridRectMask5eb6kv36l"><rect id="SvgjsRect17401" width="130" height="153" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask5eb6kv36l"></clipPath><clipPath id="nonForecastMask5eb6kv36l"></clipPath><clipPath id="gridRectMarkerMask5eb6kv36l"><rect id="SvgjsRect17402" width="125" height="152" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG17403" class="apexcharts-pie"><g id="SvgjsG17404" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle17405" r="37.518292682926834" cx="60.5" cy="60.5" fill="transparent"></circle><g id="SvgjsG17406" class="apexcharts-slices"><g id="SvgjsG17407" class="apexcharts-series apexcharts-pie-series" seriesName="Electronic" rel="1" data:realIndex="0"><path id="SvgjsPath17408" d="M 60.5 10.475609756097555 A 50.024390243902445 50.024390243902445 0 0 1 110.52439024390245 60.5 L 98.01829268292684 60.5 A 37.518292682926834 37.518292682926834 0 0 0 60.5 22.981707317073166 L 60.5 10.475609756097555 z" fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="90" data:startAngle="0" data:strokeWidth="5" data:value="50" data:pathOrig="M 60.5 10.475609756097555 A 50.024390243902445 50.024390243902445 0 0 1 110.52439024390245 60.5 L 98.01829268292684 60.5 A 37.518292682926834 37.518292682926834 0 0 0 60.5 22.981707317073166 L 60.5 10.475609756097555 z" stroke="#ffffff"></path></g><g id="SvgjsG17409" class="apexcharts-series apexcharts-pie-series" seriesName="Sports" rel="2" data:realIndex="1"><path id="SvgjsPath17410" d="M 110.52439024390245 60.5 A 50.024390243902445 50.024390243902445 0 0 1 15.92794192413799 83.21059792599539 L 27.07095644310349 77.53294844449654 A 37.518292682926834 37.518292682926834 0 0 0 98.01829268292684 60.5 L 110.52439024390245 60.5 z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="153" data:startAngle="90" data:strokeWidth="5" data:value="85" data:pathOrig="M 110.52439024390245 60.5 A 50.024390243902445 50.024390243902445 0 0 1 15.92794192413799 83.21059792599539 L 27.07095644310349 77.53294844449654 A 37.518292682926834 37.518292682926834 0 0 0 98.01829268292684 60.5 L 110.52439024390245 60.5 z" stroke="#ffffff"></path></g><g id="SvgjsG17411" class="apexcharts-series apexcharts-pie-series" seriesName="Decor" rel="3" data:realIndex="2"><path id="SvgjsPath17412" d="M 15.92794192413799 83.21059792599539 A 50.024390243902445 50.024390243902445 0 0 1 12.923977684844871 45.04161328138981 L 24.817983263633657 48.90620996104236 A 37.518292682926834 37.518292682926834 0 0 0 27.07095644310349 77.53294844449654 L 15.92794192413799 83.21059792599539 z" fill="rgba(133,146,163,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="45" data:startAngle="243" data:strokeWidth="5" data:value="25" data:pathOrig="M 15.92794192413799 83.21059792599539 A 50.024390243902445 50.024390243902445 0 0 1 12.923977684844871 45.04161328138981 L 24.817983263633657 48.90620996104236 A 37.518292682926834 37.518292682926834 0 0 0 27.07095644310349 77.53294844449654 L 15.92794192413799 83.21059792599539 z" stroke="#ffffff"></path></g><g id="SvgjsG17413" class="apexcharts-series apexcharts-pie-series" seriesName="Fashion" rel="4" data:realIndex="3"><path id="SvgjsPath17414" d="M 12.923977684844871 45.04161328138981 A 50.024390243902445 50.024390243902445 0 0 1 60.491269096883734 10.475610518012587 L 60.4934518226628 22.98170788850944 A 37.518292682926834 37.518292682926834 0 0 0 24.817983263633657 48.90620996104236 L 12.923977684844871 45.04161328138981 z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-3" index="0" j="3" data:angle="72" data:startAngle="288" data:strokeWidth="5" data:value="40" data:pathOrig="M 12.923977684844871 45.04161328138981 A 50.024390243902445 50.024390243902445 0 0 1 60.491269096883734 10.475610518012587 L 60.4934518226628 22.98170788850944 A 37.518292682926834 37.518292682926834 0 0 0 24.817983263633657 48.90620996104236 L 12.923977684844871 45.04161328138981 z" stroke="#ffffff"></path></g></g></g><g id="SvgjsG17415" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"><text id="SvgjsText17416" font-family="Helvetica, Arial, sans-serif" x="60.5" y="77.5" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#646e78" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Weekly</text><text id="SvgjsText17417" font-family="Public Sans" x="60.5" y="59.5" text-anchor="middle" dominant-baseline="auto" font-size="18px" font-weight="500" fill="#384551" class="apexcharts-text apexcharts-datalabel-value" style="font-family: &quot;Public Sans&quot;;">38%</text></g></g><line id="SvgjsLine17418" x1="0" y1="0" x2="121" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17419" x1="0" y1="0" x2="121" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG17400" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(113, 221, 55);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(133, 146, 163);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 4;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(3, 195, 236);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 398px; height: 119px;"></div></div><div class="contract-trigger"></div></div></div>
                            <ul class="p-0 m-0">
                                <li class="d-flex align-items-center mb-5">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Electronic</h6>
                                            <small>Mobile, Earbuds, TV</small>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">82.5k</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-5">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Fashion</h6>
                                            <small>T-shirt, Jeans, Shoes</small>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">23.8k</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-5">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Decor</h6>
                                            <small>Fine Art, Dining</small>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">849k</h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Sports</h6>
                                            <small>Football, Cricket Kit</small>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">99</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-6">
                    <div class="card h-100">
                        <div class="card-header nav-align-top">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income" aria-selected="true">
                                        Income
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" aria-selected="false" tabindex="-1">Expenses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link" role="tab" aria-selected="false" tabindex="-1">Profit</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel" style="position: relative;">
                                    <div class="d-flex mb-6">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="../assets/img/icons/unicons/wallet.png" alt="User">
                                        </div>
                                        <div>
                                            <p class="mb-0">Total Balance</p>
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-1">$459.10</h6>
                                                <small class="text-success fw-medium">
                                                    <i class="bx bx-chevron-up bx-lg"></i>
                                                    42.9%
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="incomeChart" style="min-height: 232px;"><div id="apexchartsqn1ir35x" class="apexcharts-canvas apexchartsqn1ir35x apexcharts-theme-light" style="width: 397px; height: 232px;"><svg id="SvgjsSvg17420" width="397" height="232" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG17422" class="apexcharts-inner apexcharts-graphical" transform="translate(10, 10)"><defs id="SvgjsDefs17421"><clipPath id="gridRectMaskqn1ir35x"><rect id="SvgjsRect17427" width="376.6875" height="193.73" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskqn1ir35x"></clipPath><clipPath id="nonForecastMaskqn1ir35x"></clipPath><clipPath id="gridRectMarkerMaskqn1ir35x"><rect id="SvgjsRect17428" width="397.6875" height="218.73" x="-14" y="-14" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient17446" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop17447" stop-opacity="0.5" stop-color="rgba(105,108,255,0.5)" offset="0"></stop><stop id="SvgjsStop17448" stop-opacity="0.25" stop-color="rgba(195,196,255,0.25)" offset="0.95"></stop><stop id="SvgjsStop17449" stop-opacity="0.25" stop-color="rgba(195,196,255,0.25)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine17426" x1="0" y1="0" x2="0" y2="190.73" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="190.73" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG17452" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG17453" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText17455" font-family="Helvetica, Arial, sans-serif" x="0" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17456">Jan</tspan><title>Jan</title></text><text id="SvgjsText17458" font-family="Helvetica, Arial, sans-serif" x="61.61458333333333" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17459">Feb</tspan><title>Feb</title></text><text id="SvgjsText17461" font-family="Helvetica, Arial, sans-serif" x="123.22916666666667" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17462">Mar</tspan><title>Mar</title></text><text id="SvgjsText17464" font-family="Helvetica, Arial, sans-serif" x="184.84375000000003" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17465">Apr</tspan><title>Apr</title></text><text id="SvgjsText17467" font-family="Helvetica, Arial, sans-serif" x="246.45833333333334" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17468">May</tspan><title>May</title></text><text id="SvgjsText17470" font-family="Helvetica, Arial, sans-serif" x="308.07291666666663" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17471">Jun</tspan><title>Jun</title></text><text id="SvgjsText17473" font-family="Helvetica, Arial, sans-serif" x="369.68749999999994" y="219.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a7acb2" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan17474">Jul</tspan><title>Jul</title></text></g></g><g id="SvgjsG17477" class="apexcharts-grid"><g id="SvgjsG17478" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine17480" x1="0" y1="0" x2="369.6875" y2="0" stroke="#e4e6e8" stroke-dasharray="8" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17481" x1="0" y1="47.6825" x2="369.6875" y2="47.6825" stroke="#e4e6e8" stroke-dasharray="8" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17482" x1="0" y1="95.365" x2="369.6875" y2="95.365" stroke="#e4e6e8" stroke-dasharray="8" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17483" x1="0" y1="143.04749999999999" x2="369.6875" y2="143.04749999999999" stroke="#e4e6e8" stroke-dasharray="8" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine17484" x1="0" y1="190.73" x2="369.6875" y2="190.73" stroke="#e4e6e8" stroke-dasharray="8" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG17479" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine17486" x1="0" y1="190.73" x2="369.6875" y2="190.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine17485" x1="0" y1="1" x2="0" y2="190.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG17429" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG17430" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath17450" d="M 0 190.73L 0 138.27925C 21.565104166666668 138.27925 40.04947916666667 95.36500000000001 61.614583333333336 95.36500000000001C 83.1796875 95.36500000000001 101.6640625 133.511 123.22916666666667 133.511C 144.79427083333334 133.511 163.27864583333334 38.146000000000015 184.84375 38.146000000000015C 206.40885416666666 38.146000000000015 224.89322916666669 114.438 246.45833333333334 114.438C 268.0234375 114.438 286.5078125 71.52375 308.0729166666667 71.52375C 329.63802083333337 71.52375 348.12239583333337 100.13325 369.6875 100.13325C 369.6875 100.13325 369.6875 100.13325 369.6875 190.73M 369.6875 100.13325z" fill="url(#SvgjsLinearGradient17446)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskqn1ir35x)" pathTo="M 0 190.73L 0 138.27925C 21.565104166666668 138.27925 40.04947916666667 95.36500000000001 61.614583333333336 95.36500000000001C 83.1796875 95.36500000000001 101.6640625 133.511 123.22916666666667 133.511C 144.79427083333334 133.511 163.27864583333334 38.146000000000015 184.84375 38.146000000000015C 206.40885416666666 38.146000000000015 224.89322916666669 114.438 246.45833333333334 114.438C 268.0234375 114.438 286.5078125 71.52375 308.0729166666667 71.52375C 329.63802083333337 71.52375 348.12239583333337 100.13325 369.6875 100.13325C 369.6875 100.13325 369.6875 100.13325 369.6875 190.73M 369.6875 100.13325z" pathFrom="M -1 238.4125L -1 238.4125L 61.614583333333336 238.4125L 123.22916666666667 238.4125L 184.84375 238.4125L 246.45833333333334 238.4125L 308.0729166666667 238.4125L 369.6875 238.4125"></path><path id="SvgjsPath17451" d="M 0 138.27925C 21.565104166666668 138.27925 40.04947916666667 95.36500000000001 61.614583333333336 95.36500000000001C 83.1796875 95.36500000000001 101.6640625 133.511 123.22916666666667 133.511C 144.79427083333334 133.511 163.27864583333334 38.146000000000015 184.84375 38.146000000000015C 206.40885416666666 38.146000000000015 224.89322916666669 114.438 246.45833333333334 114.438C 268.0234375 114.438 286.5078125 71.52375 308.0729166666667 71.52375C 329.63802083333337 71.52375 348.12239583333337 100.13325 369.6875 100.13325" fill="none" fill-opacity="1" stroke="#696cff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskqn1ir35x)" pathTo="M 0 138.27925C 21.565104166666668 138.27925 40.04947916666667 95.36500000000001 61.614583333333336 95.36500000000001C 83.1796875 95.36500000000001 101.6640625 133.511 123.22916666666667 133.511C 144.79427083333334 133.511 163.27864583333334 38.146000000000015 184.84375 38.146000000000015C 206.40885416666666 38.146000000000015 224.89322916666669 114.438 246.45833333333334 114.438C 268.0234375 114.438 286.5078125 71.52375 308.0729166666667 71.52375C 329.63802083333337 71.52375 348.12239583333337 100.13325 369.6875 100.13325" pathFrom="M -1 238.4125L -1 238.4125L 61.614583333333336 238.4125L 123.22916666666667 238.4125L 184.84375 238.4125L 246.45833333333334 238.4125L 308.0729166666667 238.4125L 369.6875 238.4125"></path><g id="SvgjsG17431" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG17433" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17434" r="6" cx="0" cy="138.27925" class="apexcharts-marker no-pointer-events wygoh1zj5" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="6"></circle><circle id="SvgjsCircle17435" r="6" cx="61.614583333333336" cy="95.36500000000001" class="apexcharts-marker no-pointer-events w9ecdcva3" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="6"></circle></g><g id="SvgjsG17436" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17437" r="6" cx="123.22916666666667" cy="133.511" class="apexcharts-marker no-pointer-events w1644hab7" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="2" j="2" index="0" default-marker-size="6"></circle></g><g id="SvgjsG17438" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17439" r="6" cx="184.84375" cy="38.146000000000015" class="apexcharts-marker no-pointer-events w5rm4qatq" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="3" j="3" index="0" default-marker-size="6"></circle></g><g id="SvgjsG17440" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17441" r="6" cx="246.45833333333334" cy="114.438" class="apexcharts-marker no-pointer-events wl9fjjr5v" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="4" j="4" index="0" default-marker-size="6"></circle></g><g id="SvgjsG17442" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17443" r="6" cx="308.0729166666667" cy="71.52375" class="apexcharts-marker no-pointer-events wa401dti9" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="5" j="5" index="0" default-marker-size="6"></circle></g><g id="SvgjsG17444" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskqn1ir35x)"><circle id="SvgjsCircle17445" r="6" cx="369.6875" cy="100.13325" class="apexcharts-marker no-pointer-events wetmy46cq" stroke="#696cff" fill="#ffffff" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="6" j="6" index="0" default-marker-size="6"></circle></g></g></g><g id="SvgjsG17432" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine17487" x1="0" y1="0" x2="369.6875" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17488" x1="0" y1="0" x2="369.6875" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG17489" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG17490" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG17491" class="apexcharts-point-annotations"></g><rect id="SvgjsRect17492" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect17493" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect17425" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG17475" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)"><g id="SvgjsG17476" class="apexcharts-yaxis-texts-g"></g></g><g id="SvgjsG17423" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 116px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                                    <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
                                        <div class="flex-shrink-0" style="position: relative;">
                                            <div id="expensesOfWeek" style="min-height: 57.7px;"><div id="apexcharts1jykahqu" class="apexcharts-canvas apexcharts1jykahqu apexcharts-theme-light" style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg17494" width="60" height="57.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG17496" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, -10)"><defs id="SvgjsDefs17495"><clipPath id="gridRectMask1jykahqu"><rect id="SvgjsRect17498" width="86" height="87" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask1jykahqu"></clipPath><clipPath id="nonForecastMask1jykahqu"></clipPath><clipPath id="gridRectMarkerMask1jykahqu"><rect id="SvgjsRect17499" width="84" height="89" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG17500" class="apexcharts-radialbar"><g id="SvgjsG17501"><g id="SvgjsG17502" class="apexcharts-tracks"><g id="SvgjsG17503" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 40 19.336585365853654 A 20.663414634146346 20.663414634146346 0 1 1 39.9963935538176 19.336585680575453" fill="none" fill-opacity="1" stroke="rgba(228,230,232,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.760097560975613" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 40 19.336585365853654 A 20.663414634146346 20.663414634146346 0 1 1 39.9963935538176 19.336585680575453"></path></g></g><g id="SvgjsG17505"><g id="SvgjsG17509" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath17510" d="M 40 19.336585365853654 A 20.663414634146346 20.663414634146346 0 1 1 23.28294639915962 52.1456503839557" fill="none" fill-opacity="0.85" stroke="rgba(105,108,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.907317073170734" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="234" data:value="65" index="0" j="0" data:pathOrig="M 40 19.336585365853654 A 20.663414634146346 20.663414634146346 0 1 1 23.28294639915962 52.1456503839557"></path></g><circle id="SvgjsCircle17506" r="16.283365853658538" cx="40" cy="40" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG17507" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText17508" font-family="Public Sans" x="40" y="45" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#646e78" class="apexcharts-text apexcharts-datalabel-value" style="font-family: &quot;Public Sans&quot;;">$65</text></g></g></g></g><line id="SvgjsLine17511" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine17512" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG17497" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 61px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                                        <div>
                                            <h6 class="mb-0">Income this week</h6>
                                            <small>$39k less than last week</small>
                                        </div>
                                    </div>
                                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 398px; height: 383px;"></div></div><div class="contract-trigger"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-6">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Transactions</h5>
                            <div class="dropdown">
                                <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded bx-lg"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4">
                            <ul class="p-0 m-0">
                                <li class="d-flex align-items-center mb-6">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Paypal</small>
                                            <h6 class="fw-normal mb-0">Send money</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">+82.6</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-6">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Wallet</small>
                                            <h6 class="fw-normal mb-0">Mac'D</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">+270.69</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-6">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Transfer</small>
                                            <h6 class="fw-normal mb-0">Refund</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">+637.91</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-6">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/cc-primary.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Credit Card</small>
                                            <h6 class="fw-normal mb-0">Ordered Food</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">-838.71</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center mb-6">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Wallet</small>
                                            <h6 class="fw-normal mb-0">Starbucks</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">+203.33</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="d-block">Mastercard</small>
                                            <h6 class="fw-normal mb-0">Ordered Food</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="fw-normal mb-0">-92.45</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Transactions -->
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>2024
                        , made with ❤️ by
                        <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link">Support</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>
</body>
@include('dashboard.layouts.core')

