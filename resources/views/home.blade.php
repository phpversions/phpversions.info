@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <router-link :to="{name: 'Home'}"><img src="/images/phpversions.png" class="h-64 w-64" alt="PHPVersions.info logo"></router-link>
    </div>
    <router-view></router-view>
</div>
@endsection
