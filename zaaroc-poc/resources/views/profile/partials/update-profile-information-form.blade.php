<div  style="padding: 20px;margin: 2px solid black">
    <header>
        <h2 >
            {{ __('Profile Information') }}
       </h2>
        <p class="text-secondary">
            {{ __("Update your account's profile information and email address.") }}
        </p>
                <script>
                $('#form').validate({
                    submitHandler: function(form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function(response) {
                                $('#answers').html(response);
                            }
                        });
                    }
                });
                </script>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="name" >Name</label>
                <input type="text"   class="form-control" id="name" name="name" value="{{$user->name}}">
                <x-input-error class="form-control"  :messages="$errors->get('name')" />
            </div><br/>

            <div class="form-group col-md-3">
                <label for="email" >Email</label>
                 <input type="email" name="email"  class="form-control" id="email" value="{{$user->email}}">
                 <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div><br/>
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-warning">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-warning">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-warning">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

            <div class="form-group col-md-3">
                <label for="phone" >{{config('ui.phone')}}</label>
                <input type="text"  class="form-control" name="phone" id="phone" value="{{$user->phone}}" size="100">
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div><br/>

            <div class="form-group col-md-3">
                <button type="submit" type="button" class="btn btn-primary">{{ __('Save') }}</button>
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success">
                            {{ __('Saved.') }}
                    </p>
            @endif
        </div>

    </form>
</div>
