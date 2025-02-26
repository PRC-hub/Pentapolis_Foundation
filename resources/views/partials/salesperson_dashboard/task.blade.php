<div class="global_salesperson_task">
<div class="container">

    <div class="back-navigation">
        <a href="{{ route('dashboard') }}" class="back-button">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Tasks & Targets
        </a>
    </div>
    <!-- <div class="search-box" id="searchBox">
            <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchFunction()">
            <button class="btn btn-primary" onclick="performSearch()">
                <i class="fas fa-search"></i>
            </button>
        </div> -->

    <div class="task-section">
        <div class="task-header">Tasks & Targets</div>

        <!-- Loop through tasks from JSON -->
        @foreach($tasks as $index => $task)
            <div class="task-card" id="task{{ $index + 1 }}">
                <div class="task-title">{{ $task['title'] }}</div>
                <div class="task-details">
                    <strong>Target:</strong> {{ $task['target'] }}<br>
                    <span class="badge badge-{{ $task['status_class'] }}" id="status{{ $index + 1 }}">{{ $task['status'] }}</span><br>
                    <span class="deadline">Deadline: {{ $task['deadline'] }}</span>
                </div>
            </div>
        @endforeach

        <!-- Chart.js Pie Chart -->
        <div class="chart-container">
            <canvas id="taskStatusChart"></canvas>
        </div>
    </div>
</div>
</div>


