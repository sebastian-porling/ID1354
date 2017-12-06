<div class="container-fluid comment-sec">
        <?php 
        
            if($this->session->userdata('logged_in')){
                echo "<p>Logged in as " . $this->session->userdata('username') . '</p>' .
                    form_open('users/logout/') . '<button type="submit" name="site" value="'. uri_string() .'" class="btn btn-danger">Logout</button></form>';
            }else{
                echo '<p>To comment you have to login</p>';
                echo $recipe;
                echo '<a href="#" data-toggle="modal" data-target="#login-modal"><button type="button" class="btn btn-default">Login</button>  </a>';
                echo '<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Login to Your Account</h1><br>'
                                . form_open('users/login/') .'
                                    <input type="text" name="username" placeholder="Username" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" class="login loginmodal-submit" name="site" value="' .  uri_string() . '">login</button>
                                </form>
                                <div class="login-help">
                                    <a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default">Register</button></a>
                                </div>
                            </div>
                        </div>
                    </div>';
                echo '<a href="#" data-toggle="modal" data-target="#register-modal"><button type="button" class="btn btn-default">Register</button></a>';
                echo '<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="loginmodal-container">
                                <h1>Register new account</h1><br>'
                                . form_open('users/register/') .'
                                    <input type="text" name="username" placeholder="Username" required autofocus>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" class="login loginmodal-submit" name="site" value="' .  uri_string() . '">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>';
            }
            
        ?>
        <?php 
        

            foreach($comments as $comment) {
                    echo 
                        '<div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">' . $comment['username'] . '<small><i>    Posted on ' . $comment['time'] . '</i></small></h4>' .
                                '<p>' . $comment['comment'];
                    if($this->session->userdata('username') == $comment['username']){
                        echo "<a style='float: right;' href='".base_url()."comments/delete/" . $comment['id'] . "/" . $comment['recipe'] . "'><button type='button' class='btn btn-danger'>Delete</button></a>";
                    }
                    echo        '</p></div>
                        </div>';   
            }  
        ?>

        <?php
        
        if($this->session->userdata('logged_in')){
            echo form_open('comments/create') . '
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
            <br />
            <button type="submit" class="btn btn-default" name="site" value="' . $recipe->title . '">Submit</button>
        </form>';
        }else{
            echo '<form>
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment" readonly></textarea>
            <br />
            <button class="btn btn-default" name="site" disabled="disabled">Submit</button>
        </form>';
        }
        
        ?>


    </div>