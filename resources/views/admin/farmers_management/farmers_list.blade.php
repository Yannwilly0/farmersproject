@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Users List</h4>
     <p>Admin <label class="dot"> > </label> Farmers Management <label class="dot"> > </label> Farmers <label class="dot"> > </label> Manage Farmers</p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">NOM</th>
                   <th scope="col">PRENOM</th>
                   <th scope="col">ZONE</th>
                   <th scope="col">LOCALITE</th>
                   <th scope="col">CONTACT</th>
                   <th scope="col">CULTURES</th>
                   <th scope="col">ACTION</th>
                   
                 </tr>
               </thead>
               <tbody>
                @foreach ($data['farmers'] as $farmer)
                <tr>
                  <td>{{$farmer->nom}}</td>
                  <td>{{$farmer->prenom}}</td>
                  <td>{{$farmer->zone}}</td>
                  <td>{{$farmer->localite}}</td>
                  <td>{{$farmer->contact}}</td>
                  <th class=""><label class="digit"></label>{{$farmer->count}}</th>
                  <td> <a href="{{url('/admin/farmer/'.$farmer->id.'/edit')}}"><i class="fa fa-pen bg-yellow" aria-hidden="true"></i></a>  <a href="{{url('/admin/farmer/'.$farmer->id.'/profil')}}"><i class="far fa-copy bg-blue"></i></a></td>
                  
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