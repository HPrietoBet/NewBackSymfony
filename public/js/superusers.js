$(function() {

    var users_json = JSON.parse(superusers);
    console.log(users_json);
    $("#table_superusers").dxDataGrid({
        dataSource: users_json,
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
                title: 'Admin Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        caption: 'User Info',
                        colCount: 2,
                        items: ['id', 'user', 'username', 'telefono', 'lang', 'activo'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Password & Roles',
                        items: ['plainpassword' , 'roles'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Others',
                        items: ['esResponsable', 'responsable'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Data last access',
                        items: ['ultimoacceso', 'myip'],
                    },

                ],
            }
        },
        columns: [
            {dataField: "id", caption: "Id", visible : true, allowEditing: false,dataType: 'number'},
            {dataField: "user", caption: "User", visible : true,
                validationRules: [{ type: "required" }]
            },
            {dataField: "username", caption: "Username", visible : true,
                validationRules: [{ type: "required" }]},
            {dataField: "password_id", caption: "password_id", visible : false},
            {dataField: "plainpassword", caption: "Password sin codificar", visible : false,
                validationRules: [{ type: "required" }]},
            {dataField: "password", caption: "Password", visible : false},
            {dataField: "nivelUser", caption: "Nivel de usuario", visible : false},
            {dataField: "roles", caption: "Rol", visible : true, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: "ROLE_SUPERADMIN", name:"ROLE_SUPERADMIN"},
                                {id: "ROLE_AFFILIATE", name:"ROLE_AFFILIATE"},
                                {id: "ROLE_ADMIN", name:"ROLE_ADMIN"},
                                {id: "ROLE_CONTABILITY", name:"ROLE_CONTABILITY"},
                                {id: "ROLE_PROJECT", name:"ROLE_PROJECT"},
                                {id: "ROLE_INTERNAL", name:"ROLE_INTERNAL"},
                            ],
                            key: "roles"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                },
                validationRules: [{ type: "required" }]
            },
            {dataField: "responsable", dataType:"responsable", visible: true,
                lookup: {
                    dataSource: responsables_json,
                    valueExpr: 'id',
                    displayExpr: 'user',
                }
            },
            {dataField: "lang", caption: "Language", visible : true,  lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                {id: "es", name:"es"},
                                {id: "en", name:"en"},
                                {id: "pt", name:"pt"},
                                {id: "it", name:"it"},
                            ],
                            key: "lang"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "telefono", caption: "Telefono", visible : false},
            {dataField: "ultimoacceso", caption: "Ultimo acceso", visible : false},
            {dataField: "myip", caption: "IP Último Acceso", visible : false},
            {dataField: "esResponsable", caption: "Es responsable?", visible : true, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: 0, name: 'No' },
                                { id: 1, name: 'Yes' },
                            ],
                            key: "es_responsable"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }},
            {dataField: "activo", caption: "Activo", visible : true, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "control"
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
                        url: "/user/admin/save",
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
                        url: "/user/admin/save",
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
