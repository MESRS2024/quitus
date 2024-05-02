<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

if (!function_exists('getAllModels')) {
    function getAllModels()
    {
        $models = [];

        // Get all the files in the "app/Models" directory
        $files = File::allFiles(app_path('Models'));

        foreach ($files as $file) {
            // Get the class name of the file
            $class_name = File::name($file);

            // Check if the class is a model
            if (is_subclass_of("App\\Models\\{$class_name}", 'Illuminate\\Database\\Eloquent\\Model')) {
                $models[] = "{$class_name}";
            }
        }

        return $models;
    }
}


if (!function_exists('generateAllPolicies')){

    function generateAllPolicies()
    {
        // Get all the files in the "app/Models" directory
        $files = File::allFiles(app_path('Models'));

        foreach ($files as $file) {
            // Get the class name of the file
            $class_name = File::name($file);

            // Check if the class is a model
            if (is_subclass_of("App\\Models\\{$class_name}", 'Illuminate\\Database\\Eloquent\\Model')) {
                // Generate the policy for the model
                Artisan::call('make:policy', [
                    'name' => "{$class_name}Policy",
                    '--model' => "Models\\{$class_name}",
                ]);
            }
        }

        return 0;
    }
}
