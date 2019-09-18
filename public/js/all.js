var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/**
 * @namespace
 * @desc Handles fancybox management.
 */

var Fancybox = function () {
	/**
  * @memberOf Fancybox
  * @access public
  * @desc Initialize Fancybox module.
  * @constant {Object}
  */

	function initialize() {

		'use strict';

		$("[data-fancybox]").fancybox({
			loop: true,
			protect: true,
			buttons: ["slideShow", "zoom", "close"]

		});
		$(".map-click").fancybox({
			buttons: ["download", "zoom", "close"]
		});

		//stickybar
		$('.head-box').on('sticky.zf.stuckto:top', function () {
			$(this).addClass('head-box-size');
		}).on('sticky.zf.unstuckfrom:top', function () {
			$(this).removeClass('head-box-size');
		});

		//nav
		$('.nav-mobile-click').on('toggled.zf.responsiveToggle', function () {
			$(this).toggleClass('nav-mobile-bg');
			$('.head-show, .nav-mobile-click').addClass('nav-animation');
		});

		$('.content-all,.head-show').click(function () {
			if (Foundation.MediaQuery.atLeast('xlarge')) {} else {
				$(".head-show").css("display", "none");
			}
		});

		$('.social-click').on('click', function () {
			$('.social-click-sub').toggle();
		});
	}

	return {
		initialize: initialize
	};
}(jQuery);

/**
 * @namespace
 * @desc Handles hero banner management.
 */

var HeroBanner = function () {
	/**
  * @memberOf HeroBanner
  * @access public
  * @desc Initialize HeroBanner module.
  * @constant {Object}
  */

	function initialize() {
		new Swiper(".swiper-container", {
			loop: true,
			autoplay: {
				delay: 2500,
				disableOnInteraction: false
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			}
		});
	}

	return {
		initialize: initialize
	};
}(jQuery);

/**
 * @namespace
 * @desc Handles all confirmation boxes.
 */
var Confirmation = function () {

	var
	/**
  * @memberOf Confirmation
  * @access private
  * @desc Confirmation box
  * @constant {jQuery}
  */
	ConfirmationBox = $('#confirmation-box'),

	/**
  * @memberOf Confirmation
  * @access private
  * @desc Confirmation text
  * @constant {jQuery}
  */
	ConfirmationText = $('#confirmation-text'),

	/**
  * @memberOf Confirmation
  * @access private
  * @desc Acceptance button
  * @constant {jQuery}
  */
	AcceptanceButton = $('#yes-answer');

	/**
  * @memberOf Confirmation
  * @access public
  * @desc Confirm to delete an object.
  * @param {jQuery} deletionForm - Deletion form
  * @param {jQuery} searchForm - Search form
  */
	function confirmToDelete(deletionForm, searchForm) {

		AcceptanceButton.data('form-id', '#' + deletionForm.attr('id'));
		AcceptanceButton.data('callback-function', function (form, jqXHR) {

			switch (jqXHR.status) {
				case 422:
					Utility.displayErrorMessageBox(Object.values(jqXHR.responseJSON.errors).join('<br>'));
					break;
				case 200:
					if (jqXHR.hasOwnProperty('responseJSON')) {

						var result = jqXHR.responseJSON;

						if (result.success === true) {

							Utility.displaySuccessMessageBox(result.message);

							if (result.hasOwnProperty('message')) {
								$('#result-box').on('closed.zf.reveal', function () {
									if (result.redirectedUrl) {
										location.href = result.redirectedUrl;
									} else {
										form.trigger('reset');
									}
								});
							}
							//searchForm.submit();
						} else {

							Utility.displayErrorMessageBox(result.message);
						}
					} else {
						Utility.displayJsonResponseError(jqXHR, form.attr('action'));
					}
					break;
				default:
					Utility.displayUnknownError(jqXHR, form.attr('action'));
					break;
			}
		});

		ConfirmationText.html(deletionForm.data('deletion-confirmation-message') + deletionForm.data('info') + '?');

		ConfirmationBox.foundation('open');
	}

	/**
  * @memberOf Confirmation
  * @access public
  * @desc Initialize Confirmation module.
  */
	function initialize() {

		AcceptanceButton.click(function (event) {

			event.preventDefault();

			ConfirmationBox.foundation('close');

			Utility.submitForm($(AcceptanceButton.data('form-id')), AcceptanceButton.data('callback-function'));
		});
	}

	return {
		confirmToDelete: confirmToDelete,
		initialize: initialize
	};
}(jQuery);
/**
 * @namespace
 * @desc Handles form management.
 */
