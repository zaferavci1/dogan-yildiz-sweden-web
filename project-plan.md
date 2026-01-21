# Dataenergie GmbH - Web Geliştirme Proje Planı
**Proje Tipi:** Custom WordPress Development (No Page Builder)
**Teslim Süresi:** 7 Gün (Sprint)
**Altyapı:** GoDaddy / Linux Hosting
**Stack:** PHP, WordPress Core, HTML5, Tailwind CSS (veya Custom CSS), JS, ACF Pro.

---

## 📅 FAZ 1: Mimari Kurulum ve İskelet (Sprint 1)
**Hedef:** WordPress ortamının ayağa kalkması ve özel temanın sisteme tanıtılması.

### Sprint 1.1: Geliştirme Ortamı
- [x] Localhost kurulumu (LocalWP, XAMPP veya Docker).
- [x] Temiz WordPress kurulumu (Son sürüm).
- [x] `wp-config.php` debug modunun açılması (`WP_DEBUG`, `true`).

### Sprint 1.2: Tema İskeleti (`/wp-content/themes/dataenergie-theme`)
- [x] Tema klasörünün oluşturulması.
- [x] `style.css`: WordPress tema tanıtım bilgilerinin (Theme Name, Author vb.) girilmesi.
- [x] `screenshot.png`: Tema önizleme görseli (1200x900px placeholder).
- [x] `index.php`: Fallback döngüsü.
- [x] `functions.php`: CSS/JS dosyalarının `wp_enqueue_scripts` ile kuyruğa alınması.
- [x] Klasör Yapısı:
    - `/assets` (css, js, images, fonts)
    - `/inc` (custom post types, acf definitions)
    - `/template-parts` (header, footer, loops)

---

## 🎨 FAZ 2: Frontend Geliştirme - Statik Kodlama (Sprint 2)
**Hedef:** WordPress fonksiyonlarını düşünmeden, tasarımı saf HTML/CSS ile birebir kodlamak.

### Sprint 2.1: UI Kit ve Layout
- [x] Tailwind CSS kurulumu (veya saf CSS değişkenleri `:root`).
- [x] Renk Paleti: Entec.ch ve Solar referanslarına uygun (Mavi, Beyaz, Güneş Sarısı/Turuncu).
- [x] Tipografi: Google Fonts (Örn: 'Inter' veya 'Roboto').
- [x] Header (Navigasyon) ve Footer tasarımı.

### Sprint 2.2: Sayfa Tasarımları (Mockup to Code)
- [x] **Ana Sayfa:** Hero Slider, Hizmet Kartları (Split Screen), Hakkımızda özeti.
- [x] **IT Hizmetleri Sayfası:** Microsoft 365, Cloud, Support bölümleri (Liste yapısı).
- [x] **Solar Sistemler Sayfası:** Referans Galeri Grid yapısı, Teknik detay ikonları.
- [x] **İletişim Sayfası:** Harita ve Form tasarımı.

---

## ⚙️ FAZ 3: Backend Entegrasyonu ve CMS Mantığı (Sprint 3)
**Hedef:** Statik HTML dosyalarını WordPress fonksiyonlarıyla canlandırmak.

### Sprint 3.1: Hiyerarşi Parçalama
- [x] `header.php` ve `footer.php` ayrıştırılması.
- [x] `front-page.php`: Ana sayfa şablonu.
- [x] `page.php`: Standart sayfalar için şablon.
- [x] `404.php`: Özel hata sayfası.

### Sprint 3.2: Yönetim Paneli (ACF & CPT)
- [x] **Eklenti Kurulumu:** ACF Pro (veya Free), Contact Form 7.
- [x] **Custom Post Type (CPT):** "Referanslar" (Projeler) -> Solar ve IT kategorileriyle.
- [x] **ACF Alanları:**
    - [x] *Ana Sayfa:* Hero Başlık, Hero Resim, Hizmet Linkleri.
    - [x] *Site Ayarları:* Logo, Telefon, Adres, Sosyal Medya (Options Page).
    - [x] *Referanslar:* Proje Yeri, Kurulu Güç (kWp), Tarih, Galeri.

### Sprint 3.3: Alt Sayfa Şablonları (Tamamlandı)
- [x] `page-it-services.php`: IT Hizmetleri özel şablonu.
- [x] `page-solar-systems.php`: Solar Sistemler özel şablonu.
- [x] `page-contact.php`: İletişim sayfası şablonu.

---

## 📝 FAZ 4: İçerik ve Navigasyon (Sprint 4)
**Hedef:** Gerçek verilerin sisteme girilmesi ve menülerin bağlanması.

### Sprint 4.1: Veri Girişi (Otomasyon ile Tamamlandı)
- [x] **Otomatik İçerik Yükleyici:** `inc/demo-importer.php` ile sayfalar, menüler ve örnek içerikler kodlandı.
- [x] `Adsız.rtf` dosyasındaki Almanca metinlerin sayfalara girilmesi.
- [ ] Referans görsellerinin (Solar ve IT) optimize edilip yüklenmesi (.webp formatı önerilir).
- [x] Menülerin oluşturulması (Appearance > Menus).

### Sprint 4.2: Fonksiyonel Testler
- [ ] İletişim formlarının çalışırlığı (SMTP gerekebilir).
- [ ] Mobil uyumluluk (Hamburger menü kontrolü).
- [ ] Kırık link kontrolü.

---

## 🚀 FAZ 5: Deployment ve Teslimat (Sprint 5)
**Hedef:** GoDaddy üzerinde yayına alma.

### Sprint 5.1: Taşıma (Migration)
- [ ] Veritabanı yedeği (.sql).
- [ ] `wp-content` klasörünün ziplenmesi.
- [ ] GoDaddy cPanel üzerinden veritabanı ve dosya yüklemesi.
- [ ] `wp-config.php` veritabanı ayarlarının güncellenmesi.

### Sprint 5.2: Son Kontroller
- [ ] SSL (HTTPS) zorlama.
- [ ] Permalink ayarlarının yenilenmesi.
- [ ] Müşteri hesabı oluşturma (Yönetici).
