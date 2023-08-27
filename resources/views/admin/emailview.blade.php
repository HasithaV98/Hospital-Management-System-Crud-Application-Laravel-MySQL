<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
            <form method="POST" action="{{url('sendemail',$data->id)}}" >
                @csrf
                <div style="padding:15px;">
                <label>Greeting :</label>
                <input type="text" name="greeting" placeholder="" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;">
                <label>Mail body :</label>
                <input type="text" name="mailbody" placeholder="" style="color:black;" required=""/>


                </div>
                
                <div style="padding:15px;">
                <label>Action text :</label>
                <input type="text" name="actiontext" placeholder="" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;">
                <label>Action url :</label>
                <input type="text" name="actionurl" placeholder="" style="color:black;" required=""/>


                </div>
                <div style="padding:15px;">
                <label>End part :</label>
                <input type="text" name="endpart" placeholder="" style="color:black;" required=""/>


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
