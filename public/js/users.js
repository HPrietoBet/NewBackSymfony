$(function() {

  $('#form_search_users').on ('click', function (e) {
      e.preventDefault();
      var _btn =$(this);
      
      _btn.attr('disabled', true);
      var data = $('#advanced_search').serializeArray()
      var dataJson = prepareDataForm(data);

      $.ajax({
          type: "POST",
          dataType: 'json',
          data: {data: dataJson},
          url: '/users/get',
          success: function (resp) {
              _btn.attr('disabled', false);
              _btn.find('i').remove();
              setTable(resp.data);
          }
      })
  })
   var users_data_json = JSON.parse(users);
   userTermsTable(users_data_json)
});

function userTermsTable(users_data){
    console.log(users_data);
    $("#table_usersterms").dxDataGrid({
        dataSource: users_data,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        searchPanel: {
            visible: true,
            width: 300,
            placeholder: 'Search...',
        },
        headerFilter: {
            visible: true,
            allowSearch: true
        },
        rowAlternationEnabled: true,
        editing: {
            allowUpdating: false,
            mode: 'popup',
            popup: {
                title: 'Afilliate Terms and Policy Info',
                showTitle: true,
            },
            useIcons: true,
        },
        export: {
            enabled: true
        },
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Users Terms and Conditions');
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), 'UsersTermsAndConditions.xlsx');
                });
            });
            e.cancel = true;
        },
        columns: [
            {dataField: "id", caption:"Id", visible: false},
            {dataField: "username", caption:"User"},
            {dataField: "fecha", caption:"Date"},
            {dataField: "aceptaPolitica", caption:"Privacy Policy"},
            {dataField: "aceptaTerminos", caption:"Terms and Conditions"},
            {dataField: "user", caption:"Responsible"},
        ]
    });
}

