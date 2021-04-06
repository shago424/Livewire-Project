
@include('livewire.admin.student-create')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Student List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            @if(Session::has('message'))
          <div class="alert alert-success">
            <strong> Success  :</strong> {{ Session('message') }}
          </div>
          @endif
            <!-- Custom tabs (Charts with tabs)-->
             <div class="panel" style=" background: white">
              <div class="panel-header p-2" style="background-color: #0A4833;color: white">
                <h4>Student List
                  <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#addstudentModal"> <i class="fa fa-plus-circle"></i>
                  Add Student
                </button>

               {{--  <a href="{{ route('student.add') }}" class=" btn btn-warning float-right"><i class="fa fa-plus-circle"></i>
                  Add student
                </a> --}}
               </h4>
              </div><!-- /.panel-header -->
              
              <div class="panel-body p-3">

            <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                  <tr style="background-color: #210C4C;color: white">
                    <th >SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Image</th>
                    {{-- <th>Staus</th> --}}
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $key => $student)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->mobile }} </td>
                    <td>{{ $student->address }}</td>
                    <td style="text-align: center;"><img style="width: 50px;height: 60px" class="student-image-img img-fluid img-circle"
                       src="{{(!empty($student->image))?url('upload/studentimage/'.$student->image):url('upload/usernoimage.png')}}"
                       alt="image profile picture">
                     </td>
                    
                    {{-- <td> 
                      @if($student->status==1)
                     <span class=" badge badge-success p-2">Active</span> 
                     @else
                      <span class=" badge badge-danger p-2">Inactive</span> 
                     </td>
                     @endif --}}
                    <td> 
                    {{--   @if($student->status==1)
                      <a  href="{{ route('students.inactive',$student->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-down"></i></a>
                      @else
                      <a  href="{{ route('students.active',$student->id) }}" class="btn btn-success btn-sm"><i class="fas fa-arrow-up"></i></a>
                      @endif --}}
                        <a  href="{{ route('student.edit',$student->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                         {{-- <a  href="{{ route('students.delete',$student->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                    </td>
                  </tr>
                  
                  @endforeach
                  </tbody>

                {{--   <tfoot>
                  <tr style="background-color: #210C4C;color: white">
                     <th># SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Staus</th>
                    <th>Action</th>
                  </tr>
                  </tfoot> --}}
                </table>
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


