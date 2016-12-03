@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.orders.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.orders.management') }}
        <small>{{ trans('labels.backend.orders.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.orders.list') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.orders.table.id') }}</th>
                            <th>{{ trans('labels.backend.orders.table.user') }}</th>
                            <th>{{ trans('labels.backend.orders.table.product_count') }}</th>
                            <th>{{ trans('labels.backend.orders.table.started') }}</th>
                            <th>{{ trans('labels.backend.orders.table.ended') }}</th>
                            <th>{{ trans('labels.backend.orders.table.created') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($orders as $order)
 							<tr>
 								<td>{{ $order->id }}</td>
 								<td>{{ $order->user->name }}</td>
 								<td>{{ $order->products->count() }}</td>
 								<td>{{ $order->start_date }}</td>
 								<td>{{ $order->end_date }}</td>
 								<td>{{ $order->created_at }}</td>
 								<td>{!! $order->action_buttons !!}</td>
 							</tr>
						@endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('User') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

