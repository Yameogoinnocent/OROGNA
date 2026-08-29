@extends('layouts.app')
@section('title',$album->title.' — Galerie OROGNA')
@section('content')
<section class="gallery-detail-hero"><div class="container-pro"><a href="{{ route('gallery.index') }}" class="gallery-back">← Retour à la galerie</a><h1>{{ $album->title }}</h1><p>{{ $album->description }}</p></div></section><section class="gallery-section gallery-detail"><div class="container-pro"><div class="gallery-photo-grid">@foreach(($album->images ?: []) as $image)<a href="{{ asset($image) }}" target="_blank" class="gallery-photo"><img src="{{ asset($image) }}" alt="{{ $album->title }}"></a>@endforeach</div></div></section>
@endsection
