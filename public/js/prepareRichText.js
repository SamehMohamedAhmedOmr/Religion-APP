$(function () {
    $('.question').richText({
        // text formatting
        bold: true,
        italic: true,
        underline: true,

        // text alignment
        leftAlign: true,
        centerAlign: true,
        rightAlign: true,
        justify: false,


        imageUpload:false,
        fileUpload:false,

        // link
        urls:false,
        // tables
        table:false,
        // media
        videoEmbed: false,
        // code
        removeStyles:false,
        code:false,

        // lists
        ol: true,
        ul: true,

        // title
        heading: true,

        // fonts
        fonts: true,
        fontList: ["Arial",
            "Arial Black",
            "Comic Sans MS",
            "Courier New",
            "Geneva",
            "Georgia",
            "Helvetica",
            "Impact",
            "Lucida Console",
            "Tahoma",
            "Times New Roman",
            "Verdana"
        ],

        fontColor: true,
        fontSize: true,

        // colors
        colors: [],

        // translations
        translations: {
            'title': 'Title',
            'white': 'White',
            'black': 'Black',
            'brown': 'Brown',
            'beige': 'Beige',
            'darkBlue': 'Dark Blue',
            'blue': 'Blue',
            'lightBlue': 'Light Blue',
            'darkRed': 'Dark Red',
            'red': 'Red',
            'darkGreen': 'Dark Green',
            'green': 'Green',
            'purple': 'Purple',
            'darkTurquois': 'Dark Turquois',
            'turquois': 'Turquois',
            'darkOrange': 'Dark Orange',
            'orange': 'Orange',
            'yellow': 'Yellow',
            'imageURL': 'Image URL',
            'fileURL': 'File URL',
            'linkText': 'Link text',
            'url': 'URL',
            'size': 'Size',
            'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>',
            'text': 'Text',
            'openIn': 'Open in',
            'sameTab': 'Same tab',
            'newTab': 'New tab',
            'align': 'محاذاة',
            'left': 'يسار',
            'center': 'منتصف',
            'right': 'يمين',
            'rows': 'Rows',
            'columns': 'Columns',
            'add': 'Add',
            'pleaseEnterURL': 'Please enter an URL',
            'videoURLnotSupported': 'Video URL not supported',
            'pleaseSelectImage': 'Please select an image',
            'pleaseSelectFile': 'Please select a file',
            'bold': 'خط ثقيل',
            'italic': 'خط مائل',
            'underline': 'وضع خط',
            'alignLeft': 'محاذاة لليسار',
            'alignCenter': 'محاذاة للمنتصف',
            'alignRight': 'محاذاة لليمين',
            'addOrderedList': 'اضافة ترقيم',
            'addUnorderedList': 'اضافة ترقيم بالرموز',
            'addHeading': 'اضافة عنوان',
            'addFont': 'اضافة خط',
            'addFontColor': 'اضافة لون',
            'addFontSize' : 'اضافة حجم خط',
            'addImage': 'Add image',
            'addVideo': 'Add video',
            'addFile': 'Add file',
            'addURL': 'Add URL',
            'addTable': 'Add table',
            'removeStyles': 'Remove styles',
            'code': 'Show HTML code',
            'undo': 'تراجع',
            'redo': 'اعادة',
            'close': 'اغلاق'
        },

            // dev settings
            useSingleQuotes: false,
            height: 0,
            heightPercentage: 0,
            id: "",
            class: "",
            useParagraph: false
        });

    $('.answer').richText({
        // text formatting
        bold: true,
        italic: true,
        underline: true,

        // text alignment
        leftAlign: true,
        centerAlign: true,
        rightAlign: true,
        justify: false,


        imageUpload:false,
        fileUpload:false,

        // link
        urls:false,
        // tables
        table:false,
        // media
        videoEmbed: false,
        // code
        removeStyles:false,
        code:false,

        // lists
        ol: true,
        ul: true,

        // title
        heading: true,

        // fonts
        fonts: true,
        fontList: ["Arial",
            "Arial Black",
            "Comic Sans MS",
            "Courier New",
            "Geneva",
            "Georgia",
            "Helvetica",
            "Impact",
            "Lucida Console",
            "Tahoma",
            "Times New Roman",
            "Verdana"
        ],

        fontColor: true,
        fontSize: true,

        // colors
        colors: [],

        // translations
        translations: {
            'title': 'Title',
            'white': 'White',
            'black': 'Black',
            'brown': 'Brown',
            'beige': 'Beige',
            'darkBlue': 'Dark Blue',
            'blue': 'Blue',
            'lightBlue': 'Light Blue',
            'darkRed': 'Dark Red',
            'red': 'Red',
            'darkGreen': 'Dark Green',
            'green': 'Green',
            'purple': 'Purple',
            'darkTurquois': 'Dark Turquois',
            'turquois': 'Turquois',
            'darkOrange': 'Dark Orange',
            'orange': 'Orange',
            'yellow': 'Yellow',
            'imageURL': 'Image URL',
            'fileURL': 'File URL',
            'linkText': 'Link text',
            'url': 'URL',
            'size': 'Size',
            'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>',
            'text': 'Text',
            'openIn': 'Open in',
            'sameTab': 'Same tab',
            'newTab': 'New tab',
            'align': 'محاذاة',
            'left': 'يسار',
            'center': 'منتصف',
            'right': 'يمين',
            'rows': 'Rows',
            'columns': 'Columns',
            'add': 'Add',
            'pleaseEnterURL': 'Please enter an URL',
            'videoURLnotSupported': 'Video URL not supported',
            'pleaseSelectImage': 'Please select an image',
            'pleaseSelectFile': 'Please select a file',
            'bold': 'خط ثقيل',
            'italic': 'خط مائل',
            'underline': 'وضع خط',
            'alignLeft': 'محاذاة لليسار',
            'alignCenter': 'محاذاة للمنتصف',
            'alignRight': 'محاذاة لليمين',
            'addOrderedList': 'اضافة ترقيم',
            'addUnorderedList': 'اضافة ترقيم بالرموز',
            'addHeading': 'اضافة عنوان',
            'addFont': 'اضافة خط',
            'addFontColor': 'اضافة لون',
            'addFontSize' : 'اضافة حجم خط',
            'addImage': 'Add image',
            'addVideo': 'Add video',
            'addFile': 'Add file',
            'addURL': 'Add URL',
            'addTable': 'Add table',
            'removeStyles': 'Remove styles',
            'code': 'Show HTML code',
            'undo': 'تراجع',
            'redo': 'اعادة',
            'close': 'اغلاق'
        },

        // dev settings
        useSingleQuotes: false,
        height: 0,
        heightPercentage: 0,
        id: "",
        class: "",
        useParagraph: false
    });

});

