<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modificar Encargo: {{ $pedido->postre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}">
                    @csrf
                    <!-- Mensajes de Error de Validación -->
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <strong class="font-bold">¡Atención con los datos!</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Cliente</label>
                        <input type="text" name="cliente" value="{{ $pedido->cliente }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Postre</label>
                        <input type="text" name="postre" value="{{ $pedido->postre }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Entrega</label>
                        <input type="date" name="fecha_entrega" value="{{ $pedido->fecha_entrega }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Mover Tarjeta a:</label>
                        <select name="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 font-bold bg-gray-50">
                            <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>🔴 Pendiente</option>
                            <option value="En Preparación" {{ $pedido->estado == 'En Preparación' ? 'selected' : '' }}>🟡 En Preparación</option>
                            <option value="Entregado" {{ $pedido->estado == 'Entregado' ? 'selected' : '' }}>🟢 Entregado</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Notas Técnicas</label>
                        <textarea name="notas" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ $pedido->notas }}</textarea>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('pedidos.index') }}" class="text-gray-500 hover:text-gray-700 font-bold">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Actualizar y Mover
                        </button>
                    </div>
                </form>
            </div>

            <!-- Botón de Eliminar (Zona de Peligro) -->
            <div class="bg-red-50 p-6 rounded-lg shadow-sm border border-red-200 flex justify-between items-center">
                <div>
                    <h3 class="text-red-800 font-bold">Zona de Peligro</h3>
                    <p class="text-sm text-red-600">Al eliminar este encargo, no podrás recuperarlo.</p>
                </div>
                <form method="POST" action="{{ route('pedidos.destroy', $pedido->id) }}" onsubmit="return confirm('¿Estás segura de cancelar y eliminar este encargo de Bouclée?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Eliminar Pedido
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>