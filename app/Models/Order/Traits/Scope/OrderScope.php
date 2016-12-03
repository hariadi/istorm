<?php

namespace App\Models\Order\Traits\Scope;

/**
 * Class OrderScope
 * @package App\Models\Order\Traits\Scope
 */
trait OrderScope
{
    /**
	 * @param $query
	 * @param bool $confirmed
	 * @return mixed
	 */
	public function scopeConfirmed($query, $confirmed = true) {
		return $query->where('confirmed', $confirmed);
	}
}
