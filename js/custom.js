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
    
    //
    //functions for entry page-----------------------------------------------------
    //
    $('a#add_entry').click(function(){
       $('div#modal_form_add').modal('show'); 
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
})(jQuery);
