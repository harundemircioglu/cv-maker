<div class="flex flex-col mb-5">
    <h1 class="font-bold text-lg">DİLLER</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-language-information-modal" toggleText="Ekle" modalHeader="Ekle"
                formAction="{{ route('resume.language.store', ['resumeId' => $resume->id]) }}">
                <x-slot name="modalBody">
                    <x-input-base id="store-language-information-language" label="Dil" name="language" />

                    <x-input-base id="store-language-information-level" label="Seviye" name="level" />

                    <x-slot name="formBtn">
                        <x-button-base text="Kaydet" />
                    </x-slot>
                </x-slot>
            </x-modal-base>
        </div>
    @endif
    @foreach ($resume->languages as $language)
        <div>
            <h1 class="font-bold text-lg">{{ $language->language }}</h1>
            <p class="text-primary italic text-sm">{{ $language->level }}</p>
        </div>
        @if (request()->edit && request()->edit == 1)
            <div class="flex gap-2 my-5">
                <x-delete-modal id="delete-language-information-modal-{{ $language->id }}"
                    formAction="{{ route('resume.language.destroy', ['id' => $language->id]) }}" />

                <x-modal-base id="edit-language-information-modal-{{ $language->id }}" toggleText="Düzenle"
                    modalHeader="Düzenle" formAction="{{ route('resume.language.update', ['id' => $language->id]) }}">
                    <x-slot name="modalBody">
                        <x-input-base id="edit-language-information-language-{{ $language->id }}" label="Dil"
                            name="language" value="{{ $language->language }}" />

                        <x-input-base id="edit-language-information-level-{{ $language->id }}" label="Seviye"
                            name="level" value="{{ $language->level }}" />

                        <x-slot name="formBtn">
                            <x-button-base text="Kaydet" />
                        </x-slot>
                    </x-slot>
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div>
