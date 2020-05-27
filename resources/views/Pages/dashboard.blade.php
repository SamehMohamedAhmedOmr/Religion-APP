@extends('layouts.app')

@section('pageTitle')
    {{ __('pageTitle.home Page') }}
@endsection

@section('content')
    <!-- partial -->
    <div class="main-panel">

        @if (Auth::user()->type==0)
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body dashboard-tabs p-0">
                            <ul class="nav nav-tabs px-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab"
                                       href="#overview" role="tab" aria-controls="overview"
                                       aria-selected="true">{{__("home.Admin")}}</a>
                                </li>
                            </ul>
                            <div class="tab-content py-0 px-0">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                     aria-labelledby="overview-tab">
                                    <div class="d-flex flex-wrap justify-content-xl-between">
                                        <div
                                            class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">{{ __('admin.Users') }}</small>
                                                <div class="dropdown">
                                                    <h5 class="mb-0 d-inline-block">
                                                        0
                                                    </h5>


                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-home-variant mr-3 icon-lg text-danger"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{ __('admin.faculties') }} </small>
                                                <h5 class="mr-2 mb-0"> 0 </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-format-section mr-3 icon-lg text-success"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{ __('admin.Departments') }}</small>
                                                <h5 class="mr-2 mb-0">0</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("Staff.Councildefinitions")}}</small>
                                                <h5 class="mr-2 mb-0"> 0 </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--member view -->
        @else
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body dashboard-tabs p-0">
                            <ul class="nav nav-tabs px-4" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="purchases-tab" data-toggle="tab"
                                       href="#purchases" role="tab" aria-controls="purchases"
                                       aria-selected="false">{{__("home.Staff")}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="sales-tab" data-toggle="tab" href="#sales"
                                       role="tab" aria-controls="sales"
                                       aria-selected="false">{{__("admin.member")}}</a>
                                </li>
                            </ul>
                            <div class="tab-content py-0 px-0">

                                <div class="tab-pane fade show active " id="purchases" role="tabpanel"
                                     aria-labelledby="purchases-tab">
                                    <div class="d-flex flex-wrap justify-content-xl-between">
                                        <div
                                            class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-2 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">{{__("Staff.Ranks")}}</small>
                                                <div class="dropdown">
                                                    <h5 class="mb-0 d-inline-block">{{$rank}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-2 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">{{__("Staff.Positions")}}</small>
                                                <h5 class="mr-2 mb-0"> 0 </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-2 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small class="mb-1 text-muted">{{__("home.Subject")}}</small>
                                                <h5 class="mr-2 mb-0"> 0 </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-2 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("Staff.Councildefinitions")}}</small>
                                                <h5 class="mr-2 mb-0">
                                                    0
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="sales" role="tabpanel"
                                     aria-labelledby="sales-tab">
                                    <div class="d-flex flex-wrap justify-content-xl-between">
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-2 item">
                                            <i class="mdi mdi-counter mr-3 icon-lg text-warning"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("admin.Total Meeting Your in")}}</small>
                                                <h5 class="mr-2 mb-0">
                                                    0
                                                </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-book-open mr-3 icon-lg text-success"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("admin.Opened Meetings")}}</small>
                                                <h5 class="mr-2 mb-0">
                                                    0
                                                </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-checkbox-blank mr-3 icon-lg text-danger"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("admin.Closed Meetings")}}</small>
                                                <h5 class="mr-2 mb-0">
                                                    0
                                                </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                            <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                            <div class="d-flex flex-column justify-content-around">
                                                <small
                                                    class="mb-1 text-muted">{{__("admin.Nearset Meeting Number/Date")}}</small>
                                                <h5 class="mr-2 mb-0">
                                                    0
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

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
