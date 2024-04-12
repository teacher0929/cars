<div>
    <form action="{{ url()->current() }}" method="get">

        <div class="mb-3">
            <label for="q" class="form-label fw-semibold">Search</label>
            <input type="search" class="form-control" id="q" name="q" placeholder="2012 Toyota" value="{{ $f_q ?: '' }}" autofocus>
        </div>

        <div class="mb-3">
            <label for="user" class="form-label fw-semibold">User</label>
            <select class="form-select" id="user" name="user">
                <option value>-</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $f_user ? 'selected':'' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label fw-semibold">Location</label>
            <select class="form-select" id="location" name="location">
                <option value>-</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ $location->id == $f_location ? 'selected':'' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label fw-semibold">Brand</label>
            <select class="form-select" id="brand" name="brand">
                <option value>-</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id == $f_brand ? 'selected':'' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="brandModel" class="form-label fw-semibold">Brand Model</label>
            <select class="form-select" id="brandModel" name="brandModel">
                <option value>-</option>
                @foreach($brands as $brand)
                    @foreach($brand->brandModels as $brandModel)
                        <option value="{{ $brandModel->id }}" {{ $brandModel->id == $f_brandModel ? 'selected':'' }}>
                            {{ $brand->name }} / {{ $brandModel->name }}
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="colors" class="form-label fw-semibold">Colors</label>
            <select class="form-select" id="colors" name="colors[]" multiple size="3">
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ in_array($color->id, $f_colors) ? 'selected':'' }}>
                        {{ $color->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="years" class="form-label fw-semibold">Years</label>
            <select class="form-select" id="years" name="years[]" multiple size="3">
                @foreach($years as $year)
                    <option value="{{ $year->id }}" {{ in_array($year->id, $f_years) ? 'selected':'' }}>
                        {{ $year->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row g-2 mb-3">
            <div class="col">
                <label for="minPrice" class="form-label fw-semibold">Min Price</label>
                <input type="number" class="form-control" id="minPrice" name="minPrice" value="{{ $f_minPrice ?: '' }}">
            </div>
            <div class="col">
                <label for="maxPrice" class="form-label fw-semibold">Max Price</label>
                <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="{{ $f_maxPrice ?: '' }}">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="credit" name="credit" {{ $f_credit ? 'checked':'' }}>
                <label class="form-check-label" for="credit">
                    Credit
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="exchange" name="exchange" {{ $f_exchange ? 'checked':'' }}>
                <label class="form-check-label" for="exchange">
                    Exchange
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="hasImage" name="hasImage" {{ $f_hasImage ? 'checked':'' }}>
                <label class="form-check-label" for="hasImage">
                    Has Image
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="sortBy" class="form-label fw-semibold">Sort By</label>
            <select class="form-select" id="sortBy" name="sortBy">
                <option value {{ 'newToOld' == $f_sortBy ? 'selected':'' }}>
                    New To Old
                </option>
                <option value="lowToHigh" {{ 'lowToHigh' == $f_sortBy ? 'selected':'' }}>
                    Low To High
                </option>
                <option value="highToLow" {{ 'highToLow' == $f_sortBy ? 'selected':'' }}>
                    High To Low
                </option>
            </select>
        </div>

        <div class="row g-2">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col">
                <a href="{{ url()->current() }}" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>

    </form>
</div>
