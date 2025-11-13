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
    min-width: 400px;
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
</style>

    <!-- Hero CTA Section -->
  <section class="hero-alt">
        <div class="container">
            <div class="hero-alt-content">
                <div class="hero-alt-image">
                    <img src="{{ asset('802.jpg') }}" alt="Healthcare professionals">
                </div>
                <div class="hero-alt-text">
                    <h1>Get started with NuviaCare</h1>
                    <p style="font-size: 19px">Join our nationwide network of caring providers who deliver quality care for non-medical and clinical support needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Our Team Section -->
    <section class="content-section" style="background: white;">
        <div class="container">
            
            <div class="two-column-section">
                <div class="text-column">
                    <h3>Join our team </h3>
                    <p>Join our nationwide network of care providers—home health aides, certified nursing assistants, licensed practical/vocational nurses, registered nurses, nurse practitioners, and more—who provide quality care for non-medical and clinical support needs.</p>
                </div>
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('801.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
           
        </div>
    </section>

    <!-- Benefits Section -->
   <section style="padding: 80px 20px; background: #f8f9fa;">
    <div style="max-width: 1400px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 42px; color: #1a5f4f; margin-bottom: 20px; font-weight: 400; font-family: Georgia, serif;">The benefits of working with NUVIACARE CARE HOME</h2>
        </div>
        
        <!-- Benefits Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; max-width: 1300px; margin: 0 auto;">
            
            <!-- Card 1: Competitive compensation -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <!-- Icon circle with image -->
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; position: relative;">
                    <img src="{{ asset('803.jpg') }}" alt="Compensation" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Competitive compensation</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Enjoy higher wages (20-30% higher than traditional agencies) and additional earning potential through incentives and bonuses</p>
            </div>

            <!-- Card 2: Rewarding work -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <img src="{{ asset('804.jpg') }}" alt="Rewarding work" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Rewarding work</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Make a positive impact on the lives of others by caring for your community</p>
            </div>

            <!-- Card 3: Flexibility -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <img src="{{ asset('805.jpg') }}" alt="Flexibility" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Flexibility</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Craft a schedule that aligns with your lifestyle and commitments</p>
            </div>

            <!-- Card 4: Community support -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <img src="{{ asset('806.jpg') }}" alt="Community support" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Community support</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Join a vast network of care providers who share experiences, insights, and support</p>
            </div>

            <!-- Card 5: Professional growth -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <img src="{{ asset('807.jpg') }}" alt="Professional growth" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Professional growth</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">We offer online classes for additional training and growth opportunities</p>
            </div>

            <!-- Card 6: Manage your work -->
            <div style="background: white; border-radius: 20px; padding: 40px 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); text-align: left; position: relative; overflow: visible;">
                <div style="width: 140px; height: 140px; background: linear-gradient(135deg, #e8f5f3 0%, #d4ebe7 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px;">
                    <img src="{{ asset('808.jpg') }}" alt="Manage your work" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                </div>
                <h3 style="font-size: 24px; color: #1a5f4f; margin-bottom: 15px; font-weight: 400; font-family: Georgia, serif;">Manage your work</h3>
                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">The NUVIACARE app makes it easy to communicate with clients, filter and apply for jobs</p>
            </div>
        </div>
    </div>
</section>
    <!-- Testimonials Section -->
<section style="padding: 80px 20px;  position: relative; overflow: hidden;">
    <div style="max-width: 900px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: 42px; color: #1a5f4f; margin-bottom: 60px; font-weight: 400; font-family: Georgia, serif;">Testimonials</h2>
        
        <!-- Slider Container -->
        <div style="position: relative; min-height: 300px;">
            <!-- Testimonial Slides -->
            <div id="testimonialSlider" style="position: relative;">
                <!-- Slide 1 -->
                <div class="testimonial-slide" style="display: block; opacity: 1; transition: opacity 0.5s ease-in-out;">
                    <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 50px 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 80px; color: #20b2aa; font-family: Georgia, serif; line-height: 0.5; margin-bottom: 20px;">"</div>
                        <p style="font-size: 20px; color: #1a5f4f; line-height: 1.8; margin-bottom: 30px; font-style: italic;">What I like most about NUVIACARE is the fact they take time to give personal attention to the needs of their families and caregivers to help ensure the patients get the quality care they deserve.</p>
                        <p style="font-size: 18px; color: #20b2aa; margin: 0; font-weight: 500;">— Robert</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="testimonial-slide" style="display: none; opacity: 0; transition: opacity 0.5s ease-in-out; position: absolute; top: 0; left: 0; right: 0;">
                    <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 50px 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 80px; color: #20b2aa; font-family: Georgia, serif; line-height: 0.5; margin-bottom: 20px;">"</div>
                        <p style="font-size: 20px; color: #1a5f4f; line-height: 1.8; margin-bottom: 30px; font-style: italic;">NuviaCare made a big difference in my life. I am my own boss. I talk directly to the clients with regards to schedules and salary.</p>
                        <p style="font-size: 18px; color: #20b2aa; margin: 0; font-weight: 500;">— Sarah M.</p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="testimonial-slide" style="display: none; opacity: 0; transition: opacity 0.5s ease-in-out; position: absolute; top: 0; left: 0; right: 0;">
                    <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 50px 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
                        <div style="font-size: 80px; color: #20b2aa; font-family: Georgia, serif; line-height: 0.5; margin-bottom: 20px;">"</div>
                        <p style="font-size: 20px; color: #1a5f4f; line-height: 1.8; margin-bottom: 30px; font-style: italic;">I've been hired by a lot of agencies in the past but I find NuviaCare to be the best place to look for clients and job opportunities that best suit my hours or availability. NuviaCare puts in a lot of thought and effort to find caregivers that suit the family needs.</p>
                        <p style="font-size: 18px; color: #20b2aa; margin: 0; font-weight: 500;">— Victoria</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button onclick="changeSlide(-1)" style="position: absolute; left: -60px; top: 50%; transform: translateY(-50%); background: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.3); color: #1a5f4f; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                ‹
            </button>
            <button onclick="changeSlide(1)" style="position: absolute; right: -60px; top: 50%; transform: translateY(-50%); background: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.3); color: #1a5f4f; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; font-size: 20px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                ›
            </button>
        </div>

        <!-- Dots Navigation -->
        <div style="display: flex; justify-content: center; gap: 12px; margin-top: 40px;">
            <span class="dot" onclick="goToSlide(0)" style="width: 12px; height: 12px; background: #20b2aa; border-radius: 50%; cursor: pointer; transition: all 0.3s ease;"></span>
            <span class="dot" onclick="goToSlide(1)" style="width: 12px; height: 12px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; cursor: pointer; transition: all 0.3s ease;"></span>
            <span class="dot" onclick="goToSlide(2)" style="width: 12px; height: 12px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; cursor: pointer; transition: all 0.3s ease;"></span>
        </div>
    </div>

  
</section>

  
   <!-- Steps Section -->
<section style="padding: 80px 20px; background: #f8f9fa; overflow: hidden;">
    <div style="max-width: 1400px; margin: 0 auto;">
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 42px; color: #1a5f4f; margin-bottom: 20px; font-weight: 400; font-family: Georgia, serif;">Become a NUVIACARE care provider</h2>
        </div>

        <!-- Steps Container - Desktop View -->
        <div id="stepsDesktop" style="display: flex; justify-content: center; align-items: flex-start; gap: 0; margin-bottom: 50px; position: relative;">
            <!-- Step 1 -->
            <div style="flex: 0 0 auto; width: 380px; position: relative; z-index: 3;">
                <div style="width: 380px; height: 380px; border-radius: 50% 0 0 50%; overflow: hidden; position: relative; background: #e8f5f3;">
                    <img src="{{ asset('901.jpg') }}" alt="Share your profile" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- Card -->
                <div style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); margin-top: -80px; margin-left: 30px; margin-right: -50px; position: relative; z-index: 5;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <span style="font-size: 24px; color: white; font-weight: 500;">1</span>
                        </div>
                        <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif;">Share</h3>
                    </div>
                    <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Create a professional profile and go through our verification checks and required training.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div style="flex: 0 0 auto; width: 380px; position: relative; z-index: 2; margin-top: 80px;">
                <div style="width: 380px; height: 380px; border-radius: 0; overflow: hidden; position: relative; background: #e8f5f3;">
                    <img src="{{ asset('902.jpg') }}" alt="Post your availability" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- Card -->
                <div style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); margin-top: -80px; margin-left: -50px; margin-right: -50px; position: relative; z-index: 5;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <span style="font-size: 24px; color: white; font-weight: 500;">2</span>
                        </div>
                        <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif;">Pair</h3>
                    </div>
                    <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Apply for jobs in your area. Coordinate with our Care Advisor team to schedule interviews.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div style="flex: 0 0 auto; width: 380px; position: relative; z-index: 3;">
                <div style="width: 380px; height: 380px; border-radius: 0 50% 50% 0; overflow: hidden; position: relative; background: #e8f5f3;">
                    <img src="{{ asset('903.jpg') }}" alt="Care for patients" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- Card -->
                <div style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); margin-top: -80px; margin-left: -50px; margin-right: 30px; position: relative; z-index: 5;">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                        <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <span style="font-size: 24px; color: white; font-weight: 500;">3</span>
                        </div>
                        <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-weight: 400; font-family: Georgia, serif;">Care</h3>
                    </div>
                    <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Do the job that you love, and let us simplify your payroll and taxes.</p>
                </div>
            </div>
        </div>

        <!-- Steps Container - Mobile Slider -->
        <div id="stepsMobile" style="display: none; position: relative; max-width: 400px; margin: 0 auto 50px;">
            <div id="mobileSlider" style="overflow: hidden;">
                <div id="sliderTrack" style="display: flex; transition: transform 0.3s ease;">
                    <!-- Mobile Slide 1 -->
                    <div class="mobile-slide" style="min-width: 100%; padding: 0 10px; box-sizing: border-box;">
                        <div style="border-radius: 20px; overflow: hidden; background: white; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                            <div style="height: 300px; overflow: hidden; position: relative;">
                                <img src="{{ asset('901.jpg') }}" alt="Share" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 30px;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="font-size: 24px; color: white; font-weight: 500;">1</span>
                                    </div>
                                    <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-family: Georgia, serif;">Share</h3>
                                </div>
                                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Create a professional profile and go through our verification checks and required training.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Slide 2 -->
                    <div class="mobile-slide" style="min-width: 100%; padding: 0 10px; box-sizing: border-box;">
                        <div style="border-radius: 20px; overflow: hidden; background: white; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                            <div style="height: 300px; overflow: hidden;">
                                <img src="{{ asset('902.jpg') }}" alt="Pair" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 30px;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="font-size: 24px; color: white; font-weight: 500;">2</span>
                                    </div>
                                    <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-family: Georgia, serif;">Pair</h3>
                                </div>
                                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Apply for jobs in your area. Coordinate with our Care Advisor team to schedule interviews.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Slide 3 -->
                    <div class="mobile-slide" style="min-width: 100%; padding: 0 10px; box-sizing: border-box;">
                        <div style="border-radius: 20px; overflow: hidden; background: white; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                            <div style="height: 300px; overflow: hidden;">
                                <img src="{{ asset('903.jpg') }}" alt="Care" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="padding: 30px;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 50px; height: 50px; background: #1a5f4f; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span style="font-size: 24px; color: white; font-weight: 500;">3</span>
                                    </div>
                                    <h3 style="font-size: 28px; color: #1a5f4f; margin: 0; font-family: Georgia, serif;">Care</h3>
                                </div>
                                <p style="font-size: 15px; color: #5a5a5a; line-height: 1.6; margin: 0;">Do the job that you love, and let us simplify your payroll and taxes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation Dots -->
            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 30px;">
                <span class="mobile-dot" onclick="goToMobileSlide(0)" style="width: 12px; height: 12px; background: #1a5f4f; border-radius: 50%; cursor: pointer; transition: all 0.3s;"></span>
                <span class="mobile-dot" onclick="goToMobileSlide(1)" style="width: 12px; height: 12px; background: rgba(26, 95, 79, 0.3); border-radius: 50%; cursor: pointer; transition: all 0.3s;"></span>
                <span class="mobile-dot" onclick="goToMobileSlide(2)" style="width: 12px; height: 12px; background: rgba(26, 95, 79, 0.3); border-radius: 50%; cursor: pointer; transition: all 0.3s;"></span>
            </div>
        </div>

        <!-- CTA Button -->
        <div style="text-align: center;">
            <button style="background: #20b2aa; color: white; font-size: 18px; padding: 18px 50px; border: none; border-radius: 50px; cursor: pointer; font-weight: 500; box-shadow: 0 4px 15px rgba(32, 178, 170, 0.3); transition: all 0.3s ease;">
                Get Started
            </button>
        </div>
    </div>

   
