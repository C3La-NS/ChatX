<?php

function navbar() {
    echo '
    <div class="admin-bar"><div class="container">
        <a href="./"><img src="https://imgur.com/CnbMYGn.png" class="logo"></a>
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
<div id="main" class="container">
<div class="copied"></div>
<aside id="secondary" class="widget-area col-md-4" role="complementary">
<h2>Navigation</h2>
<li><a href="userlist.php">User Management</a></li>
<li><a href="https://github.com/C3La-NS/ChatX">GtiHub</a></li>
<h2>ChatX Widget & Installation</h2>
        <p><strong>1)</strong> Make sure your website is using jQuery library. If it doesn\'t, install one:</p>
        <div class="codebox">
                &lt;script src="https://code.jquery.com/jquery-2.1.3.min.js"&gt;&lt;/script&gt;
        </div>
        <p><strong>2)</strong> Add ChatX widget to any place where you want it to appear:</p>
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
        <p><strong>3)</strong> Done!</p>
        
<h2>Preliminary authentication</h2>
            <p>You can use authentication to prevent non-authorized users from viewing and sending messages. Edit settings.php, defining <i>$restrictedAccess = false;</i> as true. <mark>Notice: It\'s still beta</mark>. If you are going to use it on other domains plese define it in .htaccess in order to avoid CORS policy: <i>Header set Access-Control-Allow-Origin "https://your-domain-goes-here.com"</i></p>

<h2>Additional Info</h2>
<div class="alert-box"></div>
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
<div id="main" class="container">
<aside id="secondary" class="widget-area col-md-4" role="complementary">
</aside>
<div id="primary" class="col-md-8 mb-xs-24">
<div class="row">
    <section>
      <h1>Changing User Password</h1>
      <p>Enter existing username and then specify a new user password.</p>
    </section>
    <form method="post" class="changepw">
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
</div><!-- .row -->
</div><!-- #primary -->
</div><!-- #main.container -->    
    ';
}

function userpanel() {
    echo '
<div id="main" class="container">
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