var Form = function () {
	var /**
      * @memberOf Form
      * @access private
      * @desc Submission form
      * @const {jQuery}
      */
	SubmissionForm = $('.submission-form'),

	/**
  * @memberOf Form
  * @access private
  * @desc reCAPTCHA form
  * @const {jQuery}
  */
	RecaptchaForm = $('.recaptcha-form'),

	/**
  * @memberOf Form
  * @access private
  * @desc Deletion confirmation selector
  * @const {string}
  */
	DeletionConfirmationSelector = '.deletion',


	/**
  * @memberOf Form
  * @access private
  * @desc TinyMCE form
  * @const {jQuery}
  */
	TinyMCEForm = $('.tinyMCE-form');

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
			var _this = this;

			event.preventDefault();

			_submitEvent = function _submitEvent() {
				Utility.submitForm($(_this));
			};
		});

		TinyMCEForm.submit(function (event) {
			tinyMCE.triggerSave();
			event.preventDefault();
			Utility.submitForm($(this));
		});

		Search.SearchForm.submit(function (event) {
			event.preventDefault();
			Search.submitForm($(this));
		});

		Search.ResultDiv.on('submit', DeletionConfirmationSelector, function (event) {
			event.preventDefault();
			Confirmation.confirmToDelete($(this), Search.SearchForm);
		});

		$('.deletion').submit(function (event) {
			event.preventDefault();
			Confirmation.confirmToDelete($(this), Search.SearchForm);
		});

		$('#file-image').MultiFile({
			max: 1,
			accept: 'jpg|png|gif'
		});

		$('#image_path').MultiFile({
			max: 10,
			accept: 'jpg|png|gif'
		});

		$('#image_path_thai').MultiFile({
			max: 10,
			accept: 'jpg|png|gif'
		});

		$('#image_path_english').MultiFile({
			max: 10,
			accept: 'jpg|png|gif'
		});

		$('#file_path').MultiFile({
			max: 1,
			accept: 'pdf'
		});

		$('.toggle-password').click(function () {
			$(this).text($(this).text() === 'show' ? 'hide' : 'show');
			var input = $('input[class=\'form-fill password\']');

			if (input.attr('type') === 'password') {
				input.attr('type', 'text');
			} else {
				input.attr('type', 'password');
			}
		});

		$('.toggle-use-address').change(function () {

			var address = $('#address');

			if ($(this).prop('checked')) {
				address.attr('disabled', true);
			} else {
				address.removeAttr('disabled');
			}
		});

		var text_max = 200;
		$('#count_message').html(text_max + ' remaining');
		$('#content_english').keyup(function () {
			var text_length = $('#content_english').val().length;
			var text_remaining = text_max - text_length;

			$('#count_message').html(text_remaining + ' remaining');
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
}(jQuery);

/**
 * @namespace
 * @desc Handles slide management.
 */
var Slide = function () {
	/**
  * @memberOf Slide
  * @access public
  * @desc Initialize Slide module.
  * @constant {Object}
  */
	function initialize() {
		if ($('.slide-thumb, .slide-thumb-give').length) {

			var galleryTop = new Swiper('.gallery-top', {
				spaceBetween: 10,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				loop: true,
				loopedSlides: 4
			});

			var galleryThumbs = new Swiper('.gallery-thumbs', {
				spaceBetween: 10,
				centeredSlides: true,
				slidesPerView: 'auto',
				touchRatio: 0.2,
				slideToClickedSlide: true,
				loop: true,
				loopedSlides: 4
			});

			galleryTop.controller.control = galleryThumbs;
			galleryThumbs.controller.control = galleryTop;
		}
	}

	return {
		initialize: initialize
	};
}(jQuery);

/**
 * @namespace
 * @desc Handles menu management.
 */
var Menu = function () {

	/**
  * @memberOf Menu
  * @access public
  * @desc Initialize Menu module.
  */
	function initialize() {

		$('.menu li.active.is-submenu-item').parent().parents().each(function (index, element) {
			if ($(element).is('li')) {
				$(element).addClass('active');
			}
		});
	}

	return {
		initialize: initialize
	};
}(jQuery);
/**
 * @namespace
 * @desc Handles search form management.
 */
var Search = function () {

	var
	/**
  * @memberOf Search
  * @access public
  * @desc div element to display a search result
  * @constant {jQuery}
  */
	ResultDiv = $('#search-result'),

	/**
  * @memberOf Search
  * @access public
  * @desc div element to display a search result
  * @constant {jQuery}
  */
	GiveResultDiv = $('#give-result-box'),


	/**
  * @memberOf Search
  * @access public
  * @desc div element to display a search result
  * @constant {jQuery}
  */
	ReceiveResultDiv = $('#receive-result-box'),

	/**
  * @memberOf Search
  * @access public
  * @desc Search form
  * @const {jQuery}
  */
	SearchForm = $('#search-form'),

	/**
  * @memberOf Search
  * @access public
  * @desc Search form
  * @const {jQuery}
  */
	SearchDetailForm = $('#search-form-detail');

	/**
  * @memberOf Search
  * @access public
  * @desc Submit a search form.
  * @param {jQuery} form - Search form
  */
	function submitForm(form) {

		ResultDiv.removeClass('alert');

		Utility.submitForm(form, function (form, jqXHR) {

			Utility.clearErrors();

			switch (jqXHR.status) {
				case 422:
					Utility.displayInvalidInputs(jqXHR.responseJSON);
					ResultDiv.html('');
					break;
				case 200:

					if (jqXHR.responseJSON.type) {
						if (jqXHR.responseJSON.type === 'give') {
							GiveResultDiv.empty();
							GiveResultDiv.html(jqXHR.responseJSON.data);
						} else {
							ReceiveResultDiv.empty();
							ReceiveResultDiv.html(jqXHR.responseJSON.data);
						}
					} else {
						ResultDiv.empty();
						ResultDiv.html(jqXHR.responseJSON.data);
					}

					$('input[name=search]').empty();
					break;
				default:
					var message = jqXHR.statusText;

					if (jqXHR.hasOwnProperty('responseJSON') && jqXHR.responseJSON.hasOwnProperty('message')) {
						message = jqXHR.responseJSON.message;
					}

					ResultDiv.html(Translator.translate('error') + ' ' + message).addClass('alert');
					break;
			}
		});
	}

	/**
  * @memberOf Search
  * @access private
  * @desc Bind pagination.
  */
	function bindPagination() {

		ResultDiv.on('click', '.pagination a', function (event) {

			event.preventDefault();

			var form = document.createElement('form');
			form.setAttribute('method', 'GET');
			form.setAttribute('action', $(this).attr('href'));

			submitForm($(form));
		});
	}

	/**
  * @memberOf Search
  * @access public
  * @desc Initialize search module.
  */
	function initialize() {

		bindPagination();
	}

	return {
		ResultDiv: ResultDiv,
		SearchForm: SearchForm,
		initialize: initialize,
		submitForm: submitForm
	};
}(jQuery);
/**
 * @namespace
 * @desc JavaScript translator
 */
var Translator = function () {

	/**
  * @memberOf Translator
  * @access private
  * @desc JavaScript Translator
  * @constant {Object}
  */
	var JSTranslator = JSTranslate.i18n({
		language: Laravel.languageCodes,
		defaultLanguage: Laravel.defaultLanguage
	});

	/**
  * @memberOf Translator
  * @access public
  * @desc Initialize JavaScript translator.
  */
	function initialize() {

		$.holdReady(true);

		var jsonFiles = [],
		    errorMessage = 'Error! Failed to load some translation files, please contact the system administrator.';

		Laravel.languageCodes.forEach(function (languageCode) {
			jsonFiles.push($.getJSON('/languages/' + languageCode + '.json', { timestamp: Date.now() }));
		});

		$.when.apply(this, jsonFiles).then(function () {

			for (var index = 0; index < arguments.length; index++) {
				JSTranslator.add({
					language: Laravel.languageCodes[index],
					data: arguments[index][0]
				});
			}

			JSTranslator.useLanguage(Laravel.currentLanguage);
		}, function () {
			Utility.displayErrorMessageBox(errorMessage);
		}).always(function () {
			$.holdReady(false);
		});
	}

	/**
  * @memberOf Translator
  * @access public
  * @desc Translate text with a specific key.
  * @param {String} key - Translation key
  * @return {String} Translated text
  */
	function translate(key) {
		return JSTranslator.translate(key);
	}

	return {
		initialize: initialize,
		translate: translate
	};
}(jQuery);
/**
 * @namespace
 * @desc Handles all utility functions.
 */
var Utility = function () {
	var /**
      * @memberOf Utility
      * @access public
      * @desc Result box
      * @constant {jQuery}
      */
	ResultBoxSelector = $('#result-box'),

	/**
  * @memberOf Utility
  * @access private
  * @desc Result title
  * @constant {jQuery}
  */
	ResultTitleSelector = $('#result-title'),

	/**
  * @memberOf Utility
  * @access private
  * @desc Result text
  * @constant {jQuery}
  */
	ResultTextSelector = $('#result-text');

	/**
  * @memberOf Utility
  * @access private
  * @desc Display a result message box.
  * @param {String} message - Result message
  * @param {Boolean} isError - Error flag ( true = error, false = not error )
  */
	function displayMessageBox(message, isError) {
		clearErrors();

		ResultTextSelector.html(message);

		if (ResultTextSelector.hasClass('alert')) {
			if (!isError) {
				ResultTitleSelector.html(Translator.translate('utility.result.success'));
				ResultTextSelector.removeClass('alert');
			}
		} else {
			if (isError) {
				ResultTitleSelector.html(Translator.translate('utility.result.error'));
				ResultTextSelector.addClass('alert');
			}
		}

		ResultBoxSelector.foundation('open');
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Display a success message box.
  * @param {String} successMessage - Success message
  */
	function displaySuccessMessageBox(successMessage) {
		displayMessageBox(successMessage, false);
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Display an error message box.
  * @param {String} errorMessage - Error message
  */
	function displayErrorMessageBox(errorMessage) {
		displayMessageBox(errorMessage, true);
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Clear all errors.
  */
	function clearErrors() {
		$(':input').removeClass('error');
		$('.alert.help-text').addClass('hide');
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Display invalid inputs.
  * @param {JSON} error - Input error list
  */
	function displayInvalidInputs(error) {
		clearErrors();

		if (error.hasOwnProperty('errors')) {
			for (var name in error['errors']) {
				var errorMessage = error['errors'][name],
				    id = /^[^.]+\.\d+$/.test(name) ? name.replace('.', '') : $('[name="' + name + '"]').attr('id'),
				    errorText = (typeof errorMessage === "undefined" ? "undefined" : _typeof(errorMessage)) === 'object' ? errorMessage[0] : errorMessage;

				if (id) {
					$('#' + id).addClass('error');
					$('#' + id + '-help-text').text(errorText).removeClass('hide');
				} else {
					var parentId = $('[name="' + name + '[]"]').parents('.checkbox-group').attr('id');
					$('#' + parentId + '-help-text').text(errorText).removeClass('hide');
				}
			}
		}
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Display an unknown error.
  * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
  * @param {String} url - The URL that occurs the error
  */
	function displayUnknownError(jqXHR, url) {
		clearErrors();

		var errorText = '<h5>' + Translator.translate('utility.calling_system_administrator') + '</h5>';
		errorText += '<strong>' + Translator.translate('utility.error_url') + '</strong> ' + url + '<br>';
		errorText += '<strong>' + Translator.translate('utility.error_status_code') + '</strong> ' + jqXHR.status + '<br>';
		errorText += '<strong>' + Translator.translate('utility.error_status_text') + '</strong> ' + jqXHR.statusText + '<br>';

		displayErrorMessageBox(errorText);
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Display an error message box when the data type is not JSON.
  * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
  * @param {String} url - The URL that occurs the error
  */
	function displayJsonResponseError(jqXHR, url) {
		jqXHR.statusText = Translator.translate('utility.json_response_error');

		displayUnknownError(jqXHR, url);
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Take a submitting action which only accepts json data type.
  * @param {jQuery} form - Form
  * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
  * > If jqXHR.status is not 422 or 429 then the jqXHR.responseJSON format must have the following keys below.
  *
  * Key | Explanation
  * - | -
  * **success** {Boolean} | It is a success status which it can be true or false.
  * **message** {String} | It is a response message which it can be an error message or a success message. *This is an optional key for a success case.*
  * **redirectedUrl** {String} | It is a redirected URL which the browser will be redirected to if success status is true. *This is an optional key.*
  *
  * **Note:** jqXHR.status is HTTP status code.
  */
	function takeSubmitAction(form, jqXHR) {
		switch (jqXHR.status) {
			case 422:
			case 429:
				displayInvalidInputs(jqXHR.responseJSON);
				break;
			case 200:
				if (jqXHR.hasOwnProperty('responseJSON')) {
					var result = jqXHR.responseJSON;

					if (result.success === true) {
						if (result.hasOwnProperty('message')) {
							ResultBoxSelector.on('closed.zf.reveal', function () {

								if (result.redirectedUrl) {
									location.href = result.redirectedUrl;
								} else {
									form.trigger('reset');
								}
							});

							displaySuccessMessageBox(result.message);
						} else if (result.redirectedUrl) {
							location.href = result.redirectedUrl;
						}
					} else {
						displayErrorMessageBox(result.message);
					}
				} else {
					displayJsonResponseError(jqXHR, form.attr('action'));
				}
				break;
			default:
				if (jqXHR.hasOwnProperty('responseJSON') && jqXHR.responseJSON.hasOwnProperty('message')) {
					displayErrorMessageBox(jqXHR.responseJSON.message);
				} else {
					displayUnknownError(jqXHR, form.attr('action'));
				}
				break;
		}
	}

	/**
  * @memberOf Utility
  * @access private
  * @desc Run a callback function.
  * @param {jQuery} form - Form
  * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
  * @param {function} [callbackFunction] - Callback function
  */
	function runCallbackFunction(form, jqXHR, callbackFunction) {
		if (typeof callbackFunction === 'function') {
			callbackFunction.apply(this, [form, jqXHR]);
		} else {
			takeSubmitAction(form, jqXHR);
		}
	}

	/**
  * @memberOf Utility
  * @access private
  * @desc Get form data.
  * @param {jQuery} form - Form
  * @return {Array|Object} Form data
  */
	function getFormData(form) {
		return form.attr('method') === 'GET' ? form.serialize() : new FormData(form.get(0));
	}

	/**
  * @memberOf Utility
  * @access public
  * @desc Submit a form and take an action.
  * @param {jQuery} form - Form
  * @param {function} [callbackFunction] - Callback function
  */
	function submitForm(form, callbackFunction) {
		$.ajax({
			url: form.attr('action'),
			method: form.attr('method'),
			data: getFormData(form),
			cache: false,
			contentType: false,
			processData: false,
			success: function success(result, statusText, jqXHR) {
				runCallbackFunction(form, jqXHR, callbackFunction);
			},
			error: function error(jqXHR) {
				runCallbackFunction(form, jqXHR, callbackFunction);
			}
		});
	}

	return {
		submitForm: submitForm,
		displaySuccessMessageBox: displaySuccessMessageBox,
		displayErrorMessageBox: displayErrorMessageBox,
		displayInvalidInputs: displayInvalidInputs,
		displayUnknownError: displayUnknownError,
		displayJsonResponseError: displayJsonResponseError,
		clearErrors: clearErrors,
		ResultBoxSelector: ResultBoxSelector,
		takeSubmitAction: takeSubmitAction
	};
}(jQuery);

/**
 * @namespace
 * @desc Handles video management.
 */

var Video = function () {
	/**
  * @memberOf Video
  * @access public
  * @desc Initialize Video module.
  * @constant {Object}
  */

	function initialize() {
		$('.play').click(function (event) {
			event.preventDefault();
			$(".video-js").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/2xs4dAXzw40?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
			$(this).hide();
		});
	}

	return {
		initialize: initialize
	};
}(jQuery);

/**
 * @desc Spinner selector
 * @const {jQuery}
 */
var SpinnerSelector = $('#spinner, #spinner-popup');

Translator.initialize();

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ajaxStart(function () {
	SpinnerSelector.show();
}).ajaxComplete(function () {
	SpinnerSelector.hide();
}).ready(function () {
	/** Initialize all JavaScript modules. */
	Menu.initialize();
	Search.initialize();
	Confirmation.initialize();
	Form.initialize();
	HeroBanner.initialize();
	GiveTab.initialize();
	LoadMore.initialize();
	Slide.initialize();
	InterestIn.initialize();
	Like.initialize();
	Comment.initialize();
	Counter.initialize();
	TinyMCE.initialize();
	Fancybox.initialize();
	Video.initialize();
});
