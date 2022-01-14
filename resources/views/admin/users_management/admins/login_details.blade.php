@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Login Details</h4>
     <p>Admin <label class="dot"> > </label> Admins Management <label class="dot"> > </label> Admins <label class="dot"> > </label> Login details</p>
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
                @foreach ($data['admins'] as $admin)
                  <tr>
                    <th scope="row">{{$admin->nom}}</th>
                    <td>{{$admin->prenom}}</td>
                    <td>{{$admin->last_login}}</td>
                    <td>{{$admin->ip_address}}</td>
                    <td>{{$admin->login_details}}</td>

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
             "columnDefs": [{ "width": "40%", "targets": 4 }],
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                 }
         });
 
            
 });
 </script>

@endsection