<?php

namespace App\Models\Agency\Traits\Relationship;

use App\Models\Access\User\User;

/**
 * Class AgencyRelationship
 * @package App\Models\Agency\Traits\Relationship
 */
trait AgencyRelationship
{
    /**
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
