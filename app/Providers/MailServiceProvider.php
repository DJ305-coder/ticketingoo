<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Config;
class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $mail = DB::table('email_settings')->first();
            if ($mail) //checking if table is not empty
            {
                $config = array(
                    'driver'     => $mail->mail_protocol,
                    'host'       => $mail->mail_host,
                    'port'       => $mail->mail_port,
                    'encryption' => $mail->mail_encryption,
                    'username'   => $mail->mail_username,
                    'password'   => $mail->mail_password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                    'from'       => [
                        'address'=> 'mplussoftesting@gmail.com',
                        'name'   => $mail->mail_title,
                    ]
                );
                Config::set('mail', $config);
            }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
