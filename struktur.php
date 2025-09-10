<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struktur OSIS Raksana</title>
    <link rel="icon" type="image/png" href="foto/logo-osis.png">
  <link rel="stylesheet" href="struktur.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<style>
  :root {
    /* Warna utama (Maroon Theme) */
    --primary: #800000;
    --primary-light: #a33333;
    --secondary: #5a0000;
    --accent: #d4a017;
    --accent-dark: #b38614;
    --light: #f8f0e8;
    --light-gray: #e8e8e8;
    --dark: #2a0a0a;
    --gray: #64748b;
    --success: #228B22;
    --danger: #CC0000;
    
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

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: var(--font-body);
    line-height: 1.6;
    color: var(--dark);
    background-color: var(--light);
    animation: fadeIn 0.8s ease-out;
  }

  .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-md);
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  /* ================================ HEADER =================================*/
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
    text-decoration: none;
    color: var(--dark);
    transition: var(--transition);
    position: relative;
    padding: 0.5rem 0;
  }

  .nav__link:hover, .nav__link.active {
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

  .nav__link:hover::after, .nav__link.active::after {
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

  /* ================================ MOBILE NAVIGATION (SIDEBAR) =================================*/
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

  /* ================================ STRUKTUR LAYOUT =================================*/
  .struktur {
    padding: var(--space-lg) var(--space-md);
  }

  .title {
    text-align: center;
    margin-bottom: var(--space-lg);
    font-family: var(--font-heading);
    color: var(--primary);
    font-size: 2.5rem;
  }

  section {
    margin-bottom: var(--space-xl);
  }

  h2 {
    margin-bottom: var(--space-md);
    color: var(--secondary);
    font-family: var(--font-heading);
    position: relative;
    padding-bottom: var(--space-xs);
  }

  h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background-color: var(--accent);
  }

  /* Card */
  .card {
    background: white;
    padding: var(--space-md);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .card img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: var(--space-sm);
    border: 3px solid var(--primary-light);
    transition: var(--transition);
  }

  .card h3 {
    color: var(--primary);
    margin-bottom: var(--space-xs);
    font-family: var(--font-heading);
  }

  .card p {
    color: var(--gray);
    margin-bottom: var(--space-sm);
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
  }

  .card:hover img {
    transform: scale(1.05);
  }

  .clickable {
    cursor: pointer;
  }

  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: var(--space-md);
  }

  .departemen-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--space-lg);
  }

  .departemen-card {
    background: white;
    padding: var(--space-md);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
  }

  .departemen-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow);
  }

  .departemen-card h3 {
    color: var(--primary);
    margin-bottom: var(--space-md);
    font-family: var(--font-heading);
    text-align: center;
    padding-bottom: var(--space-xs);
    border-bottom: 2px solid var(--light-gray);
  }

  .departemen-card .anggota {
    text-align: center;
    margin-bottom: var(--space-md);
    padding-bottom: var(--space-sm);
    border-bottom: 1px solid var(--light-gray);
  }

  .departemen-card .anggota img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary-light);
    margin-bottom: var(--space-xs);
    transition: var(--transition);
  }

  .departemen-card .anggota:hover img {
    transform: scale(1.08);
  }

  .departemen-card .anggota p {
    font-weight: 600;
    color: var(--primary);
  }

  .departemen-card ul {
    list-style: none;
  }

  .departemen-card ul li {
    display: flex;
    align-items: center;
    margin-bottom: var(--space-sm);
    padding: var(--space-xs);
    border-radius: var(--radius-sm);
    transition: var(--transition);
  }

  .departemen-card ul li:hover {
    background-color: var(--light-gray);
  }

  .departemen-card ul li img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: var(--space-sm);
    border: 2px solid var(--light-gray);
    transition: var(--transition);
  }

  .departemen-card ul li:hover img {
    transform: scale(1.1);
  }

  /* Modal */
  .modal-overlay {
    position: fixed;
    top: 0; 
    left: 0; 
    right: 0; 
    bottom: 0;
    background: rgba(0,0,0,0.6);
    display: none;
    z-index: 999;
    animation: fadeIn 0.3s ease;
  }

  .modal {
    position: fixed;
    top: 50%; 
    left: 50%;
    transform: translate(-50%, -50%) scale(0.9);
    background: white;
    padding: var(--space-lg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-lg);
    max-width: 600px;
    width: 90%;
    max-height: 80vh;
    overflow-y: auto;
    display: none;
    z-index: 1000;
    transition: var(--transition);
    animation: modalFadeIn 0.3s ease forwards;
  }

  @keyframes modalFadeIn {
    to {
      transform: translate(-50%, -50%) scale(1);
      opacity: 1;
    }
  }

  .modal.active,
  .modal-overlay.active {
    display: block;
  }

  .modal-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: var(--space-md);
  }

  .modal-header img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--primary-light);
    margin-bottom: var(--space-sm);
  }

  .modal h2 {
    color: var(--primary);
    margin-bottom: var(--space-xs);
    text-align: center;
    width: 100%;
  }

  .modal h3 {
    color: var(--secondary);
    margin-bottom: var(--space-md);
    text-align: center;
    font-weight: 600;
    font-family: var(--font-body);
  }

  .modal-content {
    padding: var(--space-md) 0;
  }

  .modal p {
    margin-bottom: var(--space-sm);
  }

  .modal ul {
    margin-left: var(--space-md);
    margin-bottom: var(--space-md);
  }

  .modal ul li {
    margin-bottom: var(--space-xs);
  }

  .close-modal {
    display: block;
    margin: 0 auto;
    padding: var(--space-sm) var(--space-md);
    background: var(--primary);
    color: white;
    border: none;
    border-radius: var(--radius);
    cursor: pointer;
    transition: var(--transition);
    font-weight: 600;
  }

  .close-modal:hover {
    background: var(--secondary);
  }

  /* Responsive adjustments */
  @media (max-width: 576px) {
    .title {
      font-size: 2rem;
    }
    
    .grid {
      grid-template-columns: 1fr;
    }
    
    .departemen-grid {
      grid-template-columns: 1fr;
    }
    
    .modal {
      padding: var(--space-md);
    }

    .modal-header img {
      width: 150px;
      height: 150px;
    }
  }
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

  <!-- Struktur OSIS -->
  <main class="container struktur">
    <h1 class="title">Struktur Pengurus OSIS</h1>

    <!-- Pembina -->
    <section>
      <h2>Pembina OSIS</h2>
      <div class="card clickable" data-modal="pembina" data-img="foto/pembina.jpg">
        <img src="foto/pembina.jpg" alt="Pembina OSIS" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Pembina'">
        <h3>Nama Pembina</h3>
        <p>Pembina OSIS</p>
      </div>
    </section>

    <!-- Ketos & Waketos -->
    <section>
      <h2>Ketua & Wakil Ketua OSIS</h2>
      <div class="grid">
        <div class="card clickable" data-modal="ketos" data-img="foto/ketos.jpg">
          <img src="foto/ketos.jpg" alt="Ketua OSIS" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Ketua'">
          <h3>Jesika</h3>
          <p>Ketua OSIS</p>
        </div>
        <div class="card clickable" data-modal="waketos" data-img="foto/kak_farid.jpg">
          <img src="foto/kak_farid.jpg" alt="Wakil Ketua OSIS" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Wakil'">
          <h3>Farid</h3>
          <p>Wakil Ketua OSIS</p>
        </div>
      </div>
    </section>

    <!-- BPH -->
    <section>
      <h2>Badan Pengurus Harian (BPH)</h2>
      <div class="grid">
        <div class="card clickable" data-modal="sekretaris" data-img="foto/kak_raysa.jpg">
          <img src="foto/kak_raysa.jpg" alt="Sekretaris" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Sekretaris'">
          <h3>Raysa</h3>
          <p>Sekretaris</p>
        </div>
        <div class="card clickable" data-modal="wakil-sekretaris" data-img="foto/kak_angel.jpg">
          <img src="foto/kak_angel.jpg" alt="wakil-sekretaris" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Bendahara'">
          <h3>Angel</h3>
          <p>Wakil Sekretaris</p>
        </div>
        <div class="card clickable" data-modal="bendahara" data-img="foto/kak_clara.jpg">
          <img src="foto/kak_clara.jpg" alt="Bendahara" onerror="this.src='https://via.placeholder.com/140x140?text=Foto+Koordinator'">
          <h3>Clara</h3>
          <p>Bendahara</p>
        </div>
      </div>
    </section>

    <!-- Departemen -->
    <section>
      <h2>Departemen</h2>
      <div class="grid">
        <!-- Dep. Keimanan dan ketakwaan TYME -->
        <div class="card clickable" data-modal="dep1" data-img="foto/dep1-kor.jpg">
          <img src="foto/kak_nita.jpg" alt="Koordinator Dep. Keimanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Keimanan dan Ketakwaan TYME (Agama Islam)</h3>
          <p>Nita</p>
        </div>

        <div class="card clickable" data-modal="dep1" data-img="foto/dep1-kor.jpg">
          <img src="foto/kak_kevin.jpg" alt="Koordinator Dep. Keimanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Keimanan dan Ketakwaan TYME (Agama Kristen)</h3>
          <p>Kevin</p>
        </div>

        <!-- Dep. Kreativitas sastra dan budaya -->
        <div class="card clickable" data-modal="dep2" data-img="foto/dep2-kor.jpg">
          <img src="foto/kak_rizzy.jpg" alt="Koordinator Dep. Kreativitas" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Kreativitas Sastra dan Budaya</h3>
          <p>Rizzy</p>
        </div>

        <!-- Dep. Bahasa asing -->
        <div class="card clickable" data-modal="dep3" data-img="foto/dep3-kor.jpg">
          <img src="foto/kak_cindi.jpg" alt="Koordinator Dep. Bahasa Asing" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Bahasa Asing</h3>
          <p>Cindi</p>
        </div>

        <!-- Dep Kesehatan gizi dan lingkungan -->
        <div class="card clickable" data-modal="dep4" data-img="foto/dep4-kor.jpg">
          <img src="foto/kak_sandra.jpg" alt="Koordinator Dep. Kesehatan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Kesehatan, Gizi dan Lingkungan</h3>
          <p>Sandra</p>
        </div>

        <!-- Dep. Prestasi akademik dan olahraga -->
        <div class="card clickable" data-modal="dep5" data-img="foto/dep5-kor.jpg">
          <img src="foto/kak_ivan.jpg" alt="Koordinator Dep. Prestasi" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Prestasi Akademik dan Olahraga</h3>
          <p>Koordinator: Nama Koordinator</p>
        </div>

        <!-- Dep. Humas dan infokum -->
        <div class="card clickable" data-modal="dep6" data-img="foto/dep6-kor.jpg">
          <img src="foto/kak_ridho.jpg" alt="Koordinator Dep. Humas" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Humas dan Infokum</h3>
          <p>Ridho</p>
        </div>

        <!-- Dep. Pengamanan Strategis setiap unit -->
        <div class="card clickable" data-modal="dep7" data-img="foto/dep7-kor.jpg">
          <img src="foto/kak_kyara.jpg" alt="Koordinator Dep. Pengamanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Pengamanan Strategis Setiap Unit (SMP)</h3>
          <p>Kyara</p>
        </div>
        
        <div class="card clickable" data-modal="dep7" data-img="foto/dep7-kor.jpg">
          <img src="foto/kak_jesi.jpg" alt="Koordinator Dep. Pengamanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Pengamanan Strategis Setiap Unit (SMA)</h3>
          <p>Jesie</p>
        </div>
        <div class="card clickable" data-modal="dep7" data-img="foto/dep7-kor.jpg">
          <img src="foto/kak_kenzo.jpg" alt="Koordinator Dep. Pengamanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Pengamanan Strategis Setiap Unit (SMK 1)</h3>
          <p>Kenzo</p>
        </div>

        <div class="card clickable" data-modal="dep7" data-img="foto/dep7-kor.jpg">
          <img src="foto/kak_mutia.jpg" alt="Koordinator Dep. Pengamanan" onerror="this.src='https://via.placeholder.com/140x140?text=Koor+Dept'">
          <h3>Pengamanan Strategis Setiap Unit (SMK 2)</h3>
          <p>Mutia</p>
        </div>
      </div>
    </section>

    
  </main>

  <!-- Modal Template -->
  <div class="modal-overlay"></div>
  
  <!-- Modal untuk Pembina -->
  <div class="modal" id="modal-pembina">
    <div class="modal-header">
      <img src="foto/pembina.jpg" alt="Pembina OSIS" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Pembina'">
      <h2>Nama Pembina</h2>
      <h3>Pembina OSIS</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> - </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Ketua OSIS -->
  <div class="modal" id="modal-ketos">
    <div class="modal-header">
      <img src="foto/ketos.jpg" alt="Ketua OSIS" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Ketua'">
      <h2>Nama Ketua</h2>
      <h3>Ketua OSIS</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Wakil Ketua OSIS -->
  <div class="modal" id="modal-waketos">
    <div class="modal-header">
      <img src="foto/kak_farid.jpg" alt="Wakil Ketua OSIS" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Wakil'">
      <h2>Farid</h2>
      <h3>Wakil Ketua OSIS</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Sekretaris -->
  <div class="modal" id="modal-sekretaris">
    <div class="modal-header">
      <img src="foto/kak_raysa.jpg" alt="Sekretaris" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Sekretaris'">
      <h2>Raysa</h2>
      <h3>Sekretaris</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Wakil Sekretaris -->
  <div class="modal" id="modal-wakil-sekretaris">
    <div class="modal-header">
      <img src="foto/kak_angel.jpg" alt="Wakil Sekretaris" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Wakil+Sekretaris'">
      <h2>Angel</h2>
      <h3>Wakil Sekretaris</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Bendahara -->
  <div class="modal" id="modal-bendahara">
    <div class="modal-header">
      <img src="foto/kak_clara.jpg" alt="Bendahara" onerror="this.src='https://via.placeholder.com/180x180?text=Foto+Bendahara'">
      <h2>Clara</h2>
      <h3>Bendahara</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> - </p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li> - </li>
        <li> - </li>
        <li> - </li>
        <li> - </li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Koordinator Departemen -->
  <div class="modal" id="modal-dep1-kor">
    <div class="modal-header">
      <img src="foto/dep1-kor.jpg" alt="Koordinator Dep. Keimanan" onerror="this.src='https://via.placeholder.com/180x180?text=Koor+Dept'">
      <h2>Nama Koordinator</h2>
      <h3>Koordinator Dep. Keimanan dan Ketakwaan TYME</h3>
    </div>
    <div class="modal-content">
      <p><strong>Visi:</strong> Meningkatkan keimanan dan ketakwaan seluruh siswa.</p>
      <p><strong>Misi:</strong></p>
      <ul>
        <li>Menyelenggarakan kegiatan keagamaan</li>
        <li>Mengkoordinir kegiatan rohani Islam dan Kristen</li>
        <li>Meningkatkan toleransi beragama di sekolah</li>
        <li>Memfasilitasi siswa dalam kegiatan keagamaan</li>
      </ul>
    </div>
  </div>

  <!-- Modal untuk Anggota Departemen -->
  <div class="modal" id="modal-dep1-ang1">
    <div class="modal-header">
      <img src="foto/dep1-ang1.jpg" alt="Anggota Dep. Keimanan" onerror="this.src='https://via.placeholder.com/180x180?text=Anggota'">
      <h2>Nama Anggota</h2>
      <h3>Anggota Dep. Keimanan dan Ketakwaan TYME (Agama Islam)</h3>
    </div>
    <div class="modal-content">
      <p><strong>Tugas:</strong></p>
      <ul>
        <li>Mengkoordinir kegiatan keagamaan Islam</li>
        <li>Mempersiapkan materi untuk kegiatan keagamaan</li>
        <li>Menjadi contoh dalam berperilaku sesuai ajaran agama</li>
        <li>Membantu pelaksanaan kegiatan keagamaan</li>
      </ul>
    </div>
  </div>

 

  <script>
    // JavaScript untuk modal dan navigasi mobile
    document.addEventListener('DOMContentLoaded', function() {
      // Modal functionality
      const modalOverlay = document.querySelector('.modal-overlay');
      const modals = document.querySelectorAll('.modal');
      const clickableElements = document.querySelectorAll('.clickable');
      const closeModalButtons = document.querySelectorAll('.close-modal');
      
      // Open modal
      clickableElements.forEach(element => {
        element.addEventListener('click', function() {
          const modalId = this.getAttribute('data-modal');
          const modal = document.getElementById(`modal-${modalId}`);
          
          if (modal) {
            modal.classList.add('active');
            modalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
          }
        });
      });
      
      // Close modal
      function closeModal() {
        modals.forEach(modal => modal.classList.remove('active'));
        modalOverlay.classList.remove('active');
        document.body.style.overflow = 'auto';
      }
      
      closeModalButtons.forEach(button => {
        button.addEventListener('click', closeModal);
      });
      
      modalOverlay.addEventListener('click', closeModal);
      
      // Close modal with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
      });
      
      // Mobile menu functionality
      const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
      const nav = document.querySelector('.nav');
      const navOverlay = document.querySelector('.nav-overlay');
      
      mobileMenuBtn.addEventListener('click', function() {
        nav.classList.toggle('active');
        navOverlay.classList.toggle('active');
      });
      
      navOverlay.addEventListener('click', function() {
        nav.classList.remove('active');
        navOverlay.classList.remove('active');
      });
    });
  </script>
</body>
</html>