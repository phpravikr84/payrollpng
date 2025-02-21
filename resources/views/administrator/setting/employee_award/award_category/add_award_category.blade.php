@extends('administrator.master')
@section('title', __('Add Award Category'))

@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ __('Award Lists') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>
      <li><a>{{ __('Setting') }}</a></li>
      <li><a href="{{ url('/setting/award_categories') }}">{{ __('Award Category Lists') }}</a></li>
      <li class="active">{{ __('Add Award Category') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('Add Award Category') }}</h3>
      </div>
      <!-- /.box-header -->
      <form action="{{ url('/setting/award_categories/store') }}" method="post" name="award_add_form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="row">
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
              @else
              <p class="text-yellow">{{ __('Enter Awards Title. All field are required.') }} </p>
              @endif
            </div>
            <!-- /.Notification Box -->

            <div class="col-md-6">
              <label for="award_title">{{ __('Award Name/Title') }} <span class="text-danger">*</span></label>
              <div class="form-group{{ $errors->has('award_title') ? ' has-error' : '' }} has-feedback">
                <input type="text" name="award_title" id="award_title" class="form-control" value="{{ old('award_title') }}" placeholder="{{ __('Enter Award Name/Title..') }}">
                @if ($errors->has('award_title'))
                <span class="help-block">
                  <strong>{{ $errors->first('award_title') }}</strong>
                </span>
                @endif
              </div>
              <!-- /.form-group -->



              <label for="publication_status">{{ __('Publication Status') }} <span class="text-danger">*</span></label>
              <div class="form-group{{ $errors->has('publication_status') ? ' has-error' : '' }} has-feedback">
                <select name="publication_status" id="publication_status" class="form-control">
                  <option value="" selected disabled>{{ __('Select one') }}</option>
                  <option value="1">{{ __('Published') }}</option>
                  <option value="0">{{ __('Unpublished') }}</option>
                </select>
                @if ($errors->has('publication_status'))
                <span class="help-block">
                  <strong>{{ $errors->first('publication_status') }}</strong>
                </span>
                @endif
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{ url('/setting/award_categories') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __('Cancel') }}</a>
          <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add award List') }}</button>
        </div>
      </form>
    </div>
    <!-- /.box -->


  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['award_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection
