@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2">
        <div class="p-4">
            <form class="flex flex-col gap-2" action="{{ route('resume.education.store', ['resumeId' => $resume->id]) }}" method="POST">
                @csrf
                <x-input-base placeholder="Study Program" name="study_program" />
                <x-input-base placeholder="Place Of Education" name="place_of_education" />
                <input type="hidden" name="is_present" value="0">
                <x-checkbox-base id="is_present" label="Present" name="is_present" value="1" />
                <x-input-base type="month" name="start_date" />
                <x-input-base type="month" name="end_date" />
                <x-input-base placeholder="Projects" name="projects[]" />
                <x-button-base type="submit" text="Store" color="green" />
            </form>

            <form class="flex flex-col gap-2" action="{{ route('resume.workExperience.store', ['resumeId' => $resume->id]) }}" method="POST">
                @csrf
                <x-input-base placeholder="Title" name="title" />
                <x-input-base placeholder="Workplace" name="workplace" />
                <input type="hidden" name="is_present" value="0">
                <x-checkbox-base id="is_present_workExperience" name="is_present" label="Present" value="1" />
                <x-input-base type="month" name="start_date" />
                <x-input-base type="month" name="end_date" />
                <x-input-base placeholder="City" name="city" />
                <x-input-base placeholder="Tasks" name="tasks[]" />
                <x-button-base type="submit" text="Store" color="green" />
            </form>
        </div>

        <div class="p-4">
            <form class="flex flex-col gap-2" action="{{ route('resume.project.store', ['resumeId' => $resume->id]) }}" method="POST">
                @csrf
                <x-input-base placeholder="Name" name="name" />
                <input type="hidden" name="is_present" value="0">
                <x-checkbox-base id="is_present_project" name="is_present" label="Present" value="1" />
                <x-input-base type="month" name="start_date" />
                <x-input-base type="month" name="end_date" />
                <x-input-base placeholder="Description" name="description" />
                <x-button-base type="submit" text="Store" color="green" />
            </form>

            <form class="flex flex-col gap-2" action="{{ route('resume.language.store', ['resumeId' => $resume->id]) }}" method="POST">
                @csrf
                <x-input-base placeholder="Language" name="language" />
                <x-input-base placeholder="Level" name="level" />
                <x-button-base type="submit" text="Store" color="green" />
            </form>

            <form class="flex flex-col gap-2" action="{{ route('resume.certificate.store', ['resumeId' => $resume->id]) }}" method="POST">
                @csrf
                <x-input-base placeholder="Name" name="name" />
                <input type="hidden" name="is_present" value="0">
                <x-checkbox-base id="is_present_certificate" name="is_present" label="Present" value="1" />
                <x-input-base type="month" name="start_date" />
                <x-input-base type="month" name="end_date" />
                <x-input-base placeholder="Description" name="description" />
                <x-button-base type="submit" text="Store" color="green" />
            </form>
        </div>
    </div>
@endsection
