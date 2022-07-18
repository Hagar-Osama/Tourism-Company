<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class ProjectStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Project Start';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        $this->info('Database Was Migrated');

        Artisan::call('db:seed ');
        $this->info('seeders was seeded');

        $name = $this->ask('Enter Your Name');
        $email = $this->ask('Enter Your Email');
        $password = $this->secret('Enter Your Password');

        $role = Role::where('name','admin')->first();
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $role->id
        ]);
        $this->info('Your Super Account was created');
        return Command::SUCCESS;

    }
}
