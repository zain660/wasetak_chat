<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::post('/login_post', [App\Http\Controllers\Auth\LoginController::class, 'login_post'])->name('login_post');

Route::post('/save_device_token', [App\Http\Controllers\HomeController::class, 'save_device_token'])->name('save_device_token');
Route::get('/sendNotification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('sendNotification');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Conversation/{id}/{name}', [App\Http\Controllers\HomeController::class, 'conversation'])->name('Conversation/{id}/{name}');
Route::post('/send_message/{id}', [App\Http\Controllers\HomeController::class, 'send_message'])->name('send_message/{id}');
Route::get('/block/{id}', [App\Http\Controllers\HomeController::class, 'block'])->name('block/{id}');
Route::get('/unblock/{id}', [App\Http\Controllers\HomeController::class, 'unblock'])->name('unblock/{id}');
Route::post('/create_group', [App\Http\Controllers\HomeController::class, 'create_group'])->name('create_group');
Route::post('/add_member/{id}', [App\Http\Controllers\HomeController::class, 'add_member'])->name('add_member/{id}');
Route::get('/Group/{id}/{name}', [App\Http\Controllers\HomeController::class, 'group'])->name('Group/{id}/{name}');
Route::get('/leave_group/{id}', [App\Http\Controllers\HomeController::class, 'leave_group'])->name('leave_group/{id}');
Route::get('/make_host/{group_id}/{member_id}', [App\Http\Controllers\HomeController::class, 'make_host'])->name('make_host/{group_id}/{member_id}');
Route::get('/kick_out/{group_id}/{member_id}', [App\Http\Controllers\HomeController::class, 'kick_out'])->name('kick_out/{group_id}/{member_id}');
Route::post('/send_message_to_group/{id}', [App\Http\Controllers\HomeController::class, 'send_message_to_group'])->name('send_message_to_group/{id}');
Route::get('/pricing', [App\Http\Controllers\Auth\LoginController::class, 'pricing'])->name('front.pricing');
Route::get('/payforsubscribe/{id}', [App\Http\Controllers\HomeController::class, 'payforsubscribe'])->name('front.payforsubscribe');
Route::get('package_expiration', [App\Http\Controllers\HomeController::class, 'package_expiration'])->name('front.package_expiration');
Route::get('success-transaction/{id}', [App\Http\Controllers\HomeController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [App\Http\Controllers\HomeController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::post('/change_profile_pic', [App\Http\Controllers\HomeController::class, 'change_profile_pic'])->name('change_profile_pic');
Route::post('/update_profile_info', [App\Http\Controllers\HomeController::class, 'update_profile_info'])->name('update_profile_info');

// ADMIN ROUTES
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/all-users', [App\Http\Controllers\AdminController::class, 'all_users'])->name('admin.allusers');

Route::get('/admin/deactive_user/{id}', [App\Http\Controllers\AdminController::class, 'deactive_user'])->name('admin.deactive_user');
Route::get('/admin/active_user/{id}', [App\Http\Controllers\AdminController::class, 'active_user'])->name('admin.active_user');
Route::get('/admin/deactive-users', [App\Http\Controllers\AdminController::class, 'all_deactive_users'])->name('admin.deactive_users');
Route::get('/admin/active-users', [App\Http\Controllers\AdminController::class, 'all_active_users'])->name('admin.all_active_users');
Route::get('/admin/all-packages', [App\Http\Controllers\AdminController::class, 'all_packages'])->name('admin.all_packages');
Route::get('/admin/create-packages', [App\Http\Controllers\AdminController::class, 'create_package'])->name('admin.create_package');
Route::post('/admin/create-packages', [App\Http\Controllers\AdminController::class, 'add_package'])->name('admin.add_package');
Route::get('/admin/active-package/{id}', [App\Http\Controllers\AdminController::class, 'activate_package'])->name('admin.activate_package');
Route::get('/admin/deactive-package/{id}', [App\Http\Controllers\AdminController::class, 'deactivate_package'])->name('admin.deactivate_package');
Route::get('/admin/edit-packages/{id}', [App\Http\Controllers\AdminController::class, 'edit_package'])->name('admin.edit_package');
Route::post('/admin/update_packages/{id}', [App\Http\Controllers\AdminController::class, 'update_packages'])->name('admin.update_packages');

Route::Get('/admin/UserChat', [App\Http\Controllers\AdminController::class, 'UserChat'])->name('admin.UserChat');

Route::get('/admin/UserChat/{id}', [App\Http\Controllers\AdminController::class, 'Chat_conv'])->name('admin.chat_conv');

Route::get('/admin/chats/{id}', [App\Http\Controllers\AdminController::class, 'chats'])->name('admin.chats');

Route::Get('/admin/Allusergroup', [App\Http\Controllers\AdminController::class, 'Allusergroup'])->name('admin.Allusergroup');

Route::get('/admin/usergroup/{id}', [App\Http\Controllers\AdminController::class, 'usergroup'])->name('admin.usergroup');

Route::get('/admin/groupchat/{id}', [App\Http\Controllers\AdminController::class, 'groupchat'])->name('admin.groupchat');

// Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'dashuser'])->name('admin.home');
