<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}} custom-form-group">
    <label for="faculty_name" class="control-label">{{ __('admin.Name') }} <span style="color:red !important;">*</span></label>
    <input class="form-control" name="name" required
        type="text" id="faculty_name" placeholder="{{ __('placeholder.enter Name') }}"
        value="{{ isset($branch->name) ? $branch->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="row custom-form-group">
    <div class="col-12 p-0">
        <div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
            <label for="faculty_id" class="control-label">{{ __('admin.branch') }} <span style="color:red !important;">*</span></label>
            <label class="d-block w-100">
                <select class="form-control specialSelect" name="branch_id" required id="branch_id" onchange="getChapters()">
                    <option selected hidden value="">{{ __('placeholder.Select Branch') }}</option>

                    @foreach ($branches as $obj)
                        @if (isset($branch_id))
                            <option value="{{ $obj->id}}" {{ ($branch_id == $obj->id)?"selected":"" }}>
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

<div class="row custom-form-group" id="chapters">
    <div class="col-12 p-0">
        <div class="form-group {{ $errors->has('chapter_id') ? 'has-error' : ''}}">
            <label for="chapter_id" class="control-label">{{ __('admin.chapter') }} <span style="color:red !important;">*</span></label>
            <label class="d-block w-100">
                <select class="form-control specialSelect" name="chapter_id" required  id="chapter_id">
                    <option selected hidden value="">{{ __('placeholder.Select Chapter') }}</option>

                    <entity>
                        @if (isset($section))
                            @foreach ($chapters as $obj)
                                <option value="{{ $obj->id}}" {{ ($section->chapter_id == $obj->id)?"selected":"" }}>
                                    {{ $obj->name }}
                                </option>
                            @endforeach
                        @endif
                    </entity>

                </select>
            </label>
            {!! $errors->first('chapter_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('home.update') : __('home.Save') }}">
</div>
