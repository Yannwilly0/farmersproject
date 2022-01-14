@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Edit Farmer</h4>
     <p>Admin <label class="dot"> > </label> Farmers Management <label class="dot"> > </label> Farmers <label class="dot"> > </label> Edit Farmer</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-plus-circle" aria-hidden="true"></i> EDIT FARMER</h5>
        </div>
        <div class="container py-3 mb-3">
          <form method="POST" action="{{url('/admin/farmer/'.$data['farmer']->id.'/edit/post')}}" >
            @csrf
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="NOM" value="{{$data['farmer']->nom}}" required style="text-transform: uppercase">
                    
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="PRENOM"  value="{{$data['farmer']->prenom}}"  required style="text-transform: uppercase">
                    
                  </div>
                  
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="">Zone</label>
                      <select name="zone" id="zones"  class="form-control" required>
                        @foreach ($data['zones'] as $zone)
                            <option value="{{$zone->id}}" {{$data['farmer']->zone_id == $zone->id ? 'selected':''}}>{{$zone->zone}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Localite</label>
                      <input type="text" class="form-control" name="localite" id="localite"  value="{{$data['farmer']->localite}}" placeholder="LOCALITE" required style="text-transform: uppercase">
                     
                    </div>
                    
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="">Contact</label>
                      <input type="number" class="form-control" id="contact" name="contact" placeholder="CONTACT"  value="{{$data['farmer']->contact}}"  required>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Langue locale</label>
                      <select name="langue" id="languages" class="form-control" required>
                        @foreach ($data['languages'] as $langue)
                            <option value="{{$langue->id}}" {{$data['farmer']->langauge_id == $langue->id ? 'selected':''}}>{{$langue->langue}}</option>
                        @endforeach
                      </select>
                     
                    </div>
                    
                  </div>


                <div class="form-row">
                  
                  
                 
                </div>
               
                <button class="btn btn-success" type="submit">SAUVEGARDER</button>
              </form>
        </div>
    </div>
 </div>

 
 <script type="text/javascript">

  $(document).ready(function () {
          
         
          $('#localite').focusout(function() {
              // Uppercase-ize contents
              this.value = this.value.toLocaleUpperCase();
          });
          $('#nom').focusout(function() {
              // Uppercase-ize contents
              this.value = this.value.toLocaleUpperCase();
          });
          $('#prenom').focusout(function() {
              // Uppercase-ize contents
              this.value = this.value.toLocaleUpperCase();
          });
         
      });

  </script>


@endsection