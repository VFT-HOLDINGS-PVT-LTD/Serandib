<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Setup Wizard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --success-color: #10b981;
            --border-radius: 12px;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            overflow: hidden;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-footer {
            border-top: none;
            padding: 1.5rem;
            background: #f9fafb;
        }

        .step {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .step.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .progress-container {
            margin-bottom: 2rem;
        }

        .progress {
            height: 6px;
            border-radius: 3px;
            background-color: #e5e7eb;
        }

        .progress-bar {
            background-color: var(--primary-color);
            transition: var(--transition);
        }

        .step-header {
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.1rem;
        }

        .step-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0;
            color: #111827;
        }

        .form-control,
        .form-select {
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            transition: var(--transition);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .btn {
            border-radius: var(--border-radius);
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #0d9e6e;
            border-color: #0d9e6e;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #f3f4f6;
            border-color: #f3f4f6;
            color: #4b5563;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
            border-color: #e5e7eb;
            color: #1f2937;
        }

        .review-card {
            border-radius: var(--border-radius);
            border: 1px solid #e5e7eb;
            margin-bottom: 1rem;
            transition: var(--transition);
        }

        .review-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--box-shadow);
        }

        .review-card .card-body {
            padding: 1.5rem;
        }

        .review-card h5 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .floating-label input,
        .floating-label select {
            height: 50px;
            padding-top: 1.2rem;
        }

        .floating-label label {
            position: absolute;
            top: 15px;
            left: 15px;
            color: #6b7280;
            transition: var(--transition);
            pointer-events: none;
        }

        .floating-label input:focus+label,
        .floating-label input:not(:placeholder-shown)+label,
        .floating-label select:focus+label,
        .floating-label select:not([value=""])+label {
            top: 5px;
            left: 15px;
            font-size: 0.75rem;
            color: var(--primary-color);
        }

        .checkbox-card {
            border-radius: var(--border-radius);
            border: 1px solid #e5e7eb;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: var(--transition);
            cursor: pointer;
        }

        .checkbox-card:hover {
            border-color: var(--primary-color);
        }

        .checkbox-card.selected {
            border-color: var(--primary-color);
            background-color: rgba(99, 102, 241, 0.05);
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-top: 0.2em;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body>

    <!-- Trigger Button -->
    <button type="button" class="btn btn-primary btn-lg mx-auto d-block mt-5" data-bs-toggle="modal"
        data-bs-target="#setupModal">
        <i class="fas fa-rocket me-2"></i> Launch Setup
    </button>

    <!-- Modal -->
    <div class="modal fade" id="setupModal" tabindex="-1" aria-labelledby="setupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-magic me-2"></i> Setup Wizard</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Progress Bar -->
                    <div class="progress-container">
                        <div class="d-flex justify-content-between mb-2">
                            <small>Step <span id="current-step">1</span> of <span id="total-steps">4</span></small>
                            <small><span id="progress-percent">25</span>% Complete</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;"></div>
                        </div>
                    </div>

                    <!-- Form Steps -->
                    <form id="setupForm">
                        <!-- Step 1 -->
                        <div class="step active" id="step1">
                            <div class="step-header">
                                <div class="step-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h4 class="step-title">Personal Information</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" id="firstName" placeholder=" " required>
                                        <label for="firstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" id="lastName" placeholder=" " required>
                                        <label for="lastName">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-label">
                                <input type="email" class="form-control" id="email" placeholder=" " required>
                                <label for="email">Email Address</label>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="step" id="step2">
                            <div class="step-header">
                                <div class="step-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <h4 class="step-title">Account Security</h4>
                            </div>

                            <div class="floating-label">
                                <input type="text" class="form-control" id="username" placeholder=" " required>
                                <label for="username">Choose Username</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="floating-label">
                                        <input type="password" class="form-control" id="password" placeholder=" "
                                            required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-text">Minimum 8 characters</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="floating-label">
                                        <input type="password" class="form-control" id="confirmPassword" placeholder=" "
                                            required>
                                        <label for="confirmPassword">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="step" id="step3">
                            <div class="step-header">
                                <div class="step-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <h4 class="step-title">Preferences</h4>
                            </div>

                            <h6 class="mb-3 text-muted">Notification Settings</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox-card" onclick="toggleCheckbox('emailNotifications')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="emailNotifications">
                                            <label class="form-check-label" for="emailNotifications">
                                                <strong>Email Notifications</strong>
                                                <p class="text-muted small mb-0">Receive important updates via email</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox-card" onclick="toggleCheckbox('pushNotifications')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="pushNotifications">
                                            <label class="form-check-label" for="pushNotifications">
                                                <strong>Push Notifications</strong>
                                                <p class="text-muted small mb-0">Get real-time alerts on your device</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-label mt-3">
                                <select class="form-select" id="theme" required>
                                    <option value="" selected disabled></option>
                                    <option value="light">Light Theme</option>
                                    <option value="dark">Dark Theme</option>
                                    <option value="system">System Default</option>
                                </select>
                                <label for="theme">Theme Preference</label>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="step" id="step4">
                            <div class="step-header">
                                <div class="step-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <h4 class="step-title">Review & Submit</h4>
                            </div>

                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i> Almost done! Please review your information
                                before submitting.
                            </div>

                            <div class="review-card">
                                <div class="card-body">
                                    <h5><i class="fas fa-user-circle me-2"></i> Personal Information</h5>
                                    <p id="review-name" class="mb-1"><strong>Name:</strong> <span
                                            class="text-muted">Loading...</span></p>
                                    <p id="review-email"><strong>Email:</strong> <span
                                            class="text-muted">Loading...</span></p>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="card-body">
                                    <h5><i class="fas fa-shield-alt me-2"></i> Account Details</h5>
                                    <p id="review-username"><strong>Username:</strong> <span
                                            class="text-muted">Loading...</span></p>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="card-body">
                                    <h5><i class="fas fa-sliders-h me-2"></i> Preferences</h5>
                                    <p id="review-notifications" class="mb-1"><strong>Notifications:</strong> <span
                                            class="text-muted">Loading...</span></p>
                                    <p id="review-theme"><strong>Theme:</strong> <span
                                            class="text-muted">Loading...</span></p>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                                <label class="form-check-label" for="termsAgreement">
                                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-outline-secondary" id="prevBtn" disabled>
                        <i class="fas fa-arrow-left me-1"></i> Previous
                    </button>
                    <button type="button" class="btn btn-primary" id="nextBtn">
                        Next <i class="fas fa-arrow-right ms-1"></i>
                    </button>
                    <button type="button" class="btn btn-success" id="submitBtn" style="display: none;">
                        <i class="fas fa-paper-plane me-1"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('setupModal'));
            const steps = document.querySelectorAll('.step');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const progressBar = document.querySelector('.progress-bar');
            const currentStepDisplay = document.getElementById('current-step');
            const totalStepsDisplay = document.getElementById('total-steps');
            const progressPercentDisplay = document.getElementById('progress-percent');
            let currentStep = 0;

            // Initialize the form
            totalStepsDisplay.textContent = steps.length;
            showStep(currentStep);

            // Next button click handler
            nextBtn.addEventListener('click', function () {
                if (currentStep < steps.length - 1) {
                    if (validateStep(currentStep)) {
                        currentStep++;
                        showStep(currentStep);
                        updateProgress();
                    }
                }
            });

            // Previous button click handler
            prevBtn.addEventListener('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                    updateProgress();
                }
            });

            // Submit button click handler
            submitBtn.addEventListener('click', function () {
                if (validateStep(currentStep)) {
                    updateReviewSection();

                    // Simulate form submission
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Processing...';
                    submitBtn.disabled = true;

                    setTimeout(function () {
                        // In a real app, you would submit the form here
                        alert('Setup completed successfully!');
                        modal.hide();
                        resetForm();
                    }, 1500);
                }
            });

            // Show the current step with animation
            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });

                // Update button visibility
                prevBtn.disabled = stepIndex === 0;
                nextBtn.style.display = stepIndex === steps.length - 1 ? 'none' : 'inline-block';
                submitBtn.style.display = stepIndex === steps.length - 1 ? 'inline-block' : 'none';
                currentStepDisplay.textContent = stepIndex + 1;
            }

            // Validate the current step
            function validateStep(stepIndex) {
                let isValid = true;
                const currentStepEl = steps[stepIndex];

                // Validate required fields
                const requiredFields = currentStepEl.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('is-invalid');
                        isValid = false;

                        // Add error message if not already present
                        if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('invalid-feedback')) {
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'invalid-feedback';
                            errorDiv.textContent = 'This field is required';
                            field.parentNode.insertBefore(errorDiv, field.nextSibling);
                        }
                    } else {
                        field.classList.remove('is-invalid');
                        const errorMsg = field.nextElementSibling;
                        if (errorMsg && errorMsg.classList.contains('invalid-feedback')) {
                            errorMsg.remove();
                        }
                    }
                });

                // Special validation for passwords
                if (stepIndex === 1) {
                    const password = document.getElementById('password').value;
                    const confirmPassword = document.getElementById('confirmPassword').value;

                    if (password.length < 8) {
                        document.getElementById('password').classList.add('is-invalid');
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback';
                        errorDiv.textContent = 'Password must be at least 8 characters';
                        document.getElementById('password').parentNode.insertBefore(errorDiv, document.getElementById('password').nextSibling);
                        isValid = false;
                    }

                    if (password !== confirmPassword) {
                        document.getElementById('confirmPassword').classList.add('is-invalid');
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback';
                        errorDiv.textContent = 'Passwords do not match';
                        document.getElementById('confirmPassword').parentNode.insertBefore(errorDiv, document.getElementById('confirmPassword').nextSibling);
                        isValid = false;
                    }
                }

                // Special validation for terms agreement
                if (stepIndex === 3 && !document.getElementById('termsAgreement').checked) {
                    document.getElementById('termsAgreement').classList.add('is-invalid');
                    isValid = false;
                }

                return isValid;
            }

            // Update progress indicators
            function updateProgress() {
                const progress = ((currentStep + 1) / steps.length) * 100;
                progressBar.style.width = `${progress}%`;
                progressPercentDisplay.textContent = Math.round(progress);
            }

            // Update the review section
            function updateReviewSection() {
                document.getElementById('review-name').innerHTML =
                    `<strong>Name:</strong> <span class="text-muted">${document.getElementById('firstName').value} ${document.getElementById('lastName').value}</span>`;
                document.getElementById('review-email').innerHTML =
                    `<strong>Email:</strong> <span class="text-muted">${document.getElementById('email').value}</span>`;
                document.getElementById('review-username').innerHTML =
                    `<strong>Username:</strong> <span class="text-muted">${document.getElementById('username').value}</span>`;

                const notifications = [];
                if (document.getElementById('emailNotifications').checked) notifications.push('Email');
                if (document.getElementById('pushNotifications').checked) notifications.push('Push');

                document.getElementById('review-notifications').innerHTML =
                    `<strong>Notifications:</strong> <span class="text-muted">${notifications.join(', ') || 'None'}</span>`;
                document.getElementById('review-theme').innerHTML =
                    `<strong>Theme:</strong> <span class="text-muted">${document.getElementById('theme').options[document.getElementById('theme').selectedIndex].text}</span>`;
            }

            // Reset the form
            function resetForm() {
                document.getElementById('setupForm').reset();
                currentStep = 0;
                showStep(currentStep);
                updateProgress();
                submitBtn.innerHTML = '<i class="fas fa-paper-plane me-1"></i> Submit';
                submitBtn.disabled = false;
            }
        });

        // Helper function for checkbox cards
        function toggleCheckbox(id) {
            const checkbox = document.getElementById(id);
            checkbox.checked = !checkbox.checked;
            const card = checkbox.closest('.checkbox-card');
            if (checkbox.checked) {
                card.classList.add('selected');
            } else {
                card.classList.remove('selected');
            }
        }
    </script>
</body>

</html>