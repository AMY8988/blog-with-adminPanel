</head>
<body class="bg-light">

<div class="container sticky-top">
    <div class="row ">
        <div class="col-12 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary my-2 rounded shadow-sm ">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <img src="img/blogger-svgrepo-com.svg" width="50p" class="img-fluid me-2" alt="">
                        <a class="navbar-brand fw-bold" href="<?php echo $url;?>index.php">
                            Blog
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" action="<?php echo $url; ?>fsearch.php" method="post">
                            <input class="form-control me-2" name="search_key" type="search" placeholder="Search" aria-label="Search" required>
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="col-12  mb-4 text-center">
        <?php foreach (showAds() as $ads){ ?>
            <a href="<?php echo $ads['link']; ?>" class="" target="_blank">
                <img src="<?php echo  $ads['photo']; ?>" class=" shadow-sm" alt="">
            </a>
        <?php }; ?>
    </div>
</div>



