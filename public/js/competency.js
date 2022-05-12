var url_base = '/img/competidores/';
var competency_json = JSON.parse(competency);
var countries_json =  JSON.parse(countries);
var comments_json = JSON.parse(comments);
console.log(comments_json);

$(function() {

    $("#table_competency").dxDataGrid({
        dataSource: competency_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: true,
            allowUpdating: true,
            mode: 'popup',
            popup: {
                title: 'Competency Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 3,
                        items: ['nombre', 'paises', 'esGlobal', 'logo', 'activo'],
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        colSpan: 2,
                        caption: 'Comments',
                        items: [{
                            dataField: 'comentario',
                            caption: 'New Comment',
                            editorType: 'dxTextArea',
                            colSpan: 2,
                            editorOptions: {
                                height: 50,
                            },
                        }, {
                            dataField: 'lastcomentarios',
                            caption: 'Previous Comments',
                            editorType: 'dxTextArea',
                            colSpan: 2,
                            editorOptions: {
                                height: 300,
                            },
                        }],
                    },
                ],
            },

        },
        columns: [
            {dataField: 'logo', caption: 'logo', visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<img>', { src: url_base+options.value , class: 'img-listado-casas'}))
                        .appendTo(container);
                },
                editCellTemplate: uploadLogo,
            },
            {dataField: 'id', caption: 'id', visible: true, width: 50, allowEditing: false},
            {dataField: 'nombre', caption: 'Name', visible: true},
            {dataField: 'paises', caption: 'Country', visible: true,
                lookup:
                    {
                        dataSource: countries_json,
                        valueExpr: 'iso',
                        displayExpr: 'name',
                    },
            },
            {dataField: 'esGlobal', caption: 'Global', visible: true,
                lookup:
                {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "esGlobal",

                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },

            {dataField: 'activo', caption: 'Active', visible: true, lookup:
                {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "control"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: 'comentario', caption: 'New Comment',  visible: false,},
            {dataField: 'lastcomentarios', caption: 'Comments',  visible: false, allowEditing: false,
                editCellTemplate(container, options) {
                    var comp_comments = comments_json[options.data.id];
                    for(i = 0; i<comp_comments.length; i++){
                        console.log(comp_comments[i]);
                        $('<div class="client_comment">')
                            .append($('<small>', { text: comp_comments[i].fecha+' by '+ comp_comments[i].usuario}))
                            .append($('<p>', {text: comp_comments[i].comentario, class: 'mt-2'}))
                            .appendTo(container);
                    }

                }

            }
        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/competency/save",
                        dataType: "json",
                        type: "post",
                        data: {newData: e.newData, id: e.key, oldData: e.oldData},
                        success: function (validationResult) {
                            deferred.resolve(false);
                        },
                        error: function () {
                            deferred.reject("Data Loading Error");
                        },
                        timeout: 5000
                    });
                } else {
                    deferred.resolve(true);
                }
            });
            e.cancel = deferred.promise();
        },
        onRowInserted: function(e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/competency/save",
                        dataType: "json",
                        type: "post",
                        data: {newData: e.data, id: e.key},
                        success: function (validationResult) {
                            deferred.resolve(false);
                        },
                        error: function () {
                            deferred.reject("Data Loading Error");
                        },
                        timeout: 5000
                    });
                } else {
                    deferred.resolve(true);
                }
            });
            e.cancel = deferred.promise();
        },
    });


});

let backendURL = "/competency/upload"
function uploadLogo(cellElement, cellInfo) {
    let buttonElement = document.createElement("div");
    buttonElement.classList.add("retryButton");
    let retryButton = $(buttonElement).dxButton({
        text: "Retry",
        visible: false,
        onClick: function() {
            for (var i = 0; i < fileUploader._files.length; i++) {
                delete fileUploader._files[i].uploadStarted;
            }
            fileUploader.upload();
        }
    }).dxButton("instance");

    let fileUploaderElement = document.createElement("div");
    let fileUploader = $(fileUploaderElement).dxFileUploader({
        multiple: false,
        accept: "image/*",
        uploadMode: "instantly",
        uploadUrl: backendURL,
        onValueChanged: function(e) {
            let reader = new FileReader();
            reader.onload = function(args) {
                imageElement.setAttribute('src', args.target.result);
            }
            reader.readAsDataURL(e.value[0]); // convert to base64 string
        },
        onUploaded: function(e){
            console.log(e.request.responseText);
            cellInfo.setValue(e.request.responseText);
            retryButton.option("visible", false);
        },
        onUploadError: function(e){
            let xhttp = e.request;
            if(xhttp.status === 400){
                e.message = e.error.responseText;
            }
            if(xhttp.readyState === 4 && xhttp.status === 0) {
                e.message = "Connection refused";
            }
            retryButton.option("visible", true);
        }
    }).dxFileUploader("instance");

    let imageElement = document.createElement("a");
    imageElement.classList.add("uploadedImage");
    imageElement.setAttribute('href', url_base + cellInfo.value);
    imageElement.setAttribute('target', '_blank');

    cellElement.append(imageElement);
    cellElement.append(fileUploaderElement);
    cellElement.append(buttonElement);
    cellElement.append(buttonElement);
}

function tagBoxEditorTemplate(cellElement, cellInfo) {


    return $('<div>').dxTagBox({
        dataSource: countries_json,
        value: cellInfo.value,
        valueExpr: 'iso',
        displayExpr: 'name',
        showSelectionControls: true,
        maxDisplayedTags: 3,
        showMultiTagOnly: false,
        applyValueMode: 'useButtons',
        searchEnabled: true,
        onValueChanged(e) {
            cellInfo.setValue(e.value);
        },
        onSelectionChanged() {
            cellInfo.component.updateDimensions();
        },
    });
}