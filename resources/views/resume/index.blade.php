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

    <div class="flex w-full">
        <div class="w-full">
            <div class="flex flex-col mb-5">
                <div>
                    <form class="flex flex-col gap-y-2 p-5"
                        action="{{ route('resume.education.store', ['resumeId' => $resume->id]) }}" method="POST">
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
                </div>

                <div>
                    <h1>Educations</h1>
                    @foreach ($resume->educations as $education)
                        <p>{{ $education->id }}</p>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <div>
                    <form class="flex flex-col gap-y-2 p-5"
                        action="{{ route('resume.workExperience.store', ['resumeId' => $resume->id]) }}" method="POST">
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

                <div>
                    <h1>Work Experiences</h1>
                    @foreach ($resume->workExperiences as $workExperience)
                        <p>{{ $workExperience->id }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-col mb-5">
                <div>
                    <form class="flex flex-col gap-y-2 p-5"
                        action="{{ route('resume.project.store', ['resumeId' => $resume->id]) }}" method="POST">
                        @csrf
                        <x-input-base placeholder="Name" name="name" />
                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="is_present_project" name="is_present" label="Present" value="1" />
                        <x-input-base type="month" name="start_date" />
                        <x-input-base type="month" name="end_date" />
                        <x-input-base placeholder="Description" name="description" />
                        <x-button-base type="submit" text="Store" color="green" />
                    </form>
                </div>

                <div>
                    <h1>Projects</h1>
                    @foreach ($resume->projects as $project)
                        <p>{{ $project->id }}</p>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <div>
                    <form class="flex flex-col gap-y-2 p-5"
                        action="{{ route('resume.language.store', ['resumeId' => $resume->id]) }}" method="POST">
                        @csrf
                        <x-input-base placeholder="Language" name="language" />
                        <x-input-base placeholder="Level" name="level" />
                        <x-button-base type="submit" text="Store" color="green" />
                    </form>
                </div>

                <div>
                    <h1>Languages</h1>
                    @foreach ($resume->languages as $language)
                        <p>{{ $language->id }}</p>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <div>
                    <form class="flex flex-col gap-y-2 p-5"
                        action="{{ route('resume.certificate.store', ['resumeId' => $resume->id]) }}" method="POST">
                        @csrf
                        <x-input-base placeholder="" name="name" />
                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="is_present_certificate" name="is_present" label="Present" value="1" />
                        <x-input-base type="month" name="start_date" />
                        <x-input-base type="month" name="end_date" />
                        <x-input-base placeholder="Description" name="description" />
                        <x-button-base type="submit" text="Store" color="green" />
                    </form>
                </div>

                <div>
                    <h1>Certificates</h1>
                    @foreach ($resume->certificates as $certificate)
                        <p>{{ $certificate->id }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
