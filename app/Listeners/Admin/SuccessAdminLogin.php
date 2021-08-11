<?php

namespace App\Listeners\Admin;

use App\Events\Admin\AdminLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessAdminLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AdminLogin $event)
    {
        $admin = $event->admin;
        $admin->setAttribute('active' , 1);
        $admin->setAttribute('lastActivity' , now());

        $admin->save();
    }
}
