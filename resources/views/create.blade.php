@extends('layouts.app')

@section('content')

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')

  <!-- New Contact Form -->
  <form action="{{ url('contact') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- First Name -->
    <div class="form-group">
      <label for="firstname" class="col-sm-3 control-label">First Name</label>

      <div class="col-sm-6">
        <input type="text" name="firstname" id="firstname" class="form-control">
      </div>

    </div>

    <!-- Last Name -->
    <div class="form-group">
      <label for="lastname" class="col-sm-3 control-label">Last Name</label>

      <div class="col-sm-6">
        <input type="text" name="lastname" id="lastname" class="form-control">
      </div>
    </div>

    <!-- Email -->
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email</label>

      <div class="col-sm-6">
        <input type="text" name="email" id="email" class="form-control">
      </div>
    </div>

    <!-- Phone -->
    <div class="form-group">
      <label for="phone" class="col-sm-3 control-label">Phone Number</label>

      <div class="col-sm-6">
        <input type="text" name="phone" id="phone" class="form-control">
      </div>
    </div>

    <!-- birthday -->
    <div class="form-group">
      <label for="birthday" class="col-sm-3 control-label">Birthday</label>

      <div class="col-sm-6">
        <input type="text" name="birthday" id="birthday" class="form-control">
      </div>
    </div>

    <!-- address -->
    <div class="form-group">
      <label for="address" class="col-sm-3 control-label">Address</label>

      <div class="col-sm-6">
        <input type="text" name="address" id="address" class="form-control">
      </div>
    </div>

    <!-- city -->
    <div class="form-group">
      <label for="city" class="col-sm-3 control-label">City</label>

      <div class="col-sm-6">
        <input type="text" name="city" id="city" class="form-control">
      </div>
    </div>

    <!-- state -->
    <div class="form-group">
      <label for="state" class="col-sm-3 control-label">State</label>

      <div class="col-sm-6">
        <input type="text" name="state" id="state" class="form-control">
      </div>
    </div>

    <!-- zip -->
    <div class="form-group">
      <label for="zip" class="col-sm-3 control-label">Zip Code</label>

      <div class="col-sm-6">
        <input type="text" name="zip" id="zip" class="form-control">
      </div>
    </div>

    <!-- Add Contact Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-plus"></i> Add Contact
        </button>
      </div>
    </div>
  </form>
</div>

@endsection
