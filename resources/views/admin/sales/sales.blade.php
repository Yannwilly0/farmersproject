@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
  <h4 class="lead">Daily Reports</h4>
     <p>Admin <label class="dot"> > </label> <a href="{{route('admin.sales.dates')}}">Sales </a> <label class="dot"> > </label>{{$data['date']}} </p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">VENDEUR</th>
                   <th scope="col">PRODUIT</th>
                   <th scope="col">CARTONS</th>
                   <th scope="col">OBSERVATIONS</th>
                           
                 </tr>
               </thead>
               <tbody>
                
                  @foreach ($data['sales'] as $sale)
                  <tr>
                    
                    <td>{{$sale->nom}} {{$sale->prenom}}</td>
                    <td>{{$sale->product}}</td>
                    <td>{{$sale->cartons}}</td>
                    <td>{{$sale->observations}}</td>
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