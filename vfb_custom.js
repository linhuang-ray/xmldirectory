/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
    if($.trim($("label[for='vfb-11']").text()) === "If yes, please enter the URL here:"){
        $('li#item-vfb-11').hide();
        $('li#item-vfb-15').hide();
    }
    
    $('input#vfb-10-2').change(function(){
           if(this.checked()){
               $('li#item-vfb-11').show();
           } else{
               $('li#item-vfb-11').hide();
           }
        });
        
        $('input#vfb-14-7').change(function(){
           if(this.checked()){
               $('li#item-vfb-15').show();
           } else{
               $('li#item-vfb-15').hide();
           }
        });
    
    if($.trim($("label[for='vfb-19']").text()) === "What look and feel do you want your website to have?"){
        $('li#item-vfb-19').removeClass('vfb-auto-column').addClass('vfb-five-column');
    }
})(jQuery);

