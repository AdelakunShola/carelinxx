@extends('user.user_dashboard')
@section('user') 

    <style>   

    .hero-alt-content {
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.hero-alt-image {
    flex: 0 0 60%;
    min-width: 300px;
}

.hero-alt-image img {
    width: 100%;
    height: auto;
    max-height: 320px;
    object-fit: cover;
    border-radius: 8px;
}

.hero-alt-text {
    flex: 0 0 35%;
    min-width: 300px;
}

@media (max-width: 768px) {
    .hero-alt-image,
    .hero-alt-text {
        flex: 0 0 100%;
    }
}

.location-suggestions {
    position: absolute;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    max-height: 200px;
    overflow-y: auto;
    width: 100%;
    z-index: 1000;
    display: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.suggestion-item {
    padding: 12px 15px;
    cursor: pointer;
    border-bottom: 1px solid #f0f0f0;
    font-size: 14px;
}

.suggestion-item:hover {
    background: #f5f5f5;
}

.form-group {
    position: relative;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    overflow-y: auto;
}

.modal-content {
    background-color: #fff;
    margin: 2% auto;
    padding: 0;
    border-radius: 12px;
    width: 90%;
    max-width: 1000px;
    position: relative;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

.close-modal {
    color: #aaa;
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 32px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10;
    transition: color 0.3s;
}

.close-modal:hover {
    color: #000;
}

/* Progress Bar */
.progress-bar {
    display: flex;
    justify-content: space-between;
    padding: 30px 50px 20px;
    background: #f8f9fa;
    border-radius: 12px 12px 0 0;
}

.progress-step {
    flex: 1;
    height: 6px;
    background: #e0e0e0;
    margin: 0 5px;
    border-radius: 3px;
    transition: background 0.3s;
}

.progress-step.active {
    background: #00796B;
}

/* Modal Body */
.modal-body {
    padding: 40px 50px 50px;
    min-height: 500px;
}

.modal-step {
    display: none;
}

.modal-step.active {
    display: block;
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.step-info {
    background: #E3F2FD;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
    border-left: 4px solid #2196F3;
}

.step-info p {
    margin: 5px 0;
    color: #1565C0;
    font-size: 14px;
}

.modal-step h2 {
    font-size: 32px;
    color: #333;
    margin-bottom: 10px;
}

.step-subtitle {
    font-size: 18px;
    color: #666;
    margin: 20px 0 15px;
}

.mt-4 {
    margin-top: 30px;
}

/* Button Groups */
.button-group {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin: 20px 0;
}

.option-btn {
    flex: 1;
    min-width: 150px;
    padding: 15px 20px;
    border: 2px solid #ddd;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 16px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.option-btn:hover {
    border-color: #00796B;
    background: #f5f5f5;
}

.option-btn.active {
    border-color: #00796B;
    background: #00796B;
    color: white;
}

.gender-icon {
    font-size: 24px;
}

/* Service Cards */
.service-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.service-card {
    padding: 25px;
    border: 2px solid #ddd;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s;
    background: white;
}

.service-card:hover {
    border-color: #00796B;
    box-shadow: 0 4px 12px rgba(0,121,107,0.1);
}

.service-card.active {
    border-color: #00796B;
    background: #E0F2F1;
}

.service-icon {
    font-size: 40px;
    margin-bottom: 15px;
}

.service-card h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.service-card p {
    font-size: 14px;
    color: #666;
    line-height: 1.5;
}

/* Condition Cards */
.condition-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
    margin: 20px 0;
}

.condition-card {
    padding: 20px;
    border: 2px solid #ddd;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    background: white;
    text-align: center;
}

.condition-card:hover {
    border-color: #00796B;
}

.condition-card.active {
    border-color: #00796B;
    background: #E0F2F1;
}

.condition-icon {
    font-size: 32px;
    margin-bottom: 10px;
    display: block;
}

.condition-card span {
    font-size: 14px;
    font-weight: 500;
    color: #333;
}

/* Schedule Cards */
.schedule-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.schedule-card {
    padding: 30px;
    border: 2px solid #ddd;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s;
    background: white;
}

.schedule-card:hover {
    border-color: #00796B;
    box-shadow: 0 4px 12px rgba(0,121,107,0.1);
}

.schedule-card.active {
    border-color: #00796B;
    background: #E0F2F1;
}

.schedule-icon {
    font-size: 48px;
    margin-bottom: 15px;
}

.schedule-card h3 {
    font-size: 20px;
    margin-bottom: 12px;
    color: #333;
}

.schedule-card p {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* Tracking Info */
.tracking-info {
    background: #FFF3E0;
    padding: 25px;
    border-radius: 10px;
    text-align: center;
    margin: 25px 0;
    border: 2px solid #FFB74D;
}

.tracking-number {
    font-size: 28px;
    font-weight: bold;
    color: #E65100;
    margin: 15px 0;
    font-family: 'Courier New', monospace;
    letter-spacing: 2px;
}

.tracking-note {
    font-size: 13px;
    color: #F57C00;
    margin-top: 10px;
}

/* Form Groups in Modal */
.form-group-modal {
    margin: 25px 0;
}

.form-group-modal label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
    font-size: 16px;
}

.form-group-modal input {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.form-group-modal input:focus {
    outline: none;
    border-color: #00796B;
}

/* Success Step */
.success-icon {
    width: 80px;
    height: 80px;
    background: #4CAF50;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    margin: 0 auto 30px;
}

.next-steps {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    margin: 30px 0;
}

.next-steps h3 {
    color: #333;
    margin-bottom: 15px;
}

.next-steps ul {
    list-style: none;
    padding: 0;
}

.next-steps li {
    padding: 12px 0;
    padding-left: 30px;
    position: relative;
    color: #666;
    line-height: 1.6;
}

.next-steps li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #4CAF50;
    font-weight: bold;
    font-size: 18px;
}

/* Button Styles */
.button-row {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 40px;
}

.btn-primary, .btn-secondary, .btn-link {
    padding: 14px 32px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    border: none;
}

.btn-primary {
    background: #00796B;
    color: white;
}

.btn-primary:hover {
    background: #00695C;
}

.btn-primary:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.btn-secondary {
    background: #f5f5f5;
    color: #333;
    border: 2px solid #ddd;
}

.btn-secondary:hover {
    background: #e0e0e0;
}

.btn-link {
    background: transparent;
    color: #00796B;
    text-decoration: underline;
    padding: 10px;
}

.btn-link:hover {
    color: #00695C;
}

/* Responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        margin: 10px auto;
    }
    
    .modal-body {
        padding: 25px 20px;
    }
    
    .progress-bar {
        padding: 20px 15px 15px;
    }
    
    .button-group {
        flex-direction: column;
    }
    
    .option-btn {
        min-width: 100%;
    }
    
    .service-cards, .schedule-cards {
        grid-template-columns: 1fr;
    }
    
    .button-row {
        flex-direction: column-reverse;
    }
}
    </style>


<style>
.track-request-card {
    background: white;
    padding: 50px 40px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

#trackingNumberInput:focus {
    outline: none;
    border-color: #00796B;
}

/* Status badges */
.status-badge {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
}

.status-incomplete { background: #FFF3E0; color: #F57C00; }
.status-pending { background: #E3F2FD; color: #1976D2; }
.status-matched { background: #E8F5E9; color: #388E3C; }
.status-completed { background: #E8F5E9; color: #2E7D32; }
.status-cancelled { background: #FFEBEE; color: #D32F2F; }

.detail-row {
    display: flex;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-weight: 600;
    color: #666;
    width: 35%;
}

.detail-value {
    color: #333;
    width: 65%;
}

.progress-timeline {
    margin: 30px 0;
}

.timeline-step {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    position: relative;
}

.timeline-step:before {
    content: '';
    position: absolute;
    left: 20px;
    top: 40px;
    bottom: -20px;
    width: 2px;
    background: #e0e0e0;
}

.timeline-step:last-child:before {
    display: none;
}

.timeline-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-right: 20px;
    flex-shrink: 0;
}

.timeline-icon.completed {
    background: #4CAF50;
    color: white;
}

.timeline-icon.current {
    background: #2196F3;
    color: white;
}

.timeline-icon.pending {
    background: #e0e0e0;
    color: #999;
}

.timeline-content h4 {
    margin: 0 0 5px 0;
    color: #333;
}

.timeline-content p {
    margin: 0;
    color: #666;
    font-size: 14px;
}

@media (max-width: 768px) {
    .track-request-card {
        padding: 30px 20px;
    }
    
    #trackingForm > div {
        flex-direction: column;
    }
    
    #trackingForm button {
        width: 100%;
    }
}
</style>

 <!-- Responsive Styles -->
    <style>
     .solution-section {
            background: white;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .solution-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-size: 48px;
            color: #1a5c52;
            margin: 0 0 20px 0;
            font-weight: 400;
            font-family: Georgia, serif;
        }

        .section-header p {
            font-size: 18px;
            color: #6a7a76;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .tab-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .tab-btn {
            background: transparent;
            border: 2px solid #d0d5d3;
            color: #6a7a76;
            padding: 14px 40px;
            border-radius: 50px;
            font-size: 17px;
            cursor: pointer;
            font-family: Georgia, serif;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .tab-btn.active {
            border-color: #1a5c52;
            color: #1a5c52;
        }

        .tab-btn:hover {
            background: #1a5c52;
            color: white;
            border-color: #1a5c52;
        }

        .cards-grid {
            position: relative;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .solution-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            z-index: 1;
        }

        .solution-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .solution-card:nth-child(1) {
            margin-top: 40px;
        }

        .solution-card:nth-child(2) {
            margin-top: 80px;
        }

        .solution-card:nth-child(3) {
            margin-top: 40px;
        }

        .card-image {
            height: 280px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content {
            padding: 35px 30px;
        }

        .card-content h3 {
            font-size: 28px;
            color: #1a5c52;
            margin: 0 0 20px 0;
            font-weight: 400;
            font-family: Georgia, serif;
        }

        .card-content p {
            font-size: 16px;
            color: #6a7a76;
            line-height: 1.7;
            margin: 0;
        }

        .decorative-circle-1 {
            position: absolute;
            top: 200px;
            left: -80px;
            width: 250px;
            height: 250px;
            background: #1a5c52;
            border-radius: 50%;
            z-index: 0;
            opacity: 0.08;
        }

        .decorative-circle-2 {
            position: absolute;
            bottom: 100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #00bfa5 0%, #00a89a 100%);
            border-radius: 50%;
            z-index: 0;
            opacity: 0.08;
        }

        /* Tablet styles */
        @media (max-width: 1024px) {
            .section-header h2 {
                font-size: 40px;
            }

            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .solution-card:nth-child(2) {
                margin-top: 40px;
            }

            .solution-card:nth-child(3) {
                margin-top: 0;
                grid-column: 1 / -1;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .solution-section {
                padding: 50px 20px;
            }

            .section-header {
                margin-bottom: 30px;
            }

            .section-header h2 {
                font-size: 32px;
            }

            .section-header p {
                font-size: 16px;
            }

            .tab-buttons {
                margin-bottom: 40px;
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .tab-btn {
                width: 100%;
                max-width: 300px;
                padding: 12px 30px;
                font-size: 16px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .solution-card {
                margin-top: 0 !important;
            }

            .solution-card:nth-child(3) {
                grid-column: auto;
                max-width: 100%;
            }

            .card-image {
                height: 220px;
            }

            .card-content {
                padding: 25px 20px;
            }

            .card-content h3 {
                font-size: 24px;
            }

            .card-content p {
                font-size: 15px;
            }

            .decorative-circle-1,
            .decorative-circle-2 {
                display: none;
            }
        }

        /* Small mobile */
        @media (max-width: 480px) {
            .section-header h2 {
                font-size: 28px;
            }

            .section-header p {
                font-size: 15px;
            }

            .tab-btn {
                font-size: 15px;
                padding: 10px 25px;
            }

            .card-content h3 {
                font-size: 22px;
            }

            .card-content p {
                font-size: 14px;
            }
        }
    </style>

<section class="hero-alt">
    <div class="container">
        <div class="hero-alt-content">
            <div class="hero-alt-text">
                <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 52px; font-weight: 400; letter-spacing: -0.5px;">NUVIACARE</h1>
                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 19px;">Giving care to you and your loved ones.</p>
            </div>
            <div class="hero-alt-image">
                <img src="{{ asset('1112.webp') }}" alt="Senior woman outdoors">
            </div>
        </div>
    </div>
</section>



    <!-- Services Section -->
   <section class="find-caregiver-section">
        <div class="container">
            <div class="find-caregiver">
                <h2>Find a caregiver</h2>
                <p style="font-size: 17px;">Create a free account to browse caregivers you can count on</p>
                <form class="form-row" id="initialForm">
                    @csrf
                    <div class="form-group">
                        <label style="font-size: 17px;" class="form-label">
                            <span class="step-number">1</span>
                            Who needs care?
                        </label>
                        <select name="who_needs_care" id="whoNeedsCare" required>
                            <option value="">Select</option>
                            <option value="my_mother">My mother</option>
                            <option value="my_father">My father</option>
                            <option value="my_mother_in_law">My mother-in-law</option>
                            <option value="my_father_in_law">My father-in-law</option>
                            <option value="my_grandmother">My grandmother</option>
                            <option value="my_grandfather">My grandfather</option>
                            <option value="my_wife">My wife</option>
                            <option value="my_husband">My husband</option>
                            <option value="my_female_partner">My female partner</option>
                            <option value="my_daughter">My daughter</option>
                            <option value="my_son">My son</option>
                            <option value="my_brother">My brother</option>
                            <option value="myself_female">Myself (female)</option>
                            <option value="myself_male">Myself (male)</option>
                            <option value="my_female_relative">My female relative</option>
                            <option value="my_male_relative">My male relative</option>
                            <option value="my_female_friend">My female friend</option>
                            <option value="my_male_friend">My male friend</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 17px;" class="form-label">
                            <span class="step-number">2</span>
                            Where do you need care?
                        </label>
                        <input type="text" name="location" id="locationInput" placeholder="Enter postcode or city in UK" required autocomplete="off">
                        <input type="hidden" name="location_city" id="locationCity">
                        <input type="hidden" name="location_address" id="locationAddress">
                        <input type="hidden" name="location_latitude" id="locationLat">
                        <input type="hidden" name="location_longitude" id="locationLng">
                        <div id="locationSuggestions" class="location-suggestions"></div>
                    </div>
                    <button type="submit" class="btn-primary">Get Started</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal for Multi-Step Process -->
    <div id="caregiverModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-step active" data-step="1"></div>
                <div class="progress-step" data-step="2"></div>
                <div class="progress-step" data-step="3"></div>
                <div class="progress-step" data-step="4"></div>
                <div class="progress-step" data-step="5"></div>
                <div class="progress-step" data-step="6"></div>
            </div>

            <div class="modal-body">
                <!-- Step 1: Care Needs -->
                <div class="modal-step active" data-step="1">
                    <div class="step-info">
                        <p>There are caregivers in your area.</p>
                        <p>To find the right caregiver match for your <span id="relationshipName"></span>, fill out the rest of the form and our team will get started.</p>
                    </div>
                    <h2>Care Needs</h2>
                    <p class="step-subtitle">How soon will your <span id="relationshipName2"></span> need help?</p>
                    <div class="button-group">
                        <button type="button" class="option-btn" data-value="immediately">Immediately</button>
                        <button type="button" class="option-btn" data-value="within_2_weeks">Within 2 Weeks</button>
                        <button type="button" class="option-btn" data-value="within_1_month">Within 1 Month</button>
                    </div>
                    <input type="hidden" id="urgency" name="urgency">

                    <p class="step-subtitle mt-4">How much help will he need each week?</p>
                    <div class="button-group">
                        <button type="button" class="option-btn" data-value="1-10">1-10 hours</button>
                        <button type="button" class="option-btn" data-value="10-20">10-20 hours</button>
                        <button type="button" class="option-btn" data-value="20+">20+ hours</button>
                    </div>
                    <input type="hidden" id="hoursPerWeek" name="hours_per_week">

                    <p class="step-subtitle mt-4">How long will he need help?</p>
                    <div class="button-group">
                        <button type="button" class="option-btn" data-value="1-4_weeks">1-4 weeks</button>
                        <button type="button" class="option-btn" data-value="1-6_months">1-6 months</button>
                        <button type="button" class="option-btn" data-value="6+_months">6+ months</button>
                    </div>
                    <input type="hidden" id="duration" name="duration">

                    <button type="button" class="btn-primary btn-next" disabled>Next</button>
                </div>

                <!-- Step 2: Caregiver Experience -->
                <div class="modal-step" data-step="2">
                    <div class="step-info">
                        <p>Caregivers often have specialized experience from working with specific health conditions. We'll use your answers to help find caregivers with appropriate experience and services.</p>
                    </div>
                    <h2>Caregiver has experience with</h2>
                    <p class="step-subtitle">What type of caregiving services do you need?</p>
                    
                    <div class="service-cards">
                        <div class="service-card" data-value="companion">
                            <div class="service-icon">👥</div>
                            <h3>Companion and home helper needs</h3>
                            <p>Including meal prep, light housekeeping, transportation, and laundry</p>
                        </div>
                        <div class="service-card" data-value="personal_care">
                            <div class="service-icon">❤️</div>
                            <h3>Personal care needs</h3>
                            <p>Including bathing, grooming, toileting, and mobility</p>
                        </div>
                    </div>
                    <input type="hidden" id="serviceTypes" name="service_types">

                    <p class="step-subtitle mt-4">Does your <span id="relationshipName3"></span> have any of the following conditions or need specific care?</p>
                    
                    <div class="condition-cards">
                        <div class="condition-card" data-value="home_health_care">
                            <div class="condition-icon">🏥</div>
                            <span>Home Health Care</span>
                        </div>
                        <div class="condition-card" data-value="post_surgery">
                            <div class="condition-icon">🩺</div>
                            <span>Post Surgery Care</span>
                        </div>
                        <div class="condition-card" data-value="als">
                            <div class="condition-icon">🧠</div>
                            <span>ALS</span>
                        </div>
                        <div class="condition-card" data-value="alzheimers">
                            <div class="condition-icon">🧩</div>
                            <span>Alzheimer's</span>
                        </div>
                    </div>
                    <button type="button" class="btn-link" id="showMoreConditions">Show More Conditions</button>
                    <input type="hidden" id="healthConditions" name="health_conditions">

                    <div class="button-row">
                        <button type="button" class="btn-secondary btn-back">Back</button>
                        <button type="button" class="btn-primary btn-next" disabled>Next</button>
                    </div>
                </div>

                <!-- Step 3: Caregiver Preferences -->
                <div class="modal-step" data-step="3">
                    <div class="step-info">
                        <p>If you or your <span id="relationshipName4"></span> feel more comfortable with a specific gender or speaking in another language, indicate your preference here.</p>
                    </div>
                    <h2>Caregiver Preferences</h2>
                    <p class="step-subtitle">What gender caregiver would you prefer?</p>
                    
                    <div class="button-group">
                        <button type="button" class="option-btn" data-value="any">
                            <span class="gender-icon">👥</span>
                            Any Gender
                        </button>
                        <button type="button" class="option-btn" data-value="female">
                            <span class="gender-icon">👩</span>
                            Female
                        </button>
                        <button type="button" class="option-btn" data-value="male">
                            <span class="gender-icon">👨</span>
                            Male
                        </button>
                    </div>
                    <input type="hidden" id="genderPreference" name="gender_preference">

                    <p class="step-subtitle mt-4">What language skills would you prefer your caregiver have?</p>
                    <div class="button-group">
                        <button type="button" class="option-btn active" data-value="english">English</button>
                        <button type="button" class="option-btn" data-value="spanish">Spanish</button>
                    </div>
                    <button type="button" class="btn-link" id="showMoreLanguages">Show More Languages</button>
                    <input type="hidden" id="languagePreference" name="language_preference" value="english">

                    <div class="button-row">
                        <button type="button" class="btn-secondary btn-back">Back</button>
                        <button type="button" class="btn-primary btn-next">Next</button>
                    </div>
                </div>

                <!-- Step 4: Care Schedule -->
                <div class="modal-step" data-step="4">
                    <div class="step-info">
                        <p>Certain illnesses or conditions may require care provided on a regular, scheduled basis. Let us know if you need a caregiver at specific times during the day.</p>
                    </div>
                    <h2>Care Schedule</h2>
                    <p class="step-subtitle">What type of schedule does your <span id="relationshipName5"></span> have?</p>
                    
                    <div class="schedule-cards">
                        <div class="schedule-card active" data-value="flexible">
                            <div class="schedule-icon">🕐</div>
                            <h3>Flexible Schedule</h3>
                            <p>He needs a certain amount of help that can be provided at various times throughout the week.</p>
                        </div>
                        <div class="schedule-card" data-value="fixed">
                            <div class="schedule-icon">⏰</div>
                            <h3>Fixed Schedule</h3>
                            <p>He requires a caregiver to be present at specific time periods throughout the day or week.</p>
                        </div>
                    </div>
                    <input type="hidden" id="scheduleType" name="schedule_type" value="flexible">

                    <div class="button-row">
                        <button type="button" class="btn-secondary btn-back">Back</button>
                        <button type="button" class="btn-primary btn-next">Next</button>
                    </div>
                </div>

                <!-- Step 5: Email Input -->
                <div class="modal-step" data-step="5">
                    <h2>Almost Done!</h2>
                    <p class="step-subtitle">Enter your email to receive updates about your caregiver search</p>
                    
                    <div class="tracking-info">
                        <p><strong>Your Tracking Number:</strong></p>
                        <div class="tracking-number" id="displayTrackingNumber"></div>
                        <p class="tracking-note">Save this number to check your request status anytime</p>
                    </div>

                    <div class="form-group-modal">
                        <label for="emailInput">Email Address *</label>
                        <input type="email" id="emailInput" name="email" placeholder="your@email.com" required>
                    </div>

                    <div class="form-group-modal">
                        <label for="phoneInput">Phone Number (Optional)</label>
                        <input type="tel" id="phoneInput" name="phone" placeholder="+44 20 1234 5678">
                    </div>

                    <div class="button-row">
                        <button type="button" class="btn-secondary btn-back">Back</button>
                        <button type="button" class="btn-primary" id="btnComplete">Complete Request</button>
                    </div>
                </div>

                <!-- Step 6: Success -->
                <div class="modal-step" data-step="6">
                    <div class="success-icon">✓</div>
                    <h2>Request Submitted Successfully!</h2>
                    <p>Thank you for submitting your caregiver request. We've sent a confirmation email to <strong id="confirmedEmail"></strong></p>
                    
                    <div class="tracking-info">
                        <p><strong>Your Tracking Number:</strong></p>
                        <div class="tracking-number" id="finalTrackingNumber"></div>
                    </div>

                    <div class="next-steps">
                        <h3>What happens next?</h3>
                        <ul>
                            <li>Our team will review your request within 24 hours</li>
                            <li>We'll match you with qualified caregivers in your area</li>
                            <li>You'll receive notifications about potential matches</li>
                            <li>You can review caregiver profiles and make your selection</li>
                        </ul>
                    </div>

                    <button type="button" class="btn-primary" id="btnClose">Close</button>
                </div>
            </div>
        </div>
    </div>



        <!-- Track Request Section -->
<section class="track-request-section" style="background: #f8f9fa; padding: 60px 0;">
    <div class="container">
        <div class="track-request-card">
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="font-size: 32px; color: #333; margin-bottom: 10px;">Track Your Request</h2>
                <p style="font-size: 18px; color: #666;">Enter your tracking number to check your request status</p>
            </div>
            
            <form id="trackingForm" style="max-width: 600px; margin: 0 auto;">
                @csrf
                <div style="display: flex; gap: 15px; align-items: flex-start;">
                    <div style="flex: 1;">
                        <input 
                            type="text" 
                            id="trackingNumberInput" 
                            name="tracking_number"
                            placeholder="Enter tracking number (e.g., CR-A1B2C3D4)" 
                            style="width: 100%; padding: 16px 20px; border: 2px solid #ddd; border-radius: 8px; font-size: 16px; transition: border-color 0.3s;"
                            required
                        >
                        <div id="trackingError" style="color: #f44336; margin-top: 8px; font-size: 14px; display: none;"></div>
                    </div>
                    <button 
                        type="submit" 
                        class="btn-primary" 
                        style="padding: 16px 32px; white-space: nowrap; display: flex; align-items: center; gap: 8px;"
                    >
                        <span>🔍</span> Track Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Tracking Result Modal -->
<div id="trackingModal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 800px;">
        <span class="close-modal" onclick="closeTrackingModal()">&times;</span>
        
        <div class="modal-body" style="padding: 40px;">
            <div id="trackingResult">
                <!-- Result will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>



    <!-- Trusted Solutions Section -->
 <section class="services-section">
    <div class="container">
        <div class="services-content">
            <div class="services-image">
                <img src="{{ asset('2.jpg') }}" alt="Caregiver with senior woman">
            </div>
            <div class="services-text">
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 32px; color: #2d5f5d; margin-bottom: 20px; font-weight: 400;">Trusted in-home care solutions</h2>
                <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; font-size: 15px;">When you need or a loved one needs in-home care, you can rely on us. As caregivers, we help families connect with quality care professionals for both non-medical and clinical support. Needs and slice work with health plans, healthcare providers and community organizations to provide high-quality in-home care.</p>
            </div>
        </div>
    </div>
</section>

  <section style="background: linear-gradient(135deg, #e8f5f3 0%, #d9ede9 100%); padding: 80px 20px; position: relative; overflow: hidden;">
    <div style="max-width: 1400px; margin: 0 auto;">
        
        <!-- Section Header -->
        <div style="margin-bottom: 60px; padding-left: 40px;">
            <h2 style="font-size: 48px; color: #1a5c52; margin: 0 0 20px 0; font-weight: 400; font-family: Georgia, serif;">Care for everyday needs</h2>
            <p style="font-size: 18px; color: #6a7a76; max-width: 800px; margin: 0; line-height: 1.6;">NuviaCare has a unique solution set tailored to help reach your goals and deliver positive outcomes.</p>
        </div>

        <!-- Cards Container -->
        <div style="display: flex; gap: 30px; flex-wrap: wrap; justify-content: flex-start; position: relative; z-index: 2; padding-left: 40px;">
            
            <!-- Card 1: Companion and home helper -->
            <div style="background: white; border-radius: 24px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); flex: 1; min-width: 320px; max-width: 420px;">
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                    <div style="background: linear-gradient(135deg, #e0f2f1 0%, #d0e9e6 100%); width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#1a5c52" stroke-width="1.5">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="7" r="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 24px; color: #1a5c52; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Companion and home helper</h3>
                </div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Companionship
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Meal prep
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Shopping
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Transportation
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Laundry
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 0; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Light housekeeping
                    </li>
                </ul>
            </div>

            <!-- Card 2: Personal care and professional caregiver -->
            <div style="background: white; border-radius: 24px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); flex: 1; min-width: 320px; max-width: 420px;">
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                    <div style="background: linear-gradient(135deg, #e0f2f1 0%, #d0e9e6 100%); width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#1a5c52" stroke-width="1.5">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 11l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 24px; color: #1a5c52; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Personal care and professional caregiver</h3>
                </div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Bathing
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Dressing and grooming
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Medication reminders
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Toileting
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Mobility
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 0; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Respite
                    </li>
                </ul>
            </div>

            <!-- Card 3: Clinical support -->
            <div style="background: white; border-radius: 24px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); flex: 1; min-width: 320px; max-width: 420px;">
                <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                    <div style="background: linear-gradient(135deg, #e0f2f1 0%, #d0e9e6 100%); width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#1a5c52" stroke-width="1.5">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" stroke-linecap="round" stroke-linejoin="round"/>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 14h6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 10h6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 18h6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 style="font-size: 24px; color: #1a5c52; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Clinical support</h3>
                </div>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Diagnosis capture
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Telehealth
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        In-home assessment
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 14px; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        Care gap closure
                    </li>
                    <li style="color: #5a6c68; font-size: 16px; margin-bottom: 0; padding-left: 16px; position: relative;">
                        <span style="position: absolute; left: 0; color: #5a6c68;">•</span>
                        RPM Enablement
                    </li>
                </ul>
            </div>
            
        </div>

        <!-- Decorative Circles -->
        <div style="position: absolute; bottom: -200px; left: -100px; width: 400px; height: 400px; background: #1a5c52; border-radius: 50%; z-index: 1; opacity: 0.85;"></div>
        <div style="position: absolute; bottom: -220px; left: 50%; transform: translateX(-50%); width: 500px; height: 500px; background: linear-gradient(135deg, #00bfa5 0%, #00a89a 100%); border-radius: 50%; z-index: 1;"></div>
        
    </div>
</section>

<section class="solution-section">
    <div class="solution-container">
        
        <!-- Section Header -->
        <div class="section-header">
            <h2>The right solution mix for your needs</h2>
            <p>NuviaCare has a unique solution set tailored to help reach your goals and deliver positive outcomes.</p>
        </div>

        <!-- Tab Buttons -->
        <div class="tab-buttons">
            <a href="{{ route('health.plan') }}" class="tab-btn active">Health plans</a>
            <a href="{{ route('healthcare.system') }}" class="tab-btn">Health systems</a>
            <a href="{{ route('healthcare.staffing') }}" class="tab-btn">Professional Staffing</a>
        </div>

        <!-- Cards Grid -->
        <div class="cards-grid">
            
            <!-- Card 1 -->
            <div class="solution-card">
                <div class="card-image">
                    <img src="{{ asset('0001.webp') }}" alt="Caregiver with patient">
                </div>
                <div class="card-content">
                    <h3>Safety, security, and peace of mind</h3>
                    <p>Our online platform allows members unprecedented access with real-time updates and visibility on care delivered. Our dedicated care advisors curate the highest quality in-home providers.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="solution-card">
                <div class="card-image">
                    <img src="{{ asset('0002.webp') }}" alt="NuviaCare Verified">
                </div>
                <div class="card-content">
                    <h3>NuviaCare Verified</h3>
                    <p>Trust is at the core of everything we do. Our care professionals undergo comprehensive background checks, multistep behavioral assessments, and extensive training.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="solution-card">
                <div class="card-image">
                    <img src="{{ asset('0003.webp') }}" alt="Veterans">
                </div>
                <div class="card-content">
                    <h3>Veterans</h3>
                    <p>We are committed to serving Veterans and military families. NuviaCare offers programs for veterans in partnership with various organizations, providing both employment opportunities and support.</p>
                </div>
            </div>
            
        </div>

        <!-- Decorative Circles -->
        <div class="decorative-circle-1"></div>
        <div class="decorative-circle-2"></div>
    </div>
</section>

<section style="padding: 80px 20px; background: #f8faf9;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Section Title -->
        <h2 style="text-align: center; font-size: 48px; color: #1a5c52; margin: 0 0 60px 0; font-weight: 400; font-family: Georgia, serif;">Testimonials</h2>

        <!-- Testimonial Container -->
        <div style="position: relative; max-width: 1000px; margin: 0 auto;">
            
            <!-- Testimonial Card -->
            <div id="testimonialCard" style="background: white; border-radius: 20px; padding: 60px 80px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); min-height: 300px; position: relative;">
                
                <!-- Opening Quote -->
                <div style="font-size: 120px; color: #1a5c52; line-height: 0.5; margin-bottom: 20px; font-family: Georgia, serif;">"</div>
                
                <!-- Testimonial Text -->
                <p id="testimonialText" style="font-size: 22px; color: #1a5c52; line-height: 1.7; margin: 0 0 30px 0; font-family: Georgia, serif; font-style: normal; transition: opacity 0.3s ease;">I've been hired by a lot of agencies in the past but I find NuviaCare to be the best place to look for clients and job opportunities that best suit my hours or availability. NuviaCare puts in a lot of thought and effort to find caregivers that suit the family needs.</p>
                
                <!-- Closing Quote positioned at the end -->
                <div style="text-align: right; font-size: 120px; color: #1a5c52; line-height: 0.5; margin-top: -40px; margin-bottom: 20px; font-family: Georgia, serif;">"</div>
                
                <!-- Author -->
                <p id="testimonialAuthor" style="font-size: 18px; color: #6a7a76; margin: 0; font-family: Georgia, serif; transition: opacity 0.3s ease;">— Victoria</p>
                
            </div>

            <!-- Navigation Dots -->
            <div style="display: flex; justify-content: center; gap: 12px; margin-top: 40px;">
                <button class="testimonial-dot" onclick="showTestimonial(0)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #b8e0d8; cursor: pointer; padding: 0; transition: all 0.3s;"></button>
                <button class="testimonial-dot" onclick="showTestimonial(1)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #b8e0d8; cursor: pointer; padding: 0; transition: all 0.3s;"></button>
                <button class="testimonial-dot" onclick="showTestimonial(2)" style="width: 12px; height: 12px; border-radius: 50%; border: none; background: #00bfa5; cursor: pointer; padding: 0; transition: all 0.3s;"></button>
            </div>
            
        </div>
        
    </div>
</section>


<section style="background: linear-gradient(135deg, #e8f5f3 0%, #dff0ed 100%); padding: 60px 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Section Title -->
        <h2 style="text-align: center; font-size: clamp(28px, 5vw, 48px); color: #1a5c52; margin: 0 0 40px 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">See what people are saying about us</h2>

        <!-- Trustpilot Widget Card - Desktop -->
        <div id="desktopReviews" style="background: white; border-radius: 16px; padding: 40px 50px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); max-width: 1100px; margin: 0 auto 60px; position: relative;">
            
            <div style="display: flex; align-items: flex-start; gap: 40px; flex-wrap: wrap;">
                
                <!-- Left: Rating Summary -->
                <div style="flex: 0 0 auto;">
                    <div style="font-size: 32px; font-weight: 600; color: #1a5c52; margin-bottom: 8px;">Great</div>
                    <div style="display: flex; gap: 4px; margin-bottom: 12px;">
                        <span style="color: #00b67a; font-size: 32px;">★</span>
                        <span style="color: #00b67a; font-size: 32px;">★</span>
                        <span style="color: #00b67a; font-size: 32px;">★</span>
                        <span style="color: #00b67a; font-size: 32px;">★</span>
                        <span style="color: #dcdce6; font-size: 32px;">★</span>
                    </div>
                    <p style="margin: 0 0 16px 0; color: #191919; font-size: 14px;">Based on <strong>1,337 reviews</strong></p>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #00b67a; font-size: 24px;">★</span>
                        <span style="color: #191919; font-size: 18px; font-weight: 600;">Trustpilot</span>
                    </div>
                </div>

                <!-- Right: Review Cards with Navigation -->
                <div style="flex: 1; position: relative; min-width: 600px;">
                    
                    <!-- Navigation Arrows -->
                    <button onclick="previousReviews()" style="position: absolute; left: -25px; top: 50%; transform: translateY(-50%); background: white; border: 1px solid #ddd; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); z-index: 10;">
                        <span style="color: #666; font-size: 18px;">‹</span>
                    </button>
                    
                    <!-- Review Cards Container -->
                    <div id="reviewsContainer" style="display: flex; gap: 20px; overflow: hidden;">
                        
                        <!-- Review Card 1 -->
                        <div class="review-card" style="flex: 1; min-width: 280px; opacity: 1; transition: opacity 0.3s;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                                <div style="display: flex; gap: 2px;">
                                    <span style="color: #00b67a; font-size: 18px;">★★★★★</span>
                                </div>
                                <span style="color: #00b67a; font-size: 12px;">✓ Invited</span>
                            </div>
                            <h4 class="review-title" style="margin: 0 0 8px 0; font-size: 16px; font-weight: 600; color: #191919;">Partners in Care</h4>
                            <p class="review-text" style="margin: 0 0 12px 0; font-size: 14px; color: #555; line-height: 1.5;">Without the ready, reliable and efficient help of NuviaCare, I might not have been able to keep my father at home.</p>
                            <p class="review-author" style="margin: 0; font-size: 12px; color: #888;">
                                <strong>Maureen Fallt</strong>, January 20
                            </p>
                        </div>

                        <!-- Review Card 2 -->
                        <div class="review-card" style="flex: 1; min-width: 280px; opacity: 1; transition: opacity 0.3s;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                                <div style="display: flex; gap: 2px;">
                                    <span style="color: #00b67a; font-size: 18px;">★★★★★</span>
                                </div>
                                <span style="color: #00b67a; font-size: 12px;">✓ Invited</span>
                            </div>
                            <h4 class="review-title" style="margin: 0 0 8px 0; font-size: 16px; font-weight: 600; color: #191919;">Our caregiver Mary Hoopes ...</h4>
                            <p class="review-text" style="margin: 0 0 12px 0; font-size: 14px; color: #555; line-height: 1.5;">Our caregiver Mary Hoopes was wonderful, reliable, and caring.</p>
                            <p class="review-author" style="margin: 0; font-size: 12px; color: #888;">
                                <strong>Bob Swafford</strong>, January 5
                            </p>
                        </div>
                        
                    </div>

                    <button onclick="nextReviews()" style="position: absolute; right: -25px; top: 50%; transform: translateY(-50%); background: white; border: 1px solid #ddd; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); z-index: 10;">
                        <span style="color: #666; font-size: 18px;">›</span>
                    </button>

                    <p style="margin: 20px 0 0 0; font-size: 12px; color: #666; text-align: center;">Showing our favorite reviews</p>
                    
                </div>
                
            </div>
            
        </div>

        <!-- Mobile Review Slider -->
        <div id="mobileReviews" style="max-width: 500px; margin: 0 auto 50px; position: relative;">
            
            <!-- Mobile Slider Container -->
            <div style="overflow: hidden; border-radius: 16px;">
                <div id="mobileSlider" style="display: flex; transition: transform 0.3s ease;">
                    
                    <!-- Mobile Review Card Template - will be populated by JS -->
                    
                </div>
            </div>

            <!-- Mobile Navigation Dots -->
            <div id="mobileDots" style="display: flex; justify-content: center; gap: 8px; margin-top: 20px;">
                <!-- Dots will be added by JS -->
            </div>

            <!-- Trustpilot Summary Below Cards -->
            <div style="text-align: center; margin-top: 30px;">
                <div style="display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 8px;">
                    <span style="color: #00b67a; font-size: 20px;">★</span>
                    <span style="color: #191919; font-size: 16px; font-weight: 600;">Trustpilot</span>
                </div>
                <p style="margin: 0; color: #666; font-size: 12px;">Showing our favorite reviews</p>
            </div>
            
        </div>

        <!-- As Seen In Section -->
        <div style="text-align: center; margin-top: 50px;">
            <p style="font-size: 13px; color: #191919; font-weight: 600; margin: 0 0 30px 0; letter-spacing: 0.5px;">AND AS SEEN IN</p>
            
            <div id="desktopLogos" style="display: flex; justify-content: center; align-items: center; gap: 60px; flex-wrap: wrap;">
                <div style="opacity: 0.7;">
                    <svg width="80" height="60" viewBox="0 0 100 60" fill="none">
                        <text x="50%" y="40%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 14px; fill: #1a5c52; font-weight: 600;">THE OPRAH</text>
                        <text x="50%" y="65%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 14px; fill: #1a5c52; font-weight: 600;">MAGAZINE</text>
                    </svg>
                </div>

                <div style="opacity: 0.7;">
                    <svg width="100" height="40" viewBox="0 0 100 40">
                        <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 32px; fill: #1a5c52; font-weight: 700; letter-spacing: 2px;">TIME</text>
                    </svg>
                </div>

                <div style="opacity: 0.7;">
                    <svg width="120" height="40" viewBox="0 0 120 40">
                        <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 36px; fill: #1a5c52; font-weight: 700;">Forbes</text>
                    </svg>
                </div>

                <div style="opacity: 0.7;">
                    <svg width="80" height="80" viewBox="0 0 80 80">
                        <circle cx="40" cy="40" r="35" fill="none" stroke="#1a5c52" stroke-width="2"/>
                        <text x="50%" y="55%" text-anchor="middle" dominant-baseline="middle" style="font-family: Arial, sans-serif; font-size: 24px; fill: #1a5c52; font-weight: 700;">PBS</text>
                    </svg>
                </div>

                <div style="background: #1a5c52; padding: 15px 20px; border-radius: 8px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="background: white; padding: 8px 12px; border-radius: 4px;">
                            <span style="font-weight: 700; color: #1a5c52; font-size: 18px;">BBB</span>
                        </div>
                        <div style="color: white;">
                            <div style="font-size: 10px; font-weight: 600;">ACCREDITED</div>
                            <div style="font-size: 10px;">BUSINESS</div>
                        </div>
                        <div style="background: white; color: #1a5c52; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; font-weight: 700;">
                            A+
                        </div>
                    </div>
                </div>
            </div>

            <div id="mobileLogos" style="display: none; flex-direction: column; align-items: center; gap: 30px;">
                <div style="display: flex; justify-content: center; align-items: center; gap: 40px; width: 100%;">
                    <div style="opacity: 0.7;">
                        <svg width="70" height="50" viewBox="0 0 100 60" fill="none">
                            <text x="50%" y="40%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 12px; fill: #1a5c52; font-weight: 600;">THE OPRAH</text>
                            <text x="50%" y="65%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 12px; fill: #1a5c52; font-weight: 600;">MAGAZINE</text>
                        </svg>
                    </div>
                    <div style="opacity: 0.7;">
                        <svg width="90" height="35" viewBox="0 0 100 40">
                            <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 28px; fill: #1a5c52; font-weight: 700; letter-spacing: 2px;">TIME</text>
                        </svg>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: center; align-items: center; gap: 40px; width: 100%;">
                    <div style="opacity: 0.7;">
                        <svg width="100" height="35" viewBox="0 0 120 40">
                            <text x="50%" y="50%" text-anchor="middle" dominant-baseline="middle" style="font-family: Georgia, serif; font-size: 32px; fill: #1a5c52; font-weight: 700;">Forbes</text>
                        </svg>
                    </div>
                    <div style="opacity: 0.7;">
                        <svg width="70" height="70" viewBox="0 0 80 80">
                            <circle cx="40" cy="40" r="32" fill="none" stroke="#1a5c52" stroke-width="2"/>
                            <text x="50%" y="55%" text-anchor="middle" dominant-baseline="middle" style="font-family: Arial, sans-serif; font-size: 22px; fill: #1a5c52; font-weight: 700;">PBS</text>
                        </svg>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: center; width: 100%;">
                    <div style="background: #1a5c52; padding: 12px 18px; border-radius: 6px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="background: white; padding: 6px 10px; border-radius: 3px;">
                                <span style="font-weight: 700; color: #1a5c52; font-size: 16px;">BBB</span>
                            </div>
                            <div style="color: white;">
                                <div style="font-size: 9px; font-weight: 600;">ACCREDITED</div>
                                <div style="font-size: 9px;">BUSINESS</div>
                            </div>
                            <div style="background: white; color: #1a5c52; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700;">
                                A+
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>

<script>
const reviews = [
    {
        title: "Partners in Care",
        text: "Without the ready, reliable and efficient help of NuviaCare, I might not have been able to keep my father at home.",
        author: "Maureen Fallt",
        date: "January 20"
    },
    {
        title: "Our caregiver Mary Hoopes ...",
        text: "Our caregiver Mary Hoopes was wonderful, reliable, and caring.",
        author: "Bob Swafford",
        date: "January 5"
    },
    {
        title: "Excellent Service",
        text: "What I like most about NuviaCare is the fact they take time to give personal attention to the needs of their families.",
        author: "Robert",
        date: "December 15"
    },
    {
        title: "Highly Recommended",
        text: "The caregivers are professional, compassionate, and truly care about their clients.",
        author: "Sarah M.",
        date: "December 28"
    },
    {
        title: "Outstanding Support",
        text: "Outstanding service and support. The team at NuviaCare went above and beyond to find the perfect caregiver for my mother.",
        author: "Michael T.",
        date: "January 10"
    },
    {
        title: "Life-Changing Experience",
        text: "NuviaCare transformed how we approach elder care. The platform is intuitive and the caregivers are top-notch professionals.",
        author: "Jennifer L.",
        date: "January 15"
    }
];

let currentIndex = 0;
let mobileCurrentIndex = 0;
let touchStartX = 0;
let touchEndX = 0;
let autoPlayInterval;

function updateReviews() {
    const cards = document.querySelectorAll('.review-card');
    if (cards.length === 0) return;
    
    cards.forEach(card => card.style.opacity = '0');
    
    setTimeout(() => {
        const review1 = reviews[currentIndex];
        const review2 = reviews[(currentIndex + 1) % reviews.length];
        
        cards[0].querySelector('.review-title').textContent = review1.title;
        cards[0].querySelector('.review-text').textContent = review1.text;
        cards[0].querySelector('.review-author').innerHTML = `<strong>${review1.author}</strong>, ${review1.date}`;
        
        cards[1].querySelector('.review-title').textContent = review2.title;
        cards[1].querySelector('.review-text').textContent = review2.text;
        cards[1].querySelector('.review-author').innerHTML = `<strong>${review2.author}</strong>, ${review2.date}`;
        
        cards.forEach(card => card.style.opacity = '1');
    }, 300);
}

function nextReviews() {
    currentIndex = (currentIndex + 2) % reviews.length;
    updateReviews();
    resetAutoPlay();
}

function previousReviews() {
    currentIndex = (currentIndex - 2 + reviews.length) % reviews.length;
    updateReviews();
    resetAutoPlay();
}

function renderMobileSlider() {
    const slider = document.getElementById('mobileSlider');
    const dotsContainer = document.getElementById('mobileDots');
    
    slider.innerHTML = reviews.map(review => `
        <div style="min-width: 100%; padding: 0 10px; box-sizing: border-box;">
            <div style="background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
                <div style="display: flex; gap: 3px; margin-bottom: 12px;">
                    <span style="color: #00b67a; font-size: 18px;">★★★★★</span>
                </div>
                <h4 style="margin: 0 0 12px 0; font-size: 17px; font-weight: 600; color: #191919;">${review.title}</h4>
                <p style="margin: 0 0 12px 0; font-size: 14px; color: #555; line-height: 1.6;">${review.text}</p>
                <p style="margin: 0; font-size: 12px; color: #888;">
                    <strong>${review.author}</strong>, ${review.date}
                </p>
            </div>
        </div>
    `).join('');
    
    dotsContainer.innerHTML = reviews.map((_, i) => `
        <button onclick="goToMobileSlide(${i})" style="width: 8px; height: 8px; border-radius: 50%; border: none; background: ${i === 0 ? '#00bfa5' : '#d0d5d3'}; cursor: pointer; padding: 0; transition: all 0.3s;" class="mobile-dot"></button>
    `).join('');
}

function goToMobileSlide(index) {
    mobileCurrentIndex = index;
    const slider = document.getElementById('mobileSlider');
    slider.style.transform = `translateX(-${index * 100}%)`;
    
    const dots = document.querySelectorAll('.mobile-dot');
    dots.forEach((dot, i) => {
        dot.style.background = i === index ? '#00bfa5' : '#d0d5d3';
    });
    
    resetAutoPlay();
}

function nextMobileSlide() {
    mobileCurrentIndex = (mobileCurrentIndex + 1) % reviews.length;
    goToMobileSlide(mobileCurrentIndex);
}

function previousMobileSlide() {
    mobileCurrentIndex = (mobileCurrentIndex - 1 + reviews.length) % reviews.length;
    goToMobileSlide(mobileCurrentIndex);
}

function handleResize() {
    const isMobile = window.innerWidth < 768;
    const desktopReviews = document.getElementById('desktopReviews');
    const mobileReviews = document.getElementById('mobileReviews');
    const desktopLogos = document.getElementById('desktopLogos');
    const mobileLogos = document.getElementById('mobileLogos');
    
    if (isMobile) {
        desktopReviews.style.display = 'none';
        mobileReviews.style.display = 'block';
        desktopLogos.style.display = 'none';
        mobileLogos.style.display = 'flex';
        renderMobileSlider();
    } else {
        desktopReviews.style.display = 'block';
        mobileReviews.style.display = 'none';
        desktopLogos.style.display = 'flex';
        mobileLogos.style.display = 'none';
    }
}

function resetAutoPlay() {
    clearInterval(autoPlayInterval);
    startAutoPlay();
}

function startAutoPlay() {
    autoPlayInterval = setInterval(() => {
        if (window.innerWidth >= 768) {
            nextReviews();
        } else {
            nextMobileSlide();
        }
    }, 5000);
}

// Touch events for mobile swipe
document.addEventListener('DOMContentLoaded', () => {
    const mobileReviews = document.getElementById('mobileReviews');
    
    mobileReviews.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    mobileReviews.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    handleResize();
    startAutoPlay();
});

function handleSwipe() {
    if (touchEndX < touchStartX - 50) {
        nextMobileSlide();
    }
    if (touchEndX > touchStartX + 50) {
        previousMobileSlide();
    }
}

window.addEventListener('resize', handleResize);
</script>


<script>
const testimonials = [
    {
        text: "What I like most about NuviaCare is the fact they take time to give personal attention to the needs of their families and caregivers to help ensure the patients get the quality care they deserve.",
        author: "— Robert"
    },
    {
        text: "The caregivers are professional, compassionate, and truly care about their clients. NuviaCare has made such a positive difference in our family's life.",
        author: "— Sarah M."
    },
    {
        text: "I've been hired by a lot of agencies in the past but I find NuviaCare to be the best place to look for clients and job opportunities that best suit my hours or availability. NuviaCare puts in a lot of thought and effort to find caregivers that suit the family needs.",
        author: "— Victoria"
    }
];

let currentTestimonialIndex = 2;

function showTestimonial(index) {
    currentTestimonialIndex = index;
    const textEl = document.getElementById('testimonialText');
    const authorEl = document.getElementById('testimonialAuthor');
    const dots = document.querySelectorAll('.testimonial-dot');
    
    // Fade out
    textEl.style.opacity = '0';
    authorEl.style.opacity = '0';
    
    setTimeout(() => {
        // Update content
        textEl.textContent = testimonials[index].text;
        authorEl.textContent = testimonials[index].author;
        
        // Fade in
        textEl.style.opacity = '1';
        authorEl.style.opacity = '1';
        
        // Update dots
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.style.background = '#00bfa5';
                dot.style.width = '12px';
            } else {
                dot.style.background = '#b8e0d8';
                dot.style.width = '12px';
            }
        });
    }, 300);
}

// Auto-rotate testimonials every 5 seconds
setInterval(() => {
    currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
    showTestimonial(currentTestimonialIndex);
}, 5000);

// Initialize with current testimonial
showTestimonial(currentTestimonialIndex);
</script>











<script>
    // Caregiver Request Handler
let currentStep = 1;
let trackingNumber = '';
let requestData = {
    whoNeedsCare: '',
    location: '',
    urgency: '',
    hoursPerWeek: '',
    duration: '',
    serviceTypes: [],
    healthConditions: [],
    genderPreference: 'any',
    languagePreference: 'english',
    scheduleType: 'flexible',
    email: '',
    phone: ''
};

// UK Location Autocomplete using Nominatim
let locationTimeout;
const locationInput = document.getElementById('locationInput');
const locationSuggestions = document.getElementById('locationSuggestions');

locationInput.addEventListener('input', function() {
    clearTimeout(locationTimeout);
    const query = this.value.trim();
    
    if (query.length < 3) {
        locationSuggestions.innerHTML = '';
        locationSuggestions.style.display = 'none';
        return;
    }
    
    locationTimeout = setTimeout(() => {
        searchUKLocations(query);
    }, 300);
});

async function searchUKLocations(query) {
    try {
        const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)},UK&countrycodes=gb&limit=5`);
        const data = await response.json();
        
        if (data.length > 0) {
            displayLocationSuggestions(data);
        } else {
            locationSuggestions.innerHTML = '<div class="suggestion-item">No locations found</div>';
            locationSuggestions.style.display = 'block';
        }
    } catch (error) {
        console.error('Error fetching locations:', error);
    }
}

function displayLocationSuggestions(locations) {
    locationSuggestions.innerHTML = '';
    locations.forEach(location => {
        const div = document.createElement('div');
        div.className = 'suggestion-item';
        div.textContent = location.display_name;
        div.onclick = () => selectLocation(location);
        locationSuggestions.appendChild(div);
    });
    locationSuggestions.style.display = 'block';
}

function selectLocation(location) {
    locationInput.value = location.display_name;
    document.getElementById('locationCity').value = location.address?.city || location.address?.town || '';
    document.getElementById('locationAddress').value = location.display_name;
    document.getElementById('locationLat').value = location.lat;
    document.getElementById('locationLng').value = location.lon;
    locationSuggestions.innerHTML = '';
    locationSuggestions.style.display = 'none';
}

// Close suggestions when clicking outside
document.addEventListener('click', function(e) {
    if (!locationInput.contains(e.target) && !locationSuggestions.contains(e.target)) {
        locationSuggestions.style.display = 'none';
    }
});

// Initial Form Submit
document.getElementById('initialForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    requestData.whoNeedsCare = formData.get('who_needs_care');
    requestData.location = formData.get('location');
    
    try {
        const response = await fetch('/caregiver-request/start', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                who_needs_care: formData.get('who_needs_care'),
                location: formData.get('location'),
                location_city: formData.get('location_city'),
                location_address: formData.get('location_address'),
                location_latitude: formData.get('location_latitude'),
                location_longitude: formData.get('location_longitude')
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            trackingNumber = data.tracking_number;
            document.getElementById('displayTrackingNumber').textContent = trackingNumber;
            
            // Update relationship names in modal
            const relationshipText = formData.get('who_needs_care').replace(/_/g, ' ');
            document.querySelectorAll('[id^="relationshipName"]').forEach(el => {
                el.textContent = relationshipText;
            });
            
            openModal();
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});

// Modal Functions
function openModal() {
    document.getElementById('caregiverModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('caregiverModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

document.querySelector('.close-modal').addEventListener('click', closeModal);
document.getElementById('btnClose').addEventListener('click', closeModal);

// Option Button Selection
document.querySelectorAll('.option-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const group = this.parentElement;
        const hiddenInput = group.nextElementSibling;
        
        // Remove active from siblings
        group.querySelectorAll('.option-btn').forEach(b => b.classList.remove('active'));
        
        // Add active to clicked button
        this.classList.add('active');
        
        // Set hidden input value
        if (hiddenInput && hiddenInput.type === 'hidden') {
            hiddenInput.value = this.dataset.value;
        }
        
        checkStepCompletion();
    });
});

// Service Card Selection (Multiple)
document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('click', function() {
        this.classList.toggle('active');
        
        const selectedServices = Array.from(document.querySelectorAll('.service-card.active'))
            .map(c => c.dataset.value);
        document.getElementById('serviceTypes').value = JSON.stringify(selectedServices);
        requestData.serviceTypes = selectedServices;
        
        checkStepCompletion();
    });
});

// Condition Card Selection (Multiple)
document.querySelectorAll('.condition-card').forEach(card => {
    card.addEventListener('click', function() {
        this.classList.toggle('active');
        
        const selectedConditions = Array.from(document.querySelectorAll('.condition-card.active'))
            .map(c => c.dataset.value);
        document.getElementById('healthConditions').value = JSON.stringify(selectedConditions);
        requestData.healthConditions = selectedConditions;
    });
});

// Schedule Card Selection
document.querySelectorAll('.schedule-card').forEach(card => {
    card.addEventListener('click', function() {
        document.querySelectorAll('.schedule-card').forEach(c => c.classList.remove('active'));
        this.classList.add('active');
        document.getElementById('scheduleType').value = this.dataset.value;
        requestData.scheduleType = this.dataset.value;
    });
});

// Check if current step is completed
function checkStepCompletion() {
    const step = document.querySelector(`.modal-step[data-step="${currentStep}"]`);
    const nextBtn = step.querySelector('.btn-next');
    
    if (!nextBtn) return;
    
    let isComplete = false;
    
    switch(currentStep) {
        case 1:
            isComplete = document.getElementById('urgency').value && 
                        document.getElementById('hoursPerWeek').value && 
                        document.getElementById('duration').value;
            break;
        case 2:
            isComplete = document.querySelectorAll('.service-card.active').length > 0;
            break;
        default:
            isComplete = true;
    }
    
    nextBtn.disabled = !isComplete;
}

// Next Button Handler
document.querySelectorAll('.btn-next').forEach(btn => {
    btn.addEventListener('click', async function() {
        const stepData = getStepData(currentStep);
        
        try {
            const endpoint = getStepEndpoint(currentStep);
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify(stepData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                goToStep(currentStep + 1);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        }
    });
});

// Back Button Handler
document.querySelectorAll('.btn-back').forEach(btn => {
    btn.addEventListener('click', function() {
        goToStep(currentStep - 1);
    });
});

// Complete Button Handler
document.getElementById('btnComplete').addEventListener('click', async function() {
    const email = document.getElementById('emailInput').value;
    const phone = document.getElementById('phoneInput').value;
    
    if (!email) {
        alert('Please enter your email address');
        return;
    }
    
    try {
        const response = await fetch(`/caregiver-request/${trackingNumber}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({ email, phone })
        });
        
        const data = await response.json();
        
        if (data.success) {
            document.getElementById('confirmedEmail').textContent = email;
            document.getElementById('finalTrackingNumber').textContent = trackingNumber;
            goToStep(6);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});

function getStepData(step) {
    switch(step) {
        case 1:
            return {
                urgency: document.getElementById('urgency').value,
                hours_per_week: document.getElementById('hoursPerWeek').value,
                duration: document.getElementById('duration').value
            };
        case 2:
            return {
                service_types: requestData.serviceTypes,
                health_conditions: requestData.healthConditions
            };
        case 3:
            return {
                gender_preference: document.getElementById('genderPreference').value || 'any',
                language_preference: document.getElementById('languagePreference').value,
                additional_languages: []
            };
        case 4:
            return {
                schedule_type: document.getElementById('scheduleType').value
            };
        default:
            return {};
    }
}

function getStepEndpoint(step) {
    const endpoints = {
        1: `/caregiver-request/${trackingNumber}/care-needs`,
        2: `/caregiver-request/${trackingNumber}/experience`,
        3: `/caregiver-request/${trackingNumber}/preferences`,
        4: `/caregiver-request/${trackingNumber}/schedule`
    };
    return endpoints[step];
}

function goToStep(step) {
    // Hide current step
    document.querySelectorAll('.modal-step').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.progress-step').forEach(s => s.classList.remove('active'));
    
    // Show new step
    document.querySelector(`.modal-step[data-step="${step}"]`).classList.add('active');
    for (let i = 1; i <= step; i++) {
        document.querySelector(`.progress-step[data-step="${i}"]`).classList.add('active');
    }
    
    currentStep = step;
    checkStepCompletion();
}
    </script>





<script>
// Tracking Form Handler
document.getElementById('trackingForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const trackingNumber = document.getElementById('trackingNumberInput').value.trim();
    const errorDiv = document.getElementById('trackingError');
    
    errorDiv.style.display = 'none';
    
    if (!trackingNumber) {
        errorDiv.textContent = 'Please enter a tracking number';
        errorDiv.style.display = 'block';
        return;
    }
    
    try {
        const response = await fetch(`/track-request/${trackingNumber}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            displayTrackingResult(data.request);
        } else {
            errorDiv.textContent = data.message || 'Request not found';
            errorDiv.style.display = 'block';
        }
    } catch (error) {
        console.error('Error:', error);
        errorDiv.textContent = 'An error occurred. Please try again.';
        errorDiv.style.display = 'block';
    }
});

function displayTrackingResult(request) {
    const statusColors = {
        'incomplete': 'status-incomplete',
        'pending': 'status-pending',
        'matched': 'status-matched',
        'completed': 'status-completed',
        'cancelled': 'status-cancelled'
    };
    
    const statusLabels = {
        'incomplete': 'Incomplete',
        'pending': 'Pending Review',
        'matched': 'Matched',
        'completed': 'Completed',
        'cancelled': 'Cancelled'
    };
    
    const resultHTML = `
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #333; margin-bottom: 10px;">Request Details</h2>
            <div style="font-size: 24px; font-family: 'Courier New', monospace; color: #E65100; font-weight: bold; letter-spacing: 2px; margin: 15px 0;">
                ${request.tracking_number}
            </div>
            <span class="status-badge ${statusColors[request.status]}">
                ${statusLabels[request.status]}
            </span>
        </div>
        
        <div style="background: #f8f9fa; padding: 25px; border-radius: 8px; margin-bottom: 30px;">
            <h3 style="margin-top: 0; color: #00796B;">Basic Information</h3>
            <div class="detail-row">
                <div class="detail-label">Care Recipient:</div>
                <div class="detail-value">${formatRelationship(request.who_needs_care)}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Location:</div>
                <div class="detail-value">${request.location_city || request.location_postcode}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Urgency:</div>
                <div class="detail-value">${formatUrgency(request.urgency)}</div>
            </div>
            ${request.hours_per_week ? `
            <div class="detail-row">
                <div class="detail-label">Hours per Week:</div>
                <div class="detail-value">${request.hours_per_week}</div>
            </div>
            ` : ''}
            <div class="detail-row">
                <div class="detail-label">Created:</div>
                <div class="detail-value">${formatDate(request.created_at)}</div>
            </div>
            ${request.completed_at ? `
            <div class="detail-row">
                <div class="detail-label">Completed:</div>
                <div class="detail-value">${formatDate(request.completed_at)}</div>
            </div>
            ` : ''}
        </div>
        
        <div class="progress-timeline">
            <h3 style="color: #00796B; margin-bottom: 20px;">Request Progress</h3>
            ${generateTimeline(request.current_step, request.status)}
        </div>
        
        ${request.status === 'incomplete' ? `
        <div style="background: #FFF3E0; border-left: 4px solid #FFB74D; padding: 20px; border-radius: 4px; margin-top: 30px;">
            <h4 style="margin-top: 0; color: #F57C00;">⚠️ Action Required</h4>
            <p style="margin-bottom: 15px;">Your request is incomplete. Please complete it to proceed with caregiver matching.</p>
            <a href="/caregiver-request/resume/${request.tracking_number}" class="btn-primary" style="display: inline-block; text-decoration: none;">
                Complete Request
            </a>
        </div>
        ` : ''}
        
        ${request.status === 'pending' ? `
        <div style="background: #E3F2FD; border-left: 4px solid #2196F3; padding: 20px; border-radius: 4px; margin-top: 30px;">
            <h4 style="margin-top: 0; color: #1976D2;">🔍 Under Review</h4>
            <p style="margin: 0;">Our team is reviewing your request and matching you with qualified caregivers. You'll be notified via email once we have matches for you.</p>
        </div>
        ` : ''}
        
        ${request.status === 'matched' ? `
        <div style="background: #E8F5E9; border-left: 4px solid #4CAF50; padding: 20px; border-radius: 4px; margin-top: 30px;">
            <h4 style="margin-top: 0; color: #388E3C;">✓ Caregiver Matched!</h4>
            <p style="margin: 0;">Great news! We've found caregivers that match your requirements. Check your email for detailed profiles and next steps.</p>
        </div>
        ` : ''}
    `;
    
    document.getElementById('trackingResult').innerHTML = resultHTML;
    document.getElementById('trackingModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function generateTimeline(currentStep, status) {
    const steps = [
        { number: 1, title: 'Request Started', desc: 'Basic information collected' },
        { number: 2, title: 'Care Needs', desc: 'Urgency and hours specified' },
        { number: 3, title: 'Experience', desc: 'Service types selected' },
        { number: 4, title: 'Preferences', desc: 'Gender and language preferences' },
        { number: 5, title: 'Schedule', desc: 'Care schedule determined' },
        { number: 6, title: 'Completed', desc: 'Request submitted successfully' }
    ];
    
    return steps.map(step => {
        let iconClass = 'pending';
        let icon = step.number;
        
        if (step.number < currentStep) {
            iconClass = 'completed';
            icon = '✓';
        } else if (step.number === currentStep) {
            iconClass = 'current';
        }
        
        return `
            <div class="timeline-step">
                <div class="timeline-icon ${iconClass}">${icon}</div>
                <div class="timeline-content">
                    <h4>${step.title}</h4>
                    <p>${step.desc}</p>
                </div>
            </div>
        `;
    }).join('');
}

function formatRelationship(value) {
    return value.replace(/_/g, ' ').split(' ').map(word => 
        word.charAt(0).toUpperCase() + word.slice(1)
    ).join(' ');
}

function formatUrgency(value) {
    const urgencyMap = {
        'immediately': 'Immediately',
        'within_2_weeks': 'Within 2 Weeks',
        'within_1_month': 'Within 1 Month'
    };
    return urgencyMap[value] || value;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

function closeTrackingModal() {
    document.getElementById('trackingModal').style.display = 'none';
    document.body.style.overflow = 'auto';
    document.getElementById('trackingNumberInput').value = '';
}

// Close modal when clicking outside
document.getElementById('trackingModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTrackingModal();
    }
});

// Auto-open modal if tracking number in URL
window.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const tracking = urlParams.get('tracking');
    
    if (tracking) {
        document.getElementById('trackingNumberInput').value = tracking;
        document.getElementById('trackingForm').dispatchEvent(new Event('submit'));
    }
});
</script>
    @endsection