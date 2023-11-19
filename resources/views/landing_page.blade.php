<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('tamplate/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        /* Custom styles for transparent navbar */
        .navbar-custom {
            background-color: transparent !important;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: #fff;
        }

        .bi {
            font-size: 4rem;
            /* Adjust the size as needed */
        }

        .social-links .bi {
            font-size: 1.5rem
        }

        .kaki {
            background-color: #237699;
            color: #fff
        }

        .wavebt {
            margin-bottom: -50px;
        }

        .wavetp {
            margin-top: -250px
        }
    </style>
    <title>Kepegawaian</title>
</head>

<body>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">thisStaff</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wavetp">
            <path fill="#00B1FD" fill-opacity="1"
                d="M0,320L40,298.7C80,277,160,235,240,229.3C320,224,400,256,480,250.7C560,245,640,203,720,197.3C800,192,880,224,960,240C1040,256,1120,256,1200,256C1280,256,1360,256,1400,256L1440,256L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
        </svg> --}}

    </div>


    <!-- Content goes here -->
    <section id="hero" class="" style="background-color: #00B1FD">

        <div class="container pt-5">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1 class="text-white">Administrasi Kepegawaian <span>SMK Negeri 1 Cimahi</span></h1>
                        <h2 class="text-white">Supported by Rekayasa Perangkat Lunak SMK Negeri 1 Cimahi</h2>
                        <div class="text-center text-lg-start">
                            <a href="/login" class="btn btn-outline-light">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('images/Icon_login_landing.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="8" fill="#fff">
            </g>
        </svg>

    </section>

    <div class="container mt-5">
        <div class="d-flex text-center justify-content-center">
            <div class="m-3">
                <div class="card">
                    <div class="bi bi-person"></div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor </p>
                    </div>
                </div>
            </div>
            <div class="m-3">
                <div class="card">
                    <div class="bi bi-person"></div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor </p>
                    </div>
                </div>
            </div>
            <div class="m-3">
                <div class="card">
                    <div class="bi bi-person"></div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sm text-center">
            <h4 class="align-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam beatae dolorem eaque
                reprehenderit! Doloremque, iste.</h4>
        </div>
    </div>
    <br><br>
    <div class="container mt-5">
        <div class="d-flex">
            <div class="w-50 m-2">
                <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="4500">
                            <img src="{{ asset('images/wallhaven-k915x1.jpg') }}" class="d-block w-100"
                                alt="{{ asset('images/wallhaven-k915x1.jpg') }}" loading="lazy">
                        </div>
                        <div class="carousel-item" data-bs-interval="4500">
                            <img src="{{ asset('images/wallhaven-k915x1.jpg') }}" class="d-block w-100"
                                alt="{{ asset('images/wallhaven-k915x1.jpg') }}" loading="lazy">
                        </div>
                        <div class="carousel-item" data-bs-interval="4500">
                            <img src="{{ asset('images/wallhaven-k915x1.jpg') }}" class="d-block w-100"
                                alt="{{ asset('images/wallhaven-k915x1.jpg') }}" loading="lazy">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>


            <div class="w-50 m-4">
                <div class="container">
                    <h1>whats up!</h1>
                    <div class="row">
                        <div class="col text-auto">
                            <p class="text-justify" style="column-width: 400px">Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Sit nemo
                                quisquam fuga. Voluptatem similique sint deserunt quo quia? Sit recusandae amet sunt
                                nostrum vel illum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
                                officiis ipsa odit aliquid repellat ea sunt ut iure impedit placeat repudiandae rem nam
                                quae quasi, laboriosam ex repellendus pariatur consectetur unde eum in numquam. Amet
                                voluptate earum blanditiis sunt temporibus, repellat commodi quibusdam! At, corporis?
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br><br>





    <footer id="footer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wavebt">
            <path fill="#237699" fill-opacity="1"
                d="M0,160L80,165.3C160,171,320,181,480,165.3C640,149,800,107,960,106.7C1120,107,1280,149,1360,170.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
        <div class="kaki pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3>KEPEGAWAIAN SMK NEGERI 1 CIMAHI</h3>
                            <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam
                                    excepturi quod.</em></p>
                            <div class="social-links mt-3">
                                <a href="#" class="btn m-1"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="btn m-1"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="btn m-1"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="btn m-1"><i class="bi bi-github"></i></a>
                                <a href="#" class="btn m-1"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <div class="col-md-12 text-center">
                        <div class="container">
                            <div class="copyright">
                                &copy; Copyright <strong><span>RPL.STMNPBDG</span></strong>. All Rights Reserved
                            </div>
                            Created by <a href="https://github.com/Dzakkk" class="btn">Dzakkk & Byouu</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </footer><!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
