var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},HeroBanner=function(){function t(){new Swiper(".swiper-container",{loop:!0,autoplay:{delay:2500,disableOnInteraction:!1},pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}})}return{initialize:t}}(jQuery),Confirmation=function(){function t(t,e){n.data("form-id","#"+t.attr("id")),n.data("callback-function",function(t,r){switch(r.status){case 422:Utility.displayErrorMessageBox(Object.values(r.responseJSON.errors).join("<br>"));break;case 200:if(r.hasOwnProperty("responseJSON")){var a=r.responseJSON;!0===a.success?(Utility.displaySuccessMessageBox(a.message),e.submit()):Utility.displayErrorMessageBox(a.message)}else Utility.displayJsonResponseError(r,t.attr("action"));break;default:Utility.displayUnknownError(r,t.attr("action"))}}),a.html(t.data("deletion-confirmation-message")+t.data("info")+"?"),r.foundation("open")}function e(){n.click(function(t){t.preventDefault(),r.foundation("close"),Utility.submitForm($(n.data("form-id")),n.data("callback-function"))})}var r=$("#confirmation-box"),a=$("#confirmation-text"),n=$("#yes-answer");return{confirmToDelete:t,initialize:e}}(jQuery),Form=function(){function t(){e.submit(function(t){t.preventDefault(),Utility.submitForm($(this))}),r.submit(function(t){var e=this;t.preventDefault(),_submitEvent=function(){Utility.submitForm($(e))}}),Search.SearchForm.submit(function(t){t.preventDefault(),Search.submitForm($(this))}),Search.ResultDiv.on("submit",a,function(t){t.preventDefault(),Confirmation.confirmToDelete($(this),Search.SearchForm)}),$("#file-image").MultiFile({max:1,accept:"jpg|png|gif"}),$("#file-image-multi").MultiFile({max:10,accept:"jpg|png|gif"}),$("#file-pdf").MultiFile({max:1,accept:"pdf"}),$("input[type=file]").change(function(){$("#filename").val($(this).val())}),$(".toggle-password").click(function(){$(this).text("show"===$(this).text()?"hide":"show");var t=$($(this).attr("toggle"));"password"===t.attr("type")?t.attr("type","text"):t.attr("type","password")})}var e=$(".submission-form"),r=$(".recaptcha-form"),a=".deletion";return{initialize:t}}(jQuery),Slide=function(){function t(){if($(".slide-thumb").length){var t=new Swiper(".gallery-top",{spaceBetween:10,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},loop:!0,loopedSlides:4}),e=new Swiper(".gallery-thumbs",{spaceBetween:10,centeredSlides:!0,slidesPerView:"auto",touchRatio:.2,slideToClickedSlide:!0,loop:!0,loopedSlides:4});t.controller.control=e,e.controller.control=t}}return{initialize:t}}(jQuery),Menu=function(){function t(){$(".menu li.active.is-submenu-item").parent().parents().each(function(t,e){$(e).is("li")&&$(e).addClass("active")})}return{initialize:t}}(jQuery),Search=function(){function t(t){a.removeClass("alert"),Utility.submitForm(t,function(t,e){switch(Utility.clearErrors(),e.status){case 422:Utility.displayInvalidInputs(e.responseJSON),a.html("");break;case 200:a.html(e.responseText);break;default:var r=e.statusText;e.hasOwnProperty("responseJSON")&&e.responseJSON.hasOwnProperty("message")&&(r=e.responseJSON.message),a.html(Translator.translate("error")+" "+r).addClass("alert")}})}function e(){a.on("click",".pagination a",function(e){e.preventDefault();var r=document.createElement("form");r.setAttribute("method","GET"),r.setAttribute("action",$(this).attr("href")),t($(r))})}function r(){e()}var a=$("#search-result"),n=$("#search-form");return{ResultDiv:a,SearchForm:n,initialize:r,submitForm:t}}(jQuery),Translator=function(){function t(){$.holdReady(!0);var t=[];Laravel.languageCodes.forEach(function(e){t.push($.getJSON("/languages/"+e+".json",{timestamp:Date.now()}))}),$.when.apply(this,t).then(function(){for(var t=0;t<arguments.length;t++)r.add({language:Laravel.languageCodes[t],data:arguments[t][0]});r.useLanguage(Laravel.currentLanguage)},function(){Utility.displayErrorMessageBox("Error! Failed to load some translation files, please contact the system administrator.")}).always(function(){$.holdReady(!1)})}function e(t){return r.translate(t)}var r=JSTranslate.i18n({language:Laravel.languageCodes,defaultLanguage:Laravel.defaultLanguage});return{initialize:t,translate:e}}(jQuery),Utility=function(){function t(t,e){a(),d.html(t),d.hasClass("alert")?e||(f.html(Translator.translate("utility.result.success")),d.removeClass("alert")):e&&(f.html(Translator.translate("utility.result.error")),d.addClass("alert")),p.foundation("open")}function e(e){t(e,!1)}function r(e){t(e,!0)}function a(){$(":input").removeClass("error"),$(".alert.help-text").addClass("hide")}function n(t){if(a(),t.hasOwnProperty("errors"))for(var e in t.errors){var r=t.errors[e],n=/^[^.]+\.\d+$/.test(e)?e.replace(".",""):$('[name="'+e+'"]').attr("id"),i="object"===(void 0===r?"undefined":_typeof(r))?r[0]:r;if(n)$("#"+n).addClass("error"),$("#"+n+"-help-text").text(i).removeClass("hide");else{var o=$('[name="'+e+'[]"]').parents(".checkbox-group").attr("id");$("#"+o+"-help-text").text(i).removeClass("hide")}}}function i(t,e){a();var n="<h5>"+Translator.translate("utility.calling_system_administrator")+"</h5>";n+="<strong>"+Translator.translate("utility.error_url")+"</strong> "+e+"<br>",n+="<strong>"+Translator.translate("utility.error_status_code")+"</strong> "+t.status+"<br>",n+="<strong>"+Translator.translate("utility.error_status_text")+"</strong> "+t.statusText+"<br>",r(n)}function o(t,e){t.statusText=Translator.translate("utility.json_response_error"),i(t,e)}function s(t,a){switch(a.status){case 422:case 429:n(a.responseJSON);break;case 200:if(a.hasOwnProperty("responseJSON")){var s=a.responseJSON;!0===s.success?s.hasOwnProperty("message")?(p.on("closed.zf.reveal",function(){s.redirectedUrl?location.href=s.redirectedUrl:t.trigger("reset")}),e(s.message)):s.redirectedUrl&&(location.href=s.redirectedUrl):r(s.message)}else o(a,t.attr("action"));break;default:a.hasOwnProperty("responseJSON")&&a.responseJSON.hasOwnProperty("message")?r(a.responseJSON.message):i(a,t.attr("action"))}}function l(t,e,r){"function"==typeof r?r.apply(this,[t,e]):s(t,e)}function c(t){return"GET"===t.attr("method")?t.serialize():new FormData(t.get(0))}function u(t,e){$.ajax({url:t.attr("action"),method:t.attr("method"),data:c(t),cache:!1,contentType:!1,processData:!1,success:function(r,a,n){l(t,n,e)},error:function(r){l(t,r,e)}})}var p=$("#result-box"),f=$("#result-title"),d=$("#result-text");return $(document).ready(function(){$(".share-like-click").click(function(){$("div").toggleClass("is-active")})}),{submitForm:u,displaySuccessMessageBox:e,displayErrorMessageBox:r,displayInvalidInputs:n,displayUnknownError:i,displayJsonResponseError:o,clearErrors:a,ResultBoxSelector:p,takeSubmitAction:s}}(jQuery),GiveCategoryTab=function(){function t(){$("#give-category > a").click(function(){var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(t){$("#give-category-box").html(t)},error:function(t){}})})}return{initialize:t}}(jQuery),LoadMore=function(){function t(){$(document).on("click","#loadMore",function(){var t=$(this).attr("data-url");$.ajax({url:t,method:"GET",cache:!1,contentType:!1,processData:!1,success:function(e){t?($("#loadMore").remove(),$("#content-list-box").append(e.data)):$("#loadMore").hide()}})})}return{initialize:t}}(jQuery),InterestIn=function(){function t(){$(".checkbox-inter").click(function(){var t=$(this).data("value"),e=$(this).data("title"),r='<li class="item-'+t+'">'+e+'</li><input type="hidden" name="fk_interest_in_id[]" id="fk_interest_in_id" class="input-'+t+'" value="'+t+'">';$(this).parent().hasClass("form-checkbox-ed")?($("li").remove(".item-"+t),$("input").remove(".input-"+t)):$("#interest-list").append(r),$(this).parent().toggleClass("form-checkbox-ed")})}return{initialize:t}}(jQuery),SpinnerSelector=$("#spinner, #spinner-popup");Translator.initialize(),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$(document).ajaxStart(function(){SpinnerSelector.show()}).ajaxComplete(function(){SpinnerSelector.hide()}).ready(function(){Menu.initialize(),Search.initialize(),Confirmation.initialize(),Form.initialize(),HeroBanner.initialize(),GiveCategoryTab.initialize(),LoadMore.initialize(),Slide.initialize(),InterestIn.initialize()});
