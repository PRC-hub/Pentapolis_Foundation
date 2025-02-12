<div class="global_dashboard_help">
    <div class="body_help">
    <h2>Help & Support</h2>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs" id="contactTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="support-tab" data-bs-toggle="tab" href="#support" role="tab">Contact Support</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="feedback-tab" data-bs-toggle="tab" href="#feedback" role="tab">Feedback</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="announcements-tab" data-bs-toggle="tab" href="#announcements" role="tab">Announcements</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3">
        <!-- Contact Support Tab -->
        <div class="tab-pane fade show active" id="support" role="tabpanel">
            <p><strong>Need help? Contact us through:</strong></p>
            <ul>
                <li>Phone: +1-234-567-890</li>
                <li>Email: support@example.com</li>
                <li>Dedicated Team: sales_support@example.com</li>
            </ul>
        </div>

        <!-- Feedback Tab -->
        <div class="tab-pane fade" id="feedback" role="tabpanel">
            <form action="{{ route('help-center.feedback') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label required">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Feedback</label>
                    <textarea name="feedback" class="form-control" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>

        <!-- Announcements Tab -->
        <div class="tab-pane fade" id="announcements" role="tabpanel">
            <h6>Latest Announcements:</h6>
            <ul>
                @if(!empty($helpData['announcements']))
                    @foreach($helpData['announcements'] as $announcement)
                        <li>{{ $announcement }}</li>
                    @endforeach
                @else
                    <li>No announcements available.</li>
                @endif
            </ul>
        </div>
    </div>
</div>
</div>