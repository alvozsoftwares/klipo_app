<button {{ $attributes->merge(['class' => 'px-4 py-3 inline-flex gap-2 font-bold rounded-lg cursor-pointer bg-white text-black hover:bg-tertiary/20 transition duration-200 ease-in-out hover:scale-95', 'type' => 'button']) }}>
    {{ $slot }}
</button>