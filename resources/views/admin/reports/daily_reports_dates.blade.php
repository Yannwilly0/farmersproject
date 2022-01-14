@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Daily Reports</h4>
     <p>Admin <label class="dot"> > </label> Reports <label class="dot"> > </label> Daily </p>
    <div class="card list-card py-4">
      
        <div class="container-fluid mb-3">
          <a class="h5 text-success text-decoration-none" href="#"> <i class="fa fa-download" aria-hidden="true"></i> EXPORT</a>
           <table class="table table-striped " id="users">
               <thead>
                 <tr>
                   <th scope="col">DATE</th>
                 
                   <th scope="col">CONSULTER</th>
                  
                   
                 </tr>
               </thead>
               <tbody>
                 @foreach ($data['dates'] as $date)
                  <tr>
                    <th scope="row">{{$date->date}}</th>
                    <td><a class="ml-3" href="{{url('/admin/report/daily/'.$date->date)}}">consulter</a></td>
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