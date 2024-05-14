@extends('layouts/default')

{{-- Page title --}}
@section('title')
  {{ trans('admin/hardware/general.checkin') }}
  @parent
@stop

{{-- Page content --}}
@section('content')
  <style>

    .input-group {
      padding-left: 0px !important;
    }
  </style>


  <div class="row">
    <!-- left column -->
    <div class="col-md-9">
      <div class="box box-default">
        <div class="box-header with-border">
          <h2 class="box-title">{{ trans('admin/hardware/form.tag') }} {{ $asset->asset_tag }}</h2>
        </div><!-- /.box-header -->

        <div class="box-body">
          <div class="col-md-12">
            @if ($backto=='user')
              <form class="form-horizontal" method="post"
                    action="{{ route('hardware.checkin.store', array('assetId'=> $asset->id, 'backto'=>'user')) }}"
                    autocomplete="off">
                @else
                  <form class="form-horizontal" method="post"
                        action="{{ route('hardware.checkin.store', array('assetId'=> $asset->id)) }}" autocomplete="off">
                  @endif
                  {{csrf_field()}}

                  <!-- AssetModel name -->
                    <div class="form-group">
                      {{ Form::label('model', trans('admin/hardware/form.model'), array('class' => 'col-md-3 control-label')) }}
                      <div class="col-md-8">
                        <p class="form-control-static">
                          @if (($asset->model) && ($asset->model->name))
                            {{ $asset->model->name }}

                          @else
                            <span class="text-danger text-bold">
                      <i class="fas fa-exclamation-triangle"></i>{{ trans('admin/hardware/general.model_invalid')}}
                      <a href="{{ route('hardware.edit', $asset->id) }}"></a> {{ trans('admin/hardware/general.model_invalid_fix')}}</span>
                          @endif
                        </p>
                      </div>
                    </div>
 

                    <!-- Asset Name -->
                    <div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
                      {{ Form::label('name', trans('admin/hardware/form.name'), array('class' => 'col-md-3 control-label')) }}
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="name" aria-label="name" id="name"
                               value="{{ old('name', $asset->name) }}"/>
                        {!! $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                      </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group {{ $errors->has('status_id') ? 'error' : '' }}">
                      {{ Form::label('status_id', trans('admin/hardware/form.status'), array('class' => 'col-md-3 control-label')) }}
                      <div class="col-md-7 required">
                        {{ Form::select('status_id', $statusLabel_list, '', array('class'=>'select2', 'style'=>'width:100%','id' =>'modal-statuslabel_types', 'aria-label'=>'status_id')) }}
                        {!! $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                      </div>
                    </div>

                  @include ('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id', 'help_text' => ($asset->defaultLoc) ? 'You can choose to check this asset in to a location other than the default location of '.$asset->defaultLoc->name.' if one is set.' : null, 'hide_location_radio' => true])

                  <!-- Checkout/Checkin Date -->
                    <div class="form-group{{ $errors->has('checkin_at') ? ' has-error' : '' }}">
                      {{ Form::label('checkin_at', trans('admin/hardware/form.checkin_date'), array('class' => 'col-md-3 control-label')) }}
                      <div class="col-md-8">
                        <div class="input-group col-md-5 required">
                          <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                            <input type="text" class="form-control" placeholder="{{ trans('general.select_date') }}" name="checkin_at" id="checkin_at" value="{{ old('checkin_at', date('Y-m-d')) }}">
                            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                          </div>
                          {!! $errors->first('checkin_at', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                        </div>
                      </div>
                    </div>


                    <!-- Note -->
                    <div class="form-group {{ $errors->has('note') ? 'error' : '' }}">

                      {{ Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label')) }}

                      <div class="col-md-8">
                  <textarea class="col-md-6 form-control" id="note"
                            name="note">{{ old('note', $asset->note) }}</textarea>
                        {!! $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
                      </div>
                    </div>
                    <div class="box-footer">
                      <a class="btn btn-link" href="{{ URL::previous() }}"> {{ trans('button.cancel') }}</a>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> {{ trans('general.checkin') }}</button>
                    </div>
                  </form>
          </div> <!--/.col-md-12-->
        </div> <!--/.box-body-->

      </div> <!--/.box.box-default-->
    </div>
  </div>

@stop