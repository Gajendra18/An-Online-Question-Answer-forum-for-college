$(document).ready(function(){
  $('.userQ').css({background:"#f5f6fa"});
  $('.password').click(function(){
    $('.password').toggleClass('clicked');
    if($('.password').hasClass('clicked')){
      $('.pwd').css({opacity:'1'});
        $('input[type="password"]').prop( "readonly", false );
        $('input[type="password"]').css({border:'1px solid #111'});
        $('.updbtn').css({display:'flex'});
        $('.cancel1').css({display:"inline-block"});
    }else{
      $('.pwd').css({opacity:'0'});
        $('input[type="password"]').prop( "readonly", true );
        $('.cancel1').css({display:"none"});
    }
  });

  $('.edit').click(function(){
    $('.cancel').css({display:"inline-block"});
    $('input[type="text"]').prop( "disabled", false );
    $('select').prop( "disabled", false );
    $('input').css({border:'1px solid #111'});
    $('.updbtn').css({display:'flex'});
  });

  $('.normal').submit(function(){
    var count = 0;
    var Pcheck=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
    var password =  $('#password').val().trim();
    $('input[type="text"]').each(function(){
      if($(this).val() == ""){
        count++;
        $('.normalerr').text("Please fill all fields!");
      }
      var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var email =  $('#email').val().trim();

      if(!filter.test(email) && email!=""){
      count++;
      $('.normalerr').text("Please enter valid email!");
      }
    });
    if($('.password').hasClass('clicked')){
    if(!Pcheck.test(password)){
    count++;
    $('.normalerr').text("Please enter valid password!");
    }
  }
  if(count > 0){
    $('.normalerr').slideDown();
    return false;
  }else{
    $('.pwd').css({display:"block"});
  }
});

$("#myfile").change(function(){
  $("#pImage").html('<img src="img/loader.gif" alt="" width="30px"/>');
  function changeImg(){
  $('.updateimageForm').ajaxForm({
      url: 'updateimage.php',
      dataType:'json',
      success: function(data){
        $('#navImage').attr('src',data.path);
        $('#navImageSide').attr('src',data.path);
        $('.profile img').attr('src',data.path);
        if(data.error == 0){
          $('.uploadSuccess').fadeIn('slow', function(){
               $('.uploadSuccess').delay(5000).fadeOut();
            });
        }else if (data.error == 1) {
          $('.uploadErr').fadeIn('slow', function(){
               $('.uploadErr').delay(5000).fadeOut();
            });
        }
      }
    }).submit();
  }
  setTimeout(changeImg,5000);
    });



$('.userP').click(function(){
  $('.userP').css({background:"#dcdde1"});
  $('.userQ').css({background:"#f5f6fa"});
  $('.yourQuestions').css({display:"none"});
  $('.information').css({display:"block"});
});

$('.userQ').click(function(){
  $('.userQ').css({background:"#dcdde1"});
  $('.userP').css({background:"#f5f6fa"});
  $('.yourQuestions').css({display:"block"});
  $('.information').css({display:"none"});
});

});
