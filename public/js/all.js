var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},HeroBanner=function(){function t(){new Swiper(".swiper-container",{loop:!0,autoplay:{delay:2500,disableOnInteraction:!1},pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}})}return{initialize:t}}(jQuery),Confirmation=function(){function t(t,e){i.data("form-id","#"+t.attr("id")),i.data("callback-function",function(t,e){switch(e.status){case 422:Utility.displayErrorMessageBox(Object.values(e.responseJSON.errors).join("<br>"));break;case 200:if(e.hasOwnProperty("responseJSON")){var n=e.responseJSON;!0===n.success?(Utility.displaySuccessMessageBox(n.message),n.hasOwnProperty("message")&&$("#result-box").on("closed.zf.reveal",function(){n.redirectedUrl?location.href=n.redirectedUrl:t.trigger("reset")})):Utility.displayErrorMessageBox(n.message)}else Utility.displayJsonResponseError(e,t.attr("action"));break;default:Utility.displayUnknownError(e,t.attr("action"))}}),a.html(t.data("deletion-confirmation-message")+t.data("info")+"?"),n.foundation("open")}function e(){i.click(function(t){t.preventDefault(),n.foundation("close"),Utility.submitForm($(i.data("form-id")),i.data("callback-function"))})}var n=$("#confirmation-box"),a=$("#confirmation-text"),i=$("#yes-answer");return{confirmToDelete:t,initialize:e}}(jQuery),Form=function(){function t(){e.submit(function(t){t.preventDefault(),Utility.submitForm($(this))}),n.submit(function(t){var e=this;t.preventDefault(),_submitEvent=function(){Utility.submitForm($(e))}}),Search.SearchForm.submit(function(t){t.preventDefault(),Search.submitForm($(this))}),Search.ResultDiv.on("submit",a,function(t){t.preventDefault(),Confirmation.confirmToDelete($(this),Search.SearchForm)}),$(".deletion").submit(function(t){t.preventDefault(),Confirmation.confirmToDelete($(this),Search.SearchForm)}),$("#file-image").MultiFile({max:1,accept:"jpg|png|gif"}),$("#image_path").MultiFile({max:10,accept:"jpg|png|gif"}),$("#file_path").MultiFile({max:1,accept:"pdf"}),$(".toggle-password").click(function(){$(this).text("show"===$(this).text()?"hide":"show");var t=$("input[class='form-fill password']");"password"===t.attr("type")?t.attr("type","text"):t.attr("type","password")}),$(".toggle-use-address").change(function(){var t=$("#address");$(this).prop("checked")?t.attr("disabled",!0):t.removeAttr("disabled")});$("#count_message").html("200 remaining"),$("#content_english").keyup(function(){var t=$("#content_english").val().length,e=200-t;$("#count_message").html(e+" remaining")})}var e=$(".submission-form"),n=$(".recaptcha-form"),a=".deletion";return{initialize:t}}(jQuery),Slide=function(){function t(){if($(".slide-thumb, .slide-thumb-give").length){var t=new Swiper(".gallery-top",{spaceBetween:10,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},loop:!0,loopedSlides:4}),e=new Swiper(".gallery-thumbs",{spaceBetween:10,centeredSlides:!0,slidesPerView:"auto",touchRatio:.2,slideToClickedSlide:!0,loop:!0,loopedSlides:4});t.controller.control=e,e.controller.control=t}}return{initialize:t}}(jQuery),Menu=function(){function t(){$(".menu li.active.is-submenu-item").parent().parents().each(function(t,e){$(e).is("li")&&$(e).addClass("active")})}return{initialize:t}}(jQuery),Search=function(){function t(t){a.removeClass("alert"),Utility.submitForm(t,function(t,e){switch(Utility.clearErrors(),e.status){case 422:Utility.displayInvalidInputs(e.responseJSON),a.html("");break;case 200:e.responseJSON.type&&("give"===e.responseJSON.type?(i.empty(),i.html(e.responseJSON.data)):(r.empty(),r.html(e.responseJSON.data))),$("input[name=search]").empty();break;default:var n=e.statusText;e.hasOwnProperty("responseJSON")&&e.responseJSON.hasOwnProperty("message")&&(n=e.responseJSON.message),a.html(Translator.translate("error")+" "+n).addClass("alert")}})}function e(){a.on("click",".pagination a",function(e){e.preventDefault();var n=document.createElement("form");n.setAttribute("method","GET"),n.setAttribute("action",$(this).attr("href")),t($(n))})}function n(){e()}var a=$("#search-result"),i=$("#give-result-box"),r=$("#receive-result-box"),o=$("#search-form");$("#search-form-detail");return{ResultDiv:a,SearchForm:o,initialize:n,submitForm:t}}(jQuery),Translator=function(){function t(){$.holdReady(!0);var t=[];Laravel.languageCodes.forEach(function(e){t.push($.getJSON("/languages/"+e+".json",{timestamp:Date.now()}))}),$.when.apply(this,t).then(function(){for(var t=0;t<arguments.length;t++)n.add({language:Laravel.languageCodes[t],data:arguments[t][0]});n.useLanguage(Laravel.currentLanguage)},function(){Utility.displayErrorMessageBox("Error! Failed to load some translation files, please contact the system administrator.")}).always(function(){$.holdReady(!1)})}function e(t){return n.translate(t)}var n=JSTranslate.i18n({language:Laravel.languageCodes,defaultLanguage:Laravel.defaultLanguage});return{initialize:t,translate:e}}(jQuery),Utility=function(){function t(t,e){a(),m.html(t),m.hasClass("alert")?e||(d.html(Translator.translate("utility.result.success")),m.removeClass("alert")):e&&(d.html(Translator.translate("utility.result.error")),m.addClass("alert")),p.foundation("open")}function e(e){t(e,!1)}function n(e){t(e,!0)}function a(){$(":input").removeClass("error"),$(".alert.help-text").addClass("hide")}function i(t){if(a(),t.hasOwnProperty("errors"))for(var e in t.errors){var n=t.errors[e],i=/^[^.]+\.\d+$/.test(e)?e.replace(".",""):$('[name="'+e+'"]').attr("id"),r="object"===(void 0===n?"undefined":_typeof(n))?n[0]:n;if(i)$("#"+i).addClass("error"),$("#"+i+"-help-text").text(r).removeClass("hide");else{var o=$('[name="'+e+'[]"]').parents(".checkbox-group").attr("id");$("#"+o+"-help-text").text(r).removeClass("hide")}}}function r(t,e){a();var i="<h5>"+Translator.translate("utility.calling_system_administrator")+"</h5>";i+="<strong>"+Translator.translate("utility.error_url")+"</strong> "+e+"<br>",i+="<strong>"+Translator.translate("utility.error_status_code")+"</strong> "+t.status+"<br>",i+="<strong>"+Translator.translate("utility.error_status_text")+"</strong> "+t.statusText+"<br>",n(i)}function o(t,e){t.statusText=Translator.translate("utility.json_response_error"),r(t,e)}function s(t,a){switch(a.status){case 422:case 429:i(a.responseJSON);break;case 200:if(a.hasOwnProperty("responseJSON")){var s=a.responseJSON;!0===s.success?s.hasOwnProperty("message")?(p.on("closed.zf.reveal",function(){s.redirectedUrl?location.href=s.redirectedUrl:t.trigger("reset")}),e(s.message)):s.redirectedUrl&&(location.href=s.redirectedUrl):n(s.message)}else o(a,t.attr("action"));break;default:a.hasOwnProperty("responseJSON")&&a.responseJSON.hasOwnProperty("message")?n(a.responseJSON.message):r(a,t.attr("action"))}}function l(t,e,n){"function"==typeof n?n.apply(this,[t,e]):s(t,e)}function c(t){return"GET"===t.attr("method")?t.serialize():new FormData(t.get(0))}function u(t,e){$.ajax({url:t.attr("action"),method:t.attr("method"),data:c(t),cache:!1,contentType:!1,processData:!1,success:function(n,a,i){l(t,i,e)},error:function(n){l(t,n,e)}})}var p=$("#result-box"),d=$("#result-title"),m=$("#result-text");return{submitForm:u,displaySuccessMessageBox:e,displayErrorMessageBox:n,displayInvalidInputs:i,displayUnknownError:r,displayJsonResponseError:o,clearErrors:a,ResultBoxSelector:p,takeSubmitAction:s}}(jQuery),GiveTab=function(){function t(){$("#give-category > a").click(function(){var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(t){$("#give-result-box").html(t)}})}),$(".give-tab > a").click(function(){var t=$(this).attr("data-url");$("#search-form > input[name=type]").val("give"),$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(t){$("#give-result-box").html(t.data)}})}),$(".receive-tab > a").click(function(){var t=$(this).attr("data-url");$("#search-form > input[name=type]").val("receive"),$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(t){$("#receive-result-box").html(t.data)}})}),$(".give-filter, .organization-filter").change(function(){window.location=$(this).val()})}return{initialize:t}}(jQuery),LoadMore=function(){function t(){$(document).on("click","#loadMore",function(){Utility.clearErrors();var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(e){t?($("#loadMore").remove(),$("#content-list-box").append(e.data)):$("#loadMore").hide()}})}),$(document).on("click","#loadMore-give",function(){Utility.clearErrors();var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(e){t?($(".give-load").remove(),$("#give-result-box > #content-list-box").append(e.data)):$(".give-load").remove()}})}),$(document).on("click","#loadMore-receive",function(){Utility.clearErrors();var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(e){t?($(".give-load").remove(),$("#receive-result-box > #content-list-box").append(e.data)):$(".give-load").remove()}})})}return{initialize:t}}(jQuery),InterestIn=function(){function t(){$(".checkbox-inter").click(function(){var t=$(this).data("value"),e=$(this).data("title"),n='<li class="item-'+t+'">'+e+'</li><input type="hidden" name="fk_interest_in_id[]" id="fk_interest_in_id" class="input-'+t+'" value="'+t+'">';$(this).parent().hasClass("form-checkbox-ed")?($("li").remove(".item-"+t),$("input").remove(".input-"+t)):$("#interest-list").append(n),$(this).parent().toggleClass("form-checkbox-ed")})}return{initialize:t}}(jQuery),Like=function(){function t(){$(document).on("click",".share-like-button",function(t){$(".spinner-box").removeAttr("id"),t.preventDefault();var n=$("#like-action"),a=n.attr("action"),i=n.attr("method"),r=$("#show-like-box");$.ajax({url:a,method:i,data:e(n),cache:!1,contentType:!1,processData:!1,success:function(t){t.data&&(r.empty(),r.append(t.data),$(".spinner-box").attr("id","spinner"))}})})}function e(t){return"GET"===t.attr("method")?t.serialize():new FormData(t.get(0))}return{initialize:t}}(jQuery),Comment=function(){function t(){n.submit(function(t){t.preventDefault(),Utility.clearErrors();var n=$("#show-comment-box");$.ajax({url:$(this).attr("action"),method:$(this).attr("method"),data:e($(this)),cache:!1,contentType:!1,processData:!1,success:function(t){t.data&&(n.empty(),n.append(t.data)),$("#comment_text").val("")},error:function(t){Utility.takeSubmitAction($(this),t)}})})}function e(t){return"GET"===t.attr("method")?t.serialize():new FormData(t.get(0))}var n=$(".comment-form");return{initialize:t}}(jQuery),Counter=function(){function t(){if(e.length){$("#count_title_english").html("90 remaining"),$(e).keyup(function(){var t=e.val().length,n=90-t;$("#count_title_english").html(n+" remaining")})}if(n.length){$("#count_content_english").html("5000 remaining"),$(n).keyup(function(){var t=n.val().length,e=5e3-t;$("#count_content_english").html(e+" remaining")})}if(a.length){$("#count_name").html("90 remaining"),$(a).keyup(function(){var t=a.val().length,e=90-t;$("#count_name").html(e+" remaining")})}if(i.length){$("#count_description_text").html("200 remaining"),$(i).keyup(function(){var t=i.val().length,e=200-t;$("#count_description_text").html(e+" remaining")})}}var e=$("input[id=title_english]"),n=$("#content_english"),a=$("#name"),i=$("#description_text");return{initialize:t}}(jQuery),SpinnerSelector=$("#spinner, #spinner-popup");Translator.initialize(),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$(document).ajaxStart(function(){SpinnerSelector.show()}).ajaxComplete(function(){SpinnerSelector.hide()}).ready(function(){Menu.initialize(),Search.initialize(),Confirmation.initialize(),Form.initialize(),HeroBanner.initialize(),GiveTab.initialize(),LoadMore.initialize(),Slide.initialize(),InterestIn.initialize(),Like.initialize(),Comment.initialize(),Counter.initialize()});
