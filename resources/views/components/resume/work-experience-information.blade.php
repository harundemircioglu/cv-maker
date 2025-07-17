@if ($resume->workExperiences->isNotEmpty())
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
@endif
