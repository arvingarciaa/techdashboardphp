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

//Page
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/admin', 'PagesController@getAdmin')->name('pages.getAdmin');
Route::get('/admin/tech/{id}/edit', 'PagesController@techEditPage')->name('pages.techEditPage');
Route::get('/admin/tech/add', 'PagesController@techAddPage')->name('pages.techAddPage');
Route::get('/contactUs', 'PagesController@contactUsPage')->name('pages.contactUsPage');
Route::post('admin/fetchDependent', 'PagesController@fetchDependent')->name('fetchDependent');
Route::get('/{id}/printTechPDF', 'PagesController@printTechPDF')->name('printTechPDF');
Route::get('/surveyForm', 'PagesController@surveyForm')->name('pages.surveyForm');

//Landing Page
Route::get('/admin/updateLandingPageItems', 'LandingPageController@updateLandingPageItems')->name('pages.updateLandingPageItems');
Route::get('/admin/manageLandingPage', 'PagesController@manageLandingPage')->name('pages.manageLandingPage');

//UserMessages
Route::post('/contactUs/send' , 'UserMessagesController@send')->name('send');
Route::post('/resolveMessage/{id}' , 'UserMessagesController@resolveMessage')->name('resolveMessage');

//API
Route::get('/data/current', 'PagesController@getJSON')->name('pages.getJSON');

//Commodities
Route::post('admin/addCommodity', 'CommoditiesController@addCommodity')->name('addCommodity');
Route::post('admin/{id}/editCommodity', 'CommoditiesController@editCommodity')->name('editCommodity');
Route::delete('admin/{id}/deleteCommodity', 'CommoditiesController@deleteCommodity')->name('deleteCommodity');
Route::post('admin/{id}/approveCommodity', 'CommoditiesController@approveCommodity')->name('approveCommodity');
Route::post('admin/{id}/rejectCommodity', 'CommoditiesController@rejectCommodity')->name('rejectCommodity');
Route::post('admin/{id}/togglePublishCommodity', 'CommoditiesController@togglePublishCommodity')->name('togglePublishCommodity');

//Sectors
Route::post('admin/addSector', 'SectorsController@addSector')->name('addSector');
Route::post('admin/{id}/editSector', 'SectorsController@editSector')->name('editSector');
Route::delete('admin/{id}/deleteSector', 'SectorsController@deleteSector')->name('deleteSector');
Route::post('admin/{id}/approveSector', 'SectorsController@approveSector')->name('approveSector');
Route::post('admin/{id}/rejectSector', 'SectorsController@rejectSector')->name('rejectSector');
Route::post('admin/{id}/togglePublishSector', 'SectorsController@togglePublishSector')->name('togglePublishSector');

//Industries
Route::post('admin/addIndustry', 'IndustriesController@addIndustry')->name('addIndustry');
Route::post('admin/{id}/editIndustry', 'IndustriesController@editIndustry')->name('editIndustry');
Route::delete('admin/{id}/deleteIndustry', 'IndustriesController@deleteIndustry')->name('deleteIndustry');
Route::post('admin/{id}/approveIndustry', 'IndustriesController@approveIndustry')->name('approveIndustry');
Route::post('admin/{id}/rejectIndustry', 'IndustriesController@rejectIndustry')->name('rejectIndustry');
Route::post('admin/{id}/togglePublishIndustry', 'IndustriesController@togglePublishIndustry')->name('togglePublishIndustry');

//ApplicabilityIndustry
Route::post('admin/addApplicabilityIndustry', 'ApplicabilityIndustriesController@addApplicabilityIndustry')->name('addApplicabilityIndustry');
Route::post('admin/{id}/editApplicabilityIndustry', 'ApplicabilityIndustriesController@editApplicabilityIndustry')->name('editApplicabilityIndustry');
Route::delete('admin/{id}/deleteApplicabilityIndustry', 'ApplicabilityIndustriesController@deleteApplicabilityIndustry')->name('deleteApplicabilityIndustry');
Route::post('admin/{id}/approveApplicabilityIndustry', 'ApplicabilityIndustriesController@approveApplicabilityIndustry')->name('approveApplicabilityIndustry');
Route::post('admin/{id}/rejectApplicabilityIndustry', 'ApplicabilityIndustriesController@rejectApplicabilityIndustry')->name('rejectApplicabilityIndustry');
Route::post('admin/{id}/togglePublishApplicabilityIndustry', 'ApplicabilityIndustriesController@togglePublishApplicabilityIndustry')->name('togglePublishApplicabilityIndustry');

