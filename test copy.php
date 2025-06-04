
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setupModal">
  Launch Setup Wizard
</button>

<!-- Modal -->
<div class="modal fade" id="setupModal" tabindex="-1" role="dialog" aria-labelledby="setupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="setupModalLabel"><i class="fas fa-magic mr-2"></i> Setup Wizard</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Progress Bar -->
        <div class="progress-container mb-4">
          <div class="d-flex justify-content-between mb-1">
            <small>Step <span id="current-step">1</span> of <span id="total-steps">4</span></small>
            <small><span id="progress-percent">25</span>% Complete</small>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"></div>
          </div>
        </div>
        
        <!-- Form Steps -->
        <form id="setupForm">
          <!-- Step 1 -->
          <div class="step active" id="step1">
            <div class="step-header mb-4">
              <div class="step-icon bg-primary d-inline-flex align-items-center justify-content-center rounded-circle mr-3" style="width: 40px; height: 40px;">
                <i class="fas fa-user text-white"></i>
              </div>
              <h4 class="step-title d-inline-block mb-0">Personal Information</h4>
            </div>
            
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" required>
            </div>
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" required>
            </div>
          </div>
          
          <!-- Step 2 -->
          <div class="step" id="step2">
            <div class="step-header mb-4">
              <div class="step-icon bg-primary d-inline-flex align-items-center justify-content-center rounded-circle mr-3" style="width: 40px; height: 40px;">
                <i class="fas fa-lock text-white"></i>
              </div>
              <h4 class="step-title d-inline-block mb-0">Account Security</h4>
            </div>
            
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" required>
              <small class="form-text text-muted">Minimum 8 characters</small>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" required>
            </div>
          </div>
          
          <!-- Step 3 -->
          <div class="step" id="step3">
            <div class="step-header mb-4">
              <div class="step-icon bg-primary d-inline-flex align-items-center justify-content-center rounded-circle mr-3" style="width: 40px; height: 40px;">
                <i class="fas fa-cog text-white"></i>
              </div>
              <h4 class="step-title d-inline-block mb-0">Preferences</h4>
            </div>
            
            <div class="form-group">
              <label>Notification Preferences</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="emailNotifications">
                <label class="form-check-label" for="emailNotifications">
                  Email Notifications
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pushNotifications">
                <label class="form-check-label" for="pushNotifications">
                  Push Notifications
                </label>
              </div>
            </div>
            
            <div class="form-group">
              <label for="theme">Theme Preference</label>
              <select class="form-control" id="theme" required>
                <option value="" disabled selected>Select an option</option>
                <option value="light">Light Theme</option>
                <option value="dark">Dark Theme</option>
                <option value="system">System Default</option>
              </select>
            </div>
          </div>
          
          <!-- Step 4 -->
          <div class="step" id="step4">
            <div class="step-header mb-4">
              <div class="step-icon bg-primary d-inline-flex align-items-center justify-content-center rounded-circle mr-3" style="width: 40px; height: 40px;">
                <i class="fas fa-check-circle text-white"></i>
              </div>
              <h4 class="step-title d-inline-block mb-0">Review & Submit</h4>
            </div>
            
            <div class="alert alert-success">
              <i class="fas fa-check-circle mr-2"></i> Almost done! Please review your information.
            </div>
            
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-user-circle mr-2"></i> Personal Information</h5>
                <p id="review-name" class="mb-1"><strong>Name:</strong> <span class="text-muted">Loading...</span></p>
                <p id="review-email"><strong>Email:</strong> <span class="text-muted">Loading...</span></p>
              </div>
            </div>
            
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-shield-alt mr-2"></i> Account Details</h5>
                <p id="review-username"><strong>Username:</strong> <span class="text-muted">Loading...</span></p>
              </div>
            </div>
            
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-sliders-h mr-2"></i> Preferences</h5>
                <p id="review-notifications" class="mb-1"><strong>Notifications:</strong> <span class="text-muted">Loading...</span></p>
                <p id="review-theme"><strong>Theme:</strong> <span class="text-muted">Loading...</span></p>
              </div>
            </div>
            
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="termsAgreement" required>
              <label class="form-check-label" for="termsAgreement">
                I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a>
              </label>
              <div class="invalid-feedback">You must agree to the terms</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fas fa-times mr-1"></i> Cancel
        </button>
        <button type="button" class="btn btn-outline-secondary" id="prevBtn" disabled>
          <i class="fas fa-arrow-left mr-1"></i> Previous
        </button>
        <button type="button" class="btn btn-primary" id="nextBtn">
          Next <i class="fas fa-arrow-right ml-1"></i>
        </button>
        <button type="button" class="btn btn-success" id="submitBtn" style="display: none;">
          <i class="fas fa-paper-plane mr-1"></i> Submit
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Required CSS/JS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
  const steps = $('.step');
  const prevBtn = $('#prevBtn');
  const nextBtn = $('#nextBtn');
  const submitBtn = $('#submitBtn');
  const progressBar = $('.progress-bar');
  const currentStepDisplay = $('#current-step');
  const totalStepsDisplay = $('#total-steps');
  const progressPercentDisplay = $('#progress-percent');
  let currentStep = 0;
  
  // Initialize
  totalStepsDisplay.text(steps.length);
  showStep(currentStep);
  
  // Next button click
  nextBtn.click(function() {
    if (currentStep < steps.length - 1) {
      if (validateStep(currentStep)) {
        currentStep++;
        showStep(currentStep);
        updateProgress();
      }
    }
  });
  
  // Previous button click
  prevBtn.click(function() {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
      updateProgress();
    }
  });
  
  // Submit button click
  submitBtn.click(function() {
    if (validateStep(currentStep)) {
      updateReviewSection();
      
      // Simulate form submission
      submitBtn.html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Processing...');
      submitBtn.prop('disabled', true);
      
      setTimeout(function() {
        alert('Setup completed successfully!');
        $('#setupModal').modal('hide');
        resetForm();
      }, 1500);
    }
  });
  
  function showStep(stepIndex) {
    steps.removeClass('active');
    steps.eq(stepIndex).addClass('active');
    
    prevBtn.prop('disabled', stepIndex === 0);
    nextBtn.toggle(stepIndex !== steps.length - 1);
    submitBtn.toggle(stepIndex === steps.length - 1);
    currentStepDisplay.text(stepIndex + 1);
  }
  
  function validateStep(stepIndex) {
    let isValid = true;
    const currentStepEl = steps.eq(stepIndex);
    
    // Clear previous validations
    currentStepEl.find('.is-invalid').removeClass('is-invalid');
    currentStepEl.find('.invalid-feedback').remove();
    
    // Validate required fields
    currentStepEl.find('[required]').each(function() {
      const $field = $(this);
      if ($field.is(':checkbox') && !$field.prop('checked')) {
        $field.addClass('is-invalid');
        isValid = false;
      } 
      else if (!$field.is(':checkbox') && !$field.val().trim()) {
        $field.addClass('is-invalid');
        $field.after('<div class="invalid-feedback">This field is required</div>');
        isValid = false;
      }
    });
    
    // Special validation for passwords
    if (stepIndex === 1) {
      const password = $('#password').val();
      const confirmPassword = $('#confirmPassword').val();
      
      if (password.length < 8) {
        $('#password').addClass('is-invalid');
        $('#password').after('<div class="invalid-feedback">Password must be at least 8 characters</div>');
        isValid = false;
      }
      
      if (password !== confirmPassword) {
        $('#confirmPassword').addClass('is-invalid');
        $('#confirmPassword').after('<div class="invalid-feedback">Passwords do not match</div>');
        isValid = false;
      }
    }
    
    return isValid;
  }
  
  function updateProgress() {
    const progress = ((currentStep + 1) / steps.length) * 100;
    progressBar.css('width', progress + '%');
    progressPercentDisplay.text(Math.round(progress));
  }
  
  function updateReviewSection() {
    $('#review-name').html('<strong>Name:</strong> <span class="text-muted">' + $('#firstName').val() + ' ' + $('#lastName').val() + '</span>');
    $('#review-email').html('<strong>Email:</strong> <span class="text-muted">' + $('#email').val() + '</span>');
    $('#review-username').html('<strong>Username:</strong> <span class="text-muted">' + $('#username').val() + '</span>');
    
    const notifications = [];
    if ($('#emailNotifications').prop('checked')) notifications.push('Email');
    if ($('#pushNotifications').prop('checked')) notifications.push('Push');
    
    $('#review-notifications').html('<strong>Notifications:</strong> <span class="text-muted">' + (notifications.join(', ') || 'None') + '</span>');
    $('#review-theme').html('<strong>Theme:</strong> <span class="text-muted">' + $('#theme option:selected').text() + '</span>');
  }
  
  function resetForm() {
    $('#setupForm').trigger('reset');
    currentStep = 0;
    showStep(currentStep);
    updateProgress();
    submitBtn.html('<i class="fas fa-paper-plane mr-1"></i> Submit');
    submitBtn.prop('disabled', false);
    
    // Clear all validation errors
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').remove();
  }
});
</script>