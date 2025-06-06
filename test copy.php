<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern HR Management Interface</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style class="newCss">
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --hover-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem 0;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 2.5rem;
            margin: 0 auto;
            max-width: 1000px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        /* Modern Search Input */
        .search-container {
            position: relative;
            margin-bottom: 2.5rem;
        }

        .search-input {
            border: 2px solid #e2e8f0;
            border-radius: var(--border-radius);
            padding: 1rem 1rem 1rem 3rem;
            font-size: 1rem;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
        }

        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 1.1rem;
        }

        .search-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Modern Button Grid */
        .button-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .feature-button {
            background: white;
            border: 2px solid rgba(102, 126, 234, 0.1);
            border-radius: var(--border-radius);
            padding: 1.5rem 1rem;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .feature-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--primary-gradient);
            transition: var(--transition);
            z-index: 0;
        }

        .feature-button:hover::before {
            left: 0;
        }

        .feature-button:hover {
            transform: translateY(-5px);
            box-shadow: var(--hover-shadow);
            border-color: transparent;
        }

        .feature-button .btn-content {
            position: relative;
            z-index: 1;
            transition: var(--transition);
        }

        .feature-button:hover .btn-content {
            color: white;
        }

        .feature-button .icon {
            font-size: 2rem;
            margin-bottom: 0.8rem;
            display: block;
            color: #667eea;
            transition: var(--transition);
        }

        .feature-button:hover .icon {
            color: white;
            transform: scale(1.1);
        }

        .feature-button .title {
            font-weight: 600;
            font-size: 1rem;
            color: #2d3748;
            margin: 0;
            transition: var(--transition);
        }

        .feature-button:hover .title {
            color: white;
        }

        .feature-button.active {
            background: var(--primary-gradient);
            border-color: transparent;
            box-shadow: var(--hover-shadow);
        }

        .feature-button.active .btn-content {
            color: white;
        }

        .feature-button.active .icon,
        .feature-button.active .title {
            color: white;
        }

        /* Modern Next Button */
        .next-button-container {
            text-align: center;
            margin-top: 2rem;
        }

        .next-button {
            background: var(--primary-gradient);
            border: none;
            border-radius: 50px;
            padding: 1rem 3rem;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .next-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .next-button:active {
            transform: translateY(0);
        }

        .next-button .icon {
            transition: var(--transition);
        }

        .next-button:hover .icon {
            transform: translateX(5px);
        }

        /* Ripple Effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .button-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .feature-button {
                padding: 1.2rem 0.8rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }

        /* Loading Animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Success State */
        .success-state {
            background: var(--success-gradient);
            color: white;
        }

        .success-state .icon {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0,0,0);
            }
            40%, 43% {
                transform: translate3d(0, -15px, 0);
            }
            70% {
                transform: translate3d(0, -5px, 0);
            }
            90% {
                transform: translate3d(0, -2px, 0);
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="main-container">
            <h2 class="section-title">HR Management Dashboard</h2>
            
            <!-- Modern Search Section -->
            <div class="search-container">
                <label class="search-label">Group Supervisor</label>
                <div class="position-relative">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" 
                           class="search-input" 
                           name="txt_supervisor_search"
                           id="txt_supervisor_search"
                           placeholder="Search by ID or Name...">
                    <input type="hidden" name="cmb_Supervisor" id="cmb_Supervisor">
                </div>
            </div>

            <!-- Modern Button Grid -->
            <div class="button-grid">
                <button type="button" class="feature-button" id="btn_add_department" data-feature="attendance">
                    <div class="btn-content">
                        <i class="fas fa-clock icon"></i>
                        <h5 class="title">Attendance</h5>
                    </div>
                </button>

                <button type="button" class="feature-button" id="btn_add_department2" data-feature="leave">
                    <div class="btn-content">
                        <i class="fas fa-calendar-alt icon"></i>
                        <h5 class="title">Leave Management</h5>
                    </div>
                </button>

                <button type="button" class="feature-button" id="btn_add_department3" data-feature="evaluation">
                    <div class="btn-content">
                        <i class="fas fa-chart-line icon"></i>
                        <h5 class="title">Performance Review</h5>
                    </div>
                </button>

                <button type="button" class="feature-button" id="btn_add_department4" data-feature="salary">
                    <div class="btn-content">
                        <i class="fas fa-money-bill-wave icon"></i>
                        <h5 class="title">Salary Advance</h5>
                    </div>
                </button>

                <button type="button" class="feature-button" id="btn_add_department5" data-feature="overtime">
                    <div class="btn-content">
                        <i class="fas fa-business-time icon"></i>
                        <h5 class="title">OT Approval</h5>
                    </div>
                </button>

                <button type="button" class="feature-button" id="btn_add_department6" data-feature="loans">
                    <div class="btn-content">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <h5 class="title">Staff Loans</h5>
                    </div>
                </button>
            </div>

            <!-- Modern Next Button -->
            <div class="next-button-container">
                <button type="button" id="submit_departments" class="next-button">
                    <span class="text">Continue</span>
                    <i class="fas fa-arrow-right icon"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Enhanced feature button interactions
            $('.feature-button').on('click', function(e) {
                // Create ripple effect
                createRipple(e, this);
                
                // Toggle active state
                $(this).toggleClass('active');
                
                // Update button state
                updateButtonState($(this));
                
                // Trigger custom event
                const feature = $(this).data('feature');
                $(document).trigger('featureSelected', [feature, $(this).hasClass('active')]);
            });

            // Enhanced search functionality
            let searchTimeout;
            $('#txt_supervisor_search').on('input', function() {
                const $input = $(this);
                const query = $input.val().trim();
                
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    performSearch(query);
                }, 300);
            });

            // Enhanced next button
            $('#submit_departments').on('click', function(e) {
                e.preventDefault();
                const $btn = $(this);
                
                // Create ripple effect
                createRipple(e, this);
                
                // Get selected features
                const selectedFeatures = getSelectedFeatures();
                const supervisorId = $('#cmb_Supervisor').val();
                
                if (validateForm(selectedFeatures, supervisorId)) {
                    processSubmission($btn, selectedFeatures, supervisorId);
                } else {
                    showValidationError();
                }
            });

            // Utility Functions
            function createRipple(event, element) {
                const $element = $(element);
                const rect = element.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = event.clientX - rect.left - size / 2;
                const y = event.clientY - rect.top - size / 2;
                
                const $ripple = $('<span class="ripple"></span>');
                $ripple.css({
                    width: size + 'px',
                    height: size + 'px',
                    left: x + 'px',
                    top: y + 'px'
                });
                
                $element.append($ripple);
                
                setTimeout(() => {
                    $ripple.remove();
                }, 600);
            }

            function updateButtonState($button) {
                const $icon = $button.find('.icon');
                const $title = $button.find('.title');
                
                if ($button.hasClass('active')) {
                    // Add success animation
                    $icon.addClass('fa-bounce');
                    setTimeout(() => {
                        $icon.removeClass('fa-bounce');
                    }, 600);
                }
            }

            function performSearch(query) {
                if (query.length < 2) {
                    $('#cmb_Supervisor').val('');
                    return;
                }

                // Show loading state
                const $input = $('#txt_supervisor_search');
                $input.addClass('loading');
                
                // Simulate API call
                setTimeout(() => {
                    // Mock search results
                    const mockResults = [
                        { id: '001', name: 'John Doe' },
                        { id: '002', name: 'Jane Smith' },
                        { id: '003', name: 'Mike Johnson' }
                    ];
                    
                    const results = mockResults.filter(item => 
                        item.id.includes(query) || 
                        item.name.toLowerCase().includes(query.toLowerCase())
                    );
                    
                    if (results.length > 0) {
                        $('#cmb_Supervisor').val(results[0].id);
                        showSearchSuccess();
                    } else {
                        $('#cmb_Supervisor').val('');
                        showSearchError();
                    }
                    
                    $input.removeClass('loading');
                }, 500);
            }

            function getSelectedFeatures() {
                const selected = [];
                $('.feature-button.active').each(function() {
                    selected.push($(this).data('feature'));
                });
                return selected;
            }

            function validateForm(features, supervisorId) {
                return features.length > 0 && supervisorId.trim() !== '';
            }

            function processSubmission($btn, features, supervisorId) {
                // Show loading state
                $btn.addClass('loading');
                $btn.find('.text').text('Processing...');
                $btn.find('.icon').removeClass('fa-arrow-right').addClass('spinner');
                
                // Simulate processing
                setTimeout(() => {
                    // Show success state
                    $btn.removeClass('loading').addClass('success-state');
                    $btn.find('.text').text('Success!');
                    $btn.find('.icon').removeClass('spinner').addClass('fa-check');
                    
                    // Reset after animation
                    setTimeout(() => {
                        $btn.removeClass('success-state');
                        $btn.find('.text').text('Continue');
                        $btn.find('.icon').removeClass('fa-check').addClass('fa-arrow-right');
                        
                        // Trigger navigation or next step
                        handleSuccessfulSubmission(features, supervisorId);
                    }, 2000);
                }, 1500);
            }

            function showValidationError() {
                // Create and show error message
                const $error = $('<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">')
                    .html('<i class="fas fa-exclamation-triangle mr-2"></i>Please select at least one feature and specify a supervisor.')
                    .append('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>');
                
                $('.next-button-container').append($error);
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    $error.alert('close');
                }, 5000);
            }

            function showSearchSuccess() {
                const $input = $('#txt_supervisor_search');
                $input.css('border-color', '#48bb78');
                setTimeout(() => {
                    $input.css('border-color', '#e2e8f0');
                }, 2000);
            }

            function showSearchError() {
                const $input = $('#txt_supervisor_search');
                $input.css('border-color', '#f56565');
                setTimeout(() => {
                    $input.css('border-color', '#e2e8f0');
                }, 2000);
            }

            function handleSuccessfulSubmission(features, supervisorId) {
                console.log('Selected Features:', features);
                console.log('Supervisor ID:', supervisorId);
                
                // Here you would typically:
                // 1. Send data to server
                // 2. Navigate to next page
                // 3. Update UI state
                // 4. Show confirmation message
                
                // For demo purposes, trigger a custom event
                $(document).trigger('formSubmitted', [{
                    features: features,
                    supervisorId: supervisorId,
                    timestamp: new Date().toISOString()
                }]);
            }

            // Custom event listeners for integration
            $(document).on('featureSelected', function(e, feature, isSelected) {
                console.log(`Feature ${feature} ${isSelected ? 'selected' : 'deselected'}`);
            });

            $(document).on('formSubmitted', function(e, data) {
                console.log('Form submitted with data:', data);
            });

            // Initialize tooltips if needed
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>