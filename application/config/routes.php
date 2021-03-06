<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['sign-out'] = 'auth/signout';
$route['auth/newPassword/(:any)'] = 'auth/newPassword';

$route['my-quiz'] = 'welcome/myQuiz'; 
$route['my-course'] = 'welcome/myCourse';
$route['my-bookmark'] = 'welcome/myBookmark';
$route['my-exam'] = 'welcome/myExam';
$route['my-certification'] = 'welcome/myCertification';
$route['quiz-history-report/(:any)'] = 'welcome/quizHistoryReport';

$route['browse-course'] = 'home/browse_course';
$route['browse-quiz'] = 'home/browse_quiz';
$route['show-course/(:any)'] = 'home/show_course';
$route['take-quiz'] = 'home/take_quiz';
$route['start-quiz'] = 'home/start_quiz';
$route['show-quiz/(:any)'] = 'home/show_quiz';

$route['membership-plan'] = 'home/membership_plan';

$route['license'] = 'home/license';
$route['subscription'] = 'home/subscription';
$route['legal-notice'] = 'home/legal_notice';
$route['privacy-policy'] = 'home/privacy_policy';
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['faq'] = 'home/faq';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
