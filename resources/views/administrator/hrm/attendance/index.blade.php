@extends('administrator.master')
@section('title', __('Manage Attendance'))

@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('ATTENDANCE') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }} </a></li>
            <li><a>{{ __('Attendance') }} </a></li>
            <li class="active">{{ __(' Add Attendance') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        
  <!-- Box Wrapper -->
  <div class="box box-default">
    <!-- Box Header -->
    <div class="box-header with-border">
      <h3 class="box-title">Import the Attendance Report File from the Machine</h3>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
      <div class="row">
        <!-- Notification Box (if needed) -->
        <div class="col-md-12"></div>
      </div>
      
      <!-- Form Row -->
      <div class="row">
        <!-- Form 1: Import XLSX File -->
        <div class="col-md-6">
          <form id="importAttendenceForm"  action="{{url('/hrm/attendance/upload')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="form-group">
              <label for="file_name_xlsx">Choose XLSX File <span class="text-danger">*</span></label>
              <input type="file" name="import_file" id="file_name_xlsx" class="form-control">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-plus"></i> Import XLSX file
              </button>
            </div>
          </form>
        </div>

        <!-- Form 2: Import CSV File -->
        <div class="col-md-6 mt-4">
          <!-- <form id="importAttendenceForm"  action="{{url('/hrm/attendance/upload_csv')}}" method="POST" enctype="multipart/form-data"> -->
          <form id="generateAttendanceSheet" action="{{url('/hrm/attendance/generate')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Generate Attendance Sheet
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.row -->

      <!-- Attendance Report Table -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Attendance Report</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr class="bg-info">
                    <th>Sl#</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Work Time</th>
                    <th>Late</th>
                    <th>Early</th>
                    <th>Absence</th>
                  </tr>
                </thead>
                <tbody>
                    @if($attendenceRecords->count() > 0)
                        @php $i = 1; @endphp
                        @foreach($attendenceRecords as $attendance)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $attendance->employee_id }}</td>
                                <td>{{ $attendance->employee_name }}</td>
                                <td>{{ $attendance->date }}</td> <!-- Assuming date is a Carbon instance -->
                                <td>{{ $attendance->in_time }}</td>
                                <td>{{ $attendance->out_time }}</td>
                                <td>{{ $attendance->work_time }}</td>
                                <td>{{ $attendance->late }}</td>
                                <td>{{ $attendance->early }}</td>
                                <td>{{ $attendance->absence }}</td>
                            </tr>
                            @php $i++ @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center">No Attendance Records Available!</td>
                        </tr>
                    @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
      <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
@endsection