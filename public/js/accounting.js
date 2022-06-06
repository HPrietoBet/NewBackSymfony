var accounting_json = JSON.parse(accounting);
var _estados = JSON.parse(estados);
console.log(accounting_json);



$(function() {
    setTable(accounting_json);

    $('.nav-link.month').on('click', function (e){
        e.preventDefault();
        $(".table_accounting").hide()
        setTimeout(function (e){
            $(".table_accounting").show()
        },1000)

        let _month = $(this).attr('data-month');
        let _year = $('#form_users').val();
        getData(_month,_year);
    })
});


function setTable(accounting_json) {
    $(".table_accounting").dxDataGrid({
        dataSource: accounting_json,
        keyExpr: 'id',
        width: 3500,
        height: 'auto',
        searchPanel: {
            visible: true,
            width: 350,
            placeholder: 'Search...',
        },
        headerFilter: {
            visible: true,
            allowSearch: true,
        },
        export: {
            enabled: true,
        },
        paging: {enabled: false},
        onExporting(e) {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet('Contabilidad');

            DevExpress.excelExporter.exportDataGrid({
                component: e.component,
                worksheet,
                autoFilterEnabled: true,
            }).then(() => {
                workbook.xlsx.writeBuffer().then((buffer) => {
                    saveAs(new Blob([buffer], {type: 'application/octet-stream'}), 'Contabilidad.xlsx');
                });
            });
            e.cancel = true;
        },
        onCellClick: function (e) {
            if (e.value != null) {
                $('#smallModal').modal();
                $('#smallModal').find('h5').html(e.value)
                navigator.clipboard.writeText(e.value);
            }
        },
        showBorders: true,
        editing: {
            mode: 'popup',
            allowUpdating: true,
            popup: {
                title: 'Cliente Info',
                showTitle: false,
                width: 950,
                height: 700,
            },
            form: {
                items: [
                    {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Cliente',
                        items: [
                            'idCasa',
                            'casa',
                            'pais',
                            'currency',
                            'impuestos',
                            {
                                dataField: 'comentarios',
                                editorType: 'dxTextArea',
                                colSpan: 2,
                                editorOptions: {
                                    height: 100,
                                },
                            }
                        ],
                    }, {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Comisiones',
                        items: [
                            'comBet',
                            'comCpa',
                            'comRs',
                            'comFf',
                        ],
                    }, {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Totales',
                        items: [
                            'comBookie',
                            'comTotal',
                            'balance',
                            'margenBeneficio',
                        ],
                    }
                    , {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Facturación',
                        items: [
                            'cobrado',
                            'fechaCobro',
                            'factura',
                            'estado',
                            {
                                dataField: 'datosFacturacion',
                                editorType: 'dxTextArea',
                                colSpan: 2,
                                editorOptions: {
                                    height: 100,
                                },
                            }
                        ],
                    }],
            },
        },
        columns: [
            {
                type: 'buttons',
                buttons: ['edit'],
            },
            {
                dataField: 'id',
                caption: 'Id',
                visible: false,
                allowEditing: false,
            },
            {
                dataField: 'idCasa',
                caption: 'Id casa',
                allowEditing: false,
                dataType: 'number',
            },
            {
                dataField: 'casa',
                caption: 'Casa',
                allowEditing: false,
            },
            {
                dataField: 'pais',
                caption: 'Pais',
                allowEditing: false,
            },
            {
                dataField: 'campaniasActivas',
                caption: 'Campañas Activas',
                allowEditing: false,
                visible: false
            },
            {
                dataField: 'currency',
                caption: 'Moneda',
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {currency: 'EUR', name: 'EUR'},
                                {currency: 'USD', name: 'USD'},
                                {currency: 'COP', name: 'COP'},
                                {currency: 'MXN', name: 'MXN'},
                                {currency: 'GBP', name: 'GBP'},
                                {currency: 'BRL', name: 'BRL'},
                            ],
                            key: "currency"
                        },
                    },
                    valueExpr: 'currency', // contains the same values as the "statusId" field provides
                    displayExpr: 'name' // provides display values
                }
            },
            {
                dataField: 'impuestos',
                caption: 'IVA',
                allowEditing: false,
                dataType: 'number',

            },
            {
                dataField: 'comBet',
                caption: 'Betandeal',
                //    allowEditing: false,
                dataType: 'float',
            },
            {
                dataField: 'comCpa',
                caption: 'CPA',
                dataType: 'float',
            },
            {
                dataField: 'comRs',
                caption: 'RS',
                dataType: 'float',
            },
            {
                dataField: 'comFf',
                caption: 'FF',
                dataType: 'float',
            },
            {
                dataField: 'comBookie',
                caption: 'Bookies',
                allowEditing: false,
                dataType: 'float',
            },
            {
                dataField: 'comTotal',
                caption: 'Total',
                allowEditing: false,
                dataType: 'float',
            },
            {
                dataField: 'balance',
                caption: 'Balance',
                dataType: 'float',
                allowEditing: false,
                calculateCellValue: function (rowData) {
                    return parseFloat((rowData.comBookie == null ? 0 : rowData.comBookie) - rowData.comBet);
                }
            },
            {
                dataField: 'margenBeneficio',
                caption: 'Margen',
                allowEditing: false,
                dataType: 'number',
            },
            {
                dataField: 'requiereFactura',
                caption: 'Con Factura',
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {requiere_factura: 1, name: 'Si'},
                                {requiere_factura: 0, name: 'No'},
                            ],
                            key: "requiereFactura"
                        },
                    },
                    valueExpr: 'requiere_factura', // contains the same values as the "statusId" field provides
                    displayExpr: 'name' // provides display values
                }
            },
            {
                dataField: 'datosFacturacion',
                caption: 'Datos Fact.'
            },
            {
                dataField: 'cobrado',
                caption: 'Cobrado',
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {cobrado: true, name: 'Si'},
                                {cobrado: false, name: 'No'},
                            ],
                            key: "cobrado"
                        },
                    },
                    valueExpr: 'cobrado', // contains the same values as the "statusId" field provides
                    displayExpr: 'name' // provides display values
                }
            },
            {
                dataField: 'fechaCobro',
                caption: 'Fecha Cobro',
                dataType: 'date',
            },
            {
                dataField: 'comentarios',
                caption: 'Comentarios'
            },
            {
                dataField: 'factura',
                caption: 'Factura',
                allowFiltering: false,
                allowSorting: false,
                cellTemplate: cellTemplate,
                editCellTemplate: editCellTemplate,
            },
            {
                caption: 'Borrar Factura',
                name: "command-editing",
                allowFiltering: false,
                allowSorting: false,
                cellTemplate: function (cellElement, cellInfo) {
                    if (cellInfo.data.factura != '') {
                        cellElement.append("<button class='btn btn-danger borrar_factura' data-id='" + cellInfo.data.id + "'><i class='fa fa-trash'></i></button>");
                    }
                }
            },
            {
                dataField: 'estado',
                caption: 'Estado',
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: _estados,

                            key: "idEstado"
                        },
                        pageSize: 10,
                        paginate: true
                    },
                    valueExpr: 'idEstado',
                    displayExpr: 'estadoTxt',
                }
            },
            {
                dataField: 'created',
                caption: 'Creación',
                allowEditing: false,
            },
            {
                dataField: 'modify',
                caption: 'Ult. Modificación',
                allowEditing: false,
            }

        ],
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Estás seguro?", "Confirmar cambios");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "accounting/save",
                        dataType: "json",
                        type: "post",
                        data: {newData: e.newData, id: e.key, oldData: e.oldData},
                        success: function (validationResult) {
                            deferred.resolve(false);
                            getData(e.oldData.month, e.oldData.year)
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
        onRowPrepared: function (e) {

            // codigos de colores
            if (e.rowType === "data") {
                switch (e.data.estado) {
                    case 1:
                        e.rowElement[0].style = 'background:green; color: black;';
                        break;
                    case 2:
                        e.rowElement[0].style = 'background: blue; color:white;';
                        break;
                    case 3:
                        e.rowElement[0].style = 'color:black;';
                        break;
                    case 4:
                        e.rowElement[0].style = 'color:red;';
                        break;
                    case 5:
                        e.rowElement[0].style = 'background:yellow; color: red;';
                        break;
                    case 6:
                        e.rowElement[0].style = 'background:yellow;';
                        break;
                    case 7:
                        e.rowElement[0].style = 'background:purple; color:white';
                        break;
                    case 8:
                        e.rowElement[0].style = 'background:grey;';
                        break;
                    case 9:
                        e.rowElement[0].style = 'background:orange;';
                        break;
                }

            }

        },
    });
}
let backendURL = "/accounting/upload"
let filesUrl = '/img/facturas/';

