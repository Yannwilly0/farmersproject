@extends('admin.nav')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid py-2">
     <h4 class="lead">Edit User</h4>
     <p>User <label class="dot"> > </label> Users Management <label class="dot"> > </label> Users <label class="dot"> > </label> Edit User</p>
    <div class="card list-card">
        <div class="form-header text-white">
            <h5 class="m-3"> <i class="fa fa-pen" aria-hidden="true"></i> EDIT USER ACCOUNT</h5>
        </div>
        <div class="container py-3 mb-3">
            <form method="POST" action="{{url('/admin/users/user/'.$data['user']->id.'/edit/post')}}" enctype="multipart/form-data">
              @csrf
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="">NOM</label>
                    <input type="text" name="nom" class="form-control" placeholder="NOM" value="{{$data['user']->nom}}" required>
                   
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">PRENOM</label>
                    <input type="text" name="prenom" class="form-control" placeholder="PRENOM" value="{{$data['user']->prenom}}"  required>
                    
                  </div>
                  
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="">DEPARTMENT</label>
                     
                      <select name="departement" class="form-control" required >
                        @foreach ($data['departments'] as $department)
                            <option value="{{$department->id}}" {{$data['user']->dep_id == $department->id ? 'selected':''}}>{{$department->department}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">ROLE</label>
                      <input type="text" name="position" id="position" class="form-control"  placeholder="ROLE" value="{{$data['user']->position}}"  required style="text-transform: uppercase">
                     
                    </div>
                    
                  </div>


                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="">EMAIL</label>
                    <input type="email" class="form-control"  placeholder="ADDRESSE EMAIL" name="email" value="{{$data['user']->email}}" required>
                    
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">CONTACT</label>
                    <input type="text" class="form-control"  placeholder="CONTACT" name="contact" value="{{$data['user']->contact}}"  required>
                    <input type="hidden" name="old_profil" value="{{$data['user']->profil}}">
                  </div>
                 
                </div>
                <div class="form-row">
                  
                  <div class="col-md-6 mb-3">
                    <label for="">Profil Picture</label>
                    <div class="card border-0" style="width: 13rem;">
                        <img class="card-img-top" src="{{url('storage/users/profil_images/'.$data['user']->profil)}}" alt="User image" width="50" height="200" id="uploaded">
                        <div class="card-body">
                          
                         
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