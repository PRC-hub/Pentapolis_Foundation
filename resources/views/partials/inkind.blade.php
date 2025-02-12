<div class="container mt-5">
    <div class="d-flex align-items-center mb-4">
        <div class="text-center w-100">
            <div class="mb-2">
                {!! $inKindData['heartIcon'] !!}
            </div>
            <h2>{{ $inKindData['title'] }}</h2>
        </div>
    </div>

    <form action="{{ route('donation.submit') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="firstName" class="form-label">{{ $inKindData['labels']['firstName'] }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First" required>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">{{ $inKindData['labels']['lastName'] }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">{{ $inKindData['labels']['address'] }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control mb-2" id="address" name="address" placeholder="Street Address" required>
            <input type="text" class="form-control mb-2" id="address2" name="address2" placeholder="Street Address Line 2">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" id="region" name="region" placeholder="Region">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Postal / Zip Code" required>
                </div>
                <div class="col-md-6">
                    <select class="form-select" id="country" name="country" required>
                        @foreach($inKindData['countries'] as $country)
                            <option value="{{ $country['value'] }}" {{ $country['selected'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label">{{ $inKindData['labels']['email'] }} <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">{{ $inKindData['labels']['phone'] }} <span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-select" id="countryCode" name="countryCode" required>
                        @foreach($inKindData['phoneCodes'] as $code)
                            <option value="{{ $code['value'] }}" {{ $code['selected'] ? 'selected' : '' }}>{{ $code['label'] }}</option>
                        @endforeach
                    </select>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g., 1234567890" pattern="[0-9]{10}" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ $inKindData['labels']['description'] }} <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="estimatedValue" class="form-label">{{ $inKindData['labels']['estimatedValue'] }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="estimatedValue" name="estimatedValue" placeholder="e.g., 100" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">{{ $inKindData['labels']['date'] }} <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ $inKindData['labels']['category'] }} <span class="text-danger">*</span></label>
            <select class="form-select" id="category" name="category" required>
                @foreach($inKindData['categories'] as $category)
                    <option value="{{ $category['value'] }}">{{ $category['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="anonymousDonation" name="anonymousDonation">
            <label class="form-check-label" for="anonymousDonation">
                {{ $inKindData['labels']['anonymousDonation'] }}
            </label>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">{{ $inKindData['submitText'] }}</button>
        </div>
    </form>
</div>
