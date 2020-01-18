<?php

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/statistic_1', 'StatisticController@statistic_1')->name('statistic_1');
Route::get('/statistic_2', 'StatisticController@statistic_2')->name('statistic_2');
Route::get('/statistic_3', 'StatisticController@statistic_3')->name('statistic_3');
Route::get('/statistic_4', 'StatisticController@statistic_4')->name('statistic_4');
Route::get('/statistic_5', 'StatisticController@statistic_5')->name('statistic_5');
Route::get('/statistic_6', 'StatisticController@statistic_6')->name('statistic_6');
Route::get('/statistic_7', 'StatisticController@statistic_7')->name('statistic_7');
Route::get('/statistic_8', 'StatisticController@statistic_8')->name('statistic_8');
Route::get('/statistic_9', 'StatisticController@statistic_9')->name('statistic_9');


Route::get('statistics/fetchCharData2', 'StatisticController@fetchCharData2')->name('statistics.fetchCharData2');

Route::resource('statistics', 'StatisticController')->except('delete');

Route::get('statistics/{id}/delete', 'StatisticController@delete')->name('statistics.delete');
Route::get('statistics/showStatistics/{id}/{type}', 'StatisticController@showStatistics')->name('statistics.showStatistics');
Route::get('statistics/showStatisticsChar/{id}/{type}/{status}', 'StatisticController@showStatisticsChar')->name('statistics.showStatisticsChar');
Route::get('statistics/showStatisticsCharForAllUniversity/{id}/{type}/{status}', 'StatisticController@showStatisticsCharForAllUniversity')->name('statistics.showStatisticsCharForAllUniversity');
Route::get('statistics/showStatisticsTableForAllUniversity/{uni_type}/{type}/{status}/{degree}/{gender}', 'StatisticController@showStatisticsTableForAllUniversity')->name('statistics.showStatisticsTableForAllUniversity');

Route::post('statistics/fetchCharData', 'StatisticController@fetchCharData')->name('statistics.fetchCharData');
Route::post('statistics/fetchStatisticsCharAccordingForUniversity', 'StatisticController@fetchStatisticsCharAccordingForUniversity')->name('statistics.fetchStatisticsCharAccordingForUniversity');
Route::post('statistics/fetchStatisticsCharForAllUniversity', 'StatisticController@fetchStatisticsCharForAllUniversity')->name('statistics.fetchStatisticsCharForAllUniversity');


Route::resource('universities', 'UniversityController')->except('delete');
Route::get('universities/{id}/delete', 'UniversityController@delete')->name('universities.delete');


Route::get('users/accepting', 'usersController@accepting')->name('users.accepting');
Route::resource('users', 'usersController');
Route::get('users/{id}/delete', 'usersController@delete')->name('users.delete');
Route::post('users/{id}/accept', 'usersController@accept')->name('users.accept');


Route::get('news/accepting', 'NewsController@accepting')->name('news.accepting');
Route::get('news/deleted', 'NewsController@deleted')->name('news.deleted');
Route::get('news/{id}/forceDelete', 'NewsController@forceDelete')->name('news.forceDelete');
Route::get('news/{id}/delete', 'NewsController@delete')->name('news.delete');
Route::get('news/{id}/restore', 'NewsController@restore')->name('news.restore');
Route::post('news/{id}/accept', 'NewsController@accept')->name('news.accept');
Route::resource('news', 'NewsController');

Route::get('advertisments/deleted', 'AdvertismentsController@deleted')->name('advertisments.deleted');
Route::get('advertisments/{id}/forceDelete', 'AdvertismentsController@forceDelete')->name('advertisments.forceDelete');
Route::get('advertisments/{id}/delete', 'AdvertismentsController@delete')->name('advertisments.delete');
Route::get('advertisments/{id}/restore', 'AdvertismentsController@restore')->name('advertisments.restore');
Route::resource('advertisments', 'AdvertismentsController');


