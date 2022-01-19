<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notify;
use App\User;
use App\Registration;

class EmailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Deans';

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

        $admission = Registration::where('status_admission', '=', '0')->count();
        
        $details = [
            'body' =>  $admission
        ];

        $users = User::all();

        foreach($users as $user){
            Mail::to($user)->send(new Notify($details));
        }

        $this->info('Successfully Sent!');
        
    }
}
