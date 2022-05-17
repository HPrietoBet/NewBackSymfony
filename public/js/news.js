var url_base = '/img/3/';
var news_json = JSON.parse(news);


$(function() {

    $("#table_news").dxDataGrid({
        dataSource: news_json,
        keyExpr: "idNoticia",
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
                title: 'Users News',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 1,
                        items: [
                            'fecha',
                            'actnoticia',
                            'titulo',
                            {
                                dataField: 'contenido',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                }
                            },
                            'tituloEn',
                            {
                                dataField: 'contenidoEn',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                }
                            },
                            'tituloIt',
                            {
                                dataField: 'contenidoIt',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                }
                            },
                            'tituloPt',
                            {
                                dataField: 'contenidoPt',
                                editorType: 'dxHtmlEditor',
                                colSpan: 3,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline"]
                                    }
                                }
                            },
                        ],
                    },
                ],
            },

        },
        columns: [
            {dataField: "idNoticia", caption:"News ID", visible: true, allowEditing:false, width: 100},
            {dataField: "fecha", caption:"Date", visible: true, width:200, dataType: 'date' },
            {dataField: "titleAll", caption:"Title Active", visible: true,},
            {dataField: "titulo", caption:"Title", visible: false, },
            {dataField: "contenido", caption:"Content", visible: false, },
            {dataField: "tituloEn", caption:"Title En", visible: false, },
            {dataField: "contenidoEn", caption:"Content En", visible: false, },
            {dataField: "tituloIt", caption:"Title It", visible: false, },
            {dataField: "contenidoIt", caption:"Content It", visible: false, },
            {dataField: "tituloPt", caption:"Title PT", visible: false, },
            {dataField: "contenidoPt", caption:"Content Pt", visible: false, },
            {dataField: "actnoticia", caption:"Active", visible: true,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "actnoticia"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/news/save",
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
                        url: "/news/save",
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

let backendURL = "/news/upload"
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