@extends('layouts.app', ['pageSlug' => 'dashboard', 'shop_slug' => 'shop_slug'])

@section('content')

@php 

$shop_slug = $slug;

@endphp
<livewire:admin.view-shop-request-component :slug="$shop_slug">

@endsection