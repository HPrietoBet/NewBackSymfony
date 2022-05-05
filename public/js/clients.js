var url_base = 'img/clients/'
$(function() {
   console.log(responsables);
    setTable(clients);
    $('body').on('click', '.show-flags', function (e){
        var _flags = $(this).attr('data-info');
        createModalFlags(_flags);

    })

});

function createModalFlags(flags){
    $('#modal_flags').find('.modal-body').html('');
    var flags_array = flags.split(',');
    for(i = 0; i < flags_array.length; i++){
        $('#modal_flags').find('.modal-body').append(
            '<img src="img/flat/24/'+flags_array[i].toUpperCase()+'.png" alt="'+flags_array[i].toUpperCase()+'" class="p-3" />'
        );
    }
}

function setTable(data){
    var responsables_json = responsables;
    var clients_json = data;
    console.log(clients_json);
    $("#table_clients").dxDataGrid({
        dataSource: clients_json,
        keyExpr: "idCasa",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        headerFilter: {
            visible:true
        },
        searchPanel: {
            visible: true,
            width: 300,
            placeholder: 'Search...',
        },
        rowAlternationEnabled: true,
        editing: {
            allowAdding: true,
            allowUpdating: true,
            mode: 'popup',
            popup: {
                title: 'Client Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        caption: 'Client Details',
                        colCount: 2,
                        colSpan: 4,
                        items: [
                            "idCasa",
                            "titcasa",
                            "imgcasa",
                            "idCat",
                            "titcat",
                            {
                                dataField: 'url',
                                caption: 'Link',
                                colSpan: 4,
                            },
                            "contacto",
                            "responsable",
                            "actcasa",
                        ],

                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Deal Account',
                        items: [
                            "cpa",
                            "cpaMoneda",
                            "rs",
                            "fee",
                            "feeMoneda",
                            "acuerdoActivo",
                        ],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Account Login',
                        items: [
                            "usuario",
                            "password"
                        ],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Others',
                        items: [
                            "baseline",
                            "bono",
                            "activoFeedCuotas",
                            "activoFeedStreaming",
                            "feedCuotas",
                            "feedStreaming",
                            "idPaginaHtml",
                        ],
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        caption: 'iApuestas',
                        items:['enlacesIapuestas']
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Landing Actions',
                        items: ['landingcreator', 'linksDirectos', 'linksDirectosItalia'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Invoicing Info',
                        items:[
                            "datosFacturacion",
                            "metodoCobro",
                            "procedimientoPago",
                            "requiereFactura",
                            "impuestos,",
                            "currency",
                        ]
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        colSpan: 2,
                        caption: 'Comments',
                        items: [{
                            dataField: 'comentarios',
                            caption: 'New Comment',
                            editorType: 'dxTextArea',
                            colSpan: 2,
                            editorOptions: {
                                height: 50,
                            },
                        }, {
                            dataField: 'comentarios_anteriores',
                            caption: 'Previous Comments',
                            editorType: 'dxTextArea',
                            colSpan: 2,
                            editorOptions: {
                                height: 300,
                            },
                        }],
                    },

                ],
            }
        },
        columns: [
            {dataField: "activoFeedCuotas", caption: "Feed Cuotas", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "activoFeedCuotas"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "activoFeedStreaming", caption: "Feed Streaming", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "activoFeedStreaming"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "baseline", caption: "Baseline", visible: false,},
            {dataField: "bono", caption: "Bono", visible: false,},
            {dataField: "comments", caption: "Comments", visible: false,},
            {dataField: "contacto", caption: "Contact", visible: false,},
            {dataField: "currency", caption: "Currency", visible: false,},
            {dataField: "datosFacturacion", caption: "Invoicing Info", visible: false,},
            {dataField: "feedCuotas", caption: "Feed Odds", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "feedCuotas"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "feedStreaming", caption: "feedStreaming", visible: false,},
            {dataField: "idCat", caption: "Id Category", visible: false,},
            {dataField: "idPaginaHtml", caption: "Html Page", visible: false,},
            {dataField: "imgcasa", caption: "Logo", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<img>', { src: url_base+options.value.replace('../','').split('/').slice(-1) , class: 'img-listado-casas'}))
                        .appendTo(container);
                },
            },
            {dataField: "idCasa", caption: "Id Client", visible: true,},
            {dataField: "titcasa", caption: "Client", visible: true,},
            {dataField: "idCasPais", caption: "Countries", visible: true,
                cellTemplate(container, options) {
                    var countries = options.value.split(',');
                    var _total = countries.length > 3? 3 : countries.length;
                    for(i = 0; i< _total; i++){
                        $('<img>', {
                        src: 'img/flat/16/' + countries[i].toUpperCase() + '.png'
                        }
                        ).appendTo(container);
                    }
                    if(countries.length > 3){
                        $('<a>', {
                            html: ' <i class="fa fa-plus-circle"></i>',
                            'data-toggle': "modal",
                            'data-target': '#modal_flags',
                            'data-info':options.value,
                            'class': 'show-flags'
                            }
                        ).appendTo(container);

                    }
                },
            },
            {dataField: "impuestos", caption: "IVA", visible: false,},
            {dataField: "logoCustom", caption: "Custom Logo", visible: false,},
            {dataField: "metodoCobro", caption: "Payment method", visible: false,},
            {dataField: "usuario", caption: "User", visible: false,},
            {dataField: "password", caption: "Password", visible: false,},
            {dataField: "procedimientoPago", caption: "Payment process", visible: false,},
            {dataField: "requiereFactura", caption: "Invoicing ¿?", visible: false,},
            {dataField: "responsable", caption: "Responsible", visible: false,
                lookup: {
                    dataSource: responsables_json,
                    valueExpr: 'id',
                    displayExpr: 'user',
                }
            },
            {dataField: "url", caption: "Link", visible: true, cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: options.value, target: '_blank', html: options.value }))
                        .appendTo(container);
                },
            },
            {dataField: "cpa", caption: "CPA", visible: false,},
            {dataField: "cpaMoneda", caption: "CPA Currency", visible: false,},
            {dataField: "rs", caption: "RS", visible: false,},
            {dataField: "fee", caption: "FEE", visible: false,},
            {dataField: "feeMoneda", caption: "FEE Currency", visible: false,},
            {dataField: "acuerdoActivo", caption: "Active Deal", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "acuerdoActivo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "titcat", caption: "Category", visible: true,},
            {dataField: "actcasa", caption: "Active", visible: true,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "actcasa"
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
                        url: "/client/save",
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
}