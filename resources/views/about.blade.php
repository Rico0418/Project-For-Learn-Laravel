<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Halaman About</h3>
    <p>Nama: {{ $name }}</p>
    <img src="{{ asset('img/TopGear.png') }}" class="w-15 h-10" alt="">
  </x-layout>