<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class PermissionRevoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:revoke {--feature=NULL} {--role=NULL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revoke a permission from a user';

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
        $role   = $this->option('role');

        $this->comment("This will revoke the ".$feature." feature for all users with ".$role." role".PHP_EOL);

    }
}
