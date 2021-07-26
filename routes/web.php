<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
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
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    $featured_courses = Course::join('users', 'users.id', '=', 'courses.teachers')
    ->where('courses.featured',1)
    ->get();
    return view('WebSite.home',compact('featured_courses'));
});

Auth::routes();

Route::get('/dashbord', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\WebSiteController::class, 'index'])->name('Home');

Route::post('/create-newsletter', [App\Http\Controllers\WebSiteController::class, 'create_newsletter'])->name('create_newsletter');
//   regietr by site
Route::get('/trainers', [App\Http\Controllers\WebSiteController::class, 'trainers'])->name('trainers');
Route::post('/create-trainers', [App\Http\Controllers\WebSiteController::class, 'create_trainers'])->name('create_trainers');
Route::get('Accreditation_bodies', [App\Http\Controllers\WebSiteController::class, 'accreditation_bodies'])->name('web_accreditation_bodies');
Route::post('/create-Accreditation-bodies', [App\Http\Controllers\WebSiteController::class, 'create_accreditation_bodies'])->name('web_create_accreditation_bodies');
Route::get('advisory-board', [App\Http\Controllers\WebSiteController::class, 'advisoryBoard'])->name('advisory-board');
Route::get('forum', [App\Http\Controllers\WebSiteController::class, 'Forum'])->name('forum');
Route::get('discussion/form', [App\Http\Controllers\ForumController::class, 'discussion_form'])->name('discussion-form');
Route::get('/contact-us', [App\Http\Controllers\WebSiteController::class, 'contact_us'])->name('contact_us');
Route::post('/create-contact-us', [App\Http\Controllers\WebSiteController::class, 'create_contact_us'])->name('create_contact_us');





