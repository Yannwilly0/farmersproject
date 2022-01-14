@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Admin Profil</h4>
     <p>Admin <label class="dot"> > </label> Farmers Management <label class="dot"> > </label> Farmers <label class="dot"> > </label> Profil</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-copy" aria-hidden="true"></i> FARMER PROFIL</h5>
        </div>
        <div class="container py-3 mb-3">
            <h3 class="text-center text-secondary">{{$data['farmer']->nom}} {{$data['farmer']->prenom}}</h3>
            <div class="row mt-5">
                <div class="col-md-4">
                    <h5>FARMER INFOS</h5>
                    <p class="lead">Zone:  {{$data['farmer']->zone}}</p>
                    <p class="lead">Localite:  {{$data['farmer']->localite}}</p>
                    <p class="lead">Contact:  {{$data['farmer']->contact}}</p>
                    <p class="lead">Langue:  {{$data['farmer']->langue}}</p>
                </div>
                <div class="col-md-4">
                    <h5>CROPS INFO</h5>
                    @foreach ($data['crops'] as $crop)
                    <p class="lead">{{$crop->crop}} : {{$crop->crop_size}} Ha</p>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h5>ACCOUNT</h5>
                    <p class="lead">Added on:  {{$data['farmer']->created_at}}</p>
                    <p class="lead">Added by:  {{$data['creator']->nom}} {{$data['creator']->prenom}} [{{$data['farmer']->creator}}]</p>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection