<div class="bg-white rounded-xl shadow-md p-4 space-y-3">
    <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">
            Profesionales destacados
        </h2>
    </div>

    @forelse ($profesionales as $profesional)
        @php
            $user = $profesional->user;
        @endphp

        @if ($user)
            <div class="border border-gray-100 rounded-lg px-3 py-2 flex flex-col gap-0.5">
                <p class="text-sm font-semibold text-gray-900">
                    {{ $user->name }}
                </p>

                <p class="text-xs text-gray-600">
                    {{ $user->email }}
                </p>

                <p class="text-xs text-gray-500">
                    {{ $profesional->profesion ?? 'Profesional' }}
                </p>
            </div>
        @endif
    @empty
        <p class="text-sm text-gray-500">
            Todavía no hay profesionales registrados.
        </p>
    @endforelse
</div>
