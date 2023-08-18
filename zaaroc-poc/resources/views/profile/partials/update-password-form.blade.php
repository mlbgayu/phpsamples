
<div   style="padding: 20px;margin: 2px solid black">
    <header>
        <h2>
            {{ __('Update Password') }}
        </h2>

         <p class="text-secondary">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" >
        @csrf
        @method('put')
        <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4" for="password_confirmation">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password"  autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div><br/>

        <div class="form-group col-md-3">
            <label for="inputEmail4" for="password_confirmation">New Password</label>
            <input type="password" class="form-control" id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div><br/>

        <div class="form-group col-md-3">
            <label for="inputEmail4" for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div><br/>

        <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        </div>
    </form>
</div>

