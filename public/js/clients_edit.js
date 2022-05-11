var url_base = 'img/clients/'
$(function() {

    $('#form_logo').on('change', function (e){
        var input = this;
        var url = $(this).val();
        var nameCasa = $(this).parents('form').find('#form_titcasa').val();
        var form = $(this).parents('form');

        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
        {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
                $.ajax({
                    url: '/clients/upload',
                    data:{imgsrc: e.target.result, nameCasa: nameCasa},
                    dataType: 'json',
                    method: 'post',
                    success: function (res){
                        form.find('#form_newLogo').val(res);
                    },
                    error: function (e){
                        console.log(e)
                    }

                })
            }
            reader.readAsDataURL(input.files[0]);
        }
        else
        {
            alert('formato no permitido')
        }

    })

    $('#form_New_Client').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        console.log(formData);
        sendForm(formData, '/client/save', 'reload');
    })
    $('#form_Edit_Client_Info').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        console.log(formData);
        sendForm(formData, '/client/save', '', 'client');
    })
    $('#form_Edit_Deal_Info').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        sendForm(formData, '/client/deal/save', '', 'deal');

    })
    $('#form_Edit_Invoice_Info').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        sendForm(formData, '/client/invoice/save', '', 'invoice');
    })
    $('#form_Send_Comment').on('click', function (e){
        e.preventDefault();
        let formData = $(this).parents('form').serializeArray();
        sendForm(formData, '/client/comment/add', '', 'comment');

    })

    function sendForm(_data, _url, _action='noting', _msg=''){
        let data = prepareDataForm(_data);
        console.log(data)
        $.ajax({
            url: _url,
            dataType: 'json',
            type: 'post',
            data: data,
            success:function (resp){
                if(resp.success == 1){
                    if(_action=='reload'){
                        document.location.href='/client/edit/'+resp.data.idCasa
                    }else{
                        if(_msg!=''){
                            $('.'+_msg+'-msg').html('<i class="fa fa-check"></i> '+resp.msg);
                        }
                        if(_msg == 'comment'){
                            $('#comment').find('.comments').prepend('<div class="col-md-12 client_comment"> <p class="up"><sup>'+resp.data.fecha+' by '+resp.data.usuario+'</sup></p> <p class="comment"><i class="fa fa-quote-left"></i> '+resp.data.comentario+' <i class="fa fa-quote-right"></i></p> </div>')
                        }
                    }
                }
            },
            error: function (e){

            }
        })
        //alert(msg);
    }



    $('.delete-comment').on('click', function (e){
        e.preventDefault();
        let id = $(this).parents('.client_comment').attr('data-item');
        $.ajax({
            url: "/client/comment/delete",
            dataType: "json",
            type: "post",
            data: {idcomment: id},
            success: function () {

            },
            error: function () {
            },
        });
        $(this).parents('.client_comment').remove()
    });
});
