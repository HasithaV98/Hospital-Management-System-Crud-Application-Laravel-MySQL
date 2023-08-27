<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        label{
            display:inline-block;
            width:200px;
            font-size:18px;
        }
    </style>
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
        <div class="container" align="center" style="padding-top:80px; padding-right:50px;">
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
            x
          </button>
          {{session()->get('message')}}
       
        </div>
        @endif
            <form method="POST" action="{{url('upload_doctor')}}" enctype="multipart/form-data">
                @csrf
                <div style="padding:15px;">
                <label>Doctor Name :</label>
                <input type="text" name="name" placeholder="Enter name" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;">
                <label>Phone Number :</label>
                <input type="text" name="phone" placeholder="Enter phone number" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;" >
                <label>Speciality :</label>
                <select style="color:black; width:200px;" name="speciality" required="">
                    <option value=''>--select--</option>
                    <option value='heart'>heart</option>
                    <option value='brain'>brain</option>
                    <option value='skin'>skin</option>
                    <option value='eye'>eye</option>
                    <option value='teeth'>teeth</option>
                    <option value='mental'>mental</option>
                    <option value='phyciology'>phyciology</option>
                </select>


                </div>
                <div style="padding:15px;">
                <label>Room No :</label>
                <input type="text" name="room" placeholder="Enter room no" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;">
                <label>Image :</label>
                <input  type="file" name="file" required=""/>


                </div>
                <div style="padding:15px;">
                
                <input type="submit" class="btn btn-success"/>


                </div>


            </form>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
  </body>
</html>
