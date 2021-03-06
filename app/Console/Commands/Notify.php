<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send Email notify for all user everyday';

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
     * @return mixed
     */
    public function handle()
    {
      // $user = User::select('email')->get();
       $emails = User::pluck('email')->toArray();
       $data = ['title' => 'programing', 'body' => 'Php Descriptions Laravel FrameWork'];
       foreach($emails as $email) {
           Mail::To($email)->send(new NotifyEmail($data));
       }
    }
}
