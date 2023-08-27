<!DOCTYPE html>
<html lang="en">
  <head>
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

        <div  style="padding-top:70px; " align="start">
            <table style="font-color:white;"  width="950px">
                <th style="padding:10px; ">Name</th>
                <th style="padding:10px; ">Email</th>
                <th width="200px" style="padding:10px; ">Doctor Name</th>
                <th style="padding:10px; ">Date</th>
                <th style="padding:10px; ">Phone</th>
                <th style="padding:10px; ">Message</th>
                <th style="padding:10px; ">Status</th>
                <th style="padding:10px; ">Approvel</th>
                <th style="padding:10px; ">Cancel</th>
                <th width="100px"style="padding:10px; ">Send Mail</th>
                @foreach($data as $datas)
                <tr align="center">
                    <td >{{$datas->name}}</td>
                    <td >{{$datas->email}}</td>
                    <td >{{$datas->doctor}}</td>
                    <td >{{$datas->date}}</td>
                    <td >{{$datas->phone}}</td>
                    <td >{{$datas->message}}</td>
                    <td >{{$datas->status}}</td>
                    <td><a href="{{url('approved',$datas->id)}}" class="btn btn-success">Approved</a></td>
                    <td><a href="{{url('canceled',$datas->id)}}" class="btn btn-danger">Cancel</a></td>
                    <td><a href="{{url('emailview',$datas->id)}}" class="btn btn-hidden"><img src="admin/assets/images/gmail.png" alt="" height="40px" width="40px"></a></td>
                </tr>
                @endforeach
            </table>
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
