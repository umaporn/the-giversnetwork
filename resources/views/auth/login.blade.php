<form class="submission-form modal-form" method="POST" action="{{ route('submitLogin') }}">
    {{ csrf_field() }}
    <div class="grid-x grid-padding-x user-form-space">
        <div class="cell small-12">
            <label for="email" class="form-label">@lang('user.email')</label>
        </div>
        <div class="cell small-12">
            <input type="email" id="email" name="email" class="form-fill" required autofocus value="">
            <p id="email-help-text" class="alert help-text hide"></p>
        </div>
    </div>
    <div class="grid-x grid-padding-x user-form-space">
        <div class="cell small-12">
            <div class="grid-flex">
                <label for="password" class="form-label">@lang('user.password')</label>
                <a class="toggle-password">show</a>
            </div>
        </div>
        <div class="cell small-12">
            <input type="password" id="password" name="password" class="form-fill password" required value="">
            <p id="password-help-text" class="alert help-text hide"></p>
        </div>
        <div class="cell small-12 text-left">
            <a href="{{ route('password.request') }}" class="form-link-sub">@lang('login.forgot_password')</a>
        </div>
    </div>
    <button type="submit" class="btn-blue btn-long text-uppercase">@lang('login.login_button')</button>
</form>