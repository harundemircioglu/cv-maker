{{-- <div class="flex flex-col mb-5">
    <h1 class="font-bold text-lg">KİŞİSEL PROJELER</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-project-information-modal" toggleText="Ekle" modalHeader="Ekle"
                formAction="{{ route('resume.project.store', ['resumeId' => $resume->id]) }}">
                <x-slot name="modalBody">
                    <x-input-base id="store-project-information-name" label="Proje Adı" name="name" />

                    <input type="hidden" name="is_present" value="0">
                    <x-checkbox-base id="store-project-information-is_present" name="is_present" value="1"
                        label="Devam ediyor" />

                    <x-input-base id="store-project-information-start_date" label="Başlangıç Tarihi" type="month"
                        name="start_date" />

                    <x-input-base id="store-project-information-end_date" label="Bitiş Tarihi" type="month"
                        name="end_date" />

                    <x-input-base id="store-project-information-description" label="Açıklama" name="description" />

                    <x-slot name="formBtn">
                        <x-button-base text="Kaydet" />
                    </x-slot>
                </x-slot>
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
            <div class="flex gap-2 my-5">
                <x-delete-modal id="delete-project-information-modal-{{ $project->id }}"
                    formAction="{{ route('resume.project.destroy', ['id' => $project->id]) }}" />

                <x-modal-base id="edit-project-information-modal-{{ $project->id }}" toggleText="Düzenle"
                    modalHeader="Düzenle" formAction="{{ route('resume.project.update', ['id' => $project->id]) }}">
                    <x-slot name="modalBody">
                        <x-input-base id="edit-project-information-name-{{ $project->id }}" label="Proje Adı"
                            name="name" value="{{ $project->name }}" />

                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="edit-project-information-is_present-{{ $project->id }}" name="is_present"
                            value="1" label="Devam ediyor" value="{{ $project->is_present }}" />

                        <x-input-base id="edit-project-information-start_date-{{ $project->id }}"
                            label="Başlangıç Tarihi" type="month" name="start_date"
                            value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m') }}" />

                        <x-input-base id="edit-project-information-end_date-{{ $project->id }}" label="Bitiş Tarihi"
                            type="month" name="end_date"
                            value="{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m') }}" />

                        <x-input-base id="edit-project-information-description-{{ $project->id }}" label="Açıklama"
                            name="description" value="{{ $project->description }}" />

                        <x-slot name="formBtn">
                            <x-button-base text="Kaydet" />
                        </x-slot>
                    </x-slot>
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div> --}}