Route::group(['middleware' => 'admin'], function()
{
/////////// newsletter //////////
Route::get('/newslatters', [App\Http\Controllers\AdminController::class, 'newsletter'])->name('newsletter');
Route::post('/news/Mvodata', [App\Http\Controllers\AdminController::class, 'get_news_data'])->name('get_news_data');

////////// contact us ////////////////
Route::get('/contact_us', [App\Http\Controllers\AdminController::class, 'contact'])->name('contact');



////////  teacher /////////
Route::get('/teachers', [App\Http\Controllers\AdminController::class, 'teacher'])->name('teacher');
Route::get('/add-teachers', [App\Http\Controllers\AdminController::class, 'add_teacher'])->name('add_teacher');
Route::post('/create-teachers', [App\Http\Controllers\AdminController::class, 'create_teacher'])->name('create_teacher');
Route::get('/edit-teachers/{id}', [App\Http\Controllers\AdminController::class, 'edit_teacher'])->name('edit_teacher');
Route::post('/update-teachers/{id}', [App\Http\Controllers\AdminController::class, 'update_teacher'])->name('update_teacher');
Route::post('/delete-teachers', [App\Http\Controllers\AdminController::class, 'destroy_teacher'])->name('destroy_teacher');
Route::post('/teacher', [App\Http\Controllers\AdminController::class, 'getTeacher'])->name('admin.getTeacher');


////////// section /////////
Route::get('/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
Route::get('/add-categories', [App\Http\Controllers\AdminController::class, 'add_categories'])->name('add_categories');
Route::post('/create-categories', [App\Http\Controllers\AdminController::class, 'create_categories'])->name('create_categories');
Route::get('/edit-categories/{id}', [App\Http\Controllers\AdminController::class, 'edit_categories'])->name('edit_categories');
Route::post('/update-categories/{id}', [App\Http\Controllers\AdminController::class, 'update_categories'])->name('update_categories');
Route::get('/delete-categories/{id}', [App\Http\Controllers\AdminController::class, 'destroy_categories'])->name('destroy_categories');
Route::get('/courses/cat_id/{id}', [App\Http\Controllers\AdminController::class, 'show_courses_categories'])->name('show_courses_categories');

/////// Training Need ///////
Route::get('/trainings', [App\Http\Controllers\AdminController::class, 'trainings'])->name('trainings');
Route::get('/add-trainings', [App\Http\Controllers\AdminController::class, 'add_trainings'])->name('add_trainings');
Route::post('/create-trainings', [App\Http\Controllers\AdminController::class, 'create_trainings'])->name('create_trainings');
Route::get('/edit-trainings/{id}', [App\Http\Controllers\AdminController::class, 'edit_trainings'])->name('edit_trainings');
Route::post('/update-trainings/{id}', [App\Http\Controllers\AdminController::class, 'update_trainings'])->name('update_trainings');
Route::get('/delete-trainings/{id}', [App\Http\Controllers\AdminController::class, 'destroy_trainings'])->name('destroy_trainings');
Route::get('/courses-teacher_id/{id}', [App\Http\Controllers\AdminController::class, 'teacher_courses'])->name('teacher_courses');

/////// Accrediting Bodies ///////
Route::get('/accreditation-bodies', [App\Http\Controllers\AdminController::class, 'accreditation_bodies'])->name('accreditation_bodies');
Route::get('/add-accreditation-bodies', [App\Http\Controllers\AdminController::class, 'add_accreditation_bodies'])->name('add_accreditation_bodies');
Route::post('/create-accreditation-bodies', [App\Http\Controllers\AdminController::class, 'create_accreditation_bodies'])->name('create_accreditation_bodies');
Route::get('/edit-accreditation-bodies/{id}', [App\Http\Controllers\AdminController::class, 'edit_accreditation_bodies'])->name('edit_accreditation_bodies');
Route::post('/update-accreditation-bodies/{id}', [App\Http\Controllers\AdminController::class, 'update_accreditation_bodies'])->name('update_accreditation_bodies');
Route::get('/delete-accreditation-bodies/{id}', [App\Http\Controllers\AdminController::class, 'destroy_accreditation_bodies'])->name('destroy_accreditation_bodies');
Route::get('/courses/acc_body/{id}', [App\Http\Controllers\AdminController::class, 'show_courses_accreditation_bodies'])->name('show_courses_accreditation_bodies');

/////// Course ///////
Route::get('/courses', [App\Http\Controllers\AdminController::class, 'courses'])->name('courses');
Route::get('/add-courses', [App\Http\Controllers\AdminController::class, 'add_courses'])->name('add_courses');
Route::post('/create-courses', [App\Http\Controllers\AdminController::class, 'create_courses'])->name('create_courses');
Route::get('/edit-courses/{id}', [App\Http\Controllers\AdminController::class, 'edit_courses'])->name('edit_courses');
Route::post('/update-courses/{id}', [App\Http\Controllers\AdminController::class, 'update_courses'])->name('update_courses');
Route::get('/delete-courses/{id}', [App\Http\Controllers\AdminController::class, 'destroy_courses'])->name('destroy_courses');
Route::get('/feature-courses/{id}', [App\Http\Controllers\AdminController::class, 'feature_courses'])->name('feature_courses');

/////// Diplomas ///////
Route::get('/bundles', [App\Http\Controllers\AdminController::class, 'diploma'])->name('diploma');
Route::get('/add-bundles', [App\Http\Controllers\AdminController::class, 'add_diploma'])->name('add_diploma');
Route::post('/create-bundles', [App\Http\Controllers\AdminController::class, 'create_diploma'])->name('create_diploma');
Route::get('/edit-bundles/{id}', [App\Http\Controllers\AdminController::class, 'edit_diploma'])->name('edit_diploma');
Route::post('/update-bundles/{id}', [App\Http\Controllers\AdminController::class, 'update_diploma'])->name('update_diploma');
Route::get('/delete-bundles/{id}', [App\Http\Controllers\AdminController::class, 'destroy_diploma'])->name('destroy_diploma');

////////// Asynchronous Lessons //////////
Route::get('/lessons', [App\Http\Controllers\AdminController::class, 'lessons'])->name('lessons');
Route::get('/add-lessons', [App\Http\Controllers\AdminController::class, 'add_lessons'])->name('add_lessons');
Route::post('/create-lessons', [App\Http\Controllers\AdminController::class, 'create_lessons'])->name('create_lessons');
Route::get('/edit-lessons/{id}', [App\Http\Controllers\AdminController::class, 'edit_lessons'])->name('edit_lessons');
Route::post('/update-lessons/{id}', [App\Http\Controllers\AdminController::class, 'update_lessons'])->name('update_lessons');
Route::get('/delete-lessons/{id}', [App\Http\Controllers\AdminController::class, 'destroy_lessons'])->name('destroy_lessons');


//front end routes
Route::get('course/{slug}', [App\Http\Controllers\WebSiteController::class, 'singleCourse'])->name('singlecourse');
//checkout
Route::get('course/checkout/{id}', [App\Http\Controllers\WebSiteController::class, 'checkout'])->name('checkout');
//cart
Route::get('course/cart/{slug}', [App\Http\Controllers\WebSiteController::class, 'cart'])->name('cart');
Route::get('delete/cart/product/{id}', [App\Http\Controllers\WebSiteController::class, 'deletecartproduct'])->name('deletecartproduct');
Route::post('add-review', [App\Http\Controllers\WebSiteController::class, 'addReview'])->name('courseReview');
Route::get('trainers/join', [App\Http\Controllers\WebSiteController::class, 'trainerJoin'])->name('trainerJoin');
////////// Simultaneous Lessons //////////
Route::get('/live-lessons', [App\Http\Controllers\AdminController::class, 'live_lessons'])->name('live_lessons');
Route::get('/add-live-lessons', [App\Http\Controllers\AdminController::class, 'add_live_lessons'])->name('add_live_lessons');
Route::post('/create-live-lessons', [App\Http\Controllers\AdminController::class, 'create_live_lessons'])->name('create_live_lessons');
Route::get('/edit-live-lessons/{id}', [App\Http\Controllers\AdminController::class, 'edit_live_lessons'])->name('edit_live_lessons');
Route::post('/update-live-lessons/{id}', [App\Http\Controllers\AdminController::class, 'update_live_lessons'])->name('update_live_lessons');
Route::get('/delete-live-lessons/{id}', [App\Http\Controllers\AdminController::class, 'destroy_live_lessons'])->name('destroy_live_lessons');

////////// Schedule Lessons //////////
Route::get('/live-lesson-slots', [App\Http\Controllers\AdminController::class, 'live_lesson_slots'])->name('live_lesson_slots');
Route::get('/add-live-lesson-slots', [App\Http\Controllers\AdminController::class, 'add_live_lesson_slots'])->name('add_live_lesson_slots');
Route::post('/create-live-lesson-slots', [App\Http\Controllers\AdminController::class, 'create_live_lesson_slots'])->name('create_live_lesson_slots');
Route::get('/edit-live-lesson-slots/{id}', [App\Http\Controllers\AdminController::class, 'edit_live_lesson_slots'])->name('edit_live_lesson_slots');
Route::post('/update-live-lesson-slots/{id}', [App\Http\Controllers\AdminController::class, 'update_live_lesson_slots'])->name('update_live_lesson_slots');
Route::get('/delete-live-lesson-slots/{id}', [App\Http\Controllers\AdminController::class, 'destroy_live_lesson_slots'])->name('destroy_live_lesson_slots');

////////// Test //////////
Route::get('/tests', [App\Http\Controllers\AdminController::class, 'tests'])->name('tests');
Route::get('/add-tests', [App\Http\Controllers\AdminController::class, 'add_test'])->name('add_test');
Route::post('/create-tests', [App\Http\Controllers\AdminController::class, 'create_test'])->name('create_test');
Route::get('/edit-tests/{id}', [App\Http\Controllers\AdminController::class, 'edit_test'])->name('edit_test');
Route::post('/update-tests/{id}', [App\Http\Controllers\AdminController::class, 'update_test'])->name('update_test');
Route::get('/delete-tests/{id}', [App\Http\Controllers\AdminController::class, 'destroy_test'])->name('destroy_test');

////////// Question //////////
Route::get('/questions', [App\Http\Controllers\AdminController::class, 'questions'])->name('questions');
Route::get('/add-questions', [App\Http\Controllers\AdminController::class, 'add_question'])->name('add_question');
Route::post('/create-questions', [App\Http\Controllers\AdminController::class, 'create_question'])->name('create_question');
Route::get('/edit-questions/{id}', [App\Http\Controllers\AdminController::class, 'edit_question'])->name('edit_question');
Route::post('/update-questions/{id}', [App\Http\Controllers\AdminController::class, 'update_question'])->name('update_question');
Route::get('/delete-questions/{id}', [App\Http\Controllers\AdminController::class, 'destroy_question'])->name('destroy_question');

////////// our-patners //////////
Route::get('/sponsors', [App\Http\Controllers\AdminController::class, 'sponsors'])->name('sponsors');
Route::get('/add-sponsors', [App\Http\Controllers\AdminController::class, 'add_sponsors'])->name('add_sponsors');
Route::post('/create-sponsors', [App\Http\Controllers\AdminController::class, 'create_sponsors'])->name('create_sponsors');
Route::get('/edit-sponsors/{id}', [App\Http\Controllers\AdminController::class, 'edit_sponsors'])->name('edit_sponsors');
Route::post('/update-sponsors/{id}', [App\Http\Controllers\AdminController::class, 'update_sponsors'])->name('update_sponsors');
Route::get('/delete-sponsors/{id}', [App\Http\Controllers\AdminController::class, 'destroy_sponsors'])->name('destroy_sponsors');
Route::get('/feature-sponsors/{id}', [App\Http\Controllers\AdminController::class, 'feature_sponsor'])->name('feature_sponsor');

////////// advisory-board //////////
Route::get('/advisoryboards', [App\Http\Controllers\AdminController::class, 'advisoryboards'])->name('advisoryboards');
Route::get('/add-advisoryboards', [App\Http\Controllers\AdminController::class, 'add_advisoryboards'])->name('add_advisoryboards');
Route::post('/create-advisoryboards', [App\Http\Controllers\AdminController::class, 'create_advisoryboards'])->name('create_advisoryboards');
Route::get('/edit-advisoryboards/{id}', [App\Http\Controllers\AdminController::class, 'edit_advisoryboards'])->name('edit_advisoryboards');
Route::post('/update-advisoryboards/{id}', [App\Http\Controllers\AdminController::class, 'update_advisoryboards'])->name('update_advisoryboards');
Route::get('/delete-advisoryboards/{id}', [App\Http\Controllers\AdminController::class, 'destroy_advisoryboards'])->name('destroy_advisoryboards');
Route::get('/feature-advisoryboards/{id}', [App\Http\Controllers\AdminController::class, 'feature_advisoryboards'])->name('feature_advisoryboards');

////////// page-manager //////////
Route::get('/pages', [App\Http\Controllers\AdminController::class, 'pages'])->name('pages');
Route::get('/add-pages', [App\Http\Controllers\AdminController::class, 'add_pages'])->name('add_pages');
Route::post('/create-pages', [App\Http\Controllers\AdminController::class, 'create_pages'])->name('create_pages');
Route::get('/edit-pages/{id}', [App\Http\Controllers\AdminController::class, 'edit_pages'])->name('edit_pages');
Route::post('/update-pages/{id}', [App\Http\Controllers\AdminController::class, 'update_pages'])->name('update_pages');
Route::get('/delete-pages/{id}', [App\Http\Controllers\AdminController::class, 'destroy_pages'])->name('destroy_pages');

////////// news //////////
Route::get('/news', [App\Http\Controllers\AdminController::class, 'news'])->name('news');
Route::get('/add-news', [App\Http\Controllers\AdminController::class, 'add_news'])->name('add_news');
Route::post('/create-news', [App\Http\Controllers\AdminController::class, 'create_news'])->name('create_news');
Route::get('/edit-news/{id}', [App\Http\Controllers\AdminController::class, 'edit_news'])->name('edit_news');
Route::post('/update-news/{id}', [App\Http\Controllers\AdminController::class, 'update_news'])->name('update_news');
Route::get('/delete-news/{id}', [App\Http\Controllers\AdminController::class, 'destroy_news'])->name('destroy_news');


////////// Tax //////////
Route::get('/tax', [App\Http\Controllers\AdminController::class, 'tax'])->name('tax');
Route::get('/add-tax', [App\Http\Controllers\AdminController::class, 'add_tax'])->name('add_test');
Route::post('/create-tax', [App\Http\Controllers\AdminController::class, 'create_tax'])->name('create_tax');
Route::get('/edit-tax/{id}', [App\Http\Controllers\AdminController::class, 'edit_tax'])->name('edit_tax');
Route::post('/update-tax/{id}', [App\Http\Controllers\AdminController::class, 'update_tax'])->name('update_tax');
Route::get('/delete-tax/{id}', [App\Http\Controllers\AdminController::class, 'destroy_tax'])->name('destroy_tax');
Route::get('/tax-status/{id}', [App\Http\Controllers\AdminController::class, 'tax_status'])->name('tax_status');

////////// Coupon //////////
Route::get('/coupon', [App\Http\Controllers\AdminController::class, 'coupon'])->name('coupon');
Route::get('/add-coupon', [App\Http\Controllers\AdminController::class, 'add_coupon'])->name('add_coupon');
Route::post('/create-coupon', [App\Http\Controllers\AdminController::class, 'create_coupon'])->name('create_coupon');
Route::get('/edit-coupon/{id}', [App\Http\Controllers\AdminController::class, 'edit_coupon'])->name('edit_coupon');
Route::post('/update-coupon/{id}', [App\Http\Controllers\AdminController::class, 'update_coupon'])->name('update_coupon');
Route::get('/delete-coupon/{id}', [App\Http\Controllers\AdminController::class, 'destroy_coupon'])->name('destroy_coupon');
Route::get('/coupon-status/{id}', [App\Http\Controllers\AdminController::class, 'coupon_status'])->name('coupon_status');


////////// Account //////////
Route::get('/account', [App\Http\Controllers\AdminController::class, 'account'])->name('account');
Route::post('/update-account/{id}', [App\Http\Controllers\AdminController::class, 'update_account'])->name('update_account');
});


Route::group(['middleware' => 'trainer'], function()
{

/////// Course ///////
Route::get('/tranier/courses', [App\Http\Controllers\TrainerController::class, 'tcourses'])->name('tcourses');
Route::get('/tranier/add-courses', [App\Http\Controllers\TrainerController::class, 'tadd_courses'])->name('tadd_courses');
Route::post('/tranier/create-courses', [App\Http\Controllers\TrainerController::class, 'tcreate_courses'])->name('tcreate_courses');
Route::get('/tranier/edit-courses/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_courses'])->name('tedit_courses');
Route::post('/tranier/update-courses/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_courses'])->name('tupdate_courses');
Route::get('/tranier/delete-courses/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_courses'])->name('tdestroy_courses');
Route::get('/tranier/feature-courses/{id}', [App\Http\Controllers\TrainerController::class, 'tfeature_courses'])->name('tfeature_courses');

