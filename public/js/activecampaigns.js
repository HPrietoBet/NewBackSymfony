var url_base = '/img/clients/'
let links_json = JSON.parse(links);
let stats_json = JSON.parse(stats);
console.log(stats_json);

$(function() {

    $('#form_activo').on('change', function (e){
        e.preventDefault();
        let _active = $(this).val();
        $.ajax({
            url: '/activecampaigns/change/status',
            data: {status: _active },
            dataType: 'json',
            method: 'post',
            success: function (data){
                $('.status-msg').removeClass('text-danger').addClass('text-success').text(data.msg);
            }
        })
    })

    $('body').on('click', '.show-flags', function (e){
        var _flags = $(this).attr('data-info');
        createModalFlags(_flags);
    })

    $('#advanced_search').on('submit', function (e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        let data = prepareDataForm(formData);
        $.ajax({
            url: '/activecampaigns/filter',
            data : data,
            type: 'post',
            dataType: 'json',
            success:function (resp){
                setTable(resp.data);

            }
        })

    })

    $('#table_links').dxDataGrid({
        dataSource: links_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        editing: {
            allowAdding: false,
            allowUpdating: false,
        },
        columns: [
            {dataField: "id", caption: "id", visible: false, },
            {dataField: "fecha", caption: "Date", visible: true, width:150, dataType: 'date' },
            {dataField: "urlInicial", caption: "Initial Url", visible: true,},
            {dataField: "urlCorta", caption: "Short url", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: options.value, target: '_blank', text: options.value}))
                        .appendTo(container);
                },
            },
            {dataField: "urlAuto", caption: "Auto url", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: options.value, target: '_blank', text: options.value}))
                        .appendTo(container);
                },
            },
        ]
    });

    $('#table_stats').dxDataGrid({
        dataSource: stats_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        editing: {
            allowAdding: false,
            allowUpdating: true,
        },
        columns: [
            {dataField: "id", caption: "id", visible: false, },
            {dataField: "fecha", caption: "Date", visible: true, },
            {dataField: "subId", caption: "SubId", visible: true, allowEditing: false },
            {dataField: "clicksTotales", caption: "Total Clicks", visible: true, },
            {dataField: "registros", caption: "Regs.", visible: true, },
            {dataField: "depositantesPrimeraVez", caption: "Player", visible: true, },
            {dataField: "cpaGenerados", caption: "CPA", visible: true, },
            {dataField: "comisionGenerada", caption: "Commision (€)", visible: true, },
            {dataField: "clicksUnicos", caption: "clicksUnicos", visible: false, },
            {dataField: "connectionId", caption: "connectionId", visible: false, },
            {dataField: "fuenteMarketing", caption: "fuenteMarketing", visible: false, },
            {dataField: "idCampaniaUsuario", caption: "idCampaniaUsuario", visible: false, },
        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/activecampaign/stats/save",
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
});

function createModalFlags(flags){
    $('#modal_flags').find('.modal-body').html('');
    var flags_array = flags.split(',');
    for(i = 0; i < flags_array.length; i++){
        $('#modal_flags').find('.modal-body').append(
            '<img src="/img/flat/24/'+flags_array[i].toUpperCase()+'.png" alt="'+flags_array[i].toUpperCase()+'" class="p-3" />'
        );
    }
}

function setTable(data){

    var campaigns_json = data

    var dx = $("#table_campaigns").dxDataGrid({
        dataSource: campaigns_json,
        keyExpr: "idCampaniaUsuario",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,

        headerFilter: {
            visible:true,
            allowSearch:true
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
            allowAdding: false,
            allowUpdating: false,
            mode: 'popup',
            popup: {
                title: 'User Campaign Info',
                showTitle: true,
            },
            useIcons: true,
        },
        columns: [
            {dataField: "editUrl", caption: "Actions", visible: true, width: 80,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: options.value, target: '_self', html: '<i class="fas fa-edit p-1"></i>'}))
                        .appendTo(container);
                },
            },
            {dataField: "idCampaniaUsuario", caption:"Id", visible: true, width: 100 },
            {dataField: "user", caption:"User", visible: true, },
            {dataField: "client_logo", caption: "Logo", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<img>', { src: url_base+options.value.replace('../','').split('/').slice(-1) , class: 'img-listado-casas'}))
                        .appendTo(container);
                },
                width: 150
            },
            {dataField: "client", caption:"Client", visible: true, },
            {dataField: "countries", caption: "Countries", visible: true, width: 140,
                cellTemplate(container, options) {
                    console.log(options.value);
                    if(options.value.length >0 ) {
                        console.log(countries);
                        var countries = options.value;
                        var _total = countries.length > 3 ? 3 : countries.length;
                        for (i = 0; i < _total; i++) {
                            $('<img>', {
                                    src: '/img/flat/16/' + countries[i].toUpperCase() + '.png'
                                }
                            ).appendTo(container);
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
            },
            {dataField: "category", caption:"Category", visible: true,  width: 200},
            {dataField: "comision", caption:"Comision", visible: true, },
            {dataField: "condiciones", caption:"Condiciones", visible: true, },
            {dataField: "activo", caption:"Enable", visible: true,  width: 100, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: 0, name: 'No '},
                                {id: 1, name: 'Yes'},
                            ],
                            key: "activo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},


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