<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUVIACARE - Giving Care to You and Your Loved Ones</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Primary Meta Tags -->
<meta name="title" content="NuviaCare - Professional Care Jobs & Caregivers in the UK">
<meta name="description" content="Find quality care jobs or hire professional caregivers in the UK with NuviaCare. Connecting compassionate care providers with families and health systems for in-home care, personal care, and healthcare staffing solutions.">
<meta name="keywords" content="care jobs UK, caregiver jobs, healthcare jobs, home care jobs, personal care assistant, care worker, nursing jobs, elderly care, health care staffing, find caregiver UK">
<meta name="author" content="NuviaCare">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Open Graph / Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="NuviaCare - Professional Care Jobs & Caregivers in the UK">
<meta property="og:description" content="Find quality care jobs or hire professional caregivers in the UK with NuviaCare. Connecting compassionate care providers with families and health systems for in-home care and healthcare staffing solutions.">
<meta property="og:image" content="{{ asset('logo.jpg') }}">
<meta property="og:site_name" content="NuviaCare">
<meta property="og:locale" content="en_GB">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="NuviaCare - Professional Care Jobs & Caregivers in the UK">
<meta name="twitter:description" content="Find quality care jobs or hire professional caregivers in the UK with NuviaCare. Connecting compassionate care providers with families and health systems.">
<meta name="twitter:image" content="{{ asset('logo.jpg') }}">

<!-- Additional Meta Tags -->
<meta name="robots" content="index, follow">
<meta name="language" content="English">
<meta name="geo.region" content="GB">
<meta name="geo.placename" content="United Kingdom">
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('logo.jpg') }}">
<!-- Canonical URL -->
<link rel="canonical" href="{{ url()->current() }}">
</head>
<body>


    
    <!-- Header -->
   @include('user1.body.header1')

    <!-- Hero Section -->
    
@yield('user1')


    <!-- Footer -->
     @include('user1.body.footer')

    <!-- Accessibility Button -->

</body>
</html>