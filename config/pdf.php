<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
    'public_path'           => base_path('resources/fonts/'),
    'public_storage'        => base_path('storage/app/public/Documents/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '',
    'pdfWrapper'            => 'misterspelik\LaravelPdf\Wrapper\PdfWrapper',
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'Amiri' => [
                'R'  => 'Amiri-Regular.ttf',    // regular font
                'B'  => 'Amiri-Bold.ttf',       // optional: bold font
                'I'  => 'Amiri-Italic.ttf',     // optional: italic font
                'BI' => 'Amiri-BoldItalic.ttf', // optional: bold-italic font
                'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
                'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
            ]
            // ...add as many as you want.
        ]
        // ...
];
