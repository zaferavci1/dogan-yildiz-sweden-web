<?php
/**
 * Template Name: Contact Page
 *
 * Modern SaaS Contact sayfası.
 *
 * @package Dataenergie
 * @version 2.0.0
 */

get_header();

// Sayfa bilgilerini al
$hero_title = get_the_title();
$hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );

// Site Ayarlarından İletişim Bilgilerini Al
$phone      = dataenergie_get_option( 'phone_number', '044 501 73 73' );
$mobile     = dataenergie_get_option( 'mobile_number', '076 216 27 73' );
$email      = dataenergie_get_option( 'email_address', 'info@dataenergie.ch' );
$address    = dataenergie_get_option( 'address_text', "Dataenergie GmbH\nGewerbestrasse 19\n6314 Unterägeri\nSchweiz" );
$facebook   = dataenergie_get_option( 'facebook_url' );
$linkedin   = dataenergie_get_option( 'linkedin_url' );
$instagram  = dataenergie_get_option( 'instagram_url' );

// Google Maps API Key (Customizer'dan alınabilir)
$maps_api_key = dataenergie_get_option( 'google_maps_api_key', '' );
$maps_embed_url = dataenergie_get_option( 'google_maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2718.5!2d8.5765!3d47.1403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479aa9c5e8b8e8e7%3A0x1234567890abcdef!2sGewerbestrasse%2019%2C%206314%20Unter%C3%A4geri%2C%20Switzerland!5e0!3m2!1sde!2sch!4v1' );

// Contact Form 7 shortcode kontrolü
$post_content = get_the_content();
$has_cf7 = has_shortcode( $post_content, 'contact-form-7' );
?>

<!-- ========================================
     PAGE HERO - MINIMAL
     ======================================== -->
<section class="contact-hero" style="<?php echo $hero_image ? 'background-image: url(' . esc_url( $hero_image ) . ');' : ''; ?>">
    <div class="contact-hero__overlay"></div>
    <div class="container">
        <div class="contact-hero__content">
            <span class="contact-hero__tag">Kontakt</span>
            <h1 class="contact-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
            <p class="contact-hero__subtitle">Wir freuen uns auf Ihre Nachricht</p>
        </div>
    </div>
</section>