//Adopter Types
Route::post('admin/addAdopterType', 'AdopterTypesController@addAdopterType')->name('addAdopterType');
Route::post('admin/{id}/editAdopterType', 'AdopterTypesController@editAdopterType')->name('editAdopterType');
Route::delete('admin/{id}/deleteAdopterType', 'AdopterTypesController@deleteAdopterType')->name('deleteAdopterType');
Route::post('admin/{id}/approveAdopterType', 'AdopterTypesController@approveAdopterType')->name('approveAdopterType');
Route::post('admin/{id}/rejectAdopterType', 'AdopterTypesController@rejectAdopterType')->name('rejectAdopterType');
Route::post('admin/{id}/togglePublishAdopterType', 'AdopterTypesController@togglePublishAdopterType')->name('togglePublishAdopterType');

//Adopter
Route::post('admin/addAdopter', 'AdoptersController@addAdopter')->name('addAdopter');
Route::post('admin/{id}/editAdopter', 'AdoptersController@editAdopter')->name('editAdopter');
Route::delete('admin/{id}/deleteAdopter', 'AdoptersController@deleteAdopter')->name('deleteAdopter');
Route::post('admin/{id}/approveAdopter', 'AdoptersController@approveAdopter')->name('approveAdopter');
Route::post('admin/{id}/rejectAdopter', 'AdoptersController@rejectAdopter')->name('rejectAdopter');
Route::post('admin/{id}/togglePublishAdopter', 'AdoptersController@togglePublishAdopter')->name('togglePublishAdopter');

//Generator
Route::post('admin/addGenerator', 'GeneratorsController@addGenerator')->name('addGenerator');
Route::post('admin/{id}/editGenerator', 'GeneratorsController@editGenerator')->name('editGenerator');
Route::delete('admin/{id}/deleteGenerator', 'GeneratorsController@deleteGenerator')->name('deleteGenerator');
Route::post('admin/{id}/approveGenerator', 'GeneratorsController@approveGenerator')->name('approveGenerator');
Route::post('admin/{id}/rejectGenerator', 'GeneratorsController@rejectGenerator')->name('rejectGenerator');
Route::post('admin/{id}/togglePublishGenerator', 'GeneratorsController@togglePublishGenerator')->name('togglePublishGenerator');

//Agency
Route::post('admin/addAgency', 'AgenciesController@addAgency')->name('addAgency');
Route::post('admin/{id}/editAgency', 'AgenciesController@editAgency')->name('editAgency');
Route::delete('admin/{id}/deleteAgency', 'AgenciesController@deleteAgency')->name('deleteAgency');
Route::post('admin/{id}/approveAgency', 'AgenciesController@approveAgency')->name('approveAgency');
Route::post('admin/{id}/rejectAgency', 'AgenciesController@rejectAgency')->name('rejectAgency');
Route::post('admin/{id}/togglePublishAgency', 'AgenciesController@togglePublishAgency')->name('togglePublishAgency');

//Technology Categories
Route::post('admin/addTechnologyCategory', 'TechnologyCategoriesController@addTechnologyCategory')->name('addTechnologyCategory');
Route::post('admin/{id}/editTechnologyCategory', 'TechnologyCategoriesController@editTechnologyCategory')->name('editTechnologyCategory');
Route::delete('admin/{id}/deleteTechnologyCategory', 'TechnologyCategoriesController@deleteTechnologyCategory')->name('deleteTechnologyCategory');
Route::post('admin/{id}/approveTechnologyCategory', 'TechnologyCategoriesController@approveTechnologyCategory')->name('approveTechnologyCategory');
Route::post('admin/{id}/rejectTechnologyCategory', 'TechnologyCategoriesController@rejectTechnologyCategory')->name('rejectTechnologyCategory');
Route::post('admin/{id}/togglePublishTechnologyCategory', 'TechnologyCategoriesController@togglePublishTechnologyCategory')->name('togglePublishTechnologyCategory');

//Technologies
Route::post('admin/addTechnology', 'TechnologiesController@addTechnology')->name('addTechnology');
Route::post('admin/{id}/editTechnology', 'TechnologiesController@editTechnology')->name('editTechnology');
Route::delete('admin/{id}/deleteTechnology', 'TechnologiesController@deleteTechnology')->name('deleteTechnology');
Route::post('admin/{id}/approveTechnology', 'TechnologiesController@approveTechnology')->name('approveTechnology');
Route::post('admin/{id}/rejectTechnology', 'TechnologiesController@rejectTechnology')->name('rejectTechnology');
Route::post('admin/{id}/togglePublishTechnology', 'TechnologiesController@togglePublishTechnology')->name('togglePublishTechnology');


