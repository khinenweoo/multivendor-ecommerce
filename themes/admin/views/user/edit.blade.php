@extends('layouts.app', ['pageSlug' => 'dashboard', 'user_id' => 'user_id'])

@section('content')

@php 

$user_id = $id;

@endphp
<livewire:admin.edit-user-component :id="$user_id">

@endsection