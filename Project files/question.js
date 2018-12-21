$(document).ready(function(){
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



$('.postform').submit(function(){
  if(tinyMCE.editors[$('#content').attr('id')].getContent()==""){
    $('.posterr').slideDown(100);
    return false;
  }else{
    $('.posterr').slideUp(100);
  }
});


});