//Patents
Route::post('admin/addPatent', 'PatentsController@addPatent')->name('addPatent');
Route::post('admin/{id}/editPatent', 'PatentsController@editPatent')->name('editPatent');
Route::delete('admin/{id}/deletePatent', 'PatentsController@deletePatent')->name('deletePatent');

//UtilityModels
Route::post('admin/addUtilityModel', 'UtilityModelsController@addUtilityModel')->name('addUtilityModel');
Route::post('admin/{id}/editUtilityModel', 'UtilityModelsController@editUtilityModel')->name('editUtilityModel');
Route::delete('admin/{id}/deleteUtilityModel', 'UtilityModelsController@deleteUtilityModel')->name('deleteUtilityModel');

//RDResults
Route::post('admin/addRDResult', 'RDResultsController@addRDResult')->name('addRDResult');
Route::post('admin/{id}/editRDResult', 'RDResultsController@editRDResult')->name('editRDResult');
Route::delete('admin/{id}/deleteRDResult', 'RDResultsController@deleteRDResult')->name('deleteRDResult');

//Trademarks
Route::post('admin/addTrademark', 'TrademarksController@addTrademark')->name('addTrademark');
Route::post('admin/{id}/editTrademark', 'TrademarksController@editTrademark')->name('editTrademark');
Route::delete('admin/{id}/deleteTrademark', 'TrademarksController@deleteTrademark')->name('deleteTrademark');

//IndustrialDesigns
Route::post('admin/addIndustrialDesign', 'IndustrialDesignsController@addIndustrialDesign')->name('addIndustrialDesign');
Route::post('admin/{id}/editIndustrialDesign', 'IndustrialDesignsController@editIndustrialDesign')->name('editIndustrialDesign');
Route::delete('admin/{id}/deleteIndustrialDesign', 'IndustrialDesignsController@deleteIndustrialDesign')->name('deleteIndustrialDesign');

//PlantVarietyProtections
Route::post('admin/addPlantVarietyProtection', 'PlantVarietyProtectionsController@addPlantVarietyProtection')->name('addPlantVarietyProtection');
Route::post('admin/{id}/editPlantVarietyProtection', 'PlantVarietyProtectionsController@editPlantVarietyProtection')->name('editPlantVarietyProtection');
Route::delete('admin/{id}/deletePlantVarietyProtection', 'PlantVarietyProtectionsController@deletePlantVarietyProtection')->name('deletePlantVarietyProtection');

//Copyrights
Route::post('admin/addCopyright', 'CopyrightsController@addCopyright')->name('addCopyright');
Route::post('admin/{id}/editCopyright', 'CopyrightsController@editCopyright')->name('editCopyright');
Route::delete('admin/{id}/deleteCopyright', 'CopyrightsController@deleteCopyright')->name('deleteCopyright');


//Caruosel Items
Route::post('admin/manageLandingPage/addCarouselItem', ['uses' => 'CarouselItemsController@addCarouselItem', 'as' => 'carousel.addCarouselItem']);
Route::post('admin/manageLandingPage/{id}/editCarouselItem', ['uses' => 'CarouselItemsController@editCarouselItem', 'as' => 'carousel.editCarouselItem']);

//Header Links
Route::post('admin/manageLandingPage/addHeaderLink', ['uses' => 'HeaderLinksController@addHeaderLink', 'as' => 'carousel.addHeaderLink']);
Route::post('admin/manageLandingPage/{id}/editHeaderLink', ['uses' => 'HeaderLinksController@editHeaderLink', 'as' => 'carousel.editHeaderLink']);

//Logs
Route::post('admin/addLog', 'LogsController@addLog')->name('addLog');
Route::post('admin/downloadLogs', 'LogsController@downloadLogs')->name('downloadLogs');

//Files
Route::post('admin/{id}/uploadFile', 'FilesController@uploadFile')->name('uploadFile');
Route::delete('admin/{id}/deleteFile', 'FilesController@deleteFile')->name('deleteFile');


//Users
Route::post('admin/createUser', 'UsersController@createUser')->name('createUser');
Route::post('admin/{id}/changeUserLevel', 'UsersController@changeUserLevel')->name('changeUserLevel');
Route::delete('admin/{id}/deleteUser', 'UsersController@deleteUser')->name('deleteUser');

Auth::routes();

