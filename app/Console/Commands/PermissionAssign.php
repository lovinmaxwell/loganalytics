<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class PermissionAssign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:assign {--feature=NULL} {--role=NULL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a permission to a role';

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
        $feature    = $this->option('feature');
        $role       = $this->option('role');
        $role       = Role::where('name',strtolower($role))->first();
        $role->givePermissionTo(strtolower($feature));
        $this->comment("All ".$role->name."(s) have permissions to ".$feature.PHP_EOL);

    }
}
