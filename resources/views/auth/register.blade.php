<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('/')}}assets/backend/admin/dist/img/logo.webp" alt="AleshaMart" class="img-fluid">

                {{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

        <div class="col-12 col-lg-12 col-md-12" style="margin-bottom: 25px">
            <h1 class="text-center" style="margin-bottom: 10px;font-size: 20px;"><strong>{{ config('app.name', 'Laravel') }}</strong> Admin Register</h1>
            <hr>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" placeholder="Name" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" placeholder="Email Address" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" placeholder="Password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" placeholder="Confirm Password" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('administration') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-5 text-gray-600">
                <strong style="font-size: 12px">&copy; {{ config('app.name', 'Laravel') }}. <span style="font-size: 12px;">Developed by <a
                            href="#" class="text-blue-700">Alesha Tech Ltd</a>.</span></strong>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
