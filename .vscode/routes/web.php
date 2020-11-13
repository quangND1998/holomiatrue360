<?php
use IIlluminate\Routing\RouteFileRegistrar;
use Spatie\Analytics\Period;
Route::group(['middleware' => ['lang']], function() {
    Route::get('/', function () { return redirect('/admin/dashboard'); });

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
    Route::post('login', 'Auth\LoginController@login')->name('auth.login');
    Route::get('logout', 'Auth\LoginController@logout_user')->name('auth.logout');

    //Change Password Routes...
    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
    Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
    Route::get('login/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
   
    ///NGa
    Route::group(['prefix' => 'project'], function () {
        Route::get('{title}','Project\ProjectController@public_project');
        Route::group(['prefix' => '{title}'], function () {
            Route::get('generalview/{id}/modelar/','Project\ProjectController@general_view_modelar');
            Route::get('subdivisionview/{id}/modelar/','Project\ProjectController@subdivision_view_modelar');
            Route::get('map','Project\ProjectController@map_project')->name('public.map');
            Route::get('showflat/{id}','Project\ProjectController@showflat')->name('public.showflat');
            Route::get('subdivisionview/{id}','Subdivision\SubdivisionController@showArea')->name('public.subdivision');
            Route::get('ground/{id}','Ground\GroundController@showGround')->name('public.ground');
        });
    });
    Route::get('public/data/{id}','Project\ProjectController@returndata')->name('public.data');

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('dashboard','DaskBoard\DashBoardController@index')->name('dashboard');
        Route::get('/home', 'HomeController@index');
        Route::resource('permissions', 'Admin\PermissionsController');
        Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
        Route::resource('roles', 'Admin\RolesController');
        Route::post('roles/update_role/{id}','Admin\RolesController@update_role')->name('roles.update_role');
        Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
        Route::resource('users', 'Admin\UsersController');
        Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

        Route::resource('project', 'Project\ProjectController');
        Route::get('project/view/{id}','Project\ProjectController@view')->name('project.view');

        Route::get('google-analytics-summary','DaskBoard\DashBoardController@getAnalyticsSummary')->name('google-analytics-summary');


        //userProfile
        Route::get('/user-profile','UserProfile\UserProfileController@index')->name('profile.index');
        Route::group(['prefix' => 'project'], function () {

            Route::resource('info', 'Project\InfoProjectController');
            Route::get('/{id}/info/create','Project\InfoProjectController@showProject')->name('info.showProject');
            Route::get('/{id}/info/edit','Project\InfoProjectController@editProject')->name('info.editProject');
            Route::get('/{id}/info', 'Project\InfoProjectController@getinfo')->name('info.getinfo');
            Route::resource('general', 'GeneralView\GeneralViewController');
            Route::get('/{id}/general','GeneralView\GeneralViewController@showGeneral')->name('general.showGeneral');
            Route::get('/{id}/general/create_present_img','GeneralView\GeneralViewController@createpresent')->name('general.createpresent');
            Route::get('/{id}/general/edit_present_img','GeneralView\GeneralViewController@editPresent')->name('general.edit');
            Route::get('/{id}/general/show_img_night','GeneralView\GeneralViewController@show_img_night')->name('general.show_img_night');
            Route::get('/{id}/general/edit_img_night','GeneralView\GeneralViewController@edit_img_night')->name('general.edit_img_night');

            Route::get('/{id}/general/show_img_day','GeneralView\GeneralViewController@show_img_day')->name('general.show_img_day');
            Route::get('/{id}/general/edit_img_day','GeneralView\GeneralViewController@edit_img_day')->name('general.edit_img_day');

            Route::put('/{id}/general/storePresentImg','GeneralView\GeneralViewController@storePresentImg')->name('general.storePresentImg');

            Route::put('/{id}/general/updatePresentImg','GeneralView\GeneralViewController@updatePresentImg')->name('general.updatePresentImg');
            Route::put('/{id}/general/storeImgNight_Day','GeneralView\GeneralViewController@storeImgNight_Day')->name('general.storeImgNight_Day');
            Route::put('/{id}/general/updateImgNight_Day','GeneralView\GeneralViewController@updateImgNight_Day')->name('general.updateImgNight_Day');
            Route::resource('model_ar','ModelAr\ModelArController');
            Route::get('/{id}/general/model_ar/createAndroid_IOS','ModelAr\ModelArController@createAndroid_IOS')->name('model_ar.createAndroid_IOS');
            Route::get('/{id}/general/model_ar/editAndroid_IOS','ModelAr\ModelArController@editAndroid_IOS')->name('model_ar.editAndroid_IOS');
            Route::put('/{id}/model_ar/generalstore','ModelAr\ModelArController@generalstore')->name('model_ar.generalstore');
            Route::put('/{id}/model_ar/subdivisionstore','ModelAr\ModelArController@subdivisionstore')->name('model_ar.subdivisionstore');
            Route::put('/{id}/model_ar/updatesubdivision','ModelAr\ModelArController@updatesubdivision')->name('model_ar.updatesubdivision');

            Route::put('/{id}/model_ar/generalstore','ModelAr\ModelArController@generalstore')->name('model_ar.generalstore');

            // Subdivision
            Route::resource('subdivision', 'Subdivision\SubdivisionController');
            Route::get('/{id}/subdivision','Subdivision\SubdivisionController@showSubdivision')->name('subdivision.showSubdivision');
            Route::get('/{id}/subdivision/createsubdivision','Subdivision\SubdivisionController@createsubdivision')->name('subdivision.createsubdivsision');
            Route::put('/{id}/subdivision/storesubdivision','Subdivision\SubdivisionController@storesubdivision')->name('subdivision.storesubdivision');
            Route::get('/{id}/subdivision/manager','Subdivision\SubdivisionController@manager')->name('subdivision.manager');
            //Subdivision/Model_AR
            Route::get('/{id}/subdivision/model_ar','Subdivision\SubdivisionController@viewModelAR')->name('subdivision.model_ar');
            Route::get('/{id}/subdivision/create_model_ar','Subdivision\SubdivisionController@create_model_ar')->name('subdivision.create_model_ar');
            Route::get('/{id}/model_ar/create_model_ar','Subdivision\SubdivisionController@create_model_ar')->name('model_ar.create_model_ar');
            //Edit
            Route::get('/{id}/subdivision/edit_model_ar','Subdivision\SubdivisionController@update_model_ar')->name('subdivision.update_model_ar');

            Route::get('/{id}/subdivision/ground','Subdivision\SubdivisionController@createground')->name('subdivision.creatground');

            //Subdivision/Ground
            Route::resource('ground', 'Ground\GroundController');
            Route::get('ground/edit/{id}','Ground\GroundController@editGround')->name('ground.editGround');
            Route::put('ground/storeGround/{id}','Ground\GroundController@storeGround')->name('ground.storeGround');
            Route::put('ground/updateGround/{id}','Ground\GroundController@updateGround')->name('ground.updateGround');
            Route::delete('ground/deleteGround/{id}','Ground\GroundController@destroy')->name('ground.destroy');
            
            ///ShowFlat
            Route::get('/{id}/showflat','ShowFlat\ShowFlatController@showFlat')->name('showflat.show');
            Route::put('showflat/storeShowFlat/{id}','ShowFlat\ShowFlatController@storeShowFlat')->name('showflat.storeShowFlat');
            Route::get('/{name}/showflat/{id}/edit','ShowFlat\ShowFlatController@edit')->name('showflat.edit');
            Route::put('/{name}/showflat/{id}/update/','ShowFlat\ShowFlatController@update')->name('showflat.update');
            Route::delete('showflat/delete/{id}','ShowFlat\ShowFlatController@destroy')->name('showflat.destroy');
            
            //Map
            Route::get('/{id}/map','Map\MapController@show')->name('map.show');
            Route::put('map/map_store/{id}','Map\MapController@map_store')->name('map.map_store');
            Route::get('{name}/map/edit/{id}','Map\MapController@edit')->name('map.edit');
            Route::put('{name}/map_update/{id}','Map\MapController@update')->name('map.update');
            
            //Address
            Route::get('/{id}/address','Project\AddressProjectController@show')->name('address.show');
            Route::get('{name}/address/edit/{id}','Project\AddressProjectController@edit')->name('address.edit');
            Route::post('address_store','Project\AddressProjectController@addressStore')->name('address.address_store');
            Route::put('{name}/address/address_update/{id}','Project\AddressProjectController@updateAddress')->name('address.updateAddress');



            //Amentites
            Route::get('/{id}/amentities','Amentities\AmentitiesController@getAll')->name('amentities.show');
            Route::get('/{id}/amentities/create','Amentities\AmentitiesController@createAmentities')->name('amentities.create');
            Route::put('amentities/amentities_store/{id}','Amentities\AmentitiesController@store')->name('amentities.store');
            Route::get('{id}/amentities/{name}/createFolder','Amentities\AmentitiesController@newFolder')->name('amentities.createFoler');
            Route::get('{id}/amentities/{name}/showImage','Amentities\AmentitiesController@showImage')->name('amentities.showImage');
            Route::get('/{id}/amentities/create3Dimage','Amentities\AmentitiesController@create3Dimage')->name('amentities.create3Dimage');
            Route::put('amentities/3Dimage_store/{id}','Amentities\AmentitiesController@store3Dimage')->name('amentities.3Dimage_store');
            //UserProfile
          
        });
});
//Project
/*
    Project
*/
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/data',function(){
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
   dd($analyticsData);

});
