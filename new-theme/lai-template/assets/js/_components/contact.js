/* Ç®ñ‚Ç¢çáÇÌÇπ */
$("#message").on("keydown keyup keypress change", function() {
  if ($(this).val().length < 1) {
    $("#btn-contact").prop("disabled", true);
    $("#btn-contact").removeClass("active");
  } else {
    $("#btn-contact").prop("disabled", false);
    $("#btn-contact").addClass("active");
  }
});
