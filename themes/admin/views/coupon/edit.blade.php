@extends('layouts.app', ['pageSlug' => 'dashboard', 'coupon_id' => 'coupon_id'])

@section('content')

@php 
$coupon_id = $id;
@endphp

<livewire:admin.edit-coupon-component :id="$coupon_id">

@endsection