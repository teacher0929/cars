@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container py-4">
        <div class="row g-3">
            @foreach($brands as $brand)
                <div class="col">
                    <div class="border rounded p-2">
                        <div class="h6">
                            <a href="{{ route('cars.index', ['brand' => $brand->id]) }}" class="link-dark text-decoration-none">
                                {{ $brand->name }}
                            </a>
                            <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                {{ $brand->cars_count }}
                            </span>
                        </div>
                        <div>
                            @foreach($brand->brandModels as $brandModel)
                                <div>
                                    <a href="{{ route('cars.index', ['brandModel' => $brandModel->id]) }}" class="link-dark text-decoration-none">
                                        {{ $brandModel->name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
