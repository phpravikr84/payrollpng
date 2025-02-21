@extends('administrator.master')
@section('title', __('Manage Salary Details'))

@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     {{ __('PAYROLL') }} 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
      <li><a>{{ __('Payroll') }}</a></li>
      <li class="active">{{ __('Manage Salary Details') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('Manage Salary Details') }}</h3>
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
              <form class="form-horizontal" name="employee_select_form" action="{{ url('/hrm/payroll/go') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                  <label for="user_id" class="col-sm-3 control-label">{{ __('Employee Name') }}</label>
                  <div class="col-sm-6">
                    <select name="user_id" class="form-control" id="user_id">
                      <option selected disabled>{{ __('Select One') }}</option>
                      @foreach($employees as $employee)
                      <option value="{{ $employee['id'] }}">{{ $employee['name'] }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('user_id') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <div class=" col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> {{ __('Go') }}</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"></div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.end.col -->

      <form name="employee_salary_form" id="employee_salary_form" action="{{ url('/hrm/payroll/update/' . $salary['id']) }}" method="post">
        {{ csrf_field() }}

        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Salary Details') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group{{ $errors->has('employee_type') ? ' has-error' : '' }}">
                  <label for="employee_type" class="col-sm-3 control-label">{{ __('Employee Type') }}</label>
                  <div class="col-sm-6">
                    <select name="employee_type" class="form-control" id="employee_type">
                      <option selected disabled>{{ __('Select One') }}</option>
                      <option value="1">{{ __('Provision') }}</option>
                      <option value="2">{{ __('Permanent') }}</option>
                      <option value="3">{{ __('Full Time') }}</option>
                      <option value="4">{{ __('Part Time') }}</option>
                      <option value="5">{{ __('Adhoc') }}</option>
                    </select>
                    @if ($errors->has('employee_type'))
                    <span class="help-block">
                      <strong>{{ $errors->first('employee_type') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="totalworkinghour" class="col-sm-3 control-label">{{ __('Working Days/Hours - 5/8, Weeks / Yr - 52') }}</label>
                  <div class="col-sm-6">
                    <!-- <input type="number" name="totalworkinghour" class="form-control" id="totalworkinghour" value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}"> -->
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="totalworkinghour" class="col-sm-3 control-label">{{ __('Total Weekly Working Hours') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="totalworkinghour" class="form-control" id="totalworkinghour" value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}">
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="actualhourwarked" class="col-sm-3 control-label">{{ __('Actual Hour Worked') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="actualhourwarked" class="form-control" id="actualhourwarked"  value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}">
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="basic_salary" class="col-sm-3 control-label">{{ __('PAY HOURs') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="payhour" class="form-control" id="payhour" value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}">
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('annual_basic') ? ' has-error' : '' }}">
                  <label for="basic_salary" class="col-sm-3 control-label">{{ __('Annual Basic') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="annualbasic" class="form-control" id="annualbasic" onblur="check_amt()" value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}">
                    @if ($errors->has('annual_basic'))
                    <span class="help-block">
                      <strong>{{ $errors->first('annual_basic') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="basic_salary" class="col-sm-3 control-label">{{ __('Rate') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="hourrate" class="form-control" id="hourrate" value="{{ old('basic_salary') }}" placeholder="{{ __('Enter working hours..') }}">
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('basic_salary') ? ' has-error' : '' }}">
                  <label for="basic_salary" class="col-sm-3 control-label">{{ __('Basic Salary') }}</label>
                  <div class="col-sm-6">
                    <input type="number" name="basic_salary" class="form-control" id="basic_salary" value="{{ $salary['basic_salary'] }}" placeholder="{{ __('Enter basic salary..') }}">
                    @if ($errors->has('basic_salary'))
                    <span class="help-block">
                      <strong>{{ $errors->first('basic_salary') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>


        <!-- /.end.col -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Allowances') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group{{ $errors->has('house_rent_allowance') ? ' has-error' : '' }}">
                <label for="house_rent_allowance">{{ __('House Rent Allowance') }}</label>
                <input type="number" name="house_rent_allowance" value="{{ $salary['house_rent_allowance'] }}" class="form-control" id="house_rent_allowance" placeholder="{{ __('Enter house rent allowance..') }}">
                @if ($errors->has('house_rent_allowance'))
                <span class="help-block">
                  <strong>{{ $errors->first('house_rent_allowance') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('medical_allowance') ? ' has-error' : '' }}">
                <label for="medical_allowance">{{ __('Medical Allowance') }}</label>
                <input type="number" name="medical_allowance" value="{{ $salary['medical_allowance'] }}" class="form-control" id="medical_allowance" placeholder="{{ __('Enter medical allowance..') }}">
                @if ($errors->has('medical_allowance'))
                <span class="help-block">
                  <strong>{{ $errors->first('medical_allowance') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('special_allowance') ? ' has-error' : '' }}">
                <label for="special_allowance">{{ __('Special Allowance') }}</label>
                <input type="number" name="special_allowance" value="{{ $salary['special_allowance'] }}" class="form-control" id="special_allowance" placeholder="{{ __('Enter special allowance..') }}">
                @if ($errors->has('special_allowance'))
                <span class="help-block">
                  <strong>{{ $errors->first('special_allowance') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('provident_fund_contribution') ? ' has-error' : '' }}">
                <label for="provident_fund_contribution">{{ __('Provident Fund Contribution') }}</label>
                <input type="number" name="provident_fund_contribution" value="{{ $salary['provident_fund_contribution'] }}" class="form-control" id="provident_fund_contribution" placeholder="{{ __('Enter special allowance..') }}">
                @if ($errors->has('provident_fund_contribution'))
                <span class="help-block">
                  <strong>{{ $errors->first('provident_fund_contribution') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('other_allowance') ? ' has-error' : '' }}">
                <label for="other_allowance">{{ __('Other Allowance') }}</label>
                <input type="number" name="other_allowance" value="{{ $salary['other_allowance'] }}" class="form-control" id="other_allowance" placeholder="{{ __('Enter other allowance..') }}">
                @if ($errors->has('other_allowance'))
                <span class="help-block">
                  <strong>{{ $errors->first('other_allowance') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Deductions') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group{{ $errors->has('tax_deduction') ? ' has-error' : '' }}">
                <label for="tax_deduction">{{ __('Tax Deduction') }}</label>
                <input type="number" name="tax_deduction" value="{{ $salary['tax_deduction'] }}" class="form-control" id="tax_deduction" placeholder="{{ __('Enter tax deduction..') }}">
                @if ($errors->has('tax_deduction'))
                <span class="help-block">
                  <strong>{{ $errors->first('tax_deduction') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('provident_fund_deduction') ? ' has-error' : '' }}">
                <label for="provident_fund_deduction">{{ __('Provident Fund Deduction') }}</label>
                <input type="number" name="provident_fund_deduction" value="{{ $salary['provident_fund_deduction'] }}" class="form-control" id="provident_fund_deduction" placeholder="{{ __('Enter tax deduction..') }}">
                @if ($errors->has('provident_fund_deduction'))
                <span class="help-block">
                  <strong>{{ $errors->first('provident_fund_deduction') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('other_deduction') ? ' has-error' : '' }}">
                <label for="other_deduction">{{ __('Other Deduction') }}</label>
                <input type="number" name="other_deduction" value="{{ $salary['other_deduction'] }}" class="form-control" id="other_deduction" placeholder="{{ __('Enter other deduction..') }}">
                @if ($errors->has('other_deduction'))
                <span class="help-block">
                  <strong>{{ $errors->first('other_deduction') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->

        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Provident Fund') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="total_provident_fund">{{ __('Total Provident Fund') }}</label>
                <input type="number" class="form-control" id="total_provident_fund" readonly>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.end.col -->

        <div class="col-md-offset-6 col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('Total Salary Details') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="gross_salary">{{ __('Gross Salary') }}</label>
                <input type="number" disabled class="form-control" id="gross_salary">
              </div>
              <div class="form-group{{ $errors->has('total_deduction') ? ' has-error' : '' }}">
                <label for="total_deduction">{{ __('Total Deduction') }}</label>
                <input type="number" disabled class="form-control" id="total_deduction">
              </div>
              <div class="form-group">
                <label for="net_salary">{{ __('Net Salary') }}</label>
                <input type="number" disabled class="form-control" id="net_salary">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-flat pull-right"><i class="fa fa-edit"></i> {{ __('Update Details') }}</button>
            </div>
          </div>
        </div>
        <!-- /.end.col -->

      </form>

    </div>
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
  // For Kepp Data After Reload
  document.forms['employee_select_form'].elements['user_id'].value = "{{ $employee_id }}";
  document.forms['employee_salary_form'].elements['employee_type'].value = "{{ $salary['employee_type'] }}";

  $(document).ready(function(){
    calculation();
  });


  //For Calculation
  $(document).on("keyup", "#employee_salary_form", function() {
    calculation();
  });

  function calculation() {
    var sum = 0;
    var basic_salary = $("#basic_salary").val();
    var house_rent_allowance = $("#house_rent_allowance").val();
    var medical_allowance = $("#medical_allowance").val();
    var special_allowance = $("#special_allowance").val();
    var provident_fund_contribution = $("#provident_fund_contribution").val();
    var provident_fund = $("#provident_fund").val();
    var other_allowance = $("#other_allowance").val();
    var tax_deduction = $("#tax_deduction").val();
    var provident_fund_deduction = $("#provident_fund_deduction").val();
    var other_deduction = $("#other_deduction").val();

    var gross_salary = (+basic_salary + +house_rent_allowance + +medical_allowance + +special_allowance + +other_allowance);

    var total_deduction = (+tax_deduction + +provident_fund_deduction + +other_deduction);

    $("#total_provident_fund").val(+provident_fund_contribution + +provident_fund_deduction);

    $("#gross_salary").val(gross_salary);
    $("#total_deduction").val(total_deduction);
    $("#net_salary").val(+gross_salary - +total_deduction);
  }
</script>
<script>
    function check_amt() {
    var x = document.getElementById("annualbasic").value;
    var x1 = document.getElementById("totalworkinghour").value;
    let a = x/52/x1;
    let a1 = a.toFixed(2);
    document.getElementById("hourrate").value = a1;
    total_basic_amt();
}
function total_basic_amt() {
    var x = document.getElementById("hourrate").value;
    var x1 = document.getElementById("payhour").value;
    let a1 = x*x1;
    let a = a1.toFixed(2);
    document.getElementById("basic_salary").value = a;
}
</script>
@endsection