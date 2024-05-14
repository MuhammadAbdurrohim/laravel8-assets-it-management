@extends('layouts/default')

{{-- Page title --}}
@section('title')
 {{ trans('admin/components/general.checkout') }}
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-8">
    <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      {{ csrf_field() }}

      <div class="box box-default">
        @if ($component->id)
        <div class="box-header with-border">
          <div class="box-heading">
            <h2 class="box-title">{{ $component->name }}  ({{ $component->numRemaining()  }}  {{ trans('admin/components/general.remaining') }})</h2>
          </div>
        </div><!-- /.box-header -->
        @endif

        <div class="box-body">
          <!-- Asset -->
            @include ('partials.forms.edit.asset-select', ['translated_name' => trans('general.select_asset'), 'fieldname' => 'asset_id'])

            <div class="form-group {{ $errors->has('assigned_qty') ? ' has-error' : '' }}">
              <label for="assigned_qty" class="col-md-3 control-label">
                {{ trans('general.qty') }}
              </label>
              <div class="col-md-2 col-sm-5 col-xs-5">
                <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="{{ old('assigned_qty') ?? 1 }}" />
              </div>
              @if ($errors->first('assigned_qty'))
                <div class="col-md-9 col-md-offset-3">
                  {!! $errors->first('assigned_qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                </div>
              @endif
            </div>


            <!-- Note -->
            <div class="form-group{{ $errors->has('note') ? ' error' : '' }}">
              <label for="note" class="col-md-3 control-label">{{ trans('admin/hardware/form.notes') }}</label>
              <div class="col-md-7">
                <textarea class="col-md-6 form-control" id="note" name="note">{{ old('note', $component->note) }}</textarea>
                {!! $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
              </div>
            </div>


        </div> <!-- .BOX-BODY-->
        <div class="box-footer">
          <a class="btn btn-link" href="{{ URL::previous() }}">{{ trans('button.cancel') }}</a>
          <button type="submit" id="submit_button" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> {{ trans('general.checkout') }}</button>
       </div>
      </div> <!-- .box-default-->
    </form>
  </div> <!-- .col-md-9-->
</div> <!-- .row -->

@stop
