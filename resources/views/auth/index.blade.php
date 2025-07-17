@extends('layouts.app')

@section('content')
    <form id="formLogin" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <x-input-base placeholder="Email" type="email" name="email" />
        <x-input-base placeholder="Password" type="password" name="password" />
        <x-button-base text="Login" />
    </form>

    <form id="formRegister" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <x-input-base placeholder="Name" type="text" name="name" />
        <x-input-base placeholder="Email" type="email" name="email" />
        <x-input-base placeholder="Password" type="password" name="password" />
        <x-input-base placeholder="Password Confirmation" type="password" name="password_confirmation" />
        <x-select-base name="plan_id">
            <x-slot name="options">
                <option selected disabled>Plan</option>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </x-slot>
        </x-select-base>
        <x-select-base name="payment_term">
            <x-slot name="options">
                <option selected disabled>Payment Term</option>
                <option value="1">Monthly</option>
                <option value="2">Yearly</option>
            </x-slot>
        </x-select-base>
        <x-button-base text="Register" />
    </form>
@endsection

@push('scripts')
    <script></script>
@endpush
