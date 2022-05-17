@extends('layouts.app', ['pageSlug' => 'dashboard', 'order_id' => 'order_id'])

@section('content')


<livewire:admin.update-order-component :id="$order_id">

@endsection