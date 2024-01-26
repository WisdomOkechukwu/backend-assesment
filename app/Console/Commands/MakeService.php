<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle(Filesystem $filesystem)
    {
        $name = $this->argument('name');
        $className = Str::studly($name);

        $path = app_path("Services/{$className}.php");

        if ($filesystem->exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        $filesystem->put($path, $this->generateServiceClass($className));

        $this->info('Service created successfully!');
    }

    protected function generateServiceClass($className)
    {
        return <<<CLASS
        <?php

        namespace App\Services;

        class {$className}
        {
            // Add your methods here
        }
        CLASS;
    }
}
