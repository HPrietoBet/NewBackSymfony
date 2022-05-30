var url_base = 'https://user.betandeal.com/public/documentos/';
var invoicing_json = JSON.parse(invoicingdata) ?? '';
var countries_json =  JSON.parse(countries) ?? '';

$(function() {

    $("#table_invoicing").dxDataGrid({
        dataSource: invoicing_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: false,
            allowUpdating: true,
            mode: 'popup',
            popup: {
                title: 'Users Invoicing Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 3,
                        caption: 'Invoicing Info User',
                        items: [
                            "tipo",
                            "nombre",
                            "nombreEmpresa",
                            "nif",
                            "email",
                            "telefono",
                            "control",
                            "direccion",
                            "cpostal",
                            "poblacion",
                            "provincia",
                            "pais",
                            "fechaCaducidad",
                            "docfrontal",
                            "docreverso"
                        ],
                    },
                ],
            },

        },
        columns: [

            {dataField: "idUsuFac", caption: "Id", visible: true,  dataType: 'number' , width: 80},
            {
                dataField: "tipo", caption: "Type", visible: true,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 'autonomo', name: 'Autonomo'},
                                {id: 'empresa', name: 'Empresa'},
                            ],
                            key: "tipo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "email", caption: "Email", visible: true,  width: 200},
            {dataField: "nombreCompletoPago", caption: "Invoicing Name", visible: true,  width: 200, cellTemplate: function(element, info) {
                    $("<div>")
                        .appendTo(element)
                        .text(info.value)
                        .css("width", info.column.width - 20)
                        .css("height", "auto")
                        .css("white-space", "normal")
                        .css("overflow-wrap", 'break-word');
                }},
            {dataField: "nif", caption: "Id Card", visible: true, width: 150 },
            {dataField: "direccion", caption: "Address", visible: true, width: 150 , cellTemplate: function(element, info) {
                    $("<div>")
                        .appendTo(element)
                        .text(info.value)
                        .css("width", info.column.width - 20)
                        .css("height", "auto")
                        .css("white-space", "normal")
                        .css("overflow-wrap", 'break-word');
                } },
            {dataField: "poblacion", caption: "City", visible: true, width: 150 , cellTemplate: function(element, info) {
                    $("<div>")
                        .appendTo(element)
                        .text(info.value)
                        .css("width", info.column.width - 20)
                        .css("height", "auto")
                        .css("white-space", "normal")
                        .css("overflow-wrap", 'break-word');
                } },
            {dataField: "provincia", caption: "State", visible: true, width: 120 },
            {dataField: "cpostal", caption: "Zip Code", visible: true, },
            {dataField: "dniFac", caption: "dniFac", visible: false, },
            {dataField: "docfrontal", caption:"Doc. Front", visible: true,
                cellTemplate(container, options) {
                    if(options.value != null){
                        $('<div>')
                            .append($('<a>', { href: url_base + options.value, text: 'Front', target: '_blank', class: 'btn btn-outline-primary  btn-sm'}))
                            .appendTo(container);
                    }

                },
                editCellTemplate(cellElement, cellInfo){
                    if(cellInfo.value != null){
                        $('<div>')
                            .append($('<img>', { src: url_base + cellInfo.value, class: 'w-75'}))
                            .appendTo(cellElement);
                    }
                },

                minWidth:80

            },
            {dataField: "docreverso", caption:"Doc. Back", visible: true,
                cellTemplate(container, options) {
                    if(options.value != null) {
                        $('<div>')
                            .append($('<a>', {
                                href: url_base + options.value,
                                text: 'Back',
                                target: '_blank',
                                class: 'btn btn-outline-danger btn-sm'
                            }))
                            .appendTo(container);
                    }
                },editCellTemplate(cellElement, cellInfo){
                    if(cellInfo.value != null){
                        $('<div>')
                            .append($('<img>', { src: url_base + cellInfo.value, class: 'w-75'}))
                            .appendTo(cellElement);
                    }
                },
                minWidth:80

            },
            {dataField: "fechaAlta", caption: "fechaAlta", visible: false, },
            {dataField: "fechaCaducidad", caption: "End Date", visible: false, dataType: 'date' },
            {dataField: "id", caption: "id", visible: false, },
            {dataField: "idPago", caption: "idPago", visible: false, },
            {dataField: "mostrarAdminlogin", caption: "mostrarAdminlogin", visible: false, },
            {dataField: "multifacturas", caption: "multifacturas", visible: false, },
            {dataField: "multifacturasSubir", caption: "multifacturasSubir", visible: false, },
            {dataField: "nombre", caption: "Name", visible: false, },
            {dataField: "nombreEmpresa", caption: "Company Name", visible: false, },
            {dataField: "numcuenta", caption: "numcuenta", visible: false, },
            {dataField: "numcuentabanco", caption: "numcuentabanco", visible: false, },
            {dataField: "pagado", caption: "pagado", visible: false, },
            {dataField: "pais", caption: "Country", visible: false,  lookup:
                    {
                        dataSource: countries_json,
                        valueExpr: 'name',
                        displayExpr: 'name',
                    },},
            {dataField: "pendiente", caption: "pendiente", visible: false, },
            {dataField: "pendientePagar", caption: "pendientePagar", visible: false, },
            {dataField: "saldo", caption: "saldo", visible: false, },
            {dataField: "telefono", caption: "telefono", visible: false, },
            {dataField: "total", caption: "total", visible: false, },
            {dataField: "transferenciaDirrecionBanco", caption: "transferenciaDirrecionBanco", visible: false, },
            {dataField: "transferenciaSwift", caption: "transferenciaSwift", visible: false, },
            {dataField: "control", caption: "Status", visible: true,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'Pending / Error' },
                                { id: true, name: 'Approved' },
                            ],
                            key: "control"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
                cellTemplate(container, options) {
                    if(options.value) {
                        $('<div>')
                            .append($('<i>', {
                                class: 'fa fa-check text-success'
                            }))
                            .appendTo(container);
                    }else{
                        $('<div>')
                            .append($('<i>', {
                                class: 'fa fa-times text-danger'
                            }))
                            .appendTo(container);
                    }
                },
                minWidth:80
            },
        ], export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Invoicing data Users');
            DevExpress.excelExporter.exportDataGrid({
                worksheet: worksheet,
                component: e.component,
                customizeCell: function(options) {
                    var excelCell = options;
                    excelCell.font = { name: 'Arial', size: 12 };
                    excelCell.alignment = { horizontal: 'left' };
                }
            }).then(function() {
                workbook.xlsx.writeBuffer().then(function(buffer) {
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'invoicingInfo.xlsx');
                });
            });
            e.cancel = true;
        },onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/invoicing/info/save",
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
    });

    var payments_json = JSON.parse(payments_data);
    console.log(payments_json);

    $("#table_payments").dxDataGrid({
        dataSource: payments_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: false,
            allowUpdating: false,
        },
        columns: [
            {dataField: "id", caption: "Id User", visible: true, dataType: 'number', width: 90},
            {dataField: "email", caption: "Email", visible: true},
            {dataField: "nombre", caption: "User", visible: true},
            {dataField: "payment", caption: "Payment Method", visible: true},
        ], export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Payments data Users');
            DevExpress.excelExporter.exportDataGrid({
                worksheet: worksheet,
                component: e.component,
                customizeCell: function(options) {
                    var excelCell = options;
                    excelCell.font = { name: 'Arial', size: 12 };
                    excelCell.alignment = { horizontal: 'left' };
                }
            }).then(function() {
                workbook.xlsx.writeBuffer().then(function(buffer) {
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'PaymentsInfo.xlsx');
                });
            });
            e.cancel = true;
        }
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