Route::get('voites/deleted', 'VoitesController@deleted')->name('voites.deleted');
Route::get('voites/{id}/forceDelete', 'VoitesController@forceDelete')->name('voites.forceDelete');
Route::get('voites/{id}/delete', 'VoitesController@delete')->name('voites.delete');
Route::get('voites/{id}/restore', 'VoitesController@restore')->name('voites.restore');
Route::get('voites/{id}/viewResult', 'VoitesController@viewResult')->name('voites.viewResult');
Route::post('voites/fetchVoitResult', 'VoitesController@fetchVoitResult')->name('voites.fetchVoitResult');
Route::resource('voites', 'VoitesController');


Route::get('categories_voit/{id}/showVoit/{type}', 'CategoriesVoitController@showVoit')->name('categories_voit.showVoit');
//Route::get('categories_voit/{id}/showAdvertisment', 'CategoriesVoitController@showAdvertisment')->name('categories_voit.showAdvertisment');
Route::get('categories_voit/{id}/showAdvertismentDeleted', 'CategoriesVoitController@showAdvertismentDeleted')->name('categories_voit.showAdvertismentDeleted');
Route::get('categories_voit/{id}/forceDelete', 'CategoriesVoitController@forceDelete')->name('categories_voit.forceDelete');
Route::get('categories_voit/{id}/createCat', 'CategoriesVoitController@createCat')->name('categories_voit.createCat');
Route::get('categories_voit/{id}/delete', 'CategoriesVoitController@delete')->name('categories_voit.delete');
Route::get('categories_voit/{id}/restore', 'CategoriesVoitController@restore')->name('categories_voit.restore');
Route::post('categories_voit/fetchVoit', 'CategoriesVoitController@fetchVoit')->name('categories_voit.fetchVoit');
Route::post('categories_voit/fetch_category_value', 'CategoriesVoitController@fetch_category_value')->name('categories_voit.fetch_category_value');
Route::post('categories_voit/voiting', 'CategoriesVoitController@voiting')->name('categories_voit.voiting');
Route::resource('categories_voit', 'CategoriesVoitController')->except('delete','create');


Route::get('slides/deleted', 'SlidesController@deleted')->name('slides.deleted');
Route::get('slides/{id}/forceDelete', 'SlidesController@forceDelete')->name('slides.forceDelete');
Route::get('slides/{id}/delete', 'SlidesController@delete')->name('slides.delete');
Route::get('slides/{id}/restore', 'SlidesController@restore')->name('slides.restore');
Route::resource('slides', 'SlidesController');

Route::get('slides/{id}/showSlideImages', 'SlideImagesController@showSlideImages')->name('slides.showSlideImages');

Route::get('slides/images/deleted', 'SlideImagesController@deleted')->name('slide_images.deleted');
Route::get('slides/{id}/images/forceDelete', 'SlideImagesController@forceDelete')->name('slide_images.forceDelete');
Route::get('slides/{id}/images/delete', 'SlideImagesController@delete')->name('slide_images.delete');
Route::get('slides/{id}/images/restore', 'SlideImagesController@restore')->name('slide_images.restore');
Route::resource('slide_images', 'SlideImagesController');


Route::get('caregories_setting/{id}/showSetting', 'CategoriesSettingController@showSetting')->name('caregories_setting.showSetting');
Route::get('caregories_setting/{id}/showSettingDeleted', 'CategoriesSettingController@showSettingDeleted')->name('caregories_setting.showSettingDeleted');
Route::get('caregories_setting/{id}/forceDelete', 'CategoriesSettingController@forceDelete')->name('caregories_setting.forceDelete');
Route::get('caregories_setting/{id}/create', 'CategoriesSettingController@create')->name('caregories_setting.create');
Route::get('caregories_setting/{id}/delete', 'CategoriesSettingController@delete')->name('caregories_setting.delete');
Route::get('caregories_setting/{id}/restore', 'CategoriesSettingController@restore')->name('caregories_setting.restore');
Route::resource('caregories_setting', 'CategoriesSettingController')->except('create');