</section>

    <!-- Download Section -->
    <section style="background: linear-gradient(135deg, #e8f5f3 0%, #d9ede9 100%); padding: 80px 20px; position: relative; overflow: hidden;">
    <div style="max-width: 1200px; margin: 0 auto; position: relative;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 40px; position: relative;">
            
            <!-- Left Text Content -->
            <div style="flex: 1; min-width: 300px; z-index: 2;">
                <h2 style="font-size: 48px; color: #1a5c52; margin: 0 0 16px 0; font-weight: 400; font-family: Georgia, serif;">Download NuviaCare</h2>
                <p style="font-size: 18px; color: #5a6c68; margin: 0;">Connect with your caregiver anywhere, anytime.</p>
            </div>

            <!-- Right Rating Cards -->
            <div style="display: flex; gap: 30px; flex-wrap: wrap; z-index: 2;">
                
                <!-- App Store Card -->
                <div style="background: white; border-radius: 20px; padding: 40px 50px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); min-width: 280px; text-align: center;">
                    <div style="margin-bottom: 16px;">
                        <span style="font-size: 64px; color: #1a5c52; font-weight: 600; line-height: 1;">4.7</span>
                        <span style="font-size: 18px; color: #7a8a86; margin-left: 8px;">out of 5</span>
                    </div>
                    <div style="color: #00bfa5; font-size: 36px; margin-bottom: 12px; letter-spacing: 4px;">★★★★★</div>
                    <div style="color: #6a7a76; font-size: 16px; margin-bottom: 24px;">1.2K Ratings</div>
                    <div>
                        <img src="{{ asset('122.webp') }}" 
                             alt="Download on App Store" 
                             style="height: 50px;">
                    </div>
                </div>

                <!-- Google Play Card -->
                <div style="background: white; border-radius: 20px; padding: 40px 50px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); min-width: 280px; text-align: center;">
                    <div style="margin-bottom: 16px;">
                        <span style="font-size: 64px; color: #1a5c52; font-weight: 600; line-height: 1;">4.7</span>
                        <span style="font-size: 18px; color: #7a8a86; margin-left: 8px;">out of 5</span>
                    </div>
                    <div style="color: #00bfa5; font-size: 36px; margin-bottom: 12px; letter-spacing: 4px;">★★★★★</div>
                    <div style="color: #6a7a76; font-size: 16px; margin-bottom: 24px;">963 Ratings</div>
                    <div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" 
                             alt="Get it on Google Play" 
                             style="height: 50px;">
                    </div>
                </div>
                
            </div>

            <!-- Decorative Circle -->
            <div style="position: absolute; bottom: -200px; right: 100px; width: 400px; height: 400px; background: linear-gradient(135deg, #00bfa5 0%, #00a89a 100%); border-radius: 50%; z-index: 1; opacity: 0.9;"></div>
            <div style="position: absolute; top: -150px; right: -100px; width: 250px; height: 250px; background: #1a5c52; border-radius: 50%; z-index: 1; opacity: 0.7;"></div>
            
        </div>
    </div>
