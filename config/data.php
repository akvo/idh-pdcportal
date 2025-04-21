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
                ["type" => "raw", "text" => "Analyzed Syngenta Tomatoes Data", "to" => ".xlsx", "filename" => "kenya-syngenta_tomatoes"],
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
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_maize_sorghum',
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
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_maize_sorghum',
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
        [
            'sid' => 2022112101,
            'fid' => 1020221121,
            'file' => $path . '2022_Farmworks_anom_french_beans_sweet_corn.csv',
            'kind' => 'Sweet Corn and French Beans',
            'country' => 'Kenya',
            'company' => 'Framworks 2022',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Framworks Sweet Corn and French Beans 2022 Data", "to" => ".xlsx", "filename" => "2022_Farmworks_anom_french_beans_sweet_corn"],
            ],
            'report_url' => null,
            'submission_date' => "2022-11-12", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022120101,
            'fid' => 1020221201,
            'file' => $path . '2022_growpact_anom_tomato_cabbage.csv',
            'kind' => 'Tomato and Cabbage',
            'country' => 'Kenya',
            'company' => 'Growpact 2022',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Growpact Tomato and Cabbage 2022 Data", "to" => ".xlsx", "filename" => "2022_growpact_anom_tomato_cabbage"],
            ],
            'report_url' => null,
            'submission_date' => "2022-11-16", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022122001,
            'fid' => 1020221220,
            'file' => $path . '2022_Goshen_anom_mango.csv',
            'kind' => 'Mango',
            'country' => 'Kenya',
            'company' => 'Goshen Mango',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Goshen Mango Data", "to" => ".xlsx", "filename" => "2022_Goshen_anom_mango"],
            ],
            'report_url' => null,
            'submission_date' => "2022-12-09", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022122002,
            'fid' => 2020221220,
            'file' => $path . '2022_Goshen_anom_pineapple.csv',
            'kind' => 'Pineapple',
            'country' => 'Kenya',
            'company' => 'Goshen Pineapple',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Goshen Pineapple Data", "to" => ".xlsx", "filename" => "2022_Goshen_anom_pineapple"],
            ],
            'report_url' => null,
            'submission_date' => "2022-12-09", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2022121701,
            'fid' => 1020221217,
            'file' => $path . '2022_CHC_anom_maize_soybeans.csv',
            'kind' => 'Maize & Soybean',
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_maize_soybean',
            'country' => 'Zambia',
            'company' => 'CHC Zambia',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed CHC Maize & Soybean Data", "to" => ".xlsx", "filename" => "2022_CHC_anom_maize_soybeans"],
            ],
            'report_url' => null,
            'submission_date' => "2022-12-17", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023071801,
            'fid' => 1020230718,
            'file' => $path . '2023_guinness_anom_sorghum.csv',
            'kind' => 'Sorghum',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Nigeria',
            'company' => 'Guinness Nigeria',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Guinness Sorghum Data", "to" => ".xlsx", "filename" => "2023_guinness_anom_sorghum"],
            ],
            'report_url' => null,
            'submission_date' => "2023-07-09", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023072601,
            'fid' => 1020230726,
            'file' => $path . '2023_TGI_anom_sesame.csv',
            'kind' => 'Sesame',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Nigeria',
            'company' => 'TGI Sesame',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed TGI Sesame Data", "to" => ".xlsx", "filename" => "2023_TGI_anom_sesame"],
            ],
            'report_url' => null,
            'submission_date' => "2023-07-16", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023072602,
            'fid' => 2020230726,
            'file' => $path . '2023_TGI_anom_soy.csv',
            'kind' => 'Soy',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Nigeria',
            'company' => 'TGI Soy',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed TGI Soy Data", "to" => ".xlsx", "filename" => "2023_TGI_anom_soy"],
            ],
            'report_url' => null,
            'submission_date' => "2023-07-16", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023081401,
            'fid' => 1020230814,
            'file' => $path . '2023_USSL_anom_maize_endline.csv',
            'kind' => 'Maize',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Tanzania',
            'company' => 'USSL Maize Endline',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed USSL Maize Endline Data", "to" => ".xlsx", "filename" => "2023_USSL_anom_maize_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-05", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023082101,
            'fid' => 1020230821,
            'file' => $path . '2023_rgl_anom_beans.csv',
            'kind' => 'Beans',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Tanzania',
            'company' => 'RGL Anom Beans 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed RGL Anom Beans 2023 Data", "to" => ".xlsx", "filename" => "2023_rgl_anom_beans"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-12", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023082102,
            'fid' => 2020230821,
            'file' => $path . '2023_rgl_anom_rice.csv',
            'kind' => 'Rice',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Tanzania',
            'company' => 'RGL Anom Rice 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed RGL Anom Rice 2023 Data", "to" => ".xlsx", "filename" => "2023_rgl_anom_rice"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-13", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023090501,
            'fid' => 1020230905,
            'file' => $path . '2023_Smart_Logistics_anom_beans_endline.csv',
            'kind' => 'Beans',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Kenya',
            'company' => 'Smart Logistics Beans 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Smart Logistics Beans 2023 Data", "to" => ".xlsx", "filename" => "2023_Smart_Logistics_anom_beans_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-26", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023090502,
            'fid' => 2020230905,
            'file' => $path . '2023_Syngenta_anom_potatoes_endline.csv',
            'kind' => 'Potatoes',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Kenya',
            'company' => 'Syngenta Potatoes 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Syngenta Potatoes 2023 Data", "to" => ".xlsx", "filename" => "2023_Syngenta_anom_potatoes_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-27", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023090503,
            'fid' => 3020230905,
            'file' => $path . '2023_Syngenta_anom_tomatoes_endline.csv',
            'kind' => 'Tomatoes',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Kenya',
            'company' => 'Syngenta Tomatoes 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Syngenta Tomatoes 2023 Data", "to" => ".xlsx", "filename" => "2023_Syngenta_anom_tomatoes_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2023-08-26", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2023110301,
            'fid' => 1020231103,
            'file' => $path . '2023_SD_anom_Maize-and-Soybean_baseline.csv',
            'kind' => 'Maize and Soybean',
            'country' => 'Ethiopia',
            'company' => 'SD 2023',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed SD Maize and Soybean Data", "to" => ".xlsx", "filename" => "2023_SD_anom_Maize-and-Soybean_baseline"],
            ],
            'report_url' => null,
            'submission_date' => "2023-10-22", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024030401,
            'fid' => 1020240304,
            'file' => $path . '2024_Alluvial_anom_rice_endline.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Alluvial 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Alluvial 2024 Rice Data", "to" => ".xlsx", "filename" => "2024_Alluvial_anom_rice_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-02-20", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024031201,
            'fid' => 1020240312,
            'file' => $path . '2024_Coscharis_anom_rice_endline.csv',
            'kind' => 'Rice',
            'country' => 'Nigeria',
            'company' => 'Coscharis 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Coscharis 2024 Rice Data", "to" => ".xlsx", "filename" => "2024_Coscharis_anom_rice_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-02-23", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024032001,
            'fid' => 1020240320,
            'file' => $path . '2024_AIF_anom_maize_endline.csv',
            'kind' => 'Maize',
            'country' => 'Rwanda',
            'company' => 'AIF 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed AIF 2024 Maize Data", "to" => ".xlsx", "filename" => "2024_AIF_anom_maize_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-03-09", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024051501,
            'fid' => 1020240515,
            'file' => $path . '2024_Afro-kai-Limited_anom_maize_and_sorghum_endline_v2.csv',
            'kind' => 'Maize & Sorghum',
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_maize_sorghum',
            'country' => "Uganda",
            'company' => 'Afrokai Anom Maize & Sorghum 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Afrokai Maize & Sorghum 2024 Data", "to" => ".xlsx", "filename" => "2024_Afro-kai-Limited_anom_maize_and_sorghum_endline_v2"],
            ],
            'report_url' => null,
            'submission_date' => "2024-04-19", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024051502,
            'fid' => 2020240515,
            'file' => $path . '2024_Afro-kai-Limited_anom_potatoes_endline_v2.csv',
            'kind' => 'Potatoes',
            'country' => "Uganda",
            'company' => 'Afrokai Anom Potatoes 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Afrokai Potatoes 2024 Data", "to" => ".xlsx", "filename" => "2024_Afro-kai-Limited_anom_potatoes_endline_v2"],
            ],
            'report_url' => null,
            'submission_date' => "2024-04-16", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024051503,
            'fid' => 3020240515,
            'file' => $path . '2024_landmark_anom_maize_and_sorghom_endline_v2.csv',
            'kind' => 'Maize & Sorghum',
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_maize_sorghum',
            'country' => "Uganda",
            'company' => 'Landmark Millers Anom Maize & Sorghum 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Landmark Millers Maize & Sorghum 2024 Data", "to" => ".xlsx", "filename" => "2024_landmark_anom_maize_and_sorghom_endline_v2"],
            ],
            'report_url' => null,
            'submission_date' => "2024-04-20", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024052401,
            'fid' => 1020240524,
            'file' => $path . '2024_Tamanaa_anom_rice_endline.csv',
            'kind' => 'Rice',
            'country' => "Ghana",
            'company' => 'Tamanaa Anom Rice 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Tamanaa Rice 2024 Data", "to" => ".xlsx", "filename" => "2024_Tamanaa_anom_rice_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-05-06", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024052402,
            'fid' => 2020240524,
            'file' => $path . '2024_Agrictrade_anom_rice_endline.csv',
            'kind' => 'Rice',
            'country' => "Ghana",
            'company' => 'Agrictrade Anom Rice 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Agrictrade Rice 2024 Data", "to" => ".xlsx", "filename" => "2024_Agrictrade_anom_rice_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-05-08", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024052403,
            'fid' => 3020240524,
            'file' => $path . '2024_Growpact_anom_tomatoes_and_cabbages_endline.csv',
            'kind' => 'Tomatoes & Cabbages',
            'multi_crop' => true,
            'multi_crop_variable' => 'focus_crop_carbagges_tomatoes',
            'country' => "Kenya",
            'company' => 'Growpact Anom Tomatoes & Cabbages 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Growpact Tomatoes & Cabbages 2024 2024 Data", "to" => ".xlsx", "filename" => "2024_Growpact_anom_tomatoes_and_cabbages_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-05-14", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024053101,
            'fid' => 1020240531,
            'file' => $path . '2024_Farmworks_anom_French_beans_endline.csv',
            'kind' => 'French Beans',
            'country' => "Kenya",
            'company' => 'Framworks',
            'case_number' => 5215,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Framworks French Beans 2024 Data", "to" => ".xlsx", "filename" => "2024_Farmworks_anom_French_beans_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-05-25", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024062601,
            'fid' => 1020240626,
            'file' => $path . '2024_Goshen_anom_Mangoes_endline.csv',
            'kind' => 'Mango',
            'country' => 'Kenya',
            'company' => 'Goshen Mango 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Goshen Mango 2024 Data", "to" => ".xlsx", "filename" => "2024_Goshen_anom_Mangoes_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-06-15", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024062602,
            'fid' => 2020240626,
            'file' => $path . '2024_Goshen_anom_Pineapples_endline.csv',
            'kind' => 'Pineapple',
            'country' => 'Kenya',
            'company' => 'Goshen Pineapple 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Goshen Pineapple 2024 Data", "to" => ".xlsx", "filename" => "2024_Goshen_anom_Pineapples_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-06-14", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024083001,
            'fid' => 1020240830,
            'file' => $path . '2024_Avanti_anom_Carrots_endline.csv',
            'kind' => 'Carrot',
            'country' => 'India',
            'company' => 'Avanti Carrot 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Avanti Carrot 2024 Data", "to" => ".xlsx", "filename" => "2024_Avanti_anom_Carrots_endline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-08-19", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2024083002,
            'fid' => 2020240830,
            'file' => $path . '2024_Avanti_anom_Dairy_baseline.csv',
            'kind' => 'Dairy',
            'country' => 'India',
            'company' => 'Avanti Dairy 2024',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Avanti Dairy 2024 Data", "to" => ".xlsx", "filename" => "2024_Avanti_anom_Dairy_baseline"],
            ],
            'report_url' => null,
            'submission_date' => "2024-08-12", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],
        [
            'sid' => 2025042101,
            'fid' => 1020042025,
            'file' => $path . '2025_Okomu_anom_palm_oil_baseline.csv',
            'kind' => 'Palm Oil',
            'multi_crop' => false,
            'multi_crop_variable' => null,
            'country' => 'Nigeria',
            'company' => 'Okomu 2025',
            'case_number' => null,
            'cascade' => [
                'name' => 'pi_location_cascade_first_level',
            ],
            'files' => [
                ["type" => "raw", "text" => "Analyzed Okumu Palm Oil 2025 Data", "to" => ".xlsx", "filename" => "2025_Okomu_anom_palm_oil_baseline"],
            ],
            'report_url' => null,
            'submission_date' => "2025-04-07", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        ],


        # test remove variable
        // [
        //     'sid' => 2023080701,
        //     'fid' => 1020230807,
        //     'file' => $path . 'test_rv_2023_guinness_anom_sorghum.csv',
        //     'kind' => 'Sorghum',
        //     'multi_crop' => false,
        //     'multi_crop_variable' => null,
        //     'country' => 'Nigeria',
        //     'company' => 'Test Guinness Nigeria Removed Variable',
        //     'case_number' => null,
        //     'cascade' => [
        //         'name' => 'pi_location_cascade_first_level',
        //     ],
        //     'files' => [
        //         ["type" => "raw", "text" => "Analyzed Test Guinness Sorghum with Removed Variable Data", "to" => ".xlsx", "filename" => "test_rv_2023_guinness_anom_sorghum"],
        //     ],
        //     'report_url' => null,
        //     'submission_date' => "2023-07-09", // fill this submission date if no submission date on dataset, format YYYY-MM-DD
        // ],
        # end of test remove variable

        // [ // example
        //     'sid' => 12345,
        //     'fid' => 54321,
        //     'file' => $path . 'xvx.csv',
        //     'kind' => 'zzz',
        //     'multi_crop' => false, // true if more than 1 crop (or remove)
        //     'multi_crop_variable' => 'focus_crop_maize_sorghum', // add this if more than 1 crop
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
