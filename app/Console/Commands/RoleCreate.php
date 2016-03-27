<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RoleCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user role';

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

        $name   = $this->argument('name');
        Role::create(['name' => $name]);
        $this->comment("Created a new role named: ".$name.PHP_EOL);

    }
}
