<?php
namespace Novadevs\Simultra\Base\Commands;

use Illuminate\Console\Command;

use Novadevs\Simultra\Base\Repositories\ModuleRepository;

class InstallModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simultra-wms-install:base';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Warehouse Management Tool base module for Simultra project';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'layouts/app.stub'          => 'layouts/app.blade.php',
        'layouts/sidebar-nav.stub'  => 'layouts/sidebar-nav.blade.php',
        'layouts/topbar-nav.stub'   => 'layouts/topbar-nav.blade.php',

        'home.stub'                 => 'home.blade.php',
	'welcome.stub'		    => 'welcome.blade.php',
        'setup/setup.stub'          => 'setup/setup.blade.php',
        'setup/setup.modules.stub'  => 'setup/setup-modules.blade.php',

        'setup/company/show.stub'   => 'setup/company/show.blade.php',
        'setup/company/create.stub' => 'setup/company/create.blade.php',
        'setup/company/edit.stub' => 'setup/company/edit.blade.php',
    ];

    /**
     * The commands that need to be run.
     *
     * @var array
     */
    protected $commands = [
        // 'make:auth',
        // 'vendor:publish --provider=Novadevs\Simultra\Base\BaseServiceProvider',
        // 'vendor:publish --tag=novadevs-base-config',
        // 'vendor:publish --tag=novadevs-base-views',
        // 'vendor:publish --tag=novadevs-base-assets',
        // 'storage:link'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle the command execution persisting the module.
     *
     * @return mixed
     */
    public function handle(ModuleRepository $module)
    {
        $this->createDirectories();

        foreach ($this->commands as $c) {
            if ( $this->confirm("This module needs to run the [{$c}] command. Do you want to run it?", true)) {
                if ( $this->confirm("Are you sure? Some files will be replaced", true)) {
                    continue;
                }
            }
            $this->call($c);
        }

        // Replacing some make:auth files and generating Dolivel baseblade files.
        $this->exportViews();

        if ( $module->install('novadevs.Dolivel.base.mod-conf') == 1 ) { 
            $this->info('Installation completed successfully.');
        } else {
            $this->error($module->install('novadevs.Dolivel.base.mod-conf'));
        }
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories()
    {
        if (! is_dir($directory = resource_path('views/layouts'))) {
            mkdir($directory, 0755, true);
        }
        if (! is_dir($directory = resource_path('views/setup'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = resource_path('views/setup/company'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = resource_path('views/auth/passwords'))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = storage_path('app/public/avatar'))) {
            mkdir($directory, 0755, true);
        }
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            copy(
                __DIR__.'/stubs/install/views/'.$key,
                $view
            );
	    echo "The file [{$value}] have been replaced.";
        }
    }
}
