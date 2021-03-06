$(function () {
    // when docs ready call data table
    let targetURL = 'getQuestionsAjax';
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
                data: 'id',
                render: function (id) {
                    return id;
                }
            },

            {
                data: 'title',
                render: function (title) {
                    title = (title.length > 70) ? title.substring(0, 70) + ' .....' : title;

                    // question = parseMe(question);
                    // question = (question.length > 100) ? question.substring(0, 100) + ' .....' : question;
                    return title;
                }
            },

            {
                data: 'views',
                render: function (views) {
                    return views;
                }
            },

            {
                data: 'branch',
                render: function (branch) {
                    return (branch) ? branch.name : '';
                }
            },

            {
                data: 'id',
                orderable: false,
                render: function (data) {
                    edit = '<a href="questions/' + data + '/edit" class="btn btn-sm btn-info text-white ml-2"><i class="fas fa-marker"></i> </a>';
                    remove = '<a  class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#deleteModal" onclick="openModal(' + data + ')" > <i class="far fa-trash-alt"></i> </a>';
                    return edit + '&nbsp;' + remove;
                }
            },
        ],
        order:[[0, 'desc']]
    });

    $('.message').slideDown(function () {
        setTimeout(function () {
            $('.message').slideUp(function () {
                $(this).remove();
            });
        }, 8000);
    });
});


function parseMe(value) {
    let semiRichText = value.replace(/<br(\/)?>/ig, '\r\n');
    let plainTextVersion = $("<div></div>").html(semiRichText).text();
    return  plainTextVersion.replace(/^(\r\n|\n)*|(\r\n|\n)*$/ig, "").replace(/\r\n|\n/ig, "<br/>");
}

// open modal to delete item
function openModal(id) {
    $('#RemoveItem').val(id);
}
//  delete Gas Station
function DeleteItem() {
    let id = $('#RemoveItem').val();
    // ajax delete data to database
    let targetURL = 'questions/' + id;

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
