<div class="flex flex-col mb-5">
    <h1 class="font-bold text-lg">DİLLER</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-language-information-modal" dataModalTarget="store-language-information-modal"
                dataModalToggle="store-language-information-modal" toggleText="Ekle" modalHeader="Ekle">
            </x-modal-base>
        </div>
    @endif
    @foreach ($resume->languages as $language)
        <div>
            <h1 class="font-bold text-lg">{{ $language->language }}</h1>
            <p class="text-primary italic text-sm">{{ $language->level }}</p>
        </div>
        @if (request()->edit && request()->edit == 1)
            <div class="my-5">
                <x-modal-base id="edit-language-information-modal" dataModalTarget="edit-language-information-modal"
                    dataModalToggle="edit-language-information-modal" toggleText="Düzenle" modalHeader="Düzenle">
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div>
