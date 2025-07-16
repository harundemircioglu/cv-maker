@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="grid grid-cols-1 sm:grid-cols-3 border-b-secondary border-b-2 pb-5 mb-5">
            <div class="flex flex-col items-start">
                <div class="border-l-secondary border-l-[50px] pl-5 text-secondary text-4xl mb-5">
                    <h1>{{ $resume->name }}</h1>
                    <h1>{{ $resume->surname }}</h1>
                </div>
                <div class="pl-5 ml-[50px] print:text-sm">
                    <p>{{ $resume->description }}</p>
                </div>
            </div>

            <div class="flex justify-center">
                <img class="rounded-full w-36 h-44 shadow-sm" src="{{ Storage::url($resume->profile_image) }}">
            </div>

            <div class="flex flex-col items-end">
                <div class="flex items-center gap-2 mb-5">
                    <p>{{ $resume->email }}</p>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="flex items-center gap-2 mb-5">
                    <p>{{ $resume->phone }}</p>
                    <i class="fa-solid fa-mobile"></i>
                </div>

                <div class="flex items-center gap-2 mb-5">
                    <p>{{ $resume->city }}</p>
                    <i class="fa-solid fa-location-dot"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="pl-0">
                <div class="flex flex-col mb-5">
                    <h1 class="pl-5 ml-[50px] font-bold text-lg">EĞİTİM</h1>
                    @foreach ($resume->educations as $education)
                        <div>
                            <div class="border-l-primary border-l-[50px] pl-5">
                                <h1 class="font-bold text-lg">{{ $education->study_program }}</h1>
                                <p class="text-lg">{{ $education->place_of_education }}</p>
                                <div class="flex text-primary italic text-sm gap-1">
                                    <p>{{ Carbon\Carbon::parse($education->start_date)->format('m/Y') }}</p>-
                                    @if ($education->is_present)
                                        <p>Devam Ediyor</p>
                                    @else
                                        <p>{{ Carbon\Carbon::parse($education->end_date)->format('m/Y') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-5 ml-[50px]"></div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col mb-5">
                    <h1 class="pl-5 ml-[50px] font-bold text-lg">İŞ DENEYİMİ</h1>
                    @foreach ($resume->workExperiences as $workExperience)
                        <div class="mb-5">
                            <div class="border-l-primary border-l-[50px] pl-5">
                                <h1 class="font-bold text-lg">{{ $workExperience->title }}</h1>
                                <p class="text-lg">{{ $workExperience->workplace }}</p>
                                <div class="flex text-primary italic text-sm gap-1">
                                    <p>{{ Carbon\Carbon::parse($workExperience->start_date)->format('m/Y') }}</p>-
                                    @if ($workExperience->is_present)
                                        <p>Devam Ediyor</p>
                                    @else
                                        <p>{{ Carbon\Carbon::parse($workExperience->end_date)->format('m/Y') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-5 ml-[50px]">
                                <p>{{ $workExperience->city }}</p>
                                <p class="text-primary italic text-sm">Görevler</p>
                                @php
                                    $tasks = json_decode($workExperience->tasks);
                                @endphp
                                <div class="flex flex-col">
                                    @foreach ($tasks as $task)
                                        <li class="marker:text-primary marker:text-xl mb-2">{{ $task }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="pl-5">
                <div class="flex flex-col mb-5">
                    <h1 class="font-bold text-lg">KİŞİSEL PROJELER</h1>
                    @foreach ($resume->projects as $project)
                        <div class="mb-5">
                            <h1 class="font-bold text-lg">{{ $project->name }}</h1>
                            <div class="flex text-primary italic text-sm gap-1">
                                <p>{{ Carbon\Carbon::parse($project->start_date)->format('m/Y') }}</p>-
                                @if ($project->is_present)
                                    <p>Devam Ediyor</p>
                                @else
                                    <p>{{ Carbon\Carbon::parse($project->end_date)->format('m/Y') }}</p>
                                @endif
                            </div>
                            <li class="marker:text-primary marker:text-xl text-sm">{{ $project->description }}</li>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col mb-5">
                    <h1 class="font-bold text-lg">SERTİFİKALAR</h1>
                    @foreach ($resume->certificates as $certificate)
                        <div>
                            <h1 class="font-bold text-lg">{{ $certificate->name }}</h1>
                            <div class="flex text-primary italic text-sm gap-1">
                                <p>{{ Carbon\Carbon::parse($certificate->start_date)->format('m/Y') }}</p>-
                                @if ($certificate->is_present)
                                    <p>Devam Ediyor</p>
                                @else
                                    <p>{{ Carbon\Carbon::parse($certificate->end_date)->format('m/Y') }}</p>
                                @endif
                            </div>
                            <p>{{ $certificate->description }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col mb-5">
                    <h1 class="font-bold text-lg">DİLLER</h1>
                    @foreach ($resume->languages as $language)
                        <div>
                            <h1 class="font-bold text-lg">{{ $language->language }}</h1>
                            <p class="text-primary italic text-sm">{{ $language->level }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
