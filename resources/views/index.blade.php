@extends('layouts.app')

@section('content')
    @auth
        @php
            $user = auth()->user()->load('resumes');
            $resumes = $user->resumes;
        @endphp
        <h3>{{ auth()->user()->name }}</h3>

        <form id="formLogout" action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button id="btnLogout">Logout</button>
        </form>

        <form id="formStoreResume" action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title">
            <input type="text" name="name">
            <input type="text" name="surname">
            <input type="file" name="profile_image">
            <input type="text" name="email">
            <input type="text" name="phone">
            <input type="text" name="city">
            <input type="text" name="description">
            <button id="btnStoreResume">Store</button>
        </form>

        @foreach ($resumes as $resume)
            <a href="{{ route('resume.detail', ['id' => $resume->id]) }}">{{ $resume->title }}</a>
        @endforeach
    @endauth
@endsection

@push('scripts')
    <script>
        $('#btnLogout').click(function() {
            $(this).prop('disabled', true);
            $('#formLogout').submit();
        });

        $('#btnStoreResume').click(function() {
            $(this).prop('disabled', true);
            $('#formStoreResume').submit();
        });
    </script>
@endpush
