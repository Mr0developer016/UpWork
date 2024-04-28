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
            <label for="category" class="form-label fw-semibold">Category</label>
            <select class="form-select" id="category" name="category">
                <option value>-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $f_category ? 'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="experiences" class="form-label fw-semibold">Experiences</label>
            <select class="form-select" id="experiences" name="experiences[]" multiple size="3">
                @foreach($experiences as $experience)
                    <option value="{{ $experience->id }}" {{ in_array($experience->id, $f_experiences) ? 'selected':'' }}>
                        {{ $experience->name }}
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
                <button type="submit" class="btn btn-secondary w-100">Filter</button>
            </div>
            <div class="col">
                <a href="{{ url()->current() }}" class="btn btn-secondary w-100">Clear</a>
            </div>
        </div>

    </form>
</div>
