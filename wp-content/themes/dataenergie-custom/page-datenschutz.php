<?php
/**
 * Template Name: Datenschutz (Privacy Policy)
 * Template Post Type: page
 *
 * Datenschutzerklärung (Gizlilik Politikası) sayfası şablonu.
 * Modern SaaS tasarımı ile GDPR uyumlu yapı.
 *
 * @package Dataenergie
 * @version 1.0.0
 */

get_header();

// ACF alanları - dataenergie_get_company_info() fonksiyonu ile Impressum'dan fallback
$last_updated = get_field('datenschutz_last_updated') ?: get_the_modified_date('d.m.Y');
$intro_text = get_field('datenschutz_intro');

// Şirket bilgileri - önce bu sayfadan, yoksa Impressum'dan al
$company_name = dataenergie_get_company_info('company_name', 'Dataenergie GmbH');
$company_address = dataenergie_get_company_info('company_address', 'Musterstraße 123');
$company_city = dataenergie_get_company_info('company_city', '12345 Musterstadt');
$company_email = get_field('privacy_email') ?: dataenergie_get_company_info('company_email', 'datenschutz@dataenergie.de');
$company_phone = dataenergie_get_company_info('company_phone', '+49 123 456789');

// DPO (Veri Koruma Görevlisi) bilgileri
$dpo_name = get_field('dpo_name');
$dpo_email = get_field('dpo_email');
$dpo_phone = get_field('dpo_phone');

// Cookie ve Analytics ayarları
$cookies_enabled = get_field('cookies_enabled');
$cookies_text = get_field('cookies_text');
$ga_enabled = get_field('ga_enabled');
$ga_anonymize = get_field('ga_anonymize');

// Hosting bilgileri
$hoster_name = get_field('hoster_name');
$hoster_address = get_field('hoster_address');
$hoster_url = get_field('hoster_url');
$server_location = get_field('server_location');

// Sunucu konumu label
$server_location_labels = array(
    'eu'    => 'der Europäischen Union',
    'de'    => 'Deutschland',
    'ch'    => 'der Schweiz',
    'usa'   => 'den USA',
    'other' => 'einem anderen Land',
);
$server_location_text = isset($server_location_labels[$server_location]) ? $server_location_labels[$server_location] : $server_location_labels['eu'];
?>

<!-- ========================================
     LEGAL PAGE HERO
     ======================================== -->
<section class="legal-hero" aria-labelledby="legal-hero-title">
    <div class="container">
        <div class="legal-hero__content">
            <span class="legal-hero__tag">Rechtliches</span>
            <h1 id="legal-hero-title" class="legal-hero__title">Datenschutzerklärung</h1>
            <p class="legal-hero__meta">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                Zuletzt aktualisiert: <?php echo esc_html($last_updated); ?>
            </p>
        </div>
    </div>
</section>

<!-- ========================================
     LEGAL PAGE CONTENT
     ======================================== -->