function setCellValue(rowData, value) {
    var selectBox = $("#selectBoxAuthor").dxSelectBox("instance");
    var author = selectBox.option("selectedItem");
}

function cellTemplate(container, options) {
    if(options.value != "") {
        let imgElement = document.createElement("a");
        imgElement.setAttribute("href", filesUrl + options.value);
        imgElement.setAttribute('target', '_blank');
        imgElement.innerHTML = '<i class="fa fa-file-pdf btn btn-primary" ></i>';
        container.append(imgElement);

    }
}

function editCellTemplate(cellElement, cellInfo) {
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
        uploadMode: "instantly",
        uploadUrl: backendURL,
        onValueChanged: function(e) {
            let reader = new FileReader();
            reader.onload = function(args) {
                imageElement.setAttribute('src', args.target.result);
                //  console.log(args.target.result);
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
    imageElement.setAttribute('href', filesUrl + cellInfo.value);
    imageElement.setAttribute('target', '_blank');

    cellElement.append(imageElement);
    cellElement.append(fileUploaderElement);
    cellElement.append(buttonElement);
}

function getData(month, year){

    $.ajax({
        url: '/accounting/get',
        data: {month: month, year: year},
        dataType: 'json',
        type: 'post',
        success: function (res){
            setTable(res);
        },
        error(e){
            console.log(e)
        }
    })
}