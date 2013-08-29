(function($) {
    //delete ite mfuntion 
    $('a.delete_item').click(function(e) {
        var answer = confirm('Do you want to delete this item?');
        if(!answer){
            e.preventDefault();
        }
    });
    //active and deactive link
    $('a.activate').click(function(e){
        var answer = confirm('Do you want to activate this user?');
        if(!answer){
            e.preventDefault();
        }
    });
    $('a.deactivate').click(function(e){
        var answer = confirm('Do you want to deactivate this user?');
        if(!answer){
            e.preventDefault();
        }
    });
    //upload btn
    $('a.upload_add').click(function(){
       $('div#modal_form_add_upload').modal('show'); 
    });
    //submit form and close form btn
    $('a.submit-form-btn').click(function(){
        var p = $(this).parent();
        var mbody = p.siblings('div.modal-body');
        var f = mbody.find('form.form-horizontal');
        f.submit();
    });
    $('a.close-form-btn').click(function(){
       var p = $(this).parent();
        var mbody = p.parents('div.modal');
        mbody.modal('hide');
        return false;
    });
    
    $('div.modal').on('hidden.bs.modal', function(){
        $.each($('input[type="text"]'), function(a){
            if(a.attr('name') !== 'url'){
                a.val('');
            }
        });
       $('input[type="password"]').val('');
       $('span.message').text('');
    });
    //
    //functions for entry page-----------------------------------------------------
    //
    $('a#add_entry').click(function(){
       $('div#modal_form_add').modal('show'); 
    });
    $('a#add_user').click(function(){
        $('div#modal_form_add').modal('show'); 
        $('div#modal_form_add').find('a.submit-form-btn').addClass('disabled').bind('click', false);
    });
    
    $('a.edit_entry_link').click(function(){
        var p = $(this).parent();
       var firstname = p.siblings('.entry_first_name').text();
       var lastname = p.siblings('.entry_last_name').text();
       var telephone = p.siblings('.entry_telephone').text();
       $('form#edit_entry_form').find("input[name='first_name']").val(firstname);
       $('form#edit_entry_form').find("input[name='last_name']").val(lastname);
       $('form#edit_entry_form').find("input[name='telephone']").val(telephone);
       
       var a = p.next().find('a').attr('href');
       var lines = a.split('/');
       var id = lines[lines.length - 1];
       var inputhidden = "<input type='hidden' name='id' value='"+id+"' >";
       $('form#edit_entry_form').append(inputhidden);
       
       $('div#modal_form_edit').modal('show'); 
       
    });
    
    //get the xml directory link
    $('a.get_xml_url').click(function(){
       $('div#modal_url').modal('show');       
    });
    
    
    /*-edit user--*/
    $('a.edit_user_link').click(function(){
        var p = $(this).parent();
        var first_name = p.siblings('.user_first_name').text();
        var last_name = p.siblings('.user_last_name').text();
        var email = p.siblings('.user_email').text();
        var company = p.siblings('.user_company').text();
        var phone = p.siblings('.user_phone').text();
        var groups = p.siblings('.user_groups').text();
        
        $('form#edit_user_form').find("input[name='first_name']").val(first_name);
        $('form#edit_user_form').find("input[name='last_name']").val(last_name);
        $('form#edit_user_form').find("input[name='email']").val(email);
        $('form#edit_user_form').find("input[name='company']").val(company);
        $('form#edit_user_form').find("input[name='phone']").val(phone);
        
        var group = groups.split(' ');
        $('form#edit_user_form').find("input[name='groups[]']").prop('checked', false);
        for(var i=0; i< group.length; i++){
            if(group[i] === 'admin'){
                $('form#edit_user_form').find("input#admin").prop('checked', true);
            }
            if(group[i] === 'members'){
                $('form#edit_user_form').find("input#members").prop('checked', true);
            }
        }
        
        var a = p.next().find('a').attr('href');
       var lines = a.split('/');
       var id = lines[lines.length - 1];
       var inputhidden = "<input type='hidden' name='id' value='"+id+"' >";
       $('form#edit_user_form').append(inputhidden);
       
       $('div#modal_form_edit').modal('show'); 
    });
    
    
    $('input[name="password"]').keyup(function(){
        var p = $(this).parent().parent();
        var pn = p.next('.form-group');
        var pp = p.parents('.form-horizontal');
        var match = pn.find('input[name="password_confirm"]');
        var submit = pp.parent().next().find('a.submit-form-btn');
        var text = $(this).parent().next('span.message');
        if($(this).val() !== match.val()){
            submit.addClass('disabled');
            submit.bind('click', false);
            text.removeClass('text-success').addClass('text-danger').text('Not Match');
        }else{
            submit.removeClass('disabled');
            submit.unbind('click', false);
            if($(this).val() !== ''){
                text.removeClass('text-danger').addClass('text-success').text('Match');
            }else{
                if(pp.attr('id') === 'create_user_form'){
                    submit.addClass('disabled');
                    submit.bind('click', false);
                    text.removeClass('text-success').addClass('text-danger').text('Empty');
                }else{
                    text.removeClass('text-danger').text('');
                }
            }
        }
    });
    
    $('input[name="password_confirm"]').keyup(function(){
        var p = $(this).parent().parent();
        var pv = p.prev('.form-group');
        var pp = p.parents('.form-horizontal');
        var match = pv.find('input[name="password"]');
        var submit = pp.parent().next().find('a.submit-form-btn');
        var text = pv.find('span.message');
        if($(this).val() !== match.val()){
            submit.addClass('disabled');
            submit.bind('click', false);
            text.removeClass('text-success').addClass('text-danger').text('Not Match');
        }else{
            submit.removeClass('disabled');
            submit.unbind('click', false);
            if($(this).val() !== ''){
                text.removeClass('text-danger').addClass('text-success').text('Match');
            }else{
                if(pp.attr('id') === 'create_user_form'){
                    submit.addClass('disabled');
                    submit.bind('click', false);
                    text.removeClass('text-success').addClass('text-danger').text('Empty');
                }else{
                    text.removeClass('text-danger').text('');
                }
            }
        }
    });
})(jQuery);
