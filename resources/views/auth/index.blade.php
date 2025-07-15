@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="formLogin" action="{{ route('auth.login') }}" method="POST">
        @csrf
        <x-input-base placeholder="Email" type="email" name="email" />
        <x-input-base placeholder="Password" type="password" name="password" />
        <button id="btnLogin">Login</button>
    </form>

    <form id="formRegister" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <x-input-base placeholder="Name" type="text" name="name" />
        <x-input-base placeholder="Email" type="email" name="email" />
        <x-input-base placeholder="Password" type="password" name="password" />
        <x-input-base placeholder="Password Confirmation" type="password" name="password_confirmation" />
        <select name="plan_id">
            <option selected disabled>Plan</option>
            @foreach ($plans as $plan)
                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
            @endforeach
        </select>
        <select name="payment_term">
            <option selected disabled>Payment Term</option>
            <option value="1">Monthly</option>
            <option value="2">Yearly</option>
        </select>
        <button id="btnRegister">Register</button>
    </form>
@endsection

@push('scripts')
    <script>
        $('#btnLogin').click(function(e) {
            $(this).prop('disabled', true);
            $('#formLogin').submit();
        });

        $('#btnRegister').click(function(e) {
            $(this).prop('disabled', true);
            $('#formRegister').submit();
        });
    </script>
@endpush
