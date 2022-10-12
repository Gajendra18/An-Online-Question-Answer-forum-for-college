$(document).ready(function(){
  $(".tile").change(function(){
      if($(this).prop("checked")){
        $(".errorB").css({opacity:"0"});
        $(".tile").prev().find("span").css({opacity:"0"});
        $(this).prev().find("span").css({opacity:"1"});
      }
    });
    $(".semNo").change(function(){
        if($(this).prop("checked")){
          $(".errorS").css({opacity:"0"});
          $(".semNo").prev().find("span").css({opacity:"0"});
          $(this).prev().find("span").css({opacity:"1"});
        }
      });
      $(".myform").submit(function(){
        if (!$("input[name='branch']").is(":checked") && !$("input[name='sem']").is(":checked")){
            $(".errorB").css({opacity:"1"});
            $(".errorS").css({opacity:"1"});
            return false;
        }
        if (!$("input[name='branch']").is(":checked")) {
            $(".errorB").css({opacity:"1"});
            return false;
        }
        if (!$("input[name='sem']").is(":checked")) {
            $(".errorS").css({opacity:"1"});
            return false;
        }

  });
});
