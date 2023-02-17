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
//Route::redirect('/','/en');
// Route::get('/', function () {
//     return view('welcome');
// });
// use App\Http\Controllers\V1\QrCodeController;

// Route::get('/generate-qrcode', [QrCodeController::class, 'index']);


Route::any('/',['as' 	=>'homepage','uses' 	=>'HomeController@index']);
Route::any('homepage',['as' 	=>'homepage','uses' 	=>'HomeController@index']);
Route::any('calculator',['as' 	=>'calculator','uses' 	=>'HomeController@calculator']);
Route::get('/signup',['as' 	=>'signup','uses' =>'HomeController@signup']);
Route::post('/signup',['as'=>'signup.post','uses' =>'HomeController@postSignup']);
Route::get('/verify/{token}',['as'=>'verify.email','uses' =>'HomeController@verifyEmail']);
Route::any('/reset-password/{encryptCode}',['as'=>'reset-password','uses' =>'HomeController@resetPassword']);
Route::get('/login',['as' 	=>'login','uses' 	=>'HomeController@login']);
Route::get('/forgot-password',['as' 	=>'forgot-password','uses' 	=>'HomeController@forgotpassword']);
Route::post('/forgotPasswordsubmit',['as' 	=>'forgotPasswordsubmit','uses' 	=>'HomeController@forgotPasswordsubmit']);
Route::post('/verifylogin','HomeController@verifyLogin')->name('verifylogin');
Route::get('/how-its-work',['as'=>'howitswork','uses' 	=>'HomeController@howItsWork']);
Route::get('/contact-us',['as' 	=>'contactus','uses'=>'HomeController@contactUs']);
Route::post('/contact-us',['as' 	=>'contactus.post','uses'=>'HomeController@postContactUs']);
Route::get('/prohibited-items',['as' 	=>'prohibiteditems','uses'=>'HomeController@prohibitedItems']);
Route::get('/public-tracking',['as' 	=>'publictracking','uses'=>'HomeController@publicTracking']);
Route::get('/location',['as' 	=>'location','uses'=>'HomeController@location']);
Route::get('/faq',['as' 	=>'faq','uses'=>'HomeController@faq']);
Route::get('/about-us',['as' 	=>'aboutus','uses'=>'HomeController@aboutUs']);
Route::get('/getStates',['as'=>'getstates','uses'=>'DashboardController@getStates']);
Route::get('/tracking',['as'=>'tracking','uses'=>'HomeController@trackingDetail']);
Route::get('/insurance',['as' 	=>'insurance','uses'=>'HomeController@insurance']);


