var url_base = 'img/sitecreator/'
let url_sites = 'https://bdeal.io/';
var sites_json = JSON.parse(sites);
var countries_json =  JSON.parse(countries);
var countries_selector_json = JSON.parse(countries_selector);

$(function() {
    $('body').on('click', '.show-flags', function (e){
        var _flags = $(this).attr('data-info');
        createModalFlags(_flags);
    })

    $("#table_sitecreator").dxDataGrid({
        dataSource: sites_json,
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
                title: 'SiteCreator Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 2,
                        items: [
                            "id",
                            "nombre",
                            "imagen",
                            "imagenFondo",
                            "url",
                            "activo",
                            "fecha",
                        ],
                    },
                    {
                        itemType: 'group',
                        caption: 'Premiumpay',
                        colSpan: 2,
                        colCount: 3,
                        items: [
                            "mostrarPasarela",
                            "idPasarela",
                            "primeroPpay",
                        ]
                    },
                    {
                        itemType: 'group',
                        caption: 'Campaigns',
                        colSpan: 2,
                        colCount: 1,
                        items: ["esGeolocalizada","casas", "mostrarStats","urlStats"]
                    }

                ],
            },

        },
        columns: [
            {dataField: 'imagen', caption: 'Logo', visible: true,
                cellTemplate(container, options) {
                if(options.value == ''){
                    options.value = 'notlogo.png'
                }
                    $('<div>')
                        .append($('<img>', { src: url_base+options.value.replaceAll('"', '') , class: 'img-listado-sites'}))
                        .appendTo(container);
                },
                editCellTemplate: uploadLogo,
            },
            {dataField: "id", caption: "Id Site", visible: false,  allowEditing: false},
            {dataField: "nombre", caption: "Name", visible: true, },
            {dataField: "url", caption: "Url", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: url_sites+options.row.data.idUsuario+'/'+options.value , target:'_blank', text: options.value}))
                        .appendTo(container);
                },
            },
            {dataField: "esGeolocalizada", caption: "Geolocalization", visible: true, allowEditing: false },
            {dataField: "pais", caption: "Countries", visible: true,
                cellTemplate(container, options) {
                    var countries = options.value;

                    var _total = countries.length > 3? 3 : countries.length;
                    if(_total > 0) {
                        for (i = 0; i < _total; i++) {
                            if(countries[i] != '') {
                                $('<img>', {
                                        src: 'img/flat/16/' + countries[i].toUpperCase() + '.png'
                                    }
                                ).appendTo(container);
                            }
                        }
                        if (countries.length > 3) {
                            $('<a>', {
                                    html: ' <i class="fa fa-plus-circle"></i>',
                                    'data-toggle': "modal",
                                    'data-target': '#modal_flags',
                                    'data-info': options.value,
                                    'class': 'show-flags'
                                }
                            ).appendTo(container);

                        }
                    }
                },
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('select', cellInfo,  cellElement, countries_selector_json, 'pais');
                },
            },
            {dataField: "casas", caption: "Campaigns", visible: false, editCellTemplate:function (cellElement, cellInfo){
                    prepareCardsForm(cellElement, cellInfo)
                }
            },
            {dataField: "fecha", caption: "Creation Date", visible: true, dataType:"date" , allowEditing: false},
            {dataField: "activo", caption: "Active", visible: true,
                lookup:{
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
            {dataField: "idPasarela", caption: "Premiumpay Payment", visible: false,
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('selectNoMultiple', cellInfo,  cellElement, cellInfo.data.pasarelas, 'pasarelas');
                },
            },
            {dataField: "idUsuario", caption: "idUsuario", visible: false, allowEditing: false },
            {dataField: "imagenFondo", caption: "Background Image", visible: false,
                editCellTemplate: uploadLogo,
            },
            {dataField: "mostrarPasarela", caption: "Show Premiumpay", visible: false, },
            {dataField: "mostrarStats", caption: "Show Stats", visible: false, },
            {dataField: "primeroCuotas", caption: "primeroCuotas", visible: false, },
            {dataField: "primeroPpay", caption: "Premiumpay by default", visible: false, },
            {dataField: "urlStats", caption: "Url Stats", visible: false, },
        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/site-creator/save",
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
                        url: "/site-creator/save",
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

let backendURL = "/site-creator/upload"
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

function createModalFlags(flags){
    $('#modal_flags').find('.modal-body').html('');
    var flags_array = flags.split(',');
    for(i = 0; i < flags_array.length; i++){
        $('#modal_flags').find('.modal-body').append(
            '<img src="img/flat/24/'+flags_array[i].toUpperCase()+'.png" alt="'+flags_array[i].toUpperCase()+'" class="p-3" />'
        );
    }
}

function prepareCardsForm(cellElement, cellInfo){
    let user_campaigns;
    $.ajax({
        url:'user/campaigns/get',
        data: {'userId': cellInfo.row.data.idUsuario},
        method: 'post',
        dataType: 'json',
        success: function (resp){
            user_campaigns = resp
            let _val = JSON.parse(cellInfo.value)
            if(cellInfo.row.data.esGeolocalizada == 1){
                for(i= 0; i< _val.length; i+=2){
                    $('<div>', {class:'client_comment half float-left align-center'})
                        .append($('<img>', {src:'img/flat/24/'+_val[i].toUpperCase()+'.png', class:' float-left p-1'}))
                        .append($('<h6>', {text:' '+user_campaigns[_val[i+1]].titcamp, class:'p-2'}))
                        .appendTo(cellElement)
                }
            }else{
                for(i= 0; i< _val.length; i++){
                    $('<div>', {class:'client_comment half float-left align-center'})
                        .append($('<h6>', {text:' '+user_campaigns[_val[i]].titcamp, class:'p-1'}))
                        .appendTo(cellElement)
                }

            }
        }
    })

}