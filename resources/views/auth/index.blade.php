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
        <input class="@error('email') is-invalid @enderror" type="email" name="email">
        <input class="@error('password') is-invalid @enderror" type="password" name="password">
        <button id="btnLogin">Login</button>
    </form>

    <form id="formRegister" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <input class="@error('name') is-invalid @enderror" type="text" name="name">
        <input class="@error('email') is-invalid @enderror" type="email" name="email">
        <input class="@error('password') is-invalid @enderror" type="password" name="password">
        <input class="@error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
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
