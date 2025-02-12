<div class="global_volunteer">
<div class="container my-5">
    <div class="text-center mb-4">
        <div class="header-text">
            <img src="{{ asset('images/logo/PPF-LOGO.jpg') }}" alt="Non-Profit Logo" class="logo" />
            <div>
                <h1 class="fw-bold">PENTAPOLIS Foundation</h1>
                <h2 class="h5 text-muted">Volunteer Application Form</h2>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('volunteer.store') }}">
                @csrf
                <!-- Personal Details Section -->
                <div class="form-section">
                    <h5 class="mb-3">Personal Details</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="row">
                            <div class="col-md-2">
                                <select class="form-select" name="title">
                                    <option selected>Mr.</option>
                                    <option>Ms.</option>
                                    <option>Mrs.</option>
                                    <option>Dr.</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" name="birth_date" required />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="example@example.com" required />
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-select" name="phone_code">
                                    @foreach ($volunteerData as $code => $country)
                                        <option value="{{ $code }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <input type="tel" class="form-control" name="phone_number" placeholder="Enter phone number" required />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add other sections (Address, Educational Background, etc.) in a similar format -->

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