Route::get('categories_advertisment/{id}/showAdvertisment/{type}', 'CategoriesAdvertismentController@showAdvertisment')->name('categories_advertisment.showAdvertisment');
//Route::get('categories_advertisment/{id}/showAdvertisment', 'CategoriesAdvertismentController@showAdvertisment')->name('categories_advertisment.showAdvertisment');
Route::get('categories_advertisment/{id}/showAdvertismentDeleted', 'CategoriesAdvertismentController@showAdvertismentDeleted')->name('categories_advertisment.showAdvertismentDeleted');
Route::get('categories_advertisment/{id}/forceDelete', 'CategoriesAdvertismentController@forceDelete')->name('categories_advertisment.forceDelete');
Route::get('categories_advertisment/{id}/create', 'CategoriesAdvertismentController@create')->name('categories_advertisment.create');
Route::get('categories_advertisment/{id}/delete', 'CategoriesAdvertismentController@delete')->name('categories_advertisment.delete');
Route::get('categories_advertisment/{id}/restore', 'CategoriesAdvertismentController@restore')->name('categories_advertisment.restore');
Route::post('categories_advertisment/fetchAdvertisment', 'CategoriesAdvertismentController@fetchAdvertisment')->name('categories_advertisment.fetchAdvertisment');
Route::post('categories_advertisment/fetch_category_value', 'CategoriesAdvertismentController@fetch_category_value')->name('categories_advertisment.fetch_category_value');

Route::resource('categories_advertisment', 'CategoriesAdvertismentController')->except('create');;


Route::get('categories/accepting', 'CategoriesController@accepting')->name('categories.accepting');
Route::get('categories/deleted', 'CategoriesController@deleted')->name('categories.deleted');
Route::get('categories/{id}/forceDelete', 'CategoriesController@forceDelete')->name('categories.forceDelete');
Route::get('categories/{id}/delete', 'CategoriesController@delete')->name('categories.delete');
Route::get('categories/{id}/restore', 'CategoriesController@restore')->name('categories.restore');
Route::post('categories/{id}/accept', 'usersConCategoriesControllertroller@accept')->name('categories.accept');
Route::post('categories/fetchParentCategory', 'CategoriesController@fetchParentCategory')->name('categories.fetchParentCategory');
Route::resource('categories', 'CategoriesController');


Route::get('liveNews/accepting', 'LiveNewsController@accepting')->name('liveNews.accepting');
Route::get('liveNews/deleted', 'LiveNewsController@deleted')->name('liveNews.deleted');
Route::get('liveNews/{id}/forceDelete', 'LiveNewsController@forceDelete')->name('liveNews.forceDelete');
Route::get('liveNews/{id}/delete', 'LiveNewsController@delete')->name('liveNews.delete');
Route::get('liveNews/{id}/restore', 'LiveNewsController@restore')->name('liveNews.restore');
Route::post('liveNews/{id}/accept', 'LiveNewsController@accept')->name('liveNews.accept');
Route::resource('liveNews', 'LiveNewsController');


Route::resource('customer_groups', 'CustomerGroupsController')->except('delete');
Route::get('customer_groups/{group}/delete', 'CustomerGroupsController@delete')->name('customer_groups.delete');

Route::get('reviews/{id}/delete', 'ReviewsController@delete')->name('reviews.delete');
Route::resource('reviews', 'ReviewsController')->except('delete');

Route::resource('admins', 'AdminsController')->except('delete');
Route::get('admins/{admin}/delete', 'AdminsController@delete')->name('admins.delete');

Route::resource('admin_groups', 'AdminGroupsController')->except('delete');
Route::get('admin_groups/{group}/delete', 'AdminGroupsController@delete')->name('admin_groups.delete');

Route::resource('categories', 'CategoriesController')->except('delete');
Route::get('categories/{category}/delete', 'CategoriesController@delete')->name('categories.delete');


Route::group(
    ['prefix' => 'settings', 'as' => 'settings.'],
    function () {
        Route::get('/', 'SettingsController@index')->name('index');
    }
);

Route::resource('languages', 'LanguagesController')->except('delete');
Route::get('languages/{language}/delete', 'LanguagesController@delete')->name('languages.delete');

Route::resource('currencies', 'CurrenciesController')->except('delete');
Route::get('currencies/{currency}/delete', 'CurrenciesController@delete')->name('currencies.delete');
Route::resource('orders', 'OrdersController');



