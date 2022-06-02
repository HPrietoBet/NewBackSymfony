var url_base = 'https://user.betandeal.com/public/documentos/';
var url_base_facturas = 'https://user.betandeal.com/public/facturas/';
var invoicing_json = JSON.parse(invoicingdata) ?? '';
var countries_json =  JSON.parse(countries) ?? '';
var dataSave;
var commisions_json = JSON.parse(commisions_data) ?? '';
var pending_json = JSON.parse(pending_cash) ?? '';
var invoicinginvoice_json = JSON.parse(invoices_data) ?? '';
let filter;

$(function() {

    $('body').on('click', '.clear_filter', function (e){
        e.preventDefault()
        var dataGrid = $('#table_commisions').dxDataGrid('instance');
        dataGrid.clearFilter();
        $(this).remove();
        $('html, body').animate({
            scrollTop: $("#table_pending").offset().top
        }, 500);
        filter = false;
    })

    $('body').on('click', '.go_to_commisions', function (e){
        e.preventDefault();
        var dataGrid = $('#table_commisions').dxDataGrid('instance');
        if(filter){
            filter = false;
        }
        else{
            filter = true;
            $('html, body').animate({
                scrollTop: $(".title_commisions").offset().top
            }, 500);
            $('.title_commisions').append($('<a>', {href: '#', text:'Clear Filter', class: 'clear_filter btn btn-danger'}))

        }
        dataGrid.clearFilter();
        let user_id = $(this).attr('data-item');
        dataGrid.filter('idUsuario', user_id);


    })


    $("#table_pending").dxDataGrid({
        dataSource: pending_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true, allowSearch: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: false,
            allowUpdating: false,
        },
        columns: [
            {dataField: "id", caption: "Id User", visible: true, dataType: 'number', width: 90},
            {dataField: "username", caption: "Email", visible: true},
            {dataField: "nombre", caption: "Name", visible: true},
            {dataField: "pagadas", caption: "Pay", visible: true},
            {dataField: "generadas", caption: "Win", visible: true},
            {dataField: "total", caption: "Total", visible: true},
            {dataField: "control", caption: "Cash User", visible: true,
                cellTemplate: function (container, options){
                let class_user = (options.value == 1)? 'fa-user-plus text-success': 'fa-user-times text-danger';
                    $('<div>')
                        .append($('<i>', {
                            class: 'fa '+class_user
                        }))
                        .appendTo(container);
                }
            },
            {dataField: "id", caption: "Movements", visible: true, dataType: 'number', width: 90,
                cellTemplate: function (container, options){
                    $('<div>')
                        .append(
                            $('<a>', {
                                href: '#',
                                'data-item': options.value,
                                class: 'go_to_commisions'
                            }
                        ).append(
                                $('<i>', {
                                        class: 'fa fa-eye',
                                    }
                                )
                            )
                        )
                        .appendTo(container);
                }
            },
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

    $("#table_invoices").dxDataGrid({
        dataSource: invoicinginvoice_json,
        keyExpr: "idfac",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true, allowSearch: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: false,
            allowUpdating: true,
            mode: 'line',
            useIcons: true,
        },
        columns: [
            {dataField: "idfac", caption: "Invoice Id", visible: true,  dataType: 'number' ,width: 100 , allowEditing: false},
            {dataField: "reffactura", caption: "Inv. Reference", visible: true,width: 120, allowEditing: false},
            {dataField: "iduser", caption: "User Id", visible: true,   dataType: 'number' ,width: 100, allowEditing: false},
            {dataField: "user", caption: "User", visible: true, allowEditing: false},
            {dataField: "nombre", caption: "Name", visible: true, allowEditing: false},
            {dataField: "email", caption: "Email", visible: true, allowEditing: false},
            {dataField: "fechafactura", caption: "Invoice date", visible: true, dataType: 'date' },
            {dataField: "importe", caption: "Quantity", visible: true,   dataType: 'float'},
            {dataField: "impuestos", caption: "VAT", visible: true,  dataType: 'float', allowEditing: false },
            {dataField: "factura", caption: "Download", visible: true , allowEditing: false,
                cellTemplate(container, options) {
                    if(options.value != null){
                        $('<div>')
                            .append($('<a>', { href: url_base_facturas + options.value, text: 'Downlad', target: '_blank', class: 'btn btn-outline-primary  btn-sm'}))
                            .appendTo(container);
                    }

                },
            },
            {dataField: "pagada", caption: "Status", visible: true,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: '0', name: 'Not Payed'},
                                {id: '1', name: 'Paid'},
                            ],
                            key: "pagada"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
                cellTemplate :function(container, options){
                    if (options.value == 1) {
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
                }
            },
        ], export: {
            enabled: true
        },
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/invoicing/invoice/save",
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
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Invoiices data');
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'Invoicing.xlsx');
                });
            });
            e.cancel = true;
        }
    });


    $('#form_upload_commisions').on('click' , function (e){
        e.preventDefault();
        var _form = document.getElementById('uploadFile')
        console.log( new FormData(_form));
        $.ajax({
            url: '/invoicing/commisions/upload',
            method: 'post',
            data: new FormData(_form),
            dataType: 'json',
            contentType: false,
            cache:false,
            processData: false,
            success: function (data){
                if(data.success == 1){
                    $('.file_msg').removeClass('text-danger').addClass('text-success').text(data.msg);
                    fillTableValidation(data.data)
                    dataSave = data.data;
                    $('.confirm_data').removeClass('hide');
                }else{
                    $('.file_msg').addClass('text-danger').addClass('text-success').text(data.msg);
                }
            }
        })
    })

    $('.confirm_data').on('click', function (e){
        e.preventDefault();
        console.log( dataSave);
        $.ajax({
            url: '/invoicing/commisions/save',
            data: {data: dataSave},
            method: 'post',
            dataType: 'json',
            success:function (resp){
                console.log(resp);
                document.location.reload();
            }
        })
    })

    $("#table_commisions").dxDataGrid({
        dataSource: commisions_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true, allowSearch: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: (transfers == true)? false : true,
            allowUpdating: (transfers == true)? false : true,
            mode: 'line',
            useIcons: true,
        },
        columns: [
            {dataField: "id", caption: "id", visible: false, width:100, allowEditing:false },
            {dataField: "idUsuario", caption: "User Id", visible: true,allowEditing:false, width:100,},
            {dataField: "fecha", caption: "Date", visible: true,dataType: 'date' },
            {dataField: "importe", caption: "Commision", visible: true, dataType: 'float'},
            {dataField: "concepto", caption: "Description", visible: true, },
            {dataField: "tipoMovimiento", caption: "Type", visible: true,
                cellTemplate: function (container, options) {
                    if (options.value == 1) {
                        $('<div>')
                            .append($('<i>', {
                                class: 'fa fa-arrow-up text-success'
                            }))
                            .appendTo(container);
                    }else{
                        $('<div>')
                            .append($('<i>', {
                                class: 'fa fa-arrow-down text-danger'
                            }))
                            .appendTo(container);
                    }
                }
            },
        ],
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/invoicing/commisions/save",
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
                        url: "/invoicing/commisions/save",
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

    $("#table_invoicing").dxDataGrid({
        dataSource: invoicing_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true , allowSearch: true},
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
        headerFilter: { visible: true, allowSearch: true },
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

function fillTableValidation(data){
    console.log(data);
    $("#table_commisions_validation").dxDataGrid({
        dataSource: data,
        keyExpr: "iduser",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true, allowSearch:true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowAdding: false,
            allowUpdating: false,
            mode: 'batch',
            useIcons: true,
        },
        columns: [
            {dataField: "iduser", caption:"Id User", visible:true, dataType: 'number' , width:100} ,
            {dataField: "name", caption:"User", visible:true, dataType: 'string', width: 250},
            {dataField: "money", caption:"Commision", visible:true, dataType: 'float' },
            {dataField: "description", caption:"Description", visible:true, },
        ],
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/invoicing/commisions/save",
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
                        url: "/invoicing/commisions/save",
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
}