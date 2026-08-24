@extends('layouts.frontend')

@section('title', 'FAQ')

@section('content')
<div class="bg-[#0B2A4A] py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-white">FAQ</h1>
        <p class="text-blue-200 mt-3">Pertanyaan yang sering diajukan.</p>
        <div class="h-1 w-20 bg-blue-500 mt-4"></div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 py-16">
    <div class="space-y-4">
        @foreach ($faqs as $faq)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="font-bold text-lg mb-2">{{ $faq->pertanyaan }}</h3>
            <p class="text-gray-600 text-sm">{{ $faq->jawaban }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection