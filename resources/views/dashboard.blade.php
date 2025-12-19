@extends('layouts.app')


@section('title','Panel de Control')


@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">


<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">CATEGORIAS</h3>
    <p class="text-3xl font-bold">{{ $totalCategorias }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">COMPRAS</h3>
    <p class="text-3xl font-bold">{{ $totalCompras }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">PEDIDOS</h3>
    <p class="text-3xl font-bold">{{ $totalPedidos }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">PRODUCCIONES</h3>
    <p class="text-3xl font-bold">{{ $totalProducciones }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">PRODUCTOS</h3>
    <p class="text-3xl font-bold">{{ $totalProductos }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">ROLES</h3>
    <p class="text-3xl font-bold">{{ $totalRoles }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">USUARIOS</h3>
    <p class="text-3xl font-bold">{{ $totalUsuarios }}</p>
</div>

<div class="bg-white p-6 rounded-xl shadow">
    <h3 class="text-sm text-gray-500">VENTAS</h3>
    <p class="text-3xl font-bold">{{ $totalVentas }}</p>
</div>

@endsection