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
        ],

        # TODO::Paste New start from here
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
    // will add to sources
    'sources_new' => [
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
        ],
        [
            'sid' => 145290014,
            'fid' => 137381206,
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
        ],
    ],
];
