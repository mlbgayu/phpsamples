<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="d-flex justify-content-between mb-3 border p-3 bg-light">
        <p class="h4 text-dark">Dashboard</p>
        <div >
        </div>
    </div>
    <div class="container-fluid border">
        <p class="h6  text-primary">Welcome to {{ config('app.name') }}</p>
    </div>



</x-app-layout>
