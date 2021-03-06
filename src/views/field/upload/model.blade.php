<?php 
    $domAttr = [/*'class' => $field->css_class?: 'col-xs-5 col-sm-5', */'id' => 'id-file-upload-' . $field->code . '-' . $uniqueId];
    $disabled = false;
    
	if ( (!$model->exists && (!$field->allow_create || !$permissionCreate)) || ($model->exists && (!$field->allow_update || !$permissionUpdate)) )
    {
        $domAttr['disabled'] = 'disabled';
        $disabled = true; 
    }
?>



<div class="form-group">
	{!! Form::label("{$field->code}", $field->translate('title'), array('class'=>'col-sm-3 control-label no-padding-right')) !!}
    <div class="col-sm-5">
		
        @if (!empty($model->{$field->code . '_path'}))
			@if ($controller->isImage($field, $model))
			<img src="{!! \URL::asset($model->{$field->code . '_path'}) !!}" alt="" width="140" />
			<br>
			<a href="{!! \URL::asset($model->{$field->code . '_path'}) !!}" target="_blank">Open full size</a>
			<br>
			@else
			<a href="{!! \URL::asset($model->{$field->code . '_path'}) !!}" target="_blank">Download [{{ $model->{$field->code . '_original_file_name'} }}]</a>
			<br>
			@endif
		@endif
			
		@if ($field->upload_allow_ext->count())
		Allowed extension [{{ $field->upload_allow_ext->implode(', ') }}]
		<br>
		@endif

        {!! Form::file($field->code, $domAttr) !!}
        
		@if ($field->translate('description'))
		<span title="" data-content="{{ $field->translate('description') }}" data-placement="right" data-trigger="hover" data-rel="popover" 
			  class="help-button" data-original-title="{{trans('core::default.tooltip.description')}}">?</span>
		@endif
    </div>
</div>


<script type="text/javascript">
    
$('#id-file-upload-{{$field->code}}-{{$uniqueId}}').ace_file_input({
    no_file:'No File ...',
    btn_choose:'Choose',
    btn_change:'Change',
    droppable:false,
    onchange:null,
    thumbnail:false //| true | large
    //whitelist:'gif|png|jpg|jpeg'
    //blacklist:'exe|php'
    //onchange:''
    //
});
</script>