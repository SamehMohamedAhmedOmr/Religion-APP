@extends('layouts.app')

@section('pageTitle')
    {{ __('pageTitle.home Page') }}
@endsection

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card p-5">
                <div class="card mt-2 p-3">
                    <div class="card-body dashboard-tabs p-0">
                        <ul class="nav nav-tabs px-4 d-flex justify-content-center p-2 box"
                            style="background-color: #303952;color: #fff !important; border: none;"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active"
                                   style="color: #fff; border-color: #fff; font-size: 20px;"
                                   id="overview-tab" data-toggle="tab"
                                   href="#overview" role="tab" aria-controls="overview"
                                   aria-selected="true">{{__("admin.statistics")}}</a>
                            </li>
                        </ul>
                        <div class="tab-content py-0 px-0 mt-5">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                 aria-labelledby="overview-tab">

                                <div class="row mb-4 justify-content-around">

                                    <div
                                        class="col-md-5 col-6 mx-md-2 mx-1 mb-md-0 mb-3
                                        d-flex box
                                        flex-grow-1 align-items-center justify-content-center p-0 item"
                                        style="background-color: #778beb; color: #fff;"
                                    >
                                        <a class="dashboard-box p-3 w-100" href="{{ url('branches') }}">
                                            <i class="fas fa-code-branch mx-3 icon-md"></i>
                                            <div class="d-flex flex-column justify-content-around text-center">
                                                <small class="mb-1">
                                                    {{ __('admin.branches') }}
                                                </small>
                                                <div class="dropdown">
                                                    <h5 class="mb-0 d-inline-block">
                                                        {{ $branches }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div
                                        class="col-md-5 col-6 mx-md-2 mx-1
                                        d-flex box
                                        flex-grow-1 align-items-center justify-content-center p-0 item"
                                        style="background-color: #cf6a87; color: #fff;"
                                    >
                                        <a class="dashboard-box p-3 w-100" href="{{ url('chapters') }}">
                                            <i class="fas fa-copy mx-3 icon-md"></i>
                                            <div class="d-flex flex-column justify-content-around text-center">
                                                <small
                                                    class="mb-1">
                                                    {{ __('admin.chapters') }}
                                                </small>
                                                <h5 class="mr-2 mb-0">
                                                    {{ $chapters }}
                                                </h5>
                                            </div>
                                        </a>
                                    </div>

                                </div>

                                <div class="row justify-content-around mb-4">

                                    <div
                                        class="col-md-5 col-6 mx-md-2 mx-1 mb-md-0 mb-3
                                        d-flex box
                                        flex-grow-1 align-items-center justify-content-center p-0 item"
                                        style="background-color: #e77f67; color: #fff;"
                                    >
                                        <a class="dashboard-box p-3 w-100" href="{{ url('sections') }}">
                                            <i class="fas fa-sticky-note mx-3 icon-md"></i>
                                            <div class="d-flex flex-column justify-content-around text-center">
                                                <small
                                                    class="mb-1">
                                                    {{ __('admin.sections') }}
                                                </small>
                                                <h5 class="mr-2 mb-0">
                                                    {{ $sections }}
                                                </h5>
                                            </div>
                                        </a>
                                    </div>

                                    <div
                                        class="col-md-5 col-6 mx-md-2 mx-1
                                        d-flex box
                                        flex-grow-1 align-items-center justify-content-center p-0 item"
                                        style="background-color: #786fa6; color: #fff;"
                                    >
                                        <a class="dashboard-box p-3 w-100" href="{{ url('questions') }}">
                                            <i class="fas fa-question-circle mx-3 icon-md"></i>
                                            <div class="d-flex flex-column justify-content-around text-center">
                                                <small
                                                    class="mb-1">
                                                    {{__("admin.Questions")}}
                                                </small>
                                                <h5 class="mr-2 mb-0">
                                                    {{ $questions }}
                                                </h5>
                                            </div>
                                        </a>
                                    </div>

{{--                                    <div--}}
{{--                                        class="col-md-5 col-6 mx-md-2 mx-1--}}
{{--                                        d-flex box--}}
{{--                                        flex-grow-1 align-items-center justify-content-center p-0 item"--}}
{{--                                        style="background-color: #786fa6; color: #fff;"--}}
{{--                                    >--}}
{{--                                        <a class="dashboard-box p-3 w-100" href="{{ url('keywords') }}">--}}
{{--                                            <i class="fas fa-keyboard mx-3 icon-md"></i>--}}
{{--                                            <div class="d-flex flex-column justify-content-around text-center">--}}
{{--                                                <small--}}
{{--                                                    class="mb-1">--}}
{{--                                                    {{__("admin.keywords")}}--}}
{{--                                                </small>--}}
{{--                                                <h5 class="mr-2 mb-0">--}}
{{--                                                    {{ $keywords }}--}}
{{--                                                </h5>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

                                </div>

{{--                                <div class="row justify-content-around mb-4">--}}

{{--                                    <div--}}
{{--                                        class="d-flex box--}}
{{--                                        col-md-5 col-6 mx-md-2 mx-1--}}
{{--                                        flex-grow-1 align-items-center justify-content-center p-0 item"--}}
{{--                                        style="background-color: #63cdda; color: #fff;"--}}
{{--                                    >--}}
{{--                                        <a class="dashboard-box p-3 w-100" href="{{ url('questions') }}">--}}
{{--                                            <i class="fas fa-question-circle mx-3 icon-md"></i>--}}
{{--                                            <div class="d-flex flex-column justify-content-around text-center">--}}
{{--                                                <small--}}
{{--                                                    class="mb-1">--}}
{{--                                                    {{__("admin.Questions")}}--}}
{{--                                                </small>--}}
{{--                                                <h5 class="mr-2 mb-0">--}}
{{--                                                    {{ $questions }}--}}
{{--                                                </h5>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--member view -->

    </div>
    <!-- content-wrapper ends -->

    <!-- main-panel ends -->
    <!-- Delete Modal -->

@endsection
@section('scripts')
    <script data-lang="{{ App::getLocale() }}" id='dataTableAjaxScript'>
        $(function () {
            let lang = $('#dataTableAjaxScript').data('lang');
            let arabicLanguage = {};

            if (lang === 'ar') {
                arabicLanguage = {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                };
            }

            $('#dataTables-example').dataTable({
                "language": arabicLanguage,
            });
        });

    </script>

@endsection
