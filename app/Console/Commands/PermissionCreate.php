<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create {--feature=NULL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user permission';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $feature   = $this->option('feature');
        Permission::create(['name' => strtolower($feature)]);
        $this->comment("Created a new permission feature to: ".$feature.PHP_EOL);

    }
}
