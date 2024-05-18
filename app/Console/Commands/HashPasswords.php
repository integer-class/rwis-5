<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class HashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hash-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\CitizenUserModel::all();

        foreach ($users as $user) {
            $user->password = Hash::make($user->password);
            $user->save();
        }

        $this->info('All passwords have been hashed');
    }
}
