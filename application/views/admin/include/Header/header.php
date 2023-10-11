<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <?php

                            $user_id = $_SESSION['user_id']; 
                            
                            $this->db->select('site_logo');
                            $this->db->where('id', $user_id);
                            $query = $this->db->get('profile');
                            
                            if ($query->num_rows() > 0) {
                                $row = $query->row();
                                $site_logo = $row->site_logo;
                            } else {
                              
                                $site_logo =NULL; 
                            }
                            ?>
                        <a href="<?= base_url('/admin/dashboard');?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img class="img-fluid" src="<?=base_url($site_logo);?>" alt="" height="22" width="50px">
                            </span>
                             <span class="logo-lg">
                                <img src="<?=base_url($site_logo);?>" alt="" height="50px"  width="100%">
                            </span>
                        </a>




                        <a href="<?= base_url('/admin/dashboard');?>"class="logo logo-light">
                            <span class="logo-sm">
                                <img class="img-fluid" src="<?=base_url($site_logo);?>" alt="" height="22" width="50px">
                            </span>
                            <span class="logo-lg">
                                <img src="<?=base_url($site_logo);?>" alt="" height="50px"  width="100%">
                            </span>
                        </a>
                        
                        
                        
                        
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block ms-2">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input form-control" placeholder="Search">
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex">





                    <div class="dropdown d-none d-md-block me-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="font-size-16">
                                <?php 
                                
                                if(isset($_SESSION['username'])){
                                    echo $_SESSION['username'];
                                }
                                
                                ?>
                            </span>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php

                            $user_id = $_SESSION['user_id']; 
                            
                            $this->db->select('image');
                            $this->db->where('id', $user_id);
                            $query = $this->db->get('profile');
                            
                            if ($query->num_rows() > 0) {
                                $row = $query->row();
                                $profile_image = $row->image;
                            } else {
                              
                                $profile_image ="assets/images/users/avatar-1.jpg"; 
                            }
                            ?>
                            <img class="rounded-circle header-profile-user" src="<?=base_url($profile_image);?>" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item text-danger" href="<?=base_url('admin/logout');?>">Logout</a>


                        </div>
                    </div>

                    <div class="dropdown d-inline-block me-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-md-notifications"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notification (3) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                <i class="mdi mdi-message-text-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-info rounded-circle font-size-16">
                                                <i class="mdi mdi-glass-cocktail"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It is a long established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="p-2 border-top">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-link font-size-14  text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>