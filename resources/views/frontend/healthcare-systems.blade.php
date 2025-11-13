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





.container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .header h1 {
            font-size: 48px;
            color: #1a5745;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .header p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            max-width: 900px;
            margin: 0 auto;
        }

        .carousel-section {
            background: white;
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            display: flex;
            align-items: center;
            padding: 0;
            gap: 0;
            height: 300px;
        }

        .carousel-image {
            flex: 0 0 50%;
            height: 100%;
        }

        .carousel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
        }

        .carousel-text {
            flex: 0 0 50%;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .carousel-text h3 {
            font-size: 48px;
            color: #1a5745;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .carousel-text p {
            font-size: 20px;
            color: #333;
            line-height: 1.6;
        }

        .carousel-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 30px 0 40px;
        }

        .carousel-arrow {
            background: none;
            border: none;
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
            padding: 10px;
            transition: color 0.3s;
        }

        .carousel-arrow:hover {
            color: #1a5745;
        }

        .carousel-arrow:disabled {
            color: #e0e0e0;
            cursor: not-allowed;
        }

        .carousel-dots {
            display: flex;
            gap: 12px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #d4d4d4;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #6fb5a0;
        }

        @media (max-width: 968px) {
            .carousel-item {
                flex-direction: column;
                padding: 40px;
                gap: 30px;
            }

            .carousel-image {
                flex: 0 0 auto;
                width: 100%;
            }

            .carousel-text {
                padding-right: 0;
            }

            .carousel-text h3 {
                font-size: 36px;
            }

            .carousel-text p {
                font-size: 18px;
            }

            .header h1 {
                font-size: 36px;
            }

            .header p {
                font-size: 16px;
            }
        }
</style>

<style>

/* Success Modal */
.success-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}
.success-modal.show {
    display: flex;
}
.success-modal-content {
    background: white;
    padding: 40px;
    border-radius: 16px;
    text-align: center;
    max-width: 450px;
    margin: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.4s ease-out;
}
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.success-icon {
    width: 80px;
    height: 80px;
    background: #0d6e6e;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    animation: scaleIn 0.5s ease-out 0.2s backwards;
}
@keyframes scaleIn {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}
.success-icon svg {
    width: 50px;
    height: 50px;
    stroke: white;
    stroke-width: 3;
    stroke-linecap: round;
    stroke-linejoin: round;
    fill: none;
    animation: drawCheck 0.5s ease-out 0.4s backwards;
}
@keyframes drawCheck {
    from {
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
    }
    to {
        stroke-dasharray: 100;
        stroke-dashoffset: 0;
    }
}
.success-modal h3 {
    color: #0d6e6e;
    font-size: 1.8rem;
    margin-bottom: 15px;
    font-weight: 600;
}
.success-modal p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 25px;
    line-height: 1.6;
}
.success-modal-btn {
    background: #0d6e6e;
    color: white;
    padding: 12px 40px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}
.success-modal-btn:hover {
    background: #0a5252;
}


</style>

<style>
.contact-section {
    padding: 80px 20px;
    background: #f8f9fa;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    align-items: start;
}

.contact-text h2 {
    font-size: 42px;
    color: #1a5f4f;
    font-weight: 400;
    line-height: 1.3;
    font-family: Georgia, serif;
}

