<?php

namespace App\Models\Product\Traits\Relationship;

use App\Models\Photo\Photo;

/**
 * Class ProductRelationship
 * @package App\Models\Product\Traits\Relationship
 */
trait ProductRelationship
{
    /**
     * Get all of the post's photos.
     */
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
