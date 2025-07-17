<div class="flex flex-col mb-5">
    <h1 class="font-bold text-lg">DİLLER</h1>
    @foreach ($resume->languages as $language)
        <div>
            <h1 class="font-bold text-lg">{{ $language->language }}</h1>
            <p class="text-primary italic text-sm">{{ $language->level }}</p>
        </div>
    @endforeach
</div>
