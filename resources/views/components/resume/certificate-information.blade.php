{{-- <div class="flex flex-col mb-5">
    <h1 class="font-bold text-lg">SERTİFİKALAR</h1>
    @if (request()->edit && request()->edit == 1)
        <div class="my-5">
            <x-modal-base id="store-certificate-information-modal" toggleText="Ekle" modalHeader="Ekle"
                formAction="{{ route('resume.certificate.store', ['resumeId' => $resume->id]) }}">
                <x-slot name="modalBody">
                    <x-input-base id="store-certificate-information-name" label="Sertifika Adı" name="name" />

                    <input type="hidden" name="is_present" value="0">
                    <x-checkbox-base id="store-certificate-information-is_present" name="is_present" value="1"
                        label="Devam ediyor" />

                    <x-input-base id="store-certificate-information-start_date" label="Başlangıç Tarihi" type="month"
                        name="start_date" />

                    <x-input-base id="store-certificate-information-end_date" label="Bitiş Tarihi" type="month"
                        name="end_date" />

                    <x-input-base id="store-certificate-information-description" label="Açıklama" name="description" />

                    <x-slot name="formBtn">
                        <x-button-base text="Kaydet" />
                    </x-slot>
                </x-slot>
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
            <div class="flex gap-2 my-5">
                <x-delete-modal id="delete-certificate-information-modal-{{ $certificate->id }}"
                    formAction="{{ route('resume.certificate.destroy', ['id' => $certificate->id]) }}" />

                <x-modal-base id="edit-certificate-information-modal-{{ $certificate->id }}" toggleText="Düzenle"
                    modalHeader="Düzenle"
                    formAction="{{ route('resume.certificate.update', ['id' => $certificate->id]) }}">
                    <x-slot name="modalBody">
                        <x-input-base id="edit-certificate-information-name-{{ $certificate->id }}"
                            label="Sertifika Adı" name="name" value="{{ $certificate->name }}" />

                        <input type="hidden" name="is_present" value="0">
                        <x-checkbox-base id="edit-certificate-information-is_present-{{ $certificate->id }}"
                            name="is_present" value="1" label="Devam ediyor"
                            value="{{ $certificate->is_present }}" />

                        <x-input-base id="edit-certificate-information-start_date-{{ $certificate->id }}"
                            label="Başlangıç Tarihi" type="month" name="start_date"
                            value="{{ \Carbon\Carbon::parse($certificate->start_date)->format('Y-m') }}" />

                        <x-input-base id="edit-certificate-information-end_date-{{ $certificate->id }}"
                            label="Bitiş Tarihi" type="month" name="end_date"
                            value="{{ \Carbon\Carbon::parse($certificate->end_date)->format('Y-m') }}" />

                        <x-input-base id="edit-certificate-information-description-{{ $certificate->id }}"
                            label="Açıklama" name="description" value="{{ $certificate->description }}" />

                        <x-slot name="formBtn">
                            <x-button-base text="Kaydet" />
                        </x-slot>
                    </x-slot>
                </x-modal-base>
            </div>
        @endif
    @endforeach
</div> --}}
