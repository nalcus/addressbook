
@extends('layouts.app')

@section('content')

<h1>Welcome Home</h1>
<p class="lead">This is an Address Book Web App created by Nicholas Alcus for HAVEN Agency.</p>
<hr>

<a href="{{ route('contacts.index') }}" class="btn btn-info">View Contacts</a>
<a href="{{ route('contacts.create') }}" class="btn btn-primary">Add New Contact</a>

@stop
