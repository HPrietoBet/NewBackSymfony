$(function() {

    // carga de usuarios
    var users_json = JSON.parse(users_str);


    $("#table_users").dxDataGrid({
        dataSource: users_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        editing: {
            allowUpdating: (actions_locked.indexOf('save') > -1) ? false: true,
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
                        items: ['activo', 'adminLogin', 'mostrarAdminlogin', 'responsable'],
                    },
                    {
                        itemType: 'group',
                        colCount: 2,
                        caption: 'Landing Actions',
                        items: ['landingcreator', 'linksDirectos', 'linksDirectosItalia'],
                    },

                ],
            }
        },
        columns: [
            {dataField: "id", dataType:"id", visible: true, allowEditing: false,dataType: 'number'},
            {dataField: "aceptaPremiumpay", dataType:"aceptaPremiumpay", visible: false, lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: false, name: 'No Active' },
                                { id: true, name: 'Active' },
                            ],
                            key: "aceptaPremiumpay"
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
            {dataField: "country", dataType:"country", visible: true, allowEditing: false,
                cellTemplate(container, options) {

                    let country = '';
                    if(options.data.lang.toUpperCase() == 'EN')  country = 'GB';
                    else if(options.data.lang.toUpperCase() == 'PT') country = 'BR';
                    else country = options.data.lang;
                    $('<div>')
                        .append($('<img>', { src: 'img/flat/24/'+country.toUpperCase()+'.png' }))
                        .appendTo(container);
                },
            },
            {dataField: "enlacesIapuestas", dataType:"enlacesIapuestas", visible: false},
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
                            key: "mostrarAdminlogin"
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
            {dataField: "prefijo", dataType:"prefijo", visible: false, allowEditing: false,},
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
                }},
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

    // carga de datos de facturacion
    var data_json = JSON.parse(data_str);
    var urlDocs = 'https://user.betandeal.com/public/documentos/';

    $("#table_cash").dxDataGrid({
        dataSource: data_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        rowAlternationEnabled: true,
        editing: {
            allowUpdating: (actions_locked.indexOf('save') > -1) ? false: true,
            mode: 'popup',
            popup: {
                title: 'Last Cash Actions',
                showTitle: true,
            },
            useIcons: true,form:{
                items: [
                    {
                        itemType: 'group',
                        colCount: 4,
                        colSpan: 2,
                        caption: 'Actions',
                        items: ['control', 'mostrarAdminlogin', 'multifacturas', 'multifacturasSubir'],
                    },
                    {
                        itemType: 'group',
                        caption: 'Invoicing Info',
                        colCount: 2,
                        colSpan: 2,
                        items: ['id', 'idUsuFac', 'nombre', 'nombreCompletoPago', 'nombreEmpresa', 'email', 'telefono', 'nif', 'tipo', 'direccion', 'poblacion', 'cpostal', 'provincia', 'pais'],
                    },
                ],
            }

        },
        columns: [
            {dataField: "id", caption:"id", visible: false, allowEditing: false},
            {dataField: "idUsuFac", caption:"Id Usuario", visible: true,  allowEditing: false},
            {dataField: "control", caption:"Aprobar", visible: false, lookup:{
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
            {dataField: "cpostal", caption:"cpostal", visible: false},
            {dataField: "direccion", caption:"direccion", visible: false},
            {dataField: "dniFac", caption:"dniFac", visible: false},
            {dataField: "email", caption:"email", visible: false},
            {dataField: "fechaAlta", caption:"fechaAlta", visible: false, dataType: 'date'},
            {dataField: "fechaCaducidad", caption:"fechaCaducidad", visible: false, dataType: 'date' },
            {dataField: "idPago", caption:"idPago", visible: false},
            {dataField: "mostrarAdminlogin", caption:"mostrarAdminlogin", visible: false, lookup:{
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
            {dataField: "multifacturas", caption:"multifacturas", visible: false
                , lookup:{
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
                }},
            {dataField: "multifacturasSubir", caption:"multifacturasSubir", visible: false
                , lookup:{
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
                }},
            {dataField: "nif", caption:"nif", visible: false},
            {dataField: "nombre", caption:"Nombre", visible: true, minWidth:150

            },
            {dataField: "nombreCompletoPago", caption:"nombreCompletoPago", visible: false},
            {dataField: "nombreEmpresa", caption:"nombreEmpresa", visible: false},
            {dataField: "numcuenta", caption:"numcuenta", visible: false},
            {dataField: "numcuentabanco", caption:"numcuentabanco", visible: false},
            {dataField: "pagado", caption:"pagado", visible: false},
            {dataField: "pais", caption:"pais", visible: false},
            {dataField: "pendiente", caption:"pendiente", visible: false},
            {dataField: "pendientePagar", caption:"pendientePagar", visible: false},
            {dataField: "poblacion", caption:"poblacion", visible: false},
            {dataField: "provincia", caption:"provincia", visible: false},
            {dataField: "saldo", caption:"saldo", visible: false},
            {dataField: "telefono", caption:"telefono", visible: false},
            {dataField: "tipo", caption:"Tipo", visible: true,
                lookup:{
                    dataSource: {
                        store: {
                            type: 'array',
                            data: [
                                { id: 'autonomo', name: 'Autonomo' },
                                { id: 'empresa', name: 'Empresa' },
                            ],
                            key: "tipo"
                        },
                    },
                    valueExpr: 'id',
                    displayExpr: 'name',
                }
            },
            {dataField: "docfrontal", caption:"Front", visible: true,
                cellTemplate(container, options) {

                    $('<div>')
                        .append($('<a>', { href: urlDocs + options.value, text: 'View', target: '_blank', class: 'btn btn-outline-primary  btn-sm'}))
                        .appendTo(container);
                },
                minWidth:80

            },
            {dataField: "docreverso", caption:"Back", visible: true,
                cellTemplate(container, options) {
                    $('<div>')
                        .append($('<a>', { href: urlDocs + options.value, text: 'View', target: '_blank', class: 'btn btn-outline-danger btn-sm'}))
                        .appendTo(container);
                },
                minWidth:80

            },
            {dataField: "total", caption:"total", visible: false},
            {dataField: "transferenciaDirrecionBanco", caption:"transferenciaDirrecionBanco", visible: false},
            {dataField: "transferenciaSwift", caption:"transferenciaSwift", visible: false},
        ],
        onCellPrepared(e) {
            if (e.rowType == "data" && e.column.dataField == "nombre"){
                if(e.data.nombre == '') {
                    e.cellElement.text(e.data.nombreEmpresa)
                }
            }
        },
        onRowUpdating: function (e) {
            const deferred = $.Deferred();
            const promptPromise = DevExpress.ui.dialog.confirm("Are you sure?", "Save new data");
            promptPromise.done((dialogResult) => {
                if (dialogResult) {
                    $.ajax({
                        url: "/facturacion-datos/save",
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

    // filtrado de fechas charts
    $('.btn-info').on('click', function (e){
        myBarChartEur.destroy()
        myBarChartEursPpay.destroy()
        myBarChartCops.destroy()
        $('.fa-spinner').show();
        var date_end = $('#date_end').val();
        var date_init = $('#date_init').val();
        $.ajax({
            url: '/home/charts',
            data: {date_init: date_init, date_end: date_end},
            dataType:'json',
            method: "POST",
            success: function (resp){
                setCharts(resp.data.comisiones, resp.data.eur_chart, resp.data.cop_chart);
                console.log(resp);
            }
        })
    })

    setCharts(comisiones_chart, eur_chart, cop_chart);

});
var myBarChartEur;
var myBarChartEursPpay;
var myBarChartCops;

function setCharts(comisiones_chart, eur_chart, cop_chart){
    // grafico comisiones
    var ctx = document.getElementById("comisionesChart");




    myBarChartEur = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: comisiones_chart.label,
            datasets: [
                {
                    label: "Comisions",
                    spanGaps: true,
                    yAxisID: 'A',
                    backgroundColor: "#36b9cc",
                    hoverBackgroundColor: "#36b9cc",
                    borderColor: "#36b9cc",
                    order: 2,
                    data: comisiones_chart.comisiones
                }, {
                    label: "Players",
                    spanGaps: true,
                    yAxisID: 'B',
                    backgroundColor: "#1cc88a",
                    hoverBackgroundColor: "#1cc88a",
                    borderColor: "#1cc88a",
                    order: 1,
                    type: 'line',
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 4,
                    pointHoverRadius: 8,
                    data: comisiones_chart.players,
                }],
        },
        options: {
            animation: {
                duration: 2000,
                onComplete: function(context) {
                    $('.fa-spinner').hide();
                }
            },
            elements: {
                line: {
                    tension: 0
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [
                    {
                        id: 'A',
                        position: 'left',
                        scaleLabel: {
                            display: true,
                            labelString: 'Comisions'
                        },
                        ticks: {
                            steps: 1000,
                            stepValue: 500,
                            min: 0,
                            max: comisiones_chart.max,
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return '€' + number_format(value, 2);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    },
                    {
                        id: 'B',
                        position: 'right',
                        scaleLabel: {
                            display: true,
                            labelString: 'Players'
                        },
                        type: 'linear',
                        ticks: {
                            beginAtZero: true,
                            steps: 100,
                            stepValue: 50,
                        },
                        gridLines: {
                           display: false
                        }
                    }],
            },
            legend: {
                display: true
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, data) {
                        var formatnumber = tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        formatnumber = formatnumber.replace('.',',').replace(',','.');
                        var tooltips = [];
                        var currentdataset = tooltipItem.datasetIndex;
                        $(data.datasets).each(function(k,v){
                            if(currentdataset == k){
                                var label = data.datasets[k].label;
                                if(k == 1){
                                    tooltips.push(tooltipItem.yLabel+ " "+label);
                                }else{
                                    tooltips.push(formatnumber+" € "+label);
                                }
                            }
                        });

                        return tooltips;
                    }
                }

            },
        }
    });

    // grafico ppay_eur

    var ctx = document.getElementById("ppay_eur");
    myBarChartEursPpay = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: eur_chart.label,
            datasets: [
                {
                    label: "Sell",
                    spanGaps: true,
                    order: 2,
                    yAxisID: 'A',
                    backgroundColor: "#36b9cc",
                    hoverBackgroundColor: "#36b9cc",
                    borderColor: "#36b9cc",
                    data: eur_chart.ventas
                }, {
                    label: "Transactions",
                    spanGaps: true,
                    yAxisID: 'B',
                    backgroundColor: "#1cc88a",
                    hoverBackgroundColor: "#1cc88a",
                    borderColor: "#1cc88a",
                    order: 1,
                    type: 'line',
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 4,
                    pointHoverRadius: 8,
                    data: eur_chart.transactions,
                }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            elements: {
                line: {
                    tension: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [
                    {
                        id: 'A',
                        position: 'left',
                        scaleLabel: {
                            display: true,
                            labelString: 'Sale'
                        },
                        ticks: {
                            steps: 1000,
                            stepValue: 500,
                            min: 0,
                            max: eur_chart.max,
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return '€ ' + number_format(value, 2);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    },
                    {
                        id: 'B',
                        position: 'right',
                        type: 'linear',
                        ticks: {
                            beginAtZero: true,
                            steps: 100,
                            stepValue: 50,
                        },
                        gridLines: {
                            display: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Transactions'

                        }
                    }],
            },
            legend: {
                display: true
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, data) {
                        var formatnumber = tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        formatnumber = formatnumber.replace('.',',').replace(',','.');
                        var tooltips = [];
                        var currentdataset = tooltipItem.datasetIndex;
                        $(data.datasets).each(function(k,v){
                            if(currentdataset == k){
                                var label = data.datasets[k].label;
                                if(k == 1){
                                    tooltips.push(tooltipItem.yLabel+ " "+label);
                                }else{
                                    tooltips.push(formatnumber+" € "+label);
                                }
                            }
                        });

                        return tooltips;
                    }
                }

            },
        }
    });

    // grafico ppay_cop
    var ctx = document.getElementById("ppay_cop");
    myBarChartCops = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cop_chart.label,
            datasets: [
                {
                    label: "Sell",
                    spanGaps: true,
                    order: 2,
                    yAxisID: 'A',
                    backgroundColor: "#36b9cc",
                    hoverBackgroundColor: "#36b9cc",
                    borderColor: "#36b9cc",
                    data: cop_chart.ventas
                }, {
                    label: "Transactions",
                    spanGaps: true,
                    yAxisID: 'B',
                    backgroundColor: "#1cc88a",
                    hoverBackgroundColor: "#1cc88a",
                    borderColor: "#1cc88a",
                    order: 1,
                    type: 'line',
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 4,
                    pointHoverRadius: 8,
                    data: cop_chart.transactions,
                }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            elements: {
                line: {
                    tension: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [
                    {
                        id: 'A',
                        position: 'left',
                        scaleLabel: {
                            display: true,
                            labelString: 'Sale'
                        },
                        ticks: {
                            steps: 1000,
                            stepValue: 500,
                            min: 0,
                            max: cop_chart.max,
                            maxTicksLimit: 5,
                            padding: 10,
                            callback: function(value, index, values) {
                                return '$ ' + number_format(value, 2);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    },
                    {
                        id: 'B',
                        position: 'right',
                        type: 'linear',
                        ticks: {
                            beginAtZero: true,
                            steps: 100,
                            stepValue: 50,
                        },
                        gridLines: {
                            display: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Transactions'

                        }
                    }],
            },
            legend: {
                display: true
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: true,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, data) {
                        var formatnumber = tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                        formatnumber = formatnumber.replace('.',',').replace(',','.');
                        var tooltips = [];
                        var currentdataset = tooltipItem.datasetIndex;
                        $(data.datasets).each(function(k,v){
                            if(currentdataset == k){
                                var label = data.datasets[k].label;
                                if(k == 1){
                                    tooltips.push(tooltipItem.yLabel+ " "+label);
                                }else{
                                    tooltips.push(formatnumber+" $ "+label);
                                }
                            }
                        });

                        return tooltips;
                    }
                }

            },
        }
    });
}
