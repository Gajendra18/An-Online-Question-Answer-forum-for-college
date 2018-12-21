$(document).ready(function(){
  $('.askBtn').click(function(){
    $('.askBtn').toggleClass('down');
    if($('.askBtn').hasClass('down')){
        $('.askBtn').prev().text("");
      $('.askBtn').val('Cancel');
    }else{
      $('.askBtn').prev().text("Didn’t find an answer to your question?");

      $('.askBtn').val('Ask Question');
    }
    $('.askQ').slideToggle(300,function(){
      $('#questionTitle').val("");
      tinyMCE.activeEditor.setContent('');
      $('#search_text').val("");
      $('#result').text("");
    });
  });

$('.postform').submit(function(){
  if($('#questionTitle').val() == ""){
    $('.titleErr').slideDown(100);
      return false;
  }
  if (!$("input[name='selectSub']").is(":checked")) {
      $('.subErr').slideDown(100);
      return false;
  }
});


$('#questionTitle').keyup(function(){
  if($('#questionTitle').val().length > 0){
    $('.titleErr').slideUp(100);
  }
});

  load_data();
   function load_data(query)
   {
    $.ajax({
     url:"includes/fetch.php",
     method:"POST",
     data:{query:query},
     success:function(data)
     {
      $('#result').html(data);
     }
    });
   }

   $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
     load_data(search);
    }
    else
    {
     load_data();
    }
   });



 function load_ques(query)
 {
  $.ajax({
   url:"includes/fetchQues.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('.search_result').html(data);
   }
  });
 }

  $('#search_ques').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
     load_ques(search);
    }
    else
    {
     load_ques();
    }
   });


     $(document).on('change', '.searchsub', function() {
       if($(this).prop("checked")){
          $(".searchsub").prev().find("span").css({opacity:"0"});
         $(this).prev().find("span").css({opacity:"1"});
         $('.subErr').slideUp(100);
       }else{
         $(this).prev().find("span").css({opacity:"0"});
       }
});


  tinymce.init({
    selector: "textarea.tinymce",
    resize: false,

    /* theme of the editor */
	theme: "modern",
	skin: "lightgray",

	/* width and height of the editor */
	width: "100%",
	height: 150,

	/* display statusbar */
	statubar: true,

	/* plugin */
	plugins: [
		"advlist autolink link image lists charmap preview hr",
		"searchreplace visualchars insertdatetime",
		"save table contextmenu directionality emoticons paste textcolor"
	],

  // without images_upload_url set, Upload tab won't show up
    images_upload_url: 'upload.php',

    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;

        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');

        xhr.onload = function() {
            var json;

            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }

            json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }

            success(json.location);
        };

        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
    },

  removed_menuitems: 'newdocument',

	/* toolbar */
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview fullpage | forecolor backcolor emoticons",

	/* style */
	style_formats: [
		{title: "Headers", items: [
			{title: "Header 1", format: "h1"},
			{title: "Header 2", format: "h2"},
			{title: "Header 3", format: "h3"},
			{title: "Header 4", format: "h4"},
			{title: "Header 5", format: "h5"},
			{title: "Header 6", format: "h6"}
		]},
		{title: "Inline", items: [
			{title: "Bold", icon: "bold", format: "bold"},
			{title: "Italic", icon: "italic", format: "italic"},
			{title: "Underline", icon: "underline", format: "underline"},
			{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
			{title: "Superscript", icon: "superscript", format: "superscript"},
			{title: "Subscript", icon: "subscript", format: "subscript"},
			{title: "Code", icon: "code", format: "code"}
		]},
		{title: "Blocks", items: [
			{title: "Paragraph", format: "p"},
			{title: "Blockquote", format: "blockquote"},
			{title: "Div", format: "div"},
			{title: "Pre", format: "pre"}
		]},
		{title: "Alignment", items: [
			{title: "Left", icon: "alignleft", format: "alignleft"},
			{title: "Center", icon: "aligncenter", format: "aligncenter"},
			{title: "Right", icon: "alignright", format: "alignright"},
			{title: "Justify", icon: "alignjustify", format: "alignjustify"}
		]}
	]
  });
});
