(function($) {
    $('a.delete_item').click(function(e) {
        var answer = confirm('Do you want to delete this item?');
        if(!answer){
            e.preventDefault();
        }
    });

    $('button#add_entry').click(function(){
       $('div#modal_form_add').modal('show'); 
    });
    
    $('a#submit_form_add').click(function(){
        $('form#add_entry_form').submit();
    });
    
    $('a#close_form_add').click(function(){
        $('div#modal_form_add').modal('hide'); 
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
    
    $('a#submit_form_edit').click(function(){
        $('form#edit_entry_form').submit();
    });
    
    $('a#close_form_edit').click(function(){
        $('div#modal_form_edit').modal('hide'); 
    });
})(jQuery);
