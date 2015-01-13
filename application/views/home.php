<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BMS | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <?php
        $this->load->view('include/header-include');
        ?>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=base_url();?>" class="logo">Business Management</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div id="dot-loader-div">
                    <div class="dot-loader dot-loader-1"></div>
                    <div class="dot-loader dot-loader-2"></div>
                    <div class="dot-loader dot-loader-3"></div>
                    <div class="dot-loader dot-loader-4"></div>
                    <div class="dot-loader dot-loader-5"></div>
                    <div class="dot-loader dot-loader-6"></div>
                    <div class="dot-loader dot-loader-7"></div>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Jane Doe <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="<?=assets_url()?>img/avatar.png" class="img-circle" alt="User Image" />
                                <p>Jane Doe - Web Developer</p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="login/lock_app" class="btn btn-default btn-flat">
                                            <i class="fa fa-lock"></i> Lock</a>
                                </div>
                                <div class="pull-right">
                                    <a href="login/logout" class="btn btn-default btn-flat">
                                        <i class="fa fa-sign-out"></i> Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=assets_url()?>img/avatar.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, Jane</p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->

            <?php
            $this->load->view('left-menu');
            ?>
        </section>

    </aside>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content" id="content-holder">
        </section>
        <!-- /.content -->

    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <?php
    $this->load->view('include/footer-include');
    ?>

    </body>
</html>
