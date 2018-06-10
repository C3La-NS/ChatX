<?php

function navbar() {
    echo '
    <div class="admin-bar"><div class="container">
        <a href="./"><img src="../assets/img/logo.png" class="logo"></a>
    ';
    if ( isset($_SESSION['loggedin']) || $_SESSION['mod_loggedin'] ) {
        echo '<span><i class="icon-user"></i> Howdy, <strong>';
        echo $_SESSION['username']; echo '!</strong></span> <div class="logout"><a href="logout.php">LogOut <i class="icon-logout"></i></a></div>';
    }
    echo '
    </div><!-- .container --></div><!-- .admin-bar -->    
    ';

}



function modpandel() {
     echo '
<div id="main" class="container modpanel">
<div class="copied"></div>
<aside id="secondary" class="widget-area col-md-4" role="complementary">
<h2>Navigation</h2>
<li><a href="index.php">Shout Management & widget</a></li>
<li><a href="userlist.php">User Management</a></li>
<li><a href="setups.php">ChatX Settings</a></li>
<li><a href="https://github.com/C3La-NS/ChatX">GtiHub</a></li>
<h2>ChatX Widget & Installation</h2>
        <p><strong>1)</strong> Make sure your website is using jQuery library. If it doesn\'t, install one:</p>
        <div class="codebox">
                &lt;script src="https://code.jquery.com/jquery-2.1.3.min.js"&gt;&lt;/script&gt;
        </div>
        <p><strong>2)</strong> If you are planning to use ChatX on external domain make sure you have set it in <a href="setups.php">ChatX Setttings</a>. This is needed to coply with CORS policy.</p>
        <p><strong>3)</strong> Add ChatX widget to any place where you want it to appear:</p>
        <div class="codebox">
                &lt;div id="chatx" class="chat" style="display: none"&gt;&lt;/div&gt;
                <br>
                &lt;script&gt;
                var chatx_server = "<span class=style-link></span>";
                $.getScript(chatx_server + \'assets/js/core.js\');
                &lt;/script&gt;
                <br>
                &lt;script src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"&gt;&lt;/script&gt;
        </div>
        <p><strong>4)</strong> Done!</p>

</aside>
<div id="primary" class="col-md-8 mb-xs-24"> 

<div class="row">
<section>
<form method="post">
    <h1>Deleting Shouts by ID</h1>
    <p>Click the ID of the shout you want to delete and submit the form.</p>
  <span>
    <input class="basic-slide" id="shoutID" type="text" name="deleteShout" placeholder="Enter Post ID..." /><label for="shoutID">ID</label>
    <button class="button" type="submit" value="Submit">Delete</button>
  </span>
</form>
</section>

<div class="shoutbox-content">
    <article class="legend">
        <div class="first-box"><p>Shout ID</p></div>
        <div class="second-box"><p>Author</p></div>
        <div class="third-box"><p>Content</p></div>
    </article>
</div>

<section>
<h2>Clearing All Data</h2>
<p>Be careful. By clicking the button below you will permanently delete all data from the server.</p>
<form method="post">
  <span>
    <input type="hidden" name="deleteAllShouts" value="yes" />
    <button class="button-delete-all" type="submit" value="Submit">Delete everything</button>
  </span>
</form>
</section>

</div>

</div><!-- #primary -->

<script src="js/moderation.js"></script>

</div><!-- #main.container -->

     ';
     exit;
}

function userlist() {
    echo '
<div id="main" class="container userlist">
<aside id="secondary" class="widget-area col-md-4" role="complementary">
    <h2>Navigation</h2>
    <li><a href="index.php">Shout Management & widget</a></li>
    <li><a href="userlist.php">User Management</a></li>
    <li><a href="setups.php">ChatX Settings</a></li>
    <li><a href="https://github.com/C3La-NS/ChatX">GtiHub</a></li>

    <h2>Userlist</h2>
</aside>
<div id="primary" class="col-md-8 mb-xs-24">
<div class="row">
    <section>
      <h1>Changing User Password</h1>
      <p>Enter existing username and then specify a new user password.</p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="Enter Existing Username"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="p" type="password" placeholder="Enter New Password"/>
        <label><i class="icon-lock"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="c_p" type="password" placeholder="Confirm Password"/>
        <label><i class="icon-lock"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button class="button">Change Password</button>
      </span>
    </div>  
    </form>
    
    <section>
      <h1>Deleting Users</h1>
      <p>Enter existing username to delete them from database.</p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="Enter Existing Username"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button name="s_d" class="button">Delete User</button>
      </span>
    </div> 
    </form>
    
    <section>
      <h1>Adding moderators</h1>
      <p>Enter existing username to make them moderators.</p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="Enter Existing Username"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button name="s_m" class="button">Add Moderator</button>
      </span>
    </div> 
    </form>
</div><!-- .row -->
</div><!-- #primary -->
</div><!-- #main.container -->

<script>$( ".total, .u-list" ).appendTo( $( "#secondary" ) );</script>
    ';
}
function settingsPage() {
    echo '

    ';
}
function userpanel() {
    echo '
<div id="main" class="container userpanel">
    <div class="row">
        <section>
          <h1>
          Welcome back!
          </h1>
          <p>You have successfully Logged In.</p>
        </section>
    </div>
</div><!-- #main.container -->
    ';
}
