$(function() {
    $('.datepicker.from, .input-daterange.from').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $('.js-datepicker.from').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
    });

    $('.datepicker.comparation, .input-daterange.comparation').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $('.js-datepicker.comparation').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
    });

    $('.activeCompare').on('change', function (e){
        if($(this).is(':checked')){
            $('.compare').removeClass('hide')
        }else{
            $('.compare').addClass('hide')
        }

    })

  $('#form_search_stats').on ('click', function (e) {
      e.preventDefault();
      let type = $(this).attr('data-search');
      let _fechas = $('.js-datepicker').val();
      let _searchby = $('.selectpicker').val();
      var _btn =$(this);
      var data = $('#advanced_search').serializeArray()
      var dataJson = prepareDataForm(data);
      $.ajax({
          type: "POST",
          dataType: 'json',
          data: {data: dataJson},
          url: '/stats/'+type+'/get',
          success: function (resp) {
              console.log(resp)
              setTable(resp, type);
          }
      })
  })
});

function setTable(data, type){
    let compare = data[0].comparation;
    let columnsData = ''
    switch (type){
        case 'users':
            if(!compare){
                columnsData = '[\n' +
                    ' {"dataField": "id", "caption": "id", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "user", "caption": "User", "visible": true},\n' +
                    ' {"dataField": "username", "caption": "Username", "visible": true},\n' +
                    ' {"dataField": "responsible", "caption": "Responsible", "visible": true},\n' +
                    ' {"dataField": "comsiones", "caption": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpas", "caption": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantes", "caption": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeCop", "caption": "Money Cop", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeEur", "caption": "Money Eur", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registros", "caption": "Regs", "visible": true, "dataType": "number"}\n' +
                    ']';
            }else{
                columnsData = '[\n' +
                    ' {"dataField": "id", "caption": "id", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "user", "caption": "User", "visible": true},\n' +
                    ' {"dataField": "username", "caption": "Username", "visible": true},\n' +
                    ' {"dataField": "responsible", "caption": "Responsible", "visible": true},\n' +
                    ' {"dataField": "comsiones", "caption": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "comsionesComp", "caption": "Commisions Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "comsionesPer", "caption": "Commisions Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpas", "caption": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpasComp", "caption": "CPAs Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpasPer", "caption": "CPAs Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantes", "caption": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantesComp", "caption": "Players Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantesPer", "caption": "Players Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registros", "caption": "Regs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registrosComp", "caption": "Regs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registrosPer", "caption": "Regs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeCop", "caption": "Money Cop", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeCopComp", "caption": "Money Cop Compare", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeEur", "caption": "Money Eur", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "importeEurComp", "caption": "Money Eur Compare", "visible": true, "dataType": "number"}\n' +
                    ']';
            }
            break;
        case 'clients':
            if(!compare) {
                columnsData = '[\n' +
                    ' {"dataField": "id", "capation": "id", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "logo", "capation": "Logo", "visible": true},\n' +
                    ' {"dataField": "client", "capation": "Client", "visible": true},\n' +
                    ' {"dataField": "comsiones", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpas", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantes", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registros", "capation": "Regs", "visible": true, "dataType": "number"}\n' +
                    ']';
            }else{
                columnsData = '[\n' +
                ' {"dataField": "id", "capation": "id", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "logo", "capation": "Logo", "visible": true},\n' +
                ' {"dataField": "client", "capation": "Client", "visible": true},\n' +
                ' {"dataField": "comsiones", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "comsionesComp", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "comisonesPer", "capation": " %", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "cpas", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "cpasComp", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "cpasPer", "capation": "%", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "depositantes", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "depositantesComp", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "depositantesPer", "capation": " %", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "registros", "capation": "Regs", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "registrosComp", "capation": "Regs", "visible": true, "dataType": "number"},\n' +
                ' {"dataField": "registrosPer", "capation": " %", "visible": true, "dataType": "number"}\n' +
                ']';
            }
            break;
        case 'countries':
            if(!compare) {
                columnsData = '[\n' +
                    ' {"dataField": "id", "capation": "id", "visible": false, "dataType": "number"},\n' +
                    ' {"dataField": "country", "capation": "Country", "visible": true},\n' +
                    ' {"dataField": "comsiones", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpas", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantes", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registros", "capation": "Regs", "visible": true, "dataType": "number"}\n' +
                    ']';
            }else{
                columnsData = '[\n' +
                    ' {"dataField": "id", "capation": "id", "visible": false, "dataType": "number"},\n' +
                    ' {"dataField": "country", "capation": "Country", "visible": true},\n' +
                    ' {"dataField": "comsiones", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "comsionesComp", "capation": "Commisions", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "comisonesPer", "capation": " %", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpas", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpasComp", "capation": "CPAs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "cpasPer", "capation": "%", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantes", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantesComp", "capation": "Players", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "depositantesPer", "capation": " %", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registros", "capation": "Regs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registrosComp", "capation": "Regs", "visible": true, "dataType": "number"},\n' +
                    ' {"dataField": "registrosPer", "capation": " %", "visible": true, "dataType": "number"}\n' +
                    ']';
            }
            break;
        case 'clicks':
            columnsData = '[{"dataField": "id", "caption": "Fecha Hora", "visible": true },\n' +
                '{"dataField": "idusuario", "caption": "idusuario", "visible": false },\n' +
                '{"dataField": "username", "caption": "username", "visible": true },\n' +
                '{"dataField": "client", "caption": "Campaign", "visible": true },\n' +
                '{"dataField": "idCampaniaUsuario", "caption": "idCampaniaUsuario", "visible": false },\n' +
                '{"dataField": "codigo", "caption": "Code", "visible": true },\n' +
                '{"dataField": "clicks_totales", "caption": "Total Clicks", "visible": true },\n' +
                '{"dataField": "clicks_unicos", "caption": "Unique Clicks", "visible": true }]'
    }

    columns_end = (JSON.parse(columnsData));
    columns_end.forEach(
        element => setElement(element)
    );

    var data_json = data;
    $("#table_stats").dxDataGrid({
        dataSource: data_json,
        keyExpr: "id",
        showBorders: true,
        showColumnLines: false,
        showRowLines: true,
        headerFilter: {
            visible: true,
            allowSearch: true
        },
        export: {
            enabled: true
        },
        searchPanel: {
            visible: true,
            width: 300,
            text: '',
            placeholder: 'Search...',
        },
        rowAlternationEnabled: true,
        columns: columns_end,
        onExporting: function(e) {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet(type);
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
                    saveAs(new Blob([buffer], { type: 'application/octet-stream' }), type+'.xlsx');
                });
            });
            e.cancel = true;
        }

    });
}

function setElement(element){
    if(element.dataField == 'id'){
        element.width= 130
    }
    if(element.dataField == 'logo'){
        element.visible= false
    }
    if(element.dataField.indexOf('Per') > -1){
        console.log(element);
        element.cellTemplate =  function(container, options){
            console.log(options.value)
            let color= 'rgba(255, 0, 0, 0.6)';
            if(options.value > 100){
                color= 'rgba(60, 179, 113, 0.5)';
            }else if(options.value == 'N/A'){
                color = '#ededed';
            }
            return $('<div>', { style: 'background:'+color+' !important; text-align:center; color: #fff;padding:1em;'}).text(options.value);
        }
    }
}

