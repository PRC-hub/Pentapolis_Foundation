<div class="global_profileDashboard">
<div class="container mt-5">
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Title -->
            <h2 class="mb-4">User Profile</h2>
            <!-- Cross Button to Redirect to Home Page -->
            <a href="{{ route('home') }}" class="btn-close" aria-label="Close"></a>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/' . ($user->profile_picture ?? 'images/default-avatar.png')) }}" 
                    alt="Profile Picture" 
                    class="img-fluid rounded mb-3" 
                    width="150">

                <h4>{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>User Type:</th>
                        <td>{{ $user->user_type ?? 'Not Set' }}</td>
                    </tr>
                    <tr>
                        <th>Account Created:</th>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                </table>
                <!-- Edit Profile Button -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Edit Profile
                </button>
                <!-- Logout Form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture:*(jpeg,jpg,png)</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
