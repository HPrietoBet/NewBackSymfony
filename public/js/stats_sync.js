$(function(){
    $('.datepicker.from, .input-daterange.from').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $('.js-datepicker.from').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
    });

    $('#advanced_search').on('submit', function (e){
        e.preventDefault();
        let data = $(this).serializeArray();
        let formData = prepareDataForm(data);
        $.ajax({
            url: '/stats/syncronization',
            data: formData,
            datatype: 'json',
            method: 'post',
            success: function (resp){
                setTable(resp.data.new, 'new', 'sendAll');
                setTable(resp.data.update, 'update',  '');
                $('.save_all').on('click', function (e){
                    saveData(resp.data.new);
                })

            }
        })
         return;
    })
})

function saveData(data){

    $.ajax({
        url: "/stats/syncronization/save",
        dataType: "json",
        type: "post",
        data: {newData: data},
        success: function (validationResult) {
            document.location.reload();
        },
        error: function () {

        },

    });
}

function setTable(data, table, options){
    $("#table_stats_"+table).dxDataGrid({
        dataSource:  data,
        showBorders: true,
        keyExpr: "idStat",
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: false,
        headerFilter: { visible: true },
        searchPanel: { visible: true, width:400 },
        editing: {
            //allowAdding: true,
            allowUpdating: true,
            mode: 'line',
            useIcons: true,
        },
        columns: [
            {dataField: "fecha", caption: "Date", visible: true, allowEditing: false},
            {dataField: "idUser", caption: "Id User", visible: true, allowEditing: false},
            {dataField: "username", caption: "Username", visible: true, allowEditing: false},
            {dataField: "idCampaniaUsuario", caption: "Campaign User Id", visible: true , allowEditing: false},
            {dataField: "subdId", caption: "SubId", visible: true, allowEditing: false},
            {dataField: "fuenteMarketing", caption: "Mkt. Source", visible: true, allowEditing: false},
            {dataField: "connectionApi", caption: "Connection Api", visible: false, allowEditing: false},
            {dataField: "registros", caption: "Sign Up", visible: true,
                cellTemplate: function(element, info) {
                    if(info.data.danger===1){
                        let symbol = info.text == info.data.regBefore ? "=": info.text < info.data.regBefore ? "<" : ">";
                        element.append("<div>" + info.text + " " +symbol+ " " +info.data.regBefore +"</div>")
                    }else{
                        element.append("<div>" + info.text + "</div>")
                    }
                }
            },
            {dataField: "depositantes", caption: "Depositors", visible: true,
                cellTemplate: function(element, info) {
                    if(info.data.danger===1){
                        let symbol = info.text == info.data.depositantesBefore ? "=": info.text < info.data.depositantesBefore ? "<" : ">";
                        element.append("<div>" + info.text + " " +symbol+ " " +info.data.depositantesBefore +"</div>")
                    }else{
                        element.append("<div>" + info.text + "</div>")
                    }
                }
            },
            {dataField: "cpa", caption: "Cpa", visible: true,
                cellTemplate: function(element, info) {
                    if(info.data.danger===1){
                        let symbol = info.text == info.data.cpaBefore ? "=": info.text < info.data.cpaBefore ? "<" : ">";
                        element.append("<div>" + info.text + " "+symbol+" "+info.data.cpaBefore +"</div>")
                    }else{
                        element.append("<div>" + info.text + "</div>")
                    }
                }
            },

            {dataField: "actualiza", caption: "actualiza", visible: false},
            {dataField: "comision", caption: "Commision (€)", visible: true , allowEditing: false},
            {dataField: "comisionIndividual", caption: "Commision (€)", visible: false , allowEditing: false},
            {dataField: "cpaBefore", caption: "cpaBefore", visible: false},
            {dataField: "danger", caption: "danger", visible: false},
            {dataField: "depositantesBefore", caption: "depositantesBefore", visible: false},
            {dataField: "idStat", caption: "idStat", visible: false},
            {dataField: "regBefore", caption: "regBefore", visible: false},
        ],
        onRowPrepared: function (e){
            if(e.rowType == 'data' && e.data.danger === 1){
                e.rowElement.addClass('bg-danger text-white')
            }
        },
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    console.log(e);
                    $.ajax({
                        url: "/stats/syncronization/save",
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
                        url: "/faq/save",
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
}