<?php
	session_start();
	if (!$_SESSION['isLogin']) {
		header('location: ../index.php');
	}
	else{
		include 'config/connection.php';
		$username = $_SESSION['username'];
		$data = mysqli_query($connection, "SELECT * from user where username = '$username' limit 1 ");
		$biodata = mysqli_fetch_array($data);

	}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>NUR ISLAMI FITRA</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
    <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="container box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="banner_content">
                    <div class="media">
                        <div class="d-flex">
                            <img src="../asset/img/<?= $biodata['foto'] ?>" alt="" >
                        </div>
                        <div class="media-body">
                            <div class="personal_text">
                                <h6>Halo Semua, Saya</h6>
                                <h3><?= $biodata['nama']?></h3>
                                <h4>Seorang <?= $biodata['status'] ?></h4>
                                <p><?= $biodata['deskripsi_diri'] ?></p>
                                <ul class="list basic_info">
                                    <li><a href="#"><i class="lnr lnr-calendar-full"></i> <?= $biodata['tanggal_lahir'] ?></a></li>
                                    <li><a href="#"><i class="lnr lnr-phone-handset"></i> <?= $biodata['no_telp'] ?></a></li>
                                    <li><a href="#"><i class="lnr lnr-envelope"></i> <?= $biodata['email'] ?></a></li>
                                    <li><a href="#"><i class="lnr lnr-home"></i> <?= $biodata['alamat'] ?></a></li>
                                </ul>
                                <ul class="list personal_social">
                                    <li><a href="https://facebook.com/profile.php?id=100005172949300"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/nurislamifitra/"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Welcome Area =================-->
    <section class="welcome_area p_120">
        <div class="container">
            <div class="row welcome_inner">
                <div class="col-lg-6">
                    <div class="welcome_text">
                        <h4>About Myself</h4>
                        <p><?= $biodata['deskripsi_diri'] ?></p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-database"></i>
                                    <h4>$2.5M</h4>
                                    <p>Total Donation</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-book"></i>
                                    <h4>1465</h4>
                                    <p>Total Projects</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-users"></i>
                                    <h4>3965</h4>
                                    <p>Total Volunteers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tools_expert">
                        <div class="skill_main">
                        <?php
                                $username = $_SESSION['username'];
                                $skill = mysqli_query($connection, "SELECT * FROM skill where username = '$username' ");
                                while ($skl = mysqli_fetch_array($skill)) {
					        ?>
                            <div class="skill_item">
                                <h4><?= $skl['nama_skill']." " ?> <span class="counter"> <?= $skl['persentase']?> </span> %</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skl['persentase']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Welcome Area =================-->

    <!--================My Tabs Area =================-->
    <section class="mytabs_area p_120">
        <div class="container">
            <div class="tabs_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Experience</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="list">
                            <?php
                                $username = $_SESSION['username'];
                                $pendidikan = mysqli_query($connection, "SELECT * FROM pendidikan where username = '$username' ");
                                while ($pend = mysqli_fetch_array($pendidikan)) {
					        ?>
                            <li>
                                <span></span>
                                <div class="media">
                                    <div class="d-flex">
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pend['thn_masuk'] ?> - <?= $pend['thn_keluar'] ?></p>
                                    </div>
                                    <div class="media-body">
                                        <h4><?= $pend['instansi'] ?></h4>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                                <?php } ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <ul class="list">
                        <?php
                                $username = $_SESSION['username'];
                                $kerja = mysqli_query($connection, "SELECT * FROM kerja where username = '$username' ");
                                while ($pekerjaan = mysqli_fetch_array($kerja)) {
					        ?>
                            <li>
                                <span></span>
                                <div class="media">
                                    <div class="d-flex">
                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pekerjaan['thn_mulai']. " - " . $pekerjaan['thn_keluar'] ?></p>
                                    </div>
                                    <div class="media-body">
                                        <h4> <?= $pekerjaan['nama_pekerjaan'] ?></h4>
                                        <p></p>
                                    </div>
                                </div>
                            </li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End My Tabs Area =================-->

    <!--================Footer Area =================-->
    <footer class="footer_area p_120">
        <div class="container">
            <div class="row footer_inner">
                <div class="col-lg-5 col-sm-6">
                    <aside class="f_widget ab_widget">
                        <div class="f_title">
                            <h3>About Me</h3>
                        </div>
                        <p>Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,</p>
                    </aside>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <aside class="f_widget news_widget">
                        <div class="f_title">
                            <h3>Newsletter</h3>
                        </div>
                        <p>Stay updated with our latest trends</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                    <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-2">
                    <aside class="f_widget social_widget">
                        <div class="f_title">
                            <h3>Download File</h3>
                        </div>
                        <p><a href="#"> Klik Disini</a></p>
                    </aside>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>