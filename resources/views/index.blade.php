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
            <x-button-base text="Çıkış Yap" color="red" />
        </form>

        <x-modal-base id="store-resume-modal" toggleText="Özgeçmiş Oluştur" modalHeader="Özgeçmiş Oluştur"
            formAction="{{ route('resume.store') }}" formMethod="POST">
            <x-slot name="modalBody">
                <div class="col-span-2">
                    <x-input-base id="store-resume-title" label="Başlık" name="title" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-name" label="Ad" name="name" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-surname" label="Soyad" name="surname" />
                </div>

                <div class="col-span-2">
                    <x-input-base id="store-resume-profile_image" label="Profil Resmi" type="file" name="profile_image" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-email" label="Email" type="email" name="email" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-phone" label="Telefon" name="phone" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-city" label="İl" name="city" />
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <x-input-base id="store-resume-description" label="Açıklama" name="description" />
                </div>
            </x-slot>
            <x-slot name="formBtn">
                <x-button-base text="Kaydet" />
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
