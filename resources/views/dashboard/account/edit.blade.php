<x-layout-app title="edit foto profile">
  
    <div class="card mt-5 w-50" style="margin-left: 20px">
        <div class="card-body">

          <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="image" class="form-label">Edit Photo Profile</label>
                <input  class="form-control" name="image_profile" type="file" id="image">
                <img id="showImage" src="{{asset('assets/img/'.Auth::user()->image_profile)}}" width="100px" style="margin-top: 20px" alt="">
              </div>
              <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            
        </div>
      </div>





      <script>
        $(document).ready(function(){
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });
      </script>
</x-layout-app>