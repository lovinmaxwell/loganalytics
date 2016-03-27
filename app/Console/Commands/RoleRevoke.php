<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RoleRevoke extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:revoke {--role=NULL} {--email=NULL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revoke a role from a user';

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

        $role   = $this->option('role');
        $email   = $this->option('email');

        $this->comment("This will revoke the ".$role." role from ".$email.PHP_EOL);

    }
}
