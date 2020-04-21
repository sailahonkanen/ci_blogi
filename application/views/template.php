<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../../favicon.ico">

        <title>Blogi</title>

        <link <?php print 'href=' . base_url() . 'css/bootstrap.css' ?> rel="stylesheet">

        <script src="https://kit.fontawesome.com/f4c2c95da9.js" crossorigin="anonymous"></script>


        <!-- Custom styles for this template -->
        <link <?php print 'href=' . base_url() . 'css/ci_blogi.css' ?> rel="stylesheet">
    </head>

    <body>

        <?php
        $id = $this->session->userdata('id');
        ?>


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php print(site_url()); ?>">Blogi</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php print(site_url()); ?>">Etusivulle
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php if (isset($this->session->userdata['id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php print(site_url()); ?>kirjoitus/lisaa">Lisää kirjoitus</a>
                            </li>
                        <?php } ?>
                        <?php if (isset($this->session->userdata['id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php print(site_url()); ?>kayttaja/kayttaja_logout">Kirjaudu ulos</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php print(site_url()); ?>kayttaja/login_view">Kirjaudu</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">


            <?php
            $this->load->view($main_content);
            ?>

        </div>


        <!-- Footer -->
        <footer class="p-3 bg-primary">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Saila Honkanen 2019</p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>