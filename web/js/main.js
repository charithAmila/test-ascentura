/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){ 
    
$('form#Tag').on('beforeSubmit', function(e) 
{
    var form = $(this);
    $.post(
        'index.php?r=tag/create', // serialize Yii2 form
        form.serialize()
    ).done(function(result) {
          if(result)
          {
              $.pjax.reload({container:'#boxPajax'});
              $(form).trigger("reset");
              $(form).focusout();
          } 
    }).fail(function(){
            console.log("server error");
    });
    return false
});
});

