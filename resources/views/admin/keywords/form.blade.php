<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} custom-form-group">
    <label for="faculty_name" class="control-label">{{ __('admin.Name') }} <span style="color:red !important;">*</span></label>
    <input class="form-control" name="name" required
        type="text" id="faculty_name" placeholder="{{ __('placeholder.enter Name') }}"
        value="{{ isset($keyword->name) ? $keyword->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('home.update') : __('home.Save') }}">
</div>