/////// Diplomas ///////
Route::get('/tranier/bundles', [App\Http\Controllers\TrainerController::class, 'tdiploma'])->name('tdiploma');
Route::get('/tranier/add-bundles', [App\Http\Controllers\TrainerController::class, 'tadd_diploma'])->name('tadd_diploma');
Route::post('/tranier/create-bundles', [App\Http\Controllers\TrainerController::class, 'tcreate_diploma'])->name('tcreate_diploma');
Route::get('/tranier/edit-bundles/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_diploma'])->name('tedit_diploma');
Route::post('/tranier/update-bundles/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_diploma'])->name('tupdate_diploma');
Route::get('/tranier/delete-bundles/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_diploma'])->name('tdestroy_diploma');

////////// Asynchronous Lessons //////////
Route::get('/tranier/lessons', [App\Http\Controllers\TrainerController::class, 'tlessons'])->name('tlessons');
Route::get('/tranier/add-lessons', [App\Http\Controllers\TrainerController::class, 'tadd_lessons'])->name('tadd_lessons');
Route::post('/tranier/create-lessons', [App\Http\Controllers\TrainerController::class, 'tcreate_lessons'])->name('tcreate_lessons');
Route::get('/tranier/edit-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_lessons'])->name('tedit_lessons');
Route::post('/tranier/update-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_lessons'])->name('tupdate_lessons');
Route::get('/tranier/delete-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_lessons'])->name('tdestroy_lessons');

