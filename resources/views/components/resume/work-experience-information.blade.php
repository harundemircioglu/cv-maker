<div class="flex flex-col mb-5">
    <h1 class="pl-5 ml-[50px] font-bold text-lg">İŞ DENEYİMİ</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-work-experience-information-modal" toggleText="Ekle" modalHeader="Ekle"
                formAction="{{ route('resume.workExperience.store', ['resumeId' => $resume->id]) }}">
                <x-slot name="modalBody">
                    <x-input-base id="store-work-experience-information-title" label="Meslek" name="title" />

                    <x-input-base id="store-work-experience-information-workplace" label="Şirket" name="workplace" />

                    <input type="hidden" name="is_present" value="0">
                    <x-checkbox-base id="is_present" name="is_present" value="1" label="Devam ediyor" />

                    <x-input-base id="store-work-experience-information-start_date" label="Başlangıç Tarihi"
                        type="month" name="start_date" />

                    <x-input-base id="store-work-experience-information-end_date" label="Bitiş Tarihi" type="month"
                        name="end_date" />

                    <x-input-base id="store-work-experience-information-city" label="İl" name="city" />

                    <x-input-base id="store-work-experience-information-Tasks" label="Görevler" name="tasks[]"
                        placeholder="Tasks" />

                    <x-slot name="formBtn">
                        <x-button-base text="Kaydet" />
                    </x-slot>
                </x-slot>
            </x-modal-base>
        </div>
    @endif
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
        @if (request()->edit && request()->edit == 1)
            <div class="flex gap-2 my-5">
                <x-delete-modal id="delete-work-experience-information-modal-{{ $workExperience->id }}"
                    formAction="{{ route('resume.workExperience.destroy', ['id' => $workExperience->id]) }}" />

                <x-modal-base id="edit-work-experience-information-modal-{{ $workExperience->id }}" toggleText="Düzenle"
                    modalHeader="Düzenle"
                    formAction="{{ route('resume.workExperience.update', ['id' => $workExperience->id]) }}">
                    <x-slot name="modalBody">
                        <x-input-base id="edit-work-experience-information-title-{{ $workExperience->id }}"
                            label="Meslek" name="title" value="{{ $workExperience->title }}" />

                        <x-input-base id="edit-work-experience-information-workplace-{{ $workExperience->id }}"
                            label="Şirket" name="workplace" value="{{ $workExperience->workplace }}" />

                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="edit-work-experience-information-is_present-{{ $workExperience->id }}"
                            name="is_present" value="1" label="Devam ediyor"
                            value="{{ $workExperience->is_present }}" />

                        <x-input-base id="edit-work-experience-information-start_date-{{ $workExperience->id }}"
                            label="Başlangıç Tarihi" type="month" name="start_date"
                            value="{{ \Carbon\Carbon::parse($workExperience->start_date)->format('Y-m') }}" />

                        <x-input-base id="edit-work-experience-information-end_date-{{ $workExperience->id }}"
                            label="Bitiş Tarihi" type="month" name="end_date"
                            value="{{ \Carbon\Carbon::parse($workExperience->end_date)->format('Y-m') }}" />

                        <x-input-base id="edit-work-experience-information-city-{{ $workExperience->id }}"
                            label="İl" name="city" value="{{ $workExperience->city }}" />

                        <x-input-base id="edit-work-experience-information-tasks-{{ $workExperience->id }}"
                            label="Görevler" name="tasks[]" placeholder="Tasks" value="{{ $workExperience->tasks }}" />

                        <x-slot name="formBtn">
                            <x-button-base text="Kaydet" />
                        </x-slot>
                    </x-slot>
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div>
