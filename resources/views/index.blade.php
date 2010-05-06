<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Flower Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" href="../resources/views/style.css" />
</head>
<body>
<div id="wrap">
  <div class="header">
    <div class="logo"><a href=""><img src="images/logo.gif" alt="" border="0" /></a></div>
    <div id="menu">
      <ul>
        <li class="selected"><a href="">home</a></li>
        <li><a href="../resources/views/about.html">about us</a></li>
        <li><a href="../resources/views/category.html">flowers</a></li>
        <li><a href="../resources/views/specials.html">specials gifts</a></li>
        <li><a href="{{ url('myaccount') }}">my accout</a></li>
        <li><a href="../resources/views/register.html">register</a></li>
        <li><a href="../resources/views/details.html">prices</a></li>
        <li><a href="../resources/views/contact.html">contact</a></li>
      </ul>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet1.gif" alt="" /></span>Featured products</div>
      <div class="feat_prod_box">
        <div class="prod_img"><a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/prod1.gif" alt="" border="0" /></a></div>
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <div class="prod_title">Product name</div>
            <p class="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <a href="http://all-free-download.com/free-website-templates/" class="more">- more details -</a>
            <div class="clear"></div>
          </div>
          <div class="box_bottom"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="feat_prod_box">
        <div class="prod_img"><a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/prod2.gif" alt="" border="0" /></a></div>
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <div class="prod_title">Product name</div>
            <p class="details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <a href="http://all-free-download.com/free-website-templates/" class="more">- more details -</a>
            <div class="clear"></div>
          </div>
          <div class="box_bottom"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet2.gif" alt="" /></span>New products</div>
      <div class="new_products">
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/new_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb1.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/new_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb2.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/new_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb3.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <!--end of left content-->
    <div class="right_content">
      <div class="languages_box"> <span class="red">Languages:</span> <a href="http://all-free-download.com/free-website-templates/" class="selected"><img src="../resources/views/images/gb.gif" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/fr.gif" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/de.gif" alt="" border="0" /></a> </div>
      <div class="currency"> <span class="red">Currency: </span> <a href="http://all-free-download.com/free-website-templates/">GBP</a> <a href="http://all-free-download.com/free-website-templates/">EUR</a> <a href="http://all-free-download.com/free-website-templates/" class="selected">USD</a> </div>
      <div class="cart">
        <div class="title"><span class="title_icon"><img src="../resources/views/images/cart.gif" alt="" /></span>My cart</div>
        <div class="home_cart_content"> 3 x items | <span class="red">TOTAL: 100$</span> </div>
        <a href="cart.html" class="view_cart">view cart</a> </div>
      <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet3.gif" alt="" /></span>About Our Shop</div>
      <div class="about">
        <p> <img src="../resources/views/images/about.gif" alt="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet4.gif" alt="" /></span>Promotions</div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/promo_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb1.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/promo_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb2.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
        <div class="new_prod_box"> <a href="http://all-free-download.com/free-website-templates/">product name</a>
          <div class="new_prod_bg"> <span class="new_icon"><img src="../resources/views/images/promo_icon.gif" alt="" /></span> <a href="http://all-free-download.com/free-website-templates/"><img src="../resources/views/images/thumb3.gif" alt="" class="thumb" border="0" /></a> </div>
        </div>
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet5.gif" alt="" /></span>Categories</div>
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
        <div class="title"><span class="title_icon"><img src="../resources/views/images/bullet6.gif" alt="" /></span>Partners</div>
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
    <div class="left_footer"><img src="../resources/views/images/footer_logo.gif" alt="" /><br />
      <a href="http://csscreme.com"><img src="../resources/views/images/csscreme.gif" alt="" border="0" /></a></div>
    <div class="right_footer"> <a href="http://all-free-download.com/free-website-templates/">home</a> <a href="http://all-free-download.com/free-website-templates/">about us</a> <a href="http://all-free-download.com/free-website-templates/">services</a> <a href="http://all-free-download.com/free-website-templates/">privacy policy</a> <a href="http://all-free-download.com/free-website-templates/">contact us</a> </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
