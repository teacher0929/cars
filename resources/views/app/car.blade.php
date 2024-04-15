<div class="fw-semibold bg-white border rounded p-3">
    <div class="row g-2">
        <div class="col-12 fs-4">
            {{ $obj->title }}
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">User:</span>
            <span class="{{ isset($f_user) ? 'mark':'' }}">
                {{ $obj->user->name }}
            </span>
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">Brand:</span>
            <span class="{{ isset($f_brand) ? 'mark':'' }}">
                {{ $obj->brand->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Color:</span>
            <span class="{{ count($f_colors) > 0 ? 'mark':'' }}">
                {{ $obj->color->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Credit:</span>
            @if($obj->credit)
                <span class="text-success {{ $f_credit ? 'mark':'' }}">Yes</span>
            @else
                <span class="text-danger">No</span>
            @endif
        </div>
        <div class="col-3 text-truncate">
            <span class="text-secondary">Location:</span>
            <span class="{{ isset($f_location) ? 'mark':'' }}">
                {{ $obj->location->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Model:</span>
            <span class="{{ isset($f_brandModel) ? 'mark':'' }}">
                {{ $obj->brandModel->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Year:</span>
            <span class="{{ count($f_years) > 0 ? 'mark':'' }}">
                {{ $obj->year->name }}
            </span>
        </div>
        <div class="col-3">
            <span class="text-secondary">Exchange:</span>
            @if($obj->exchange)
                <span class="text-success {{ $f_exchange ? 'mark':'' }}">Yes</span>
            @else
                <span class="text-danger">No</span>
            @endif
        </div>
        <div class="col-3">
            <span class="text-secondary">Date:</span> {{ $obj->created_at->format('d.m.Y') }}
        </div>
        <div class="col-9">
            <span class="text-secondary">Price:</span>
            <span class="{{ (isset($f_minPrice) or isset($f_maxPrice)) ? 'mark':'' }}">{{ number_format($obj->price, 2, '.', ' ') }} <small>TMT</small></span>
        </div>
        <div class="col-12">
            <span class="text-secondary">Description:</span> {{ $obj->body }}
        </div>
    </div>
</div>
