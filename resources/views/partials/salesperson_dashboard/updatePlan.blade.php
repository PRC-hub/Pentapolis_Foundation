<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sales Plan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Update Sales Plan</h1>

        <!-- Input Form -->
        <div class="mb-4">
            <textarea id="salesActivity" class="form-control mb-2" placeholder="Describe your sales activity..." rows="3"></textarea>
            <input type="number" id="salesTarget" class="form-control mb-2" placeholder="Enter your sales target...">
            <button id="updateButton" class="btn btn-success w-100">Update</button>
        </div>

        <!-- Real-Time Updates Section -->
        <h3 class="text-center mb-3">Real-time Updates</h3>
        <div id="updatesContainer" class="list-group">
            @foreach ($salesUpdates as $update)
                <div class="list-group-item">
                    <strong>Sales Activity:</strong> {{ $update['salesActivity'] }}<br>
                    <strong>Sales Target:</strong> {{ $update['salesTarget'] }} sales<br>
                    <small class="text-muted">Updated on: {{ $update['date'] }} at {{ $update['time'] }}</small>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function handleUpdate() {
            const salesActivity = document.getElementById("salesActivity").value.trim();
            const salesTarget = document.getElementById("salesTarget").value.trim();
            const updatesContainer = document.getElementById("updatesContainer");

            if (!salesActivity || !salesTarget) {
                alert("Please enter both sales activity and target.");
                return;
            }

            fetch("{{ route('sales.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    salesActivity: salesActivity,
                    salesTarget: salesTarget
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const now = new Date();
                    const date = now.toLocaleDateString();
                    const time = now.toLocaleTimeString();

                    const updateItem = document.createElement("div");
                    updateItem.className = "list-group-item";
                    updateItem.innerHTML = `
                        <strong>Sales Activity:</strong> ${salesActivity}<br>
                        <strong>Sales Target:</strong> ${salesTarget} sales<br>
                        <small class="text-muted">Updated on: ${date} at ${time}</small>
                    `;
                    updatesContainer.prepend(updateItem);

                    document.getElementById("salesActivity").value = "";
                    document.getElementById("salesTarget").value = "";
                }
            });
        }

        document.getElementById("updateButton").addEventListener("click", handleUpdate);

        document.addEventListener("keydown", (event) => {
            if (event.key === "Enter") {
                event.preventDefault();
                handleUpdate();
            }
        });
    </script>
</body>
</html>
