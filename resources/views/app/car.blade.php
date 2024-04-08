<div class="fw-semibold border rounded p-3">
    <div class="row row-cols-5">
        <div class="col text-truncate">
            <span class="text-secondary">User:</span> {{ $obj->user->name }}
        </div>
        <div class="col text-truncate">
            <span class="text-secondary">Brand:</span> {{ $obj->brand->name }}
        </div>
        <div class="col">
            <span class="text-secondary">Color:</span> {{ $obj->color->name }}
        </div>
        <div class="col">
            <span class="text-secondary">Credit:</span>
            @if($obj->credit)
                <span class="text-success">Yes</span>
            @else
                <span class="text-danger">No</span>
            @endif
        </div>
        <div class="col">
            <span class="text-secondary">Price:</span> {{ number_format($obj->price, 2, '.', ' ') }} <small>TMT</small>
        </div>
        <div class="col text-truncate">
            <span class="text-secondary">Location:</span> {{ $obj->location->name }}
        </div>
        <div class="col">
            <span class="text-secondary">Model:</span> {{ $obj->brandModel->name }}
        </div>
        <div class="col">
            <span class="text-secondary">Year:</span> {{ $obj->year->name }}
        </div>
        <div class="col">
            <span class="text-secondary">Exchange:</span>
            @if($obj->exchange)
                <span class="text-success">Yes</span>
            @else
                <span class="text-danger">No</span>
            @endif
        </div>
        <div class="col">
            <span class="text-secondary">Date:</span> {{ $obj->created_at->format('d.m.Y') }}
        </div>
    </div>
</div>
