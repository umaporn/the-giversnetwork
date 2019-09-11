/**
 * @namespace
 * @desc Handles form management.
 */
const Form = (function () {
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
    SubmissionForm.submit(function (event) {
      event.preventDefault();

      Utility.submitForm($(this));
    });

    RecaptchaForm.submit(function (event) {
      event.preventDefault();

      _submitEvent = () => {
        Utility.submitForm($(this));
      };
    });

    Search.SearchForm.submit(function (event) {
      event.preventDefault();

      Search.submitForm($(this));
    });

    Search.ResultDiv.on("submit", DeletionConfirmationSelector, function (
      event
    ) {
      event.preventDefault();

      Confirmation.confirmToDelete($(this), Search.SearchForm);
    });

    $(".checkbox-inter").click(function () {
      $(this)
        .parent()
        .toggleClass("form-checkbox-ed");
    });

    $("#file-image").MultiFile({
      max: 1,
      accept: 'jpg|png|gif'
    });

    $("#file-image-multi").MultiFile({
      max: 10,
      accept: 'jpg|png|gif'
    });

    $("#file-pdf").MultiFile({
      max: 1,
      accept: 'pdf',
    });

    $(".toggle-password").click(function () {
      $(this).text($(this).text() == "show" ? "hide" : "show");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });


    $(".reg-min").click(function () {
      $(".form-group, .button-reg").slideToggle(180, "linear", function () {
        if ($(this).is(':hidden')) {
          $(".form-head").css("margin-bottom", "0");
          $(".reg-min").find('i').addClass('fa-angle-up');
          $(".reg-min").find('i').removeClass('fa-angle-down');
        } else {
          $(".form-head").css("margin-bottom", "20px");
          $(".reg-min").find('i').removeClass('fa-angle-up');
          $(".reg-min").find('i').addClass('fa-angle-down');
        }
      });
    });
  }

  return {
    initialize: initialize
  };
})(jQuery);
