@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Admin Profil</h4>
     <p>Admin <label class="dot"> > </label> Admins Management <label class="dot"> > </label> Admins <label class="dot"> > </label> Profil</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-copy" aria-hidden="true"></i> ADMIN PROFIL</h5>
        </div>
        <div class="container py-3 mb-3">
            <div class="row">
                <div class="col-md-6">
                    <img class="" src="{{url('storage/admins/profil_images/'.$data['admin']->profil)}}" alt="Admin image" width="250" height="250" id="uploaded">
                </div>
                <div class="col-md-6">
                    <p class="lead text-primary">{{$data['admin']->nom}} {{$data['admin']->prenom}}</p>
                    <p class="lead">Role: {{$data['admin']->position}} - {{$data['admin']->department}}</p>
                    <p class="lead">Email: {{$data['admin']->email}}</p>
                    <p class="lead">Contact:  {{$data['admin']->contact}}</p>
                    <p class="lead">Status:  <label class="{{$data['admin']->status == 1 ? 'text-success' : 'text-danger'}}">{{$data['admin']->status_text}}</label></p>
                    <p class="lead">Last login: {{$data['admin']->last_login}}</p>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection