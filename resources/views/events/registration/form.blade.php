<form class="form-reg" name="register" method="post" action="">
    <a class="reg-min"><i class="fas fa-angle-down"></i></a>
    <h3 class="form-head">@lang('event_registration.form_heading')</h3>
    <div class="form-group">
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="@lang('event_registration.form_first_name')">
        <label for="name" class="form-control-place">@lang('event_registration.form_first_name')</label>
        <p id="first_name-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="text" id="last_name" name="last_name" class="form-control"
               placeholder="@lang('event_registration.form_last_name')">
        <label for="surname" class="form-control-place">@lang('event_registration.form_last_name')</label>
        <p id="last_name-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
        <label for="phone" class="form-control-place">@lang('event_registration.form_phone')</label>
        <p id="phone-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        <label for="email" class="form-control-place">@lang('event_registration.form_email')</label>
        <p id="email-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <select name="gender" id="gender" class="form-control-select">
            <option value="">@lang('event_registration.form_gender')</option>
            @foreach( __('event_registration.gender') as $gender )
                <option value="{{ $gender }}">{{ $gender }}</option>
            @endforeach
        </select>
        <p id="gender-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <select name="country" id="country" class="form-control-select">
            <option value="">@lang('event_registration.form_country')</option>
            @foreach( __('event_registration.country') as $country )
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>
        <p id="country-help-text" class="alert help-text help-text hide"></p>
    </div>
    <div class="form-group">
        <select id="profession" class="form-control-select">
            <option value="">@lang('event_registration.form_profession')</option>
            @foreach( __('event_registration.profession') as $profession )
                <option value="{{  $profession }}">{{  $profession }}</option>
            @endforeach
        </select>
        <p id="country-help-text" class="alert help-text help-text hide"></p>
    </div>
    <button type="submit" class="button-reg" id="register-btn">@lang('event_registration.register_button')</button>
    {{--<div class="reveal" id="result-box" data-reveal style="border-radius: 5px;">
        <button class="close-button" data-close aria-label="Close modal" type="button"
                onclick="window.location.reload();">
            <span>&times;</span>
        </button>
    </div>--}}
</form>