<?php
require_once 'config.php';

// Ambil data berita dari database
$stmt = $pdo->query("SELECT * FROM news ORDER BY date DESC LIMIT 3");
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil data pengumuman dari database
$stmt = $pdo->query("SELECT * FROM announcements ORDER BY created_at DESC");
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate token CSRF
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS Raksana</title>
    <link rel="icon" type="image/png" href="foto/logo-osis.png">
    
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
           HERO SECTION
        =================================*/
        .hero {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: var(--space-xxl) 0;
            position: relative;
            overflow: hidden;
        }

        .hero__content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: var(--space-md);
            position: relative;
            z-index: 2;
        }

        .hero__title {
            font-size: 2.5rem;
            line-height: 1.2;
        }

        .hero__description {
            font-size: 1.2rem;
            max-width: 600px;
        }

        /* ================================
           NEWS GRID
        =================================*/
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--space-md);
        }

        .news-card {
            background-color: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .news-card__image {
            height: 200px;
            width: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .news-card:hover .news-card__image {
            transform: scale(1.05);
        }

        .news-card__content {
            padding: var(--space-md);
        }

        .news-card__date {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .news-card__title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .news-card__excerpt {
            color: var(--gray);
            margin-bottom: var(--space-sm);
            line-height: 1.5;
        }

        .news-card__link {
            color: var(--primary);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-card__link:hover {
            gap: 0.75rem;
        }

        /* ================================
           ANNOUNCEMENTS
        =================================*/
        .bg-gray {
            background-color: rgba(0, 0, 0, 0.03);
        }

        .announcement-list {
            background-color: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        }

        .announcement-item {
            padding: var(--space-md);
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            transition: var(--transition);
        }

        .announcement-item:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-badge {
            background-color: var(--danger);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            flex-shrink: 0;
            margin-top: 0.25rem;
        }

        .announcement-item__content {
            flex: 1;
        }

        .announcement-item__title {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .announcement-item__description {
            color: var(--gray);
        }

        /* ================================
           QUICK LINKS
        =================================*/
        .quick-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-md);
            margin-top: var(--space-xl);
        }

        .quick-link-card {
            background-color: white;
            border-radius: var(--radius-lg);
            padding: var(--space-md);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            display: block;
        }

        .quick-link-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            color: var(--primary);
        }

        .quick-link-card__icon {
            font-size: 2rem;
            margin-bottom: var(--space-sm);
            color: var(--primary);
            transition: var(--transition);
        }

        .quick-link-card:hover .quick-link-card__icon {
            transform: scale(1.1);
        }

        .quick-link-card__title {
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .quick-link-card__description {
            color: var(--gray);
            font-size: 0.9rem;
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
            .hero__title { 
                font-size: 2.2rem; 
            }
            .hero__description { 
                font-size: 1.1rem; 
            }
            
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
            
            .hero {
                padding: var(--space-xl) 0;
                text-align: center;
            }
            
            .hero__content {
                align-items: center;
            }
            
            .hero__title { 
                font-size: 1.8rem; 
            }
            
            .hero__description { 
                font-size: 1rem; 
            }
            
            .section { 
                padding: var(--space-xl) 0; 
            }
            
            .section__title {
                font-size: 1.5rem;
                margin-bottom: var(--space-lg);
            }
            
            .news-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }
            
            .quick-links {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--space-sm);
            }
            
            .announcement-item {
                padding: var(--space-sm);
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .footer__content {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }
        }

        /* Small screens (max 576px) */
        @media (max-width: 576px) {
            .container {
                padding: 0 var(--space-sm);
            }
            
            .hero__title { 
                font-size: 1.6rem; 
            }
            
            .btn { 
                padding: 0.75rem 1.25rem; 
                font-size: 0.9rem;
            }
            
            .quick-links {
                grid-template-columns: 1fr;
            }
            
            .quick-link-card {
                padding: var(--space-sm);
            }
            
            .news-card__content {
                padding: var(--space-sm);
            }
            
            .footer__column h3 {
                font-size: 1.1rem;
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
            
            .hero__title {
                font-size: 1.4rem;
            }
            
            .section__title {
                font-size: 1.3rem;
            }
            
            .quick-link-card__icon {
                font-size: 1.75rem;
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
        }
        /* ================================
   ADMIN STYLES
=================================*/
.admin-actions {
    display: flex;
    justify-content: center;
    margin-bottom: var(--space-lg);
    gap: var(--space-sm);
}

.news-admin-actions {
    display: flex;
    gap: var(--space-xs);
    margin-top: var(--space-sm);
    padding-top: var(--space-sm);
    border-top: 1px solid var(--light-gray);
}

.btn-edit, .btn-delete {
    padding: 0.5rem;
    border: none;
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-edit {
    background-color: var(--accent);
    color: white;
}

.btn-delete {
    background-color: var(--danger);
    color: white;
}

.btn-edit:hover, .btn-delete:hover {
    transform: translateY(-2px);
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 10000;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: var(--space-lg);
    border-radius: var(--radius-lg);
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    position: relative;
}

.close-modal {
    position: absolute;
    top: var(--space-sm);
    right: var(--space-sm);
    font-size: 1.5rem;
    cursor: pointer;
    background: none;
    border: none;
}

.form-group {
    margin-bottom: var(--space-md);
}

.form-group label {
    display: block;
    margin-bottom: var(--space-xs);
    font-weight: 600;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: var(--space-sm);
    border: 1px solid var(--light-gray);
    border-radius: var(--radius);
    font-family: var(--font-body);
}

.form-group textarea {
    min-height: 100px;
    resize: vertical;
}
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container header__container">
            <div class="header__logo-container">
                <img src="foto/logo-sekolah.jpg" alt="Logo Sekolah" class="header__logo">
               <a href="login.php"> <img src="foto/logo-osis.png" alt="Logo OSIS" class="header__logo"></a>
            </div>
            
            <nav class="nav">
                <a href="index.php" class="nav__link active">Beranda</a>
                <a href="struktur.php" class="nav__link">Struktur OSIS</a>
                <a href="kalender.php" class="nav__link">Kalender Kegiatan</a>
                <a href="gallery.php" class="nav__link">Galeri</a>
                <a href="news.php" class="nav__link">Berita & Pengumuman</a>
            </nav>
            
            <button class="mobile-menu-btn" aria-label="Toggle mobile menu">☰</button>
            <div class="nav-overlay"></div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero__content">
            <h1 class="hero__title">Selamat Datang di Website OSIS</h1>
            <p class="hero__description">Organisasi Siswa Intra Sekolah Yayasan Pendidikan Raksana Bertindak dan Bersatu untuk Satu</p>
            <a href="#main-content" class="btn btn--primary">Jelajahi Sekarang</a>
        </div>
    </section>

    <!-- Main Content -->
    <main id="main-content">
        <!-- News Section -->
        <section class="section">
            <div class="container">
                <h2 class="section__title">Berita Terkini</h2>
                
                <?php if (isAdminLoggedIn()): ?>
                <div class="admin-actions">
                    <button class="btn btn--primary" onclick="openModal('news')">
                        <i class="fas fa-plus"></i> Tambah Berita
                    </button>
                </div>
                <?php endif; ?>
                
                <div class="news-grid">
                    <?php if (!empty($news)): ?>
                        <?php foreach ($news as $item): ?>
                        <article class="news-card">
                            <img src="<?php echo $item['image_path'] ?: 'foto/1.jpg'; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="news-card__image">
                            <div class="news-card__content">
                                <span class="news-card__date"><?php echo date('d F Y', strtotime($item['date'])); ?></span>
                                <h3 class="news-card__title"><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p class="news-card__excerpt"><?php echo htmlspecialchars($item['excerpt']); ?></p>
                                <a href="news-detail.php?id=<?php echo $item['id']; ?>" class="news-card__link">
                                    <i class="fas fa-arrow-right"></i> Selengkapnya
                                </a>
                                
                                <?php if (isAdminLoggedIn()): ?>
                                <div class="news-admin-actions">
                                    <button class="btn-edit" onclick="editNews(<?php echo $item['id']; ?>)">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="btn-delete" onclick="deleteNews(<?php echo $item['id']; ?>)">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback news items if database is empty -->
                        <article class="news-card">
                            <img src="foto/1.jpg" alt="Kegiatan OSIS" class="news-card__image">
                            <div class="news-card__content">
                                <span class="news-card__date">08 September 2025</span>
                                <h3 class="news-card__title">Perayaan Hari Olahraga Nasional. (Day 1)</h3>
                                <p class="news-card__excerpt">Acara dilaksanakan dengan kondusif</p>
                               <a href="gallery.html?filter=olahraga" class="news-card__link"><i class="fas fa-arrow-right"></i> Selengkapnya</a>
                            </div>
                        </article>
                        
                        <article class="news-card">
                            <img src="news2.jpg" alt="Kegiatan OSIS" class="news-card__image">
                            <div class="news-card__content">
                                <span class="news-card__date">-</span>
                                <h3 class="news-card__title">Berita Terbaru</h3>
                                <p class="news-card__excerpt">Informasi terbaru akan segera tersedia</p>
                                <a href="#" class="news-card__link"><i class="fas fa-arrow-right"></i> Selengkapnya</a>
                            </div>
                        </article>
                        
                        <article class="news-card">
                            <img src="news3.jpg" alt="Kegiatan OSIS" class="news-card__image">
                            <div class="news-card__content">
                                <span class="news-card__date">-</span>
                                <h3 class="news-card__title">Kegiatan Mendatang</h3>
                                <p class="news-card__excerpt">Persiapkan diri untuk acara menarik berikutnya</p>
                                <a href="#" class="news-card__link"> <i class="fas fa-arrow-right"></i> Selengkapnya</a>
                            </div>
                        </article>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <!-- Announcements Section -->
        <section class="section bg-gray">
            <div class="container">
                <h2 class="section__title">Pengumuman Penting</h2>
                
                <div class="announcement-list">
                    <?php if (!empty($announcements)): ?>
                        <?php foreach ($announcements as $index => $item): ?>
                        <div class="announcement-item">
                            <?php if ($index < 2): ?>
                            <span class="announcement-badge">BARU</span>
                            <?php endif; ?>
                            <div class="announcement-item__content">
                                <h3 class="announcement-item__title"><?php echo htmlspecialchars($item['title']); ?></h3>
                                <p class="announcement-item__description"><?php echo htmlspecialchars($item['content']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback announcement items if database is empty -->
                        <div class="announcement-item">
                            <span class="announcement-badge">BARU</span>
                            <div class="announcement-item__content">
                                <h3 class="announcement-item__title">Pendaftaran Kegiatan OSIS</h3>
                                <p class="announcement-item__description">Segera daftarkan diri Anda untuk mengikuti kegiatan OSIS yang akan datang.</p>
                            </div>
                        </div>
                        
                        <div class="announcement-item">
                            <span class="announcement-badge">BARU</span>
                            <div class="announcement-item__content">
                                <h3 class="announcement-item__title">Rapat Rutin</h3>
                                <p class="announcement-item__description">Rapat rutin OSIS akan dilaksanakan pada hari Jumat pukul 14.00 di Aula sekolah.</p>
                            </div>
                        </div>
                        
                        <div class="announcement-item">
                            <div class="announcement-item__content">
                                <h3 class="announcement-item__title">Informasi Penting</h3>
                                <p class="announcement-item__description">Selalu pantau website ini untuk informasi terbaru dari OSIS.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <!-- Quick Links Section -->
        <section class="section">
            <div class="container">
                <div class="quick-links">
                    <!-- Quick Link 1 -->
                    <a href="struktur.php" class="quick-link-card">
                        <div class="quick-link-card__icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="quick-link-card__title">Profil OSIS</h3>
                        <p class="quick-link-card__description">Kenali struktur dan program kerja OSIS kami</p>
                    </a>
                    
                    <!-- Quick Link 2 -->
                    <a href="kalender.php" class="quick-link-card">
                        <div class="quick-link-card__icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="quick-link-card__title">Kalender Kegiatan</h3>
                        <p class="quick-link-card__description">Jadwal kegiatan OSIS dan sekolah</p>
                    </a>
                    
                    <!-- Quick Link 3 -->
                    <a href="forms.php" class="quick-link-card">
                        <div class="quick-link-card__icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h3 class="quick-link-card__title">Formulir</h3>
                        <p class="quick-link-card__description">Pendaftaran dan pengajuan proposal</p>
                    </a>
                    
                    <!-- Quick Link 4 -->
                    <a href="contact.php" class="quick-link-card">
                        <div class="quick-link-card__icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="quick-link-card__title">Hubungi Kami</h3>
                        <p class="quick-link-card__description">Saran dan kritik untuk OSIS</p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <!-- About Column -->
                <div class="footer__column">
                    <h3>Tentang OSIS</h3>
                    <p>Organisasi Siswa Intra Sekolah (OSIS) adalah organisasi resmi di sekolah yang menjadi wadah bagi siswa untuk mengembangkan potensi dan berkontribusi bagi sekolah.</p>
                </div>
                
                <!-- Contact Column -->
                <div class="footer__column">
                    <h3>Kontak</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Pendidikan No. 123, Kota Medan</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>(061) 1234567</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>osis@raksana.sch.id</span>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media Column -->
                <div class="footer__column">
                    <h3>Ikuti Kami</h3>
                    <p>Ikuti media sosial OSIS untuk informasi terbaru</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="copyright">
                <p>&copy; 2025 OSIS Raksana. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Modal for News Form -->
    <div id="newsModal" class="modal">
        <div class="modal-content">
            <button class="close-modal">&times;</button>
            <h2 id="modalTitle">Tambah Berita Baru</h2>
            <form id="newsForm" action="admin/save_news.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <input type="hidden" name="id" id="newsId" value="">
                
                <div class="form-group">
                    <label for="newsTitle">Judul Berita</label>
                    <input type="text" id="newsTitle" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="newsContent">Isi Berita</label>
                    <textarea id="newsContent" name="content" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="newsExcerpt">Kutipan (Excerpt)</label>
                    <textarea id="newsExcerpt" name="excerpt" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="newsDate">Tanggal</label>
                    <input type="date" id="newsDate" name="date" required>
                </div>
                
                <div class="form-group">
                    <label for="newsImage">Gambar Berita</label>
                    <input type="file" id="newsImage" name="image" accept="image/*">
                </div>
                
                <button type="submit" class="btn btn--primary">Simpan Berita</button>
            </form>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const nav = document.querySelector('.nav');
        const navOverlay = document.querySelector('.nav-overlay');
        
        mobileMenuBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
            navOverlay.classList.toggle('active');
            mobileMenuBtn.innerHTML = nav.classList.contains('active') ? '✕' : '☰';
        });
        
        navOverlay.addEventListener('click', () => {
            nav.classList.remove('active');
            navOverlay.classList.remove('active');
            mobileMenuBtn.innerHTML = '☰';
        });
        
        // Intersection Observer for section animations
        const sections = document.querySelectorAll('.section');
        
        const observer = new IntersersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        
        sections.forEach(section => {
            observer.observe(section);
        });
        
        // Modal functionality
        const modal = document.getElementById('newsModal');
        const closeModalBtn = document.querySelector('.close-modal');
        const newsForm = document.getElementById('newsForm');
        const modalTitle = document.getElementById('modalTitle');
        
        function openModal(type) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            if (type === 'news') {
                modalTitle.textContent = 'Tambah Berita Baru';
                newsForm.reset();
                document.getElementById('newsId').value = '';
            }
        }
        
        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        closeModalBtn.addEventListener('click', closeModal);
        
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        // Admin functions
        function editNews(id) {
            // In a real implementation, this would fetch the news item data
            // For now, we'll just show the modal
            modalTitle.textContent = 'Edit Berita';
            document.getElementById('newsId').value = id;
            
            // Simulate loading data (in a real app, you would fetch from the server)
            document.getElementById('newsTitle').value = 'Judul Berita ' + id;
            document.getElementById('newsContent').value = 'Isi berita untuk item dengan ID ' + id;
            document.getElementById('newsExcerpt').value = 'Kutipan berita untuk item dengan ID ' + id;
            document.getElementById('newsDate').value = '2025-09-10';
            
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        
        function deleteNews(id) {
            if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                // In a real implementation, this would send a delete request to the server
                alert('Berita dengan ID ' + id + ' akan dihapus (simulasi)');
                // window.location.href = 'admin/delete_news.php?id=' + id;
            }
        }
        
        // Set current date as default for new news
        document.getElementById('newsDate').valueAsDate = new Date();
    </script>
</body>
</html>