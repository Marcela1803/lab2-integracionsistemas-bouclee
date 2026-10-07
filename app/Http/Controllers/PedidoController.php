<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // 1. Mostrar el Tablero Kanban
    public function index()
    {
        // Traemos únicamente los pedidos del usuario autenticado, ordenados por fecha de entrega
        $pedidos = auth()->user()->pedidos()->orderBy('fecha_entrega', 'asc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    // 2. Mostrar el formulario de creación
    public function create()
    {
        return view('pedidos.create');
    }

    // 3. Guardar el nuevo pedido en la base de datos
    public function store(Request $request)
    {
        // Validaciones básicas (cubriremos esto a fondo en tu tarjeta de Seguridad)
        $request->validate([
            'cliente' => 'required|string|max:255',
            'postre' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|in:Pendiente,En Preparación,Entregado',
            'notas' => 'nullable|string'
        ]);

        // Guardamos el pedido atándolo automáticamente al ID del usuario activo
        auth()->user()->pedidos()->create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Encargo registrado exitosamente.');
    }

    // 4. Mostrar un pedido específico (no lo usaremos en el Kanban, pero la estructura lo pide)
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    // 5. Mostrar formulario para editar
    public function edit(Pedido $pedido)
    {
        // Validar que el pedido pertenezca al usuario activo
        if ($pedido->user_id !== auth()->id()) {
            abort(403, 'Acceso denegado');
        }
        return view('pedidos.edit', compact('pedido'));
    }

    // 6. Actualizar el pedido en la base de datos (Incluye mover las tarjetas de estado)
    public function update(Request $request, Pedido $pedido)
    {
        if ($pedido->user_id !== auth()->id()) {
            abort(403, 'Acceso denegado');
        }

        $request->validate([
            'cliente' => 'required|string|max:255',
            'postre' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|in:Pendiente,En Preparación,Entregado',
            'notas' => 'nullable|string'
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Encargo actualizado.');
    }

    // 7. Eliminar un pedido
    public function destroy(Pedido $pedido)
    {
        if ($pedido->user_id !== auth()->id()) {
            abort(403, 'Acceso denegado');
        }

        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Encargo eliminado.');
    }
}