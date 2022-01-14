@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Login Details</h4>
     <p>Admin <label class="dot"> > </label> Users Management <label class="dot"> > </label> Users <label class="dot"> > </label> Login details</p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
         
          <table class="table table-striped " id="users">
            <thead>
              <tr>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">LAST LOGIN</th>
                <th scope="col">IP ADDRESSE</th>
                <th scope="col">BROWSER DETAILS</th>
               
                
              </tr>
            </thead>
            <tbody>
             @foreach ($data['users'] as $user)
               <tr>
                 <th scope="row">{{$user->nom}}</th>
                 <td>{{$user->prenom}}</td>
                 <td>{{$user->last_login}}</td>
                 <td>{{$user->ip_address}}</td>
                 <td>{{$user->login_details}}</td>

               </tr>
             @endforeach
              
            </tbody>
          </table>
        </div>
    </div>
 </div>

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