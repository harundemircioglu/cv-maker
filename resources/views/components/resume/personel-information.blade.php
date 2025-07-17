<div class="flex flex-col items-start">
    <div class="border-l-secondary border-l-[50px] pl-5 text-secondary text-4xl mb-5">
        <h1>{{ $resume->name }}</h1>
        <h1>{{ $resume->surname }}</h1>
    </div>
    <div class="pl-5 ml-[50px] print:text-sm">
        <p>{{ $resume->description }}</p>
    </div>
</div>

<div class="flex justify-center">
    <img class="rounded-full w-36 h-44 shadow-sm" src="{{ Storage::url($resume->profile_image) }}">
</div>

<div class="flex flex-col items-end">
    <div class="flex items-center gap-2 mb-5">
        <p>{{ $resume->email }}</p>
        <i class="fa-solid fa-envelope"></i>
    </div>

    <div class="flex items-center gap-2 mb-5">
        <p>{{ $resume->phone }}</p>
        <i class="fa-solid fa-mobile"></i>
    </div>

    <div class="flex items-center gap-2 mb-5">
        <p>{{ $resume->city }}</p>
        <i class="fa-solid fa-location-dot"></i>
    </div>
</div>
