<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Untitled Document</title>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
            <style>
                *{margin:0; padding:0}
                body {font-family: 'Raleway', sans-serif; font-size:14px; font-family:400; background:#f5f5f6;}
                .question {background: #FFF; margin: 15px;padding: 14px 16px;border-radius: 12px;box-shadow: 0px 0px 8px #E8E8E8;}
                .question-title {font-size: 15px; font-weight: 800; line-height: 20px;margin-left: 43px;}
                .input-submit input{background:#000; display:block; padding:10px 20px; border-radius:4px; color:#FFF; text-transform:uppercase; border:none; width:100%;}
                .question-title {margin-bottom:10px;}
                .input-submit input{display: inline-block; background-color: #fd20a9; padding: 13px 20px; font-family: 'Poppins', sans-serif; font-size: 14px; border-radius: 4px; color: #FFF; box-shadow: 0px 0px 2px #CCC; font-weight: bold; letter-spacing: 0.5px;}
                .input-cancel{display: inline-block; background-color: #fd20a9; padding: 13px 20px; font-family: 'Poppins', sans-serif; font-size: 14px; border-radius: 4px; color: #FFF; box-shadow: 0px 0px 2px #CCC; font-weight: bold; letter-spacing: 0.5px;}
                .question-number {background: #ff4f91; color: #FFF; float: left; border-radius: 50%; margin-right: 9px; width: 33px; height: 33px; text-align: center;
                                  line-height: 32px; font-weight:900;}
                .radio-toolbar {margin-left:42px;}
                .radio-option {letter-spacing: 0.5px;   display: block;   position: relative; padding-left: 23px; margin-bottom: 12px; /*cursor: pointer;*/ font-size: 12px;
                               -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none;}
                .radio-option input {position: absolute; opacity: 0; cursor: pointer;}
                .checkmark {position: absolute; top: 0; left: 0; height: 16px; width: 16px; background-color: #eee; border-radius: 50%;}
                .radio-option:hover input ~ .checkmark {background-color: #ccc;}
                .radio-option input:checked ~ .checkmark {background-color: #70f920;}
                .checkmark:after {content: ""; position: absolute; display: none;}
                .radio-option input:checked ~ .checkmark:after {display: block;}
                .radio-option .checkmark:after {top: 4px;left: 4px;	width: 8px;	height: 8px; border-radius: 50%;	background: white;}
                .submit {margin: 1px 15px 15px 15px; padding: 14px 16px; border-radius: 12px; width: calc(100% - 30px); border: none; background: #ff4f91; font-weight: 900;
                         text-transform: uppercase; color: #FFF; font-size: 17px;}
                .module-name {margin: 15px; padding: 0px 0px; font-weight: bold; font-size: 16px;}

                .btnnew{text-align: center;border-radius: 4px; padding: 13px 40px; margin-top: 10px; background: #f385b2;letter-spacing: 0.5px;color: #fff; font-family: 'Poppins', sans-serif;}
                .btnnew a{font-weight: bold;text-decoration: none; border-radius: 4px; padding: 13px 40px; margin-top: 10px; background: #f385b2;letter-spacing: 0.5px;color: #fff; font-family: 'Poppins', sans-serif;}
                .btnnew:hover { color: #fff;}

            </style>
    </head>

    <body>
        <div class="main-container" style="text-align: center;">
            <div class="module-name"><!--Module 1--></div>
            <?php echo $result; ?>
            <br></br>
            <div> 
                 <a href="<?php echo URL::to('/');?>/questionSubmitRedirection">
                    <span type="button" class="btn btn-primary" >Proceed</span>
                </a>
               
            </div>
        </div>



    </body>
</html>
<style>.ajaxloader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 0.7;
        background: url(<?php echo URL::to('/');?>/img/admin/fancybox_loading@2x.gif) 50% 50% no-repeat rgb(249,249,249);
    }</style>
<div class="ajaxloader" style="display: none;"></div>