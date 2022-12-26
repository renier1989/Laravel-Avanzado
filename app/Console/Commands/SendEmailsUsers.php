<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\EmailNotification;

class SendEmailsUsers extends Command
{

    protected $signature = 'send:emails {emails?*}';

    protected $description = 'Envia notificaciones a los usuarios';

    public function handle()
    {

        $emails = $this->argument('emails');

        $builder = User::query();

        if($emails){
            $builder->whereIn('email',$emails);
        }

        $count = $builder->count();
        
        if($count){

            $this->output->progressStart($count);
            $builder->whereNotNull('email_verified_at')
            ->each(function(User $user){
                $user->notify(new EmailNotification());
                $this->output->progressAdvance();
            });
            $this->output->progressFinish();

            $this->info("");
            $this->info("Se enviaron {$count} emails");

            return ;
        }
        
        $this->info('No se envio ningun email');
    }
}
