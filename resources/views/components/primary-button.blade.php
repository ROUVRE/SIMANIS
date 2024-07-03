<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'flex cursor-pointer flex-row items-center justify-center overflow-hidden rounded-lg bg-purple-600 px-12 py-3 [border:none] hover:bg-darkorchid']) }}>
    <div
        class="relative inline-block min-w-[42px] text-left font-text-base-font-normal text-sm font-medium leading-[150%] text-white">
        {{ $slot }}
    </div>
</button>
