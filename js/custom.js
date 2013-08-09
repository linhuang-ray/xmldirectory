(function($) {
    //delete ite mfuntion 
    $('a.delete_item').click(function(e) {
        var answer = confirm('Do you want to delete this item?');
        if(!answer){
            e.preventDefault();
        }
    });
    
    //submit form and close form btn
    $('a.submit-form-btn').click(function(){
        var p = $(this).parent();
        var mbody = p.siblings('div.modal-body');
        var f = mbody.find('form.form-horizontal');
        f.submit();
    });
    $('a.close-form-btn').click(function(){
       $('div.modal').modal('hide');
    });
    
    //
    //functions for entry page-----------------------------------------------------
    //
    $('a#add_entry').click(function(){
       $('div#modal_form_add').modal('show'); 
    });
    
    $('a.edit_entry_link').click(function(){
        var p = $(this).parent();
       var name = p.siblings('.entry_name').text();
       var lines = name.split(' ');
       var firstname = lines[0];
       var lastname = lines[1];
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
    
    //
    //functions for asset page------------------------------------------------------
    //
    /*add asset form*/
    $('a#add_asset').click(function(){
       $('div#modal_form_add').modal('show'); 
    });
    
    /*edit asset form*/
    $('a.edit_asset_link').click(function(){
        var p = $(this).parent();
       var model = p.siblings('.asset_model').text();
       var serial = p.siblings('.asset_serial_number').text();
       var mac = p.siblings('.asset_mac').text();
       $('form#edit_asset_form').find("input[name='model']").val(model);
       $('form#edit_asset_form').find("input[name='serial_number']").val(serial);
       $('form#edit_asset_form').find("input[name='mac']").val(mac);
       
       var a = p.next().find('a').attr('href');
       var lines = a.split('/');
       var id = lines[lines.length - 1];
       var inputID = "<input type='hidden' name='id' value='"+id+"' >";
       $('form#edit_asset_form').append(inputID);
       
       $('div#modal_form_edit').modal('show'); 
    });
    
    $('a.get_xml_url').click(function(){
       var p = $(this).parent();
       var key = p.siblings('.asset_xmlkey').text();
       var base = $('div#modal_url').find('input[name="base"]').val();
       $('div#modal_url').find('input[name="url"]').val(base + 'index.php/ipphone/xml_directory/' + key);
       
       $('div#modal_url').modal('show');       
    });
    
    $('a#upload_add_asset').click(function(){
       $('div#modal_form_add_upload').modal('show'); 
    });
})(jQuery);
