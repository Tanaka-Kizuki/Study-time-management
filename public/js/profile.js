$('#edit_img').on('change', function (e) {
     var reader = new FileReader();
     reader.onload = function (e) {
         $("#img_preview").attr('src', e.target.result);
     }
     reader.readAsDataURL(e.target.files[0]);
})

$('#edit_icon').on('change', function (e) {
     var reader = new FileReader();
     reader.onload = function (e) {
         $("#icon_preview").attr('src', e.target.result);
     }
     reader.readAsDataURL(e.target.files[0]);
})

$(function() {
    $("#edit_button").click(function() {
      // cssで背景色を切り替え
      $("#edit").toggleClass("action");
      $('.black_filter').toggleClass("action");
    });
  });