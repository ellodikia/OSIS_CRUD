<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="foto/logo-osis.png">
    <title>Gallery OSIS Raksana</title>
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>// Handle URL parameters for filtering
function handleUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    const filter = urlParams.get('filter');
    
    if (filter) {
        // Find and click the corresponding filter button
        const filterButton = document.querySelector(`.filter-btn[data-filter="${filter}"]`);
        if (filterButton) {
            filterButton.click();
        }
    }
}

// Panggil fungsi ini di akhir DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    // ... kode lainnya ...
    
    // Handle URL parameters
    handleUrlParams();
});</script>
    <style>
        /* ================================
           CSS RESET & BASE VARIABLES
        =================================*/
        :root {
            /* Warna utama (Maroon Theme) */
            --primary: #800000;      /* Base Maroon */
            --primary-light: #a33333; /* Light Maroon */
            --secondary: #5a0000;    /* Darker Maroon */
            --accent: #d4a017;       /* Goldenrod (untuk aksen/kontras) */
            --accent-dark: #b38614;  /* Darker Goldenrod */
            
            /* Warna tambahan */
            --light: #f8f0e8;        /* Cream light untuk background */
            --light-gray: #e8e8e8;   /* Light gray untuk borders */
            --dark: #2a0a0a;         /* Dark reddish-black untuk teks utama */
            --gray: #64748b;         /* Gray untuk teks sekunder */
            --success: #228B22;      /* Hijau untuk status sukses */
            --danger: #CC0000;       /* Merah untuk status penting/peringatan */
            
            /* Font keluarga */
            --font-heading: 'Poppins', sans-serif;
            --font-body: 'Open Sans', sans-serif;
            
            /* Transition untuk animasi */
            --transition: all 0.3s ease;
            
            /* Border radius */
            --radius-sm: 0.25rem;
            --radius: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            
            /* Spacing */
            --space-xs: 0.5rem;
            --space-sm: 1rem;
            --space-md: 1.5rem;
            --space-lg: 2rem;
            --space-xl: 3rem;
            --space-xxl: 4rem;
            
            /* Shadows */
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 10px 15px rgba(0, 0, 0, 0.05), 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px rgba(0, 0, 0, 0.05), 0 10px 10px rgba(0, 0, 0, 0.04);
        }

        /* Reset global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Animasi fade in untuk halaman */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ================================
           BASE STYLES
        =================================*/
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: var(--font-body);
            line-height: 1.6;
            color: var(--dark);
            background-color: var(--light);
            animation: fadeIn 0.8s ease-out;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-heading);
            font-weight: 700;
            line-height: 1.3;
        }

        h1 { font-size: 2.5rem; margin-bottom: var(--space-md); }
        h2 { font-size: 2rem; margin-bottom: var(--space-md); }
        h3 { font-size: 1.5rem; margin-bottom: var(--space-sm); }
        h4 { font-size: 1.25rem; margin-bottom: var(--space-xs); }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-md);
        }

        .section {
            padding: var(--space-xxl) 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .section__title {
            text-align: center;
            margin-bottom: var(--space-xl);
            position: relative;
        }

        /* Garis aksen di bawah judul */
        .section__title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background-color: var(--accent);
            margin: var(--space-sm) auto 0;
            border-radius: 2px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
            min-height: 44px;
            border: none;
            gap: 0.5rem;
        }

        .btn--primary {
            background-color: white;
            color: var(--primary);
            box-shadow: var(--shadow);
        }

        .btn--primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .text-center {
            text-align: center;
        }

        /* ================================
           HEADER
        =================================*/
        .header {
            position: sticky;
            top: 0;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header__container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            position: relative;
        }

        .header__logo-container {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .header__logo {
            height: 50px;
            width: auto;
        }

        /* Navigasi Desktop */
        .nav {
            display: flex;
            gap: var(--space-md);
        }

        .nav__link {
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            padding: 0.5rem 0;
        }

        .nav__link:hover { 
            color: var(--primary); 
        }

        /* Underline animasi di hover */
        .nav__link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s;
        }

        .nav__link:hover::after {
            width: 100%;
        }

        /* Tombol menu mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
            width: 44px;
            height: 44px;
            justify-content: center;
            align-items: center;
            color: var(--dark);
        }

        /* ================================
           MOBILE NAVIGATION (SIDEBAR)
        =================================*/
        @media (max-width: 768px) {
            
            .mobile-menu-btn {
                display: flex;
            }
            
            .nav {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background-color: white;
                flex-direction: column;
                align-items: flex-start;
                padding: 5rem var(--space-md) var(--space-md);
                box-shadow: -5px 0 15px rgba(0,0,0,0.1);
                transition: right 0.3s ease;
                z-index: 999;
            }
            
            .nav.active { 
                right: 0; 
            }
            
            .nav__link {
                padding: var(--space-sm) 0;
                width: 100%;
                border-bottom: 1px solid var(--light-gray);
                font-size: 1.1rem;
            }
            
            /* Overlay ketika menu aktif */
            .nav-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 998;
                opacity: 0;
                visibility: hidden;
                transition: var(--transition);
            }
            
            .nav-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }

        /* ================================
           GALLERY STYLES
        =================================*/
        .gallery-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: var(--space-sm);
            margin-bottom: var(--space-xl);
        }

        .filter-btn {
            padding: 0.5rem 1.25rem;
            background-color: white;
            border: 1px solid var(--light-gray);
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--space-md);
        }

        .gallery-item {
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
            aspect-ratio: 4/3;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .gallery-item__image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-item__image {
            transform: scale(1.05);
        }

        .gallery-item__overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: var(--space-md);
            color: white;
            opacity: 0;
            transition: var(--transition);
            transform: translateY(10px);
        }

        .gallery-item:hover .gallery-item__overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-item__title {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .gallery-item__date {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        /* Modal Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox__content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox__image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: var(--radius);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
        }

        .lightbox__caption {
            color: white;
            text-align: center;
            margin-top: var(--space-sm);
            font-size: 1.1rem;
        }

        .lightbox__close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox__nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 var(--space-md);
        }

        .lightbox__btn {
            color: white;
            background: rgba(0, 0, 0, 0.4);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .lightbox__btn:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        /* ================================
           FOOTER
        =================================*/
        .footer {
            background-color: var(--dark);
            color: white;
            padding: var(--space-xl) 0 var(--space-md);
        }

        .footer__content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .footer__column h3 {
            margin-bottom: var(--space-md);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer__column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .contact-item i {
            margin-top: 0.25rem;
            flex-shrink: 0;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
            margin-top: var(--space-sm);
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .social-link:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: var(--space-md);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* ================================
           RESPONSIVE BREAKPOINTS
        =================================*/
        /* Large screens (max 1200px) */
        @media (max-width: 1200px) {
            .container { 
                padding: 0 var(--space-md); 
            }
        }

        /* Medium screens (max 992px) */
        @media (max-width: 992px) {
            :root {
                --space-xxl: 3rem;
                --space-xl: 2rem;
            }
        }

        /* Tablet screens (max 768px) */
        @media (max-width: 768px) {
            .header {
        height: 70px; /* Tinggi tetap untuk header */
        display: flex;
        align-items: center;
    }
    
    .header__container {
        min-height: 70px; /* Pastikan container juga memiliki tinggi yang sama */
        padding: 0 var(--space-sm); /* Padding konsisten */
    }
    
    .header__logo {
        height: 40px; /* Ukuran logo yang konsisten */
    }
    
    /* Pastikan tombol menu memiliki ukuran yang konsisten */
    .mobile-menu-btn {
        position: absolute;
        right: var(--space-sm);
        top: 50%;
        transform: translateY(-50%);
    }
           
            
            .section { 
                padding: var(--space-xl) 0; 
            }
            
            .section__title {
                font-size: 1.5rem;
                margin-bottom: var(--space-lg);
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }
            
            .lightbox__nav {
                padding: 0 var(--space-sm);
            }
            
            .lightbox__btn {
                width: 40px;
                height: 40px;
                font-size: 1.25rem;
            }
        }

        /* Small screens (max 576px) */
        @media (max-width: 576px) {
            .container {
                padding: 0 var(--space-sm);
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery-filters {
                gap: 0.5rem;
            }
            
            .filter-btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }
            
            .lightbox__content {
                max-width: 95%;
            }
            
            .lightbox__caption {
                font-size: 1rem;
            }
        }

        /* Very small screens (max 400px) */
        @media (max-width: 400px) {
            .header__logo-container {
                gap: 0.5rem;
            }
            
            .header__logo {
                height: 35px;
            }
            
            .section__title {
                font-size: 1.3rem;
            }
        }

        /* ================================
           ANIMATIONS & ACCESSIBILITY
        =================================*/
        /* Focus styles untuk aksesibilitas */
        a:focus-visible,
        button:focus-visible {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            :root {
                --primary: #0044cc;
                --secondary: #002b80;
                --accent: #c57600;
            }
        }

        /* Reduced motion preference */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
            
            .section {
                opacity: 1;
                transform: none;
            }
            
            .gallery-item,
            .filter-btn {
                transition: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container header__container">
            <div class="header__logo-container">
                <img src="foto/logo-sekolah.jpg" alt="Logo Sekolah" class="header__logo">
                <img src="foto/logo-osis.png" alt="Logo OSIS" class="header__logo">
            </div>
            
            <nav class="nav">
                <a href="index.php" class="nav__link">Beranda</a>
                <a href="struktur.php" class="nav__link">Struktur OSIS</a>
                <a href="kalender.php" class="nav__link">Kalender Kegiatan</a>
                <a href="gallery.php" class="nav__link active">Galeri</a>
                <a href="news.php" class="nav__link">Berita & Pengumuman</a>
            </nav>
            
            <button class="mobile-menu-btn" aria-label="Toggle mobile menu">☰</button>
            <div class="nav-overlay"></div>
        </div>
    </header>

    <!-- Hero Section -->
   

    <!-- Main Content -->
    <main id="main-content">
        <!-- Gallery Section -->
        <section class="section">
            <div class="container">
                <h2 class="section__title">Dokumentasi Kegiatan</h2>
                
                <!-- Gallery Filters -->
                <div class="gallery-filters">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="olahraga">Hari Olahraga</button>
                    <button class="filter-btn" data-filter="seni">Pentas Seni</button>
                    <button class="filter-btn" data-filter="seminar">Seminar</button>
                    <button class="filter-btn" data-filter="lainnya">Lainnya</button>
                </div>
                
                <!-- Gallery Grid -->
                <div class="gallery-grid">
                    <!-- Item 1 - Hari Olahraga -->
                    <div class="gallery-item" data-category="olahraga">
                        <img src="foto/1.jpg" alt="Perayaan Hari Olahraga Nasional" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title">Perayaan Hari Olahraga</h3>
                            <p class="gallery-item__date">08 September 2025</p>
                        </div>
                    </div>
                    
                    <!-- Item 2 - Hari Olahraga -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/" alt="" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 3 - Hari Olahraga -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/olahraga3.jpg" alt="" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 4 - Pentas Seni -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/seni1.jpg" alt="" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 5 - Pentas Seni -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/seni2.jpg" alt="Band Siswa" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 6 - Seminar -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/seminar1.jpg" alt="" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 7 - Lainnya -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/lain1.jpg" alt="Kegiatan Bakti Sosial" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                    
                    <!-- Item 8 - Lainnya -->
                    <div class="gallery-item" data-category="">
                        <img src="foto/lain2.jpg" alt="" class="gallery-item__image">
                        <div class="gallery-item__overlay">
                            <h3 class="gallery-item__title"></h3>
                            <p class="gallery-item__date"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Lightbox Modal -->
    <div class="lightbox">
        <button class="lightbox__close">&times;</button>
        <div class="lightbox__nav">
            <button class="lightbox__btn lightbox__prev"><i class="fas fa-chevron-left"></i></button>
            <button class="lightbox__btn lightbox__next"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="lightbox__content">
            <img src="" alt="" class="lightbox__image">
            <p class="lightbox__caption"></p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <!-- About Column -->
                <div class="footer__column">
                    <h3>Tentang OSIS</h3>
                    <p>Organisasi Siswa Intra Sekolah (OSIS) merupakan organisasi resmi sekolah yang bertujuan untuk mengembangkan potensi siswa dan menyalurkan aspirasi siwa.</p>
                </div>
                
                <!-- Contact Column -->
                <div class="footer__column">
                    <h3>Kontak Kami</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Gajah Mada N0. 20 Medan, Sumatera Utara, Indonesia</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>osisraksana@.sch.id</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span></span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media Column -->
                <div class="footer__column">
                    <h3>Media Sosial</h3>
                    <p>Ikuti kami di media sosial untuk informasi terbaru</p>
                    <div class="social-links">
                        <a href="https://www.instagram.com/osisraksanamdn/" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 OSIS Yayasan Pendidikan Raksana. Semua Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Mobile Menu Toggle dengan Overlay ---
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const nav = document.querySelector('.nav');
            const overlay = document.querySelector('.nav-overlay');
            const body = document.body;
            
            if (mobileMenuBtn && nav) {
                mobileMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleMobileMenu();
                });
                
                if (overlay) {
                    overlay.addEventListener('click', () => {
                        closeMobileMenu();
                    });
                }
                
                // Tutup menu ketika klik link di navigasi
                nav.addEventListener('click', (e) => {
                    if (e.target.tagName === 'A') {
                        closeMobileMenu();
                    }
                });
                
                // Fungsi untuk toggle menu mobile
                function toggleMobileMenu() {
                    nav.classList.toggle('active');
                    if (overlay) {
                        overlay.classList.toggle('active');
                    }
                    mobileMenuBtn.innerHTML = nav.classList.contains('active') ? '✕' : '☰';
                    
                    // Prevent body scroll ketika menu terbuka
                    if (nav.classList.contains('active')) {
                        body.style.overflow = 'hidden';
                    } else {
                        body.style.overflow = '';
                    }
                }
                
                // Fungsi untuk menutup menu mobile
                function closeMobileMenu() {
                    if (nav.classList.contains('active')) {
                        nav.classList.remove('active');
                        if (overlay) {
                            overlay.classList.remove('active');
                        }
                        mobileMenuBtn.innerHTML = '☰';
                        body.style.overflow = '';
                    }
                }
            }
            
            // --- Animasi Scroll untuk Sections ---
            const sections = document.querySelectorAll('.section');
            
            // Fungsi untuk memeriksa apakah elemen terlihat di viewport
            function isElementInViewport(el) {
                const rect = el.getBoundingClientRect();
                return (
                    rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9 &&
                    rect.bottom >= 0
                );
            }
            
            // Fungsi untuk menangani animasi scroll
            function handleScrollAnimation() {
                sections.forEach(section => {
                    if (isElementInViewport(section)) {
                        section.classList.add('visible');
                    }
                });
            }
            
            // Jalankan saat scroll dan saat load pertama
            window.addEventListener('scroll', handleScrollAnimation);
            window.addEventListener('load', handleScrollAnimation);
            handleScrollAnimation(); // Jalankan sekali saat pertama dimuat
            
            // --- Gallery Filter Functionality ---
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    button.classList.add('active');
                    
                    const filterValue = button.getAttribute('data-filter');
                    
                    // Filter gallery items
                    galleryItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        
                        if (filterValue === 'all' || filterValue === itemCategory) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // --- Lightbox Functionality ---
            const lightbox = document.querySelector('.lightbox');
            const lightboxImage = document.querySelector('.lightbox__image');
            const lightboxCaption = document.querySelector('.lightbox__caption');
            const lightboxClose = document.querySelector('.lightbox__close');
            const lightboxPrev = document.querySelector('.lightbox__prev');
            const lightboxNext = document.querySelector('.lightbox__next');
            
            let currentImageIndex = 0;
            let images = [];
            
            // Initialize lightbox with all visible images
            function initLightbox() {
                images = Array.from(document.querySelectorAll('.gallery-item:not([style*="display: none"])'));
                
                galleryItems.forEach((item, index) => {
                    item.addEventListener('click', () => {
                        // Update current image index based on filtered items
                        const visibleItems = Array.from(document.querySelectorAll('.gallery-item:not([style*="display: none"])'));
                        currentImageIndex = visibleItems.indexOf(item);
                        
                        openLightbox(currentImageIndex);
                    });
                });
            }
            
            // Open lightbox with specific image
            function openLightbox(index) {
                const visibleItems = Array.from(document.querySelectorAll('.gallery-item:not([style*="display: none"])'));
                
                if (visibleItems.length === 0) return;
                
                const imageSrc = visibleItems[index].querySelector('img').src;
                const imageTitle = visibleItems[index].querySelector('.gallery-item__title').textContent;
                const imageDate = visibleItems[index].querySelector('.gallery-item__date').textContent;
                
                lightboxImage.src = imageSrc;
                lightboxCaption.textContent = `${imageTitle} - ${imageDate}`;
                
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Close lightbox
            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
            }
            
            // Navigate to next image
            function nextImage() {
                const visibleItems = Array.from(document.querySelectorAll('.gallery-item:not([style*="display: none"])'));
                currentImageIndex = (currentImageIndex + 1) % visibleItems.length;
                openLightbox(currentImageIndex);
            }
            
            // Navigate to previous image
            function prevImage() {
                const visibleItems = Array.from(document.querySelectorAll('.gallery-item:not([style*="display: none"])'));
                currentImageIndex = (currentImageIndex - 1 + visibleItems.length) % visibleItems.length;
                openLightbox(currentImageIndex);
            }
            
            // Event listeners for lightbox controls
            lightboxClose.addEventListener('click', closeLightbox);
            lightboxNext.addEventListener('click', nextImage);
            lightboxPrev.addEventListener('click', prevImage);
            
            // Close lightbox when clicking on overlay
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (lightbox.classList.contains('active')) {
                    if (e.key === 'Escape') closeLightbox();
                    if (e.key === 'ArrowRight') nextImage();
                    if (e.key === 'ArrowLeft') prevImage();
                }
            });
            
            // Initialize lightbox
            initLightbox();
            
            // Reinitialize lightbox when filters change
            filterButtons.forEach(button => {
                button.addEventListener('click', initLightbox);
            });
        });
    </script>
</body>
</html>