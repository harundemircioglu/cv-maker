@if ($resume->projects->isNotEmpty())
    <div class="flex flex-col mb-5">
        <h1 class="font-bold text-lg">KİŞİSEL PROJELER</h1>
        @if (request()->edit && request()->edit == 1)
            <div class="my-5">
                <x-modal-base id="store-project-information-modal" dataModalTarget="store-project-information-modal"
                    dataModalToggle="store-project-information-modal" toggleText="Ekle" modalHeader="Ekle">
                </x-modal-base>
            </div>
        @endif
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
            @if (request()->edit && request()->edit == 1)
                <div class="my-5">
                    <x-modal-base id="edit-project-information-modal" dataModalTarget="edit-project-information-modal"
                        dataModalToggle="edit-project-information-modal" toggleText="Düzenle" modalHeader="Düzenle">
                    </x-modal-base>
                </div>
            @endif
        @endforeach
    </div>
@endif
