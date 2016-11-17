<?php

namespace App\Models\Type;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type\Traits\Attribute\TypeAttribute;
use App\Models\Type\Traits\Relationship\TypeRelationship;

class Type extends Model
{
    use TypeAttribute, TypeRelationship;
    //
}
