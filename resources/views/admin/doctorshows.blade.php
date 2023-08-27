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

        <div align="center" style="padding-top:70px; ">
            <table style="font-color:white;" align="center" width="800px" >
                <th style="padding:20px; ">Doctor Name</th>
                <th style="padding:20px; ">Phone</th>
                <th style="padding:20px; ">Speciality</th>
                <th style="padding:20px; ">Room No</th>
                <th style="padding:20px; ">Image</th>
                <th style="padding:20px; ">Update</th>
                <th style="padding:20px; ">Delete</th>
                @foreach($data as $datas)
               <tr >
               <td>{{$datas->name}}</td>
               <td align="center">{{$datas->phone}}</td>
               <td align="center">{{$datas->Speciality}}</td>
               <td align="center">{{$datas->room}}</td>
               <td ><img src="doctorimage/{{$datas->image}}" alt="" height="100px" width="100px"></td>
               <td align="center"><a href="{{url('updatedoctor',$datas->id)}}" class="btn btn-warning">Update</a></td>
               <td align="center"><a href="{{url('deletedoctor',$datas->id)}}" class="btn btn-danger" onclick="return confirm('Do you want delete this doctor?')">Delete</a></td>
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
