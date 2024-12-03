<?php

use App\Helpers\RevWPClass;

// use Fiskhandlarn\Blade;

if (!class_exists('Autoloader')) {
    class Autoloader
    {
        private $repositories;

        /**
         * Constructor
         */
        public function __construct($repositories)
        {
            $this->repositories = $repositories;
            $this->run();

            global $revwp;
            $revwp = new RevWPClass();
        }

        /**
         * Autoload folder in attributes repositories
         */
        public function run()
        {
            if (!empty($this->repositories)) {
                foreach ($this->repositories as $repository) {
                    $this->loadRepository($repository);
                }
            }
        }

        /**
         * Load all file in repository
         *
         * @param string $dir
         * @return void
         */
        public function loadRepository($dir)
        {
            $dir = realpath($dir);

            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }

            $allFiles = scandir($dir);
            $allFilesDir = array_diff($allFiles, array(
                '.',
                '..'
            ));

            if (!empty($allFilesDir)) {
                foreach ($allFilesDir as $file) {
                    $pathfile = $dir . '/' . $file;
                    if (!is_dir($pathfile)) {
                        require($pathfile);
                    }
                }
            }
        }
    }
}
