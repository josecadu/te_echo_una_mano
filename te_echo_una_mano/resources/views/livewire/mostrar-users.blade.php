<div class="bg-white rounded-xl shadow-md p-6 md:p-8 max-w-6xl mx-auto">
    <div class="mb-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">
            Usuarios registrados
        </h2>

        <!-- Botón Añadir usuario -->
        <button class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>
            Añadir usuario
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse ($users as $user)
            <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow duration-200 flex flex-col justify-between h-full">
                <div>
                    <p class="text-base font-semibold text-gray-800">
                        {{ $user->email }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $user->name }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $user->direccion }}
                    </p>
                </div>

                <!-- Botones de acción alineados horizontalmente -->
                <div class="flex justify-end gap-1.5 mt-4">
                    <!-- Editar -->
                    <button class="w-8 h-8 flex items-center justify-center rounded-full text-blue-600 hover:bg-blue-100 transition" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                        </svg>
                    </button>

                    <!-- Eliminar -->
                    <button class="w-8 h-8 flex items-center justify-center rounded-full text-red-600 hover:bg-red-100 transition" title="Eliminar"
                            onclick="confirm('¿Estás seguro de eliminar este usuario?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Convertir en Profesional -->
                    <button class="w-8 h-8 flex items-center justify-center rounded-full text-yellow-500 hover:bg-yellow-100 transition" title="Convertir en profesional">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 11V7a4 4 0 118 0v4M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-6">
                <p class="text-gray-500 text-sm">
                    Todavía no hay usuarios registrados.
                </p>
            </div>
        @endforelse
    </div>
</div>
