<?php
/**
 * Template Name: Impressum (Legal Notice)
 * Template Post Type: page
 *
 * Impressum (Künye/Yasal Bildirim) sayfası şablonu.
 * Alman hukuku TMG § 5 uyumlu yapı.
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();

// ACF alanları - get_field() ile sayfadan al, yoksa fallback değerler kullan
$company_name = get_field('company_name') ?: 'Dataenergie GmbH';
$company_address = get_field('company_address') ?: 'Musterstraße 123';
$company_city = get_field('company_city') ?: '12345 Musterstadt';
$company_country = get_field('company_country') ?: 'Deutschland';
$company_email = get_field('company_email') ?: 'info@dataenergie.de';
$company_phone = get_field('company_phone') ?: '+49 123 456789';
$company_fax = get_field('company_fax') ?: '';
$privacy_email = get_field('privacy_email') ?: '';

// Yönetim ve Sicil Bilgileri
$ceo_name = get_field('ceo_name') ?: 'Max Mustermann';
$register_court = get_field('register_court') ?: 'Amtsgericht Musterstadt';
$register_number = get_field('register_number') ?: 'HRB 12345';
$vat_id = get_field('vat_id') ?: 'DE123456789';
$responsible_content = get_field('responsible_content') ?: $ceo_name;

// Ek Bilgiler (Opsiyonel)
$professional_title = get_field('professional_title') ?: '';
$chamber_name = get_field('chamber_name') ?: '';
$website_url = get_field('website_url') ?: '';
?>

<!-- ========================================
     LEGAL PAGE HERO
     ======================================== -->
<section class="legal-hero legal-hero--impressum" aria-labelledby="legal-hero-title">
    <div class="container">
        <div class="legal-hero__content">
            <span class="legal-hero__tag">Rechtliches</span>
            <h1 id="legal-hero-title" class="legal-hero__title">Impressum</h1>
            <p class="legal-hero__subtitle">Angaben gemäß § 5 TMG</p>
        </div>
    </div>
</section>

<!-- ========================================
     LEGAL PAGE CONTENT
     ======================================== -->
<main class="legal-content" role="main">
    <div class="container">
        <div class="legal-layout legal-layout--impressum">

            <!-- Quick Navigation -->
            <aside class="legal-nav" aria-label="Inhaltsverzeichnis">
                <div class="legal-nav__sticky">
                    <h2 class="legal-nav__title">Schnellzugriff</h2>
                    <nav>
                        <ul class="legal-nav__list">
                            <li><a href="#anbieter">Anbieter</a></li>
                            <li><a href="#kontakt">Kontakt</a></li>
                            <li><a href="#vertretung">Vertretung</a></li>
                            <li><a href="#register">Registereintrag</a></li>
                            <li><a href="#umsatzsteuer">Umsatzsteuer-ID</a></li>
                            <li><a href="#inhalt">Inhaltlich Verantwortlicher</a></li>
                            <li><a href="#streitbeilegung">Streitbeilegung</a></li>
                            <li><a href="#haftung">Haftungshinweise</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <article class="legal-article">

                <!-- Company Info Card -->
                <div class="impressum-company-card">
                    <div class="impressum-company-card__header">
                        <div class="impressum-company-card__logo">
                            <span class="impressum-logo-text">Data<span class="logo-accent">energie</span></span>
                        </div>
                    </div>
                    <div class="impressum-company-card__body">
                        <div class="impressum-company-card__grid">
                            <div class="impressum-company-card__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <div>
                                    <strong><?php echo esc_html($company_name); ?></strong><br>
                                    <?php echo esc_html($company_address); ?><br>
                                    <?php echo esc_html($company_city); ?><br>
                                    <?php echo esc_html($company_country); ?>
                                </div>
                            </div>
                            <div class="impressum-company-card__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <div>
                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $company_phone)); ?>"><?php echo esc_html($company_phone); ?></a>
                                    <?php if ($company_fax) : ?>
                                        <br><span class="text-light">Fax: <?php echo esc_html($company_fax); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="impressum-company-card__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <div>
                                    <a href="mailto:<?php echo esc_attr($company_email); ?>"><?php echo esc_html($company_email); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section: Anbieter -->
                <section id="anbieter" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </span>
                        Anbieter
                    </h2>
                    <div class="legal-section__content">
                        <p><strong><?php echo esc_html($company_name); ?></strong></p>
                        <p>
                            <?php echo esc_html($company_address); ?><br>
                            <?php echo esc_html($company_city); ?><br>
                            <?php echo esc_html($company_country); ?>
                        </p>
                    </div>
                </section>

                <!-- Section: Kontakt -->
                <section id="kontakt" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        Kontakt
                    </h2>
                    <div class="legal-section__content">
                        <div class="impressum-contact-grid">
                            <div class="impressum-contact-item">
                                <span class="impressum-contact-item__label">Telefon</span>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $company_phone)); ?>" class="impressum-contact-item__value"><?php echo esc_html($company_phone); ?></a>
                            </div>
                            <?php if ($company_fax) : ?>
                            <div class="impressum-contact-item">
                                <span class="impressum-contact-item__label">Telefax</span>
                                <span class="impressum-contact-item__value"><?php echo esc_html($company_fax); ?></span>
                            </div>
                            <?php endif; ?>
                            <div class="impressum-contact-item">
                                <span class="impressum-contact-item__label">E-Mail</span>
                                <a href="mailto:<?php echo esc_attr($company_email); ?>" class="impressum-contact-item__value"><?php echo esc_html($company_email); ?></a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Vertretung -->
                <section id="vertretung" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        Vertretungsberechtigte Person
                    </h2>
                    <div class="legal-section__content">
                        <p>Geschäftsführer: <strong><?php echo esc_html($ceo_name); ?></strong></p>
                    </div>
                </section>

                <!-- Section: Register -->
                <section id="register" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </span>
                        Registereintrag
                    </h2>
                    <div class="legal-section__content">
                        <div class="impressum-info-grid">
                            <div class="impressum-info-item">
                                <span class="impressum-info-item__label">Registergericht</span>
                                <span class="impressum-info-item__value"><?php echo esc_html($register_court); ?></span>
                            </div>
                            <div class="impressum-info-item">
                                <span class="impressum-info-item__label">Registernummer</span>
                                <span class="impressum-info-item__value"><?php echo esc_html($register_number); ?></span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Umsatzsteuer -->
                <section id="umsatzsteuer" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </span>
                        Umsatzsteuer-ID
                    </h2>
                    <div class="legal-section__content">
                        <p>Umsatzsteuer-Identifikationsnummer gemäß § 27a Umsatzsteuergesetz:</p>
                        <p class="impressum-vat-number"><?php echo esc_html($vat_id); ?></p>
                    </div>
                </section>

                <!-- Section: Inhaltlich Verantwortlicher -->
                <section id="inhalt" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </span>
                        Inhaltlich Verantwortlicher
                    </h2>
                    <div class="legal-section__content">
                        <p>Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV:</p>
                        <div class="legal-info-card">
                            <p><strong><?php echo esc_html($responsible_content); ?></strong></p>
                            <p>
                                <?php echo esc_html($company_name); ?><br>
                                <?php echo esc_html($company_address); ?><br>
                                <?php echo esc_html($company_city); ?>
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Section: Streitbeilegung -->
                <section id="streitbeilegung" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </span>
                        Streitbeilegung
                    </h2>
                    <div class="legal-section__content">
                        <h3>EU-Streitschlichtung</h3>
                        <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:</p>
                        <p><a href="https://ec.europa.eu/consumers/odr/" target="_blank" rel="noopener noreferrer">https://ec.europa.eu/consumers/odr/</a></p>
                        <p>Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>

                        <div class="legal-highlight">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
                        </div>
                    </div>
                </section>

                <!-- Section: Haftung -->
                <section id="haftung" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                        </span>
                        Haftungshinweise
                    </h2>
                    <div class="legal-section__content">
                        <h3>Haftung für Inhalte</h3>
                        <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen.</p>

                        <h3>Haftung für Links</h3>
                        <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.</p>

                        <h3>Urheberrecht</h3>
                        <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.</p>
                    </div>
                </section>

                <!-- WordPress Content (falls vorhanden) -->
                <?php
                while ( have_posts() ) :
                    the_post();
                    $content = get_the_content();
                    if ( ! empty( trim( $content ) ) ) :
                ?>
                    <section class="legal-section legal-section--custom">
                        <h2 class="legal-section__title">
                            <span class="legal-section__number">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </span>
                            Weitere Informationen
                        </h2>
                        <div class="legal-section__content entry-content">
                            <?php the_content(); ?>
                        </div>
                    </section>
                <?php
                    endif;
                endwhile;
                ?>

            </article>

        </div><!-- .legal-layout -->
    </div><!-- .container -->
</main>

<!-- ========================================
     CTA SECTION
     ======================================== -->
<section class="legal-cta" aria-labelledby="legal-cta-title">
    <div class="container">
        <div class="legal-cta__inner">
            <h2 id="legal-cta-title" class="legal-cta__title">Haben Sie Fragen?</h2>
            <p class="legal-cta__text">Wir stehen Ihnen gerne für Rückfragen zur Verfügung.</p>
            <div class="legal-cta__actions">
                <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary">
                    Kontakt aufnehmen
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
                <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>" class="btn btn-outline">
                    Datenschutz
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
