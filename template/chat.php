<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: sign_in.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template">
  <meta name="keywords"
    content="admin template, AdminX admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="Arteam">
  <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/x-icon">

  <title>AdminX - Premium Admin Template</title>

  <!--font-awesome-css-->
  <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- tabler icons-->
  <link rel="stylesheet" type="text/css" href="../assets/vendor/tabler-icons/tabler-icons.css">

  <!--flag Icon css-->
  <link rel="stylesheet" type="text/css" href="../assets/vendor/flag-icons-master/flag-icon.css">

  <!--animation-css-->
  <link rel="stylesheet" href="../assets/vendor/animation/animate.min.css">

  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/bootstrap.min.css">

  <!-- simplebar css-->
  <link rel="stylesheet" type="text/css" href="../assets/vendor/simplebar/simplebar.css">

  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

  <!-- App chatbot css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/style-chatbot.css">

  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

</head>

<body>
  <div class="app-wrapper">

    <div class="loader-wrapper">
      <div class="app-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

 <!-- Menu Navigation starts -->
    <nav class="dark-sidebar">
      <div class="app-logo">
        <div class="logo d-inline-block" href="index.html">
          <img src="../assets/images/logo/Logo IA.png" alt="#" class="dark-logo">
        </div>

        <span class="bg-light-primary toggle-semi-nav">
          <i class="ti ti-chevrons-right f-s-20"></i>
        </span>
      </div>
      <div class="app-nav" id="app-simple-bar">
        <ul class="main-nav p-0 mt-2">
          
          <li>
            <a class="" data-bs-toggle="collapse" href="#apps" aria-expanded="false">
              <i class="ti ti-server"></i>
              Apps
            </a>
            <ul class="collapse" id="apps">
              <li><a href="chat.php">Chat</a></li>
        </ul>
      </div>

      <div class="menu-navs">
        <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
        <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
      </div>

    </nav>
    <!-- Menu Navigation ends -->

    <div class="app-content">
      <div class="">
        <!-- Header Section starts -->
        <header class="header-main">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6 d-flex align-items-center header-left">
                        <span class="header-toggle me-3">
                          <i class="ti ti-category"></i>
                        </span>

                        <div class="header-searchbar">
                          <form class="me-3 app-form app-icon-form " action="#">
                            <div class="position-relative">
                              <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                              <i class="ti ti-search text-dark"></i>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="col-6 d-flex align-items-center justify-content-end header-right">
                        <ul class="d-flex align-items-center">
                          <li class="header-search">
                            <a href="#" class="d-block head-icon" role=button data-bs-toggle="offcanvas"
                              data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                              <i class="ti ti-search"></i>
                            </a>

                            <div class="offcanvas offcanvas-top search-canvas" tabindex="-1" id="offcanvasTop">
                              <div class="offcanvas-body">
                                <div class="d-flex align-items-center">
                                  <div class="flex-grow-1">
                                    <form class="me-3 app-form app-icon-form " action="#">
                                      <div class="position-relative">
                                        <input type="search" class="form-control" placeholder="Search..."
                                          aria-label="Search">
                                        <i class="ti ti-search f-s-15"></i>
                                      </div>
                                    </form>
                                  </div>
                                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="header-language">
                            <div id="lang_selector" class="flex-shrink-0 dropdown">
                              <a href="#" class="d-block head-icon ps-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="lang-flag lang-en ">
                                  <span class="flag rounded-circle overflow-hidden">
                                    <i class="flag-icon flag-icon-usa flag-icon-squared b-r-50 f-s-22"></i>
                                  </span>
                                </div>
                              </a>
                            </div>

                          </li>
                          <li class="header-apps">
                            <div class="flex-shrink-0 app-dropdown">
                              <a href="#" class="d-block head-icon" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="ti ti-apps"></i>
                              </a>
                            </div>
                          </li>
                          <li class="header-cart d-none d-sm-block">
                            <div class="flex-shrink-0 app-dropdown">
                              <a href="#" class="d-block head-icon position-relative" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="ti ti-shopping-cart"></i>
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger badge-notification"></span>
                              </a>
                            </div>
                          </li>
                          <li class="header-dark head-icon">
                            <div class="sun-logo">
                              <i class="ti ti-moon-off"></i>
                            </div>
                            <div class="moon-logo">
                              <i class="ti ti-moon-filled"></i>
                            </div>
                          </li>
                          <li class="header-notification">
                            <div class="flex-shrink-0 app-dropdown">
                              <a href="#" class="d-block head-icon position-relative" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="ti ti-bell"></i>
                                <span class="position-absolute translate-middle p-1 bg-success border border-light rounded-circle animate__animated animate__fadeIn animate__infinite animate__slower"></span>
                              </a>
                            </div>
                          </li>
                          <li class="header-profile">
                            <div class="flex-shrink-0 dropdown">
                              <a href="#" class="d-block head-icon pe-0" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="../src/imagenes/user.png" alt="mdo" class="rounded-circle h-35 w-35">
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end header-card border-0 px-2">
                                <li class="dropdown-item d-flex align-items-center p-2">
                                  <span class="h-35 w-35 d-flex-center b-r-50 position-relative">
                                    <img src="../src/imagenes/user.png" alt="" class="img-fluid b-r-50">
                                    <span
                                      class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle animate__animated animate__fadeIn animate__infinite animate__fast"></span>
                                  </span>
                                  
                                </li>
                                <li class="app-divider-v dotted my-1"></li>
                                <li class="btn-light-danger b-r-5">
                                  <a class="dropdown-item mb-0 text-danger" href="#" id="logoutButton">
                                    <i class="ti ti-logout pe-1 f-s-18 text-danger"></i> Log Out
                                  </a>
                                </li>

                              </ul>
                            </div>

                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- Header Section ends -->

        <!-- Body main section starts -->
        <main>
          <div class="container-fluid">
            <!-- Chat start -->
            <div class="row">
              <div class="col-sm-6">
                <h4 class="main-title">Chat</h4>
              </div>
              <div class="col-sm-6 mt-sm-2">
                <ul class="breadcrumb breadcrumb-start float-sm-end">
                  <li class="d-flex">
                    <i class="ti ti-server f-s-16"></i>
                    <a href="#" class="f-s-14"> <span class="d-none d-md-block">Apps</span></a>
                  </li>
                  <li class="d-flex active">
                    <a href="#" class="f-s-14">Chat</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Chat end -->
            <div class="row chat-container-box position-relative">
              <div class="col-lg-4 col-xxl-3 box-col-5">
                <div class="chat-div">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex align-items-center">
                        <div class="chat-header">

                          <div class="d-flex align-items-center">
                            <span class="chatdp h-45 w-45 d-flex-center b-r-50 position-relative">
                              <img id="current-chat-image" src="../assets/images/profile/11.jpg" alt="Chat Profile" class="img-fluid b-r-50">
                              <span class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                            </span>
                            <div class="flex-grow-1 ps-2">
                              <div id="current-chat-name" class="fs-6"></div>
                            </div>
                            <div>
                              <div class="btn-group dropdown-icon-none">
                                <i class="ti ti-settings fs-5">
                                </i>
                              </div>
                            </div>
                            <div class="close-togglebtn">
                              <a class="ms-2 close-toggle" role="button"><i class="ti ti-align-justified fs-5"></i></a>
                            </div>
                          </div>
                          <!-- <img id="current-chat-image" src="../src/imagenes/error.png" alt="Chat Profile">
                          <h2 id="current-chat-name"></h2> -->
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chat-tab-wrapper">
                        <ul class="tabs chat-tabs">
                          <li class="tab-link active" data-tab="1">Chat</li>
                        </ul>
                      </div>
                      <div class="content-wrapper">

                        <!-- tab 1 -->

                        <div id="tab-1" class="tabs-content active">
                          <div class="tab-wrapper">
                            <div class="mt-3">
                              <ul class="nav nav-tabs app-tabs-dark border-0 justify-content-between" id="Basic"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="private-tab" data-bs-toggle="tab"
                                    data-bs-target="#private-tab-pane" type="button" role="tab"
                                    aria-controls="private-tab-pane" aria-selected="false"
                                    tabindex="-1">Private</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="BasicContent">
                                <!-- Private Caht -->
                                <div class="tab-pane fade show active" id="private-tab-pane" role="tabpanel"
                                  aria-labelledby="private-tab" tabindex="0">
                                  <div class="chat-contact">
                                    <div class="chat-list">
                                      <!-- Las categorías de chat se cargarán aquí -->
                                    </div>
                                  </div>
                                </div>
                                <div class="float-end">
                                  <div class="btn-group dropup  dropdown-icon-none">
                                    <button class="btn btn-primary icon-btn b-r-22 dropdown-toggle active" type="button"
                                      data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                      <i class="ti ti-plus"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-xxl-9 box-col-7">
                <div class="card">
                  <div class="card-header">
                    <div class="chat-header d-flex align-items-center">
                      <div class="d-lg-none">
                        <a class="me-3 toggle-btn" role="button"><i class="ti ti-align-justified"></i></a>
                      </div>
                      <span class="profileimg h-50 w-50 d-flex-center b-r-50 position-relative">
                        <img id="current-chat-image" src="../assets/images/profile/11.jpg" alt="Chat Profile" class="img-fluid b-r-50">
                        <span
                          class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                      </span>
                      <div class="flex-grow-1 ps-2 pe-2">
                        <div class="chat-text-ellipsis text-muted f-s-12 text-success">Online</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chat-container" id="chat-container">
                      <!-- <div id="chat-messages" class="chat-messages">
                        Se indexaran las conbersaciones dinamicamente
                      </div> -->
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="chat-footer d-flex">
                      <div class="flex-grow-1">
                        <form id="chatbot-form">
                          <div class="input-group">
                            <span class="input-group-text ms-2 me-2 b-r-10 ">
                              <a class="d-flex-center text-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Emoji" role="button">
                                <i class="ti ti-mood-smile f-s-18"></i>
                              </a>
                            </span>
                            <input type="text" id="message-input" name="consulta" class="form-control b-r-6" placeholder="Type a message" required>
                            <button class="btn btn-sm btn-primary ms-2 me-2 b-r-4" id="send-button" type="submit"><i class="ti ti-send"></i> <span>Send</span></button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- Body main section ends -->

        <!-- tap on top -->
        <div class="go-top">
          <span class="progress-value">
            <i class="ti ti-arrow-up"></i>
          </span>
        </div>

        <!-- Footer Section starts-->
        <footer>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-9 col-12">
                <ul class="footer-text">
                  <li>
                    <p class="mb-0">Copyright © 2024 AdminX. All rights reserved.</p>
                  </li>
                  <li> <a href="#"> V1.0.0 </a></li>
                </ul>
              </div>
              <div class="col-sm-3">
                <ul class="footer-text text-end">
                  <li> <a href="document.html"> Need Help <i class="ti ti-help"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
        <!-- Footer Section ends-->

      </div>
    </div>
  </div>
  <!-- essential   -->

  <!--customizer-->
  <div id="customizer"></div>

  <!-- latest jquery-->
  <script src="../assets/js/jquery-3.6.3.min.js"></script>
  <script src="../prue.js"></script>

  <!-- Simple bar js-->
  <script src="../assets/vendor/simplebar/simplebar.js"></script>

  <!-- Bootstrap js-->
  <script src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>

  <!-- js -->
  <script src="../assets/js/animation.js"></script>
  <script src="../assets/js/chat.js"></script>
  <!-- Bootstrap js-->
  <script src="../assets/js/logout.js"></script>


  <!-- App js-->
  <script src="../assets/js/script.js"></script>



  <!-- Customizer js-->
  <script src="../assets/js/customizer.js"></script>



</body>

</html>