////////// Simultaneous Lessons //////////
Route::get('/tranier/live-lessons', [App\Http\Controllers\TrainerController::class, 'tlive_lessons'])->name('tlive_lessons');
Route::get('/tranier/add-live-lessons', [App\Http\Controllers\TrainerController::class, 'tadd_live_lessons'])->name('tadd_live_lessons');
Route::post('/tranier/create-live-lessons', [App\Http\Controllers\TrainerController::class, 'tcreate_live_lessons'])->name('tcreate_live_lessons');
Route::get('/tranier/edit-live-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_live_lessons'])->name('tedit_live_lessons');
Route::post('/tranier/update-live-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_live_lessons'])->name('tupdate_live_lessons');
Route::get('/tranier/delete-live-lessons/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_live_lessons'])->name('tdestroy_live_lessons');

////////// Schedule Lessons //////////
Route::get('/tranier/live-lesson-slots', [App\Http\Controllers\TrainerController::class, 'tlive_lesson_slots'])->name('tlive_lesson_slots');
Route::get('/tranier/add-live-lesson-slots', [App\Http\Controllers\TrainerController::class, 'tadd_live_lesson_slots'])->name('tadd_live_lesson_slots');
Route::post('/tranier/create-live-lesson-slots', [App\Http\Controllers\TrainerController::class, 'tcreate_live_lesson_slots'])->name('tcreate_live_lesson_slots');
Route::get('/tranier/edit-live-lesson-slots/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_live_lesson_slots'])->name('tedit_live_lesson_slots');
Route::post('/tranier/update-live-lesson-slots/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_live_lesson_slots'])->name('tupdate_live_lesson_slots');
Route::get('/tranier/delete-live-lesson-slots/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_live_lesson_slots'])->name('tdestroy_live_lesson_slots');

