var url_base = '/img/projects/';
$(function() {

    var projects_json = JSON.parse(projects);
    var projects_type_json = JSON.parse(projects_types);
    var users_projects_json = JSON.parse(user_projects);
    var campanias_json = JSON.parse(campanias);


    $("#table_projects").dxDataGrid({
        dataSource: projects_json ,
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
                title: 'Connection Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 2,
                        items: ['nombre', 'imagen', 'activo' , 'tipo', 'campanias', 'usuarios'],
                    },
                ],
            }
        },
        columns: [
            {dataField: "id",
                caption:"Id",
                visible: true,
                allowEditing: false,
                dataType: 'number',
                width: 100,
            },
            {dataField: "imagen",
                caption:"Project Img.",
                visible: true,
                cellTemplate(container, options) {
                    let img;
                    if(options.value != ''){
                        img = options.value;
                    }else{
                        img = 'notlogo.png';
                    }
                    $('<div>')
                        .append($('<img>', { src: url_base+img , class: 'img-listado-casas'}))
                        .appendTo(container);
                },
                editCellTemplate: uploadLogo,
            },
            {dataField: "nombre",
                caption:"Project Name",
                visible: true,
            },
            {dataField: "tipo",
                caption:"Project Type",
                visible: true,
                lookup:
                    {
                        dataSource: projects_type_json,
                        valueExpr: 'id',
                        displayExpr: 'nombre',
                    },

            },
            {dataField: "usuarios",
                caption:"Users Project",
                visible: false,
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('select', cellInfo,  cellElement, users_projects_json, 'usuarios');
                },
            },
            {dataField: "campanias",
                caption:"Project Campaigns.",
                visible: false,
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('select', cellInfo,  cellElement, campanias_json, 'campanias');
                },
            },
            {dataField: "activo", caption: "Active", visible : true, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "activo"
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
                    $.ajax({
                        url: "/projects/save",
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
                    $.ajax({
                        url: "/projects/save",
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
    })
});

let backendURL = "/projects/upload"
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
                imageElement.setAttribute('src', args.target.result.replaceAll('"', ''));
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
