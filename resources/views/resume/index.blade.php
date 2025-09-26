@extends('layouts.app')

@section('content')
    {{-- <div class="flex flex-col">
        <div class="grid grid-cols-1 sm:grid-cols-3 border-b-secondary border-b-2 pb-5 mb-5">
            @include('components.resume.personel-information', ['resume' => $resume])
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="pl-0">
                @include('components.resume.education-information', ['resume' => $resume])

                @include('components.resume.work-experience-information', ['resume' => $resume])
            </div>

            <div class="pl-5">
                @include('components.resume.project-information', ['resume' => $resume])

                @include('components.resume.certificate-information', ['resume' => $resume])

                @include('components.resume.language-information', ['resume' => $resume])
            </div>
        </div>
    </div> --}}
@endsection
