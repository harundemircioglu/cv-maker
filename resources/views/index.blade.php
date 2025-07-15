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
            <x-button-base text="Logout" type="submit" color="red" id="btnLogout"/>
        </form>

        <form id="formStoreResume" action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input-base placeholder="Title" name="title" />
            <x-input-base placeholder="Name" name="name" />
            <x-input-base placeholder="Surname" name="surname" />
            <x-input-base type="file" name="profile_image" />
            <x-input-base type="email" placeholder="Email" name="email" />
            <x-input-base placeholder="Phone" name="phone" />
            <x-input-base placeholder="City" name="city" />
            <x-input-base placeholder="District" name="description" />
            <x-button-base color="green" text="Store" id="btnStoreResume"/>
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