</section>

  <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.testimonial-slide');
        const dots = document.querySelectorAll('.dot');

        function showSlide(index) {
            // Hide all slides
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.display = 'block';
                    slide.style.position = 'relative';
                    setTimeout(() => {
                        slide.style.opacity = '1';
                    }, 10);
                } else {
                    slide.style.opacity = '0';
                    setTimeout(() => {
                        slide.style.display = 'none';
                        slide.style.position = 'absolute';
                    }, 500);
                }
            });

            // Update dots
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.style.background = '#20b2aa';
                    dot.style.width = '30px';
                } else {
                    dot.style.background = 'rgba(255, 255, 255, 0.3)';
                    dot.style.width = '12px';
                }
            });

            currentSlide = index;
        }

        function changeSlide(direction) {
            let newIndex = currentSlide + direction;
            if (newIndex < 0) {
                newIndex = slides.length - 1;
            } else if (newIndex >= slides.length) {
                newIndex = 0;
            }
            showSlide(newIndex);
        }

        function goToSlide(index) {
            showSlide(index);
        }

        // Auto-advance slides every 5 seconds
        setInterval(() => {
            changeSlide(1);
        }, 5000);

        // Add hover effects to buttons
        const buttons = document.querySelectorAll('button[onclick^="changeSlide"]');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.background = 'rgba(255, 255, 255, 0.3)';
                this.style.transform = 'translateY(-50%) scale(1.1)';
            });
            button.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(255, 255, 255, 0.2)';
                this.style.transform = 'translateY(-50%) scale(1)';
            });
        });
    </script>




 <script>
        let currentMobileSlide = 0;
        const mobileDots = document.querySelectorAll('.mobile-dot');
        const sliderTrack = document.getElementById('sliderTrack');

        function showMobileSlide(index) {
            const slideWidth = document.querySelector('.mobile-slide').offsetWidth;
            sliderTrack.style.transform = `translateX(-${index * slideWidth}px)`;

            mobileDots.forEach((dot, i) => {
                if (i === index) {
                    dot.style.background = '#1a5f4f';
                    dot.style.width = '30px';
                } else {
                    dot.style.background = 'rgba(26, 95, 79, 0.3)';
                    dot.style.width = '12px';
                }
            });

            currentMobileSlide = index;
        }

        function goToMobileSlide(index) {
            showMobileSlide(index);
        }

        // Swipe functionality
        let touchStartX = 0;
        let touchEndX = 0;

        sliderTrack.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        sliderTrack.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50 && currentMobileSlide < 2) {
                showMobileSlide(currentMobileSlide + 1);
            }
            if (touchEndX > touchStartX + 50 && currentMobileSlide > 0) {
                showMobileSlide(currentMobileSlide - 1);
            }
        }

        // Responsive display
        function handleResize() {
            if (window.innerWidth <= 768) {
                document.getElementById('stepsDesktop').style.display = 'none';
                document.getElementById('stepsMobile').style.display = 'block';
            } else {
                document.getElementById('stepsDesktop').style.display = 'flex';
                document.getElementById('stepsMobile').style.display = 'none';
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize();

        // Button hover effect
        const button = document.querySelector('button');
        button.addEventListener('mouseenter', function() {
            this.style.background = '#1a9d96';
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 6px 20px rgba(32, 178, 170, 0.4)';
        });
        button.addEventListener('mouseleave', function() {
            this.style.background = '#20b2aa';
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 15px rgba(32, 178, 170, 0.3)';
        });
    </script>
@endsection