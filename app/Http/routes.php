<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Contact;
use Illuminate\Http\Request;

Route::resource('contacts', 'ContactsController');

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('map', [
    'as' => 'map',
    'uses' => 'PagesController@map'
]);

Route::post('/contact', function (Request $request) {
    $validator = Validator::make($request->all(), [
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

    if ($validator->fails()) {
        return redirect('contacts/create')
            ->withInput()
            ->withErrors($validator);
    }

    $contact = new Contact;
    $contact->firstname = $request->firstname;
    $contact->lastname = $request->lastname;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->birthday = $request->birthday;
    $contact->address = $request->address;
    $contact->city = $request->city;
    $contact->state = $request->state;
    $contact->zip = $request->zip;
    $contact->save();

    return redirect('/contacts');
});

Route::delete('/contact/{contact}', function (Contact $contact) {
    $contact->delete();

    return redirect('/contacts');
});
