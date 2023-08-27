<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        label{
            display:inline-block;
            width:200px;
        }
    </style>
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.slidebar')
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top:70px">
            @if(session()->has('message'))
            <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">
             x
            </button>
            {{session()->get('message')}}
       
        </div>
        @endif
            
            <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:15px">
                    <label for="">Doctor name: </label>
                    <input type="text" name="name" value="{{$data->name}}" style="color:black">
                </div>
                <div style="padding:15px">
                    <label for="">Phone: </label>
                    <input type="text" name="number" value="{{$data->phone}}" style="color:black">
                </div>
                <div style="padding:15px">
                    <label for="">Speciality: </label>
                    <select style="color:black; width:200px;" name="speciality" required="">
                    <option value='{{$data->Speciality}}'>{{$data->Speciality}}</option>
                    <option value='heart'>heart</option>
                    <option value='brain'>brain</option>
                    <option value='skin'>skin</option>
                    <option value='eye'>eye</option>
                    <option value='teeth'>teeth</option>
                    <option value='mental'>mental</option>
                    <option value='phyciology'>phyciology</option>
                </select>
                </div>
                <div style="padding:15px">
                    <label for="">Room no: </label>
                    <input type="text" name="room" value="{{$data->room}}" style="color:black">
                </div>
                <div style="padding:15px">
                <label for="">Old image: </label>
                    <img src="doctorimage/{{$data->image}}" alt="" height="100px" width="100px">
                </div>
                <div style="padding:15px">
                <label for="">Change image:</label>
                <input type="file" name="file">

                </div>
                <div style="padding:15px"><input type="submit" class="btn btn-primary"></div>
            </form>

            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>
