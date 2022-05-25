var url_base = 'https://bdeal.io/direct/link/';
var links_json = JSON.parse(links);
var countries_json =  JSON.parse(countries);


$(function() {

    $('body').on('click', '.show-flags', function (e){
        var _flags = $(this).attr('data-info');
        createModalFlags(_flags);
    })

    $("#table_links").dxDataGrid({
        dataSource: links_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        headerFilter: { visible: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            allowUpdating: true,
            mode: 'popup',
            popup: {
                title: 'Competency Info',
                showTitle: true,
            },
            useIcons: true,
            form:{
                items: [
                    {
                        itemType: 'group',
                        colSpan: 2,
                        colCount: 3,
                        items: ['nombre',  'url', 'username'],
                    },
                    {
                        itemType: 'group',
                        colCount: 1,
                        colSpan: 2,
                        caption: 'Links',
                        items: [{
                            dataField: 'campanias',
                            caption: 'Campaigns',
                            colSpan: 1,

                        }],
                    },
                ],
            },

        },
        columns: [
            {dataField: 'id', caption: 'id', visible: false, width: 50, allowEditing: false,dataType: 'number'},
            {dataField: 'username', caption: 'User', visible: true, allowEditing: false},
            {dataField: 'nombre', caption: 'Name', visible: true},
            {dataField: 'campanias', caption: 'Campaigns', visible: true,editCellTemplate:function (cellElement, cellInfo){
                    prepareCardsForm(cellElement, cellInfo)
                }
            },
            {dataField: 'paises', caption: 'Countries', visible: true,
                cellTemplate(container, options) {
                    var countries = options.value;

                    var _total = countries.length > 3 ? 3 : countries.length;
                    if (_total > 0) {
                        for (i = 0; i < _total; i++) {
                            if (countries[i] != '') {
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
                }
            },
            {dataField: 'url', caption: 'Url', visible: true,
                cellTemplate(container, options) {
                    if(options.rowType == 'data'){
                        $('<a>', {href: url_base+options.value+'/'+options.data.idUsuario, text:url_base+options.value+'/'+options.data.idUsuario, target: '_blank' } ).appendTo(container);
                    }
                }
            },
            {dataField: 'fecha', caption: 'Creation Date', visible: true,dataType: 'date'},

        ], onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/custom-links/save",
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
            '<img src="img/flat/24/'+flags_array[i].toUpperCase()+'.png" alt="'+flags_array[i].toUpperCase()+'" class="p-3" />'
        );
    }
}


function prepareCardsForm(cellElement, cellInfo){
        for(i= 0; i< cellInfo.value.length; i++){
            $('<div>', {class:'client_comment half float-left align-center'})
                .append($('<img>', {src:'img/flat/24/'+cellInfo.data.paises[i].toUpperCase()+'.png', class:' float-left p-1'}))
                .append($('<h6>', {text:' '+cellInfo.value[i], class:'p-2'}))
                .appendTo(cellElement)
        }

}