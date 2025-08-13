<button {{ $attributes->merge(['class' => 'px-3 lg:px-4 py-2 lg:py-3 inline-flex gap-2 text-sm lg:text-base font-bold text-left items-center rounded-lg cursor-pointer bg-white text-black hover:bg-tertiary/20 transition duration-200 ease-in-out hover:scale-95', 'type' => 'button']) }}>
    {{ $slot }}
</button>