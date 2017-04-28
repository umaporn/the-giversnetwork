<form method="POST" action="{{ route('user.changePassword') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="small-4 columns">
            <label for="current-password" class="text-right middle">{{ trans('user.profile.current_password') }}:</label>
        </div>
        <div class="small-8 columns">
            <input type="password" id="current-password" name="current_password"
                   class="{{ $errors->has('current_password') ? 'error' : '' }}"
                   aria-describedly="current_password-help-text"
            >
            <p id="current-password-help-text" class="alert help-text {{ $errors->has('current_password') ? '' : 'hide' }}">
                {{ $errors->has('current_password') ? $errors->first('current_password') : '' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="small-4 columns">
            <label for="password" class="text-right middle">{{ trans('user.password') }}:</label>
        </div>
        <div class="small-8 columns">
            <input type="password" id="password" name="password"
                   class="{{ $errors->has('password') ? 'error' : '' }}"
                   aria-describedly="password-help-text"
            >
            <p id="password-help-text" class="alert help-text {{ $errors->has('password') ? '' : 'hide' }}">
                {{ $errors->has('password') ? $errors->first('password') : '' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="small-4 columns">
            <label for="password-confirmation" class="text-right middle">{{ trans('user.password_confirmation') }}:</label>
        </div>
        <div class="small-8 columns">
            <input type="password" id="password-confirmation" name="password_confirmation" value=""
                   class="{{ $errors->has('password_confirmation') ? 'error' : '' }}"
                   aria-describedly="password_confirmation-help-text"
            >
            <p id="password-confirmation-help-text" class="alert help-text {{ $errors->has('password_confirmation') ? '' : 'hide' }}">
                {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="small-4 columns">
        </div>
        <div class="small-8 columns">
            <button type="submit" class="button">{{ trans('user.profile.change_password') }}</button>
        </div>
    </div>
</form>