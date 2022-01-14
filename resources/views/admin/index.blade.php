@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-5">

    <div class="row  justify-content-center">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold h4  text-uppercase mb-1">
                                TOTAL FARMERS</div>
                            <div class="h1 mb-0 font-weight-bold "></div>
                        </div>
                        <div class="col-auto">
                            <img src="https://img.icons8.com/external-ddara-lineal-color-ddara/60/000000/external-farmer-professions-ddara-lineal-color-ddara.png"/>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <h2 class="text-danger">{{$data['summary']->farmers}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold h4 text-uppercase mb-1">
                                TOTAL CROPS</div>
                            <div class="h1 mb-0 font-weight-bold "></div>
                        </div>
                        <div class="col-auto">
                            <img src="https://img.icons8.com/color/60/000000/tractor.png"/>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <h2 class="text-danger">{{$data['summary']->crops}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card  shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold h4 text-uppercase mb-1">
                                TOTAL USERS</div>
                            <div class="h1 mb-0 font-weight-bold "></div>
                        </div>
                        
                        <div class="col-auto">
                            <img src="https://img.icons8.com/officel/60/000000/select-users.png"/>
                        </div>
                        
                    </div>
                    <div class="row no-gutters align-items-center">
                        <h2 class="text-danger">{{$data['summary']->users}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  
</div>

@endsection