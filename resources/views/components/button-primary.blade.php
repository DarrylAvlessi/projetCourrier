<div class="mt-4 text-end">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}>
        {{ $slot }}
    </button>
</div>
