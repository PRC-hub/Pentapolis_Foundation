
<div class="container my-5">
    <div class="back-navigation">
        <a href="/timesheet" class="back-button">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Timesheet
        </a>
    </div>

    <h3 class="text-center">Timesheet History</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Salesperson</th>
                <th>Tasks</th>
                <th>Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyRecords as $record)
                <tr>
                    <td>{{ $record->date }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->tasks }}</td>
                    <td>{{ $record->hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

