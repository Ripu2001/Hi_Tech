<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth route
Auth::routes();

// Web Route
route::namespace('Web')->group(function(){

    // home route
    route::get('/','HomeController@index')->name('home');

    //pricing route
    route::get('/pricing','PricingController@index')->name('pricing');

    // porfolio route
    route::get('/portfolio','PortfolioController@index')->name('portfolio');

    // Blog Route
    route::get('/blog','BlogController@index')->name('blog');

    // Service Route
    route::get('/service','ServiceController@index')->name('service');

    // about route
    route::get('/about','AboutController@index')->name('about');

    // Faq route
    route::get('/faq','FaqController@index')->name('faq');


    // contact route
    route::get('/contact','ContactController@index')->name('contact');
    route::post('/contact','ContactController@store')->name('contact.store');

});

// Admin route
route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function(){

    // dashboard route
    route::resource('/','DashboardController');
    route::resource('/dashboard','DashboardController');

    // slider Route
    route::resource('slider','SliderController');

    // our  Team route
    route::resource('member','MemberContoller');
    route::resource('designation','DesignationController');

    // Blog Route
    route::resource('blog','BlogController');
    route::resource('blog-category','BlogCategoryController');

    // Pricing
    route::resource('pricing','PricingController');

    // Service Route
    route::resource('service','ServiceController');

    // Portfolio route
    route::resource('portfolio','PortfolioController');
    route::resource('portfolio-category','PortfolioCategoryController');

    // Counter route
    route::resource('counter','CounterController');

    // Faq  Route
    route::resource('faq','Faqcontroller');
    route::resource('faq-category','FaqCategoryController');

    // About Route
    route::resource('about','AboutController');

    // Why Choose Us Route
    route::resource('why-choose-us','WhyChooseUsController');

    // testimonial route
    route::resource('testimonial','TestimonialController');

    // work process route
    route::resource('work-process','WorkProcessController');

    // Social Route
    route::resource('social','SocialController');

    // Partner Route
    route::resource('partner','PartnerController');

    // section route
    route::resource('section','SectionController');

    // user management
    route::resource('user','UserController');
    route::resource('role','RoleController');

    // meeting route
    route::resource('meeting','MeetingScheduleController');
    route::resource('meeting-status','MeetingStatusController');
    route::resource('meeting-type','MeetingTypeController');

    // Setting Route
    route::get('setting','SettingController@index')->name('setting.index');
    route::post('siteinfo','SettingController@siteInfo')->name('setting.siteInfo');
    route::post('contactinfo','SettingController@ContactInfo')->name('setting.contactInfo');
    route::post('custom','SettingController@customCss')->name('setting.customCss');
    route::post('changemail','SettingController@changeMail')->name('setting.changeMail');
    route::post('changepass','SettingController@changePass')->name('setting.changePass');
});
