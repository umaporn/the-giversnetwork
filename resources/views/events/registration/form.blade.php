<form class="recaptcha-form form-reg" name="register" method="post" action="{{ route('events.registration.store') }}">

    {{ csrf_field() }}

    <a class="reg-min"><i class="fas fa-angle-down"></i></a>
    <h3 class="form-head">@lang('event_registration.form_heading')</h3>
    <div class="form-group">
        <input type="text" id="first_name" name="first_name" class="form-control margin-0" placeholder="@lang('event_registration.form_first_name')">
        <label for="name" class="form-control-place">@lang('event_registration.form_first_name')</label>
        <p id="first_name-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="text" id="last_name" name="last_name" class="form-control margin-0"
               placeholder="@lang('event_registration.form_last_name')">
        <label for="surname" class="form-control-place">@lang('event_registration.form_last_name')</label>
        <p id="last_name-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="text" id="organization" name="organization" class="form-control margin-0"
               placeholder="@lang('event_registration.form_organization')">
        <label for="organization" class="form-control-place">@lang('event_registration.form_organization')</label>
        <p id="organization-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="text" id="phone" name="phone" class="form-control margin-0" placeholder="Phone">
        <label for="phone" class="form-control-place">@lang('event_registration.form_phone')</label>
        <p id="phone-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="email" id="email" name="email" class="form-control margin-0" placeholder="Email">
        <label for="email" class="form-control-place">@lang('event_registration.form_email')</label>
        <p id="email-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <select name="social_challenge" id="social_challenge" class="form-control-select">
            <option value="">@lang('event_registration.form_social_challenge')</option>
            @foreach( __('event_registration.social_challenge') as $item )
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
        <p id="social_challenge-help-text" class="alert help-text help-text hide"></p>
    </div>

    @captcha

    <input type="hidden" name="utm_source" value="{{ \Request::get('utm_source') }}">
    <input type="hidden" name="utm_medium" value="{{ \Request::get('utm_medium') }}">
    <input type="hidden" name="utm_content" value="{{ \Request::get('utm_content') }}">
    <input type="hidden" name="utm_campaign" value="{{ \Request::get('utm_campaign') }}">
    <input type="hidden" name="utm_term" value="{{ \Request::get('utm_term') }}">

    <button type="submit" class="button-reg" id="register-btn">@lang('event_registration.register_button')</button>
    {{--<div class="reveal" id="result-box" data-reveal style="border-radius: 5px;">
        <button class="close-button" data-close aria-label="Close modal" type="button"
                onclick="window.location.reload();">
            <span>&times;</span>
        </button>
    </div>--}}
</form>