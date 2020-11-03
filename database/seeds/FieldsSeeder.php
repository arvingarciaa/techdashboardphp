<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tech_fields')->insert([
            'name' => 'Technology Title',
            'slug' => 'title',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Description',
            'slug' => 'description',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Significance of the Technology',
            'slug' => 'significance',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Target Users',
            'slug' => 'target_users',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Applicability - Region',
            'slug' => 'region',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Applicability - Industry',
            'slug' => 'applicability_industry',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Category',
            'slug' => 'category',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industry',
            'slug' => 'industry',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Sector',
            'slug' => 'sector',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Commodity',
            'slug' => 'commodity',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Year Developed',
            'slug' => 'year_developed',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner',
            'slug' => 'owner',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner - Region',
            'slug' => 'owner_region',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner - Province',
            'slug' => 'owner_province',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner - City/Municipality',
            'slug' => 'owner_municipality',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner - District',
            'slug' => 'owner_district',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Owner - Phone',
            'slug' => 'owner_phone',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator',
            'slug' => 'generator',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator - Affiliation',
            'slug' => 'generator_affiliation',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator - Address',
            'slug' => 'generator_address',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator - Phone',
            'slug' => 'generator_phone',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator - Fax',
            'slug' => 'generator_fax',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Generator - Email',
            'slug' => 'generator_email',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Commercialization',
            'slug' => 'commercialization',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter',
            'slug' => 'adopter',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Type',
            'slug' => 'adopter_type',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Region',
            'slug' => 'adopter_region',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Province',
            'slug' => 'adopter_province',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - City',
            'slug' => 'adopter_city',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Phone',
            'slug' => 'adopter_phone',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Fax',
            'slug' => 'adopter_fax',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Adopter - Email',
            'slug' => 'adopter_email',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Protection Type',
            'slug' => 'protection_type',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Patent Application No.',
            'slug' => 'patent_application',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Patent Date of Filing',
            'slug' => 'patent_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Patent No.',
            'slug' => 'patent_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Patent Registration Date',
            'slug' => 'patent_registration',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Patent Status',
            'slug' => 'patent_status',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Utility Model Application No.',
            'slug' => 'um_application',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Utility Model Date of Filing',
            'slug' => 'um_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Utility Model No.',
            'slug' => 'um_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Utility Model Registration Date',
            'slug' => 'um_registration',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Utility Model Status',
            'slug' => 'um_status',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industrial Design Application No.',
            'slug' => 'industrial_application',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industrial Design Date of Filing',
            'slug' => 'industrial_filing_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industrial Design Registration No.',
            'slug' => 'industrial_registration_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industrial Design Registration Date',
            'slug' => 'industrial_registration_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Industrial Design Status',
            'slug' => 'industrial_status',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Application No.',
            'slug' => 'trademark_appllication',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Date of Filing',
            'slug' => 'trademark_filing_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Registration No.',
            'slug' => 'trademark_registration_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Registration Date',
            'slug' => 'trademark_registration_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Expiration Date',
            'slug' => 'trademark_expiration_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Trademark Status',
            'slug' => 'trademark_status',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright Owner',
            'slug' => 'copyright_owner',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright Publisher',
            'slug' => 'copyright_publisher',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright - Date of Creation',
            'slug' => 'copyright_creation',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright - Date Registered',
            'slug' => 'copyright_registration_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright - Classes',
            'slug' => 'copyright_classes',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright - Registration No.',
            'slug' => 'copyright_registration_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Copyright - Date of Issuance',
            'slug' => 'copyright_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Application No.',
            'slug' => 'pvp_application_no',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Applicant',
            'slug' => 'pvp_applicant',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Crop',
            'slug' => 'pvp_crop',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Proposed Denomination',
            'slug' => 'pvp_denomination',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Description of Variety',
            'slug' => 'pvp_variety',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'PVP - Certificate of PVP No.',
            'slug' => 'pvp_certificate',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'CPVP - Date of Issuance',
            'slug' => 'cpvp_date',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'CPVP - Duration of Protection',
            'slug' => 'cpvp_duration',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - Project Title',
            'slug' => 'basic_title',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - Funding Agency',
            'slug' => 'basic_funding_agency',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - Implementing Agency',
            'slug' => 'basic_implementing_agency',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - Project Cost',
            'slug' => 'basic_cost',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - Start Date',
            'slug' => 'basic_start_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Basic Research - End Date',
            'slug' => 'basic_end_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research',
            'slug' => 'applied_research',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - Project Title',
            'slug' => 'applied_title',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - Funding Agency',
            'slug' => 'applied_funding_agency',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - Implementing Agency',
            'slug' => 'applied_implementing_agency',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - Project Cost',
            'slug' => 'applied_cost',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - Start Date',
            'slug' => 'applied_start_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Applied Research - End Date',
            'slug' => 'applied_end_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Utilization',
            'slug' => 'rdru_utilization',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Project Title',
            'slug' => 'rdru_title',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Funding Agency',
            'slug' => 'rdru_funding_agency',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Implementing Agency',
            'slug' => 'rdru_implementing',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Project Cost',
            'slug' => 'rdru_implementing',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU Start Date',
            'slug' => 'rdru_start_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'RDRU End Date',
            'slug' => 'rdru_end_date',
            'level' => 3,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Beneficiary Type',
            'slug' => 'beneficiary_type',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Beneficiary Name',
            'slug' => 'beneficiary_name',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Beneficiary Region',
            'slug' => 'beneficiary_region',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Beneficiary Province',
            'slug' => 'beneficiary_province',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Beneficiary City',
            'slug' => 'beneficiary_city',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Application of Technology',
            'slug' => 'tech_application',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Limitation of Technology',
            'slug' => 'tech_limitation',
            'level' => 2,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Market Study Summary',
            'slug' => 'market_study',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Valuation Summary',
            'slug' => 'valuation_summary',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Freedom to Operate Summary',
            'slug' => 'operate_summary',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Proposed Term Sheet',
            'slug' => 'term_sheet',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Fairness Opinion Report',
            'slug' => 'opinion_report',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Video Clips',
            'slug' => 'video_clips',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Technology Banner',
            'slug' => 'tech_banner',
            'level' => 1,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Images',
            'slug' => 'images',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Process Flow',
            'slug' => 'process_flow',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tech_fields')->insert([
            'name' => 'Materials/Equipment',
            'slug' => 'materials',
            'level' => 4,
            'created_at' => Carbon::now(), # new \Datetime()
            'updated_at' => Carbon::now(),
        ]);
    }
}
