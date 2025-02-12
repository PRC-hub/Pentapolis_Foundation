<div class="global_monetary">
<div class="container mt-5">
    <div class="text-center mb-4">
        <img src="{{ asset($monetaryData['logo']) }}" alt="Logo" class="mb-2" style="width: 100px;">
        <h2>{{ $monetaryData['title'] }}</h2>
    </div>

    <form id="donationForm" action="{{ route('monetary.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ $monetaryData['labels']['fullName'] }} <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter your full name">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">{{ $monetaryData['labels']['address'] }} <span class="text-danger">*</span></label>
            <input type="text" id="address" name="address" class="form-control" required placeholder="Enter your address">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">{{ $monetaryData['labels']['phone'] }} <span class="text-danger">*</span></label>
            <input type="tel" id="phone" name="phone" class="form-control" required placeholder="Enter your phone number">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ $monetaryData['labels']['email'] }} <span class="text-danger">*</span></label>
            <input type="email" id="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">{{ $monetaryData['labels']['amount'] }} <span class="text-danger">*</span></label>
            <input type="number" id="amount" name="amount" class="form-control" required placeholder="Enter donation amount">
        </div>

        <div class="mb-3">
            <label for="payment" class="form-label">{{ $monetaryData['labels']['paymentMethod'] }} <span class="text-danger">*</span></label>
            <select id="payment" name="payment" class="form-select">
                @foreach($monetaryData['paymentMethods'] as $method)
                    <option value="{{ $method['value'] }}">{{ $method['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div id="offlineInvoice" class="d-none">
            <div class="mb-3">
                <label for="offlineInvoiceUpload" class="form-label">Upload Invoice</label>
                <input type="file" id="offlineInvoiceUpload" name="offlineInvoice" class="form-control" accept="image/*,application/pdf">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $monetaryData['labels']['submitText'] }}</button>
    </form>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentSelect = document.getElementById('payment');
        const offlineInvoice = document.getElementById('offlineInvoice');

        paymentSelect.addEventListener('change', function () {
            if (this.value === 'offline') {
                offlineInvoice.classList.remove('d-none');
            } else {
                offlineInvoice.classList.add('d-none');
            }
        });
    });
</script>
