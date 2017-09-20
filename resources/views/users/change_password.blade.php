<form id="change-password-form" method="POST" action="{{ route('user.changePassword') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <label for="current-password">@lang('user.profile.current_password'):</label>
    <input type="password" id="current-password" name="current_password" required
           class="{{ $errors->has('current_password') ? 'error' : '' }}"
    >
    <p id="current-password-help-text" class="alert help-text {{ $errors->has('current_password') ? '' : 'hide' }}">
        {{ $errors->has('current_password') ? $errors->first('current_password') : '' }}
    </p>

    <label for="password">@lang('user.password'):</label>
    <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'error' : '' }}" required>
    <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
        {{ $errors->has('password') ? $errors->first('password') : '' }}
    </p>

    <label for="password-confirmation">@lang('user.password_confirmation'):</label>
    <input type="password" id="password-confirmation" name="password_confirmation" required
           class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
    >
    <p id="password-confirmation-help-text" class="alert help-text {{ $errors->has('password_confirmation') ? '' : 'hide' }}">
        {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
    </p>

    <button type="submit" class="button">@lang('user.profile.change_password')</button>
</form>