<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Multi-Step Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .new-trigger-btn {
            background-color: #4f46e5;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .new-trigger-btn:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .new-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .new-modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .new-modal-container {
            background-color: white;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .new-modal-overlay.active .new-modal-container {
            transform: translateY(0);
        }

        .new-modal-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .new-modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
        }

        .new-close-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s ease;
        }

        .new-close-btn:hover {
            color: #111827;
        }

        .new-modal-body {
            padding: 20px;
        }

        .new-progress-container {
            margin-bottom: 24px;
        }

        .new-progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .new-progress-bar {
            height: 6px;
            background-color: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .new-progress-fill {
            height: 100%;
            background-color: #4f46e5;
            width: 25%;
            transition: width 0.4s ease;
        }

        .new-step {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }

        .new-step.active {
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

        .new-step-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
        }

        .new-form-group {
            margin-bottom: 20px;
        }

        .new-form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        .new-form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .new-form-control:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .new-form-row {
            display: flex;
            gap: 16px;
        }

        .new-form-row .new-form-group {
            flex: 1;
        }

        .new-checkbox-group {
            margin-bottom: 16px;
        }

        .new-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .new-custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .new-checkbox-input:checked+.new-custom-checkbox {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .new-checkbox-input:checked+.new-custom-checkbox::after {
            content: '✓';
            color: white;
            font-size: 12px;
        }

        .new-checkbox-text {
            font-size: 14px;
        }

        .new-checkbox-text strong {
            font-weight: 600;
            color: #111827;
        }

        .new-checkbox-description {
            font-size: 13px;
            color: #6b7280;
            margin-left: 30px;
            margin-top: 4px;
        }

        .new-review-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .new-review-card h5 {
            font-size: 16px;
            color: #4f46e5;
            margin-bottom: 12px;
        }

        .new-review-item {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .new-review-item strong {
            color: #374151;
        }

        .new-review-item span {
            color: #6b7280;
        }

        .new-modal-footer {
            padding: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
        }

        .new-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .new-btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            border: none;
        }

        .new-btn-secondary:hover {
            background-color: #e5e7eb;
        }

        .new-btn-primary {
            background-color: #4f46e5;
            color: white;
            border: none;
        }

        .new-btn-primary:hover {
            background-color: #4338ca;
        }

        .new-btn-success {
            background-color: #10b981;
            color: white;
            border: none;
        }

        .new-btn-success:hover {
            background-color: #0d9e6e;
        }

        .new-error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .new-form-control.error {
            border-color: #ef4444;
        }

        .new-terms-agreement {
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .new-form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <button class="new-trigger-btn" id="triggerBtn">Start Setup</button>

    <div class="new-modal-overlay" id="modalOverlay">
        <div class="new-modal-container">
            <div class="new-modal-header">
                <h2 class="new-modal-title">Setup Wizard</h2>
                <button class="new-close-btn" id="closeBtn">&times;</button>
            </div>
            <div class="new-modal-body">
                <div class="new-progress-container">
                    <div class="new-progress-steps">
                        <span>Step <span id="currentStep">1</span> of 4</span>
                        <span><span id="progressPercent">25</span>% Complete</span>
                    </div>
                    <div class="new-progress-bar">
                        <div class="new-progress-fill" id="progressFill"></div>
                    </div>
                </div>

                <form id="setupForm">
                    <!-- Step 1 -->
                    <div class="new-step active" id="step1">
                        <h3 class="new-step-title">Personal Information</h3>

                        <div class="new-form-row">
                            <div class="new-form-group">
                                <label class="new-form-label" for="firstName">First Name</label>
                                <input type="text" class="new-form-control" id="firstName" required>
                                <div class="new-error-message" id="firstNameError">Please enter your first name</div>
                            </div>
                            <div class="new-form-group">
                                <label class="new-form-label" for="lastName">Last Name</label>
                                <input type="text" class="new-form-control" id="lastName" required>
                                <div class="new-error-message" id="lastNameError">Please enter your last name</div>
                            </div>
                        </div>

                        <div class="new-form-group">
                            <label class="new-form-label" for="email">Email Address</label>
                            <input type="email" class="new-form-control" id="email" required>
                            <div class="new-error-message" id="emailError">Please enter a valid email address</div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="new-step" id="step2">
                        <h3 class="new-step-title">Account Security</h3>

                        <div class="new-form-group">
                            <label class="new-form-label" for="username">Username</label>
                            <input type="text" class="new-form-control" id="username" required>
                            <div class="new-error-message" id="usernameError">Please choose a username</div>
                        </div>

                        <div class="new-form-row">
                            <div class="new-form-group">
                                <label class="new-form-label" for="password">Password</label>
                                <input type="password" class="new-form-control" id="password" required>
                                <div class="new-error-message" id="passwordError">Password must be at least 8 characters
                                </div>
                            </div>
                            <div class="new-form-group">
                                <label class="new-form-label" for="confirmPassword">Confirm Password</label>
                                <input type="password" class="new-form-control" id="confirmPassword" required>
                                <div class="new-error-message" id="confirmPasswordError">Passwords don't match</div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="new-step" id="step3">
                        <h3 class="new-step-title">Preferences</h3>

                        <div class="new-form-group">
                            <label class="new-form-label">Notification Settings</label>

                            <div class="new-checkbox-group">
                                <label class="new-checkbox-label">
                                    <input type="checkbox" class="new-checkbox-input" id="emailNotifications">
                                    <span class="new-custom-checkbox"></span>
                                    <span class="new-checkbox-text"><strong>Email Notifications</strong></span>
                                </label>
                                <div class="new-checkbox-description">Receive important updates via email</div>
                            </div>

                            <div class="new-checkbox-group">
                                <label class="new-checkbox-label">
                                    <input type="checkbox" class="new-checkbox-input" id="pushNotifications">
                                    <span class="new-custom-checkbox"></span>
                                    <span class="new-checkbox-text"><strong>Push Notifications</strong></span>
                                </label>
                                <div class="new-checkbox-description">Get real-time alerts on your device</div>
                            </div>
                        </div>

                        <div class="new-form-group">
                            <label class="new-form-label" for="theme">Theme Preference</label>
                            <select class="new-form-control" id="theme" required>
                                <option value="" disabled selected>Select a theme</option>
                                <option value="light">Light Theme</option>
                                <option value="dark">Dark Theme</option>
                                <option value="system">System Default</option>
                            </select>
                            <div class="new-error-message" id="themeError">Please select a theme</div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="new-step" id="step4">
                        <h3 class="new-step-title">Review Information</h3>

                        <div class="new-review-card">
                            <h5>Personal Information</h5>
                            <div class="new-review-item"><strong>Name:</strong> <span id="reviewName"></span></div>
                            <div class="new-review-item"><strong>Email:</strong> <span id="reviewEmail"></span></div>
                        </div>

                        <div class="new-review-card">
                            <h5>Account Details</h5>
                            <div class="new-review-item"><strong>Username:</strong> <span id="reviewUsername"></span>
                            </div>
                        </div>

                        <div class="new-review-card">
                            <h5>Preferences</h5>
                            <div class="new-review-item"><strong>Notifications:</strong> <span
                                    id="reviewNotifications"></span></div>
                            <div class="new-review-item"><strong>Theme:</strong> <span id="reviewTheme"></span></div>
                        </div>

                        <div class="new-terms-agreement">
                            <label class="new-checkbox-label">
                                <input type="checkbox" class="new-checkbox-input" id="termsAgreement" required>
                                <span class="new-custom-checkbox"></span>
                                <span class="new-checkbox-text">I agree to the Terms of Service and Privacy
                                    Policy</span>
                            </label>
                            <div class="new-error-message" id="termsError">You must agree to the terms</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="new-modal-footer">
                <button class="new-btn new-btn-secondary" id="cancelBtn">Cancel</button>
                <div>
                    <button class="new-btn new-btn-secondary" id="prevBtn" disabled>Previous</button>
                    <button class="new-btn new-btn-primary" id="nextBtn">Next</button>
                    <button class="new-btn new-btn-success" id="submitBtn" style="display: none;">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // DOM Elements
            const triggerBtn = document.getElementById('triggerBtn');
            const modalOverlay = document.getElementById('modalOverlay');
            const closeBtn = document.getElementById('closeBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const currentStepDisplay = document.getElementById('currentStep');
            const progressPercentDisplay = document.getElementById('progressPercent');
            const progressFill = document.getElementById('progressFill');
            const steps = document.querySelectorAll('.new-step');

            // Form state
            let currentStep = 0;
            const totalSteps = steps.length;

            // Initialize
            updateProgress();

            // Event Listeners
            triggerBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);
            prevBtn.addEventListener('click', prevStep);
            nextBtn.addEventListener('click', nextStep);
            submitBtn.addEventListener('click', submitForm);

            // Modal control functions
            function openModal() {
                modalOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modalOverlay.classList.remove('active');
                document.body.style.overflow = '';
                resetForm();
            }

            // Step navigation
            function showStep(stepIndex) {
                steps.forEach((step, index) => {
                    step.classList.toggle('active', index === stepIndex);
                });

                // Update button visibility
                prevBtn.disabled = stepIndex === 0;
                nextBtn.style.display = stepIndex === totalSteps - 1 ? 'none' : 'block';
                submitBtn.style.display = stepIndex === totalSteps - 1 ? 'block' : 'none';
                currentStepDisplay.textContent = stepIndex + 1;
            }

            function nextStep() {
                if (validateStep(currentStep)) {
                    if (currentStep < totalSteps - 1) {
                        currentStep++;
                        showStep(currentStep);
                        updateProgress();
                    }
                }
            }

            function prevStep() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                    updateProgress();
                }
            }

            // Form validation
            function validateStep(stepIndex) {
                let isValid = true;
                const currentStepEl = steps[stepIndex];

                // Validate required fields
                const requiredInputs = currentStepEl.querySelectorAll('[required]');
                requiredInputs.forEach(input => {
                    const errorId = input.id + 'Error';
                    const errorElement = document.getElementById(errorId);

                    if (!input.value.trim()) {
                        input.classList.add('error');
                        if (errorElement) errorElement.style.display = 'block';
                        isValid = false;
                    } else {
                        input.classList.remove('error');
                        if (errorElement) errorElement.style.display = 'none';
                    }
                });

                // Special validation for email
                if (stepIndex === 0) {
                    const email = document.getElementById('email');
                    const emailError = document.getElementById('emailError');

                    if (email.value && !validateEmail(email.value)) {
                        email.classList.add('error');
                        emailError.textContent = 'Please enter a valid email address';
                        emailError.style.display = 'block';
                        isValid = false;
                    }
                }

                // Special validation for passwords
                if (stepIndex === 1) {
                    const password = document.getElementById('password');
                    const confirmPassword = document.getElementById('confirmPassword');
                    const passwordError = document.getElementById('passwordError');
                    const confirmError = document.getElementById('confirmPasswordError');

                    if (password.value.length < 8) {
                        password.classList.add('error');
                        passwordError.style.display = 'block';
                        isValid = false;
                    }

                    if (password.value !== confirmPassword.value) {
                        confirmPassword.classList.add('error');
                        confirmError.style.display = 'block';
                        isValid = false;
                    }
                }

                // Special validation for terms agreement
                if (stepIndex === 3) {
                    const termsCheckbox = document.getElementById('termsAgreement');
                    const termsError = document.getElementById('termsError');

                    if (!termsCheckbox.checked) {
                        termsError.style.display = 'block';
                        isValid = false;
                    } else {
                        termsError.style.display = 'none';
                    }
                }

                return isValid;
            }

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            // Progress tracking
            function updateProgress() {
                const progress = ((currentStep + 1) / totalSteps) * 100;
                progressFill.style.width = `${progress}%`;
                progressPercentDisplay.textContent = Math.round(progress);
            }

            // Form submission
            function submitForm() {
                if (validateStep(currentStep)) {
                    updateReviewSection();

                    // Simulate form submission
                    submitBtn.textContent = 'Processing...';
                    submitBtn.disabled = true;

                    setTimeout(() => {
                        alert('Setup completed successfully!');
                        closeModal();
                    }, 1500);
                }
            }

            function updateReviewSection() {
                // Personal info
                document.getElementById('reviewName').textContent =
                    `${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
                document.getElementById('reviewEmail').textContent =
                    document.getElementById('email').value;

                // Account info
                document.getElementById('reviewUsername').textContent =
                    document.getElementById('username').value;

                // Preferences
                const notifications = [];
                if (document.getElementById('emailNotifications').checked) notifications.push('Email');
                if (document.getElementById('pushNotifications').checked) notifications.push('Push');
                document.getElementById('reviewNotifications').textContent =
                    notifications.join(', ') || 'None';

                const themeSelect = document.getElementById('theme');
                document.getElementById('reviewTheme').textContent =
                    themeSelect.options[themeSelect.selectedIndex].text;
            }

            // Form reset
            function resetForm() {
                document.getElementById('setupForm').reset();
                currentStep = 0;
                showStep(currentStep);
                updateProgress();

                // Clear errors
                document.querySelectorAll('.new-error-message').forEach(el => {
                    el.style.display = 'none';
                });
                document.querySelectorAll('.new-form-control').forEach(el => {
                    el.classList.remove('error');
                });

                // Reset submit button
                submitBtn.textContent = 'Submit';
                submitBtn.disabled = false;
            }
        });
    </script>
</body>

</html>