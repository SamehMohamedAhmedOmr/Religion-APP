<div aria-label="search*box">
    <div class="card bg-light mb-4">

        <div aria-label="search title" class="mt-3">
            <div class="py-2 px-1 search-title">
                    <span>
                        <i class="fab fa-searchengin" style="font-size: 25px;"></i>
                    </span>
                <span>
                        {{ __('search_page.search_on_fatwa') }}
                    </span>
            </div>

        </div>

        <div class="card-body">
            <div class="row">

                <form method="GET" action="{{ url('/') }}"
                      class="d-block w-100"
                      accept-charset="UTF-8"
                      enctype="multipart/form-data">

                    <div aria-label="search-criteria" class="mb-3">
                        <label aria-label="search_type" for="search_type">
                            {{ __('search_page.search_type') }}
                        </label>
                        <select class="form-control specialSelect" name="search_type" required id="search_type">
                            <option selected value="text">{{ __('search_page.search_by_title') }}</option>
                            <option value="fatwa_number">{{ __('search_page.search_by_fatwa_number') }}</option>
{{--                            <option value="2">{{ __('search_page.search_by_keywords') }}</option>--}}
                        </select>
                    </div>

                    <div class="form-group mb-3 {{ $errors->has('search_key') ? 'has-error' : ''}}">
                        <label for="search_key" class="control-label d-block">
                            {{ __('search_page.search_words') }}
                        </label>
                        <input class="form-control" name="search_key" required
                               type="text" id="search_key" placeholder="{{ __('search_page.search_words') }}"
                               value="">
                        {!! $errors->first('search_key', '<p class="help-block">:message</p>') !!}
                    </div>

{{--                    <div class="row w-100 m-0 mb-1" aria-label="keywords">--}}
{{--                        <div class="form-group mb-0 w-100 {{ $errors->has('keywords') ? 'has-error' : ''}}">--}}
{{--                            <label for="keywords" class="control-label">--}}
{{--                                {{ __('admin.keywords') }}--}}
{{--                            </label>--}}
{{--                            <label class="d-block w-100">--}}
{{--                                <select class="form-control keywords" name="keywords[]" required id="keywords" multiple>--}}
{{--                                    <option selected hidden value="">{{ __('placeholder.Select Keywords') }}</option>--}}

{{--                                    @foreach ($keywords as $obj)--}}
{{--                                        <option value="{{ $obj->id}}">--}}
{{--                                            {{ $obj->name }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </label>--}}
{{--                            {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div aria-label="more" class="text-center">
                        <button class="question-link btn btn-light-blue" type="submit">
                            {{ __('search_page.search') }}
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