////////// Test //////////
Route::get('/tranier/tests', [App\Http\Controllers\TrainerController::class, 'ttests'])->name('ttests');
Route::get('/tranier/add-tests', [App\Http\Controllers\TrainerController::class, 'tadd_test'])->name('tadd_test');
Route::post('/tranier/create-tests', [App\Http\Controllers\TrainerController::class, 'tcreate_test'])->name('tcreate_test');
Route::get('/tranier/edit-tests/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_test'])->name('tedit_test');
Route::post('/tranier/update-tests/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_test'])->name('tupdate_test');
Route::get('/tranier/delete-tests/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_test'])->name('tdestroy_test');

////////// Question //////////
Route::get('/tranier/questions', [App\Http\Controllers\TrainerController::class, 'tquestions'])->name('tquestions');
Route::get('/tranier/add-questions', [App\Http\Controllers\TrainerController::class, 'tadd_question'])->name('tadd_question');
Route::post('/tranier/create-questions', [App\Http\Controllers\TrainerController::class, 'tcreate_question'])->name('tcreate_question');
Route::get('/tranier/edit-questions/{id}', [App\Http\Controllers\TrainerController::class, 'tedit_question'])->name('tedit_question');
Route::post('/tranier/update-questions/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_question'])->name('tupdate_question');
Route::get('/tranier/delete-questions/{id}', [App\Http\Controllers\TrainerController::class, 'tdestroy_question'])->name('tdestroy_question');


