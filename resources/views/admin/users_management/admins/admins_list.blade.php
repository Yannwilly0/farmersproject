@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Manage Admins</h4>
     <p>Admin <label class="dot"> > </label> Admins Management <label class="dot"> > </label> Admins <label class="dot"> > </label> Manage Admins</p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">NOM</th>
                   <th scope="col">PRENOM</th>
                   <th scope="col">DEPARTEMENT</th>
                   <th scope="col">ROLE</th>
                   <th scope="col">STATUS</th>
                   <th scope="col">ACTION</th>
                   
                 </tr>
               </thead>
               <tbody>
                @foreach ($data['admins'] as $admin)
                  <tr>
                    <th scope="row">{{$admin->nom}}</th>
                    <td>{{$admin->prenom}}</td>
                    <td>{{$admin->department}}</td>
                    <td>{{$admin->position}}</td>
                    <td class="{{$admin->status == 1 ? 'text-success' : 'text-danger'}}">{{$admin->status_text}}</td>
                    <td> <a href="{{url('/admin/admins/admin/'.$admin->id.'/edit')}}"><i class="fa fa-pen bg-yellow" aria-hidden="true"></i></a>  <a href="{{url('/admin/admins/admin/'.$admin->id.'/profil')}}"><i class="far fa-copy bg-blue"></i></a> <a href="{{url('/admin/admins/admin/'.$admin->id.'/update/status')}}" onclick="return confirm_alert(this);"><i class="fa fa-lock {{$admin->status == 1 ? 'bg-red' : 'bg-green'}}" aria-hidden="true"></i></a></td>
                    
                  </tr>
                @endforeach
               </tbody>
             </table>
        </div>
    </div>
 </div>

 <script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Are you sure you want to change this account status ?");
  }
  </script>

 <script type="text/javascript">
   
    $(document).ready(function(){
      
     
     var table = $('#users').DataTable({ 
                 select: false,
             "iDisplayLength": 50, 
             "columnDefs": [],
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                 }
         });
 
            
 });
 </script>

@endsection