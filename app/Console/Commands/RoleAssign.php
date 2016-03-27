<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class RoleAssign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:assign {--role=NULL} {--email=NULL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a role to an user';

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
        $email  = $this->option('email');
        $user   = User::where('email',$email)->first();
        $user->assignRole(strtolower($role));
        $this->comment($email." is now ".$role.PHP_EOL);

    }
}
