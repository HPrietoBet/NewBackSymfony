var url_base = 'img/clients/'
$(function() {
    setTable(clients);
    $('body').on('click', '.show-flags', function (e){
        var _flags = $(this).attr('data-info');
        createModalFlags(_flags);
    })
    $('body').on('click', '.dx-datagrid-addrow-button', function (e){
        e.preventDefault();
        document.location.href= '/client/new';
        return;
    })

    $('body').on('click', '.delete_comment', function (e){
        e.preventDefault();
        let id = $(this).parents('.client_comment').attr('data-item');
        $.ajax({
            url: "/client/comment/delete",
            dataType: "json",
            type: "post",
            data: {idcomment: id},
            success: function () {

            },
            error: function () {
            },
        });
        $(this).parents('.client_comment').remove()
    });
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
    var dx = $("#table_clients").dxDataGrid({
        dataSource: clients_json,
        keyExpr: "idCasa",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        headerFilter: {
            visible:true
        },
        /*toolbar: {
            items:[
                {
                    location: 'after',
                    widget: 'dxButton',
                    options: {
                        text: 'Add Client',
                        width: 50,
                        onClick(e) {
                            document.location.href= '/client/new'
                        },
                    },
                }
            ]
        },*/
        searchPanel: {
            visible: true,
            width: 300,
            text: '',
            placeholder: 'Search...',
        },
        rowAlternationEnabled: true,
        editing: {
            allowAdding: true,
            allowUpdating: false,
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
                            "baseline",
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
                        colCount: 2,
                        caption: 'Invoicing Info',
                        items:[
                            "datosFacturacion",
                            "metodoCobro",
                            "procedimientoPago",
                            "requiereFactura",
                            "impuestos",
                            "currency",
                        ]
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        colSpan: 2,
                        caption: 'Comments',
                        items: [{
                            dataField: 'newcomments',
                            caption: 'New Comment',
                            value: '',
                            editorType: 'dxTextArea',
                            colSpan: 2,
                            editorOptions: {
                                height: 100,
                            },
                        }, {
                            dataField: 'comentariosAnteriores',
                            caption: 'Previous Comments',
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
            {dataField: "newcomments", caption: "Comments", visible: false,},
            {dataField: "contacto", caption: "Contact", visible: false,},
            {dataField: "currency", caption: "Currency", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 'EUR'},
                                {id: 'USD'},
                                {id: 'COP'},
                                {id: 'MXN'},
                                {id: 'GBP'},
                                {id: 'BRL'},
                            ],
                            key: "currency"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'id',
                }
            },
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
                editCellTemplate: uploadLogo,
            },
            {dataField: "idCasa", caption: "Id Client", visible: true, dataType: 'number'},
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
            {dataField: "impuestos", caption: "IVA", visible: false,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 0, name: '0%'},
                                {id: 0.5, name: '0,5%'},
                                {id: 19, name: '19%'},
                                {id: 21, name: '21%'},
                            ],
                            key: "impuestos"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "logoCustom", caption: "Custom Logo", visible: false,},
            {dataField: "metodoCobro", caption: "Payment method", visible: false,},
            {dataField: "usuario", caption: "User", visible: false,},
            {dataField: "password", caption: "Password", visible: false,},
            {dataField: "procedimientoPago", caption: "Payment process", visible: false,},
            {dataField: "requiereFactura", caption: "Invoice Required", visible: false, lookup:{
                dataSource: {
                        store: {
                            type: 'array',
                                data: [
                                {id: false, name: 'No'},
                                {id: true, name: 'Yes'},
                            ],
                                key: "requiereFactura"
                        },
                    },
                    valueExpr: 'id',
                        displayExpr: 'name',
                }
            },
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
            {dataField: "cpaMoneda", caption: "CPA Currency", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 'EUR'},
                                {id: 'USD'},
                                {id: 'COP'},
                                {id: 'MXN'},
                                {id: 'GBP'},
                                {id: 'BRL'},
                            ],
                            key: "cpaMoneda"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'id',
                }
            },
            {dataField: "rs", caption: "RS", visible: false,},
            {dataField: "fee", caption: "FEE", visible: false,},
            {dataField: "feeMoneda", caption: "FEE Currency", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 'EUR'},
                                {id: 'USD'},
                                {id: 'COP'},
                                {id: 'MXN'},
                                {id: 'GBP'},
                                {id: 'BRL'},
                            ],
                            key: "feeMoneda"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'id',
                }
            },
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
            {dataField: "comentariosAnteriores", caption: "Previous Comments", visible: false,
                editCellTemplate: showComments,
            },
            {dataField: "editUrl", caption: "Actions", visible: true, cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: options.value, target: '_self', html: '<i class="fas fa-edit"></i>'}))
                        .appendTo(container);
                },
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
        onSelected(e) {
            e.event.preventDefault();
            this.edit.emit(e.row.data);
        }
    });

    let backendURL = "/clients/upload"
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
    }

    function showComments(cellElement, cellInfo){
        console.log(cellInfo);
        for(i=0; i<cellInfo.row.data.comments.length; i++ ){
            let commentElement = document.createElement("div");
            commentElement.setAttribute('id', 'comment_'+cellInfo.row.data.comments[i].id)
            commentElement.setAttribute('data-item', cellInfo.row.data.comments[i].id)
            commentElement.setAttribute('class', 'client_comment');
            commentElement.innerHTML = '<i class="delete_comment fa fa-times-circle text-danger float-right "></i> '+ cellInfo.row.data.comments[i].fecha+' | '+cellInfo.row.data.comments[i].comentario+' | '+cellInfo.row.data.comments[i].usuario
            cellElement.append(commentElement);
        }
    }

}