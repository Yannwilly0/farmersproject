@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Add Farmer</h4>
     <p>Admin <label class="dot"> > </label> Farmers Management <label class="dot"> > </label> Farmers <label class="dot"> > </label> Add Farmer</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD FARMER</h5>
        </div>
        <div class="container py-3 mb-3">
          <form method="POST" action="{{route('admin.farmers.registration')}}">
            @csrf
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="NOM"  required style="text-transform: uppercase">
                    
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="PRENOM"  required style="text-transform: uppercase">
                    
                  </div>
                  
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="">Zone</label>
                      <select name="zone" id="zones"  class="form-control" required>
                        @foreach ($data['zones'] as $zone)
                            <option value="{{$zone->id}}">{{$zone->zone}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Localite</label>
                      <input type="text" class="form-control" name="localite" id="localite" placeholder="LOCALITE" required style="text-transform: uppercase">
                     
                    </div>
                    
                  </div>

                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="">Contact</label>
                      <input type="number" class="form-control" id="contact" name="contact" placeholder="CONTACT"  required>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Langue locale</label>
                      <select name="langue" id="languages" class="form-control" required>
                        @foreach ($data['languages'] as $langue)
                            <option value="{{$langue->id}}">{{$langue->langue}}</option>
                        @endforeach
                      </select>
                     
                    </div>
                    
                  </div>


                <div class="form-row">
                  
                  
                 
                </div>
                <div class="form-header text-white mb-4">
                  <h5 class="m-3 text-center p-2"> FARM DETAILS</h5>
              </div>
              <div class="table-responsive">
                <span id="result"></span>
                <table class="table table-bordered table-striped" id="user_table">
              <thead>
               <tr>
                   <th class="text-center">CROP</th>
                   <th class="text-center">CROP SIZE (ha)</th>
                   <th class="text-center">ACTION</th>
                   
                  
               </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
               <tr>
               
               </tr>
              </tfoot>
           </table>
             
           </div>
                <button class="btn btn-success" type="submit">ENREGISTRER</button>
              </form>
        </div>
    </div>
 </div>

 
 <script type="text/javascript">

  $(document).ready(function () {
          
          var count = 1;
          function select_style()
                    {
                        
                    }
                    

          initial_field(count);

          function initial_field(number)
          {
          html = '<tr>';
            html += '<td> <select required class="form-control browser-default custom-select" id="levels_'+number+'" name="crops[]" >@foreach($data['crops'] as $crop)<option value="{{$crop->id}}">{{$crop->crop}}</option>  @endforeach</select></td>';
            html += '<td><input type="number" required class=" form-control browser-default" name="sizes[]" id="classes_'+number+'"></td>';
              if(number > 1)
              {
                  html += '<td style="text-align: center"><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="fa fa-times-circle fa-2x " aria-hidden="true"></i>  </button></td></tr>';
                  $('tbody').append(html);
              }
              else
              {   
                  html += '<td style="text-align: center"><button type="button" name="add" id="add" class="btn btn-success justify-content-center">Ajouter</button></td></tr>';
                  $('tbody').html(html);
              }
              select_style();
            
          }
         
          

          function dynamic_field(number)
          {
          html = '<tr>';
              html += '<td> <select required class="form-control browser-default custom-select" id="levels_'+number+'" name="crops[]" > @foreach($data['crops'] as $crop)<option value="{{$crop->id}}">{{$crop->crop}}</option>  @endforeach</select></td>';
              html += '<td><input type="number" required class=" form-control browser-default" name="sizes[]" id="classes_'+number+'"></td>';
          
              if(number > 1)
              {
                  html += '<td style="text-align: center"><button type="button" name="remove" id="" class="btn btn-danger remove"><i class="fa fa-times-circle fa-2x " aria-hidden="true"></i>  </button></td></tr>';
                  $('tbody').append(html);
              }
              else
              {   
                  html += '<td style="text-align: center"><button type="button" name="add" id="add" class="btn btn-success">Ajouter</button></td></tr>';
                  $('tbody').html(html);
              }
              select_style();
            
          }
          select_style();
          $(document).on('click', '#add', function(){
          count=count+1;
          dynamic_field(count);
          });

          $(document).on('click', '.remove', function(){
          count--;
          $(this).closest("tr").remove();
          });
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