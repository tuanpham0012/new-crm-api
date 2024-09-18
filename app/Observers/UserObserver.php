<?php

namespace App\Observers;

use App\Models\Staff;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(Staff $staff): void
    {
        $staff->uuid = Str::uuid();
        $staff->code = $this->quickRandom();
    }

    /**
     * Handle the Staff "created" event.
     */
    public function created(Staff $staff): void
    {
        //
    }

    /**
     * Handle the Staff "updated" event.
     */
    public function updated(Staff $staff): void
    {
        //
    }

    /**
     * Handle the Staff "deleted" event.
     */
    public function deleted(Staff $staff): void
    {
        //
    }

    /**
     * Handle the Staff "restored" event.
     */
    public function restored(Staff $staff): void
    {
        //
    }

    /**
     * Handle the Staff "force deleted" event.
     */
    public function forceDeleted(Staff $staff): void
    {
        //
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4) . substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4).substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4) . substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4);
    }
}
