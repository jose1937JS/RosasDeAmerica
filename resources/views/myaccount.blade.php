<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flower Shop - My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="{{ view_path('style.css') }}" />
</head>
<body>
<div id="wrap">
  <div class="header">
    <div class="logo"><a href=""><img src="{{ view_path('images/logo.gif') }}" alt="" border="0" /></a></div>
    <div id="menu">
      <ul>
        <li><a href="{{ url('') }}">home</a></li>
        <li><a href="about.html">about us</a></li>
        <li><a href="category.html">flowers</a></li>
        <li><a href="specials.html">specials gifts</a></li>
        <li class="selected"><a href="myaccount.html">my accout</a></li>
        <li><a href="register.html">register</a></li>
        <li><a href="details.html">prices</a></li>
        <li><a href="contact.html">contact</a></li>
      </ul>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="{{ view_path('images/bullet1.gif') }}" alt="" /></span>My account</div>
      <div class="feat_prod_box_details">
        <p class="details"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
        <div class="contact_form">
          <div class="form_subtitle">login into your account</div>

          <form method="post" action="{{ url('login') }}">
            <div class="form_row">
              <label class="contact"><strong>Username:</strong></label>
              <input type="text" name="username" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Password:</strong></label>
              <input type="password" name="password" class="contact_input" />
            </div>
            <div class="form_row">
              <input type="submit" class="register" value="login" />
            </div>
          </form>

        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--end of left content-->
    <div class="right_content">
      <div class="languages_box"> <span class="red">Languages:</span> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/gb.gif') }}" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/fr.gif') }}" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/de.gif') }}" alt="" border="0" /></a> </div>
      <div class="currency"> <span class="red">Currency: </span> <a href="http://all-free-download.com/free-website-templates/">GBP</a> <a href="http://all-free-download.com/free-website-templates/">EUR</a> <a href="http://all-free-download.com/free-website-templates/"><strong>USD</strong></a> </div>
      <div class="cart">
        <div class="title"><span class="title_icon"><img src="{{ view_path('images/cart.gif') }}" alt="" /></span>My cart</div>
        <div class="home_cart_content"> 3 x items | <span class="red">TOTAL: 100$</span> </div>
        <a href="http://all-free-download.com/free-website-templates/" class="view_cart">view cart</a> </div>
      <div class="title"><span class="title_icon"><img src="{{ view_path('images/bullet3.gif') }}" alt="" /></span>About Our Shop</div>
      <div class="about">
        <p> <img src="{{ view_path('images/about.gif') }}" alt="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="{{ view_path('images/bullet4.gif') }}" alt="" /></span>Promotions</div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="{{ view_path('images/promo_icon.gif') }}" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/thumb1.gif') }}" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="{{ view_path('images/promo_icon.gif') }}" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/thumb2.gif') }}" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="{{ view_path('images/promo_icon.gif') }}" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="{{ view_path('images/thumb3.gif') }}" alt="" class="thumb" border="0" /></a> </div>
        </div>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="{{ view_path('images/bullet5.gif') }}" alt="" /></span>Categories</div>
        <ul class="list">
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">flower gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">specials</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">hollidays gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">flower gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">specials</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">hollidays gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">flower gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">specials</a></li>
        </ul>
        <div class="title"><span class="title_icon"><img src="{{ view_path('images/bullet6.gif') }}" alt="" /></span>Partners</div>
        <ul class="list">
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">flower gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">specials</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">hollidays gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">flower gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">specials</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">hollidays gifts</a></li>
          <li><a href="http://all-free-download.com/free-website-templates/">accesories</a></li>
        </ul>
      </div>
    </div>
    <!--end of right content-->
    <div class="clear"></div>
  </div>
  <!--end of center content-->
  <div class="footer">
    <div class="left_footer"><img src="{{ view_path('images/footer_logo.gif') }}" alt="" /><br />
      <a href="http://csscreme.com"><img src="{{ view_path('images/csscreme.gif') }}" alt="" border="0" /></a></div>
    <div class="right_footer"> <a href="http://all-free-download.com/free-website-templates/">home</a> <a href="http://all-free-download.com/free-website-templates/">about us</a> <a href="http://all-free-download.com/free-website-templates/">services</a> <a href="http://all-free-download.com/free-website-templates/">privacy policy</a> <a href="http://all-free-download.com/free-website-templates/">contact us</a> </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
