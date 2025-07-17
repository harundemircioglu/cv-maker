@if ($resume->educations->isNotEmpty())
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
@endif
