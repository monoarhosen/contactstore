<?php

use Illuminate\Http\Request;
use App\contact;

Route::group(['middleware' => 'api'], function(){
    // fatch contacts
    Route::get('contacts', function(){
      return Contact::latest()->orderBy('created_at', 'desc')->get();
    }); // end fatch contacts

    // Get single contact
    route::get('contact/{id}', function($id) {
      return Contact::findOrFail($id);
    });// end Get single contact

    // Add contact
    Route::post('contact/store', function(Request $request) {
      return Contact::create(['name'=> $request->input(['name']), 'email'=> $request->input(['email']), 'phone'=> $request->input(['phone'])]);
    });// end Add contact

    // update contact
    Route::patch('contact/{id}', function(Request $request, $id){
      Contact::findOrFail($id)->update(['name'=> $request->input(['name']), 'email'=> $request->input(['email']), 'phone'=> $request->input(['phone'])]);
    }); // end update contact

    // Delete contact
    Route::delete('contact/{id}', function($id){
      return Contact::destroy($id);
    }); // end Delete contact

}); // end group api

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