////////// Account //////////
Route::get('/tranier/account', [App\Http\Controllers\TrainerController::class, 'taccount'])->name('taccount');
Route::post('/tranier/update-account/{id}', [App\Http\Controllers\TrainerController::class, 'tupdate_account'])->name('tupdate_account');
});

Route::group(['middleware' => 'contractor'], function()
{

/////// Course ///////
Route::get('/contractor/courses', [App\Http\Controllers\ContractorController::class, 'ccourses'])->name('ccourses');
Route::get('/contractor/add-courses', [App\Http\Controllers\ContractorController::class, 'cadd_courses'])->name('cadd_courses');
Route::post('/contractor/create-courses', [App\Http\Controllers\ContractorController::class, 'ccreate_courses'])->name('ccreate_courses');
Route::get('/contractor/edit-courses/{id}', [App\Http\Controllers\ContractorController::class, 'cedit_courses'])->name('cedit_courses');
Route::post('/contractor/update-courses/{id}', [App\Http\Controllers\ContractorController::class, 'cupdate_courses'])->name('cupdate_courses');
Route::get('/contractor/delete-courses/{id}', [App\Http\Controllers\ContractorController::class, 'cdestroy_courses'])->name('cdestroy_courses');
Route::get('/contractor/feature-courses/{id}', [App\Http\Controllers\ContractorController::class, 'cfeature_courses'])->name('cfeature_courses');

/////// Diplomas ///////
Route::get('/contractor/bundles', [App\Http\Controllers\ContractorController::class, 'cdiploma'])->name('cdiploma');
Route::get('/contractor/add-bundles', [App\Http\Controllers\ContractorController::class, 'cadd_diploma'])->name('cadd_diploma');
Route::post('/contractor/create-bundles', [App\Http\Controllers\ContractorController::class, 'ccreate_diploma'])->name('ccreate_diploma');
Route::get('/contractor/edit-bundles/{id}', [App\Http\Controllers\ContractorController::class, 'cedit_diploma'])->name('cedit_diploma');
Route::post('/contractor/update-bundles/{id}', [App\Http\Controllers\ContractorController::class, 'cupdate_diploma'])->name('cupdate_diploma');
Route::get('/contractor/delete-bundles/{id}', [App\Http\Controllers\ContractorController::class, 'cdestroy_diploma'])->name('cdestroy_diploma');

////////// Asynchronous Lessons //////////
Route::get('/contractor/lessons', [App\Http\Controllers\ContractorController::class, 'clessons'])->name('clessons');
Route::get('/contractor/add-lessons', [App\Http\Controllers\ContractorController::class, 'cadd_lessons'])->name('cadd_lessons');
Route::post('/contractor/create-lessons', [App\Http\Controllers\ContractorController::class, 'ccreate_lessons'])->name('ccreate_lessons');
Route::get('/contractor/edit-lessons/{id}', [App\Http\Controllers\ContractorController::class, 'cedit_lessons'])->name('cedit_lessons');
Route::post('/contractor/update-lessons/{id}', [App\Http\Controllers\ContractorController::class, 'cupdate_lessons'])->name('cupdate_lessons');
Route::get('/contractor/delete-lessons/{id}', [App\Http\Controllers\ContractorController::class, 'cdestroy_lessons'])->name('cdestroy_lessons');

////////// Test //////////
Route::get('/contractor/tests', [App\Http\Controllers\ContractorController::class, 'ctests'])->name('ctests');
Route::get('/contractor/add-tests', [App\Http\Controllers\ContractorController::class, 'cadd_test'])->name('cadd_test');
Route::post('/contractor/create-tests', [App\Http\Controllers\ContractorController::class, 'ccreate_test'])->name('ccreate_test');
Route::get('/contractor/edit-tests/{id}', [App\Http\Controllers\ContractorController::class, 'cedit_test'])->name('cedit_test');
Route::post('/contractor/update-tests/{id}', [App\Http\Controllers\ContractorController::class, 'cupdate_test'])->name('cupdate_test');
Route::get('/contractor/delete-tests/{id}', [App\Http\Controllers\ContractorController::class, 'cdestroy_test'])->name('cdestroy_test');

////////// Account //////////
Route::get('/contractor/account', [App\Http\Controllers\ContractorController::class, 'caccount'])->name('caccount');
Route::post('/contractor/update-account/{id}', [App\Http\Controllers\ContractorController::class, 'cupdate_account'])->name('cupdate_account');
});


