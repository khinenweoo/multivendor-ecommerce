@extends('layouts.app', ['pageSlug' => 'dashboard', 'product_slug' => 'product_slug'])

@section('content')

@php 

$product_slug = $slug;

@endphp
<livewire:admin.edit-product-component :slug="$product_slug">

@endsection