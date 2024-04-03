<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
<div class="container py-4">
    <div class="row g-3">
        @foreach($brands as $brand)
            <div class="col">
                <div class="border rounded p-2">
                    <div class="h6">
                        {{ $brand->name }}
                        <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                {{ $brand->cars_count }}
                            </span>
                    </div>
                    <div>
                        @foreach($brand->brandModels as $model)
                            <div>
                                {{ $model->name }}
                                <span class="badge bg-success-subtle text-success-emphasis rounded-pill">
                                    {{ $model->cars_count }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