Route::group(['middleware' => 'frontenduser'], function () {
  //Route::get('/dashboard',['as'=>'dashboard','uses'=>'HomeController@dashboard']);
  Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@index']);
  Route::post('/create-shipment',['as'=>'createshipment','uses'=>'DashboardController@createShipment']);
  Route::post('/description',['as'=>'description','uses'=>'DashboardController@descriptionDetails']);
  Route::post('/package',['as'=>'package','uses'=>'DashboardController@packageDetails']);
  Route::post('/postage',['as'=>'postage','uses'=>'DashboardController@postageDetails']);
  Route::get('/import-shipment',['as'=>'import-shipment','uses'=>'ShipmentController@importshipment']);
  Route::post('/shipmentcsvImport',['as'=>'shipmentcsvImport','uses'=>'ShipmentController@shipmentcsvImport']);
  Route::any('/pending-shipment',['as'=>'pending-shipment','uses'=>'ShipmentController@pendingshipment']);
  Route::any('/tracking-detail',['as'=>'tracking-detail','uses'=>'ShipmentController@trackingdetail']);
  Route::any('/shipmentdelete',['as'=>'shipmentdelete','uses'=>'ShipmentController@shipmentdelete']);
  Route::any('/shipmentrefund',['as'=>'shipmentrefund','uses'=>'ShipmentController@shipmentrefund']);
  Route::get('/pendingshipment-list-table',['as'=>'pendingshipment.list.table','uses'=>'ShipmentController@pendingshipmentListTable']);
  Route::any('/intransit-shipment',['as'=>'intransit-shipment','uses'=>'ShipmentController@intransitshipment']);
  Route::get('/intransitshipment-list-table',['as'=>'intransitshipment.list.table','uses'=>'ShipmentController@intransitshipmentListTable']);
  Route::any('/delivered',['as'=>'delivered','uses'=>'ShipmentController@deliveredshipment']);
  Route::get('/deliveredshipment-list-table',['as'=>'deliveredshipment.list.table','uses'=>'ShipmentController@deliveredshipmentListTable']);
  Route::any('/exception',['as'=>'exception','uses'=>'ShipmentController@exceptionshipment']);
  Route::get('/exceptionshipment-list-table',['as'=>'exceptionshipment.list.table','uses'=>'ShipmentController@exceptionshipmentListTable']);
  Route::any('/return',['as'=>'return','uses'=>'ShipmentController@returnshipment']);
  Route::get('/returnshipment-list-table',['as'=>'returnshipment.list.table','uses'=>'ShipmentController@returnshipmentListTable']);
  Route::any('/archived',['as'=>'archived','uses'=>'ShipmentController@archivedshipment']);
  Route::get('/archivedshipment-list-table',['as'=>'archivedshipment.list.table','uses'=>'ShipmentController@archivedshipmentListTable']);
  Route::any('/void-shipment',['as'=>'void-shipment','uses'=>'ShipmentController@voidshipment']);
  Route::get('/voidshipment-list-table',['as'=>'voidshipment.list.table','uses'=>'ShipmentController@voidshipmentListTable']);
  Route::any('/all-shipment',['as'=>'all-shipment','uses'=>'ShipmentController@allshipment']);
  Route::get('/allshipment-list-table',['as'=>'allshipment.list.table','uses'=>'ShipmentController@allshipmentListTable']);
  Route::any('/userdelete',['as'=>'userdelete','uses'=>'ShipmentController@userdelete']);
  Route::any('/all-transaction',['as'=>'all-transaction','uses'=>'ShipmentController@alltransaction']);
  Route::get('/alltransaction-list-table',['as'=>'alltransaction.list.table','uses'=>'ShipmentController@transactionListTable']);
  Route::any('/payshipment',['as'=>'payshipment','uses'=>'ShipmentController@payshipment']);
  Route::any('/all-import',['as'=>'all-import','uses'=>'ShipmentController@allimport']);
  Route::get('/allimport-list-table',['as'=>'allimport.list.table','uses'=>'ShipmentController@importListTable']);
  Route::any('/importordersshipment',['as'=>'importordersshipment','uses'=>'ShipmentController@importordersshipment']);
  Route::get('/allimportselect',['as'=>'allimportselect','uses'=>'ShipmentController@allimportselect']);
  Route::any('/cancelordersshipment',['as'=>'cancelordersshipment','uses'=>'ShipmentController@cancelordersshipment']);
  Route::get('/allpendingselect',['as'=>'allpendingselect','uses'=>'ShipmentController@allpendingselect']);
  Route::any('/printshipment',['as'=>'printshipment','uses'=>'ShipmentController@printshipment']);

  
  Route::any('/add-credits',['as'=>'add-credits','uses'=>'ShipmentController@add_credit']);
  Route::any('/settings',['as'=>'settings','uses'=>'ShipmentController@settings']);
  Route::any('/account',['as'=>'account','uses'=>'ShipmentController@account']);
  Route::any('/profiledit',['as'=>'profiledit','uses'=>'ShipmentController@profiledit']);
  Route::post('/profilesubmit',['as'=>'profilesubmit','uses'=>'ShipmentController@profilesubmit']);
  Route::any('/businessedit',['as'=>'businessedit','uses'=>'ShipmentController@businessedit']);
  Route::post('/businessesubmit',['as'=>'businessesubmit','uses'=>'ShipmentController@businessesubmit']);
  Route::any('/change-password',['as'=>'change-password','uses'=>'ShipmentController@changepassword']);
  Route::post('/changepasswordsubmit',['as'=>'changepasswordsubmit','uses'=>'ShipmentController@changepasswordsubmit']);
  Route::any('/suggested-addressinsert',['as'=>'suggested-addressinsert','uses'=>'DashboardController@suggested_address']);
  Route::post('/stripe-payment',['as'=>'stripe-payment','uses'=>'ShipmentController@stripePayment']);
  Route::get('/signout',['as'=>'signout','uses'=>'HomeController@signout']);
  Route::any('/generate-pdf/{id}',['as'=>'generate-pdf','uses' =>'ShipmentController@generatepdf']);
});  

Route::get('clear_cache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    dd("Cache is cleared");

});
Route::get('/view-xml', function () {
    $users = App\Models\User::all();
    return response()->xml(['content' => $users->toArray()]);
});


/* Start Admin's route */

