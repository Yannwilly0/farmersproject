@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
  <h4 class="lead">Daily Reports</h4>
     <p>Admin <label class="dot"> > </label> <a href="{{route('admin.demonstrations.dates')}}">Demonstrations </a> <label class="dot"> > </label>{{$data['date']}} </p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">ZONE</th>
                   <th scope="col">PLACE</th>
                   <th scope="col">STAFF</th>
                   <th scope="col">FARMER</th>
                   <th scope="col">FARMER CONTACT</th>
                   <th scope="col">CROP</th>
                   <th scope="col">PRODUCT</th>
                   
                   
                 </tr>
               </thead>
               <tbody>
                
                  @foreach ($data['demonstrations'] as $demonstration)
                  <tr>
                    
                    <td>{{$demonstration->zone}}</td>
                    <td>{{$demonstration->place}}</td>
                    <th scope="row">{{$demonstration->nom}} {{$demonstration->prenom}}</th>
                    <td>{{$demonstration->farmer}}</td>
                    <td>{{$demonstration->farmer_contact}}</td>
                    <td>{{$demonstration->crop}}</td>
                    <td>{{$demonstration->product}}</td>
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