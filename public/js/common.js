/* type = select,checkbox, etc
    cellInfo (from table)
    cellElement (from table)
    dataArray = jsonArray to compare array(id=>x,  show=> texto a mostrar)
 */

function setComponent(type , cellInfo, cellElement, dataArray, _id_component) {

    console.log(dataArray);
    console.log(type);
    console.log(cellInfo.value)
    switch (type){
        case 'select':
            let a_values = [];
            if (cellInfo.value != undefined) {
                a_values = cellInfo.value.split(',');
            }
            $('<div>')
                .append($('<select>', {
                    id: _id_component,
                    name: _id_component+'[]',
                    class: 'selectpicker col-md-12',
                    multiple: true
                }))
                .appendTo(cellElement);
            for (i = 0; i < dataArray.length; i++) {
                let select = "";
                console.log()
                if ($.inArray(dataArray[i].id.toString(), a_values) > -1) {
                    select = 'selected="selected"';
                }
                $('#'+_id_component).append('<option value="' + dataArray[i].id + '" ' + select + '>' + dataArray[i].show + '</option>')
            }
            $('select').selectpicker();
            $('body').on('change', '#'+_id_component, function (e) {
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

