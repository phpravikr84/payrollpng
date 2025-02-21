@extends('administrator.master')
@section('title', __('Leave Categories'))

@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ __('WORKING DAYS') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Setting') }}</a></li>
      <li class="active">{{ __('Working Days') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Manage working days') }}</h3>
      </div>
      <form action="{{ url('/setting/working-days/update/')}}" method="post">
        {{ csrf_field() }}
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
            <div class="form-group">
              <div class="row">
                  @foreach($working_days as $working_day)
                  @if( $working_day['working_hours']!=0)
                    <div class="col-md-1 custom-padding">
                      <label class="checkbox-inline">
                          @if($working_day['working_status'] == 1)
                          <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          @else
                          <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          @endif
                          <span>{{ $working_day['day'] }}</span><br/>
                          <span>Hours: <input type="text" class="form-control" name="working_hours[]" id="working_hours" value="{{ $working_day['working_hours'] }}" /></span>
                      </label>
                    </div>
                  @else
                  <div class="col-md-1 custom-padding">
                      <label class="checkbox-inline">
                          @if($working_day['working_status'] == 1)
                          <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          @else
                          <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                          @endif
                          <span>{{ $working_day['day'] }}</span><br/>
                          <span>Hours: <input type="text" class="form-control" name="working_hours[]" id="working_hours" value="{{ $working_day['working_hours'] }}" /></span>
                      </label>
                    </div>
                    @endif
                  @endforeach
              </div>
                <!-- @foreach($working_days as $working_day)
                <label class="checkbox-inline">
                  @if($working_day['working_status'] == 1)
                  <input type="hidden" name="day[]" value="1"><input checked type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                  @else
                  <input type="hidden" name="day[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                  @endif
                  <span>{{ $working_day['day'] }}</span><br/>
                  @if( $working_day['working_hours']!=0)
                  <span>Hours: {{ $working_day['working_hours'] }}</span>
                  @endif
                </label>
                @endforeach -->
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-edit"></i> {{ __('Update') }}</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<style>
    .custom-padding {
        margin-right: 10px; /* Adjust the value as needed */
    }
   
</style>

@endsection
