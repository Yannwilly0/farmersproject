@extends('admin.nav')

@section('content')

    <div class="container-fluid mt-5">
        <div class="dashboard-cards">
            <div class="row justify-content-center">
                <div class="col-md-3">
                <div class="card-counter primary">
                    <img src="https://img.icons8.com/external-ddara-lineal-color-ddara/60/000000/external-farmer-professions-ddara-lineal-color-ddara.png"/>
                    <span class="count-numbers">{{$data['summary']->farmers}}</span>
                    <span class="count-name">Total Farmers</span>
                </div>
                </div>
    
                <div class="col-md-3">
                <div class="card-counter danger">
                    <img src="https://img.icons8.com/color/60/000000/tractor.png"/>
                    <span class="count-numbers">{{$data['summary']->crops}}</span>
                    <span class="count-name">Total Crops</span>
                </div>
                </div>
    
                <div class="col-md-3">
                <div class="card-counter success">
                    <img src="https://img.icons8.com/external-itim2101-flat-itim2101/60/000000/external-time-zone-time-management-itim2101-flat-itim2101.png"/>
                    <span class="count-numbers">{{$data['summary']->zones}}</span>
                    <span class="count-name">Zones</span>
                </div>
                </div>
    
               
            </div>
        <!--graph -->
       
        <!-- row cards -->
        <div class="row">
            
            
            <div class="col-md-8 col-12">
                <div class="card mb-3 mt-5 graph-chart p-3" style="height: 31rem;">
                  
                    <div class="card-body">
                        <canvas id="histogram" width="800" height="400"></canvas>
                    </div>
                    <div class="card-footer small text-muted text-center">Zones</div>
                
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card mb-3 mt-5 graph-chart ">
                  
                    <div class="card-body">
                        <canvas id="myChart" width="350" height="400"></canvas>
                    </div>
                    <div class="card-footer small text-muted">percentage of crops</div>
                
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3 mt-5 ">
                    
                    <canvas id="line-chart" width="0" height="0"></canvas>
                    
                  </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">
        var crop_name = <?php echo json_encode($data['crop_name']);?>;
        var crop_value = <?php echo json_encode($data['crop_value']);?>;
        var zone_name = <?php echo json_encode($data['zone_name']);?>;
        var zone_value = <?php echo json_encode($data['zone_value']);?>;
    </script>

    
@endsection

