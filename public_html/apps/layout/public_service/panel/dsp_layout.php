<?php
/**


This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
?>

<!DOCTYPE HTML>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Cache-Control" content="no-cache"/>
        <link rel="shortcut icon" href="<?php echo SITE_ROOT; ?>favicon.ico" />
        <title>Dịch vụ công::<?php echo $this->title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- theme resource -->
        <link href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/font-awesome.css">
        <!--[if IE 7]>
            <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/font-awesome-ie7.min.css">
        <![endif]-->
        <link href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/styles.css" rel="stylesheet">
        <link id="themes" href="#" rel="stylesheet">
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/ie/ie7.css" />
        <![endif]-->
        <!--[if IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/ie/ie8.css" />
        <![endif]-->
        <!--[if IE 9]>
            <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/ie/ie9.css" />
        <![endif]-->
        <link href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/css/dosis.css" rel="stylesheet" type="text/css">
        <!--fav and touch icons -->
        <link rel="shortcut icon" href="ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo SITE_ROOT; ?>public/themes/bootstrap/ico/apple-touch-icon-57-precomposed.png">
        <!--============j avascript===========-->
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/jquery.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/jquery-ui-1.8.16.custom.min.js"></script>
        <!--<script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery-ui.min.js" type="text/javascript"></script>-->
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/accordion.nav.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/custom.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/respond.min.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/ios-orientationchange-fix.js"></script>
        <script src="<?php echo SITE_ROOT; ?>public/themes/bootstrap/js/bootbox.js"></script>
        
        <!--============My resource===========-->
        <link href="<?php echo SITE_ROOT; ?>public/js/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!--  Datepicker -->
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.ui.datepicker-vi.js" type="text/javascript"></script>
        <!-- Right-click context menu -->
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.contextMenu.js" type="text/javascript"></script>
        <!-- Upload -->
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.MultiFile.pack.js" type="text/javascript"></script>
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.blockUI.js" type="text/javascript"></script>
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.MetaData.js" type="text/javascript"></script>
        <script src="<?php echo SITE_ROOT; ?>public/js/jquery/jquery.slimscroll.min.js"></script>
        
        <script type="text/javascript">
            var SITE_ROOT='<?php echo SITE_ROOT; ?>';
            var _CONST_LIST_DELIM = '<?php echo _CONST_LIST_DELIM; ?>';
             <?php $QS = check_htacces_file() ? '?' : '&'; ?>
            var QS = '<?php echo $QS; ?>';
        </script>
        <!--  Modal dialog -->
        <script src="<?php echo SITE_ROOT; ?>public/js/submodal.js" type="text/javascript"></script>
        <link href="<?php echo SITE_ROOT; ?>public/css/subModal.css" rel="stylesheet" type="text/css"/>
        <!-- Tooltip -->
        <script src="<?php echo SITE_ROOT; ?>public/js/overlib_mini.js" type="text/javascript"></script>
        <script src="<?php echo SITE_ROOT; ?>public/js/mylibs.js" type="text/javascript"></script>
        <script src="<?php echo SITE_ROOT; ?>public/js/DynamicFormHelper.js" type="text/javascript"></script>
        
        <!--style layout-->
        <link rel="stylesheet" href="<?php echo $this->stylesheet_url; ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>apps/layout/public_service/panel/layout.css" type="text/css" media="screen" />
        
        <?php if (isset($this->local_js)): ?>
            <script src="<?php echo $this->local_js; ?>" type="text/javascript"></script>
        <?php endif; ?>
        <script src="<?php echo FULL_SITE_ROOT . 'public/js/public_service/functions.js'?>"></script>   
    </head>
    <body>
        <div class="layout container-fluid"  >
            <div id="header" class="row-fluid ">
                <div id="banner" class="banner">
                    <img src="<?php echo FULL_SITE_ROOT . 'public/images/layout/public_service/banner.png' ?>" height="50px" width="100%" />
                </div>
                <!--End #banner-->
                <div id="menu-top" class="navbar navbar-inverse top-nav">
                    <div class="navbar-inner">
                        <div class="container">
                            <span class="home-link">
                                <a href="<?php echo FULL_SITE_ROOT . 'public_service/public_service' ?>" class="icon-home"></a>
                            </span>
                            <div class="nav-collapse">
                                <ul class="nav">
                                    <?php
                                        $v_active = ($this->menu_active == 'dsp_search')?'active':'';
                                    ?>
                                    <li class="<?php echo $v_active?>">
                                        <a  class="dropdown-toggle" href="<?php echo FULL_SITE_ROOT . 'public_service/public_service/dsp_search' ?>">
                                            Tra cứu
                                        </a>
                                    </li>
                                    <?php
                                        $v_active = ($this->menu_active == 'dsp_statistic')?'active':'';
                                    ?>
                                    <li class="<?php echo $v_active?>">
                                        <a  class="dropdown-toggle" href="<?php echo FULL_SITE_ROOT . 'public_service/public_service/dsp_statistic' ?>">
                                            Thống kê hồ sơ
                                        </a>
                                    </li>
                                    <?php
                                        $v_active = ($this->menu_active == 'dsp_guidance')?'active':'';
                                    ?>
                                    <li class="<?php echo $v_active?>">
                                        <a  class="dropdown-toggle" href="<?php echo FULL_SITE_ROOT . 'public_service/public_service/dsp_guidance' ?>">
                                            Hướng dẫn thủ tục
                                        </a>
                                    </li>
                                    <?php
                                        $v_active = ($this->menu_active == 'dsp_registration_list')?'active':'';
                                    ?>
                                    <li class="<?php echo $v_active?>">
                                        <a  class="dropdown-toggle" href="<?php echo FULL_SITE_ROOT . 'public_service/public_service/dsp_registration_list' ?>">
                                            Đăng ký hồ sơ
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <span style="float:right">
                                <?php
                                    $login_name = session::get('login_name');
                                    if ($login_name != NULL)
                                    {
                                ?>
                                    <a target="_blank" href="<?php echo $this->get_controller_url('dashboard','public_service');?>" onclick="row_ou_onclick_pop_win(38)" style="color: white;line-height: 40px;">
                                        <i class="icon-cogs"></i> 
                                        Quản trị nội dung
                                    </a>
                                <?php
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!--End #menu-top-->
            </div>
            <!--End #header-->
            <!--Start content-->
            <div id="main-layout" class="row-fluid ">
                <?php echo $content ?>
            </div>
            <!--End #main-layout-->
       
            <!--Start #footer-->
            <div id="footer" class="row-fluid ">
                <?php if(sizeof($this->arr_web_link) >0 ):;?>
                <?php $arr_web_link = $this->arr_web_link; ?>
                <div id="box-web-link" class="row-fluid">
                    <button class="btn" id="web-link-backward"><i class="icon-chevron-left"></i></button>
                    <div id="web-link" class="web-link scroll-img">                         
                        <ul>
                            <?php for($i =0;$i <sizeof($arr_web_link) ;$i++) :;?>
                            <?php 
                                $v_name = $arr_web_link[$i]['C_NAME']; 
                                $v_img  = CONST_SITE_IMG_ROOT. $arr_web_link[$i]['C_FILE_NAME']; 
                                $v_url  = $arr_web_link[$i]['C_URL']; 
                            ?>
                                <li>
                                    <?php  
                                        echo "<a href='$v_url' target='_blank' > <img title='$v_name' src='$v_img' width= '100%' height='auto' /></a>";
                                      ?>
                                </li>
                            <?php endfor;?>

                        </ul>
                    </div>
                    <button class="btn" id="web-link-forward"><i class="icon-chevron-right"></i></button>
                </div>
                <!--End #weblink-->
                <?php endif;?>
                <script>
                    $(document).ready(function(){
                        var selector          = '#web-link.scroll-img ul';
                        var width_scroll_item = $(selector + ' li').first().outerWidth() || 0;
                        var count_item        =  $('li',$(selector)).length;
                       
                        var width_box_item    = $('#web-link').outerWidth();
                        var count_show_item   = parseInt(width_box_item/width_scroll_item) || 0;                        
                        $(selector).width(width_scroll_item * count_item + 10);                       
                        var width_box_item    = $('#web-link').width(count_show_item  * width_scroll_item + 10);
                        //fix width  #web-link when reponse
                        $(window).resize(function(){
                            $('#web-link').css('width','auto');
                            var width_box_item    = $('#web-link').outerWidth();
                            var count_show_item   = parseInt(width_box_item/width_scroll_item) || 0;
                            var width_box_item    = $('#web-link').width(count_show_item  * width_scroll_item + 10);
                        });
                        
                        if(count_item > count_show_item)
                        {
                            $('#web-link-backward').show();
                            $('#web-link-forward').show();
                            $('#web-link').scrollbox({
                                direction: 'scrollLeft',
                                distance: $('#web-link ul li:first').outerWidth() || 0,
                                switchItems:1
                            });
                            $('#web-link-backward').click(function () {
                                $('#web-link').trigger('backward');
                            });
                            $('#web-link-forward').click(function () {
                                $('#web-link').trigger('forward');
                            });
                        }
                        else
                        {
                            $('#web-link-backward').hide();
                            $('#web-link-forward').hide();
                        }
                    });
                    
                </script>
                <div class="copyright">&COPY;Dịch vụ công trực tuyến</div>
                <!--End .copyright-->
            </div>
            <!--End #footer-->
        </div>

    </body>
</html>