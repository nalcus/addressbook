<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use App\Contact;
use DB;

class ContactsController extends Controller
{
  // put the C in CRUD
  public function create () {

    return view('create');
  }

  public function show($id)
{
    // get the nerd
    $contact = Contact::find($id);

    // show the view and pass the nerd to it
    return View::make('show')
        ->with('contact', $contact);
}

  public function update ($id, Request $request) {
      $contact = Contact::findOrFail($id);


      $this->validate($request, [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'email' => 'email|required|max:255',
        'phone' => 'max:255',
        'birthday' => 'date|max:255',
        'address' => 'max:255',
        'city' => 'max:255',
        'state' => 'max:255',
        'zip' => 'max:255',
      ]);

      $input = $request->all();

      $contact->fill($input)->save();

      // Session::flash('flash_message', 'Task successfully added!');

      return View::make('show')
          ->with('contact', $contact);

  }

  public function index (Request $request) {

    // check for descending order. default to ascending if there's no input
    $order = $request->input('order');
    if ($order!=='desc') {
      $sort='asc'; } else {
      $sort='desc';
    }

    // if there is a search string let's get a query out of it
    if ($request->input('search')!==null) {
    $search = $request->input('search');
    $contacts = Contact::orderBy('lastname', $sort)->
    where('firstname', 'like', $search)->
    orWhere('lastname', 'like', $search)->
    orWhere('email', 'like', $search)->
    orWhere('phone', 'like', $search)->
    orWhere('birthday', 'like', $search)->
    orWhere('address', 'like', $search)->
    orWhere('city', 'like', $search)->
    orWhere('state', 'like', $search)->
    orWhere('zip', 'like', $search)->
    paginate(10);
  } else {
    $contacts = Contact::orderBy('lastname', $sort)->paginate(5);
  }

    return view('contacts', [
      'contacts' => $contacts,
      'request' => $request
    ]);
  }

  public function edit($id)
{
    // get the contact
    $contact = Contact::find($id);

    // show the edit form and pass the contact
    return View::make('edit')
        ->with('contact', $contact);
}


}
