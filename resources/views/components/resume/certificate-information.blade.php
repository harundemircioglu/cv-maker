@if ($resume->certificates->isNotEmpty())
    <div class="flex flex-col mb-5">
        <h1 class="font-bold text-lg">SERTİFİKALAR</h1>
        @if (request()->edit && request()->edit == 1)
            <div class="my-5">
                <x-modal-base id="store-certificate-information-modal"
                    dataModalTarget="store-certificate-information-modal"
                    dataModalToggle="store-certificate-information-modal" toggleText="Ekle" modalHeader="Ekle">
                </x-modal-base>
            </div>
        @endif
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
            @if (request()->edit && request()->edit == 1)
                <div class="my-5">
                    <x-modal-base id="edit-certificate-information-modal"
                        dataModalTarget="edit-certificate-information-modal"
                        dataModalToggle="edit-certificate-information-modal" toggleText="Düzenle" modalHeader="Düzenle">
                    </x-modal-base>
                </div>
            @endif
        @endforeach
    </div>
@endif
