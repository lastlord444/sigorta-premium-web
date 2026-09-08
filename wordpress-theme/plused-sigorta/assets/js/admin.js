/**
 * Plused Sigorta Admin Media Uploader
 */
jQuery(document).ready(function ($) {
  // Video Uploader
  $(".plused-upload-video-btn").on("click", function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInput = $("#" + button.data("target"));
    var previewContainer = $("#" + button.data("preview"));

    var frame = wp.media({
      title: "Sinematik Video Seç veya Yükle",
      button: { text: "Bu Videoyu Kullan" },
      multiple: false,
      library: { type: "video" },
    });

    frame.on("select", function () {
      var attachment = frame.state().get("selection").first().toJSON();
      targetInput.val(attachment.url);
      if (previewContainer.length) {
        previewContainer.html(
          '<video src="' + attachment.url + '" controls style="max-width:100%; height:auto;"></video>'
        ).show();
      }
    });

    frame.open();
  });

  // Poster Image Uploader
  $(".plused-upload-image-btn").on("click", function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInput = $("#" + button.data("target"));
    var previewContainer = $("#" + button.data("preview"));

    var frame = wp.media({
      title: "Poster Görseli Seç veya Yükle",
      button: { text: "Bu Görseli Kullan" },
      multiple: false,
      library: { type: "image" },
    });

    frame.on("select", function () {
      var attachment = frame.state().get("selection").first().toJSON();
      targetInput.val(attachment.url);
      if (previewContainer.length) {
        previewContainer.html(
          '<img src="' + attachment.url + '" style="max-width:100%; height:auto;" />'
        ).show();
      }
    });

    frame.open();
  });

  // Remove Media
  $(".plused-remove-media-btn").on("click", function (e) {
    e.preventDefault();
    var button = $(this);
    var targetInput = $("#" + button.data("target"));
    var previewContainer = $("#" + button.data("preview"));

    targetInput.val("");
    if (previewContainer.length) {
      previewContainer.html("").hide();
    }
  });
});
