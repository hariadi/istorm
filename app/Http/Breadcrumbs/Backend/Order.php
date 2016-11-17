<?php

Breadcrumbs::register('admin.orders.index', function ($breadcrumbs) {
	$breadcrumbs->parent('admin.dashboard');
	$breadcrumbs->push(trans('labels.backend.orders.management'), route('admin.orders.index'));
});

Breadcrumbs::register('admin.orders.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push(trans('menus.backend.orderss.create'), route('admin.orders.create'));
});