Route::group(['middleware' => 'student'], function()
{

////////// Account //////////
Route::get('/student/account', [App\Http\Controllers\StudentController::class, 'saccount'])->name('saccount');
Route::post('/student/update-account/{id}', [App\Http\Controllers\StudentController::class, 'supdate_account'])->name('supdate_account');

/////// Training Need ///////
Route::get('/student/trainings', [App\Http\Controllers\StudentController::class, 'strainings'])->name('strainings');
Route::get('/student/add-trainings', [App\Http\Controllers\StudentController::class, 'sadd_trainings'])->name('sadd_trainings');
Route::post('/student/create-trainings', [App\Http\Controllers\StudentController::class, 'screate_trainings'])->name('screate_trainings');
Route::get('/student/edit-trainings/{id}', [App\Http\Controllers\StudentController::class, 'sedit_trainings'])->name('sedit_trainings');
Route::post('/student/update-trainings/{id}', [App\Http\Controllers\StudentController::class, 'supdate_trainings'])->name('supdate_trainings');
Route::get('/student/delete-trainings/{id}', [App\Http\Controllers\StudentController::class, 'sdestroy_trainings'])->name('sdestroy_trainings');
Route::get('/student/courses-teacher_id/{id}', [App\Http\Controllers\StudentController::class, 'steacher_courses'])->name('steacher_courses');

});

Route::post('payment/form', [App\Http\Controllers\PaytabsController::class, 'index'])->name('paymentform');
