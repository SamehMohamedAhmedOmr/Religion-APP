$(function () {
    // when docs ready call data table
    let targetURL = 'getSectionsAjax';
    let arabicLanguage = {};

    let lang = $('#dataTableAjaxScript').data('lang');
    if(lang === 'ar'){
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
    else{
        arabicLanguage = {};
    }

    $('#get-data').DataTable({
        "language": arabicLanguage,
        processing: true,
        serverSide: true,
        ajax: {
            url: targetURL,
            type: "GET",
        },
        columns: [
            {
                data: 'DT_RowIndex',
                orderable: false,
                render: function (DT_RowIndex) {
                    return DT_RowIndex;
                }
            },
            {
                data: 'name',
                render: function (name) {
                    return name;
                }
            },
            {
                data: 'chapter',
                render: function (chapter) {
                    return (chapter) ? chapter.name : '';
                }
            },
            {
                data: 'chapter',
                render: function (chapter) {
                    return (chapter) ? (chapter.branch) ? chapter.branch.name : '' : '';
                }
            },
            {
                data: 'id',
                orderable: false,
                render: function (data) {
                    edit = '<a href="sections/' + data + '/edit" class="btn btn-sm btn-info text-white ml-2"><i class="fas fa-marker"></i> </a>';
                    remove = '<a  class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#deleteModal" onclick="openModal(' + data + ')" > <i class="far fa-trash-alt"></i> </a>';
                    return edit + '&nbsp;' + remove;
                }
            },
        ]
    });

    $('.message').slideDown(function () {
        setTimeout(function () {
            $('.message').slideUp(function () {
                $(this).remove();
            });
        }, 8000);
    });
});


// open modal to delete item
function openModal(id) {
    $('#RemoveItem').val(id);
}
//  delete Gas Station
function DeleteItem() {
    let id = $('#RemoveItem').val();
    // ajax delete data to database
    let targetURL = 'sections/' + id;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: targetURL,
        type: "POST",
        data: {
            "id": id,
            '_method': 'DELETE'
        },
        success: function (response) {
            if (response == 1) {
                $('#SuccessDelete').fadeIn(200);
                $('#get-data').DataTable().ajax.reload(null, false);
                setTimeout(function () {
                    $('#SuccessDelete').fadeOut('fast');
                }, 5000); // <-- time in milliseconds
            } else {
                alert('Drawing not deleted !!  try again later');
            }
        },
        error: function (err) {
            console.log(err);
        }
    });
}
