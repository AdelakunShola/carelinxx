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
/* By the numbers section styles */
.by-numbers-section {
    background: white;
    padding: 60px 0;
}
.by-numbers-title {
    text-align: center;
    font-size: 2.5rem;
    color: #0d6e6e;
    margin-bottom: 50px;
    font-weight: 600;
}
.numbers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.number-card {
    display: flex;
    align-items: center;
    background: #e8f4f4;
    border-radius: 50px;
    padding: 20px 30px;
    gap: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}
.number-value {
    font-size: 3rem;
    color: #0d6e6e;
    font-weight: 600;
    min-width: 140px;
    text-align: center;
}
.number-description {
    color: #333;
    font-size: 1rem;
    line-height: 1.4;
}
@media (max-width: 768px) {
    .by-numbers-title {
        font-size: 2rem;
    }
    .number-value {
        font-size: 2.5rem;
        min-width: 100px;
    }
    .numbers-grid {
        grid-template-columns: 1fr;
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

   
    <section class="content-section" style="background: white;">
        <div class="container">
            
            <div class="two-column-section">
                <div class="text-column">
                    <h3>About CareLinx: Connecting care, enhancing lives</h3>
                    <p>CareLinx by Sharecare is the leading nationwide home care solution. Founded in 2011, CareLinx has people at the core of its offerings and connects families with caregivers to create a high-quality and affordable home care solution that addresses caring for loved ones. Over the last 10+ years, we have continued to enhance our tech platform, support our growing network of professionals, and develop partner relationships including AARP.</p>
                </div>
                <div class="image-wrapper" style="border-radius: 15px 50px 30px 5px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('801.jpg') }}" alt="Technology" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
           
        </div>
    </section>

 



    <!-- By the numbers Section -->
    <section class="by-numbers-section">
        <div class="container">
            <h2 class="by-numbers-title">By the numbers</h2>
            <div class="numbers-grid">
                <div class="number-card">
                    <div class="number-value">2M</div>
                    <div class="number-description">eligible lives</div>
                </div>
                <div class="number-card">
                    <div class="number-value">5M+</div>
                    <div class="number-description">hours of care provided</div>
                </div>
                <div class="number-card">
                    <div class="number-value">90+</div>
                    <div class="number-description">net promoter score</div>
                </div>
                <div class="number-card">
                    <div class="number-value">21%</div>
                    <div class="number-description">reduction in 30-day readmissions</div>
                </div>
                <div class="number-card">
                    <div class="number-value">47%</div>
                    <div class="number-description">decrease in social isolation</div>
                </div>
                <div class="number-card">
                    <div class="number-value">48%</div>
                    <div class="number-description">decreased in loneliness</div>
                </div>
            </div>
        </div>
    </section>
 
@endsection