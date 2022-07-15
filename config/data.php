<?php

$path = '/database/sources/';

return [
    'notes' => 'https://docs.google.com/spreadsheets/d/1pk8GW-u6KGvTy7RFRtIGzRqIdvroazGJkF0CpYitSl0/edit#gid=0',
    'sources' => [
        [
            'sid' => 84400281,
            'fid' => 92080291,
            'file' => $path . '11082020_Mwea_Anom.csv',
            'kind' => 'Rice',
            'country' => 'Kenya',
            'company' => 'Mwea Rice',
            'case_number' => 86,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Mwea Rice Data", "to" => ".xlsx", "filename" => "11082020_Mwea_Anom"],
            ],
            'report_url' => '/files/Data-delivery-Mwea.html',
            'submission_date' => "2020-08-01",
        ],
        [
            'sid' => 66630001,
            'fid' => 70650001,
            'file' => $path . '04022020_Egranary_Anom.csv',
            'kind' => 'Maize',
            'country' => 'Kenya',
            'company' => 'E-granary',
            'case_number' => 81,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed E-granary Data", "to" => ".xlsx", "filename" => "04022020_Egranary_Anom"],
            ],
            'report_url' => '/files/Data-delivery-Egranary.html',
            'submission_date' => "2020-01-22",
        ],
        [
            'sid' => 147070008,
            'fid' => 143920001,
            'file' => $path . '2021-03-19_smart_logistics_anom.csv',
            'kind' => 'Beans',
            'country' => 'Kenya',
            'company' => 'Smart Logistics',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Smart Logistics Data", "to" => ".xlsx", "filename" => "2021-03-19_smart_logistics_anom"],
            ],
            'report_url' => '',
            'submission_date' => "2021-03-19",
        ],
        [
            'sid' => 158095822,
            'fid' => 145035285,
            'file' => $path . 'kenya-syngenta_potatoes.csv',
            'kind' => 'Potatoes',
            'country' => 'Kenya',
            'company' => 'Syngenta Potatoes',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Syngenta Potatoes Data", "to" => ".xlsx", "filename" => "kenya-syngenta_potatoes"],
            ],
            'report_url' => '',
            'submission_date' => "2021-03-19",
        ],
        [
            'sid' => 131442923,
            'fid' => 139002776,
            'file' => $path . 'kenya-syngenta_tomatoes.csv',
            'kind' => 'Tomatoes',
            'country' => 'Kenya',
            'company' => 'Syngenta Tomatoes',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Syngenta Tomatoes Data", "to" => ".xlsx" , "filename" => "kenya-syngenta_tomatoes"],
            ],
            'report_url' => '',
            'submission_date' => "2021-03-23",
        ],
        [
            'sid' => 93551183,
            'fid' => 150980836,
            'file' => $path . '2021_tanzania-ussl.csv',
            'kind' => 'Maize',
            'country' => 'Tanzania',
            'company' => 'USSL',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed USSL Data", "to" => ".xlsx", "filename" => "2021_tanzania-ussl"],
            ],
            'report_url' => '/files/Data-delivery-USSL.html',
            'submission_date' => "2021-03-24",
        ],
        [
            'sid' => 135931326,
            'fid' => 151280148,
            'file' => $path . '2021-05-26_EU-Tea-Tanzania_anom_Njombe_Ikanga_farmers.csv',
            'kind' => 'Tea',
            'country' => 'Tanzania',
            'company' => 'EU Tanzania Tea Ikanga',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed EU Tanzania Tea Ikanga Data", "to" => ".xlsx", "filename" => "2021-05-26_EU-Tea-Tanzania_anom_Njombe_Ikanga_farmers"],
            ],
            'report_url' => '/files/Data-delivery-EU-Tanzania_v1_Njombe_Ikanga_farmers.html',
            'submission_date' => "2021-05-11",
        ],
        [
            'sid' => 154440305,
            'fid' => 161010267,
            'file' => $path . '2021-06-02_EU_Tea_Tanzania_anom_Njombe_nonIkanga_farmers.csv',
            'kind' => 'Tea',
            'country' => 'Tanzania',
            'company' => 'EU Tanzania Tea Non Ikanga',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed EU Tanzania Tea Non Ikanga Data", "to" => ".xlsx", "filename" => "2021-06-02_EU_Tea_Tanzania_anom_Njombe_nonIkanga_farmers"],
            ],
            'report_url' => '/files/Data-delivery-EU-Tanzania_v1_Njombe_nonIkanga_farmers.html',
            'submission_date' => "2021-05-11",
        ],
        [
            'sid' => 195440268,
            'fid' => 193410232,
            'file' => $path . '2021_RGL_anom_rice.csv',
            'kind' => 'Rice',
            'country' => 'Tanzania',
            'company' => 'RGL Anom Rice',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed RGL Anom Rice Data", "to" => ".xlsx", "filename" => "2021_RGL_anom_rice"],
            ],
            'report_url' => null,
            'submission_date' => "2021-09-14",
        ],
        [
            'sid' => 202340055,
            'fid' => 179600043,
            'file' => $path . '2021_RGL_anom_beans.csv',
            'kind' => 'Beans',
            'country' => 'Tanzania',
            'company' => 'RGL Anom Beans',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed RGL Anom Beans Data", "to" => ".xlsx", "filename" => "2021_RGL_anom_beans"],
            ],
            'report_url' => null,
            'submission_date' => "2021-09-14",
        ],
        [
            'sid' => 87951728,
            'fid' => 103261708,
            'file' => $path . '2020-11-20_Rubutco_Anom.csv',
            'kind' => 'Tea',
            'country' => 'Tanzania',
            'company' => 'Rubutco Tea',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Rubutco Tea Data", "to" => ".xlsx", "filename" => "2020-11-20_Rubutco_Anom.csv"],
            ],
            'report_url' => null,
            'submission_date' => "2020-10-20",
        ],
        [
            'sid' => 134600045,
            'fid' => 148080024,
            'file' => $path . '2021-04-07_Kenya_NKG_Anom.csv',
            'kind' => 'Coffee',
            'country' => 'Kenya',
            'company' => 'NKG',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed NKG Coffee Data", "to" => ".xlsx", "filename" => "2021-04-07_Kenya_NKG_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-01-20",
        ],
        [
            'sid' => 135541659,
            'fid' => 150961460,
            'file' => $path . '2021-04-12_Honduras_NKG_Anom.csv',
            'kind' => 'Coffee',
            'country' => 'Honduras',
            'company' => 'NKG',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed NKG Coffee Data", "to" => ".xlsx", "filename" => "2021-04-12_Honduras_NKG_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-03-01",
        ],
        [
            'sid' => 146683436,
            'fid' => 150660752,
            'file' => $path . '2021-04-12_Uganda_NKG_Anom.csv',
            'kind' => 'Coffee',
            'country' => 'Uganda',
            'company' => 'NKG',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed NKG Coffee Data", "to" => ".xlsx", "filename" => "2021-04-12_Uganda_NKG_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-02-02",
        ],
        [
            'sid' => 137051412,
            'fid' => 133211292,
            'file' => $path . '2021-04-15_Mexico_NKG_Anom.csv',
            'kind' => 'Coffee',
            'country' => 'Mexico',
            'company' => 'NKG',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed NKG Coffee Data", "to" => ".xlsx", "filename" => "2021-04-15_Mexico_NKG_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-02-23",
        ],
        [
            'sid' => 160395970,
            'fid' => 147385591,
            'file' => $path . '2021-05-14_AIF_Anom_nyagatare_and_kirehe.csv',
            'kind' => 'Maize',
            'country' => 'Rwanda',
            'company' => 'AIF',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed AIF Maize Data", "to" => ".xlsx", "filename" => "2021-05-14_AIF_Anom_nyagatare_and_kirehe"],
            ],
            'report_url' => null,
            'submission_date' => "2021-04-20",
        ],
        [
            'sid' => 70530002,
            'fid' => 42870004,
            'file' => $path . '2021-06-29_Alluvial_anom.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Alluvial',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Alluvial Rice Data", "to" => ".xlsx", "filename" => "2021-06-29_Alluvial_anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-04-06",
        ],
        [
            'sid' => 40690006,
            'fid' => 76180126,
            'file' => $path . '2021-06-29_Coscharis_anom.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Coscharis',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Coscharis Rice Data", "to" => ".xlsx", "filename" => "2021-06-29_Coscharis_anom"],
            ],
            'report_url' => null,
            'submission_date' => "2021-04-14",
        ],
        [
            'sid' => 4310019,
            'fid' => 24390001,
            'file' => $path . '04102019_AGRI_WALLET_anonymized.csv',
            'kind' => 'Potatoes',
            'country' => 'Kenya',
            'company' => 'Agri Wallet',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Agri Wallet Potatoes Data", "to" => ".xlsx", "filename" => "04102019_AGRI_WALLET_anonymized"],
            ],
            'report_url' => null,
            'submission_date' => "2019-09-03",
        ],
        [
            'sid' => 70020001,
            'fid' => 60130060,
            'file' => $path . '12122019_Sparkx_Anom.csv',
            'kind' => 'Rice',
            'country' => 'Ghana',
            'company' => 'Sparkx',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Sparkx Rice Data", "to" => ".xlsx", "filename" => "12122019_Sparkx_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2019-11-12",
        ],
        [
            'sid' => 11050005,
            'fid' => 1040007,
            'file' => $path . '12122019_USOMI.csv',
            'kind' => 'Millet',
            'country' => 'Kenya',
            'company' => 'USOMI',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed USOMI Millet Data", "to" => ".xlsx", "filename" => "12122019_USOMI"],
            ],
            'report_url' => null,
            'submission_date' => "2019-10-01",
        ],
        [
            'sid' => 20191017, # not real sid from flow
            'fid' => 17102019, # not real fid from flow
            'file' => $path . '17102019_NFC.csv',
            'kind' => 'Tree',
            'country' => 'Uganda',
            'company' => 'NFC',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed NFC Tree Data", "to" => ".xlsx", "filename" => "17102019_NFC"],
            ],
            'report_url' => null,
            'submission_date' => "2019-10-17",
        ],
        [
            'sid' => 102680038,
            'fid' => 82910030,
            'file' => $path . '20082020_Batian_Anom.csv',
            'kind' => 'Macadamia',
            'country' => 'Kenya',
            'company' => 'Batian Nuts',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Batian Nuts Macadamia Data", "to" => ".xlsx", "filename" => "20082020_Batian_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2020-08-20",
        ],
        [
            'sid' => 28970006,
            'fid' => 24830008,
            'file' => $path . '20190904_Bulamu_Anom.csv',
            'kind' => 'Coffee',
            'country' => 'Uganda',
            'company' => 'Bulamu',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Bulamu Coffee Data", "to" => ".xlsx", "filename" => "20190904_Bulamu_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2019-08-04",
        ],
        [
            'sid' => 20191211, # not real id
            'fid' => 11122019, # not real id
            'file' => $path . '11122019_Coscharis_Anom.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Coscharis 2',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Coscharis 2 Rice Data", "to" => ".xlsx", "filename" => "11122019_Coscharis_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2019-11-11",
        ],
        [
            'sid' => 51260001,
            'fid' => 53320001,
            'file' => $path . '26032020_Musoni_Maize.csv',
            'kind' => 'Maize',
            'country' => 'Kenya',
            'company' => 'Musoni Maize',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Musoni Maize Data", "to" => ".xlsx", "filename" => "26032020_Musoni_Maize"],
            ],
            'report_url' => null,
            'submission_date' => "2020-03-26",
        ],
        [
            'sid' => 512600019, # not real id
            'fid' => 533200019, # not real id
            'file' => $path . '26032020_Musoni_Sorghum.csv',
            'kind' => 'Sorghum',
            'country' => 'Kenya',
            'company' => 'Musoni Sorghum',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Musoni Sorghum Data", "to" => ".xlsx", "filename" => "26032020_Musoni_Sorghum"],
            ],
            'report_url' => null,
            'submission_date' => "2020-03-26",
        ],
        [
            'sid' => 18960013,
            'fid' => 29060011,
            'file' => $path . '30012020_McCormick_Anom.csv',
            'kind' => 'Black Pepper',
            'country' => 'Uganda',
            'company' => 'McCormick',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed McCormick Black Pepper Data", "to" => ".xlsx", "filename" => "30012020_McCormick_Anom"],
            ],
            'report_url' => null,
            'submission_date' => "2019-11-07",
        ],
        [
            'sid' => 920191212, # not real id
            'fid' => 1212201909, # not real id
            'file' => $path . '12122019_Alluvial.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Alluvial 2',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Alluvial 2 Rice Data", "to" => ".xlsx", "filename" => "12122019_Alluvial"],
            ],
            'report_url' => null,
            'submission_date' => "2019-10-12",
        ],
        [
            'sid' => 2041040322,  # not real id
            'fid' => 2042040322,  # not real id
            'file' => $path . '2022_sucafina_anom_coffee-All_farmers_and_all_counties.csv',
            'kind' => 'Coffee',
            'country' => 'Kenya',
            'company' => 'Kenyacof',
            'case_number' => 118,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Sucafina Coffee Data", "to" => ".xlsx", "filename" => "2022_sucafina_anom_coffee-All_farmers_and_all_counties"],
            ],
            'report_url' => null,
            'submission_date' => "2022-03-04",
        ],
        [
            'sid' => 2044070322,
            'fid' => 2045070322,
            'file' => $path . '10032022_sucden_anom.csv',
            'kind' => 'Cocoa',
            'country' => "cote-divoire",
            'country_name' => "Côte d'Ivoire",
            'company' => 'Sucden',
            'case_number' => 112,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Sucden Cocoa Data", "to" => ".xlsx", "filename" => "10032022_sucden_anom"],
            ],
            'report_url' => null,
            'submission_date' => "2022-03-07", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022052101,
            'fid' => 1020220521,
            'file' => $path . '2022_lmm_anom_maize_sorghum.csv',
            'kind' => 'Maize & Sorghum',
            'country' => "Uganda",
            'company' => 'Landmark Millers',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Landmark Millers Maize & Sorghum", "to" => ".xlsx", "filename" => "2022_lmm_anom_maize_sorghum"],
            ],
            'report_url' => null,
            'submission_date' => "2022-05-21", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022060401,
            'fid' => 1020220604,
            'file' => $path . '2022_afrokai_anom_maize_sorghum.csv',
            'kind' => 'Maize & Sorghum',
            'country' => "Uganda",
            'company' => 'Afrokai Anom Maize & Sorghum',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Afrokai Maize & Sorghum", "to" => ".xlsx", "filename" => "2022_afrokai_anom_maize_sorghum"],
            ],
            'report_url' => null,
            'submission_date' => "2022-06-04", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022060402,
            'fid' => 2020220604,
            'file' => $path . '2022_afrokai_anom_potatoes.csv',
            'kind' => 'Potatoes',
            'country' => "Rwanda",
            'company' => 'Afrokai Anom Potatoes',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Afrokai Potatoes", "to" => ".xlsx", "filename" => "2022_afrokai_anom_potatoes"],
            ],
            'report_url' => null,
            'submission_date' => "2022-06-04", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022062501,
            'fid' => 1020220625,
            'file' => $path . '2022_CF_anom_sunflowerseeds.csv',
            'kind' => 'Sunflower Seeds',
            'country' => "Tanzania",
            'company' => 'Connected Farmers',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Connected Farmers Sunflower Seeds", "to" => ".xlsx", "filename" => "2022_CF_anom_sunflowerseeds"],
            ],
            'report_url' => null,
            'submission_date' => "2022-06-25", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],

        // [ // example
        //     'sid' => 12345,
        //     'fid' => 54321,
        //     'file' => $path . 'xvx.csv',
        //     'kind' => 'zzz',
        //     'country' => 'zzz',
        //     'country_name' => "Côte d'Ivoire", // to provide country name with symbol
        //     'company' => 'zzz',
        //     'case_number' => null,
        //     'cascade' => [
        //         'name' => 'pi_location_cascade_first_level',
        //     ],
        //     'files' => [
        //         ["type" => "raw", "text" => "Analyzed XXX Data", "to" => ".xlsx", "filename" => "xvx"],
        //     ],
        //     'report_url' => null,
        //     'submission_date' => null, // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        // ],
    ],
    'relations' => [
        [
            'name' => 'f_first_crop',
            'level' => 1,
            'children' => 'f_ownership'
        ],
        [
            'name' => 'f_ownership',
            'level' => 2,
            'children' => 'f_sdm_size'
        ],
    ],
];
