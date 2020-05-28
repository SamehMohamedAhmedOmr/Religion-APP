<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} custom-form-group">
    <label for="name" class="control-label">{{ __('admin.Name') }} <span style="color:red !important;">*</span></label>
    <input class="form-control" name="name" required
        type="text" id="name" placeholder="{{ __('placeholder.enter Name') }}"
        value="{{ isset($chapter->name) ? $chapter->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="row custom-form-group">
    <div class="col-12 p-0">
        <div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
            <label for="faculty_id" class="control-label">{{ __('admin.branches') }} <span style="color:red !important;">*</span></label>
            <label class="d-block w-100">
                <select class="form-control specialSelect" name="branch_id" required>
                    <option selected hidden value="">{{ __('placeholder.Select Branch') }}</option>

                    @foreach ($branches as $obj)
                        @if (isset($chapter))
                            <option value="{{ $obj->id}}" {{ ($chapter->branch_id == $obj->id)?"selected":"" }}>
                                {{ $obj->name }}
                            </option>
                        @else
                            @if (old('branch_id') != null && old('branch_id') == $obj->id)
                                <option value="{{ $obj->id}}" selected>
                                    {{ $obj->name }}
                                </option>
                            @else
                                <option value="{{ $obj->id}}">
                                    {{ $obj->name }}
                                </option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </label>
            {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('home.update') : __('home.Save') }}">
</div>
