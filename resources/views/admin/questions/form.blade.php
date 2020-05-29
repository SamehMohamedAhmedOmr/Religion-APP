<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}} w-75">
    <label for="faculty_name" class="control-label">{{ __('admin.fatwa_summary') }} <span style="color:red !important;">*</span></label>
    <input class="form-control" name="title" required
           type="text" id="title" placeholder="{{ __('admin.fatwa_summary') }}"
           value="{{ isset($question->title) ? $question->title : old('title')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="row w-md-75 w-100" aria-label="branch">
    <div class="col-md-12 col-12">
        <div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
            <label for="faculty_id" class="control-label">{{ __('admin.branch') }} <span style="color:red !important;">*</span></label>
            <label class="d-block w-100">
                <select class="form-control specialSelect" name="branch_id" required id="branch_id" onchange="getChapters()">
                    <option selected hidden value="">{{ __('placeholder.Select Branch') }}</option>

                    @foreach ($branches as $obj)
                        @if (isset($question))
                            <option value="{{ $obj->id}}" {{ ($question->branch_id == $obj->id)?"selected":"" }}>
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

<div class="row w-100" aria-label="section and chapters">
    <div class="col-md-6 col-12" id="chapters">
        <div class="form-group {{ $errors->has('chapter_id') ? 'has-error' : ''}}">
                <label for="chapter_id" class="control-label">{{ __('admin.chapter') }} <span style="color:red !important;">*</span></label>
                <label class="d-block w-100">
                    <select class="form-control specialSelect" name="chapter_id" required  id="chapter_id" onchange="getSections(1)">
                        <option selected hidden value="">{{ __('placeholder.Select Chapter') }}</option>

                        <entity>
                            @if (isset($question))
                                @foreach ($chapters as $obj)
                                    <option value="{{ $obj->id}}" {{ ($question->chapter_id == $obj->id)?"selected":"" }}>
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

    <div class="col-md-6 col-12" id="sections">
        <div class="form-group {{ $errors->has('section_id') ? 'has-error' : ''}}">
                <label for="chapter_id" class="control-label">{{ __('admin.section') }} <span style="color:red !important;">*</span></label>
                <label class="d-block w-100">
                    <select class="form-control specialSelect" name="section_id" required  id="section_id">
                        <option selected hidden value="">{{ __('placeholder.Select Section') }}</option>

                        <entity>
                            @if (isset($question))
                                @foreach ($sections as $obj)
                                    <option value="{{ $obj->id}}" {{ ($question->section_id == $obj->id)?"selected":"" }}>
                                        {{ $obj->name }}
                                    </option>
                                @endforeach
                            @endif
                        </entity>

                    </select>
                </label>
                {!! $errors->first('section_id', '<p class="help-block">:message</p>') !!}
            </div>
    </div>
</div>

<div class="row w-md-75 w-100" aria-label="keywords">
    <div class="col-md-12 col-12">
        <div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
            <label for="faculty_id" class="control-label">{{ __('admin.keywords') }} <span style="color:red !important;">*</span></label>
            <label class="d-block w-100">
                <select class="form-control keywords" name="keywords[]" required id="keywords" multiple>
                    <option selected hidden value="">{{ __('placeholder.Select Keywords') }}</option>

                    @foreach ($keywords as $obj)
                        @if (isset($question))
                            <option value="{{ $obj->id}}"
                                {{ ($question->keywords->pluck('id')->contains($obj->id) )?"selected":"" }}>
                                {{ $obj->name }}
                            </option>
                        @else
                            <option value="{{ $obj->id}}">
                                {{ $obj->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </label>
            {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row w-100" aria-label="questions and answer">

    <div class="col-md-6 col-12" aria-label="question">
        <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
            <label for="subject_description">{{ __('admin.question') }} <span style="color:red !important;">*</span></label>

            <textarea class="form-control question" id="question" rows="4"
                      required name='question'>
                {{ isset($question->question) ? $question->question : old('question')}}
            </textarea>

            {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6 col-12" aria-label="answer">
        <div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
            <label for="subject_description">{{ __('admin.answer') }} <span style="color:red !important;">*</span></label>

            <textarea class="form-control answer" id="answer" rows="4"
                      required name='answer'>
                {{ isset($question->answer) ? $question->answer : old('answer')}}
            </textarea>

            {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('home.update') : __('home.Save') }}">
</div>
