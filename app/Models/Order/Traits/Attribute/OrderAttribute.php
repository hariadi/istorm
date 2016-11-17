<?php

namespace App\Models\Order\Traits\Attribute;

/**
 * Class OrderAttribute
 * @package App\Models\Order\Traits\Attribute
 */
trait OrderAttribute
{
    /**
	 * @return string
	 */
	public function getShowButtonAttribute()
	{
		return '<a href="' . route('admin.orders.show', $this) . '" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
	}

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.orders.edit', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if ($this->id != access()->id()) {
            return '<a href="' . route('admin.orders.destroy', $this) . '"
                 data-method="delete"
                 data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
                 data-trans-button-confirm="' . trans('buttons.general.crud.delete') . '"
                 data-trans-title="' . trans('strings.backend.general.are_you_sure') . '"
                 class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
			$this->getShowButtonAttribute() .
			$this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }
}
