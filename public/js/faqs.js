

var faqs_json = JSON.parse(faqs);
console.log(faqs_json)

$(function() {

    $("#table_faqs").dxDataGrid({
        dataSource:  faqs_json,
        keyExpr: "idAyuda",
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
                title: 'FAQ´s Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 3,
                        items: ['idAyuda', 'actayuda'],
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        colSpan: 2,
                        caption: 'Faq',
                        items: [
                            'titulo',
                            {
                                dataField: 'contenido',
                                caption: 'New Comment',
                                editorType: 'dxHtmlEditor',
                                editorOptions: {
                                    height: 190,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                },
                                colSpan: 2,
                            },
                            'tituloEn',
                            {
                                dataField: 'contenidoEn',
                                caption: 'New Comment',
                                editorType: 'dxHtmlEditor',
                                editorOptions: {
                                    height: 190,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                },
                                colSpan: 2,
                            },
                            'tituloPt',
                            {
                                dataField: 'contenidoPt',
                                caption: 'New Comment',
                                editorType: 'dxHtmlEditor',
                                editorOptions: {
                                    height: 190,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                },
                                colSpan: 2,
                            },
                            'tituloIt',
                            {
                                dataField: 'contenidoIt',
                                caption: 'New Comment',
                                editorType: 'dxHtmlEditor',
                                editorOptions: {
                                    height: 190,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                },
                                colSpan: 2,
                            },
                        ],
                    },
                ],
            },

        },
        columns: [
            {dataField: 'contenido', caption:'Content', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'contenidoDe', caption:'contenidoDe', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'contenidoEn', caption:'Content English', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'contenidoFr', caption:'contenidoFr', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'contenidoIt', caption:'Content Italian', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'contenidoPt', caption:'Content Portugese', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'idAyuda', caption:'idAyuda', visible: true, width:50, allowEditing: false},
            {dataField: 'fecha', caption:'fecha', visible: false},
            {dataField: 'idCasPais', caption:'idCasPais', visible: false},
            {dataField: 'actayuda', caption:'Active', visible: true, width:150,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: true, name: 'Active'},
                                {id: false, name: 'Not Active'},
                            ],
                            key: "actayuda"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: 'imagen', caption:'imagen', visible: false},
            {dataField: 'titulo', caption:'Title', visible: true, validationRules: [{ type: "required" }]},
            {dataField: 'tituloDe', caption:'tituloDe', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'tituloEn', caption:'Title English', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'tituloFr', caption:'tituloFr', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'tituloIt', caption:'Title Italian', visible: false, validationRules: [{ type: "required" }]},
            {dataField: 'tituloPt', caption:'Title Portugese', visible: false, validationRules: [{ type: "required" }]},
        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/faq/save",
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
                        url: "/faq/save",
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

let backendURL = "/faq/upload"
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