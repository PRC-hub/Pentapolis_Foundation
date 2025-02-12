 <div class ="global_dashboard_invoice">
 <div class="container">
        <div class="text-center mb-5">
            <div class="back-navigation">
                <a href="{{ route('dashboard') }}" class="back-button">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Invoice System
                </a>
            </div>
            <h1 class="display-5">Invoice System</h1>
            <p class="text-muted">Review and manage invoices submitted by employees</p>
        </div>

        <!-- Invoice Upload Section -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Upload Invoice</h2>
            </div>
            <div class="card-body">
                <form id="invoice-form">
                    <div class="mb-3">
                        <label for="employee-name" class="form-label">Employee Name</label>
                        <input type="text" id="employee-name" class="form-control" placeholder="Enter employee's name" required>
                    </div>
                    <div class="mb-3">
                        <label for="invoice-description" class="form-label">Invoice Description</label>
                        <textarea id="invoice-description" class="form-control" placeholder="Enter invoice details" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="invoice-file" class="form-label">Upload Invoice</label>
                        <input type="file" id="invoice-file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </div>
        </div>

        <!-- Received Invoices Section -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h2 class="h5 mb-0">Received Invoices</h2>
            </div>
            <ul class="list-group list-group-flush" id="invoice-list">
                @foreach ($invoices as $invoice)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $invoice->description }} - Submitted by {{ $invoice->employee_name }}
                        <span class="badge bg-{{ $invoice->status === 'Approved' ? 'success' : ($invoice->status === 'Rejected' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($invoice->status) }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>

    <script>
        document.getElementById("invoice-form").addEventListener("submit", (e) => {
            e.preventDefault();

            const employeeName = document.getElementById("employee-name").value;
            const invoiceDescription = document.getElementById("invoice-description").value;
            const fileInput = document.getElementById("invoice-file");

            if (!fileInput.files.length) {
                alert("Please select an invoice file.");
                return;
            }

            const formData = new FormData();
            formData.append("employee_name", employeeName);
            formData.append("description", invoiceDescription);
            formData.append("invoice", fileInput.files[0]);
            formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

            fetch("{{ route('invoices.upload') }}", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const newInvoice = document.createElement("li");
                    newInvoice.className = "list-group-item d-flex justify-content-between align-items-center";
                    newInvoice.innerHTML = `
                        ${data.description} - Submitted by ${data.employee_name}
                        <span class="badge bg-secondary">Pending</span>
                    `;
                    document.getElementById("invoice-list").prepend(newInvoice);

                    document.getElementById("invoice-form").reset();
                } else {
                    alert("Upload failed, please try again.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    </script>

