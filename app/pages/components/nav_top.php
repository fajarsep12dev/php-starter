

<ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                    
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php 
                                        $getUser = $user->getUserById($_SESSION['user_id']);
                                        foreach ($getUser as $data) {
                                    ?>
                                            <span class=""><?php echo $data['user_fullname']; ?></span>
                                     <?php } ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                      
                                        <p>
                                        <?php 
                                        $getUser = $user->getUserById($_SESSION['user_id']);
                                        foreach ($getUser as $data) {
                                    ?>
                                            <span class=""><?php echo $data['user_fullname']; ?></span>
                                     <?php } ?>
                                           <small> Roles</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                       
                                        <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="../pages/users/page.user.logout.php">Log Out</a>
                                          
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>