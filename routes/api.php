<?php

use App\Http\Controllers\ListUsersController;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiregistrationController;
use App\Http\Controllers\ShuttleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * ---------------
 * Organisers
 * ---------------
 */
Route::post('/inscription',  [ListUsersController::class, 'inscrit']);

/*
 * ---------------
 * Events
 * ---------------
 */
Route::resource('events', API\EventsApiController::class);


/*
 * ---------------
 * Attendees
 * ---------------
 */
Route::resource('attendees', API\AttendeesApiController::class);



/*
 * ---------------
 * Registration
 * ---------------
 */
Route::post('/email/password', [ApiregistrationController::class ,'emailPassword']);
Route::post('/verifEmail', [ApiregistrationController::class ,'verifEmail']);
Route::post('/payment', [ApiregistrationController::class ,'payment']);
Route::get('/listSponsors', [ApiregistrationController::class ,'listSponsors']);
Route::get('/listProgram', [ApiregistrationController::class ,'listProgram']);
Route::post('/email', [ApiregistrationController::class ,'Email']);
Route::get('/allusers', [ApiregistrationController::class ,'allUsers']);
Route::post('/edituser/{tab}/{id}', [ApiregistrationController::class ,'edituser']);
Route::get('/listspeakers', [ApiregistrationController::class ,'listSpeakers']);
Route::get('/listEvent', [ApiregistrationController::class ,'listNamesEvent']);
Route::get('/event/{id}', [ApiregistrationController::class ,'fetchOneEvent']);
Route::get('/invitation/{id}', [ListUsersController::class ,'invitation']);
Route::get('/checkuser/{id}', [ApiregistrationController::class ,'checkuser']);
Route::get('/send_email/{tab}/{id}', [ApiregistrationController::class ,'mail']);
Route::get('/edit_email/{tab}/{id}', [ApiregistrationController::class ,'editMail']);
Route::post('/registration/mail', [ApiregistrationController::class, 'mailapi']);
Route::post('/newDelegate', [ApiregistrationController::class ,'newdelegate']);
Route::post('/registration', [ApiregistrationController::class ,'create']);
Route::get('/ARcountry', [ApiregistrationController::class ,'ARcountry']);
Route::get('/ENcountry', [ApiregistrationController::class ,'ENcountry']);
Route::get('/RUcountry', [ApiregistrationController::class ,'RUcountry']);
Route::get('/EScountry', [ApiregistrationController::class ,'EScountry']);
Route::get('/FRcountry', [ApiregistrationController::class ,'FRcountry']);
Route::get('/listShuttle', [ShuttleController::class ,'listShuttles']);
Route::post('/shuttles', [ShuttleController::class ,'createShuttle']);
Route::put('/shuttles', [ShuttleController::class ,'updateShuttle']);
Route::get('/shuttles', [ShuttleController::class ,'findCurrentShuttle']);



/*
 * ---------------
 * Orders
 * ---------------
 */

/*
 * ---------------
 * Users
 * ---------------
 */

/*
 * ---------------
 * Check-In / Check-Out
 * ---------------
 */