Route::group(["prefix" => "admin","namespace"=>"admin", 'as' => 'admin.'], function() {
       
        Route::get('/test', 'AuthController@test');
        Route::any('/active-link/{encryptCode}','UserController@activelink')->name('active.link');

        Route::get('/', 'AuthController@index');
        Route::get('/login', 'AuthController@index')->name('login');
        Route::post('/authentication','AuthController@verifyCredentials')->name('authentication');
        Route::any('/forgot-password', 'AuthController@forgotPassword')->name('forgot.password');

                Route::group(['middleware' => 'admin'], function () {
                    Route::get('/dashboard', 'DashboardController@dashboardView')->name('dashboard');
                    Route::any('/settings', 'DashboardController@settings')->name('settings');
                    Route::get('/logout', 'AuthController@logout')->name('logout');
                    Route::get('/change-password','DashboardController@showChangePasswordForm')->name('changePassword');
                    Route::post('/change-password','DashboardController@changePassword')->name('changePassword');
                    //country module routing start.
                    Route::get('/country-list', 'CountryController@countryList')->name('country.list');
                    Route::get('/country-list-table', 'CountryController@countryListTable')->name('country.list.table');
                    Route::post('/countryImport', 'CountryController@countryImport')->name('countryImport');
                    Route::any('/price-add','CountryController@priceAdd')->name('price-add');
                    Route::any('/generate-token','CountryController@generate_token')->name('generate-token');
                    Route::any('/get-order','CountryController@get_orders')->name('get-order');
                    Route::any('/delete/{encryptCode}', 'DashboardController@categoryDelete')->name('delete');
                    Route::get('/reset-category-status/{encryptCode}','DashboardController@resetcategoryStatus')->name('reset-category-status');
                    //insurance price routing
                    Route::get('/insurance-price-list', 'ShipmentController@priceList')->name('insurance-price.list');
                    Route::get('/insurance-price-list-table', 'ShipmentController@priceListTable')->name('insurance-price.list.table');
                    Route::any('/insurance-price-edit/{encryptCode}', 'ShipmentController@priceEdit')->name('price.edit');
                    //support management routing
                    Route::get('/support-list', 'SupportController@supportList')->name('support.list');
                    Route::get('/support-list-table', 'SupportController@supportListTable')->name('support.list.table');
                    Route::get('/support-delete/{encryptCode}','SupportController@supportDelete')->name('support-delete');
                    //Coupon management routing
                    Route::get('/coupon-list', 'CouponController@couponList')->name('coupon.list');
                    Route::get('/coupon-list-table', 'CouponController@couponListTable')->name('coupon.list.table');
                    Route::any('/coupon-add','CouponController@couponAdd')->name('coupon-add');
                    Route::any('/coupon-edit/{encryptCode}', 'CouponController@couponEdit')->name('coupon.edit');
                    Route::post('/coupon-edit-submit/{encryptCode}', 'CouponController@couponEdit')->name('coupon-editSubmit');
                    Route::get('/coupon-delete/{encryptCode}','CouponController@couponDelete')->name('coupon-delete');
                    //Notification management routing
                    Route::get('/notification-list', 'NotificationController@notificationList')->name('notification.list');
                    Route::get('/notification-list-table', 'NotificationController@notificationListTable')->name('notification.list.table');
                    Route::any('/notification-add','NotificationController@notificationAdd')->name('notification-add');
                    Route::any('/notification-edit/{encryptCode}', 'NotificationController@notificationEdit')->name('notification.edit');
                    Route::post('/notification-edit-submit/{encryptCode}', 'NotificationController@notificationEdit')->name('notification-editSubmit');
                    Route::get('/notification-delete/{encryptCode}','NotificationController@notificationDelete')->name('notification-delete');
                     //Profit management routing
                     Route::get('/profit-list', 'NotificationController@profitList')->name('profit.list');
                     Route::get('/profit-list-table', 'NotificationController@profitListTable')->name('profit.list.table');
                     Route::any('/profit-edit/{encryptCode}', 'NotificationController@profitEdit')->name('profit.edit');
                     Route::post('/profit-edit-submit/{encryptCode}', 'NotificationController@profitEdit')->name('profit-editSubmit');
                    //Shipment management routing
                    Route::get('/shipment-list', 'ShipmentController@shipmentList')->name('shipment.list');
                    Route::get('/shipment-list-table', 'ShipmentController@shipmentListTable')->name('shipment.list.table');
                    Route::any('/shipment-edit/{encryptCode}', 'ShipmentController@shipmentEdit')->name('shipment.edit');
                    Route::post('/shipment-edit-submit/{encryptCode}', 'ShipmentController@shipmentEdit')->name('shipment-editSubmit');
                    Route::get('/shipment-delete/{encryptCode}','ShipmentController@shipmentDelete')->name('shipment.delete');
                    Route::get('/detail/{encryptCode}', 'ShipmentController@shipmentDetail')->name('shipment.detail');
                    Route::get('/tracking/{encryptCode}', 'ShipmentController@trackingDetail')->name('shipment.tracking-detail');
                    //Shipment Tracking routing
                    Route::get('/shipment-track-list', 'ShipmentController@shipmenttrackList')->name('shipment-track.list');
                    Route::get('/shipment-track-list-table', 'ShipmentController@shipmentTrackListTable')->name('shipment-track.list.table');
                    Route::get('/shipment-track-update-status/{encryptCode}','ShipmentController@shipmentTrackStatus')->name('shipment.tracking-update');
                    //Report management routing
                    Route::get('/report-list', 'ReportController@reportList')->name('report.list');
                    Route::get('/report-list-table', 'ReportController@reportListTable')->name('report.list.table');
                    Route::get('/report-download', 'ReportController@downloadtransactionPdf')->name('report-download');
                    //State management routing
                    Route::get('/state-list', 'StateController@stateList')->name('state.list');
                    Route::get('/state-list-table', 'StateController@stateListTable')->name('state.list.table');
                    Route::any('/state-add','StateController@stateAdd')->name('state-add');
                    Route::any('/state-edit/{encryptCode}', 'StateController@stateEdit')->name('state.edit');
                    Route::post('/state-edit-submit/{encryptCode}', 'StateController@stateEdit')->name('state-editSubmit');
                    Route::get('/state-delete/{encryptCode}','StateController@stateDelete')->name('state-delete');
                    Route::get('/reset-state-status/{encryptCode}','StateController@resetstateStatus')->name('reset-state-status');


                Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {

                    Route::get('/role-list', 'RoleController@roleList')->name('role-list');
                    Route::any('/role-add','RoleController@roleAdd')->name('role-add');
                    Route::any('/role-permission/{encryptCode}','RoleController@rolePermission')->name('role.permission');
                    Route::get('/edit/{id}', 'RoleController@editRole')->name('edit')->where('id','[0-9]+');
                    Route::post('/edit-submit/{id}', 'RoleController@editRole')->name('editSubmit')->where('id','[0-9]+');
                    Route::get('/delete/{id}', 'RoleController@roleDelete')->name('delete')->where('id','[0-9]+');
                    Route::get('/reset-role-status/{encryptCode}','RoleController@resetRoleStatus')->name('reset-role-status');
                    //staff management routes
                    Route::get('/admin-user-list', 'UserController@userList')->name('user.list');
                    Route::get('/user-list-table', 'UserController@userListTable')->name('user.list.table');
                    Route::any('/user-add','UserController@userAdd')->name('user.add');
                    Route::get('/user-edit/{encryptCode}', 'UserController@userEdit')->name('user-edit');
                    Route::post('/user-edit-submit/{encryptCode}', 'UserController@userEdit')->name('user-editSubmit');
                    Route::any('/user-change-password/{encryptCode}', 'UserController@userChangePassword')->name('user-changepassword');
                    Route::get('/user-delete/{encryptCode}','UserController@userDelete')->name('user-delete');
                    Route::get('/reset-user-status/{encryptCode}','UserController@resetuserStatus')->name('reset-user-status');
                    //Frontend users routes
                    Route::get('/front-user-list', 'UserController@frontuserList')->name('front-user.list');
                    Route::get('/front-user-list-table', 'UserController@frontuserListTable')->name('front-user.list.table');
                    Route::any('/front-user-add','UserController@frontuserAdd')->name('front-user.add');
                    Route::get('/front-user-edit/{encryptCode}', 'UserController@frontuserEdit')->name('front-user-edit');
                    Route::post('/front-user-edit-submit/{encryptCode}', 'UserController@frontuserEdit')->name('front-user-editSubmit');
                    Route::any('/user-change-password/{encryptCode}', 'UserController@userChangePassword')->name('user-changepassword');
                    Route::get('/front-user-delete/{encryptCode}','UserController@frontuserDelete')->name('front-user-delete');
                    Route::get('/front-reset-user-status/{encryptCode}','UserController@frontresetuserStatus')->name('front-reset-user-status');

                });
                
                Route::group(['prefix' => 'cms-management', 'as' => 'cms-management.'], function () {
                  Route::get('/list', 'CmsManageController@cmsList')->name('list');
                  Route::get('/cms-list-table', 'CmsManageController@cmsListTable')->name('list.table');
                  Route::any('/add', 'CmsManageController@cmsAdd')->name('cms.add');
                  Route::any('/edit/{encryptCode}', 'CmsManageController@cmsEdit')->name('edit');
                  Route::any('/delete/{encryptCode}', 'CmsManageController@cmsDelete')->name('delete');
                  Route::get('/reset-cms-status/{encryptCode}','CmsManageController@resetcmsStatus')->name('reset-cms-status');
                  Route::get('/view/{encryptCode}', 'CmsManageController@view')->name('view');
              });

                   


                });
        
    
});

