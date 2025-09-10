<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="foto/logo-osis.png">
  <title>Kalender Kegiatan OSIS Raksana</title>
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
        padding: var(--space-xl) 0;
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
        min-width: 44px;
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
       CLOCK STYLES
    =================================*/
    .clock {
        text-align: center;
        margin: var(--space-md) 0;
        font-weight: 600;
        color: var(--primary);
        background-color: white;
        padding: var(--space-sm);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ================================
       CALENDAR LAYOUT
    =================================*/
    .calendar-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: var(--space-lg);
        margin: var(--space-md) auto;
        max-width: 1400px;
    }
    
    @media (min-width: 992px) {
        .calendar-layout {
            grid-template-columns: 7fr 5fr;
            align-items: start;
        }
    }

    /* ================================
       CALENDAR STYLES
    =================================*/
    .calendar-container {
        background: #fff;
        padding: var(--space-lg);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        animation: fadeIn 0.8s ease-out;
        width: 100%;
        overflow: auto;
    }
    
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--space-md);
        padding-bottom: var(--space-sm);
        border-bottom: 1px solid var(--light-gray);
    }
    
    .calendar-header h2 {
        margin-bottom: 0;
        color: var(--primary);
        font-size: 1.5rem;
    }
    
    .calendar-header button {
        background: var(--primary);
        color: #fff;
        border: none;
        padding: var(--space-xs) var(--space-sm);
        border-radius: var(--radius);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        min-width: 44px;
    }
    
    .calendar-header button:hover {
        background: var(--primary-light);
        transform: translateY(-2px);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 500px;
    }
    
    th, td {
        text-align: center;
        padding: var(--space-sm);
        border: 1px solid var(--light-gray);
        transition: var(--transition);
    }
    
    th {
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        padding: var(--space-sm);
    }
    
    td {
        height: 80px;
        vertical-align: top;
        cursor: pointer;
        position: relative;
    }
    
    td:hover {
        background-color: rgba(128, 0, 0, 0.05);
    }
    
    td.today {
        background: var(--accent);
        color: #fff;
        font-weight: bold;
        border-radius: var(--radius);
    }
    
    td.has-event::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        width: 6px;
        height: 6px;
        background-color: var(--primary);
        border-radius: 50%;
    }
    
    td.has-event:hover::after {
        background-color: white;
    }
    
    /* ================================
       EVENTS LIST STYLES
    =================================*/
    .events-container {
        background: #fff;
        padding: var(--space-lg);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        animation: fadeIn 0.8s ease-out;
        height: 100%;
    }
    
    .events-container h3 {
        margin-bottom: var(--space-md);
        color: var(--primary);
        text-align: center;
        position: relative;
        padding-bottom: var(--space-xs);
    }
    
    .events-container h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background-color: var(--accent);
        border-radius: 2px;
    }
    
    .events-list {
        list-style: none;
    }
    
    .events-list li {
        display: flex;
        gap: var(--space-sm);
        padding: var(--space-sm);
        border-bottom: 1px solid var(--light-gray);
        cursor: pointer;
        transition: var(--transition);
    }
    
    .events-list li:hover {
        background-color: rgba(128, 0, 0, 0.05);
        transform: translateX(5px);
    }
    
    .events-list li:last-child {
        border-bottom: none;
    }
    
    .event-date {
        font-weight: bold;
        color: var(--primary);
        width: 70px;
        flex-shrink: 0;
    }
    
    .event-details h4 {
        margin-bottom: var(--space-xs);
        color: var(--dark);
    }
    
    .event-details p {
        color: var(--gray);
        font-size: 0.9rem;
    }

    /* ================================
       MODAL STYLES
    =================================*/
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        justify-content: center;
        align-items: center;
        padding: var(--space-md);
        animation: fadeIn 0.3s ease;
    }
    
    .modal-content {
        background: #fff;
        padding: var(--space-lg);
        border-radius: var(--radius-lg);
        max-width: 600px;
        width: 100%;
        position: relative;
        box-shadow: var(--shadow-lg);
        max-height: 90vh;
        overflow-y: auto;
    }
    
    .close-modal {
        position: absolute;
        top: var(--space-sm);
        right: var(--space-sm);
        font-size: 1.5rem;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray);
        transition: var(--transition);
    }
    
    .close-modal:hover {
        color: var(--danger);
        transform: rotate(90deg);
    }
    
    .modal-content h2 {
        color: var(--primary);
        margin-bottom: var(--space-md);
        padding-right: var(--space-lg);
    }
    
    .modal-content p {
        margin-bottom: var(--space-sm);
        display: flex;
    }
    
    .modal-content p strong {
        min-width: 140px;
        color: var(--dark);
    }
    
    .modal-content p span {
        color: var(--gray);
    }
    
    .modal-content h4 {
        margin-top: var(--space-md);
        margin-bottom: var(--space-sm);
        color: var(--primary);
    }
    
    .modal-preparations {
        list-style: none;
        padding-left: var(--space-sm);
    }
    
    .modal-preparations li {
        margin-bottom: var(--space-xs);
        padding-left: var(--space-sm);
        position: relative;
    }
    
    .modal-preparations li::before {
        content: '•';
        color: var(--accent);
        font-weight: bold;
        position: absolute;
        left: 0;
    }
    
    .modal-actions {
        margin-top: var(--space-lg);
        display: flex;
        gap: var(--space-sm);
    }
    
    .modal-actions button {
        flex: 1;
        padding: var(--space-sm);
        border: none;
        border-radius: var(--radius);
        cursor: pointer;
        font-weight: 600;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--space-xs);
        min-height: 44px;
    }
    
    .modal-actions button:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }
    
    .share-btn {
        background: var(--accent);
        color: #fff;
    }
    
    .share-btn:hover {
        background: var(--accent-dark);
    }
    
    .reminder-btn {
        background: var(--success);
        color: #fff;
    }
    
    .reminder-btn:hover {
        background: #1a701a;
    }

    /* ================================
       RESPONSIVE BREAKPOINTS
    =================================*/
    /* Tablet screens (max 768px) */
    @media (max-width: 768px) {
        .header__logo {
            height: 40px;
        }
        
        .calendar-container, .events-container {
            padding: var(--space-md);
        }
        
        th, td {
            padding: var(--space-xs);
            height: 60px;
            font-size: 0.9rem;
        }
        
        .events-list li {
            flex-direction: column;
            gap: var(--space-xs);
        }
        
        .event-date {
            width: 100%;
        }
        
        .modal-content {
            padding: var(--space-md);
        }
        
        .modal-content p {
            flex-direction: column;
            gap: var(--space-xs);
        }
        
        .modal-content p strong {
            min-width: auto;
        }
        
        .modal-actions {
            flex-direction: column;
        }
    }

    /* Small screens (max 576px) */
    @media (max-width: 576px) {
        .calendar-header {
            flex-direction: column;
            gap: var(--space-sm);
            text-align: center;
        }
        
        .calendar-header h2 {
            order: -1;
        }
        
        th, td {
            padding: 0.25rem;
            height: 50px;
            font-size: 0.8rem;
        }
        
        td.has-event::after {
            width: 4px;
            height: 4px;
            bottom: 3px;
        }
        
        table {
            min-width: 400px;
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
   IMPROVED MOBILE CALENDAR CONTROLS
   ================================ */
@media (max-width: 576px) {
    .calendar-header {
        flex-direction: row !important; /* Tetap horizontal pada mobile */
        gap: var(--space-xs);
        padding: 0 var(--space-xs) var(--space-sm);
    }
    
    .calendar-header h2 {
        font-size: 1.2rem;
        margin: 0;
        flex-grow: 1;
        text-align: center;
        order: 2; /* Judul di tengah */
    }
    
    .calendar-header button {
        padding: var(--space-xs);
        min-height: 36px;
        min-width: 36px;
        order: 1; /* Tombol kiri */
        font-size: 0.9rem;
    }
    
    #next-month {
        order: 3; /* Tombol kanan */
    }
    
    /* Perbaikan tabel kalender */
    table {
        min-width: 100%;
    }
    
    th, td {
        padding: 0.2rem;
        height: 40px;
        font-size: 0.8rem;
    }
    
    /* Perbaikan ukuran indikator event */
    td.has-event::after {
        width: 5px;
        height: 5px;
        bottom: 2px;
    }
}

/* Perbaikan tambahan untuk tablet */
@media (max-width: 768px) {
    /* Atur tinggi header yang konsisten */
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
}
  </style>
</head>
<body>
  <!-- Header -->
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

  <main class="container">
    <div class="clock">
      <p id="current-datetime"></p>
    </div>

    <div class="calendar-layout">
      <div class="calendar-container">
        <div class="calendar-header">
          <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
          <h2 id="current-month-year"></h2>
          <button id="next-month"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div style="overflow-x: auto;">
          <table>
            <tbody id="calendar-table"></tbody>
          </table>
        </div>
      </div>

      <div class="events-container">
        <h3>Kegiatan Mendatang</h3>
        <ul id="events-list" class="events-list"></ul>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div id="event-modal" class="modal">
    <div class="modal-content">
      <span class="close-modal">&times;</span>
      <h2 id="modal-title"></h2>
      <p><strong>Tanggal:</strong> <span id="modal-date"></span></p>
      <p><strong>Waktu:</strong> <span id="modal-time"></span></p>
      <p><strong>Lokasi:</strong> <span id="modal-location"></span></p>
      <p><strong>Penanggung Jawab:</strong> <span id="modal-person"></span></p>
      <p id="modal-description"></p>
      <h4>Persiapan:</h4>
      <ul id="modal-preparations" class="modal-preparations"></ul>
      <div class="modal-actions">
        <button class="share-btn"><i class="fas fa-share-alt"></i> Bagikan</button>
        <button class="reminder-btn"><i class="fas fa-bell"></i> Ingatkan</button>
      </div>
    </div>
  </div>

  <script>
    // Real-time clock
    function updateDateTime() {
      const now = new Date();
      const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit' 
      };
      document.getElementById('current-datetime').textContent = now.toLocaleDateString('id-ID', options);
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Calendar Data
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    const events = [
      { 
        id: 1, 
        date: '8 Sep', 
        title: 'Hari Olahraga Nasional', 
        time: '08.30 - 12.00 WIB',
        location: 'Lapangan Sekolah', 
        person: ' Ketua Panitia',
        description: 'Lomba memperingati hari olahraga nasional',
        preparations: ['Membawa daftar peain', 'Surat perjanjian', 'Membawa perlengkapan bertanding'] 
      },
      { 
        id: 2, 
        date: '9 Sep', 
        title: 'Hari Olahraga Nasional', 
        time: '08.00 - 12.00 WIB',
        location: 'Lapangan Sekolah', 

        person: ' Ketua Panitia',
        description: 'Lomba memperingati hari olahraga nasional',
        preparations: ['Membawa daftar peain', 'Surat perjanjian', 'Membawa perlengkapan bertanding'] 
      },
      { 
        id: 3, 
        date: '13 Sep', 
        title: 'Senam Pagi', 
        time: '07.30 - s/d',
        location: 'Lapangan sekolah', 
        person: 'OSIS',
        description: 'Senam rutin setiap sabtu pagi unit SMP, SMA',
        preparations: ['Pakaian Olahraga',] 
      },
      { 
        id: 4, 
        date: '', 
        title: '', 
        time: '',
        location: '', 
        person: '',
        description: '',
        preparations: [] 
      }
    ];

    function generateCalendar(month, year) {
      const calendarTable = document.getElementById('calendar-table');
      const monthYearDisplay = document.getElementById('current-month-year');
      calendarTable.innerHTML = '';
      
      const monthNames = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
      ];
      
      monthYearDisplay.textContent = `${monthNames[month]} ${year}`;
      
      const dayNames = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];
      const headerRow = document.createElement('tr');
      
      dayNames.forEach(day => { 
        const th = document.createElement('th'); 
        th.textContent = day; 
        headerRow.appendChild(th); 
      });
      
      calendarTable.appendChild(headerRow);

      const daysInMonth = new Date(year, month + 1, 0).getDate();
      const firstDay = new Date(year, month, 1).getDay();
      const adjustedFirstDay = firstDay === 0 ? 6 : firstDay - 1;
      
      let date = 1;
      
      for (let i = 0; i < 6; i++) {
        if (date > daysInMonth) break;
        
        const row = document.createElement('tr');
        
        for (let j = 0; j < 7; j++) {
          const cell = document.createElement('td');
          
          if (i === 0 && j < adjustedFirstDay) {
            cell.textContent = '';
          } else if (date > daysInMonth) {
            cell.textContent = '';
          } else {
            cell.textContent = date;
            const today = new Date();
            
            if (date === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
              cell.classList.add('today');
            }
            
            const eventDate = `${date} ${monthNames[month].substring(0, 3)}`;
            const event = events.find(e => e.date === eventDate);
            
            if (event) { 
              cell.classList.add('has-event'); 
              cell.setAttribute('data-event-id', event.id); 
            }
            
            date++;
          }
          
          row.appendChild(cell);
        }
        
        calendarTable.appendChild(row);
      }
      
      // Trigger section animation
      const sections = document.querySelectorAll('.section');
      sections.forEach(section => {
        if (isElementInViewport(section)) {
          section.classList.add('visible');
        }
      });
    }

    function renderEventsList() {
      const list = document.getElementById('events-list');
      list.innerHTML = '';
      
      events.forEach(event => {
        const li = document.createElement('li');
        li.innerHTML = `
          <div class="event-date">${event.date}</div>
          <div class="event-details">
            <h4>${event.title}</h4>
            <p>${event.location}, ${event.time}</p>
          </div>
        `;
        
        li.addEventListener('click', () => openModal(event));
        list.appendChild(li);
      });
    }

    document.getElementById('prev-month').addEventListener('click', () => {
      currentMonth--;
      
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      
      generateCalendar(currentMonth, currentYear);
    });
    
    document.getElementById('next-month').addEventListener('click', () => {
      currentMonth++;
      
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      
      generateCalendar(currentMonth, currentYear);
    });

    function openModal(event) {
      document.getElementById('modal-title').textContent = event.title;
      document.getElementById('modal-date').textContent = `${event.date} ${currentYear}`;
      document.getElementById('modal-time').textContent = event.time;
      document.getElementById('modal-location').textContent = event.location;
      document.getElementById('modal-person').textContent = event.person;
      document.getElementById('modal-description').textContent = event.description;
      
      const list = document.getElementById('modal-preparations');
      list.innerHTML = '';
      
      event.preparations.forEach(prep => {
        const li = document.createElement('li');
        li.textContent = prep;
        list.appendChild(li);
      });
      
      document.getElementById('event-modal').style.display = 'flex';
    }

    document.querySelector('.close-modal').addEventListener('click', () => {
      document.getElementById('event-modal').style.display = 'none';
    });
    
    document.querySelector('.share-btn').addEventListener('click', () => {
      alert('Fitur berbagi akan membuka pilihan platform sosial media.');
    });
    
    document.querySelector('.reminder-btn').addEventListener('click', () => {
      alert('Pengingat telah ditambahkan ke kalender Anda!');
    });

    // Initialize calendar and events
    generateCalendar(currentMonth, currentYear);
    renderEventsList();

    // Event delegation for calendar cells
    document.addEventListener('click', e => {
      if (e.target.classList.contains('has-event')) {
        const id = parseInt(e.target.getAttribute('data-event-id'));
        const event = events.find(ev => ev.id === id);
        
        if (event) openModal(event);
      }
    });

    // Mobile menu functionality
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
      
      // Close menu when clicking on a link
      nav.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
          closeMobileMenu();
        }
      });
      
      function toggleMobileMenu() {
        nav.classList.toggle('active');
        
        if (overlay) {
          overlay.classList.toggle('active');
        }
        
        mobileMenuBtn.innerHTML = nav.classList.contains('active') ? '✕' : '☰';
        
        // Prevent body scroll when menu is open
        if (nav.classList.contains('active')) {
          body.style.overflow = 'hidden';
        } else {
          body.style.overflow = '';
        }
      }
      
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

    // Function to check if element is in viewport for animations
    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9 &&
        rect.bottom >= 0
      );
    }

    // Handle scroll animation for sections
    function handleScrollAnimation() {
      const sections = document.querySelectorAll('.section');
      
      sections.forEach(section => {
        if (isElementInViewport(section)) {
          section.classList.add('visible');
        }
      });
    }
    
    window.addEventListener('scroll', handleScrollAnimation);
    window.addEventListener('load', handleScrollAnimation);
    handleScrollAnimation();
  </script>
</body>
</html>