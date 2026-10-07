<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tablero de Encargos - Bouclée') }}
            </h2>
            <a href="{{ route('pedidos.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded shadow">
                + Nuevo Pedido
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de éxito al guardar/editar -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Contenedor del Kanban (3 columnas) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Columna: PENDIENTE -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-inner">
                    <h3 class="font-bold text-lg text-gray-700 mb-4 border-b-2 border-red-400 pb-2">🔴 Pendientes</h3>
                    @foreach($pedidos->where('estado', 'Pendiente') as $pedido)
                        <div class="bg-white p-4 rounded shadow mb-3 border-l-4 border-red-400">
                            <h4 class="font-bold text-md">{{ $pedido->postre }}</h4>
                            <p class="text-sm text-gray-600">Cliente: {{ $pedido->cliente }}</p>
                            <p class="text-sm text-gray-600 font-semibold mt-1">Entrega: {{ \Carbon\Carbon::parse($pedido->fecha_entrega)->format('d/m/Y') }}</p>
                            <div class="mt-3 flex justify-end">
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-xs text-blue-600 hover:underline">Ver / Editar</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Columna: EN PREPARACIÓN -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-inner">
                    <h3 class="font-bold text-lg text-gray-700 mb-4 border-b-2 border-yellow-400 pb-2">🟡 En Preparación</h3>
                    @foreach($pedidos->where('estado', 'En Preparación') as $pedido)
                        <div class="bg-white p-4 rounded shadow mb-3 border-l-4 border-yellow-400">
                            <h4 class="font-bold text-md">{{ $pedido->postre }}</h4>
                            <p class="text-sm text-gray-600">Cliente: {{ $pedido->cliente }}</p>
                            <p class="text-sm text-gray-600 font-semibold mt-1">Entrega: {{ \Carbon\Carbon::parse($pedido->fecha_entrega)->format('d/m/Y') }}</p>
                            <div class="mt-3 flex justify-end">
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-xs text-blue-600 hover:underline">Ver / Editar</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Columna: ENTREGADO -->
                <div class="bg-gray-100 rounded-lg p-4 shadow-inner">
                    <h3 class="font-bold text-lg text-gray-700 mb-4 border-b-2 border-green-400 pb-2">🟢 Entregados</h3>
                    @foreach($pedidos->where('estado', 'Entregado') as $pedido)
                        <div class="bg-white p-4 rounded shadow mb-3 border-l-4 border-green-400 opacity-75">
                            <h4 class="font-bold text-md line-through text-gray-500">{{ $pedido->postre }}</h4>
                            <p class="text-sm text-gray-600">Cliente: {{ $pedido->cliente }}</p>
                            <div class="mt-3 flex justify-end">
                                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="text-xs text-blue-600 hover:underline">Revisar</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>