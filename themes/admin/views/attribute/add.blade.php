@extends('layouts.app', ['pageSlug' => 'dashboard', 'product_id' => 'product_id'])
@section('content')

@php 
$product_id = $product_id;
@endphp
<livewire:admin.add-product-attribute-component :id="$product_id">
@endsection