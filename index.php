<?php 
   include('inc/config.php'); 
    header('Access-Control-Allow-Origin: https://nossolove.com/');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'); 
    error_reporting(0);
   ?>
<!DOCTYPE html> 
<html lang="pt-BR" id="html">
   <meta http-equiv="assets/content-type" content="text/html;charset=UTF-8" />
   
   
   
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Nosso Love</title> 
      <link rel="stylesheet" href="assets/content/cache/min/1/nl_937763584983622.css" media="all" data-minify="1" />
      <script type='text/javascript' src='assets/includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0' id='wp-polyfill-js'></script>
      <link rel="stylesheet" href="assets/glyphicons/glyphicons.css" type="text/css" />
      <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" />
      <link rel="stylesheet" href="assets/material-design-icons/material-design-icons.css" type="text/css" />
      <link rel="stylesheet" href="assets/css/style.css?v=<?=filesize('assets/css/style.css');?>" type="text/css" />
      <script type="text/javacript" src="libs/js/javascript.js?v=<?=filesize('libs/js/javascript.js');?>"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <link rel="shortcut icon" href="account/img/favicon.png">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
      <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />
  
      <!-- SLIDE DO TOPO -->
      <script type='text/javascript' id='responsive-lightbox-js-extra'> 
         var rlArgs = {"script":"nivo","selector":"lightbox","customEvents":" ajaxxComplete","activeGalleries":"1","effect":"fade","clickOverlayToClose":"1","keyboardNav":"1","errorMessage":"The requested content cannot be loaded. Please try again later.","woocommerce_gallery":"0","ajaxxurl":"https://nossolove.com/libs/js/javascript.js?v=373","nonce":"e3c329c636"}; 
      </script>
      <!-- FIM SLIDE DO TOPO -->
      <!-- css  -->
      <style type="text/css" id="wp-custom-css">
         .menu-block {max-height: 67px !important;}.rl-gallery-link:after {max-height: 727px !important;}
         .tnp-subscription th {padding: 0px;}.search-results-header, .archive-header {background-color: #0c0c0c; border-bottom: 1px solid #3e3e3e; padding-left: 60px; padding-right: 0px; padding-top: 10px; padding-bottom: 10px;}.menu-position-top .main-content-w {background-color: #000000;border-bottom: 1px solid rgba(255,255,255,0.1);width: 100%;border-top: 0px;}.novid{padding-left: 60px;padding-right: 60px; margin-bottom:45px;}.novid22{margin-top: 40px;padding-left: 60px;padding-right: 60px;}.destaquecapa .g-col, .g-dyn {width: 33%;margin: 1px;}.novidades .g-col, .g-dyn {width: 49%;margin: 1px;}.destaqueS {float: right;width: 53%;}.novidades {width: 43.2%;padding-right: 1.5%;}.menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li.menu-item-has-children > a:before{display:none;}.titulo{color: #FFFFFF;display: flex;align-items: center;justify-content: center;background-color:#151515;padding-top: 3px;padding-bottom: 3px;}.titulotop4{background-color:#151515;padding-top: 15px;padding-bottom: 15px;color: #FFFFFF;display: flex;align-items: center;justify-content: center;}.titulotop5{background-color:#b20e0e; color: #ffffff;display: flex;align-items: center;justify-content: center;font-style:;     font-size: 14px; padding: 2px;}.menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li > a {text-transform: uppercase;}.destaqueG {display: flex;justify-content: center;margin-top: 0px;padding: 10px;width: 100%;}.destaqueG7 {display: grid;justify-content: center;margin-top: 10px;padding: 10px;background-color: #1d1d1d;border-bottom: 1px solid rgba(255,255,255,0.1);border-top: 1px solid rgba(255,255,255,0.1);width: 100%;}h4, .h4 {font-size: 16px;color: #d2d2d2;}h5, .h5 {font-size: 14px;color: #ff0000d1;}.top-sidebar-wrapper {text-align: center;padding-top: 0px;padding-bottom: 20px;}.menu-position-top .top-sidebar-wrapper {padding-top: 0px;}.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.portoads7{padding-bottom:10px;padding-right:15px;padding-left:15px;}.home .top-sidebar-wrapper {padding-right: 0px;padding-left: 20px;}.sub-bar-i .bar-breadcrumbs, .sub-bar-i .bbp-breadcrumb {display: none;}.post-navigation-unique {display: none;}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {text-align: left;border: none;-webkit-box-shadow: 0px 8px 25px 3px rgba(14,15,23,0.3);box-shadow: 0px 8px 25px 3px rgba(14,15,23,0.3);background-color: #30384d;border-radius: 6px;max-width: 100%;-webkit-transition: all 0.2s ease;transition: all 0.2s ease;}.page article.pluto-page-box .post-title, .single article.pluto-page-box .post-title, .index-fullwidth article.pluto-page-box .post-title {display: none;}#container47{width: 100%;display:flex; }.topcard {width: 100%;background-color: #1d1d1d;padding: 1px;border-radius: 1px;}td, th {border: 0px solid #1d1d1d;text-align: left;padding: 5px;color: #efefef;}tr:nth-child(even) {background-color: #232222;}.left-div {margin:2px;background-color: #1d1d1d;float: left;width: 20%;}.page article.pluto-page-box .post-body, .single article.pluto-page-box .post-body, .index-fullwidth article.pluto-page-box .post-body {padding-top: 0px; padding-right: 0px; padding-left: 0px; padding-bottom: 10px; position: relative;}.galeria{float:left;}h3, .h3 {font-size: 16px;color: #ffffff;}.textocard{float:left;width: 100%;}.celu {	margin: 0 auto;color: #ffffff;font-weight: normal;font-size: 20px;text-align: center;margin-bottom:5px;width: 100%;}.sidebar-position-right .primary-sidebar-wrapper .primary-sidebar {border-left: none;border-radius: 0px 0px 0px 0px;background-color: #2b2b2b;}.primary-sidebar {background-color: #30384d;background-image: none;-webkit-box-shadow: 0px 3px 25px 3px rgba(14,15,23,0.3);box-shadow: 0px 3px 25px 3px rgba(14,15,23,0.3);padding: 30px 0px 50px;position: relative;color: #c9c9c9;}.gatadasemana {margin: 20px;}.page article.pluto-page-box .post-meta, .single article.pluto-page-box .post-meta, .index-fullwidth article.pluto-page-box .post-meta {display: none;}.descricao {margin: 20px;min-height: 300px;}.video_single {margin: 20px;}.comments-area {display: none;}.index-isotope.v3 article.pluto-post-box .post-content {display: none;}.index-isotope.v3 article.pluto-post-box .post-meta {display: none;}.index-isotope.v3 article.pluto-post-box:hover .post-top-share {display: none;}.page .figure-link:hover .figure-icon, .single .figure-link:hover .figure-icon, .index-isotope .figure-link:hover .figure-icon, .index-fullwidth .figure-link:hover .figure-icon {display: none;}.main-footer.with-social .footer-copy-and-menu-w {width: 100%;}#second{width: 100%;}
         @media (max-width: 1200px) {#second{margin-left:0px;}.nome {font-size: 20px !important;margin-left: 136px;padding-top: 14px;text-align: left !important; padding-bottom: 0px;}.iperfilgrakz {padding-left: 8px;}.celu {margin-left: 18px;}.textocard {padding-top: 3px;}.topcelu {float: left;}}@media (max-width:1418px) {.tnp-subscription {display: none;}}@media (max-width:1200px) {.sidebar-position-right .primary-sidebar-wrapper {display: none;}.rightsideinside{display: none;}.sbar{display: none;}}.topvideo {float: left; min-height: 467px; margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #272727;border-radius: 5px;}.topvideo2 {float: left; min-height: 600px; margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #272727;border-radius: 5px;}
         @media (max-width: 1200px) {.left-div {width:100%;}}.right-div {padding:5px;margin:2px;width: 60%;background-color: #1b1b1b;min-height: 720px;}.right-div2 {float: left;padding:5px; margin-left: 20px; margin-bottom: 10px;;width: 640px;background-color: #171717;min-height: 550px;}@media (max-width: 1200px) {.right-div {margin-left:0px ;width: 100%;}}@media (max-width: 1200px) {#container47{width: 100%;display:inline-block;}}
         .infocard2 {display: inline-block;width: 100%;padding: 1px;border-radius: 1px;background-color: #1d1d1d;border: 1px solid #383838;margin-top:40px;}
         @media (max-width: 1200px) {.dgrakz{display:none;}.iperfilgrakz {text-align:center;max-height: 96px;float: left;margin: 10px}}@media (min-width: 1200px) {.infocard2{display:none;}}@media (max-width: 1200px) {.left-div {padding-left: 0px;}}@media (max-width: 1200px){.topvideo {width:100%;margin-left: 0px;}.topvideo2 {width:100%;margin-left: 0px;}}
         @media (max-width: 700px){.topvideo2 {width:100%;margin-left: 0px;}}
         .index-isotope.v3 article.pluto-post-box .post-title a {color: #FFFFFF;}.index-isotope.v3 article.pluto-post-box .post-media-body + .post-content-body {text-align: center;padding-top: 5px;}.page h1.page-title {display: none;}.textao {margin: 20px;}.page article.pluto-page-box .post-content, .single article.pluto-page-box .post-content, .index-fullwidth article.pluto-page-box .post-content {color: #ffffff;}.novidades img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.portoads2 img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.sidebar-under-post {max-width: 100%;}.widget .widget-title {text-align: center;color: #d5d5d5;text-transform: uppercase;}.widget .widget-title:after {display: none;}@media (max-width: 991px) and (min-width: 10px){.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 49%;padding: 1%;}}@media (max-width: 1000px) {.novidades {display:none;}.destaqueS{width: 100%;}}.os-back-to-top:hover {background-color: #535353;background-position: center 7px;}.destaqueS {float: right;}@media (max-width: 2000px){.side-padded-content {padding-left: 60px;padding-right: 60px;}}@media (min-width: 1200px) {.infocard2{display:none;}}.index-isotope.v3 article.pluto-post-box {background-color: #232323;}.main-footer.color-scheme-dark {background-color: #000000;color: rgba(255,255,255,0.5);}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {background-color: #232323;}.not-wrapped-widgets .sidebar-under-post > .row {display: none;margin-left: 0px;margin-right: 0px;}.menu-position-top.menu-style-v2 .menu-block .logo {margin-right: 30px;margin-bottom: 0px;padding-left: 40px;}.nome{color:#f58623;font-size: 24px;font-style: italic;text-align: center;}.local{text-transform: uppercase;float: left;color:#d5d5d5;font-size: 16px;font-style: normal;padding-bottom: 3px;margin-left: 5px;}.celu{width: 200px;color: #d5d5d5;}.textocard{color:#d5d5d5;font-size: 12px;font-style: italic;padding-bottom: 3px;float: left;}.widget .widget-title {margin-bottom: 0px;}.menu-block .os_menu li a {color: #d2d2d2;outline: none;font-weight: 600;text-shadow: none;text-decoration: none;position: relative;display: block;}.menu-block .os_menu li a:hover {color: #ffffff;outline: none;font-weight: 600;text-shadow: none;text-decoration: none;position: relative;display: block;}.perfil{margin:5px;font-size: 16px;}.rightsideinside{font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:center;background-color: #b20e0e;width:100%;}.rightsideinside2{font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:left;background-color: #000000;width:100%;}.rightsideinside2 .g-single{width:100%;}.footersideinside .g-single{width:100%;}.footersideinside {display:inline-block;font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:center;background-color: #1b1b1b;width:100%;}.rightside{width:20%;margin-right: 4px;}.portoads4{margin:3px;}.destaquecapa{padding-left: 60px;padding-right: 60px;}
         .top4{padding-left: 0px;}.nome-modelo-destaque {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;max-width:100%;min-height:25px;padding: 6px 11px 8px;position: absolute;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 10px;font-style: tahoma;}.nome-modelo-destaque2 {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;max-width: 100%;min-height: 25px;padding: 6px 11px 8px;position: absolute;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 10px;font-style: italic;}.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 16.6%;}.index-isotope.v3 article.pluto-post-box .post-media-body {padding: 0px;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link {border-radius: 0px;overflow: hidden;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link figure {border-radius: 0px;}.page .figure-link .figure-shade, .single .figure-link .figure-shade, .index-isotope .figure-link .figure-shade, .index-fullwidth .figure-link .figure-shade {border-radius: 0px;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link figure img {border-radius: 0px;}.index-isotope.v3 article.pluto-post-box .post-title a {color: #ffffff;}.index-isotope.v3 article.pluto-post-box .post-title a {font-weight: 400;font-style: italic;font-size: 14px;line-height: 32px;border-bottom: 1px solid transparent;-webkit-transition: all 0.2s ease;transition: all 0.2s ease;}.index-isotope.v3 article.pluto-post-box .post-media-body + .post-content-body {background-color: #b20e0e;}.index-isotope.v3 article.pluto-post-box .post-content-body {padding: 0px;}.index-isotope.v3 article.pluto-post-box {border: 0px solid #000;}.portoads4 img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.menu-block .os_menu li.current-menu-item > a, .menu-block .os_menu li:hover > a {color: red;text-decoration: none;}.destaqueG2 {justify-content: center;margin-top: 10px;padding: 10px;background-color: #1d1d1d;border-bottom: 1px solid rgba(255,255,255,0.1);border-top: 1px solid rgba(255,255,255,0.1);}.padded-top {padding-top: 0px;}@media (max-width: 1072px) {.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 50%;}.right-div2 {padding:5px;margin:2px ;width: 100%;background-color: #171717;}.perfil{display:none;}.celu {font-size: 18px;width: 180px;}.side-padded-content {padding-left: 5px;padding-right: 5px;}.celu {margin-top: 0px;}.destaqueG7 {justify-content: center;margin-top: 10px;padding: 0px;background-color: #1d1d1d;border-bottom: 1px solid rgba(255,255,255,0.2);border-top: 1px solid rgba(255,255,255,0.2);width: 100%;}}.topv{vertical-align: top;}.menu-position-top.menu-style-v2 .menu-block .logo img {height: 34px;}@media (max-width: 1524px) and (min-width: 900px){.right-div2 {width: 580px; margin:8px}.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.destaqueS {float: right;}}@media (min-width: 1700px) {.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.menu-position-top.menu-style-v2 .menu-block .menu-inner-w {margin: 0 auto;max-width: 1460px;min-width: 990px;}.destaquecapa {padding-left: 60px;padding-right: 60px;}.side-padded-content {padding-left: 60px;padding-right: 60px;}}@media (max-width: 1400px) and (min-width: 900px){.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.right-div2 {width: 540px;}}@media (max-width: 1360px) and (min-width: 10px){.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.destaqueS {float: right;}.right-div2 {width: 500px;}}.menu-position-top .menu-block {background-color: #000000;border-bottom: 1px solid #414141;}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {margin: 10px auto 20px auto;}.mobile-menu > ul > li a {padding: 12px 20px;display: inline-block;position: relative;color: #FFFFFF;font-size: 18px;}.portoads4 img{width: 100%;}@media (max-width: 768px){.page-fluid-width.no-sidebar.menu-position-top .index-isotope.v1 .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope.v3 .item-isotope {padding: 5px 5px;float: left;}.destaqueS {float: right;}.portoads4 {margin: 0px;}.destaquecapa{display: none;}}.footerside{margin-top:30px;}@media (min-width: 768px){.footerside{display:none;}.footersideinside{	display:none;}.scrollclose {
         display:none;}
         .scrollclose img {
         width: 100% !important;
         }	.regatas{display:none;}
         }.d5 {padding-left: 60px;padding-right: 60px;}@media only screen and (max-width: 940px){.topvideo {min-height: 0px;}.g-col, .g-dyn, .g-single {width: 49%;margin: 1px;}.novid{padding-left: 0px;padding-right: 0px;}.novid22{padding-left: 0px;padding-right: 0px;}.videosin .g-col{width: 100%;}.right-div2 {width: 96%;}.nome-modelo-destaque {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;width: 100%;min-height: 25px;padding: 6px 11px 8px;position: static;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 0px;font-style: tahoma;}.d4{padding-left: 9px;}.d5 {padding-left: 9px;}.portoads7 {padding-bottom: 10px;padding-right: 0px;padding-left: 0px;}.search-results-header, .archive-header {padding-left: 0px;padding-right: 0px;padding-top: 10px;padding-bottom: 10px;}}@media only screen and (max-width: 330px){.nome {font-size: 14px;  text-align: left;}.celu {font-size: 14px;text-align: right;width: 160px;}.local {font-size: 14px;}.textocard {font-size: 10px;}}.novidfooter{float:left;}.contato {background-color: #232323;padding: 20px;margin: 10px;}.backgroundf {padding-top: 5px;margin-top: 20px;}.g-4 {max-width: 100%;}.main-search-form form .search-submit {background-color: #f58623;}.tab {position: relative;margin-bottom: 1px;width: 100%;color: #d5d5d5;overflow: hidden;}.tab input {position: absolute;opacity: 0;z-index: -1;}label {position: relative;display: block;padding: 0 0 0 5px;font-weight: bold;line-height: 3;cursor: pointer;}.blue label {background: #0c0c0c;}.tab-content {max-height: 0;overflow: hidden;background: #1abc9c;-webkit-transition: max-height .35s;-o-transition: max-height .35s;transition: max-height .35s;}.blue .tab-content {background: #272727;}.tab-content p {margin: 1em;}/* :checked */input:checked ~ .tab-content {max-height: 40em;}/* Icon */label::after {position: absolute;right: 0;top: 0;display: block;width: 3em;height: 3em;line-height: 3;text-align: center;-webkit-transition: all .35s;-o-transition: all .35s;transition: all .35s;}input[type=checkbox] + label::after {content: "+";}input[type=radio] + label::after {content: "+";}input[type=checkbox]:checked + label::after {transform: rotate(315deg);}input[type=radio]:checked + label::after {transform: rotate(315deg);}.menu-modelo-left > li > ul > li:last-child {height: 162px;}.owl-dots {display: none;}.destaqueG .destaqueS {padding-left: 4%;}.back7{background-color: #1d1d1d;padding: 16px;border-style: solid;border-width: 1px;border-color: #3c3c3c;margin-bottom: 20px;}.infocard {max-height:600px;}.wicon{ float: left; width: 20px; margin-top:4px; height:22px}.ms-inner-controls-cont{margin-top: 74px;} @media only screen and (max-width: 1190px) and (min-width: 882px)  {.right-div2 {width: 440px;}} .post-content img {width: 100%;}@media (min-width: 1650px){.largura_grakz {height: auto;margin: 0 auto;max-width: 1460px;min-width: 990px;position: relative;width: 100%;}} img.ms-thumb.lazyloaded  {width: 140px !important; height: 80px !important; margin-top: 0px !important; margin-left: 0px !important;}.topvideonews {float: left;min-height: 210px;margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #1d1d1d !important;border: 1px solid #333333;-webkit-box-shadow: 0px 9px 24px 0px rgb(0 0 0 / 12%);box-shadow: 0px 1px 14px 0px rgb(47 47 47);border-radius: 6px;margin-bottom: 20px;}
         @media (max-width: 1200px){.topvideonews{width:90% !important;margin-left: 20px !important;margin-right: 20px !important;margin-top: 40px !important;margin-bottom: 50px !important;}}
         #style-1::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
         border-radius: 10px;
         background-color: #F5F5F5;
         }
         #style-1::-webkit-scrollbar
         {
         width: 12px;
         background-color: #F5F5F5;
         }
         #style-1::-webkit-scrollbar-thumb
         {
         border-radius: 10px;
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
         background-color: #FF0000;
         }
         @media (max-width: 600px){
         .extras {display:block;}
         .gvideos{display:block;}
         .netletter{display:block;}
         }
         .video-wrapper {
         position: relative;
         display:inline;
         }
         .video-wrapper > video {
         width: 470px;
         }
         @media (max-width: 600px){
         .video-wrapper > video {
         width: 100%;
         }
         .local {
         font-size: 16px;
         }
         .telegram {
         display: table;
         margin: 0 auto;
         font-weight: bold;
         background: #2a2a2a;
         padding: 6px 0px 6px 16px;
         border-radius: 6px;
         width: 140px;
         float: left;
         }
         }
         .video-wrapper > video.has-media-controls-hidden::-webkit-media-controls {
         display: none ;
         }
         .video-overlay-play-button {
         box-sizing: border-box;
         width: 100%;
         height: 100%;
         padding: 10px calc(50% - 50px);
         position: absolute;
         top: 0;
         left: 0;
         display: block;
         opacity: 0.95;
         cursor: pointer;
         background-image: linear-gradient(transparent, #000);
         transition: opacity 150ms;
         }
         .video-overlay-play-button:hover {
         opacity: 1;
         }
         .video-overlay-play-button.is-hidden {
         display: none;
         }
         .gatag{text-align: center;}
         .portoads7 img {
         height: 70%;
         width: 70%;
         }
         .tnp-subscription input.tnp-submit {background-color: #252525;}
         .custom_acf_image_slider2 {
         max-width: 226px;
         margin: 0 auto;
         }
         .portoads47 {float: left;width: 48%;margin: 1%;min-height: 274px;}
         .portoads47 img {width: 100%;height: auto;}
         .footerwhats {background-color: rgb(37 37 37 / 50%);position: fixed;bottom: 0;left: 0;right: 0;height: 60px;z-index: 1;}
         ul.ulperfil2 {width: 100%;margin: 0 auto;padding-top: 10px;list-style-type: none;}
         .ulperfil2 li {float: left;margin-right: 30px;margin-top: 0px;background-color: #292929;border: 1px solid #696969;padding: 10px;border-radius: 10px;list-style-type: none;}
         @media (min-width: 600px){.footerwhats{display:none}}
         .gcenter {display: table;margin: 0 auto;}
         li#qa-7cfa3c {min-width: 84px;text-align: center;}
         .vertig {
         max-width: 360px;
         margin: 0 auto;
         }
         .gvideos, .extras, .netletter  {
         max-width: 660px;
         margin: 0 auto;
         }
         .scrollclose img {
         width: 100% !important;
         }
         .tnp-subscriptiongrakz input.tnp-submit {
         background-color: #101010;
         border-radius: 4px;
         min-height: 34px;
         padding-left: 10px;
         margin-left: 4px;
         color: #fff;
         border: 1px solid #333333;
         }
         .g-col {
         position: relative;
         float: left;
         }
         .menu-position-top.menu-style-v2 .menu-block .menu-inner-w {height: auto;margin: 0 auto;max-width: 1470px;min-width: 990px;position: relative;width: 100%;}
         .menu-position-top.menu-style-v2 .menu-block .os_menu .sub-menu li a {
         text-transform: uppercase;
         font-size: 14px;
         }
         .menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li.menu-item-has-children > a {padding-left: 15px;}
         .menu-position-top.menu-style-v2 .menu-block .menu-search-form-w {margin-right: 40px;}
         .main-footer .menu li a {font-size: 14px;c;font-weight: 700;}
         .nslider {float: left;width: 100%;}
         .sy-pager li {
         width: 5px !important;
         height: 5px !important;
         }
         .sy-pager li.sy-active a {
         background-color: #e88024 !important;
         }
         .iperfilgrakz img {
         border-radius: 100%;
         max-width: 90px !important;
         }
         .iperfilgrakz {
         text-align:center;
         max-height: 96px;
         }
         .nivo-lightbox-wrap {
         position: absolute !important;
         top: 0% !important;
         bottom: 0% !important;
         left: 0% !important;
         right: 0% !important;
         }
         .nivo-lightbox-theme-default .nivo-lightbox-close {
         display: block;
         width: 50px;
         height: 30px;
         text-indent: -9999px;
         padding: 5px;
         opacity: inherit;
         margin: 10px;
         }
         #swipebox-close {
         margin-right: 40px;
         }
         .nivo-lightbox-theme-default.nivo-lightbox-overlay {
         background: #666;
         background: rgba(0,0,0,0.9);
         }
         .grrr {
         display: table;
         width: 100%;
         max-width: 1300px;
         margin: 0 auto;
         margin-bottom: 30px;
         }
         ul.ulgrakz2 {
         list-style-type: none;
         margin-top: 10px;
         }
         ul.ulgrakz {
         list-style-type: none;
         margin-top: 10px;
         }
         ul.ulgrakz3 {
         list-style-type: none;
         margin-top: 10px;
         }
         .modelosg {
         float: left;
         width: 22%;
         background: #1f1f1f;
         border: 2px solid #313131;
         padding: 10px;
         margin: 10px;
         min-height: 194px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 214px;
         }
         .modelosg2 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 215px;
         }
         .modelosg4 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 215px;
         }
         .modelosg3 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 194px;
         }
         ul.display-posts-listing {
         list-style-type: none;
         padding: 0px;
         }
         .tgrakz {
         background: #0c0c0c;
         padding: 5px;
         border-radius: 5px;
         color: #ffffff;
         font-weight: 600;
         border: 1px solid #333333;
         text-align:center;
         }
         .mbloco {
         margin-left: 24px;
         }
         @media (max-width:1250px){
         .modelosg {width: 100%;}
         .modelosg2 {width: 100%;}
         .modelosg3 {width: 100%;}
         .modelosg4 {width: 100%;}
         .mbloco {
         margin-left: 0px;
         }
         ul.ulgrakz2 {padding: 0;    text-align: center;}
         ul.ulgrakz3 {padding: 0;    text-align: center;}
         ul.ulgrakz {padding: 0;    text-align: center;}
         }
         }
         @media (max-width: 767px){
         .main-content-w .main-footer {
         }
         }
         .novidades_page {
         display: table;
         width: 100%;
         }
         .portoads48 {
         float: left;
         width: 18%;
         margin: 1%;
         margin-bottom: 20px;
         }
         @media (max-width: 1110px){
         .portoads48 {
         float: left;
         width: 48%;
         margin: 0.8%;
         margin-bottom: 10px;
         min-height:280px;
         }
         }
         .portoads71 {
         width: 19%;
         float: left;
         min-height: 280px;
         margin: 6px;
         }
         @media (max-width: 1340px){
         .portoads71 {
         width: 23%;
         float: left;
         min-height: 270px;
         margin: 11px;
         }
         }
         @media (max-width: 1240px){
         .portoads71 {
         width: 31%;
         float: left;
         min-height: 300px;
         margin: 11px;
         text-align: center;
         }}
         @media (max-width: 970px){
         .portoads71 {
         width: 49.5%;
         float: left;
         min-height: 244px;
         margin: 1px;
         text-align: center;
         }}
         .g-col.b-4.a-27 {float: left;width: 33%;min-height: 333px;}
         @media (max-width: 970px){
         .g-col.b-4.a-27 {width: 49%;margin: 1px;min-height: 200px;}}
         .g-col.b-6 {
         width: 100%;
         margin: 2px;
         float: none;
         }
         @media (max-width: 1072px){
         .g-col.b-6 {
         width: 100%;
         margin: 2px;
         float: none;
         }
         .menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li > a {
         padding: 12px 7px;
         }
         }
         @media (min-width: 1072px){
         .g-col.b-6 {
         float: none;
         }
         }
         .nome2 {
         font-size: 18px;
         font-style: italic;
         text-align: left;float:left;
         margin-top: 20px;
         }
         .nome2 a{
         color: #f58623;}
         .celu2 {
         float: right;
         font-size: 18px;
         text-align: right;
         margin-top:20px;
         }
         .textocard2 {color: #d5d5d5;font-size: 12px;}
         .iperfilgrakz2 {
         text-align: left;
         max-height: 96px;
         float: left;
         margin:10px
         }
         .iperfilgrakz2 img {
         border-radius: 100%;
         max-width: 70px !important;
         }
         @media (max-width: 767px){
         .iperfilgrakz2 img {
         border-radius: 100%;
         max-width: 50px !important;
         }
         .celu2 {
         margin-top:10px;
         }
         .nome2 {
         margin-top: 10px;
         }
         }
         .top4 a {color: #cecece;text-decoration: none;}
         .top4 a:hover {color: #fff;}
         @media (min-width: 941px){
         .destaquecapa3 .g-col {
         width: 33%;
         }
         .novid {
         max-height: 154px;
         }
         .destaquesMobile {
         padding-left: 60px;
         margin-top:50px;
         }
         .g-col {
         width: 32%;
         }
         }
         .nivo-lightbox-theme-default .nivo-lightbox-nav {
         top: 42%;
         width: 8%;
         height: 18%;
         text-indent: -9999px;
         background-repeat: no-repeat;
         background-position: 50% 50%;
         opacity: 0.5;
         }
         .mobile-menu>ul>li a{
         font-size: 16px !important;
         }
         .mobile-menu > ul > li a:focus {
         color: #c5c5c5 !important;
         }
         .varipidhin ul.sub-menu {
         padding-left: 0px;
         margin-top: 10px;
         text-align: center;
         }
         @media (max-width: 520px){
         .portoads48 {
         min-height: 290px;
         }
         .portoads71 {
         width: 49%;
         float: left;
         min-height: 206px;
         margin: 1px;
         text-align: center;
         }
         .main-content-w .main-footer.with-social .footer-copy-and-menu-w .menu li {
         display: block;
         text-align: center;
         margin: 0 0 0 0;
         }.varipidhin ul.sub-menu {
         padding-left: 0px !important;
         }}
         ul.display-posts-listing {
         text-align: center;
         }
         ul.ulgrakz3 {
         padding-inline-start: 0px;
         }
         ul.ulgrakz {
         text-align: center;
         padding-inline-start: 0px;
         }
         .owl-carousel {z-index: 0;}
         .varipidhin ul.sub-menu {
         padding-inline-start: 0px;
         }
         .main-content-w .main-footer.with-social .footer-copy-and-menu-w .menu li {
         margin: 0 0 0 0;
         }
         .arve-embed-container video {width: 100%;}
         .info_container a {
         text-decoration: none;
         }
         .watchiframe .info_container {
         bottom: 24%;
         top: initial !important;
         }
         .conteudocerto {margin: 30px;}
         .portoads101 {
         width: 22%;
         float: left;
         margin-left: 1.5%;
         margin-right: 1.5%;
         margin-bottom: 1%;
         }
         a.custom_top_image_link2 {
         position:relative;
         display:block;
         display: inline-block;
         }
         .custom_top_image_link2 img{
         max-width:100%;
         height: auto;
         }
         .custom_top_image_page2 {
         margin: 0 auto;
         margin-bottom: 10px;
         padding-right: 10px;
         padding-left: 10px;
         float: left;
         width: 25%;
         box-sizing: border-box;
         text-align: center;
         }
         @media(max-width:900px){
         .custom_top_image_page2{
         width: initial;
         margin: 0 auto;
         margin-bottom: 20px;
         width: 50%;
         float: left;
         clear: none;}}
         .custom_top_image:nth-child(odd){clear: none;}
         .nome-modelo-destaque22 {
         background: #1b1b1b none repeat scroll 0 0;
         bottom: 3px;
         box-sizing: border-box;
         max-width: 100%;
         min-height: 25px;
         padding: 6px 11px 8px;
         position: absolute;
         text-align: center;
         transition: all 0.2s linear 0s;
         -moz-transition: all 0.2s linear 0s;
         -webkit-transition: all 0.2s linear 0s;
         -o-transition: all 0.2s linear 0s;
         -ms-transition: all 0.2s linear 0s;
         vertical-align: middle;
         color: #f58623;
         margin-right: 10px;
         }
         .despedida {text-align: center;background: #000000;}
         .descricao h1 {font-size: 16px;color: #f58623;}
         .page-fixed-width .index-isotope .item-isotope, .page-fixed-width .index-isotope article.featured-post, .page-fixed-width .featured-posts-slider-contents .item-isotope, .page-fixed-width .featured-posts-slider-contents article.featured-post, .page-fixed-width ul.products .item-isotope, .page-fixed-width ul.products article.featured-post {
         width: 16.6%;
         padding: 1%;
         }
         @media (max-width: 1072px) {
         .page-fixed-width .index-isotope .item-isotope, .page-fixed-width .index-isotope article.featured-post, .page-fixed-width .featured-posts-slider-contents .item-isotope, .page-fixed-width .featured-posts-slider-contents article.featured-post, .page-fixed-width ul.products .item-isotope, .page-fixed-width ul.products article.featured-post {
         width: 50%;
         padding: 1%;
         }
         }
         @media (min-width: 1475px){
         .paddalert {
         height: auto;
         margin: 0 auto;
         max-width: 1344px;
         min-width: 990px;
         position: relative;
         width: 100%;
         }}
         @media (max-width: 1475px){
         .paddalert {
         margin-left: 4%;
         margin-right: 4%;
         }}
         .paddalert h1 {font-size: 24px;}
         .back7 h2 {font-size: 24px;}
         .paddalert h1 {color: #fc9f34;font-weight: 500;}
         .conteudocerto h1 {color: #f58623;}
         .tnp-field.tnp-field-email {text-align: center;}
         @media (max-width: 600px){
         .portoads101 {
         width: 46%;
         float: left;
         margin: 1.5%;
         }
         .tnp-subscriptiongrakz input.tnp-submit {
         margin-top: 10px;
         }
         }
         .topvideonews h4 {background: #0c0c0c;padding: 5px;border-radius: 5px;color: #fc9c35;font-weight: 600;border: 1px solid #333333;text-align: center;}
         span.catecss a {
         color: #ffcc9e;
         font-weight: 600;
         }
         h1, .h1 {
         font-size: 24px;
         font-weight: 500;
         }
         td.maintd {
         color: #f9a236;
         font-weight: 600;
         font-size: 16px;
         }
         .paddalert h4 {
         text-align: center;
         font-weight: 500;
         background-color: #1f1f1f;
         padding: 5px;
         border: 1px solid #313131;
         }
         .infocard2 ul {
         margin-top: 10px;
         padding-left: 15px;
         }
         .tnp-field.tnp-field-email h6 {font-size: 16px;font-weight: 500;}
         .ori_custom_container_vimeos.kot2 {
         margin: 0 auto;
         display: table;
         }
         .right-div2 {
         border-radius: 10px;
         }
         @media (min-width: 600px){
         .wp-video {
         width: 100% !important;
         }
         }
         .top47 {
         text-align: center;
         font-size: 18px;
         }
         .titulotop57 {
         color: #ffffff;
         }
         .tnp-subscription {
         width: unset;
         margin: 0px;
         margin-left: 20px;
         }
         .tnp-subscription input[type=text], .tnp-subscription input[type=email], .tnp-subscription input[type=submit], .tnp-subscription select {
         height: 38px;
         color: #fff;
         background-color: #2f2f2f;
         margin-top: 2px
         }
         .tnp-subscription input[type=submit] {
         background-color: #464646;
         }
         .tnp-subscription input[type=email] {
         width: 240px;
         }
         .tnp-subscription div.tnp-field {
         margin-bottom: 0px;
         }
         .telegram {
         display: table;
         margin: 0 auto;
         font-weight: bold;
         background: #2a2a2a;
         padding: 6px 0px 6px 16px;
         border-radius: 6px;
         width: 140px;
         }
         .telegram img {
         max-height: 22px;
         margin-bottom: 3px !important;
         padding-right: 10px;
         }
         .spatele {
         margin-bottom: 10px;
         }
         ::-webkit-scrollbar {
display: none;
}
         body {  
         background-color:#000000;
         }
      </style>
                    <style>
.accordion {
    background-color: #232323;
    color: #fff;
    cursor: pointer;
    padding: 5px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
} 
.panel {
  padding: 0 18px;
  display: none;
  background-color: #23232300;
  overflow: hidden;
}
</style>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
      <!-- FIM DO CSS  -->
   </head>
   <body data-rsssl=1 class="home page-template page-template-page-masonry-condensed page-template-page-masonry-condensed-php page page-id-407 _masterslider _ms_version_3.7.10 menu-position-top menu-style-v2 no-sidebar not-wrapped-widgets no-ads-on-smartphones no-ads-on-tablets with-infinite-scroll page-fluid-width with-transparent-menu">
      <div class="all-wrapper with-loading">
      <!-- DESKTOP TOP MENU  -->
      <?php include("inc/menu.php"); ?>
      <div class="main-content-w" >
         <table style="width:100%; margin-top:35px; margin-bottom: 10px;">
            <tr>
               <td style="max-width:32%; text-align:center; font-size:11px;   ">
                   <a href="acompanhantes/todas" class="btn btn-danger btn-sm"   style="width:110px;  background-color: #15151500; border-color: #15151500; ">Acompanhantes <i class="fa fa-sort-desc"></i></a>    
          </td>
               <td style="max-width:32%; text-align:center; font-size:11px;   "> 
                <?php 
                if ($session->logged_in){?> 
                <a href="account/" class="btn btn-danger btn-sm"  style="  width:110px;background-color: #15151500; border-color: #15151500; "> Meu perfil <i class="fa fa-sort-desc"></i></a> 
                 <?php }
                else{?>
                <a href="" class="btn btn-danger btn-sm"   data-toggle="modal" data-target="#modal-anunciar" style="  width:110px;background-color: #15151500; border-color: #15151500; "> Quero anunciar <i class="fa fa-sort-desc"></i></a> 
                <?php } ?> </td>
               <td style="max-width:32%; text-align:center; font-size:11px;   ">
                   
                        
                        <a href="" class="btn btn-danger btn-sm"   data-toggle="modal" data-target="#modal-location" style=" width:110px; background-color: #15151500; border-color: #15151500; "> <font size="2px">  <i class="fa fa-map-marker"></i>  </font> São paulo <i class="fa fa-sort-desc"></i></a>
                        
                        </td>
            </tr>
         </table>
         <div class="largura_grakz" style="margin-top:1px; background-color: #151515;  border-radius: 35px;" >
            <div class="destaqueG">
               <div class="destaqueS">
                  <style>
                     .ms-inner-controls-cont{    margin-top: 0px;}
                     }
                  </style>
                  <style>
                     .swiper-container {
                     width:100%;
                     max-width: 706px;
                     height: 480px;
                     margin-left: auto;
                     margin-right: auto; 
                     }
                     @media(max-width:1500px){
                     .swiper-container {height: 400px;}		
                     }
                     @media(max-width:1400px){
                     .swiper-container {height: 380px;}		
                     }
                     @media(max-width:1300px){
                     .swiper-container {height: 360px;}		
                     }
                     @media(max-width:1250px){
                     .swiper-container {height: 340px;}		
                     }
                     @media(max-width:1150px){
                     .swiper-container {height: 315px;}		
                     }
                     @media(max-width:1050px){
                     .swiper-container {height: 286px;}		
                     }
                     @media(max-width:980px){
                     .swiper-container {height: 480px;}	
                     .ori_custom_container_homepage {
                     height: 510px !important;
                     }			
                     }
                     @media(max-width:700px){
                     .ori_custom_container_homepage {
                     height: auto !important;
                     }			
                     .destaqueG .destaqueS {
                     padding-left: 0%;
                     }
                     }
                     .swiper-slide {
                     background-size: cover;
                     background-position: center;
                     }
                     .gallery-thumbs {
                     height: 20%;
                     box-sizing: border-box;
                     padding: 10px 0;
                     }
                     .gallery-thumbs .swiper-slide{
                     background-size: contain;
                     }
                     .gallery-thumbs .swiper-slide {
                     height: 100%;
                     opacity: 0.4;
                     }
                     .gallery-thumbs .swiper-slide-thumb-active {
                     opacity: 1;
                     }
                     .ori_custom_container_homepage{
                     height:400px;
                     }
                     .entry-content{
                     max-width:100% !important;
                     }
                     .gallery-thumbs .swiper-slide{
                     background-size:cover !important;
                     }
                     .swiper-slide{
                     cursor:pointer;
                     }
                     @media(max-width:700px){
                     .swiper-container{
                     max-height:249px !important;
                     }
                     .swiper-slide{
                     }
                     .swiper-slide{
                     background-repeat:no-repeat;
                     background-size:contain; 
                     }
                     .gallery-thumbs{
                     padding-bottom:0;
                     height: 90px;
                     }
                     .ori_custom_container_homepage {
                     height: auto;
                     }
                     }
                     @media(min-width:1300px){
                     .gallery-thumbs {
                     height: 22%;
                     }}
                  </style>
                  <div class="ori_custom_container_homepage">
                     <div class="swiper-container gallery-top">
                        <div  style="margin-bottom:5px; border-radius:5px; ">
                           <table style="width:100%; border-bottom:solid red 1px; margin-bottom:18px;" >
                              <tr>
                                 <td style="width:20%; position:relative; top: -3px;" >
                                    <img src="account/img/ICONE VERMELHO.png" height="18px"> 
                                 </td>
                                 <td style="width:80%; text-align:center;  position:relative; left:-10%; font-size:25px;">
                                    Top Models 
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="swiper-wrapper" style="margin-top: -13px; padding: -2px;">
                           <?php 
                              $thumbimg=0; 
                               $thumbArray = array();
                              foreach ($consultaPlanoTOP as $pTop) {
                               if ((Tempo($pTop['time_plan']) >= 0) and ($pTop['grupo']) == 'REGISTERED') {  
                                   $id = $pTop['id'];  
                                $consultaFoto = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' and tamanho = 'HORIZONTAL' AND status = 'VISIBLE' AND tipo = 'FP'  ORDER BY RAND() LIMIT 1"); 
                                foreach($consultaFoto as $c){
                                    $thumbArray[] = $c;
                                    if($thumbimg ==8) break;
                                    $thumbimg++; 
                                    
                              ?>
                             <div data-bg="<?php echo 'account/files/midia/'.$c['file_path']; ?>"  class="swiper-slide linkimage rocket-lazyload lazyloaded" data-post-id="perfil/<?=$pTop['username']?>" style="background-size: 100% 100%; background-size: cover; border-radius:5px;"></div>  
                              
                           
                           <?php }} }  ?>
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev   swiper-button-white"></div>
                     </div>
                     <div class="swiper-container gallery-thumbs" style="margin-top: -5px;">
                        <div class="swiper-wrapper"> 
                           <?php foreach($thumbArray as $thumb){ 
                              $fotosThumb = '<div data-bg="account/files/midia/'.$thumb[3].'" class="swiper-slide rocket-lazyload" style="border-radius: 0px 0px 5px 5px;"></div>';
                              ?>  
                           <?=$fotosThumb;?>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <!-- .ori_custom_container_homepage -->
               </div>
               <div class="novidades" style="margin:0 auto">
                  <!-- TOP 4 DESKTOP -->   
                  <div  class="top4"style=" margin-bottom:5px; border-radius:5px; margin-left:10px; margin-right:10px;">
                     <table style="width:100%; border-bottom:solid red 1px;">
                        <tr>
                           <td style="width:20%; position:relative; top: -3px;" >
                              <img src="account/img/ICONE VERMELHO.png" height="18px"> 
                           </td>
                           <td style="width:80%; text-align:center ;  position:relative; left:-10%; font-size:25px;">
                              Top 4 Models
                           </td>
                        </tr>
                     </table>
                  </div>
                  <style>	
                     a.custom_top_image_link{
                     position:relative;
                     display:block;
                     display: inline-block;
                     }
                     .custom_top_image {
                     margin: 0 auto;
                     margin-bottom: 10px;
                     padding-right: 10px;
                     padding-left: 10px;
                     float: left;
                     max-width: 50%;
                     box-sizing: border-box;
                     text-align: center;
                     }
                     .custom_top_image:nth-child(odd){
                     clear: none;
                     }
                     @media(max-width:480px){
                     .custom_top_image{
                     width: initial;
                     margin: 0 auto;
                     margin-bottom: 20px;
                     max-width: 67%;
                     float: none;
                     clear: none;
                     }
                     }
                  </style>
                  <?php
                     $i=0;
                     foreach($consultaUsers_Top4 as $top4){
                     if ((Tempo($top4['time_plan']) >= 0) and ($top4['grupo']) == 'REGISTERED') { 
                         $id = $top4['id']; 
                     $consultaFoto = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' and tamanho = 'HORIZONTAL' AND  status = 'VISIBLE' AND tipo = 'FP'  ORDER BY RAND() LIMIT 1");
                     foreach($consultaFoto as $c){
                          if($i==4) break;  
                         $i++;   
                         
                           
                         
                     ?>
                  <div class="custom_top_image">
                     <a href="perfil/<?=$top4['username']?>" class="custom_top_image_link">
                        <img  src="<?php echo 'account/files/midia/'.$c['file_path']; ?>" class="attachment-full size-full resizeImgTop4001" alt="" title="" data-lazy-srcset="<?php echo 'account/files/midia/'.$c['file_path']; ?> 340w, <?php echo 'account/files/midia/'.$c['file_path']; ?> 300w" data-lazy-sizes="(max-width: 340px) 100vw, 340px" data-lazy-src="<?php echo 'account/files/midia/'.$c['file_path']; ?>" style="border-radius:5px;" />
                        <p class="nome-modelo-destaque2" style="border-radius: 5px;"><?=$top4['firstname']." ". $top4['lastname'];?></p>
                     </a>
                  </div>
                  <?php   }}}  ?>
               </div>
            </div>
            <div class="ori_custom_clear"></div>
            <div class="novid">
               <div  class="top4"style=" margin-bottom:5px; border-radius:5px; margin-left:10px; margin-right:10px;">
                  <table style="width:100%; border-bottom:solid red 1px; margin-bottom: -8px;">
                     <tr>
                        <td style="width:20%; position:relative; top: -3px;" >
                           <img src="account/img/ICONE VERMELHO.png" height="18px"> 
                        </td>
                        <td style="width:80%; text-align:center ;   position:relative; left:-10%; font-size:25px; ">
                           Destaques
                        </td>
                     </tr>
                  </table>
               </div>
               <div class="slider_custom_acf owl-carousel  owl-pagination-true autohide-arrows owl_theme custom_owl_theme">
                  <?php
                     $i=0;
                     foreach($consultaUsers_TopGT as $topGT){
                     if ((Tempo($topGT['time_plan']) >= 0) and ($topGT['grupo']) == 'REGISTERED') {
                         $id = $topGT['id']; 
                     $consultaFoto = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' and tamanho = 'HORIZONTAL' AND status = 'VISIBLE' AND tipo = 'FP'  ORDER BY RAND() LIMIT 1");
                     foreach($consultaFoto as $c){  
                         if($i==20) break;  
                         $i++;   
                     ?>
                  <div class="custom_acf_image_slider">
                     <a href="perfil/<?=$topGT['username']?>">
                        <img width="299" height="243" src="<?php echo 'account/files/midia/'.$c['file_path']; ?>" class="attachment-medium size-medium" alt="" title="" data-lazy-src="<?php echo 'account/files/midia/'.$c['file_path']; ?>"  style="border-radius:5px 5px 0px 0px; "/>
                        <noscript><img width="299" height="243" src="link_imagem.jpg" class="attachment-medium size-medium" alt="" title="" /></noscript>
                     </a>
                     <div class="titulo" style="border-radius: 0px 0px 5px 5px;"><?=$topGT['firstname']." ". $topGT['lastname'];?></div>
                  </div>
                  <?php  }}} ?>
               </div>
               <!-- .slider_custom_acf -->
            </div>
            <div class="destaquesMobile"  style=" margin-top:0px;">
               <!-- TOP 4 MOBILE -->
               <div class="regatas">
                  <div  class="top4"style="margin-bottom:5px; border-radius:5px; margin-left:10px; margin-right:10px;">
                     <table style="width:100%; border-bottom:solid red 1px;">
                        <tr>
                           <td style="width:20%; position:relative; top: -3px;" >
                              <img src="account/img/ICONE VERMELHO.png" height="18px"> 
                           </td>
                           <td style="width:80%; text-align:center ;  position:relative; left:-10%; font-size:25px;">
                              Top 4 Models
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="gatag">
                     <style>.custom_acf_image_link img{}</style> 
                     <?php
                     $im=0;
                     foreach($consultaUsers_Top4M as $top4M){
                     if ((Tempo($top4M['time_plan']) >= 0) and ($top4M['grupo']) == 'REGISTERED') {
                         $id = $top4M['id']; 
                     $consultaFotoTop4M = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' and tamanho = 'VERTICAL' AND status = 'VISIBLE' AND tipo = 'FP' ORDER BY RAND() LIMIT 1");
                     foreach($consultaFotoTop4M as $cm){ 
                         if($im==4) break;  
                         $im++;  
                      ?> 
                  <div class="portoads47">
                        <div class="custom_acf_image">
                           <a href="perfil/<?=$top4M['username']?>" class="custom_acf_image_link">
                              <img width="226" height="300" src="<?php echo 'account/files/midia/'.$cm['file_path']; ?>" class="attachment-medium size-medium" alt="<?=$top4M['firstname']." ". $top4M['lastname'];?>" title="" data-lazy-src="<?php echo 'account/files/midia/'.$cm['file_path']; ?>" style=" object-fit: cover; height: 240px; border-radius: 5px 5px 0px 0px;" />
                              <noscript><img width="226" height="300" src="<?php echo 'account/files/midia/'.$cm['file_path']; ?>" class="attachment-medium size-medium" alt="<?=$top4M['firstname']." ". $top4M['lastname'];?>" title="" /></noscript>
                           </a>
                           <div class="titulotop5" style="border-radius: 0px 0px 5px 5px;"><?=$top4M['firstname']." ". $top4M['lastname'];?></div>
                        </div>
                     </div> 
                  <?php  }}} ?>  
                  </div>
               </div>
            </div>
            
            <div class="destaquesMobile" align="">  
               <div style="min-height:20px"></div>
               <div align="left" class="top4">
                  <table style="width: 95.5%; border-bottom:solid red 1px; margin-bottom: 2px; <?php  if($MobDetect=='true'){ echo'margin-left: 7px;'; }else{ echo'margin-left: 3px;'; } ?>">
                     <tr>
                        <td style="width:20%; position:relative; top: -3px;" >
                           <img src="account/img/ICONE VERMELHO.png" height="18px"> 
                        </td>
                        <td style="width:80%; text-align:center ;   position:relative; left:-10%; font-size:25px; ">
                           Modelos
                        </td>
                     </tr>
                  </table>
               </div>
               <style>
                  .ori_custom_clear{
                  display:block;
                  float:none;
                  clear:both;
                  width:100%;
                  }
               </style>
               <div class="ori_custom_container_destaques" >
                  <?php  
                       if($MobDetect=='true'){ $tamanhoFtModelo='VERTICAL'; }else{$tamanhoFtModelo='HORIZONTAL';} 
                     foreach($consultaUsers_TodasModels as $userDesktop){ 
                     if ((Tempo($userDesktop['time_plan']) >= 0) and ($userDesktop['grupo']) == 'REGISTERED') {
                         $id = $userDesktop['id'];
                     
                     $consultaFoto = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' AND tamanho = '$tamanhoFtModelo' AND status = 'VISIBLE' AND tipo = 'FP'  ORDER BY RAND() LIMIT 1");
                     foreach($consultaFoto as $c){  
                     ?>
                  <div class="g-col b-4 a-24">
                     <div class="portoads4" style="padding-left:1x;">
                       <a class="gofollow" href="perfil/<?php echo $userDesktop['username'];?>">
                        <img class="resizeImg" src="<?php echo 'account/files/midia/'.$c['file_path']; ?>" alt="<?=$userDesktop['firstname']. " " .$userDesktop['lastname'];?>" style="border-radius:5px 5px 0px 0px;"></a>
                        <div class="">
                           <p class="nome-modelo-destaque" <?php if($MobDetect=='true'){ ?> style="border-radius: 0px 0px 5px 5px;" <?php }else{ ?> style="border-radius: 5px 5px 5px 5px;" <?php }  ?> ><?=$userDesktop['firstname']. " " .$userDesktop['lastname'];?></p>
                        </div>
                     </div>
                  </div>
                  <?php }} }  ?>
                  <div class="ori_custom_clear"></div> 
               </div>  
            </div> 
  <!-- pesquisar -->
  <div class="modal fade" id="modal-pesquisar" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#ffffff"> 
        <div class="modal-body">
        <form method="get" class="search-form" action="<?=$retorno;?>search.php" id="form-pesquisar" autocomplete="off">  
                       
         <input type="search" autocomplete="off" class="form-control" value="" name="s" id="s" placeholder="Nome da modelo"  style="height:40px;">
          
                <br>
                     <input type="submit" class="btn btn-danger"  value="Pesquisar"  style="width:100%; background-color: black; border-color: black;  " />
                
              
          </form>
        </div> 
      </div>
      
    </div>
  </div> 
   <!-- contato -->
  <div class="modal fade" id="modal-contato" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#111111; color:white; border: 3px solid #ffffff69;"> 
        <div class="modal-body"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/COR.png" height="36px"></center></td>
           </tr>
       </table><br>
       <table >
           <tr>
               <td>Para entrar em contato com a administração do site utilize os canais abaixo: </td>
           </tr>
       </table>
       
        <table >
           <tr>
               <td ><img src="../assets/imagens/whats.png" height="36px"></td>
               <td > (00) 0 0000-0000 </td>
           </tr>
       </table>
        <table >
            <tr>
               <td><img src="../assets/imagens/email.png" height="36px"></td>
               <td> contato@nossolove.com </td>
           </tr>
       </table>
       
        <hr>
        Se você deseja contratar uma acompanhante, entre em contato diretamente pelo número de telefone que consta no perfil da modelo de sua preferência.  NOSSOLOVE não é uma agência e sim um site adulto de classificados, dessa forma, não intermediamos a negociação entre usuários e anunciantes, toda e qualquer informação sobre serviços, horários e valores são obtidos com cada garota individualmente.
        
        
        </div> 
      </div>
      
    </div>
  </div>
  
   <!-- location -->
  <div class="modal fade" id="modal-location" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#111111; color:white;"> 
        <div class="modal-body"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/ICONE VERMELHO.png" height="26px"></center></td>
           </tr>
       </table><br>
      <center>Em breve em outros cidades e estados.</center> 
       
        
       
         
        
        </div> 
      </div>
      
    </div>
  </div>
  
   <!-- anunciar -->
  <div class="modal fade" id="modal-anunciar" role="dialog">
    <div class="modal-dialog " >  
      <div class="modal-content" style="margin-top:25%; background-color:#111111; color:white; "> 
        <div class="modal-body"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/ICONE VERMELHO.png" height="26px"></center></td>
           </tr>
       </table><br>
      <center>  
      <p style=" text-align: left; line-height: 1.0;">
        Se você é uma garota e deseja ser anunciada no Nosso Love será sua melhor decisão! 
        <br><br>
        Somos o melhor e mais seguro site de acompanhantes de luxo,   basta clicar em <span style="color:red;"><b>CADASTRE-SE</b></span> e será guiada ao registro simples e intuitivo. 
        <br><br>
        Ao cadastrar-se e assinar qualquer um de nossos planos, os primeiros 21 dias serão grátis!
  <br><br>
  <center>
      <a href="account/login.php?registro" class="btn btn-danger btn-sm" style="width:60%;  background-color:#ff0000; color:white;"> <font size="2px">    </font> CADASTRE-SE </a>   
  </center>  
      </p>
       
               
       </center>
         
        
        </div> 
      </div>
      
    </div>
  </div>
            <div class="main-footer with-social color-scheme-dark">
               <div class="footer-copy-and-menu-w">
                  <div class="footer-copyright">
                     <div style="float:left">© Copyright 2022 - Nosso Love </div>
                  </div>
               </div>
            </div>
         </div>
      
      </div>
    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>            
 <script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
         if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
         images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
         if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)
      </script>
     
      <script data-no-minify="1" async src="assets/content/plugins/wp-rocket/assets/js/lazyload/16.1/lazyload.min.js"></script>
      <script src="assets/content/cache/min/1/nl_871623698123123.js" data-minify="1" defer></script>
      
   </body>
</html>