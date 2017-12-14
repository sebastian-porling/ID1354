<nav class="navbar navbar-in navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>index">Seminar 1</a>
        </div>
        
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>index#calendar">Calendar</a></li>
                <li><a href="<?php echo base_url(); ?>recipes">Recipes</a></li>
                
            </ul>
            <?php 
        
            if($this->session->userdata('logged_in')){
                echo "<div style='margin-top: 10px;'><p style='float: right;'>Logged in as " . $this->session->userdata('username') . '</p>' .
                    form_open('users/logout/') . '<button type="submit" name="site" value="'. uri_string() .'" class="btn btn-danger" style="float: right;">Logout</button></form></div>';
            }else{
                echo '<div style="margin-top: 10px;"><a href="#" data-toggle="modal" data-target="#login-modal" style="float: right;"><button type="button" class="btn btn-default" style="float: right;">Login</button>  </a>  ';
                
                echo '  <a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default" style="float: right;">Register</button></a></div>';
                
            }
            
        ?>
        </div>
        
    </div>
</nav>
<?php 
echo '<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Register new account</h1><br>'
                                . form_open('users/register') .'
                                    <input type="text" name="username" placeholder="Username" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button id="submit-register" type="submit" class="login loginmodal-submit" name="site" value="' .  uri_string() . '">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>';
echo '<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Login to Your Account</h1><br>'
                                . form_open('users/login') .'
                                    <input type="text" name="username" placeholder="Username" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button id="submit-login" type="submit" class="login loginmodal-submit" name="site" value="' .  uri_string() . '">login</button>
                                </form>
                                <div class="login-help">
                                    <a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default">Register</button></a>
                                </div>
                            </div>
                        </div>
                    </div>';
?>

        <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%);">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('registered_failed')): ?>
        <?php echo '<p class="alert alert-danger" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%);">'.$this->session->flashdata('registered_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%);">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<center><p class="alert alert-success" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%);">'.$this->session->flashdata('user_loggedin').'</p></center>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%);">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>
