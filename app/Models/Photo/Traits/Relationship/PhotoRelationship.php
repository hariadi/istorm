<?php

namespace App\Models\Photo\Traits\Relationship;

/**
 * Class PhotoRelationship
 * @package App\Models\Photo\Traits\Relationship
 */
trait PhotoRelationship
{
    /**
     * Get all of the owning photoable models.
     */
    public function photoable()
    {
        return $this->morphTo();
    }
}