function setTable(data){
    var responsables_json = JSON.parse(responsables);
    var users_json = data;
    console.log(users_json);
    $("#table_users").dxDataGrid({
        dataSource: users_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        filterRow: {
            visible: true,
            applyFilter: 'auto',
        },
        headerFilter: {
            visible: true,
        },
        rowAlternationEnabled: true,
        editing: {
            allowUpdating: true,
            mode: 'popup',
            popup: {
                title: 'Afilliate Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        caption: 'User Info',
                        colCount: 2,
                        colSpan: 4,
                        items: ['id', 'user', 'username', 'country', 'lang', 'prefijo', 'telefono', 'nivelUser'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'PremiumPay',
                        items: ['premiumpay', 'payu', 'marketing', 'verCpas', 'activeRefunds'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        colSpan: 2,
                        caption: 'Traffic Source',
                        items: ['trafficType', 'trafficUrl'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Account Actions',
                        items: ['activo', 'adminLogin', 'mostrarAdminlogin', 'responsable', 'terminos', 'politica'],
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
            {dataField: "id", dataType:"id", visible: true, allowEditing: false},
            {dataField: "premiumpay", dataType:"Premiumpay", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "premiumpay"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "activeRefunds", caption:"Devolver apuestas", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "activeRefunds"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "activo", dataType:"activo", visible: false, lookup:{
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
                }},
            {dataField: "adminLogin", dataType:"adminLogin", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "adminLogin"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "adminLoginExpires", dataType:"adminLoginExpires", visible: false},
            {dataField: "adminLoginPassword", dataType:"adminLoginPassword", visible: false},
            {dataField: "avatar", dataType:"avatar", visible: false},
            {dataField: "comisionPay", dataType:"comisionPay", visible: false},
            {dataField: "country", dataType:"country", visible: true,
                cellTemplate(container, options) {
                    let country = '';
                    if(options.data.lang.toUpperCase() == 'EN')  country = 'GB';
                    else if(options.data.lang.toUpperCase() == 'PT') country = 'BR';
                    else country = options.data.lang;
                    $('<div>')
                        .append($('<img>', { src: '/img/flat/24/'+country.toUpperCase()+'.png' }))
                        .appendTo(container);
                },
            },
            {dataField: "enlacesIapuestas", dataType:"enlacesIapuestas", visible: false,  lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "enlacesIapuestas"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
            {dataField: "facebook", dataType:"facebook", visible: false},
            {dataField: "fuentesTrafico", dataType:"fuentesTrafico", visible: false},
            {dataField: "husoHorario", dataType:"husoHorario", visible: false},
            {dataField: "idPago", dataType:"idPago", visible: false},
            {dataField: "instagram", dataType:"instagram", visible: false},
            {
                dataField: "landingcreator",
                dataType: "landingcreator",
                visible: false,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "landingcreator"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
            {dataField: "lang", dataType:"Lang", visible: false},
            {dataField: "lastLogin", dataType:"date", visible: false, },
            {
                dataField: "linksDirectos",
                dataType: "linksDirectos",
                visible: false,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "linksDirectos"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
            {
                dataField: "linksDirectosItalia",
                dataType: "linksDirectosItalia",
                visible: false,
                lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No Active'},
                                {id: true, name: 'Active'},
                            ],
                            key: "linksDirectosItalia"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
            },
            {dataField: "marketing", dataType:"marketing", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "marketing"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "mostrarAdminlogin", dataType:"mostrarAdminlogin", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "mostrarAdminlogin"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "myip", dataType:"myip", visible: false},
            {dataField: "nivelUser", dataType:"nivelUser", visible: false,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: 0, name: 'Not Started' },
                                { id: 2, name: 'User' },
                            ],
                            key: "nivelUser"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "nuevoBetandeal", dataType:"nuevoBetandeal", visible: false},
            {dataField: "numcuenta", dataType:"numcuenta", visible: false},
            {dataField: "otraUrl", dataType:"otraUrl", visible: false},
            {dataField: "pagoCustom", dataType:"pagoCustom", visible: false},
            {dataField: "pagoMin", dataType:"pagoMin", visible: false},
            {dataField: "passwordId", dataType:"passwordId", visible: false},
            {dataField: "payu", dataType:"payu", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: 0, name: 'No Active' },
                                { id: 1, name: 'Active' },
                            ],
                            key: "payu"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "plainpassword", dataType:"plainpassword", visible: false},
            {dataField: "prefijo", dataType:"prefijo", visible: false},
            {dataField: "premiumpay", dataType:"premiumpay", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: true, name: 'No Active' },
                                { id: false, name: 'Active' },
                            ],
                            key: "premiumpay"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "responsable", dataType:"responsable", visible: false,
                lookup: {
                    dataSource: responsables_json,
                    valueExpr: 'id',
                    displayExpr: 'user',
                }
            },
            {dataField: "telefono", dataType:"telefono", visible: false, allowEditing: false,},
            {dataField: "telegram", dataType:"telegram", visible: false},
            {dataField: "twitter", dataType:"twitter", visible: false},
            {dataField: "urlWeb", dataType:"urlWeb", visible: false},
            {dataField: "user", dataType:"user", visible: false, allowEditing: false},
            {dataField: "username", dataType:"username", visible: true, allowEditing: false, minWidth:150},
            {dataField: "trafficType", dataType:"Fuente Tipo", visible: true, allowEditing: false, minWidth:100},
            {dataField: "trafficUrl", dataType:"Url", visible: true, allowEditing: false, minWidth:150},
            {dataField: "comentarios_anteriores", caption:"Comentarios anteriores", visible: false, allowEditing: false},
            {dataField: "comentarios", caption:"Nuevo Comentario", visible: false, allowEditing: true, },
            {dataField: "verCpas", dataType:"verCpas", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: 0, name: 'No Active' },
                                { id: 1, name: 'Active' },
                            ],
                            key: "verCpas"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "terminos", caption:"Terms and Conditions", visible: true, allowEditing: false, lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No'},
                                {id: true, name: 'Yes'},
                            ],
                            key: "terminos"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },},
            {dataField: "politica", caption:"Privacy Policy", visible: true,  allowEditing: false,  lookup: {
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: false, name: 'No'},
                                {id: true, name: 'Yes'},
                            ],
                            key: "politica"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },},

        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/user/save",
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