<!-- ========================================
     CONTACT MAIN SECTION
     ======================================== -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            <!-- LEFT: Contact Info -->
            <div class="contact-info">
                <div class="contact-info__header">
                    <h2 class="contact-info__title">Kontaktieren Sie uns</h2>
                    <p class="contact-info__text">Haben Sie Fragen zu unseren IT- oder Solarlösungen? Wir sind für Sie da.</p>
                </div>

                <!-- Contact Cards -->
                <div class="contact-cards">
                    <!-- Address Card -->
                    <div class="contact-card">
                        <div class="contact-card__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="contact-card__content">
                            <h3 class="contact-card__label">Adresse</h3>
                            <p class="contact-card__value"><?php echo nl2br( esc_html( $address ) ); ?></p>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div class="contact-card">
                        <div class="contact-card__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="contact-card__content">
                            <h3 class="contact-card__label">Telefon</h3>
                            <a href="tel:<?php echo esc_attr( dataenergie_clean_phone( $phone ) ); ?>" class="contact-card__value contact-card__link">
                                Tel. <?php echo esc_html( $phone ); ?>
                            </a>
                            <?php if ( $mobile ) : ?>
                            <a href="tel:<?php echo esc_attr( dataenergie_clean_phone( $mobile ) ); ?>" class="contact-card__value contact-card__link">
                                Mobile <?php echo esc_html( $mobile ); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="contact-card">
                        <div class="contact-card__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="contact-card__content">
                            <h3 class="contact-card__label">E-Mail</h3>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-card__value contact-card__link">
                                <?php echo esc_html( $email ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Hours Card -->
                    <div class="contact-card">
                        <div class="contact-card__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="contact-card__content">
                            <h3 class="contact-card__label">Öffnungszeiten</h3>
                            <p class="contact-card__value">
                                Mo - Fr: 08:00 - 17:00<br>
                                Sa - So: Geschlossen
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <?php if ( $facebook || $linkedin || $instagram ) : ?>
                <div class="contact-social">
                    <h3 class="contact-social__title">Folgen Sie uns</h3>
                    <div class="contact-social__links">
                        <?php if ( $facebook ) : ?>
                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" class="contact-social__link" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                        <?php if ( $linkedin ) : ?>
                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" class="contact-social__link" aria-label="LinkedIn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                        <?php endif; ?>
                        <?php if ( $instagram ) : ?>
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener" class="contact-social__link" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- RIGHT: Contact Form -->
            <div class="contact-form-container">
                <div class="contact-form-wrapper">
                    <?php if ( $has_cf7 ) : ?>
                        <!-- Contact Form 7 -->
                        <div class="contact-form-header">
                            <h2 class="contact-form-header__title">Nachricht senden</h2>
                            <p class="contact-form-header__text">Füllen Sie das Formular aus und wir melden uns bei Ihnen.</p>
                        </div>
                        <div class="contact-form-cf7">
                            <?php echo apply_filters( 'the_content', $post_content ); ?>
                        </div>
                    <?php else : ?>
                        <!-- Fallback Modern Form -->
                        <div class="contact-form-header">
                            <h2 class="contact-form-header__title">Nachricht senden</h2>
                            <p class="contact-form-header__text">Füllen Sie das Formular aus und wir melden uns bei Ihnen.</p>
                        </div>

                        <form class="contact-form" action="#" method="post">
                            <div class="contact-form__row">
                                <div class="contact-form__group">
                                    <input type="text" id="contact-name" name="contact-name" class="contact-form__input" placeholder=" " required>
                                    <label for="contact-name" class="contact-form__label">Ihr Name *</label>
                                </div>
                                <div class="contact-form__group">
                                    <input type="email" id="contact-email" name="contact-email" class="contact-form__input" placeholder=" " required>
                                    <label for="contact-email" class="contact-form__label">E-Mail Adresse *</label>
                                </div>
                            </div>

                            <div class="contact-form__group">
                                <input type="text" id="contact-company" name="contact-company" class="contact-form__input" placeholder=" ">
                                <label for="contact-company" class="contact-form__label">Unternehmen</label>
                            </div>

                            <div class="contact-form__group">
                                <input type="tel" id="contact-phone" name="contact-phone" class="contact-form__input" placeholder=" ">
                                <label for="contact-phone" class="contact-form__label">Telefon</label>
                            </div>

                            <div class="contact-form__group">
                                <select id="contact-subject" name="contact-subject" class="contact-form__select" required>
                                    <option value="" disabled selected></option>
                                    <option value="it-services">IT Services</option>
                                    <option value="solar-systems">Solaranlagen</option>
                                    <option value="cloud-solutions">Cloud Lösungen</option>
                                    <option value="consulting">Beratung</option>
                                    <option value="other">Sonstiges</option>
                                </select>
                                <label for="contact-subject" class="contact-form__label">Betreff *</label>
                            </div>

                            <div class="contact-form__group">
                                <textarea id="contact-message" name="contact-message" class="contact-form__textarea" rows="5" placeholder=" " required></textarea>
                                <label for="contact-message" class="contact-form__label">Ihre Nachricht *</label>
                            </div>

                            <div class="contact-form__checkbox">
                                <input type="checkbox" id="contact-privacy" name="contact-privacy" class="contact-form__check" required>
                                <label for="contact-privacy" class="contact-form__check-label">
                                    Ich stimme der <a href="/datenschutz">Datenschutzerklärung</a> zu und akzeptiere die Verarbeitung meiner Daten.
                                </label>
                            </div>

                            <button type="submit" class="contact-form__submit">
                                <span>Nachricht senden</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>

                            <p class="contact-form__notice">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                <em>Demo-Formular. Installieren Sie "Contact Form 7" für volle Funktionalität.</em>
                            </p>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ========================================
     MAP SECTION
     ======================================== -->
<section class="contact-map">
    <div class="contact-map__header">
        <div class="container">
            <h2 class="contact-map__title">Unser Standort</h2>
            <p class="contact-map__subtitle">Besuchen Sie uns in Unterägeri</p>
        </div>
    </div>
    <div class="contact-map__container">
        <iframe
            src="<?php echo esc_url( $maps_embed_url ); ?>"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Standort auf Google Maps">
        </iframe>
    </div>
</section>

<?php
get_footer();
