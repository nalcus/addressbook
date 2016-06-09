@extends('layouts.app')

@section('content')

<!-- Display Validation Errors -->
@include('common.errors')

{!! Form::model($contact, [
  'method' => 'PATCH',
  'route' => ['contacts.update', $contact->id]
  ]) !!}

  <div class="form-group">
    {!! Form::label('firstname', 'First Name:', ['class' => 'control-label']) !!}
    {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('lastname', 'Last Name:', ['class' => 'control-label']) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('phone', 'Phone Number:', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
    {!! Form::label('zip', 'Zip:', ['class' => 'control-label']) !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
  </div>

  {!! Form::submit('Update Contact', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}

@endsection
