$(function() {

    var categories_json = JSON.parse(categories);

    console.log(categories);
    $("#table_categories").dxDataGrid({
        dataSource: categories_json,
        keyExpr: "idCat",
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
                title: 'Category Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 3,
                        items: ['idCat', 'titcat', 'actcat'],
                    },
                ],
            }
        },
        columns: [
            {dataField: "idCat", caption: "Id", visible : true, allowEditing: false, width:100},
            {dataField: "titcat", caption: "Category", visible : true,},
            {dataField: "actcat", caption: "Active", visible : true, lookup:{
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
                    console.log(e);
                    $.ajax({
                        url: "/category/save",
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
                        url: "/category/save",
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
