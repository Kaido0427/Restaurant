<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Restaurantly Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png" rel="apple-touch-icon') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Restaurantly - v3.9.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success fade-out" role="alert"
            style="z-index: 9999; position: absolute; top: 20px; left: 50%; transform: translateX(-50%);">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger fade-out" role="alert"
            style="z-index: 9999; position: absolute; top: 20px; left: 50%; transform: translateX(-50%);">
            {{ session('error') }}
        </div>
    @endif
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">

            </div>

        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="/">Mon Restaurant</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                    @auth
                        <li><a href="{{ route('home') }}">Tableau de bord</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <!-- Formulaire de déconnexion -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a href="#menu" class="book-a-table-btn scrollto d-none d-lg-flex">Menu</a>

            <div class="dropdown">
                <button class="btn btn-special-color dropdown-toggle" type="button" id="cartDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart3" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                    <span id="cart-count" class="badge bg-secondary">0</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="cartDropdown"
                    style="min-width: 300px;">
                    <div id="cart-content" class="mb-3"></div>
                    <div id="cart-total" class="d-flex justify-content-between fw-bold mb-3"></div>
                    <button id="save-commande" class="btn btn-special-color">Passer ma commande</button>
                    {{--  <div id="kkiapay-container"></div> --}}
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Bienvenu chez <span>Restaurantly</span></h1>
                    {{--  <h2>Delivering great food for more than 18 years!</h2> --}}

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Notre Menu</a>
                        <a href="#" class="btn-menu animated fadeInUp scrollto" data-bs-toggle="modal"
                            data-bs-target="#orderDetailsModal">Recuperer Ma commande</a>
                    </div>
                </div>


            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="assets/img/about.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</li>
                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit.</li>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Check Our Tasty Menu</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <div>
                                <!-- Ajout du champ de filtrage par prix -->
                                <input type="number" id="price-filter" placeholder="Entrez votre budget"
                                    class="form-control" style="width: 250px; margin-left: 10px;" />

                                <button id="filter-btn" class="btn btn-submit"
                                    style="margin-left: 10px; background-color: #cda45e;">Filtrer</button>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($menus as $menu)
                        <div class="col-lg-6 menu-item filter-starters">
                            <!-- Image du menu -->
                            <img src="{{ $menu->image }}" class="menu-img" alt="{{ $menu->nom }}">
                            <div class="menu-content">
                                <a href="#">{{ $menu->nom }}</a>
                                <span>XOF {{ $menu->prix }}</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $menu->description }}
                            </div>
                            <!-- Conteneur pour le bouton -->
                            <div class="btn-container">
                                <!-- Bouton pour ajouter au panier -->
                                <button class="btn btn-cart" data-id="{{ $menu->id }}"
                                    data-nom="{{ $menu->nom }}" data-prix="{{ $menu->prix }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Menu Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="open-hours">
                                <i class="bi bi-clock"></i>
                                <h4>Open Hours:</h4>
                                <p>
                                    Monday-Saturday:<br>
                                    11:00 AM - 2300 PM
                                </p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Restaurantly</h3>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Modal Structure -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Important</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <!-- Kkiapay payment button will be injected here -->
                    <div id="kkiapay-container"></div>
                    <button type="button" id="cancelOrder" class="btn btn-secondary"
                        data-bs-dismiss="modal">Annuler la commande</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Vérification de commande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="loader" style="display:none;">Chargement...</div>
                    <div class="form-group">
                        <label for="client-id-input">Entrez le code client</label>
                        <input type="text" class="form-control" id="client-id-input" placeholder="Client ID">
                    </div>
                    <button type="button" class="btn btn-primary mt-3" id="verify-code-button">Vérifier</button>
                    <div id="order-details" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal HTML -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Include Bootstrap JS -->

    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.kkiapay.me/k.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Script chargé.');

            // Initialiser le panier comme un tableau vide s'il n'existe pas déjà
            let panier = JSON.parse(localStorage.getItem('panier')) || [];
            let commandeId = null; // Initialiser l'ID de la commande à null

            function ajouterAuPanier(id, nom, prix) {
                let article = panier.find(item => item.id === id);
                if (article) {
                    article.quantite += 1;
                } else {
                    panier.push({
                        id,
                        nom,
                        prix,
                        quantite: 1
                    });
                }
                localStorage.setItem('panier', JSON.stringify(panier));
                afficherPanier();
                prepareKkiapayWidget();
            }

            function afficherPanier() {
                let panierHTML = '';
                let total = 0;
                let totalItems = 0;

                panier.forEach(item => {
                    total += item.prix * item.quantite;
                    totalItems += item.quantite;
                    panierHTML += `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <span class="fw-bold">${item.nom}</span>
                        <span class="text-muted ms-2">x${item.quantite}</span>
                    </div>
                    <div>
                        <span class="me-2">XOF ${(item.prix * item.quantite)}</span>
                        <button class="btn btn-sm btn-outline-danger btn-remove" data-id="${item.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>
                    </div>
                    <hr>
                </div>
            `;
                });

                document.querySelector('#cart-content').innerHTML = panierHTML || '<p>Votre panier est vide.</p>';
                document.querySelector('#cart-total').innerHTML = `
            <span>Total:</span>
            <span>XOF ${total}</span>
        `;
                document.querySelector('#cart-count').textContent = totalItems;

                toggleCommandeButton(totalItems > 0);
            }

            function toggleCommandeButton(isVisible) {
                const commandeButton = document.getElementById('save-commande');
                if (isVisible) {
                    commandeButton.style.display = 'block';
                } else {
                    commandeButton.style.display = 'none';
                }
            }

            function prepareKkiapayWidget() {
                const kkiapayContainer = document.getElementById('kkiapay-container');
                const totalAmount = panier.reduce((total, item) => total + (item.prix * item.quantite), 0);

                if (totalAmount > 0) {
                    kkiapayContainer.innerHTML = '';
                    const widget = document.createElement('kkiapay-widget');
                    widget.setAttribute('amount', totalAmount);
                    widget.setAttribute('key', 'b7b8a6c0652211efbf02478c5adba4b8');
                    widget.setAttribute('position', 'center');
                    widget.setAttribute('sandbox', 'true');
                    widget.setAttribute('callback', 'http://127.0.0.1:8000/pay/callback');

                    // Utiliser l'ID de la commande s'il est disponible
                    if (commandeId) {
                        widget.setAttribute('order_id', commandeId);
                    }

                    kkiapayContainer.appendChild(widget);
                    kkiapayContainer.style.display = 'block';
                } else {
                    kkiapayContainer.style.display = 'none';
                }
            }

            document.querySelectorAll('.btn-cart').forEach(button => {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let nom = this.getAttribute('data-nom');
                    let prix = parseFloat(this.getAttribute('data-prix'));
                    ajouterAuPanier(id, nom, prix);
                });
            });

            document.querySelector('#cart-content').addEventListener('click', function(event) {
                if (event.target.closest('.btn-remove')) {
                    let id = event.target.closest('.btn-remove').getAttribute('data-id');
                    let index = panier.findIndex(item => item.id == id);
                    if (index !== -1) {
                        if (panier[index].quantite > 1) {
                            panier[index].quantite -= 1;
                        } else {
                            panier.splice(index, 1);
                        }
                        localStorage.setItem('panier', JSON.stringify(panier));
                        afficherPanier();
                        prepareKkiapayWidget();
                    }
                }
            });

            document.querySelector('#save-commande').addEventListener('click', function() {
                console.log('Bouton "Enregistrer la commande" cliqué.');
                this.disabled = true;

                if (panier.length === 0) {
                    alert('Votre panier est vide.');
                    console.log('Panier est vide.');
                    return;
                }

                let commandeData = {
                    panier: panier
                };
                console.log('Données de la commande:', commandeData);

                fetch('/save-commande', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify(commandeData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Données reçues:', data);

                        if (data.status) {
                            localStorage.removeItem('panier');
                            // Mettre à jour l'ID de la commande
                            commandeId = data.commande_id;

                            // Générer le tableau des détails de la commande
                            let tableauCommande = `
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Plat</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>`;
                            data.panier.forEach(item => {
                                let totalItem = item.prix * item.quantite;
                                tableauCommande += `
                        <tr>
                            <td>${item.nom}</td>
                            <td>${item.prix} XOF</td>
                            <td>${item.quantite}</td>
                            <td>${totalItem} XOF</td>
                        </tr>`;
                            });
                            tableauCommande += `
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total de la commande :</strong></td>
                        <td><strong>${data.total_commande} XOF</strong></td>
                    </tr>
                </tbody>
                </table>`;

                            // Mise à jour du contenu du modal
                            const modalBody = document.querySelector('#successModal .modal-body');
                            modalBody.innerHTML = `
                        <p style="color:#000;">Votre commande a été enregistrée avec succès, mais elle n'est pas encore payée. Si vous souhaitez payer plus tard, veuillez retenir le code client suivant :</p>
                        <p><strong style="color:#000;">Client ID: ${data.client_id}</strong></p>
                        ${tableauCommande}
                    `;

                            // Afficher le modal
                            new bootstrap.Modal(document.querySelector('#successModal')).show();

                            // Mettre à jour le widget Kkiapay avec l'ID de la commande
                            prepareKkiapayWidget();
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                    });
            });

            document.querySelector('#cancelOrder').addEventListener('click', function() {
                // Vérifier que l'ID de la commande est défini
                if (!commandeId) {
                    console.error('ID de la commande non défini.');
                    return;
                }

                // Envoyer la requête AJAX pour annuler la commande
                fetch(`/cancel-commande/${commandeId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            status: 'Canceled'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('La commande a été annulée avec succès.');
                            localStorage.removeItem('panier');
                            window.location.href =
                                '/'; // Rediriger ou rafraîchir la page après annulation
                        } else {
                            alert('Une erreur est survenue lors de l\'annulation de la commande.');
                        }
                    })
                    .catch(error => {
                        console.error('Erreur:', error);
                        alert('Une erreur est survenue lors de l\'annulation de la commande.');
                    });
            });

            afficherPanier();
            prepareKkiapayWidget();
        });
    </script>
    <script>
        window.addEventListener('load', () => {
            let menuContainer = document.querySelector('.menu-container');
            if (menuContainer) {
                let menuIsotope = new Isotope(menuContainer, {
                    itemSelector: '.menu-item',
                    layoutMode: 'fitRows'
                });

                let menuFilters = document.querySelectorAll('#menu-flters li');

                menuFilters.forEach(filter => {
                    filter.addEventListener('click', function(e) {
                        e.preventDefault();
                        menuFilters.forEach(el => el.classList.remove('filter-active'));
                        this.classList.add('filter-active');

                        menuIsotope.arrange({
                            filter: this.getAttribute('data-filter')
                        });
                        menuIsotope.on('arrangeComplete', function() {
                            AOS.refresh();
                        });
                    });
                });

                function filterByPrice() {
                    let maxPrice = parseFloat(document.getElementById('price-filter').value);
                    if (!isNaN(maxPrice)) {
                        menuIsotope.arrange({
                            filter: function(itemElem) {
                                // Utiliser un regex pour extraire le prix en tant que nombre
                                let priceText = itemElem.querySelector('.menu-content span')
                                    .textContent;
                                let price = parseFloat(priceText.replace(/[^\d.-]/g, ''));
                                return price <= maxPrice;
                            }
                        });
                        menuIsotope.on('arrangeComplete', function() {
                            AOS.refresh();
                        });
                    }
                }

                document.getElementById('price-filter').addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        filterByPrice();
                    }
                });

                document.getElementById('filter-btn').addEventListener('click', function() {
                    filterByPrice();
                });
            }
        });
    </script>
    <script>
        document.querySelector('#verify-code-button').addEventListener('click', function() {
            let clientId = document.querySelector('#client-id-input').value;

            console.log('Client ID:', clientId); // Debugging log

            if (!clientId) {
                alert('Veuillez entrer un code valide.');
                return;
            }

            // Disable the button and show a loader
            this.disabled = true;
            document.querySelector('#loader').style.display = 'block';

            // Send a GET request to retrieve the order details
            fetch(`/get-order-details?client_id=${clientId}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Order details:', data); // Debugging log for order details

                    // Hide loader
                    document.querySelector('#loader').style.display = 'none';
                    this.disabled = false;

                    const modalBody = document.querySelector('#orderDetailsModal .modal-body');
                    if (data.status) {
                        if (data.panier) {
                            // Si la commande est "pending" ou "canceled", afficher les détails de la commande
                            let tableauCommande = `
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Plat</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                            data.panier.forEach(item => {
                                let totalItem = item.prix * item.quantite;
                                tableauCommande += `
                                <tr>
                                    <td>${item.nom}</td>
                                    <td>${item.prix} XOF</td>
                                    <td>${item.quantite}</td>
                                    <td>${totalItem} XOF</td>
                                </tr>`;
                            });

                            tableauCommande += `
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total :</strong></td>
                                <td><strong>${data.total_commande} XOF</strong></td>
                            </tr>
                            </tbody>
                            </table>`;

                            // Update the modal body with the order details and the Kkiapay widget
                            modalBody.innerHTML = `
                            ${tableauCommande}
                            <kkiapay-widget 
                                amount="${data.total_commande}" 
                                key="b7b8a6c0652211efbf02478c5adba4b8"
                                position="center" 
                                sandbox="true" 
                                callback="http://127.0.0.1:8000/pay/callback">
                            </kkiapay-widget>`;

                            console.log('Kkiapay widget initialized with amount:', data
                                .total_commande); // Debugging log for Kkiapay
                        } else {
                            // Si la commande est déjà payée, afficher uniquement le QR code et un message
                            modalBody.innerHTML = `
                            <div class="alert alert-success" role="alert">
                                ${data.message}
                            </div>
                            <img src="${data.qr_code}" alt="QR Code" class="img-fluid" />
                            `;

                            console.log('QR Code displayed:', data.qr_code); // Debugging log for QR code
                        }

                        // Show the modal
                        const orderDetailsModal = new bootstrap.Modal(document.querySelector(
                            '#orderDetailsModal'));
                        orderDetailsModal.show();
                    } else {
                        // Afficher le message d'erreur dans le modal
                        modalBody.innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            ${data.message}
                        </div>`;
                        console.log('Error:', data.message); // Debugging log for error
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error); // Debugging log for request error
                });
        });

        // Load Kkiapay script dynamically if not already loaded
        if (!document.querySelector('script[src="https://cdn.kkiapay.me/k.js"]')) {
            const kkiapayScript = document.createElement('script');
            kkiapayScript.setAttribute('src', 'https://cdn.kkiapay.me/k.js');
            document.body.appendChild(kkiapayScript);

            console.log('Kkiapay script loaded'); // Debugging log for script load
        }
    </script>
    <style>
        /* Style pour faire disparaître progressivement l'alerte */
        .fade-out {
            transition: opacity 0.5s ease-in-out;
            opacity: 1;
        }

        .fade-out.hidden {
            opacity: 0;
        }
    </style>

    <script>
        // Fonction pour faire disparaître l'alerte après 3 secondes
        document.addEventListener('DOMContentLoaded', function() {
            let alertElement = document.querySelector('.alert');
            if (alertElement) {
                setTimeout(function() {
                    alertElement.classList.add('hidden'); // Réduit l'opacité
                }, 3000); // 3 secondes avant de commencer la disparition

                // Supprime l'alerte du DOM après la transition d'opacité
                setTimeout(function() {
                    alertElement.remove();
                }, 3500); // 3.5 secondes pour laisser le temps à la transition de finir
            }
        });
    </script>
</body>

</html>
