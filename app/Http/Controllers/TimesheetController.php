<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use App\Models\History;

class TimesheetController extends Controller
{
    // Show the timesheet page
    public function showTimesheet()
    {
        $timesheets = Timesheet::all();
        return view('timesheet', compact('timesheets'));
    }

    // Submit a new timesheet entry
    public function submitTimesheet(Request $request)
    {
        // Validate input
        $request->validate([
            'date' => [
                'required',
                'date',
                'before_or_equal:today', // Prevents future dates
                'after_or_equal:' . now()->subYear()->format('Y-m-d'), // Limits to last 1 year
                function ($attribute, $value, $fail) use ($request) {
                    if (Timesheet::where('date', $value)->where('name', $request->name)->exists()) {
                        $fail('You have already submitted a timesheet for this date.');
                    }
                }
            ],
            'name' => 'required|string|max:255',
            'tasks' => 'required|string',
            'hours' => 'required|integer|min:1'
        ]);

        // Store the new timesheet entry
        Timesheet::create([
            'date' => $request->date,
            'name' => $request->name,
            'tasks' => $request->tasks,
            'hours' => $request->hours,
        ]);

        // Automatically move old records to history if the table has 10 entries
        $this->moveOldTimesheetsToHistory();

        return redirect()->route('timesheet.show')->with('success', 'Timesheet submitted successfully!');
    }

    // Show the history page
    public function history()
    {
        $historyRecords = History::all();
        return view('history', compact('historyRecords'));
    }

    // Move the oldest timesheet records to history when count exceeds 10
    private function moveOldTimesheetsToHistory()
    {
        $timesheetCount = Timesheet::count();

        if ($timesheetCount > 6) {
            $oldEntries = Timesheet::orderBy('date', 'asc')->take($timesheetCount - 6)->get();

            foreach ($oldEntries as $entry) {
                // Move data to the history table
                History::create([
                    'date' => $entry->date,
                    'name' => $entry->name,
                    'tasks' => $entry->tasks,
                    'hours' => $entry->hours,
                ]);

                // Delete from timesheet table
                $entry->delete();
            }
        }
    }
}
