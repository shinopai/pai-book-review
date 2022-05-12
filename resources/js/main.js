$(function () {
  // flash message
  $("#flash").fadeOut(3500);

  // popup
  // show popup
  var triggers = $(".popup_trigger");
  triggers.each(function () {
    $(this).click(function () {
      $("#overlay" + $(this).data("id")).removeClass("hidden");
    });
  });
  // close popup
  $(".overlay, #close_btn, #close_btn2").click(function () {
    $(".overlay_wrapper").addClass("hidden");
  });
});
