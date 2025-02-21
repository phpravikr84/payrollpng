@extends('administrator.master')
@section('title', __('Manage Salary'))

@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('PAYROLL') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Payroll') }}</a></li>
      <li class="active">{{ __('Manage Salary') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Manage Salary') }}</h3>
      </div>
      <div class="box-body">
        <!-- Notification Box -->
        <div class="col-md-12">
          @if (!empty(Session::get('message')))
          <div class="alert alert-success alert-dismissible" id="notification_box">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i> {{ Session::get('message') }}
          </div>
          @elseif (!empty(Session::get('exception')))
          <div class="alert alert-warning alert-dismissible" id="notification_box">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
          </div>
          @endif
        </div>
        <!-- /.Notification Box -->
        <div class="col-md-12">
          <form action="{{ url('/hrm/payroll/go') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <div class="col-sm-offset-3 col-sm-6">
                <div class="input-group margin">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <select name="user_id" class="form-control">
                    <option selected disabled>{{ __('Select One') }}</option>
                    @foreach($employees as $employee)
                    <option value="{{ $employee['id'] }}"><strong>{{ $employee['name'] }}</option>
                      @endforeach
                    </select>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> {{ __('Go') }}</button>
                    </span>
                  </div>
                  @if ($errors->has('user_id'))
                  <span class="help-block">
                    <strong> &nbsp; &nbsp;{{ $errors->first('user_id') }}</strong>
                  </span>
                 @endif
               </div>
             </div>
           </form>
         </div>
         <!-- /. end col -->
       </div>
       <!-- /.box-body -->
       <div class="box-footer clearfix">

       </div>
       <!-- /.box-footer -->
     </div>
     <!-- /.box -->
   </section>
   <!-- /.content -->
 </div>
 @endsection