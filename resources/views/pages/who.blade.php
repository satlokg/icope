<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Arial:wght@300;400;500&display=swap" rel="stylesheet">

<style>
*{margin:0; padding:0}
body {font-family: 'Roboto', sans-serif; font-size:14px; color:#333; background:#fff;}
.content-area {margin:0 12px; background:#FFF; border-radius:10px; padding:20px !important;}
.number {height: 100%;float: left;margin-right: 6px;clear: both;display: block;padding: 0px 0 25px 0;}
p {margin-bottom:20px; line-height:24px; color:#000; text-align:justify !important;}
.text-center {text-align:center;}
.h1,h1 {font-size:24px !important;margin:20px 0; !important;}
.h3,h3 {color:#50c2bb !important; font-size: 16px !important;}
.h2,h2 {font-size:18px !important;}
.h1 span ,h1 span {display:block; font-size:14px !important;margin-top:8px !important;}
.accordion {margin-bottom:15px;}
.accordion label{display:block;background-color:#f8f8f8;padding:15px 15px;color:#00579a;cursor:pointer; border-radius:6px;}
.accordion div{color:#666; line-height:24px;opacity:0;display:none;text-align:left;background-color:#fff;margin:10px 0}
#tm:checked ~ .hiddentext{display:block;opacity:1}
input#tm{display:none;position:relative}
#tm1:checked ~ .hiddentext{display:block;opacity:1}
input#tm1{display:none;position:relative}
#tm2:checked ~ .hiddentext{display:block;opacity:1}
input#tm2{display:none;position:relative}
#tm3:checked ~ .hiddentext{display:block;opacity:1}
input#tm3{display:none;position:relative}
#tm4:checked ~ .hiddentext{display:block;opacity:1}
input#tm4{display:none;position:relative}
#tm5:checked ~ .hiddentext{display:block;opacity:1}
input#tm5{display:none;position:relative}
#tm6:checked ~ .hiddentext{display:block;opacity:1}
input#tm6{display:none;position:relative}
#tm7:checked ~ .hiddentext{display:block;opacity:1}
input#tm7{display:none;position:relative}
#tm8:checked ~ .hiddentext{display:block;opacity:1}
input#tm8{display:none;position:relative}
#tn:checked ~ .hiddentext{display:block;opacity:1}
input#tn{display:none;position:relative}
#to:checked ~ .hiddentext{display:block;opacity:1}
input#to{display:none;position:relative}
.arrow{color:#666}
.accordion label h2 {font-size:18px; font-weight:500; margin:0 !important}
.arrow-l1st {padding:0; margin:0;}
.arrow-l1st li { color:#000; background:url("<?php echo $baseUrl;?>/img/arrow.png"); list-style:none; background-repeat:no-repeat; background-position:0 5px; padding-left:15px; margin-bottom:20px;}
.arrow-l1st-white {padding:0; margin:0;}
.arrow-l1st-white li { color:#666; background:url("<?php echo $baseUrl;?>/img/white-arrow.png"); list-style:none; background-repeat:no-repeat; background-position:0 5px; padding-left:15px; margin-bottom:20px;}
.back-box{background:#50c2bb; border-left:6px solid #0057a4; padding:20px 0 20px 0; margin-bottom:15px;}
.back-box h2 {background: #0057a4;color: #50c2bb;/*text-transform: uppercase;*/margin-top: 0px;padding: 11px;width: auto;display: inline-block;font-size: 24px !important;}
.back-box ul {margin:20px;}
.back-box ul li {color:#FFF;}
.blue-heading {color: #0057a4; font-weight:500; margin-bottom: 15px;}
.imgs {width: 100%}
.tab-header { background:#50c2bb; font-size: 16px; color: #fff;padding: 10px; }
.blue-box {border:1px solid #0057a4; background:#f4faf9; padding:10px; margin-bottom:20px; display:block !important; opacity:1 !important}
.tclass tr td{ border-right: 1px solid #50c2bb; border-bottom: 1px solid #50c2bb; padding:6px; vertical-align: top;}
.tclass tr th{ border-right: 1px solid #43aaa4; border-bottom: 1px solid #50c2bb; padding:6px; }
.tclass tr td:first-child{ border-left: 1px solid #50c2bb;}
table {margin:0; padding:0}
.spanc{font-weight: bold; font-size: 16px;}


.blue-heading {color: #0057a4; font-weight:500;}
.blue-box {border:1px solid #0057a4; background:#f4faf9 !important; padding:10px; margin-bottom:20px;}
strong {margin-bottom:10px; display:block;}
  h1 { font-weight: bold; font-size: 39pt; }
 .s1 { font-weight: normal; font-size: 21pt; }
 .s2 { color: #0057A4; font-weight: normal; font-size: 40pt; }
 .s3 { color: #0057A4; font-weight: normal; font-size: 20pt; }
 .s4 { color: #0057A4; font-weight: normal; font-size: 16pt; }
 .s5 { color: #58595B; font-weight: bold; font-size: 9pt; }
 .s6 { color: #231F20; font-weight: normal; font-size: 9pt; }
 .s7 { color: #231F20; font-family: monospace; font-weight: normal; font-size: 9pt; }
 .s8 { color: #231F20; font-weight: normal; font-size: 9pt; }
 .s9 { color: #0057A4; font-weight: normal; font-size: 50pt; }
 .s10 { color: #231F20; font-weight: normal; font-size: 11.5pt; }
 .s11 { color: #D91F26; font-weight: normal; font-size: 14pt; }
 .p, p { color: #231F20; font-weight: normal; font-size: 10.5pt; }
 .s12 { color: #0057A4; font-weight: bold; font-size: 10.5pt; }
 .s13 { color: #0057A4; font-weight: normal; font-size: 10pt; }
 .s14 { color: #231F20; font-family: monospace; font-weight: normal; font-size: 10.5pt; }
 .s15 { color: #0057a4; font-weight: normal; font-size: 30px; text-align:center; f0o }
 .s16 { color: #50C2BB; font-weight: normal; font-size: 16pt; }
 .s17 { font-weight: normal; font-size: 10.5pt; }
 .s18 { color: #231F20; font-style: italic; font-weight: normal; font-size: 10.5pt; }
 .s19 { color:#666; background:url("bicky/arrow.png"); list-style:none; background-repeat:no-repeat; background-position:0 8px; padding-left:15px; margin-bottom:20px; }
 .s20 { color: #50C2BB; font-weight: normal; font-size: 12.5pt; }
 .s21 { color: #231F20; font-family: monospace; font-style: italic; font-weight: normal; font-size: 10.5pt; }
 .s22 { color: #0057A4; font-weight: normal; font-size: 17pt; }
 .s23 { color: #0057A4; font-weight: normal; font-size: 53.5pt; }
 .s24 { font-family: monospace; font-weight: normal; font-size: 10.5pt; }
 .s25 { color: #50C2BB; font-family: monospace; font-weight: normal; font-size: 12.5pt; }
 .s26 { font-weight: bold; font-size: 10.5pt; }
 .s27 { color: #0057A4; font-weight: bold; font-size: 10pt; }
 .s28 { color: #231F20; font-weight: normal; font-size: 10pt; }
 .s29 { color: #231F20; font-family: monospace; font-weight: normal; font-size: 10pt; }
 .s30 { color: #0057A4; font-family: monospace; font-weight: bold; font-size: 10pt; }
 .s31 { color: #58595B; font-weight: normal; font-size: 10.5pt; }
 .s32 { color: #58595B; font-weight: normal; font-size: 16pt; }
 .s33 { color: #404041; font-weight: normal; font-size: 8pt; }
 a { color: #404041; font-weight: normal; font-size: 8pt; }
 .s34 { color: #58595B; font-weight: bold; font-size: 12pt; }
 .s35 { color: #000; font-weight: bold; font-size: 11pt; }
 .s36 { color: #0057A4; font-weight: normal; font-size: 10.5pt; }
 .s37 { color: #0057A4; font-weight: normal; font-size: 10.5pt; }
 .s38 { font-weight: normal; font-size: 13pt; }
 h4 { color: #58595B; font-weight: bold; font-size: 14pt; }
 .s39 { color: #231F20; font-weight: normal; font-size: 10pt; }
 .s40 { color: #58595B; font-weight: bold; font-size: 8pt; }
 .s41 { color: #231F20; font-weight: normal; font-size: 8pt; }
 .s42 { color: #58595B; font-weight: normal; font-size: 12pt; }
 .s43 { color: #58595B; font-weight: normal; font-size: 8pt; }
 .s44 { color: #50C2BB; font-weight: normal; font-size: 10pt; }
 .s45 { color: #58595B; font-weight: normal; font-size: 6pt; }
 .s46 { color: #58595B; font-weight: bold; font-size: 10.5pt; }
 .s47 { color: #58595B; font-weight: bold; font-size: 10.5pt; }
 .s48 { color: #58595B; font-weight: bold; font-size: 11pt; }
 .s49 { color: #50C2BB; font-weight: normal; font-size: 10.5pt; }
 .s50 { color: #231F20; font-weight: normal; font-size: 10.5pt; }
 .s51 { color: #231F20; font-family: monospace; font-weight: normal; font-size: 10.5pt; }
 .s52 { color: #0057A4; font-style: italic; font-weight: normal; font-size: 10.5pt; }
 .s53 { font-weight: bold; font-size: 10pt; }
 .s54 { font-weight: normal; font-size: 10pt; }
 .s55 { color: #58595B; font-weight: bold; font-size: 10pt; }
 .s57 { color: #58595B; font-family: monospace; font-weight: bold; font-size: 11pt; }
 .s58 { color: #58595B; font-weight: normal; font-size: 10pt; }
 .s59 { color: #50C2BB; font-weight: bold; font-size: 10pt; }
 .s60 { color: #0057A4; font-weight: bold; font-size: 10pt; }
 .s61 { font-weight: normal; font-size: 9pt; }
 .s62 { font-weight: bold; font-size: 13pt; }
 .s63 { font-weight: bold; font-size: 12pt; }
 .s65 { color: #231F20; font-weight: normal; font-size: 10pt; }
 .s66 { font-weight: bold; font-size: 9pt; }
 .s68 { color: #231F20; font-weight: normal; font-size: 10.5pt; }
 .s69 { color: #0057A4; font-weight: normal; font-size: 10pt; }
 .s70 { color: #0057A4; font-weight: normal; font-size: 10pt; }
 .s71 { color: #010202; font-weight: normal; font-size: 8pt; }
 .s72 { color: #50C2BB; font-weight: normal; font-size: 16pt; }
 .s73 { font-weight: normal; font-size: 10.5pt; }
 .s74 { color: #010202; font-weight: normal; font-size: 9pt; }
 .s75 { font-weight: bold; font-size: 10pt; }
 .s76 { font-weight: normal; font-size: 10pt; }
 .s77 { color: #0057A4; font-family: monospace; font-weight: bold; font-size: 10.5pt; }
 .s78 { color: #58595B; font-family: monospace; font-weight: bold; font-size: 12pt; }
 .s79 { color: #50C2BB; font-weight: normal; font-size: 10pt; }
 .s80 { font-family: monospace; font-weight: normal; font-size: 10pt; }
 .s81 { font-weight: normal; font-size: 9pt; }
 .s82 { color: #476DB1; font-weight: bold; font-size: 12pt; }
 .s83 { color: #0057A4; font-weight: bold; font-size: 14pt; }
 .s84 { color: #0057A4; font-weight: bold; font-size: 8pt; }
 .s85 { color: #0057A4; font-weight: bold; font-size: 9pt; }
 .s86 { color: #0057A4; font-weight: bold; font-size: 7pt; }
 .s87 { color: #8AD1CD; font-weight: normal; font-size: 7.5pt; }
 .s88 { color: #50C1BA; font-weight: normal; font-size: 12pt; }
 .s89 { color: #525254; font-weight: normal; font-size: 6pt; }
 .s92 { color: #262A3B; font-weight: normal; font-size: 9.5pt; }
 .s93 { color: #262A3B; font-weight: normal; font-size: 8.5pt; }
 .s94 { color: #262A3B; font-weight: normal; font-size: 10.5pt; }
 .s96 { color: #262A3B; font-weight: normal; font-size: 9pt; }
 .s98 { color: #131621; font-weight: normal; font-size: 12.5pt; }
 .s99 { color: #262A3B; font-weight: normal; font-size: 9pt; }
 .s101 { color: #262A3B; font-weight: normal; font-size: 10pt; }
 .s102 { color: #131621; font-weight: normal; font-size: 10pt; }
 .s103 { color: #131621; font-weight: normal; font-size: 27.5pt; }
 .s104 { color: #3F4146; font-weight: normal; font-size: 8pt; }
 .s105 { color: #525254; font-weight: normal; font-size: 7.5pt; }
 .s106 { color: #0156A3; font-weight: normal; font-size: 10.5pt; }
 .s107 { font-weight: bold; font-size: 10.5pt; }
 .s108 { color: #404041; font-family: monospace; font-weight: normal; font-size: 8pt; }
 .s109 { color: #58595B; font-weight: normal; font-size: 11pt; }
 .s110 { color: #58595B; font-weight: bold; font-size: 11pt; }
 .s112 { color: #231F20; font-style: italic; font-weight: normal; font-size: 10pt; }
 .s113 { color: #231F20; font-style: italic; font-weight: normal; font-size: 10pt; }
 .s114 { color: #231F20; font-weight: normal; font-size: 5.5pt; }
 .s115 { color: #231F20; font-weight: bold; font-size: 10pt; }
 .s116 { color: #231F20; font-weight: bold; font-size: 10.5pt; }
 .s117 { color: #8AD1CD; font-style: italic; font-weight: normal; font-size: 8pt; }
 .s118 { color: #8AD1CD; font-weight: normal; font-size: 10.5pt; }
 h2 { color: #0056A3; font-weight: bold; font-size: 17pt; }
 .s119 { color: #2A5789; font-weight: normal; font-size: 16pt; }
 .s122 { color: #2A5789; font-weight: bold; font-size: 14.5pt; }
 .s124 { color: #575D66; font-weight: normal; font-size: 8pt; }
 .s126 { color: #42495D; font-weight: normal; font-size: 8pt; }
 .s127 { color: #575D66; font-weight: normal; font-size: 9pt; }
 .s128 { color: #575D66; font-weight: normal; font-size: 9pt; }
 .s130 { color: #6E7474; font-weight: normal; font-size: 8pt; }
 .s131 { color: #575D66; font-style: italic; font-weight: normal; font-size: 9pt; }
 .s133 { color: #B8D1E9; font-weight: normal; font-size: 9.5pt; }
 .s135 { color: #2B2D38; font-weight: normal; font-size: 8pt; }
 .s136 { color: #2B2D38; font-weight: normal; font-size: 8.5pt; }
 .s138 { color: #2F3A57; font-weight: normal; font-size: 8pt; }
 .s140 { color: #575D66; font-weight: normal; font-size: 8.5pt; }
 .s141 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 8.5pt; }
 .s142 { color: #42495D; font-style: italic; font-weight: normal; font-size: 9.5pt; }
 .s144 { color: #42495D; font-style: italic; font-weight: normal; font-size: 8.5pt; }
 .s145 { color: #42495D; font-weight: normal; font-size: 14pt; }
 .s148 { color: #2B2D38; font-weight: normal; font-size: 8.5pt; }
 .s149 { color: #575D66; font-style: italic; font-weight: normal; font-size: 12.5pt; }
 .s150 { color: #575D66; font-weight: normal; font-size: 9.5pt; }
 .s151 { color: #575D66; font-weight: normal; font-size: 7.5pt; }
 .s152 { color: #575D66; font-style: italic; font-weight: normal; font-size: 8.5pt; }
 .s153 { color: #575D66; font-weight: normal; font-size: 14.5pt; }
 .s154 { color: #2B2D38; font-weight: normal; font-size: 10.5pt; }
 .s155 { color: #575D66; font-weight: normal; font-size: 13pt; }
 .s156 { color: #575D66; font-style: italic; font-weight: normal; font-size: 9pt; }
 .s157 { color: #575D66; font-weight: normal; font-size: 8.5pt; }
 .s158 { color: #858A8C; font-style: italic; font-weight: normal; font-size: 8.5pt; }
 .s159 { color: #575D66; font-weight: normal; font-size: 10pt; }
 .s160 { color: #575D66; font-weight: normal; font-size: 10.5pt; }
 .s161 { color: #181C28; font-weight: normal; font-size: 9pt; }
 .s162 { color: #2B2D38; font-weight: normal; font-size: 9pt; }
 .s163 { color: #42495D; font-weight: normal; font-size: 13.5pt; }
 .s164 { color: #575D66; font-style: italic; font-weight: normal; font-size: 9.5pt; }
 .s166 { color: #575D66; font-weight: normal; font-size: 13.5pt; }
 .s167 { color: #181C28; font-weight: normal; font-size: 8.5pt; }
 .s168 { color: #42495D; font-weight: normal; font-size: 5pt; }
 .s169 { color: #42495D; font-style: italic; font-weight: normal; font-size: 9pt; }
 .s170 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 12.5pt; }
 .s171 { color: #575D66; font-weight: normal; font-size: 7.5pt; }
 .s177 { color: #42495D; font-weight: normal; font-size: 8pt; }
 .s180 { color: #575D66; font-weight: normal; font-size: 10.5pt; }
 .s181 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 9.5pt; }
 .s183 { color: #6E7474; font-weight: normal; font-size: 9pt; }
 .s184 { color: #B8D1E9; font-weight: normal; font-size: 8pt; }
 .s186 { color: #B8D1E9; font-weight: normal; font-size: 9.5pt; }
 .s188 { color: #FBFDFF; font-weight: normal; font-size: 4.5pt; }
 .s189 { color: #2F3A57; font-weight: normal; font-size: 9pt; }
 .s190 { color: #42495D; font-weight: normal; font-size: 9pt; }
 .s191 { color: #42495D; font-weight: normal; font-size: 12pt; }
 .s192 { color: #2F3A57; font-weight: normal; font-size: 12pt; }
 .s193 { color: #42495D; font-weight: normal; font-size: 8.5pt; }
 .s195 { color: #575D66; font-weight: normal; font-size: 15pt; }
 .s196 { color: #575D66; font-weight: normal; font-size: 6.5pt; }
 .s197 { color: #6E7474; font-weight: normal; font-size: 7pt; }
 .s200 { color: #575D66; font-weight: normal; font-size: 7pt; }
 .s201 { color: #858A8C; font-style: italic; font-weight: normal; font-size: 6.5pt; }
 .s202 { color: #6E7474; font-weight: normal; font-size: 6.5pt; }
 .s203 { color: #6E7474; font-weight: normal; font-size: 7.5pt; }
 .s204 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 6.5pt; }
 .s205 { color: #6E7474; font-weight: normal; font-size: 7.5pt; }
 .s206 { color: #6E7474; font-weight: normal; font-size: 7pt; }
 .s208 { color: #999C9E; font-weight: normal; font-size: 7pt; }
 .s209 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 7pt; }
 .s210 { color: #575D66; font-style: italic; font-weight: normal; font-size: 6.5pt; }
 .s211 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 6pt; }
 .s212 { color: #A8ACAF; font-style: italic; font-weight: normal; font-size: 6pt; }
 .s215 { color: #A8ACAF; font-style: italic; font-weight: normal; font-size: 7pt; }
 .s216 { color: #999C9E; font-style: italic; font-weight: normal; font-size: 6.5pt; }
 .s218 { color: #6E7474; font-style: italic; font-weight: normal; font-size: 8pt; }
 .s219 { color: #7E7964; font-weight: normal; font-size: 7pt; }
 .s220 { color: #575D66; font-weight: normal; font-size: 7pt; }
 .s221 { color: #858A8C; font-weight: normal; font-size: 7pt; }
 .s222 { color: #A8ACAF; font-weight: normal; font-size: 7pt; }
 .s223 { color: #999C9E; font-weight: normal; font-size: 7pt; }
 .s224 { color: #AF858E; font-weight: normal; font-size: 7pt; }
 .s226 { color: #999C9E; font-style: italic; font-weight: normal; font-size: 7pt; }
 .s227 { color: #6E7474; font-weight: normal; font-size: 8.5pt; }
 .s230 { color: #575D66; font-weight: normal; font-size: 6.5pt; }
 .s231 { color: #0056A3; font-weight: normal; font-size: 11pt; }
	.btnnew {border-radius: 30px !important; padding: 10px 40px; background: #f385b2;font-size: 18px;color: #fff;}
	.btnnew:hover { color: #fff;}
	
.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{
	display:block;
	padding-left: 10px;
    padding-top: 5px;
  color: #0057a4!important;
  font-size:16px;
  font-weight:bold;
	
	letter-spacing:1px;
  word-spacing:1px;
	text-decoration:none;
}
.panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
}
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
} 
a:focus, a:hover {
  
    text-decoration: none !important;
}
.panel-heading {
    padding-left: 17px !important;
    padding-top: 10px !important;
}
.panel {
   
    border: none !important;
 
}

.arrow-icon {
color: #000;
    background: url(<?php echo $baseUrl;?>/img/arrow.png);
    list-style: none;
    background-repeat: no-repeat;
    background-position: 0 7px;
    padding-left: 15px;
    margin-bottom: 5px;
}
.hiddentext{
 text-align:justify !important;
}
</style>
<?php echo $this->Html->css('custom_stylesheet');?>
<?php echo $this->Html->css('bootstrap.min');?>
<?php echo $this->Html->script('jquery-2.2.4.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>

<script>
$(document).ready(function() {
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
});

</script>
<!--
<script src="https://patiek.github.io/gallerie/demos/jquery.gallerie.js"></script>
<link rel="stylesheet" type="text/css" href="https://patiek.github.io/gallerie/demos/gallerie.css"/>
<link rel="stylesheet" type="text/css" href="https://patiek.github.io/gallerie/demos/gallerie-effects.css"/>

<script type="text/javascript">
$(document).ready(function(){
	$('.img-gallery').gallerie();
});

</script>

<style>
	body {
		background-color: black;
	}
	
	#gallery {
		margin-left: auto;
		margin-right: auto;
	}
</style>
-->
</head>

<body>
<div class="main-content">
<!--<h1 class="text-center">Module <?php echo $module->name;?> <span>Communication with older people</span></h1>-->
<?php //echo $module->description;?>
<?php //echo str_replace("{{DEVICE}}",$deviceToken,str_replace("{{EMAIL}}",$email,$module->description));?>
  <?php echo  str_replace("{{BASEURL}}", URL::to('/'), str_replace("{{DEVICE}}",$device,str_replace("{{EMAIL}}",$device,$module->description)))?>
  
</div>
 <!--
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-for-Image-Zoom-In-Out-With-Mousewheel-imgViewer/libs/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-for-Image-Zoom-In-Out-With-Mousewheel-imgViewer/libs/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-for-Image-Zoom-In-Out-With-Mousewheel-imgViewer/src/imgViewer.js"></script>

<script type="text/javascript">
   
    (function ($) {
 
        $(".imgs").imgViewer({
            onClick: function (e, self) {
                var pos = self.cursorToImg(e.pageX, e.pageY);
                $("#position").html(e.pageX + " " + e.pageY + " " + pos.relx + " " + pos.rely);
            }
        });
        
    })(jQuery);
</script>
-->
</body>
</html>
