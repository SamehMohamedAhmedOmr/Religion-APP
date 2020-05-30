<div aria-label="search*box">
    <div class="card bg-light mb-4">

        <div aria-label="search title" class="mt-3">
            <div class="py-2 px-1 search-title">
                    <span>
                        <i class="fas fa-glasses" style="font-size: 25px;"></i>
                    </span>
                <span>
                        {{ __('search_page.most_visitors') }}
                    </span>
            </div>

        </div>

        <div class="card-body px-2">

            @if(count($most_views) == 0)
                <div class="text-center">
                    {{ __('search_page.no_result') }}
                </div>
            @endif

            @foreach($most_views as $fatwa)

                <div aria-label="single-fatwa">

                    <div class="row" aria-label="fatwa-titles">

                        <div class="col-9">
                            <p class="text-right question-title">
                                <a href="{{ url('fatwa/'.$fatwa->id.'/'.$fatwa->title )}}">
                                    {{ $fatwa->title }}
                                </a>
                            </p>
                        </div>

                        <div class="col-3 text-right views-container">

                            <div class="mb-2 views-label">
                                <span style="color: #fff;">
                                    {{ $fatwa->views }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>
    </div>
</div>

