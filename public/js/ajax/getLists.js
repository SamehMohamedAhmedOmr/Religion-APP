function getChapters() {
    let id = $('#branch_id').val();

    let chapters =  prepareSelection('#chapter_id');

    let options = chapters[0].selectize;
    // ajax delete data to database
    let targetURL = '/getChapters/' + id;

    $.get({
        url: targetURL,
        success: function (response) {
            response.forEach(element => {
                addOption(options, element)
            });
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function prepareSelection(selection) {
    let chapterElement = $(selection);
    let chapters =  chapterElement.selectize();

    let options = chapters[0].selectize;
    if(options){
        options.clear();
        options.clearOptions();
    }

    return  chapterElement.selectize();
}

function addOption(options, element) {
    options.addOption({value:element.id,text:element.name});
    options.addItem(1);
    options.refreshOptions();
}


function getSections() {
    let id = $('#section_id').val();

    let sections =  prepareSelection('#chapter_id');

    let options = sections[0].selectize;
    // ajax delete data to database
    let targetURL = '/getSections/' + id;

    $.get({
        url: targetURL,
        success: function (response) {
            response.forEach(element => {
                addOption(options, element)
            });
        },
        error: function (err) {
            console.log(err);
        }
    });
}
