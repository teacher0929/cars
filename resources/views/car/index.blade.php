@extends('layouts.app')
@section('title')
    All Cars
@endsection
@section('content')
    <div class="container py-4">
        <div class="row g-3">
            @foreach($objs as $obj)
                <div class="col-12">
                    <div class="border rounded p-3">
                        {{ $obj->title }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pt-4">
            {{ $objs->links() }}
        </div>
    </div>
@endsection
