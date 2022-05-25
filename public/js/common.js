/* type = select,checkbox, etc
    cellInfo (from table)
    cellElement (from table)
    dataArray = jsonArray to compare array(id=>x,  show=> texto a mostrar)
 */

function setComponent(type , cellInfo, cellElement, dataArray, _id_component) {
    console.log(cellInfo.data);
    let a_values = [];
    switch (type){
        case 'select':
            if(Array.isArray(cellInfo.value)) {
                cellInfo.value = cellInfo.value.join();
            };

            if (cellInfo.value != undefined && cellInfo.value != 0) {
                a_values = cellInfo.value.split(',');
            }
            $('<div>')
                .append($('<select>', {
                    id: _id_component,
                    name: _id_component+'[]',
                    class: 'selectpicker col-md-12',
                    multiple: true,
                    'data-live-search': true
                }))
                .appendTo(cellElement);
            for (i = 0; i < dataArray.length; i++) {
                let select = "";
                if ($.inArray(dataArray[i].id.toString(), a_values) > -1) {
                    select = 'selected="selected"';
                }
                $('#'+_id_component).append('<option value="' + dataArray[i].id + '" ' + select + '>' + dataArray[i].show + '</option>')
            }
            $('select').selectpicker();
            $('body').on('change', '#'+_id_component, function (e) {
                cellInfo.value = $(this).val().join();
                cellInfo.setValue($(this).val().join());
            })
            break;
        case 'selectNoMultiple':
            if(Array.isArray(cellInfo.value)) {
                cellInfo.value = cellInfo.value.join();
            };

            if (cellInfo.value != undefined && cellInfo.value != 0) {
                a_values = cellInfo.value.toString().split(',');
            }
            $('<div>')
                .append($('<select>', {
                    id: _id_component,
                    name: _id_component+'[]',
                    class: 'selectpicker col-md-12',
                    'data-live-search': true
                }))
                .appendTo(cellElement);
            for (i = 0; i < dataArray.length; i++) {
                let select = "";
                if ($.inArray(dataArray[i].id.toString(), a_values) > -1) {
                    select = 'selected="selected"';
                }
                $('#'+_id_component).append('<option value="' + dataArray[i].id + '" ' + select + '>' + dataArray[i].show + '</option>')
            }
            $('select').selectpicker();
            $('body').on('change', '#'+_id_component, function (e) {
                cellInfo.value = $(this).val()
                cellInfo.setValue($(this).val());
            })
            break;
        default:

            break;
    }
}

function prepareDataForm(data) {
    var dataend = [];
    var datavalues = [];
    for (i = 0; i < data.length; i++) {
        fieldName = data[i].name.replace('form[', '');
        fieldName = fieldName.replace(']', '');
        dataend[fieldName] = []
    }
    for (i = 0; i < data.length; i++) {
        fieldName = data[i].name.replace('form[', '');
        fieldName = fieldName.replace(']', '');
        dataend[fieldName].push(data[i].value);
    }
    var dataJson = Object.assign({}, dataend);
    return dataJson;
}

function prepareCardsForm(cellElement, cellInfo){
    let user_campaigns;
    $.ajax({
        url:'user/campaigns/get',
        data: {'userId': cellInfo.row.data.idUsuario},
        method: 'post',
        dataType: 'json',
        success: function (resp){
            user_campaigns = resp
            let _val = JSON.parse(cellInfo.value)
            if(cellInfo.row.data.esGeolocalizada == 1){
               for(i= 0; i< _val.length; i+=2){
                  $('<div>', {class:'client_comment half float-left align-center'})
                      .append($('<img>', {src:'img/flat/24/'+_val[i].toUpperCase()+'.png', class:' float-left p-1'}))
                      .append($('<h6>', {text:' '+user_campaigns[_val[i+1]].titcamp, class:'p-2'}))
                       .appendTo(cellElement)
               }
            }else{
                for(i= 0; i< _val.length; i++){
                    $('<div>', {class:'client_comment half float-left align-center'})
                        .append($('<h6>', {text:' '+user_campaigns[_val[i]].titcamp, class:'p-1'}))
                        .appendTo(cellElement)
                }

            }
        }
    })

}

String.prototype.escapeSpecialChars = function() {
    return this.replace(/\\n/g, "\\n")
        .replace(/\\'/g, "\\'")
        .replace(/\\"/g, '\\"')
        .replace(/\\&/g, "\\&")
        .replace(/\\r/g, "\\r")
        .replace(/\\t/g, "\\t")
        .replace(/\\b/g, "\\b")
        .replace(/\\f/g, "\\f");
};

