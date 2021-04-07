
@include('livewire.admin.student-create')
@include('livewire.admin.student-update')
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
              @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('message')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
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
                    <th>Staus</th>
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
                    <td width="15%">{{ $student->address }}</td>
                   <td  class="text-center"><img src="{{ asset('upload/student/')}}/{{ $student->image }}" width="60"> </td>
                    
                    <td> 
                      @if($student->status==1)
                     <span class=" badge badge-success p-2">Active</span> 
                     @else
                      <span class=" badge badge-danger p-2">Inactive</span> 
                     </td>
                     @endif
                    <td> 
              
                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#updatestudentModal" wire:click.prevent="edit({{ $student->id }})"> Edit
                       </button>
                       <button type="button" class="btn btn-danger" wire:click.prevent="delete({{$student->id}})">Delete</button>
                      
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


