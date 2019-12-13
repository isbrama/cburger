$(".fileImage").change(function () {
  var image =  $('.fileImage').val();
  image = image.split('\\').pop();
  $('.imageToUpdate').val(image);
});