.contact-form {
    background: white;
    padding: 40px;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.contact-form form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-form select {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background: white;
    color: #333;
    cursor: pointer;
    transition: border-color 0.3s;
}

.contact-form select:focus {
    outline: none;
    border-color: #0d6e6e;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-size: 15px;
    color: #333;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 14px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.3s;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #0d6e6e;
}

.form-group textarea {
    height: 180px;
    resize: vertical;
    min-height: 120px;
    max-height: 300px;
}

.form-group .is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

.btn-primary {
    background: #0d6e6e;
    color: white;
    padding: 14px 32px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
    align-self: flex-start;
}

.btn-primary:hover {
    background: #0a5252;
}

.btn-large {
    padding: 16px 40px;
    font-size: 17px;
}

/* Tablet Styles */
@media (max-width: 968px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .contact-text {
        text-align: center;
    }

    .contact-text h2 {
        font-size: 36px;
    }

    .contact-form {
        padding: 30px;
    }
}

/* Mobile Styles */
@media (max-width: 640px) {
    .contact-section {
        padding: 60px 15px;
    }

    .contact-text h2 {
        font-size: 28px;
    }

    .contact-form {
        padding: 25px 20px;
    }

    .form-group input,
    .form-group textarea,
    .contact-form select {
        padding: 12px;
        font-size: 15px;
    }

    .form-group textarea {
        height: 150px;
    }

    .btn-primary {
        width: 100%;
        padding: 14px 24px;
        align-self: stretch;
    }

    .btn-large {
        padding: 16px 24px;
        font-size: 16px;
    }
}

</style>

<section class="hero-alt">
    <div class="container">
        <div class="hero-alt-content">
            <div class="hero-alt-image">
                <img src="{{ asset('206.jpg') }}" alt="Caregiver with elderly woman">
            </div>
            <div class="hero-alt-text">
                <h1>In-home care for health systems</h1>
                <p style="font-size: 19px">Reduce patient costs and scalably lowering the total cost of care.</p>
            </div>
        </div>
    </div>
</section>


<!-- Success Modal -->
<div class="success-modal" id="successModal">
    <div class="success-modal-content">
        <div class="success-icon">
            <svg viewBox="0 0 52 52">
                <polyline points="14 27 22 35 38 19"/>
            </svg>
        </div>
        <h3>Message Sent Successfully!</h3>
        <p>Thank you for contacting us. We have received your message and will get back to you as soon as possible.</p>
        <button class="success-modal-btn" onclick="closeModal()">OK</button>
    </div>
</div>


    <!-- Patient-Centered Section -->
    <section class="content-section">
       <div class="container">
        <div class="header">
            <h1>Patient-centered, cost-effective care</h1>
            <p>Improve population health, clinical outcomes, and patient experience all while reducing total cost of care. NuviaCare by NuviaCare helps healthcare providers support patients who are</p>
        </div>

        <div class="carousel-section">
            <div class="carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    <!-- Slide 1 -->
                    <div class="carousel-item">
                        <div class="carousel-image">
                            <img src="{{ asset('207.jpg') }}" alt="Healthcare worker with elderly patient">
                        </div>
                        <div class="carousel-text">
                            <h3>High cost</h3>
                            <p>Medicare spending is ~2x higher among those who receive inadequate in-home support for basic activities of daily living (ADLs).</p>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="carousel-image">
                            <img src="{{ asset('208.jpg') }}" alt="Patient care">
                        </div>
                        <div class="carousel-text">
                            <h3>High need</h3>
                            <p>We identify high-cost patients and help address their medical, behavioral, and/or social needs—before they become more acute.</p>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="carousel-image">
                            <img src="{{ asset('209.jpg') }}" alt="Home healthcare">
                        </div>
                        <div class="carousel-text">
                            <h3>High quality</h3>
                            <p>Our caregivers provide compassionate, professional support that improves patient outcomes and satisfaction while reducing hospital readmissions.</p>
                        </div>
                    </div>
                </div>
            </div>

         
        </div>
           <div class="carousel-controls">
                <button class="carousel-arrow" id="prevBtn" onclick="moveSlide(-1)">‹</button>
                <div class="carousel-dots" id="dotsContainer">
                    <span class="dot active" onclick="goToSlide(0)"></span>
                    <span class="dot" onclick="goToSlide(1)"></span>
                    <span class="dot" onclick="goToSlide(2)"></span>
                </div>
                <button class="carousel-arrow" id="nextBtn" onclick="moveSlide(1)">›</button>
            </div>
    </div>

    </section>

 

  

    <!-- Companionship Section -->
    <section class="content-section" style="background: white;">
        <div class="container">
            <div class="header">
            <h1>In-home services supporting the entire care continuum</h1>
         </div>
            <div class="two-column-section">
                <div class="text-column">
                    <h3>Companionship, home helper, and personal care</h3>
                    <p>Designated non-medical caregivers provide in-home, community, and personal services—such as meal preparation and transportation—that help people remain independent—and healthier—at home.</p>
                </div>
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('204.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
              <br><br><br>
             <div  class="two-column-section ">
               
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('205.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                 <div class="text-column">
                    <h3>Clinical care support services</h3>
                    <p>Clinicians and case managers add continuous caregiver status—any changes in a patient's condition or needs—to help ensure uninterrupted, frictionless healthcare. It may support caregiver patient readout to care and support primary care teams to monitor hospital readmission risk.</p>
                </div>
            </div>
        </div>
    </section>

    
 <!-- Customized Programs Section -->
<section style="padding: 80px 20px; background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);">
    <div style="max-width: 1400px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 80px; max-width: 900px; margin-left: auto; margin-right: auto;">
            <h2 style="font-size: 42px; color: #1a5f4f; margin-bottom: 20px; font-weight: 400; font-family: Georgia, serif;">Customized in-home care programs</h2>
            <p style="font-size: 18px; color: #5a5a5a; line-height: 1.6;">From longitudinal support for Medicare Advantage members to targeted support for managed care and commercial members, our in-home care programs can be tailored as a:</p>
        </div>

        <!-- Programs Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; position: relative; align-items: start;">
            
            <!-- Card 1: Transition of care (Top Left) -->
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; z-index: 3; transform: translateY(-20px);">
                <img src="{{ asset('307.jpg') }}" alt="Transition of care" style="width: 100%; height: 280px; object-fit: cover; display: block;">
                <div style="padding: 30px;">
                    <h4 style="font-size: 26px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Transition of care programs</h4>
                </div>
                <!-- Decorative circle -->
                <div style="position: absolute; width: 180px; height: 180px; background: #1a5f4f; border-radius: 50%; top: -40px; left: -90px; z-index: -1;"></div>
            </div>

            <!-- Card 2: Advance care management (Middle) -->
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; z-index: 2; transform: translateY(30px);">
                <img src="{{ asset('308.jpg') }}" alt="Advance care management" style="width: 100%; height: 280px; object-fit: cover; display: block;">
                <div style="padding: 30px;">
                    <h4 style="font-size: 26px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Advance care management & quality programs</h4>
                </div>
            </div>

            <!-- Card 3: Care gap closure (Top Right) -->
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; z-index: 3; transform: translateY(-30px);">
                <img src="{{ asset('309.jpg') }}" alt="Care gap closure" style="width: 100%; height: 280px; object-fit: cover; display: block;">
                <div style="padding: 30px;">
                    <h4 style="font-size: 26px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Care gap closure & in-home assessments</h4>
                </div>
                <!-- Decorative circle -->
                <div style="position: absolute; width: 200px; height: 200px; background: #20b2aa; border-radius: 50%; bottom: -100px; right: -100px; z-index: -1;"></div>
            </div>

            <!-- Card 4: Healthcare professional staffing (Bottom Right) -->
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; z-index: 2; transform: translateY(0px); grid-column: span 1; margin-left: auto; max-width: 400px;">
                <img src="{{ asset('401.jpg') }}" alt="Healthcare staffing" style="width: 100%; height: 280px; object-fit: cover; display: block;">
                <div style="padding: 30px;">
                    <h4 style="font-size: 26px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Healthcare professional staffing</h4>
                </div>
                <!-- Decorative circle -->
                <div style="position: absolute; width: 150px; height: 150px; background: #20b2aa; border-radius: 50%; bottom: -75px; left: -75px; z-index: -1;"></div>
            </div>
        </div>
    </div>
</section>
    <!-- Outcomes Section -->
  <section style="padding: 80px 20px; background: #ffffff;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 80px;">
            <h2 style="font-size: 42px; color: #1a5f4f; margin-bottom: 20px; font-weight: 400; font-family: Georgia, serif;">Proven outcomes drive quality, value, and performance</h2>
        </div>

        <!-- Outcome 1: Reducing readmissions -->
        <div style="display: flex; align-items: center; gap: 60px; margin-bottom: 100px; flex-wrap: wrap;">
            <!-- Image with decorative circle -->
            <div style="position: relative; flex-shrink: 0;">
                <div style="width: 320px; height: 320px; border-radius: 50%; overflow: hidden; position: relative; z-index: 2;">
                    <img src="{{ asset('403.jpg') }}" alt="Reducing readmissions" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- Decorative circle bottom right -->
                <div style="position: absolute; width: 200px; height: 200px; background: #1a5f4f; border-radius: 50%; bottom: -50px; right: -50px; z-index: 1;"></div>
            </div>
            
            <!-- Content -->
            <div style="flex: 1; min-width: 300px;">
                <h3 style="font-size: 36px; color: #1a5f4f; margin-bottom: 40px; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Reducing readmissions with in-home care</h3>
                <div style="display: flex; gap: 80px; flex-wrap: wrap;">
                    <div>
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">21%</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">reduction in 30-day readmissions, Medicare participants</div>
                    </div>
                    <div style="border-left: 2px solid #e0e0e0; padding-left: 40px;">
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">68</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">Net Promoter Score (NPS) (>50 considered excellent)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outcome 2: Targeted care gap closure -->
        <div style="display: flex; align-items: center; gap: 60px; margin-bottom: 100px; flex-wrap: wrap; flex-direction: row-reverse;">
            <!-- Image with decorative circle -->
            <div style="position: relative; flex-shrink: 0;">
                <div style="width: 320px; height: 320px; border-radius: 50%; overflow: hidden; position: relative; z-index: 2;">
                    <img src="{{ asset('302.jpg') }}" alt="Targeted care gap" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- Decorative circle top left -->
                <div style="position: absolute; width: 200px; height: 200px; background: #20b2aa; border-radius: 50%; top: -50px; left: -50px; z-index: 1;"></div>
            </div>
            
            <!-- Content -->
            <div style="flex: 1; min-width: 300px;">
                <h3 style="font-size: 36px; color: #1a5f4f; margin-bottom: 40px; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Targeted care gap closure</h3>
                <div style="display: flex; gap: 80px; flex-wrap: wrap;">
                    <div>
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">41%</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">increase in Primary Care Physician (PCP) engagement and capture rate</div>
                    </div>
                    <div style="border-left: 2px solid #e0e0e0; padding-left: 40px;">
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">24%</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">increase in Annual Wellness Visits (AWV)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outcome 3: Published outcomes -->
        <div style="display: flex; align-items: center; gap: 60px; margin-bottom: 40px; flex-wrap: wrap;">
            <!-- Image with decorative circle -->
            <div style="position: relative; flex-shrink: 0;">
                <div style="width: 320px; height: 320px; border-radius: 50%; overflow: hidden; position: relative; z-index: 2;">
                    <img src="{{ asset('404.jpg') }}" alt="Published outcomes" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
                <!-- Decorative circle bottom left -->
                <div style="position: absolute; width: 180px; height: 180px; background: #1a5f4f; border-radius: 50%; bottom: -40px; left: -40px; z-index: 1;"></div>
            </div>
            
            <!-- Content -->
            <div style="flex: 1; min-width: 300px;">
                <h3 style="font-size: 36px; color: #1a5f4f; margin-bottom: 40px; font-weight: 400; font-family: Georgia, serif; line-height: 1.3;">Published outcomes and combating social isolation and loneliness</h3>
                <div style="display: flex; gap: 80px; flex-wrap: wrap;">
                    <div>
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">53%</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">Enrolled in a pilot felt less lonely by Week 10 of the study</div>
                    </div>
                    <div style="border-left: 2px solid #e0e0e0; padding-left: 40px;">
                        <div style="font-size: 56px; color: #1a5f4f; font-weight: 400; font-family: Georgia, serif; margin-bottom: 10px;">52%</div>
                        <div style="font-size: 16px; color: #5a5a5a; line-height: 1.5; max-width: 250px;">Enrolled in a continuing study felt less isolated by Week 10</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Provider Network Section -->
      <section class="content-section" style="background: white;">
        <div class="container">
           
            <div class="two-column-section">
                <div class="text-column">
                    <h3>A tech-enabled nationwide provider network</h3>
                    <p>NuviaCare professionals are rigorously vetted and verified professionals from across the healthcare industry.

Our rigorous screening process ensures that members have access to skilled and trusted professionals. The screening process includes comprehensive background checks, multi-step behavioral interviews, and customizable training requirements.</p>
                </div>
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('201.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
              <br><br><br>
             <div  class="two-column-section ">
               
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('202.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                 <div class="text-column">
                    <h3>Technology integration to maximize clinical teams  </h3>
                    <p>As a technology platform, NuviaCare by NuviaCare provides unparalleled support by offering visibility and insights into the care delivered at home. From tech-enabled integrations with electronic medical records systems (EMRs) to clinical teams logging into our population health dashboard, you can review in real-time in-home assessments, care plans, and automated alerts. NuviaCare clinical managers can also help monitor and seamlessly coordinate care. Our data and systems are HIPAA compliant and HITRUST and SOC 2 certified.</p>
                </div>
            </div>
        </div>
    </section>




<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-text">
                <h2>Contact NUVIACARE to learn more.</h2>
            </div>
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <select id="subject" name="subject" class="@error('subject') is-invalid @enderror" required>
                        <option value="">I would like to*</option>
                        <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Customer Support</option>
                        <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership Opportunities</option>
                        <option value="careers" {{ old('subject') == 'careers' ? 'selected' : '' }}>Careers</option>
                        <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                   
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" class="@error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn-primary btn-large">Contact NUVIACARE</button>
                </form>
            </div>
        </div>
    </div>
</section>



        <script>
@if(session('success') || session('message'))
    document.addEventListener('DOMContentLoaded', function() {
        showSuccessModal();
    });
@endif

function showSuccessModal() {
    document.getElementById('successModal').classList.add('show');
}

function closeModal() {
    document.getElementById('successModal').classList.remove('show');
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('successModal');
    if (event.target === modal) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});
</script>


<script>
        let currentSlide = 0;
        const totalSlides = 3;
        const track = document.getElementById('carouselTrack');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function updateSlider() {
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });

            // Update button states
            prevBtn.disabled = currentSlide === 0;
            nextBtn.disabled = currentSlide === totalSlides - 1;
        }

        function moveSlide(direction) {
            currentSlide += direction;
            if (currentSlide < 0) currentSlide = 0;
            if (currentSlide >= totalSlides) currentSlide = totalSlides - 1;
            updateSlider();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
        }

        // Initialize
        updateSlider();

        // Optional: Auto-play
        let autoPlayInterval;
        function startAutoPlay() {
            autoPlayInterval = setInterval(() => {
                if (currentSlide < totalSlides - 1) {
                    moveSlide(1);
                } else {
                    currentSlide = 0;
                    updateSlider();
                }
            }, 5000);
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        // Uncomment to enable auto-play
        // startAutoPlay();

        // Stop auto-play on user interaction
        document.querySelector('.carousel-section').addEventListener('mouseenter', stopAutoPlay);
    </script>
   @endsection