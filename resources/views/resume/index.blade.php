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
                        <input type="text" name="study_program">
                        <input type="text" name="place_of_education">
                        <div class="flex">
                            <input type="hidden" name="is_present" value="0">
                            <input type="checkbox" name="is_present" value="1">Present
                        </div>
                        <input type="month" name="start_date">
                        <input type="month" name="end_date">
                        <input type="text" name="projects[]">
                        <button>Store</button>
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
                        <input type="text" name="title">
                        <input type="text" name="workplace">
                        <div class="flex">
                            <input type="hidden" name="is_present" value="0">
                            <input type="checkbox" name="is_present" value="1">Present
                        </div>
                        <input type="month" name="start_date">
                        <input type="month" name="end_date">
                        <input type="text" name="city">
                        <input type="text" name="tasks[]">
                        <button>Store</button>
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
                        <input type="text" name="name">
                        <div class="flex">
                            <input type="hidden" name="is_present" value="0">
                            <input type="checkbox" name="is_present" value="1">Present
                        </div>
                        <input type="month" name="start_date">
                        <input type="month" name="end_date">
                        <input type="text" name="description">
                        <button>Store</button>
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
                        <input type="text" name="language">
                        <input type="text" name="level">
                        <button>Store</button>
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
                        <input type="text" name="name">
                        <div class="flex">
                            <input type="hidden" name="is_present" value="0">
                            <input type="checkbox" name="is_present" value="1">Present
                        </div>
                        <input type="month" name="start_date">
                        <input type="month" name="end_date">
                        <input type="text" name="description">
                        <button>Store</button>
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
