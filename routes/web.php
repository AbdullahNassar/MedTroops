<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/error', ['as' => 'site.error', 'uses' => 'Controller@error']);

Route::group(['namespace' => 'Site'], function () {
    Route::post('/register', ['as' => 'site.register', 'uses' => 'Auth\AuthController@register']);
    Route::get('/login', ['as' => 'site.login', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('/login', ['as' => 'site.login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/logout', ['as' => 'site.logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('/phone', ['as' => 'member.phone', 'uses' => 'Auth\AuthController@phone']);
    Route::Post('/verify', ['as' => 'phone.verify', 'uses' => 'Auth\AuthController@verify']);
    Route::get('/error', ['as' => 'site.error', 'uses' => 'Auth\AuthController@error']);
    
    Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);
    Route::get('/blog', ['as' => 'site.blog', 'uses' => 'HomeController@blog']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@about']);
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'HomeController@contact']);
    Route::get('/services', ['as' => 'site.services', 'uses' => 'HomeController@services']);
    Route::get('/departments', ['as' => 'site.departments', 'uses' => 'HomeController@departments']);
    Route::get('/post/{id}', ['as' => 'site.post', 'uses' => 'HomeController@getPost']);
    Route::get('/cat/{id}', ['as' => 'site.cat', 'uses' => 'HomeController@getCat']);
    //Doctor Routes
    Route::get('/search', ['as' => 'site.search', 'uses' => 'DoctorController@search']);
    Route::get('/doctor', ['as' => 'site.doctor', 'uses' => 'DoctorController@doctor']);
    Route::get('/doctorprofile/{id}', ['as' => 'site.doctorprofile', 'uses' => 'DoctorController@doctorprofile']);
    Route::get('/editdoctor/{id}', ['as' => 'site.editdoctor', 'uses' => 'DoctorController@editdoctor']);
    Route::post('/editdata', ['as' => 'site.editdata', 'uses' => 'DoctorController@editdata']);
    Route::get('/bedoctor', ['as' => 'site.bedoctor', 'uses' => 'DoctorController@bedoctor']);
    Route::get('/postbedoctor', ['as' => 'site.postbedoctor', 'uses' => 'DoctorController@postbedoctor']);
    //Patient Routes
    Route::get('/editpatient/{id}', ['as' => 'site.editpatient', 'uses' => 'PatientController@editpatient']);
    Route::get('/patientprofile/{id}', ['as' => 'site.patientprofile', 'uses' => 'PatientController@patientprofile']);
    Route::post('/postdata', ['as' => 'site.postdata', 'uses' => 'PatientController@postdata']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/store', ['as' => 'admin.store', 'uses' => 'ReportsController@store']);
        Route::get('/student', ['as' => 'admin.student.store', 'uses' => 'StudentController@getIndex']);
        Route::post('/student', ['as' => 'admin.student.create', 'uses' => 'StudentController@storeData']);
        //Route::get('/error', ['as' => 'admin.error', 'uses' => 'HomeController@error']);

        Route::group(['prefix' => 'org'], function () {
            Route::get('/', ['as' => 'admin.org', 'uses' => 'OrgController@getIndex']);
            Route::post('/add', ['as' => 'admin.org.edit', 'uses' => 'OrgController@postEdit']);
        });

        Route::group(['prefix' => 'doctors'], function () {
            Route::get('/', ['as' => 'doctor.get', 'uses' => 'DoctorController@getIndex']);
            Route::get('/getdata', ['as' => 'ajaxdata.getdata', 'uses' => 'DoctorController@getdata']);
            Route::post('/postdata', ['as' => 'ajaxdata.postdata', 'uses' => 'DoctorController@postdata']);
            Route::get('/fetchdata', ['as' => 'ajaxdata.fetchdata', 'uses' => 'DoctorController@fetchdata']);
            Route::get('/removedata', ['as' => 'ajaxdata.removedata', 'uses' => 'DoctorController@removedata']);
            Route::get('/massremove', ['as' => 'ajaxdata.massremove', 'uses' => 'DoctorController@massremove']);
            Route::get('/special', ['as' => 'ajaxdata.special', 'uses' => 'DoctorController@special']);
            Route::get('/area', ['as' => 'ajaxdata.area', 'uses' => 'DoctorController@area']);
            Route::get('/doctorspecial', ['as' => 'ajaxdata.doctorspecial', 'uses' => 'DoctorController@doctorspecial']);
            Route::get('/doctorarea', ['as' => 'ajaxdata.doctorarea', 'uses' => 'DoctorController@doctorarea']);
        });

        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', ['as' => 'slider.get', 'uses' => 'SlidersController@getIndex']);
            Route::get('/getsliderdata', ['as' => 'ajaxdata.getsliderdata', 'uses' => 'SlidersController@getdata']);
            Route::post('/postsliderdata', ['as' => 'ajaxdata.postsliderdata', 'uses' => 'SlidersController@postdata']);
            Route::get('/fetchsliderdata', ['as' => 'ajaxdata.fetchsliderdata', 'uses' => 'SlidersController@fetchdata']);
            Route::get('/removesliderdata', ['as' => 'ajaxdata.removesliderdata', 'uses' => 'SlidersController@removedata']);
            Route::get('/slidermassremove', ['as' => 'ajaxdata.slidermassremove', 'uses' => 'SlidersController@massremove']);
        });

        Route::group(['prefix' => 'specials'], function () {
            Route::get('/', ['as' => 'special.get', 'uses' => 'SpecialsController@getIndex']);
            Route::get('/getspecialdata', ['as' => 'ajaxdata.getspecialdata', 'uses' => 'SpecialsController@getdata']);
            Route::post('/postspecialdata', ['as' => 'ajaxdata.postspecialdata', 'uses' => 'SpecialsController@postdata']);
            Route::get('/fetchspecialdata', ['as' => 'ajaxdata.fetchspecialdata', 'uses' => 'SpecialsController@fetchdata']);
            Route::get('/removespecialdata', ['as' => 'ajaxdata.removespecialdata', 'uses' => 'SpecialsController@removedata']);
            Route::get('/specialmassremove', ['as' => 'ajaxdata.specialmassremove', 'uses' => 'SpecialsController@massremove']);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'service.get', 'uses' => 'ServicesController@getIndex']);
            Route::get('/getservicedata', ['as' => 'ajaxdata.getservicedata', 'uses' => 'ServicesController@getdata']);
            Route::post('/postservicedata', ['as' => 'ajaxdata.postservicedata', 'uses' => 'ServicesController@postdata']);
            Route::get('/fetchservicedata', ['as' => 'ajaxdata.fetchservicedata', 'uses' => 'ServicesController@fetchdata']);
            Route::get('/removeservicedata', ['as' => 'ajaxdata.removeservicedata', 'uses' => 'ServicesController@removedata']);
            Route::get('/servicemassremove', ['as' => 'ajaxdata.servicemassremove', 'uses' => 'ServicesController@massremove']);
        });

        Route::group(['prefix' => 'patients'], function () {
            Route::get('/', ['as' => 'patient.get', 'uses' => 'PatientsController@getIndex']);
            Route::get('/getpatientdata', ['as' => 'ajaxdata.getpatientdata', 'uses' => 'PatientsController@getdata']);
            Route::post('/postpatientdata', ['as' => 'ajaxdata.postpatientdata', 'uses' => 'PatientsController@postdata']);
            Route::get('/fetchpatientdata', ['as' => 'ajaxdata.fetchpatientdata', 'uses' => 'PatientsController@fetchdata']);
            Route::get('/removepatientdata', ['as' => 'ajaxdata.removepatientdata', 'uses' => 'PatientsController@removedata']);
            Route::get('/patientmassremove', ['as' => 'ajaxdata.patientmassremove', 'uses' => 'PatientsController@massremove']);
        });

        Route::group(['prefix' => 'areas'], function () {
            Route::get('/', ['as' => 'area.get', 'uses' => 'AreasController@getIndex']);
            Route::get('/getareatdata', ['as' => 'ajaxdata.getareadata', 'uses' => 'AreasController@getdata']);
            Route::post('/postareadata', ['as' => 'ajaxdata.postareadata', 'uses' => 'AreasController@postdata']);
            Route::get('/fetchareadata', ['as' => 'ajaxdata.fetchareadata', 'uses' => 'AreasController@fetchdata']);
            Route::get('/removeareadata', ['as' => 'ajaxdata.removeareadata', 'uses' => 'AreasController@removedata']);
            Route::get('/areamassremove', ['as' => 'ajaxdata.areamassremove', 'uses' => 'AreasController@massremove']);
        });

        Route::group(['prefix' => 'statics'], function () {
            Route::get('/', ['as' => 'static.get', 'uses' => 'StaticController@getIndex']);
            Route::post('/poststaticdata', ['as' => 'ajaxdata.poststaticdata', 'uses' => 'StaticController@postdata']);
        });

        Route::group(['prefix' => 'contacts'], function () {
            Route::get('/', ['as' => 'contact.get', 'uses' => 'ContactsController@getIndex']);
            Route::post('/postcontactdata', ['as' => 'ajaxdata.postcontactdata', 'uses' => 'ContactsController@postdata']);
        });

        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/index', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'user.get', 'uses' => 'UsersController@getIndex']);
            Route::get('/getuserdata', ['as' => 'ajaxdata.getuserdata', 'uses' => 'UsersController@getdata']);
            Route::post('/postuserdata', ['as' => 'ajaxdata.postuserdata', 'uses' => 'UsersController@postdata']);
            Route::get('/fetchuserdata', ['as' => 'ajaxdata.fetchuserdata', 'uses' => 'UsersController@fetchdata']);
            Route::get('/removeuserdata', ['as' => 'ajaxdata.removeuserdata', 'uses' => 'UsersController@removedata']);
            Route::get('/usermassremove', ['as' => 'ajaxdata.usermassremove', 'uses' => 'UsersController@massremove']);
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', ['as' => 'post.get', 'uses' => 'PostsController@getIndex']);
            Route::get('/getpostdata', ['as' => 'ajaxdata.getpostdata', 'uses' => 'PostsController@getdata']);
            Route::post('/postpostdata', ['as' => 'ajaxdata.postpostdata', 'uses' => 'PostsController@postdata']);
            Route::get('/fetchpostdata', ['as' => 'ajaxdata.fetchpostdata', 'uses' => 'PostsController@fetchdata']);
            Route::get('/removepostdata', ['as' => 'ajaxdata.removepostdata', 'uses' => 'PostsController@removedata']);
            Route::get('/postmassremove', ['as' => 'ajaxdata.postmassremove', 'uses' => 'PostsController@massremove']);
            Route::get('/cat', ['as' => 'ajaxdata.cat', 'uses' => 'PostsController@cat']);
            Route::get('/postcat', ['as' => 'ajaxdata.postcat', 'uses' => 'PostsController@postcat']);
        });

        Route::group(['prefix' => 'cats'], function () {
            Route::get('/', ['as' => 'cat.get', 'uses' => 'CatsController@getIndex']);
            Route::get('/getcatdata', ['as' => 'ajaxdata.getcatdata', 'uses' => 'CatsController@getdata']);
            Route::post('/postcatdata', ['as' => 'ajaxdata.postcatdata', 'uses' => 'CatsController@postdata']);
            Route::get('/fetchcatdata', ['as' => 'ajaxdata.fetchcatdata', 'uses' => 'CatsController@fetchdata']);
            Route::get('/removecatdata', ['as' => 'ajaxdata.removecatdata', 'uses' => 'CatsController@removedata']);
            Route::get('/catmassremove', ['as' => 'ajaxdata.catmassremove', 'uses' => 'CatsController@massremove']);
        });

        Route::get('/message', ['as' => 'admin.message', 'uses' => 'MessageController@getIndex']);
        Route::get('/profile', ['as' => 'admin.profile', 'uses' => 'UsersController@getProfile']);
        Route::post('/profile', ['as' => 'admin.profile.edit', 'uses' => 'UsersController@editProfile']);
        Route::post('/profileimg', ['as' => 'admin.profile.image', 'uses' => 'UsersController@editProfileImage']);
        Route::post('/profilepass', ['as' => 'admin.profile.pass', 'uses' => 'UsersController@editProfilePass']);
        Route::get('/order', ['as' => 'admin.order', 'uses' => 'MessageController@order']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploadIcon', ['as' => 'admin.upload.icon', 'uses' => 'UploadController@getPost2']);
        Route::post('/uploadImage', ['as' => 'admin.upload.image', 'uses' => 'UploadController@getPost3']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});