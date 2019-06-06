/**
 * @namespace
 * @desc Handles form management.
 */
const Form = (function() {
  const /**
     * @memberOf Form
     * @access private
     * @desc Submission form
     * @const {jQuery}
     */
    SubmissionForm = $(".submission-form"),
    /**
     * @memberOf Form
     * @access private
     * @desc reCAPTCHA form
     * @const {jQuery}
     */
    RecaptchaForm = $(".recaptcha-form"),
    /**
     * @memberOf Form
     * @access private
     * @desc Deletion confirmation selector
     * @const {string}
     */
    DeletionConfirmationSelector = ".deletion";

  /**
   * @memberOf Form
   * @access public
   * @desc Initialize Form module.
   */
  function initialize() {
    SubmissionForm.submit(function(event) {
      event.preventDefault();

      Utility.submitForm($(this));
    });

    RecaptchaForm.submit(function(event) {
      event.preventDefault();

      _submitEvent = () => {
        Utility.submitForm($(this));
      };
    });

    Search.SearchForm.submit(function(event) {
      event.preventDefault();

      Search.submitForm($(this));
    });

    Search.ResultDiv.on("submit", DeletionConfirmationSelector, function(
      event
    ) {
      event.preventDefault();

      Confirmation.confirmToDelete($(this), Search.SearchForm);
    });

    $(".checkbox-inter").click(function() {
      $(this)
        .parent()
        .toggleClass("form-checkbox-ed");
    });

    $(".form-fileupload").change(function() {
      //var text = $(this).val();
      //alert(text);
      //$(".form-fill").val(text);
      $("#filename").val($(this).val());
    });

    $(".toggle-password").click(function() {
      $(this).text($(this).text() == "show" ? "hide" : "show");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });

    var divImage =
      '<label class="form-file form-file-add">' +
      '<input type="file" id="file" class="form-fileupload">' +
      '<div class="form-file-style">' +
      '<input type="text" class="form-flex form-fill" id="filename">' +
      '<div class="form-flex btn-blue">Browse</div>' +
      '<p class="form-flex show-text">maximun upload file size: 1MB</p>' +
      "</div>" +
      "</label>";
    $("#btn-click-add").click(function() {
      $(".form-file-image").append(divImage);
    });
  }

  return {
    initialize: initialize
  };
})(jQuery);