<main class="legal-content" role="main">
    <div class="container">
        <div class="legal-layout">

            <!-- Quick Navigation -->
            <aside class="legal-nav" aria-label="Inhaltsverzeichnis">
                <div class="legal-nav__sticky">
                    <h2 class="legal-nav__title">Inhalt</h2>
                    <nav>
                        <ul class="legal-nav__list">
                            <li><a href="#verantwortlicher">1. Verantwortlicher</a></li>
                            <li><a href="#datenerfassung">2. Datenerfassung</a></li>
                            <li><a href="#cookies">3. Cookies</a></li>
                            <li><a href="#kontaktformular">4. Kontaktformular</a></li>
                            <li><a href="#hosting">5. Hosting</a></li>
                            <li><a href="#analyse">6. Analyse-Tools</a></li>
                            <li><a href="#rechte">7. Ihre Rechte</a></li>
                            <li><a href="#aenderungen">8. Änderungen</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <article class="legal-article">

                <!-- Intro -->
                <div class="legal-intro">
                    <p><?php echo $intro_text ? esc_html($intro_text) : 'Wir nehmen den Schutz Ihrer persönlichen Daten sehr ernst. Diese Datenschutzerklärung informiert Sie darüber, wie wir Ihre personenbezogenen Daten erheben, verarbeiten und nutzen, wenn Sie unsere Website besuchen.'; ?></p>
                </div>

                <!-- Section 1: Verantwortlicher -->
                <section id="verantwortlicher" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">1</span>
                        Verantwortlicher
                    </h2>
                    <div class="legal-section__content">
                        <p>Verantwortlicher für die Datenverarbeitung auf dieser Website ist:</p>
                        <div class="legal-info-card">
                            <p><strong><?php echo esc_html($company_name); ?></strong></p>
                            <p><?php echo esc_html($company_address); ?><br><?php echo esc_html($company_city); ?></p>
                            <p>E-Mail: <a href="mailto:<?php echo esc_attr($company_email); ?>"><?php echo esc_html($company_email); ?></a></p>
                            <p>Telefon: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $company_phone)); ?>"><?php echo esc_html($company_phone); ?></a></p>
                        </div>
                        <?php if ($dpo_name) : ?>
                        <h3>Datenschutzbeauftragter</h3>
                        <div class="legal-info-card">
                            <p><strong><?php echo esc_html($dpo_name); ?></strong></p>
                            <?php if ($dpo_email) : ?>
                            <p>E-Mail: <a href="mailto:<?php echo esc_attr($dpo_email); ?>"><?php echo esc_html($dpo_email); ?></a></p>
                            <?php endif; ?>
                            <?php if ($dpo_phone) : ?>
                            <p>Telefon: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $dpo_phone)); ?>"><?php echo esc_html($dpo_phone); ?></a></p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>

                <!-- Section 2: Datenerfassung -->
                <section id="datenerfassung" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">2</span>
                        Datenerfassung auf unserer Website
                    </h2>
                    <div class="legal-section__content">
                        <h3>Server-Log-Dateien</h3>
                        <p>Der Provider der Seiten erhebt und speichert automatisch Informationen in sogenannten Server-Log-Dateien, die Ihr Browser automatisch an uns übermittelt. Dies sind:</p>
                        <ul class="legal-list">
                            <li>Browsertyp und Browserversion</li>
                            <li>Verwendetes Betriebssystem</li>
                            <li>Referrer URL</li>
                            <li>Hostname des zugreifenden Rechners</li>
                            <li>Uhrzeit der Serveranfrage</li>
                            <li>IP-Adresse</li>
                        </ul>
                        <p>Diese Daten sind nicht bestimmten Personen zuordenbar. Eine Zusammenführung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.</p>

                        <h3>Rechtsgrundlage</h3>
                        <p>Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der Verbesserung der Stabilität und Funktionalität unserer Website.</p>
                    </div>
                </section>

                <!-- Section 3: Cookies -->
                <section id="cookies" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">3</span>
                        Cookies
                    </h2>
                    <div class="legal-section__content">
                        <p>Unsere Website verwendet Cookies. Das sind kleine Textdateien, die Ihr Webbrowser auf Ihrem Endgerät speichert.</p>

                        <h3>Arten von Cookies</h3>
                        <div class="legal-table-wrapper">
                            <table class="legal-table">
                                <thead>
                                    <tr>
                                        <th>Cookie-Typ</th>
                                        <th>Zweck</th>
                                        <th>Speicherdauer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Notwendige Cookies</td>
                                        <td>Erforderlich für die Grundfunktionen der Website</td>
                                        <td>Sitzung</td>
                                    </tr>
                                    <tr>
                                        <td>Funktionale Cookies</td>
                                        <td>Speichern Ihrer Präferenzen</td>
                                        <td>1 Jahr</td>
                                    </tr>
                                    <tr>
                                        <td>Analytische Cookies</td>
                                        <td>Verstehen, wie Besucher die Website nutzen</td>
                                        <td>2 Jahre</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h3>Cookie-Einstellungen</h3>
                        <p>Sie können Ihren Browser so einstellen, dass Sie über das Setzen von Cookies informiert werden und Cookies nur im Einzelfall erlauben. Bei der Deaktivierung von Cookies kann die Funktionalität unserer Website eingeschränkt sein.</p>
                    </div>
                </section>

                <!-- Section 4: Kontaktformular -->
                <section id="kontaktformular" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">4</span>
                        Kontaktformular
                    </h2>
                    <div class="legal-section__content">
                        <p>Wenn Sie uns per Kontaktformular Anfragen zukommen lassen, werden Ihre Angaben aus dem Anfrageformular inklusive der von Ihnen dort angegebenen Kontaktdaten zwecks Bearbeitung der Anfrage und für den Fall von Anschlussfragen bei uns gespeichert.</p>

                        <div class="legal-highlight">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <p>Diese Daten geben wir nicht ohne Ihre Einwilligung weiter. Die Verarbeitung erfolgt auf Grundlage von Art. 6 Abs. 1 lit. b DSGVO.</p>
                        </div>
                    </div>
                </section>

                <!-- Section 5: Hosting -->
                <section id="hosting" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">5</span>
                        Hosting
                    </h2>
                    <div class="legal-section__content">
                        <p>Unsere Website wird bei einem externen Dienstleister gehostet (Hoster). Die personenbezogenen Daten, die auf dieser Website erfasst werden, werden auf den Servern des Hosters gespeichert.</p>

                        <?php if ($hoster_name) : ?>
                        <div class="legal-info-card">
                            <p><strong><?php echo esc_html($hoster_name); ?></strong></p>
                            <?php if ($hoster_address) : ?>
                            <p><?php echo nl2br(esc_html($hoster_address)); ?></p>
                            <?php endif; ?>
                            <?php if ($hoster_url) : ?>
                            <p><a href="<?php echo esc_url($hoster_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($hoster_url); ?></a></p>
                            <?php endif; ?>
                        </div>
                        <p>Die Server befinden sich in <?php echo esc_html($server_location_text); ?>.</p>
                        <?php endif; ?>

                        <p>Der Einsatz des Hosters erfolgt auf Grundlage von Art. 6 Abs. 1 lit. f DSGVO. Wir haben ein berechtigtes Interesse an einer möglichst zuverlässigen Darstellung unserer Website.</p>
                    </div>
                </section>

                <!-- Section 6: Analyse-Tools -->
                <section id="analyse" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">6</span>
                        Analyse-Tools und Werbung
                    </h2>
                    <div class="legal-section__content">
                        <?php if ($ga_enabled) : ?>
                        <h3>Google Analytics</h3>
                        <p>Diese Website nutzt Funktionen des Webanalysedienstes Google Analytics. Anbieter ist die Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Irland.</p>

                        <p>Google Analytics verwendet sog. „Cookies". Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert.</p>

                        <?php if ($ga_anonymize) : ?>
                        <h3>IP-Anonymisierung</h3>
                        <p>Wir haben auf dieser Website die Funktion IP-Anonymisierung aktiviert. Dadurch wird Ihre IP-Adresse von Google innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum vor der Übermittlung in die USA gekürzt.</p>
                        <?php endif; ?>
                        <?php else : ?>
                        <p>Diese Website verwendet derzeit keine Analyse-Tools von Drittanbietern.</p>
                        <?php endif; ?>

                        <?php
                        $other_tools = get_field('other_analytics_tools');
                        if ($other_tools) :
                            $tools_list = array_filter(array_map('trim', explode("\n", $other_tools)));
                            if (!empty($tools_list)) :
                        ?>
                        <h3>Weitere eingesetzte Tools</h3>
                        <ul class="legal-list">
                            <?php foreach ($tools_list as $tool) : ?>
                            <li><?php echo esc_html($tool); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php
                            endif;
                        endif;
                        ?>
                    </div>
                </section>

                <!-- Section 7: Ihre Rechte -->
                <section id="rechte" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">7</span>
                        Ihre Rechte
                    </h2>
                    <div class="legal-section__content">
                        <p>Sie haben gegenüber uns folgende Rechte hinsichtlich der Sie betreffenden personenbezogenen Daten:</p>

                        <div class="legal-rights-grid">
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <h4>Auskunftsrecht</h4>
                                <p>Sie können Auskunft über Ihre von uns verarbeiteten personenbezogenen Daten verlangen.</p>
                            </div>
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </div>
                                <h4>Berichtigungsrecht</h4>
                                <p>Sie können die Berichtigung unrichtiger oder die Vervollständigung Ihrer Daten verlangen.</p>
                            </div>
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                </div>
                                <h4>Löschungsrecht</h4>
                                <p>Sie können die Löschung Ihrer personenbezogenen Daten verlangen.</p>
                            </div>
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <h4>Einschränkungsrecht</h4>
                                <p>Sie können die Einschränkung der Verarbeitung Ihrer Daten verlangen.</p>
                            </div>
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </div>
                                <h4>Datenübertragbarkeit</h4>
                                <p>Sie können die Übertragung Ihrer Daten in einem maschinenlesbaren Format verlangen.</p>
                            </div>
                            <div class="legal-right-card">
                                <div class="legal-right-card__icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                    </svg>
                                </div>
                                <h4>Widerspruchsrecht</h4>
                                <p>Sie können der Verarbeitung Ihrer Daten jederzeit widersprechen.</p>
                            </div>
                        </div>

                        <div class="legal-highlight legal-highlight--secondary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <p>Zur Ausübung Ihrer Rechte wenden Sie sich bitte an: <a href="mailto:<?php echo esc_attr($company_email); ?>"><?php echo esc_html($company_email); ?></a></p>
                        </div>
                    </div>
                </section>

                <!-- Section 8: Änderungen -->
                <section id="aenderungen" class="legal-section">
                    <h2 class="legal-section__title">
                        <span class="legal-section__number">8</span>
                        Änderungen dieser Datenschutzerklärung
                    </h2>
                    <div class="legal-section__content">
                        <p>Wir behalten uns vor, diese Datenschutzerklärung anzupassen, damit sie stets den aktuellen rechtlichen Anforderungen entspricht oder um Änderungen unserer Leistungen in der Datenschutzerklärung umzusetzen.</p>
                        <p>Für Ihren erneuten Besuch gilt dann die neue Datenschutzerklärung.</p>
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
                            <span class="legal-section__number">+</span>
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
            <h2 id="legal-cta-title" class="legal-cta__title">Fragen zum Datenschutz?</h2>
            <p class="legal-cta__text">Kontaktieren Sie uns, wenn Sie Fragen zu dieser Datenschutzerklärung oder zur Verarbeitung Ihrer Daten haben.</p>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary">
                Kontakt aufnehmen
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
