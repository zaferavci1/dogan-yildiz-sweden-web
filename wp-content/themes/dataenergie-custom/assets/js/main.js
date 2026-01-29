/**
 * Dataenergie Custom Theme - Main JavaScript
 * Mega Menu Navigation Support
 *
 * @package Dataenergie
 * @version 3.0.0
 */

(function() {
    'use strict';

    /**
     * DOM yüklendikten sonra çalıştır
     */
    document.addEventListener('DOMContentLoaded', function() {
        initDesktopDropdowns();
        initMobileMenu();
        initMobileDropdowns();
        initStickyHeader();
        initSmoothScroll();
        initProjectGalleryLightbox();
        initFeatureCardAccordions();
        initServiceCardExpand();
    });

    /**
     * Desktop dropdown menüler - hover delay ile flicker önleme
     */
    function initDesktopDropdowns() {
        const menuItems = document.querySelectorAll('.menu-primary > .menu-item-has-children');

        if (!menuItems.length) return;

        // Her menü öğesi için timeout sakla
        const timeouts = new Map();

        menuItems.forEach(function(item) {
            // Mouse enter - hemen aç
            item.addEventListener('mouseenter', function() {
                // Bu öğenin timeout'unu temizle
                if (timeouts.has(item)) {
                    clearTimeout(timeouts.get(item));
                    timeouts.delete(item);
                }

                // Diğer tüm açık menüleri kapat
                menuItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('is-dropdown-open');
                        // Diğerlerinin timeout'larını da temizle
                        if (timeouts.has(otherItem)) {
                            clearTimeout(timeouts.get(otherItem));
                            timeouts.delete(otherItem);
                        }
                    }
                });

                // Bu menüyü aç
                item.classList.add('is-dropdown-open');
            });

            // Mouse leave - gecikmeli kapat
            item.addEventListener('mouseleave', function() {
                const currentItem = item;

                // 150ms sonra kapat
                const timeout = setTimeout(function() {
                    currentItem.classList.remove('is-dropdown-open');
                    timeouts.delete(currentItem);
                }, 150);

                timeouts.set(item, timeout);
            });
        });
    }

    /**
     * Mobil menü toggle fonksiyonu
     */
    function initMobileMenu() {
        const toggleBtn = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-nav');

        if (!toggleBtn || !mobileNav) return;

        toggleBtn.addEventListener('click', function() {
            const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

            // Toggle states
            toggleBtn.classList.toggle('active');
            mobileNav.classList.toggle('active');

            // Erişilebilirlik için aria-expanded güncelle
            toggleBtn.setAttribute('aria-expanded', !isExpanded);

            // Body scroll'u engelle (menü açıkken)
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Menü dışına tıklandığında kapat (sadece overlay alanına)
        mobileNav.addEventListener('click', function(e) {
            if (e.target === mobileNav) {
                closeMobileMenu(toggleBtn, mobileNav);
            }
        });

        // Escape tuşu ile kapat
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                closeMobileMenu(toggleBtn, mobileNav);
            }
        });

        // Mobil menü içindeki normal linklere tıklandığında kapat
        const mobileNavLinks = mobileNav.querySelectorAll('a:not(.menu-item-has-children > a)');
        mobileNavLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                closeMobileMenu(toggleBtn, mobileNav);
            });
        });
    }

    /**
     * Mobil dropdown menüleri
     */
    function initMobileDropdowns() {
        const mobileNav = document.querySelector('.mobile-nav');
        if (!mobileNav) return;

        const parentItems = mobileNav.querySelectorAll('.menu-item-has-children');

        parentItems.forEach(function(item) {
            const link = item.querySelector(':scope > a');
            if (!link) return;

            // Dropdown toggle butonu oluştur
            const toggleBtn = document.createElement('button');
            toggleBtn.className = 'dropdown-toggle';
            toggleBtn.setAttribute('aria-label', 'Alt menüyü aç/kapat');
            toggleBtn.setAttribute('aria-expanded', 'false');
            item.appendChild(toggleBtn);

            // Toggle butonuna tıklama
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const isOpen = item.classList.contains('open');

                // Diğer açık menüleri kapat (sadece aynı seviyedeki kardeşler)
                const siblingItems = item.parentElement.querySelectorAll(':scope > .menu-item-has-children');
                siblingItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                        const otherToggle = otherItem.querySelector(':scope > .dropdown-toggle');
                        if (otherToggle) {
                            otherToggle.setAttribute('aria-expanded', 'false');
                        }
                    }
                });

                // Bu menüyü toggle et
                item.classList.toggle('open');
                toggleBtn.setAttribute('aria-expanded', !isOpen);
            });

            // Ana linke tıklama - sayfaya git
            link.addEventListener('click', function(e) {
                const href = link.getAttribute('href');
                // Eğer link '#' veya boş ise sadece dropdown'ı aç
                if (!href || href === '#' || href === '') {
                    e.preventDefault();
                    toggleBtn.click();
                }
                // Aksi halde linke normal şekilde git
            });
        });
    }

    /**
     * Mobil menüyü kapat
     */
    function closeMobileMenu(toggleBtn, mobileNav) {
        toggleBtn.classList.remove('active');
        mobileNav.classList.remove('active');
        toggleBtn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';

        // Alt menüleri de kapat
        const openItems = mobileNav.querySelectorAll('.menu-item-has-children.open');
        openItems.forEach(function(item) {
            item.classList.remove('open');
            const toggle = item.querySelector(':scope > .dropdown-toggle');
            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /**
     * Sticky header scroll efekti
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            // Scroll yönünü belirle
            if (currentScroll > scrollThreshold) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Sayfa içi linkler için smooth scroll
     */
    function initSmoothScroll() {
        const anchors = document.querySelectorAll('a[href^="#"]');

        anchors.forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                // Boş hash veya sadece # ise atla
                if (!targetId || targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();

                    // Header yüksekliğini hesaba kat
                    const header = document.querySelector('.site-header');
                    const headerHeight = header ? header.offsetHeight : 0;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Focus'u hedefe taşı (erişilebilirlik)
                    targetElement.focus({ preventScroll: true });
                }
            });
        });
    }

    /**
     * Project Gallery Lightbox
     * Accessible, keyboard-navigable image lightbox for project pages
     */
    function initProjectGalleryLightbox() {
        const lightbox = document.querySelector('.lightbox');
        if (!lightbox) return;

        const galleryItems = document.querySelectorAll('.project-gallery__item[data-lightbox-src]');
        if (!galleryItems.length) return;

        // Lightbox elements
        const backdrop = lightbox.querySelector('.lightbox__backdrop');
        const closeBtn = lightbox.querySelector('.lightbox__close');
        const prevBtn = lightbox.querySelector('.lightbox__nav--prev');
        const nextBtn = lightbox.querySelector('.lightbox__nav--next');
        const img = lightbox.querySelector('.lightbox__img');
        const caption = lightbox.querySelector('.lightbox__caption');
        const currentSpan = lightbox.querySelector('.lightbox__current');
        const totalSpan = lightbox.querySelector('.lightbox__total');

        // State
        let currentIndex = 0;
        let images = [];
        let lastFocusedElement = null;

        // Build images array from gallery items
        galleryItems.forEach(function(item) {
            images.push({
                src: item.dataset.lightboxSrc,
                alt: item.dataset.lightboxAlt || ''
            });
        });

        // Update total count
        if (totalSpan) {
            totalSpan.textContent = images.length;
        }

        /**
         * Open lightbox at specific index
         */
        function openLightbox(index) {
            currentIndex = index;
            lastFocusedElement = document.activeElement;

            updateImage();
            lightbox.removeAttribute('hidden');
            document.body.style.overflow = 'hidden';

            // Focus close button for accessibility
            setTimeout(function() {
                closeBtn.focus();
            }, 100);

            // Update nav visibility
            updateNavVisibility();
        }

        /**
         * Close lightbox
         */
        function closeLightbox() {
            lightbox.setAttribute('hidden', '');
            document.body.style.overflow = '';

            // Return focus to last focused element
            if (lastFocusedElement) {
                lastFocusedElement.focus();
            }
        }

        /**
         * Update displayed image
         */
        function updateImage() {
            const imageData = images[currentIndex];
            if (!imageData) return;

            // Add loading state
            img.style.opacity = '0.5';

            img.onload = function() {
                img.style.opacity = '1';
            };

            img.src = imageData.src;
            img.alt = imageData.alt;

            if (caption) {
                caption.textContent = imageData.alt;
            }

            if (currentSpan) {
                currentSpan.textContent = currentIndex + 1;
            }

            updateNavVisibility();
        }

        /**
         * Show/hide prev/next buttons based on position
         */
        function updateNavVisibility() {
            if (prevBtn) {
                prevBtn.style.display = currentIndex > 0 ? '' : 'none';
            }
            if (nextBtn) {
                nextBtn.style.display = currentIndex < images.length - 1 ? '' : 'none';
            }
        }

        /**
         * Go to previous image
         */
        function goToPrev() {
            if (currentIndex > 0) {
                currentIndex--;
                updateImage();
            }
        }

        /**
         * Go to next image
         */
        function goToNext() {
            if (currentIndex < images.length - 1) {
                currentIndex++;
                updateImage();
            }
        }

        // Event: Click gallery item
        galleryItems.forEach(function(item, index) {
            item.addEventListener('click', function() {
                openLightbox(index);
            });
        });

        // Event: Close button
        if (closeBtn) {
            closeBtn.addEventListener('click', closeLightbox);
        }

        // Event: Backdrop click
        if (backdrop) {
            backdrop.addEventListener('click', closeLightbox);
        }

        // Event: Prev button
        if (prevBtn) {
            prevBtn.addEventListener('click', goToPrev);
        }

        // Event: Next button
        if (nextBtn) {
            nextBtn.addEventListener('click', goToNext);
        }

        // Event: Keyboard navigation
        lightbox.addEventListener('keydown', function(e) {
            if (lightbox.hasAttribute('hidden')) return;

            switch (e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    goToPrev();
                    break;
                case 'ArrowRight':
                    goToNext();
                    break;
                case 'Tab':
                    // Trap focus within lightbox
                    trapFocus(e);
                    break;
            }
        });

        /**
         * Trap focus within lightbox for accessibility
         */
        function trapFocus(e) {
            const focusableElements = lightbox.querySelectorAll(
                'button:not([disabled]):not([hidden])'
            );
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];

            if (e.shiftKey) {
                // Shift + Tab
                if (document.activeElement === firstElement) {
                    e.preventDefault();
                    lastElement.focus();
                }
            } else {
                // Tab
                if (document.activeElement === lastElement) {
                    e.preventDefault();
                    firstElement.focus();
                }
            }
        }

        // Event: Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        lightbox.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        lightbox.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next image
                    goToNext();
                } else {
                    // Swipe right - prev image
                    goToPrev();
                }
            }
        }
    }

    /**
     * Feature Card Accordions
     * Click to expand/collapse feature card details
     */
    function initFeatureCardAccordions() {
        const expandableCards = document.querySelectorAll('.feature-card--expandable');
        
        expandableCards.forEach(function(card) {
            const header = card.querySelector('.feature-card__header');
            if (!header) return;

            // Click event
            header.addEventListener('click', function() {
                toggleCard(card);
            });

            // Keyboard support (Enter or Space)
            header.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleCard(card);
                }
            });
        });

        /**
         * Toggle single card
         */
        function toggleCard(card) {
            const header = card.querySelector('.feature-card__header');
            const isExpanded = header.getAttribute('aria-expanded') === 'true';

            // Toggle aria-expanded
            header.setAttribute('aria-expanded', !isExpanded);

            // Toggle body visibility
            const body = card.querySelector('.feature-card__body');
            if (body) {
                body.setAttribute('aria-hidden', isExpanded);
            }
        }
    }

    /**
     * Service Card Mini - Expand/Navigate functionality
     * First click: expand card, show full description
     * Second click: navigate to page
     */
    function initServiceCardExpand() {
        const expandableCards = document.querySelectorAll('.service-card-mini--expandable');

        expandableCards.forEach(function(card) {
            const toggleBtn = card.querySelector('.service-card-mini__toggle');
            const href = card.dataset.href;

            if (!toggleBtn) return;

            // Click on toggle button
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const isExpanded = card.classList.contains('service-card-mini--expanded');

                if (isExpanded) {
                    // Second click - navigate to page
                    if (href) {
                        window.location.href = href;
                    }
                } else {
                    // First click - expand card
                    card.classList.add('service-card-mini--expanded');
                    toggleBtn.setAttribute('aria-expanded', 'true');

                    // Update button text
                    toggleBtn.querySelector('.toggle-text').textContent = 'Zur Seite';

                    // Show hidden elements
                    const fullDesc = card.querySelector('.service-card-mini__description--full');
                    const features = card.querySelector('.service-card-mini__features');
                    if (fullDesc) fullDesc.removeAttribute('hidden');
                    if (features) features.removeAttribute('hidden');
                }
            });

            // Click anywhere on card also triggers toggle
            card.addEventListener('click', function(e) {
                // Don't trigger if clicking on toggle button
                if (e.target === toggleBtn || toggleBtn.contains(e.target)) return;
                toggleBtn.click();
            });
        });
    }

})();
