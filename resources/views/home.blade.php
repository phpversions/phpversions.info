@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <img src="/images/php-versions.png" class="h-64 w-64" alt="PHPVersions.info logo">
    </div>
    <router-view></router-view>
</div>
@endsection
