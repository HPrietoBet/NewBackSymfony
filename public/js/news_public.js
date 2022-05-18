var url_base = '/img/news/';
var news_json = JSON.parse(news);
console.log(news_json);
var news_json_select = JSON.parse(news_selector);


$(function() {

    $("#table_news").dxDataGrid({
        dataSource: news_json,
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
                title: 'Public News',
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
                            'imagenDestacada',
                            'actnoticia',
                            'noticiasRelacionadas',
                            'tituloEs',
                            {
                                dataField: 'contenidoEs',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline", "link"]
                                    }
                                }
                            },
                            'titleEs', "descriptionEs", "urlEs",
                            'tituloEn',
                            {
                                dataField: 'contenidoEn',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline", "link"]
                                    }
                                }
                            },
                            'titleEn', "descriptionEn", "urlEn",
                            'tituloIt',
                            {
                                dataField: 'contenidoIt',
                                editorType: 'dxHtmlEditor',
                                colSpan: 2,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline", "link"]
                                    }
                                }
                            },
                            'titleIt', "descriptionIt", "urlIt",
                            'tituloPt',
                            {
                                dataField: 'contenidoPt',
                                editorType: 'dxHtmlEditor',
                                colSpan: 3,
                                editorOptions: {
                                    height: 200,
                                    toolbar: {
                                        items: ["bold", "italic", "underline", "link"]
                                    }
                                }
                            },
                            'titlePt', "descriptionPt", "urlPt",
                        ],
                    },
                ],
            },
        },
        columns: [
            {dataField: "id", caption:"News ID", visible: false, allowEditing:false, width: 100, dataType: 'number'},
            {dataField: 'imagenDestacada', caption: 'Image', visible: true, width: 150,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<img>', { src: url_base+options.value , class: 'img-listado-casas'}))
                        .appendTo(container);
                },
                editCellTemplate: uploadLogo,
            },
            {dataField: "fecha", caption:"Date", visible: true, width:200, dataType: 'date' },
            {dataField: "titleAll", caption:"Title Active", visible: true,},
            {dataField: "tituloEs", caption:"Title", visible: false, },
            {dataField: "titleEs", caption: "SEO Title Es", visible: false},
            {dataField: "descriptionEs", caption: "Seo Desc Es", visible: false},
            {dataField: "urlEs", caption: "Url Es", visible: false},
            {dataField: "contenidoEs", caption:"Content", visible: false, },
            {dataField: "tituloEn", caption:"Title En", visible: false, },
            {dataField: "contenidoEn", caption:"Content En", visible: false, },
            {dataField: "titleEn", caption: "SEO Title En", visible: false},
            {dataField: "descriptionEn", caption: "Seo Desc En", visible: false},
            {dataField: "urlEn", caption: "Url En", visible: false},
            {dataField: "tituloIt", caption:"Title It", visible: false, },
            {dataField: "contenidoIt", caption:"Content It", visible: false, },
            {dataField: "titleIt", caption: "SEO Title It", visible: false},
            {dataField: "descriptionIt", caption: "Seo Desc It", visible: false},
            {dataField: "urlIt", caption: "Url It", visible: false},
            {dataField: "tituloPt", caption:"Title PT", visible: false, },
            {dataField: "contenidoPt", caption:"Content Pt", visible: false, },
            {dataField: "titlePt", caption: "SEO Title Pt", visible: false},
            {dataField: "descriptionPt", caption: "Seo Desc Pt", visible: false},
            {dataField: "urlPt", caption: "Url Pt", visible: false},
            {dataField: "noticiasRelacionadas", caption: "Related News", visible: false,
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('select', cellInfo,  cellElement, news_json_select, 'noticiasRelacionadas');
                },

            },
            {dataField: "actnoticia", caption:"Active", visible: true, width: 100,
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
                        url: "/news/public/save",
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
                        url: "/news/public/save",
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

let backendURL = "/news/public/upload"
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
            cellInfo.setValue(e.request.responseText.replaceAll('"', ''));
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