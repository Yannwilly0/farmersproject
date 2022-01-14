@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Add User</h4>
     <p>Admin <label class="dot"> > </label> Users Management <label class="dot"> > </label> Users <label class="dot"> > </label> Add User</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-plus-circle" aria-hidden="true"></i> ADD USER</h5>
        </div>
        <div class="container py-3 mb-3">
          <form method="POST" action="{{route('admin.users.registration')}}" enctype="multipart/form-data">
            @csrf
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="">NOM</label>
                  <input type="text" name="nom" class="form-control" placeholder="NOM" required>
                 
                </div>
                <div class="col-md-6 mb-3">
                  <label for="">PRENOM</label>
                  <input type="text" name="prenom" class="form-control" placeholder="PRENOM"  required>
                  
                </div>
                
              </div>
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="">DEPARTMENT</label>
                   
                    <select name="departement" class="form-control" required >
                      @foreach ($data['departments'] as $department)
                          <option value="{{$department->id}}">{{$department->department}}</option>
                      @endforeach
                    </select>
                    
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">ROLE</label>
                    <input type="text" name="position" id="position" class="form-control"  placeholder="ROLE"  required style="text-transform: uppercase">
                   
                  </div>
                  
                </div>


              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="">EMAIL</label>
                  <input type="email" class="form-control"  placeholder="ADDRESSE EMAIL" name="email" required>
                  
                </div>
                <div class="col-md-6 mb-3">
                  <label for="">CONTACT</label>
                  <input type="text" class="form-control"  placeholder="CONTACT" name="contact"  required>
                  
                </div>
               
              </div>
              <div class="form-row">
                
                <div class="col-md-6 mb-3">
                  <label for="">Profil Picture</label>
                  <div class="card border-0" style="width: 13rem;">
                      <img class="card-img-top" src="{{asset('images/default-user-icon-profile.png')}}" alt="Card image cap" width="50" height="200" id="uploaded">
                      <div class="card-body">
                        
                        <input type="file" class="form-control w-80" name="profil" required  onchange="readURL(this);" accept=".jpg,.png,.jpeg,.svg">
                      </div>
                    </div>
                </div>
               
              </div>
              <button class="btn btn-success" type="submit">ENREGISTRER</button>
            </form>
      </div>
  </div>
</div>
<script>
     function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#uploaded')
                      .attr('src', e.target.result);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }

      $(function() {
        $('#position').focusout(function() {
            // Uppercase-ize contents
            this.value = this.value.toLocaleUpperCase();
        });
});
</script>


@endsection