# Dataenergie GmbH - Canlı Ortama Geçiş (Deployment) Rehberi

Bu rehber, yerel ortamda hazırlanan WordPress temasının GoDaddy veya benzeri bir Linux hosting ortamına taşınması için gerekli adımları içerir.

## 📋 Ön Hazırlık

1.  **Hosting Bilgileri:**
    *   FTP/SFTP Kullanıcı adı ve şifresi.
    *   Veritabanı (MySQL) Kullanıcı adı, şifresi ve sunucu adresi (genelde `localhost`).
    *   WordPress Admin giriş bilgileri.

2.  **Yedekleme:**
    *   Mevcut sitenin (varsa) tam yedeğini alın.

---

## 🚀 Adım 1: Dosyaların Hazırlanması

Temanızın son halini canlı sunucuya yüklemek için paketleyin.

1.  `wp-content/themes/dataenergie-custom` klasörüne gidin.
2.  Tüm klasörü bir **ZIP** dosyası haline getirin (`dataenergie-custom.zip`).

> **Not:** Sadece tema klasörünü yüklemek yeterlidir. WordPress çekirdek dosyalarını (wp-admin, wp-includes) tekrar yüklemenize gerek yoktur, sunucuda zaten kurulu olmalıdır.

---

## ☁️ Adım 2: Temanın Yüklenmesi

1.  **Dosya Yöneticisi (File Manager) veya FTP** ile sunucunuza bağlanın.
2.  `/wp-content/themes/` dizinine gidin.
3.  Hazırladığınız `dataenergie-custom.zip` dosyasını buraya yükleyin.
4.  ZIP dosyasını dışarı çıkarın (Extract).
5.  Klasör adının `dataenergie-custom` olduğundan emin olun.

---

## ⚙️ Adım 3: Eklentilerin Kurulumu

Tema fonksiyonlarının tam çalışması için aşağıdaki eklentilerin sunucuda kurulu ve aktif olması gerekir:

1.  **Advanced Custom Fields Pro (ACF Pro):**
    *   Tema ile entegre özel alanların çalışması için şarttır.
    *   Eklentiyi yükleyin ve lisans anahtarınızı girin.
2.  **Contact Form 7:**
    *   İletişim formları için gereklidir.

---

## 🔧 Adım 4: Temanın Aktifleştirilmesi ve İçerik Kurulumu

1.  WordPress Yönetim Paneline (`/wp-admin`) giriş yapın.
2.  **Görünüm > Temalar** menüsüne gidin.
3.  **"Dataenergie Custom"** temasını bulun ve **Etkinleştir** butonuna tıklayın.
4.  Tema aktifleştiğinde, `inc/demo-importer.php` devreye girecek ve şunları otomatik yapacaktır:
    *   Gerekli sayfaları oluşturma (Home, IT Services, Solar Systems, Contact vb.).
    *   Sayfa şablonlarını (Templates) atama.
    *   Ana menü ve Footer menüsünü oluşturma.
    *   Örnek Projeler (Referanslar) ekleme.
    *   Site Ayarları (Telefon, Adres vb.) alanlarını doldurma.

---

## 🔍 Adım 5: Son Kontroller

1.  **Kalıcı Bağlantılar (Permalinks):**
    *   `Ayarlar > Kalıcı Bağlantılar` menüsüne gidin.
    *   Hiçbir şeyi değiştirmeden sadece **"Değişiklikleri Kaydet"** butonuna basın. Bu işlem `.htaccess` dosyasını günceller ve 404 hatalarını önler.

2.  **Ana Sayfa Ayarı:**
    *   `Ayarlar > Okuma` menüsüne gidin.
    *   "Ana sayfa görüntülenmesi" seçeneğini **"Sabit bir sayfa"** olarak işaretleyin.
    *   Ana sayfa: **Home**
    *   Yazı sayfası: (Boş bırakabilir veya Blog seçebilirsiniz)

3.  **İletişim Formu:**
    *   `İletişim > İletişim Formları` menüsüne gidin.
    *   Varsayılan formu düzenleyin veya yeni bir form oluşturun.
    *   Formun **Shortcode**'unu (örn: `[contact-form-7 id="5" title="İletişim formu 1"]`) kopyalayın.
    *   **Sayfalar > Kontakt** sayfasını düzenleyin ve içeriğe bu kodu yapıştırın. (Tema bunu algılayıp demo formu gizleyecektir).

4.  **Google Maps:**
    *   `page-contact.php` dosyasında Google Maps bir görsel (placeholder) olarak kodlanmıştır.
    *   Canlı harita için Google Maps API Key alarak bir iframe veya ACF Google Map alanı eklemeniz önerilir.

---

## 🆘 Sorun Giderme

*   **Sayfalar görünmüyor:** Kalıcı bağlantıları kaydedin (Adım 5.1).
*   **Stiller bozuk:** Tarayıcı önbelleğini temizleyin veya `style.css` versiyonunu `functions.php` içinde artırın.
*   **ACF Alanları görünmüyor:** ACF Pro eklentisinin aktif olduğundan emin olun.

**Tebrikler! Web siteniz yayına hazır.**
