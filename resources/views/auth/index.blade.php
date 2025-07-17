@extends('layouts.app')

@section('content')
    <form id="formLogin" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <x-input-base id="auth-login-email" label="Email" type="email" name="email" />
        <x-input-base id="auth-login-password" label="Şifre" type="password" name="password" />
        <x-button-base text="Giriş Yap" />
    </form>

    <form id="formRegister" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <x-input-base id="auth-register-name" label="Ad" type="text" name="name" />
        <x-input-base id="auth-register-email" label="Email" type="email" name="email" />
        <x-input-base id="auth-register-password" label="Şifre" type="password" name="password" />
        <x-input-base id="auth-register-password_confirmation" label="Şifreyi Onayla" type="password"
            name="password_confirmation" />
        <x-select-base id="auth-register-plan_id" label="Plan" name="plan_id">
            <x-slot name="options">
                <option selected disabled>Plan</option>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </x-slot>
        </x-select-base>
        <x-select-base id="auth-register-payment_term" label="Ödeme Vadesi" name="payment_term">
            <x-slot name="options">
                <option selected disabled>Ödeme Vadesi</option>
                <option value="1">Aylık</option>
                <option value="2">Yıllık</option>
            </x-slot>
        </x-select-base>
        <x-button-base text="Kaydol" />
    </form>
@endsection

@push('scripts')
    <script></script>
@endpush
