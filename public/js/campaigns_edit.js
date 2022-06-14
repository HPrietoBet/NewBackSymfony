
let improving_json = JSON.parse(improving);
let links_json = JSON.parse(links);
let codes_json = JSON.parse(codes);
let users_json = JSON.parse(users);
console.log(users_json);

$(function() {
    tinymce.init({
        selector: 'textarea.txthtml',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        menubar: true,
    });

    $('#form_Edit_Campaign').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        console.log(formData);

        sendForm(formData, '/campaign/save', 'reload', 'campaign');
    })

    $('#form_Save_url').on('click', function (e) {
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        console.log(formData);
        sendForm(formData, '/campaign/linksinfo/save', 'message', 'linkinfo');
    });

    $('#syncronizer').on('click', function (e){
        e.preventDefault();
        let formData = '';
        sendForm(formData, '/campaign/links/sync', 'message', 'sync')

    })

    $('#form_upload_codes').on('click' , function (e){
        e.preventDefault();
        var _form = document.getElementById('uploadFile')
        console.log( new FormData(_form));
        $.ajax({
            url: '/campaigns/upload/codes',
            method: 'post',
            data: new FormData(_form),
            dataType: 'json',
            contentType: false,
            cache:false,
            processData: false,
            success: function (data){
                if(data.success == 1){
                    $('.upload-msg').removeClass('text-danger').addClass('text-success').text(data.msg);
                    dataSave = data.data;
                    console.log(dataSave);
                    let modal_body =  $('#modal_codes').find('.modal-body');
                    for(i=0; i<dataSave.length;i++){
                        console.log(dataSave[i].code)
                        modal_body.append('<li class="float-left col col-4">'+dataSave[i].code+'</li>');
                    }
                    $('#modal_codes').modal();
                    $('.confirm-codes').on('click', function (e){
                        $.ajax({
                            url: '/campaigns/save/codes',
                            method: 'post',
                            data: {'codes': dataSave},
                            dataType: 'json',
                            success: function (resp){
                                if(resp.success == 1){
                                    $('#syncronizer').click();
                                    $('#modal_codes').modal('hide');                               }
                            }
                        })
                    })
                }else{
                    $('.upload-msg').addClass('text-danger').addClass('text-success').text(data.msg);
                }
            }
        })
    })

    $("#table_codes").dxDataGrid({
        dataSource: codes_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        headerFilter: {
            visible:true,
            allowSearch:true
        },
        searchPanel: {
            visible: true,
            width: 300,
            text: '',
            placeholder: 'Search...',
        },
        rowAlternationEnabled: true,
        editing: {
            allowAdding: true,
            allowUpdating: true,
            mode: 'line',

            useIcons: true,
        },
        columns: [
            {dataField: "id", caption: "id", visible: true,  allowEditing: false, width: 100,},
            {dataField: "codigo", caption: "Code", visible: true,  width: 250,},
            {dataField: "idUsuario", caption: "Id User", visible: false,  allowEditing: false,  width: 100,},
            {dataField: "username", caption: "User ", visible: true,  allowEditing: false},
            {dataField: "idcasa", caption: "idcasa", visible: false,  allowEditing: false},
            {dataField: "idcampania", caption: "idcampania", visible: false, allowEditing: false},
            {dataField: "activo", caption: "Active", visible: true, width: 150,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'Not Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "activo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
        ], export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Codes List');
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'codes.xlsx');
                });
            });
            e.cancel = true;
        },onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/campaign/codes/save",
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
                        url: "/campaign/codes/save",
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
        onSelected(e) {
            e.event.preventDefault();
            this.edit.emit(e.row.data);
        }
    });

    $("#table_links").dxDataGrid({
        dataSource: links_json,
        keyExpr: "idEnlace",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        headerFilter: {
            visible:true,
            allowSearch:true
        },
        searchPanel: {
            visible: true,
            width: 300,
            text: '',
            placeholder: 'Search...',
        },
        rowAlternationEnabled: true,
        editing: {
            allowAdding: true,
            allowUpdating: true,
            mode: 'line',

            useIcons: true,
        },
        columns: [
            {dataField: "idCampania", caption: "idCampania", visible: false,},
            {dataField: "idEnlace", caption: "Id", visible: true, width:100, allowEditing: false},
            {dataField: "numeroEnlace", caption: "numeroEnlace", visible: false,},
            {dataField: "textoEs", caption: "Text", visible: true,},
            {dataField: "textoEn", caption: "Eng. Text", visible: true,},
            {dataField: "urlInicial", caption: "Initial Url", visible: true, width:500,
                validationRules: [{ type: 'required' }, {
                    type: 'pattern',
                    message: 'Your URL must have "VARXXXX"!',
                    pattern: '\.*VARXXXX\.*',

                }],
            },
            {dataField: "activo", caption: "Active", visible: true,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'Not Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "activo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
        ], export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Links Data');
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'Links.xlsx');
                });
            });
            e.cancel = true;
        },onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/campaign/links/save",
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
                        url: "/campaign/links/save",
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
        onSelected(e) {
            e.event.preventDefault();
            this.edit.emit(e.row.data);
        }
    });


    $("#table_conditions").dxDataGrid({
        dataSource: improving_json,
        keyExpr: "iduser",
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
           // allowAdding: true,
            allowUpdating: true,
            mode: 'line',

            useIcons: true,
        },
        columns: [
            {dataField: 'iduser', caption: 'User Id', visible: true, allowEditing: false , width: 100},
            {dataField: 'idusercamp', caption: 'User Camp. Id', visible: false, allowEditing: false, width: 100},
            {dataField: 'user', caption: 'User', visible: true, allowEditing: false},
            {dataField: 'username', caption: 'Email', visible: true, allowEditing: false},
            {dataField: 'campaniaactiva', caption: 'Active', visible: true, allowEditing: false, width: 100},
            {dataField: 'asked', caption: 'Code', visible: true, allowEditing: false, width: 100},
            {dataField: 'commision', caption: 'Commision', visible: true, allowEditing: false, width: 100},
            {dataField: 'comisionVip', caption: 'Commision Vip', visible: true, allowEditing: true, width: 100},
            {dataField: 'conditions', caption: 'Conditions', visible: true, allowEditing: false},
            {dataField: 'condicionesVip', caption: 'Conditions Vip', visible: true, allowEditing: true},

        ], export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Users Campaigns Data');
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'Users_Campaign.xlsx');
                });
            });
            e.cancel = true;
        },onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/campaign/conditions/save",
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

});

function sendForm(_data, _url, _action='noting', _msg=''){

    let data = prepareDataForm(_data);
    console.log(data)

    $.ajax({
        url: _url,
        dataType: 'json',
        type: 'post',
        data: data,
        success:function (resp){
            if(resp.success == 1){
                if(_action=='reload'){
                    document.location.href='/campaign/edit/'+resp.data.id
                }else{
                    if(_msg!=''){
                        $('.'+_msg+'-msg').html('<i class="fa fa-check"></i> '+resp.msg);
                    }

                }
            }
        },
        error: function (e){

        }
    })

}

