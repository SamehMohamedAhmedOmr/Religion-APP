<div aria-label="results">

    <div aria-label="title" class="text-right mb-4 search-title py-1">
        {{ ($key) ?  __('search_page.results')  :  __('search_page.last_questions') }}
    </div>

    @if(count($questions) == 0)
        <div class="card bg-light mb-4">
            <div class="card-body">
                <div class="text-center">
                    {{ __('search_page.no_result') }}
                </div>
            </div>
        </div>
    @endif

    @foreach($questions as $question)

        <div aria-label="single-fatwa">

            <div class="card bg-light mb-4">
                <div class="card-body">

                    <div class="row" aria-label="fatwa-titles">

                        <div class="col-md-8 col-12">
                            <p class="text-right question-title">
                                <a href="{{ url('fatwa/'.$question->id.'/'.$question->convertToSlug() )}}">
                                    {{ $question->title }}
                                </a>
                            </p>
                        </div>

                        <div class="col-md-4 col-12 text-right">

                            <div class="mb-2">
                        <span class="question-related-title">
                            {{ __('admin.fatwa_number') }} :
                        </span>
                                <span class="question-related-data">
                            {{ $question->id }}
                        </span>
                            </div>

                            <div class="mb-2">
                        <span class="question-related-title">
                            {{ __('admin.publish_date') }} :
                        </span>
                                <span class="question-related-data">
                            {{ $question->created_at->format('d-m-Y') }}
                        </span>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-1 d-flex justify-content-center">
                            <img src="{{ URL::asset('images/question.png') }}"
                                 height="40px;" alt="logo"/>
                        </div>
                        <div class="col-11 pt-1 text-right">
                            <div class="question">
                                @if(strlen($question->question) > 300)
                                    {{ $question->questionAbbreviation()  }}
                                @else
                                    {!! $question->question !!}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div aria-label="more" class="mt-2">
                        <a class="question-link btn btn-light-blue" href="{{ url('fatwa/'.$question->id.'/'.$question->convertToSlug() )}}">
                            {{ __('admin.more') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>

    @endforeach

</div>
