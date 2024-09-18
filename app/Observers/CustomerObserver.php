<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerObserver
{

    /**
     * Handle the Customer "creating" event.
     */
    public function creating(Customer $customer): void
    {
        $customer->uuid = Str::uuid();
        $customer->code = $this->quickRandom();
    }

    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4) . substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4).substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4) . substr(str_shuffle(str_repeat($pool, 5)), 0, $length/4);
    }
}
