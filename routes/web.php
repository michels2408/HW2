<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('login', 'LoginController@login');
    Route::post('login', 'LoginController@checkLogin');
    Route::get('logout', 'LoginController@logout');

    Route::get('signup', 'SignupController@signup');
    Route::post('signup', 'SignupController@newClient');
    Route::get('/signup/username/{q}', 'SignupController@checkUsername');

    Route::get('home', 'HomeController@home');
    Route::get('appointment', 'HomeController@appointment');

    Route::get('new_appointment', 'NewAppController@newAppointment');
    Route::get('new_appointment/employee/{q}', 'NewAppController@searchEmployee');
    Route::post('new_appointment', 'NewAppController@checkAppointment');

    Route::get('about', 'AboutController@about');
    Route::get('about_employee', 'AboutController@employees');

    Route::get('contacts', 'ContactsController@contacts');
    Route::get('fetch_contacts', 'ContactsController@fetch_contacts');

    Route::get('products', 'ProductsController@products');
    Route::get('fetch_products', 'ProductsController@fetch_products');
    Route::get('fetch_comments', 'ProductsController@fetch_comments');
    Route::get('fetch_fav', 'ProductsController@fetch_fav');
    Route::get('fetch_likes/{q}', 'ProductsController@fetch_likes');
    Route::get('like_product/{q}', 'ProductsController@like_product');
    Route::get('unlike_product/{q}', 'ProductsController@unlike_product');
    Route::get('like_comment/{q}', 'ProductsController@like_comment');
    Route::get('unlike_comment/{q}', 'ProductsController@unlike_comment');
    Route::get('new_comment/{text}&{date}&{time}', 'ProductsController@new_comment');

    Route::get('services', 'ServicesController@services');
    Route::get('fetch_services', 'ServicesController@fetch_services');
    Route::get('search_inbudget/{q}', 'ServicesController@search_inbudget');
    Route::get('search_photos/{q}', 'ServicesController@search_photos');
    
    Route::get('news', 'NewsController@news');
    Route::get('search_news/{q}', 'NewsController@search_news');

?>