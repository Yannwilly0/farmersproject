@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
  <h4 class="lead">Daily Reports</h4>
     <p>Admin <label class="dot"> > </label> Reports <label class="dot"> > </label> <a href="{{route('admin.reports.daily.dates')}}">Daily</a> <label class="dot"> > </label> {{$data['date']}} </p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">NOM</th>
                   <th scope="col">DEPARTEMENT</th>
                   <th scope="col">ROLE</th>
                   <th scope="col">PLANNED ACTIVITIES</th>
                   <th scope="col">COMPLETED ACTIVITIES</th>
                   
                   
                 </tr>
               </thead>
               <tbody>
                  @foreach ($data['reports'] as $daily)
                  <tr>
                    <th scope="row">{{$daily->nom}} {{$daily->prenom}}</th>
                    <td>{{$daily->department}}</td>
                    <td>{{$daily->position}}</td>
                    <td>{{$daily->activities}}</td>
                    <td>{{$daily->observations}}</td>
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