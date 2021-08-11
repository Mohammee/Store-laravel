<?php

namespace App\Listeners\Admin;

use App\Events\Admin\AdminLogout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminLogoutListener
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
    public function handle(AdminLogout $event)
    {
        $admin = $event->admin;
        $admin->setAttribute('active' , 0);
        $admin->setAttribute('lastActivity' , now());

        $admin->save();

    }
}
