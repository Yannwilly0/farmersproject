@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">User Profil</h4>
     <p>User <label class="dot"> > </label> Users Management <label class="dot"> > </label> Users <label class="dot"> > </label> Profil</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-copy" aria-hidden="true"></i> USER PROFIL</h5>
        </div>
        <div class="container py-3 mb-3">
            <div class="row">
                <div class="col-md-6">
                    <img class="" src="{{url('storage/users/profil_images/'.$data['user']->profil)}}" alt="User image" width="250" height="250" id="uploaded">
                </div>
                <div class="col-md-6">
                    <p class="lead text-primary">{{$data['user']->nom}} {{$data['user']->prenom}}</p>
                    <p class="lead">Role: {{$data['user']->position}} - {{$data['user']->department}}</p>
                    <p class="lead">Email: {{$data['user']->email}}</p>
                    <p class="lead">Contact:  {{$data['user']->contact}}</p>
                    <p class="lead">Status:  <label class="{{$data['user']->status == 1 ? 'text-success' : 'text-danger'}}">{{$data['user']->status_text}}</label></p>
                    <p class="lead">Last login: {{$data['user']->last_login}}</p>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection