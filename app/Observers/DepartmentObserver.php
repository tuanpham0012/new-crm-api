<?php

namespace App\Observers;

use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentObserver
{
    /**
     * Handle the Department "creating" event.
     */
    public function creating(Department $department): void
    {
        $department->uuid = Str::uuid();
    }
    /**
     * Handle the Department "created" event.
     */
    public function created(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "updated" event.
     */
    public function updated(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "deleted" event.
     */
    public function deleted(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "restored" event.
     */
    public function restored(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     */
    public function forceDeleted(Department $department): void
    {
        //
    }
}
