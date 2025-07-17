@if ($resume->projects->isNotEmpty())
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
@endif
