@if ($resume->certificates->isNotEmpty())
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
@endif
