<div class="global_dashboard_timesheet">
    <div class="container my-5">
        
        <!-- Back Button -->
        <div class="back-navigation">
            <a href="{{ route('dashboard') }}" class="back-button">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Timesheet
            </a>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card timesheet-card p-4">
                    <h3 class="text-center mb-4">Salesperson Log Timesheet</h3>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Timesheet Form -->
                    <form action="{{ route('timesheet.submit') }}" method="POST">
                        @csrf
                        
                        <!-- Date -->
                        <div class="mb-3">
                            <label for="logDate" class="form-label">Date</label>
                            <input type="date" id="logDate" name="date" class="form-control" required />
                            @error('date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Salesperson Name -->
                        <div class="mb-3">
                            <label for="salespersonName" class="form-label">Salesperson Name</label>
                            <input type="text" id="salespersonName" name="name" class="form-control" placeholder="Enter name" required />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tasks -->
                        <div class="mb-3">
                            <label for="tasksCompleted" class="form-label">Tasks Completed</label>
                            <textarea id="tasksCompleted" name="tasks" class="form-control" rows="3" placeholder="Describe tasks completed" required></textarea>
                            @error('tasks')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hours Worked -->
                        <div class="mb-3">
                            <label for="hoursWorked" class="form-label">Hours Worked</label>
                            <input type="number" id="hoursWorked" name="hours" class="form-control" placeholder="Enter hours" required />
                            @error('hours')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom px-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Timesheet Records Table -->
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-center">Timesheet Records</h3>
                <a href="{{ route('history') }}" class="btn btn-secondary">
                    <i class="fas fa-clock"></i> View History
                </a>
            </div>
            <table class="table table-bordered" id="timesheetTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Salesperson</th>
                        <th>Tasks</th>
                        <th>Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timesheets as $timesheet)
                        <tr>
                            <td>{{ $timesheet->date }}</td>
                            <td>{{ $timesheet->name }}</td>
                            <td>{{ $timesheet->tasks }}</td>
                            <td>{{ $timesheet->hours }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="noResults" class="text-center text-danger d-none">No matching records found.</p>
        </div>
    </div>
</div>

<!-- JavaScript for Search & Auto-Move Data -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let logDate = document.getElementById("logDate");
        let today = new Date().toISOString().split("T")[0];

        // Prevent selecting future dates
        logDate.setAttribute("max", today); 

        // Allows only past 1-year entries
        logDate.setAttribute("min", new Date(new Date().setFullYear(new Date().getFullYear() - 1)).toISOString().split("T")[0]);

        // Check if the table has more than 10 entries
        checkTableEntries();
    });

    function searchFunction() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let table = document.getElementById("timesheetTable");
        let rows = table.getElementsByTagName("tr");
        let noResults = document.getElementById("noResults");
        let found = false;

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName("td");
            let rowMatch = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().includes(input)) {
                    rowMatch = true;
                    break;
                }
            }

            if (rowMatch) {
                rows[i].style.display = "";
                found = true;
            } else {
                rows[i].style.display = "none";
            }
        }

        noResults.classList.toggle("d-none", found);
    }

    function checkTableEntries() {
        let table = document.getElementById("timesheetTable");
        let rows = table.getElementsByTagName("tr");

        if (rows.length > 6) {
            let oldEntries = [];
            for (let i = 6; i < rows.length; i++) {
                let row = rows[i];
                let entry = {
                    date: row.cells[0].innerText,
                    name: row.cells[1].innerText,
                    tasks: row.cells[2].innerText,
                    hours: row.cells[3].innerText
                };
                oldEntries.push(entry);
                row.remove(); // Remove from current table
            }

            // Send old data to backend for history storage
            fetch("{{ route('moveToHistory') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ data: oldEntries })
            });
        }
    }
</script>
