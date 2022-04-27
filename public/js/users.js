$(function() {

    var users_json = JSON.parse(users);
    var campaigns_json = JSON.parse(campanias);

    $("#table_users").dxDataGrid({
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
                title: 'Affiliate Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        caption: 'User Info',
                        colCount: 2,
                        items: ['id', 'email', 'username', 'activo'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Password',
                        items: ['plainPassword' ],
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        caption: 'Campaigns',
                        items: ['campanias'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Data last access',
                        items: ['ultimoLogin', 'ip'],
                    },

                ],
            }
        },
        columns: [
            {dataField: "id",
                caption:"Id",
                visible: true,
                allowEditing: false,
            },
            {dataField: "username",
                caption:"Username",
                visible: true,
            },
            {dataField: "email",
                caption:"Email",
                visible: true,
            },
            {dataField: "activo", caption: "Activo", visible : true, lookup:{
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
            {dataField: "ip",
                caption:"Last Login Ip",
                visible: false,
                allowEditing: false,
            },
            {dataField: "password",
                caption:"Password",
                visible: false,
            },
            {dataField: "plainPassword",
                caption:"Password",
                visible: false,
            },
            {dataField: "ultimoLogin",
                caption:"Last Login Date",
                visible: false,
                allowEditing: false,
            },
            {dataField: "campanias",
                caption:"Campañas",
                visible: false,
                editCellTemplate: function(cellElement, cellInfo) {
                    setComponent('select', cellInfo,  cellElement, campaigns_json);

                },
            },

        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/user/bookie/save",
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
                        url: "/user/bookie/save",
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
    })
});