@extends('layouts.app')

<?php
  $search=$request->input('search');
  $searchstring=isset($search)?"&search=".$search:'';
  $page=$request->input('page');
  $pagestring=isset($page)?"&page=".$page:'';
  $order=$request->input('order');
?>

@section('content')

{!! Form::open(['method'=>'GET','url'=>'contacts','class'=>'','role'=>'search'])  !!}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </span>
</div>
{!! Form::close() !!}

<br>

<!-- if we have a search query we want to display it -->
{{ isset($search) ? "Showing results for &quot;".$search."&quot;..." : '' }}
{!! isset($search) ? "<br><br>" : '' !!}

<!-- list contacts -->
@if (count($contacts) > 0)
<div class="panel panel-default">
  <div class="panel-heading">
    Contacts:
  </div>

  <div class="panel-body">
    <table class="table table-striped task-table">

      <!-- Table Headings -->
      <thead>
        <th>First Name</th>
        @if ($order==='desc')
        <th><a id="nameheader" href="{{ url('contacts').'?order=asc'.$searchstring.$pagestring }}">Last Name <i class="fa fa-caret-down" aria-hidden="true"></i></a></th>
        @else
        <th><a id="nameheader" href="{{ url('contacts').'?order=desc'.$searchstring.$pagestring }}">Last Name <i class="fa fa-caret-up" aria-hidden="true"></i></a></th>
        @endif
        <th>Email</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </thead>

      <!-- Table Body -->
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <!-- Contact First Name -->
          <td class="table-text">
            <div>{{ $contact->firstname }}</div>
          </td>

          <!-- Contact Last Name -->
          <td class="table-text">
            <div>{{ $contact->lastname }}</div>
          </td>

          <!-- Contact Email -->
          <td class="table-text">
            <div>{{ $contact->email }}</div>
          </td>

          <!-- View Button -->
          <td>
          <form action="{{ url('contacts/'.$contact->id) }}" method="GET">
              {{ csrf_field() }}
              {{ method_field('GET') }}

              <button type="submit" class="btn btn-default">
                   Details
              </button>
          </form>
        </td>
          <!-- Edit Button -->
          <td>
              <form action="{{ url('contacts/'.$contact->id.'/edit') }}" method="GET">
                  {{ csrf_field() }}
                  {{ method_field('GET') }}

                  <button type="submit" class="btn btn-default">
                       Edit
                  </button>
              </form>
          </td>

          <!-- Delete Button -->
          <td>
              <form action="{{ url('contact/'.$contact->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger">
                      <i class="fa fa-trash"></i> Delete
                  </button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@else
<p>No contacts found...</p>
@endif

{!! $contacts->appends(Input::except('page'))->render() !!}

@endsection
