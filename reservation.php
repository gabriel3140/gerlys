<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girly's Catering Company</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">

    <link rel="stylesheet" href="/bootstrap-5.3.3-dist/css/bootstrap.css">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    <div class="header">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">

                    <div class="login-menu">

                        <a href="login.php"><i class='bx bxs-user-circle'></i>Login</a>
            
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="logo">

                        <div class="image-container">
            
                            <img src="image/GerlysLogo.png" alt="">
            
                        </div>
            
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="navbars">

        <div class="menu">

            <ul>
                <li><a href="index.php" style="text-decoration: none;">Home</a></li>
                <li><a href="sample-menu.php" style="text-decoration: none;">Sample Menu</a></li>
                <li><a href="services.php" style="text-decoration: none;">Services</a></li>
                <li><a href="reservation.php" style="text-decoration: none;">Reservation</a></li>
                <li><a href="contact.php" style="text-decoration: none;">Contact</a></li>
            </ul>

        </div>

    </div>

    <section class="reservation-section">

        <div class="reservation-title-container">

            <div class="reservation-title">

                <h3>Request a reservation</h3>
                <p>Select your details and we’ll try get the best seats for you</p>
    
            </div>

        </div>

        <div class="reservation-inputs">

            <div class="reservation-container">

                <div class="guest-input">

                    <h6>Guest Size</h6>

                    <div class="dropdown">
                        <select id="party-size-select">
                            <option>Select Guest Size</option>
                            <option value="1-10">1-10 guests</option>
                            <option value="11-50">11-50 guests</option>
                            <option value="51-100">51-100 guests</option>
                            <option value="100+">100+ guests</option>
                        </select>
                    </div>

                </div>

                <div class="date-input">

                    <h6>Date</h6>

                    <input type="date" name="" id="">

                </div>

                <div class="time-input">

                    <h6>Time</h6>

                    <input type="time" name="" id="">

                </div>

                <div class="service-input">

                    <h6>Services</h6>

                    <div class="dropdown">
                        <select id="service-select">
                            <option>Select Service</option>
                            <option value="weddings">Weddings</option>
                            <option value="corporate">Corporate Events</option>
                            <option value="social">Social Events</option>
                        </select>
                    </div>

                </div>

            </div>

        </div>

        <div class="calendar-books">

            <div class="display-booked">

                <h3>Occupied Date:</h3>

                <div class="card-container my-4">

                    <div class="occupied-box">
                        <h5>08/25/24 | 12:00PM</h5>
                    </div>

                </div>

            </div>
            
        </div>

    </section>

    <footer>

        <div class="footer-container">

            <div class="follow-us-icon">

                <h4>Follow Us:</h4>

                <ul>
                    <li><a href=""><i class='bx bxl-facebook-circle' ></i></a></li>
                    <li><a href=""><i class='bx bxl-instagram-alt' ></i></a></li>
                </ul>

            </div>

            <div class="copyright">

                <p class="copyright">Copyright &copy; 2024 . All rights Girly's Catering Company reserved.</p>

            </div>

        </div>
        
    </footer>

</body>

<script src="/js/script.js"></script>
<script src="/bootstrap-4.5.3-dist/js/bootstrap.js"></script>
<script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</html>