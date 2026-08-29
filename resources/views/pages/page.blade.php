@extends('layouts.app')
@section('title',$page->title.' — OROGNA Consulting')
@section('content')
<section class="section-cream py-24"><div class="container-pro"><span class="eyebrow">OROGNA Consulting</span><h1 class="font-display mt-5 max-w-4xl text-5xl font-extrabold tracking-tight sm:text-6xl">{{ $page->title }}</h1><p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">{{ $page->excerpt }}</p></div></section><section class="bg-white py-20"><div class="container-pro">@if($page->image)<div class="mb-12 overflow-hidden rounded-[32px] shadow-xl"><img src="{{ asset($page->image) }}" alt="{{ $page->title }}" class="h-[320px] w-full object-cover sm:h-[430px]"></div>@endif<div class="prose prose-lg max-w-4xl whitespace-pre-line leading-9 text-slate-600">{{ $page->content }}</div></div></section>
@endsection
