<?php

namespace App\Models\Photo;

use Illuminate\Database\Eloquent\Model;
use App\Models\Photo\Traits\Attribute\PhotoAttribute;
use App\Models\Photo\Traits\Relationship\PhotoRelationship;

class Photo extends Model
{
    use PhotoAttribute, PhotoRelationship;
    //
}
