<div aria-label="single-fatwa">

    <div aria-label="title">

        <div class="card bg-light mb-4">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="text-center question-title mb-3">
                            <div class="mb-2">
                                <a href="{{ url('fatwa/'.$question->id.'/'.$question->title )}}"
                                   style="font-size: 26px; font-weight: bold;">
                                    {{ $question->title }}
                                </a>
                             </div>
                            <div class="mb-2">
                                <span class="question-related-title">
                                    {{ __('admin.fatwa_number') }} :
                                </span>
                                    <span class="question-related-data">
                                    {{ $question->id }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" aria-label="fatwa-titles">

                    <div class="col-6 text-right">

                        <div class="mb-2">
                            <span class="question-related-title">
                                {{ __('admin.publish_date') }} :
                            </span>

                            <span class="question-related-data">
                                {{ $question->created_at->format('d-m-Y') }}
                            </span>
                        </div>

                    </div>

                    <div class="col-6 text-left">

                        <div class="mb-2">
                            <span class="question-related-title">
                                {{ __('search_page.views') }} :
                            </span>

                            <span class="question-related-data">
                                {{ $question->views }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <div aria-label="question">

        <div class="card bg-light mb-4">

            <div aria-label="search title" class="mt-3">
                <div class="py-2 px-1 search-title">
                    <span>
                        <i class="fas fa-question-circle" style="font-size: 25px;"></i>
                    </span>
                    <span>
                        {{ __('admin.question') }}
                    </span>
                </div>

            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-12 pt-1 text-right">
                        <div class="question">
                            {!! $question->question !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div aria-label="answer">

        <div class="card bg-light mb-4">

            <div aria-label="search title" class="mt-3">
                <div class="py-2 px-1 search-title">
                    <span>
                        <i class="fas fa-question" style="font-size: 25px;"></i>
                    </span>
                    <span>
                        {{ __('admin.answer') }}
                    </span>
                </div>

            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col-12 pt-1 text-right">
                        <div class="answer">
                            {!! $question->answer !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
