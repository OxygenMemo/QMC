
        <div class="container">
                <ul id="gn-menu" class="gn-menu-main">
                    <li class="gn-trigger">
                        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                        <nav class="gn-menu-wrapper">
                            <div class="gn-scroller">
                                <ul class="gn-menu">
                                    <li class="gn-search-item">
                                        <form action="<?= base_url() ?>index.php/page_admin/search" method='post'>
                                            <input name="search" placeholder="Search" class="gn-search" type="search">
                                            <a class="gn-icon gn-icon-search"><span>Search</span></a>
                                            <button style=" visibility: hidden;" type="submit" name="submit" value="ok"></button>
                                        </form>
                                    </li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/profile" class="gn-icon gn-icon-download">Profile</a></li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/dashboard" class="gn-icon gn-icon-archive">DashBoard</a></li>	
                                    <li><a href="<?= base_url() ?>index.php/page_admin/quote" class="gn-icon gn-icon-archive">Quote</a></li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/workorder" class="gn-icon gn-icon-archive">Workorder</a></li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/recive" class="gn-icon gn-icon-archive">Receive - Certificate</a></li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/product" class="gn-icon gn-icon-archive">Product</a></li>
                                    <li><a href="<?= base_url() ?>index.php/page_admin/employee" class="gn-icon gn-icon-archive">Employee</a></li>
                                    <li><a onclick="return confirm('you want to logout ?')" href="<?= base_url() ?>index.php/page_admin/logout" class="gn-icon glyphicon-expand">Logout</a></li>
                                </ul>
                            </div><!-- /gn-scroller -->
                        </nav>
                    </li>
                    <li><a href="<?= base_url() ?>"><img src="<?= base_url() ?>share/img/logo-mc.gif" width="176" height="54" longdesc="http://measurementcalibration.com"></a></li>
                    <li><ul class="company-social">
                                <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                                <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>	</li>
                </ul>
        </div>