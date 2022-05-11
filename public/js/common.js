/* type = select,checkbox, etc
    cellInfo (from table)
    cellElement (from table)
    dataArray = jsonArray to compare array(id=>x,  show=> texto a mostrar)
 */

function setComponent(type , cellInfo, cellElement, dataArray) {
    console.log(dataArray);
    console.log(type);
    console.log(cellInfo.value)
    switch (type){
        case 'select':
            if (cellInfo.value != undefined) {
                a_values = cellInfo.value.split(',');
            }
            $('<div>')
                .append($('<select>', {
                    id: 'campaigns',
                    name: 'campaigns[]',
                    class: 'selectpicker col-md-12',
                    multiple: true
                }))
                .appendTo(cellElement);
            for (i = 0; i < dataArray.length; i++) {
                let select = "";
                if ($.inArray(dataArray[i].id.toString(), a_values) > -1) {
                    select = 'selected="selected"';
                }
                $('#campaigns').append('<option value="' + dataArray[i].id + '" ' + select + '>' + dataArray[i].show + '</option>')
            }
            $('select').selectpicker();
            $('body').on('change', '#campaigns', function (e) {
                cellInfo.value = $(this).val().join();
                console.log(cellInfo.value)
                cellInfo.setValue($(this).val().join());
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
