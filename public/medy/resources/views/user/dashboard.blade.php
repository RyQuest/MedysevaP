@extends('layouts.partner')
@section('content')
<div class="col-lg-12">
                    <section class="box nobox marginBottom0">
                        <div class="content-body">
                            <div class="row">
                               
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <!-- <i class="pull-left ico-icon icon-md icon-primary mt-10">
                                            <img src="data/icons/hos-icon-so1.png" class="ico-icon-o" alt="">
                                        </i> -->
                                        <i class="pull-left ico-icon icon-md icon-primary mt-10 fa fa-hospital-o" aria-hidden="true"></i>
                                        <div class="stats">
                                            <h3 class="mb-5">{{$todayPatient}}</h3>
                                            <span>Today's patients </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                         <i class="pull-left ico-icon icon-md icon-primary mt-10 fa fa-user" aria-hidden="true"></i>
                                        <div class="stats">
                                            <h3 class="mb-5">{{$totalPatient}}</h3>
                                            <span>Total patients</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                         <i class="pull-left ico-icon icon-md icon-primary mt-10 fa fa-user" aria-hidden="true"></i>
                                        <div class="stats">
                                            <h3 class="mb-5">{{$vleUser}}</h3>
                                            <span>Total no. of VLE</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                         <i class="pull-left ico-icon icon-md icon-primary mt-10 fa fa-money" aria-hidden="true"></i>
                                        <div class="stats">
                                            <h3 class="mb-5">{{$userWallet->amount}}</h3>
                                            <span>Total NICT Commission</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- End .row -->
                        </div>
                    </section>
                </div>

                <div class="clearfix"></div>
                <!-- MAIN CONTENT AREA STARTS -->

                <div class="col-lg-8">
                   <section class="box">
                        <header class="panel_header">
                            <h2 class="title pull-left">Pending Payments Queue</h2>
                            <!--<div class="actions panel_actions pull-right">
                                <a class="box_toggle fa fa-chevron-down"></a>
                                <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>
                                <a class="box_close fa fa-times"></a>
                            </div>-->
                        </header>
                        <div class="content-body recent-pay-box">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table vm table-small-font no-mb table-bordered table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Patient</th>
                                                    <th>Vle Center</th>
                                                    <th>Bill Paid</th>
                                                    <th>NICT Commision</th>
                                                    <th>VLE Comission</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dueInvoice as $key => $value)
                                                <tr>
                                                    <td>
                                                        <div class="round">{{substr($value->pt_name, 0, 1)}}</div>
                                                        <div class="designer-info">
                                                            <h6>{{$value->pt_name}}</h6>
                                                            <small class="text-muted">{{$value->sex == 1 ? "Male" :"Female"}}, 34 Years</small>
                                                        </div>
                                                    </td>
                                                    <td>{{$value->chamber_name}}</td>
                                                    <td>
                                                        <?php
                                                            $total = $value->total;
                                                            $discountPercent = $value->discount ? $value->discount : 0;
                                                            $discountAmt = ($total * $discountPercent ) / 100;
                                                            $total = $total - $discountAmt;
                                                        ?>
                                                        {{$total}}
                                                        </td>
                                                    <td>{{$value->partner_comission($total)}}</td>
                                                    <td>{{$value->vle_comission($total)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-4">
                    <section class="box ">
                        <div class="content-body p">
                            <div class="row">
                                <div class="doctors-list relative">
                                    <div class="doctors-head text-center">
                                        <h3 class="header w-text relative bold">VLE List</h3>
                                        <p class="desc g-text relative">Vle List</p>
                                    </div>
                                    @foreach($vle as $key => $value)
                                    @if($key < 2)
                                    <div class="doctor-card has-shadow">
                                        <div class="doc-info-wrap">
                                            <div class="doctor-img">
                                                <img src="assets/images/user.png" alt="">
                                            </div>
                                            <div class="doc-info">
                                                <h4 class="bold">{{$value->name}}</h4>
                                                <h5>{{$value->chamber_name}}</h5>
                                                <!--<div class="doc-rating">-->
                                                <!--    <i class="fa fa-star"></i>-->
                                                <!--    <i class="fa fa-star"></i>-->
                                                <!--    <i class="fa fa-star"></i>-->
                                                <!--    <i class="fa fa-star"></i>-->
                                                <!--    <i class="fa fa-star"></i>-->
                                                <!--    <span>4.8</span>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--<div class="doctor-card has-shadow mb-0">-->
                                    <!--    <div class="doc-info-wrap">-->
                                    <!--        <div class="doctor-img">-->
                                    <!--            <img src="assets/images/user.png" alt="">-->
                                    <!--        </div>-->
                                    <!--        <div class="doc-info">-->
                                    <!--            <h4 class="bold">Peter Radofln</h4>-->
                                    <!--            <h5>Village Level Entrepreneur(VLE)</h5>-->
                                    <!--            <div class="doc-rating">-->
                                    <!--                <i class="fa fa-star"></i>-->
                                    <!--                <i class="fa fa-star"></i>-->
                                    <!--                <i class="fa fa-star"></i>-->
                                    <!--                <i class="fa fa-star"></i>-->
                                    <!--                <i class="fa fa-star-half"></i>-->
                                    <!--                <span>4.5</span>-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <div class="form-group no-mb">
                                        <a href="/vle" type="button" class="btn btn-primary btn-lg mt-20 gradient-blue" style="width:100%"> View all VLE</a>
                                    </div>

                                </div>
                               
                            </div>
                        </div>
                    </section>
                </div>

                <div class="clearfix"></div>

               

            <div class="col-lg-8">
                 <section class="box" style="overflow:hidden">
                        <header class="panel_header">
                            <h2 class="title pull-left">Clinic Visit Statistics</h2>
                            <!--<div class="actions panel_actions pull-right">-->
                            <!--    <a class="box_toggle fa fa-chevron-down"></a>-->
                            <!--    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
                            <!--    <a class="box_close fa fa-times"></a>-->
                            <!--</div>-->
                        </header>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="demoarea-chart">
                                        <!--<div id="demoarea-container" style="width: 100%;height:330px; text-align: center; margin:0 auto;"></div>-->
                                        <canvas id="myChartPatient" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                </div>

             <div class="col-xs-12 col-md-6 col-lg-4">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title pull-left">Recent Visits</h2>
                            <!--<div class="actions panel_actions pull-right">-->
                            <!--    <a class="box_toggle fa fa-chevron-down"></a>-->
                            <!--    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
                            <!--    <a class="box_close fa fa-times"></a>-->
                            <!--</div>-->
                        </header>
                        <div class="content-body">    
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="project-activity list-unstyled mb-0">
                                        <?php 
                                        $listColors = array('warning','info','success','danger');
                                        ?>
                                        @foreach($recentVisit as $key => $value)
                                        <?php 
                                            $listColor = $listColors[rand(0, count($listColors) - 1)];
                                        ?>
                                        <li class="activity-list {{$listColor}}">
                                            <div class="detail-info">
                                                <div class="doc-img-con pull-left mr-10">
                                                    <img src="assets/images/user.png" width="80" alt="">
                                                </div>
                                                <div class="visit-doc">
                                                    <p class="message">
                                                        <span class="text-info bold"></span> {{$value->doctor_name}}
                                                    </p>
                                                    <small class="text-muted">
                                                        {{$value->investigation}}
                                                    </small>
                                                </div>
                                                <div class="visit-date pull-right">
                                                    <p class="mb-0">{{date('d M',strtotime($value->created_at))}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>      
                            </div> <!-- End .row -->
                        </div>
                    </section>
                </div>

            
                <div class="clearfix"></div>

                
           <div class="col-xs-12 col-md-6 col-lg-6">
                    <section class="box ">
                        <header class="panel_header graph-header">
                            <h2 class="title pull-left">NICT Commision Graph</h2>
                            <!--<div>-->
                            <!--    <select class="form-control">-->
                            <!--        <option>Select City</option>-->
                            <!--        <option>1</option>-->
                            <!--        <option>1</option>-->
                            <!--        <option>1</option>-->
                            <!--    </select>-->
                            <!--</div>-->
                            <!--<div class="actions panel_actions pull-right">-->
                            <!--    <a class="box_toggle fa fa-chevron-down"></a>-->
                            <!--    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
                            <!--    <a class="box_close fa fa-times"></a>-->
                            <!--</div>-->
                        </header>
                        <div class="content-body">    
                            <div class="row">
                                <div class="col-xs-12">
                                      <div class="chart-container">
                                          <!--<div class="" style="height:200px" id="user_type"></div>-->
                                          <canvas id="myChart" width="400" height="200"></canvas>
                                      </div>
                                </div>      
                            </div> <!-- End .row -->
                        </div>
                    </section>
                </div>



            <div class="col-xs-12 col-md-6 col-lg-6">
                <section class="box ">
                    <header class="panel_header graph-header">
                        <h2 class="title pull-left">VLE Commission</h2>
                        <div>
                                <select class="form-control vleGraphChange">
                                    <option>Select Vle</option>
                                    @foreach($vle as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!--<div class="actions panel_actions pull-right">-->
                        <!--    <a class="box_toggle fa fa-chevron-down"></a>-->
                        <!--    <a class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></a>-->
                        <!--    <a class="box_close fa fa-times"></a>-->
                        <!--</div>-->
                    </header>
                    <div class="content-body">    
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="chart-container">
                                    <!--<div class="" style="height:200px" id="browser_type"></div>-->
                                    <canvas id="VleChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
                

            <div class="clearfix"></div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
let months = '<?php echo json_encode($months)?>';
months = JSON.parse(months);
let comission = '<?php echo json_encode(array_values($nictComission))?>';
comission = JSON.parse(comission);

const myChartPatientCtx = document.getElementById('myChartPatient').getContext('2d');
let patientGraphDay = '<?php echo json_encode($patientGraphDay)?>';
patientGraphDay = JSON.parse(patientGraphDay);
let patientGraph = '<?php echo json_encode(array_values($patientGraph))?>';
patientGraph = JSON.parse(patientGraph);

const VleChartCtx = document.getElementById('VleChart').getContext('2d');
let vleGraph = '<?php echo json_encode(array_values($vleComission))?>';
vleGraph = JSON.parse(vleGraph);
let myChart2;
drawVleGraph(months,vleGraph);

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: '# Comission',
            data: comission,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: true
        }
      }]
    }
    }
});


const myChart1 = new Chart(myChartPatientCtx, {
    type: 'line',
    data: {
        labels: patientGraphDay,
        datasets: [{
            label: '# Patient',
            data: patientGraph,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: true
        }
      }]
    }
    }
});


function drawVleGraph(label,data){
     myChart2= new Chart(VleChartCtx, {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: '# Comission',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: true
        }
      }]
    }
    }
}); 
}

$("body").on('change',".vleGraphChange",function(){
    var id = $(this).val();
    $.ajax({
        "type":"get",
        "url":"/dashboard/vle-graph",
        "data":{id:id},
        "dataType":"json",
        success:function(data){
            let dt = data.data;
            myChart2.destroy();
            drawVleGraph(months,dt);
        }
    });
})
</script>
@endsection