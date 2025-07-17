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
            <x-button-base text="Logout" color="red" />
        </form>

        <x-modal-base id="store-resume-modal" toggleText="Store Resume" modalHeader="Store Resume"
            formAction="{{ route('resume.store') }}" formMethod="POST">
            <x-slot name="modalBody">
                <div class="col-span-2">
                    <x-input-base placeholder="Title" name="title" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base placeholder="Name" name="name" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base placeholder="Surname" name="surname" />
                </div>

                <div class="col-span-2">
                    <x-input-base type="file" name="profile_image" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base type="email" placeholder="Email" name="email" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base placeholder="Phone" name="phone" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base placeholder="City" name="city" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base placeholder="Description" name="description" />
                </div>
            </x-slot>
            <x-slot name="formBtn">
                <x-button-base text="Store" />
            </x-slot>
        </x-modal-base>

        @foreach ($resumes as $resume)
            <a href="{{ route('resume.detail', ['id' => $resume->id]) }}">{{ $resume->title }}</a>
        @endforeach
    @endauth
@endsection

@push('scripts')
    <script></script>
@endpush
