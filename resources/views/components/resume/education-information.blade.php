<div class="flex flex-col mb-5">
    <h1 class="pl-5 ml-[50px] font-bold text-lg">EĞİTİM</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-education-information-modal" toggleText="Ekle" modalHeader="Ekle"
                formAction="{{ route('resume.education.store', ['resumeId' => $resume->id]) }}">
                <x-slot name="modalBody">
                    <x-input-base id="store-education-information-study_program" label="Bölüm" name="study_program" />

                    <x-input-base id="store-education-information-place_of_education" label="Okul"
                        name="place_of_education" />

                    <input type="hidden" name="is_present" value="0">
                    <x-checkbox-base id="store-education-information-is_present" name="is_present" value="1"
                        label="Devam ediyor" />

                    <x-input-base id="store-education-information-start_date" label="Başlangıç Tarihi" type="month"
                        name="start_date" />

                    <x-input-base id="store-education-information-end_date" label="Bitiş Tarihi" type="month"
                        name="end_date" />

                    <x-input-base id="store-education-information-projects" label="Projeler" name="projects[]"
                        placeholder="Projects" />

                    <x-slot name="formBtn">
                        <x-button-base text="Kaydet" />
                    </x-slot>
                </x-slot>
            </x-modal-base>
        </div>
    @endif
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
        @if (request()->edit && request()->edit == 1)
            <div class="flex gap-2 my-5">
                <x-delete-modal id="delete-education-information-modal-{{ $education->id }}"
                    formAction="{{ route('resume.education.destroy', ['id' => $education->id]) }}" />

                <x-modal-base id="edit-education-information-modal-{{ $education->id }}" toggleText="Düzenle"
                    modalHeader="Düzenle" formAction="{{ route('resume.education.update', ['id' => $education->id]) }}">
                    <x-slot name="modalBody">
                        <x-input-base id="edit-education-information-study_program-{{ $education->id }}" label="Bölüm"
                            name="study_program" value="{{ $education->study_program }}" />

                        <x-input-base id="edit-education-information-place_of_education-{{ $education->id }}"
                            label="Okul" name="place_of_education" value="{{ $education->place_of_education }}" />

                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="edit-education-information-is_present-{{ $education->id }}"
                            name="is_present" value="1" label="Devam ediyor"
                            value="{{ $education->is_present }}" />

                        <x-input-base id="edit-education-information-start_date-{{ $education->id }}"
                            label="Başlangıç Tarihi" type="month" name="start_date"
                            value="{{ \Carbon\Carbon::parse($education->start_date)->format('Y-m') }}" />

                        <x-input-base id="edit-education-information-end_date-{{ $education->id }}"
                            label="Bitiş Tarihi" type="month" name="end_date"
                            value="{{ \Carbon\Carbon::parse($education->end_date)->format('Y-m') }}" />

                        <x-input-base id="edit-education-information-projects-{{ $education->id }}" label="Projeler"
                            name="projects[]" placeholder="Projects" value="{{ $education->projects }}" />

                        <x-slot name="formBtn">
                            <x-button-base text="Kaydet" />
                        </x-slot>
                    </x-slot>
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div>
