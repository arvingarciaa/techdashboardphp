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
Route::get('/admin/manageLandingPage', 'PagesController@manageLandingPage')->name('pages.manageLandingPage');
Route::post('admin/fetchDependent', 'PagesController@fetchDependent')->name('fetchDependent');

//API
Route::get('/data/current', 'PagesController@getJSON')->name('pages.getJSON');

//Sectors
Route::post('admin/addSector', 'SectorsController@addSector')->name('addSector');
Route::post('admin/{id}/editSector', 'SectorsController@editSector')->name('editSector');
Route::delete('admin/{id}/deleteSector', 'SectorsController@deleteSector')->name('deleteSector');

//Industries
Route::post('admin/addIndustry', 'IndustriesController@addIndustry')->name('addIndustry');
Route::post('admin/{id}/editIndustry', 'IndustriesController@editIndustry')->name('editIndustry');
Route::delete('admin/{id}/deleteIndustry', 'IndustriesController@deleteIndustry')->name('deleteIndustry');

//Commodities
Route::post('admin/addCommodity', 'CommoditiesController@addCommodity')->name('addCommodity');
Route::post('admin/{id}/editCommodity', 'CommoditiesController@editCommodity')->name('editCommodity');
Route::delete('admin/{id}/deleteCommodity', 'CommoditiesController@deleteCommodity')->name('deleteCommodity');

//Protection Types
Route::post('admin/addProtectionType', 'ProtectionTypesController@addProtectionType')->name('addProtectionType');
Route::post('admin/{id}/editProtectionType', 'ProtectionTypesController@editProtectionType')->name('editProtectionType');
Route::delete('admin/{id}/deleteProtectionType', 'ProtectionTypesController@deleteProtectionType')->name('deleteProtectionType');

//Adopter Types
Route::post('admin/addAdopterType', 'AdopterTypesController@addAdopterType')->name('addAdopterType');
Route::post('admin/{id}/editAdopterType', 'AdopterTypesController@editAdopterType')->name('editAdopterType');
Route::delete('admin/{id}/deleteAdopterType', 'AdopterTypesController@deleteAdopterType')->name('deleteAdopterType');

//Adopter
Route::post('admin/addAdopter', 'AdoptersController@addAdopter')->name('addAdopter');
Route::post('admin/{id}/editAdopter', 'AdoptersController@editAdopter')->name('editAdopter');
Route::delete('admin/{id}/deleteAdopter', 'AdoptersController@deleteAdopter')->name('deleteAdopter');

//Generator
Route::post('admin/addGenerator', 'GeneratorsController@addGenerator')->name('addGenerator');
Route::post('admin/{id}/editGenerator', 'GeneratorsController@editGenerator')->name('editGenerator');
Route::delete('admin/{id}/deleteGenerator', 'GeneratorsController@deleteGenerator')->name('deleteGenerator');

//Agency Types
Route::post('admin/addAgencyType', 'AgencyTypesController@addAgencyType')->name('addAgencyType');
Route::post('admin/{id}/editAgencyType', 'AgencyTypesController@editAgencyType')->name('editAgencyType');
Route::delete('admin/{id}/deleteAgencyType', 'AgencyTypesController@deleteAgencyType')->name('deleteAgencyType');

//Agency
Route::post('admin/addAgency', 'AgenciesController@addAgency')->name('addAgency');
Route::post('admin/{id}/editAgency', 'AgenciesController@editAgency')->name('editAgency');
Route::delete('admin/{id}/deleteAgency', 'AgenciesController@deleteAgency')->name('deleteAgency');

//PotentialAdopter
Route::post('admin/addPotentialAdopter', 'PotentialAdoptersController@addPotentialAdopter')->name('addPotentialAdopter');
Route::post('admin/{id}/editPotentialAdopter', 'PotentialAdoptersController@editPotentialAdopter')->name('editPotentialAdopter');
Route::delete('admin/{id}/deletePotentialAdopter', 'PotentialAdoptersController@deletePotentialAdopter')->name('deletePotentialAdopter');

//Funding Types
Route::post('admin/addFundingType', 'FundingTypesController@addFundingType')->name('addFundingType');
Route::post('admin/{id}/editFundingType', 'FundingTypesController@editFundingType')->name('editFundingType');
Route::delete('admin/{id}/deleteFundingType', 'FundingTypesController@deleteFundingType')->name('deleteFundingType');

//Technology Categories
Route::post('admin/addTechnologyCategory', 'TechnologyCategoriesController@addTechnologyCategory')->name('addTechnologyCategory');
Route::post('admin/{id}/editTechnologyCategory', 'TechnologyCategoriesController@editTechnologyCategory')->name('editTechnologyCategory');
Route::delete('admin/{id}/deleteTechnologyCategory', 'TechnologyCategoriesController@deleteTechnologyCategory')->name('deleteTechnologyCategory');

//Technologies
Route::post('admin/addTechnology', 'TechnologiesController@addTechnology')->name('addTechnology');
Route::post('admin/{id}/editTechnology', 'TechnologiesController@editTechnology')->name('editTechnology');
Route::delete('admin/{id}/deleteTechnology', 'TechnologiesController@deleteTechnology')->name('deleteTechnology');

//Patents
Route::post('admin/addPatent', 'PatentsController@addPatent')->name('addPatent');
Route::post('admin/{id}/editPatent', 'PatentsController@editPatent')->name('editPatent');
Route::delete('admin/{id}/deletePatent', 'PatentsController@deletePatent')->name('deletePatent');

//UtilityModels
Route::post('admin/addUtilityModel', 'UtilityModelsController@addUtilityModel')->name('addUtilityModel');
Route::post('admin/{id}/editUtilityModel', 'UtilityModelsController@editUtilityModel')->name('editUtilityModel');
Route::delete('admin/{id}/deleteUtilityModel', 'UtilityModelsController@deleteUtilityModel')->name('deleteUtilityModel');

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


//Manage
Route::post('admin/manageLandingPage/addCarouselItem', ['uses' => 'CarouselItemsController@addCarouselItem', 'as' => 'carousel.addCarouselItem']);
Route::post('admin/manageLandingPage/{id}/editCarouselItem', ['uses' => 'CarouselItemsController@editCarouselItem', 'as' => 'carousel.editCarouselItem']);


Auth::routes();

