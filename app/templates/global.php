<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(strlen($header)>0?$header.' :: ':'')?>money.nonchip.de</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet"
          href="//purecss.io/combo/1.11.5?/css/main-grid-old-ie.css&/css/main-old-ie.css&/css/customize.css&/css/rainbow/baby-blue.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet"
          href="//purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/customize.css&/css/rainbow/baby-blue.css">
    <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <![endif]-->

    <link rel="stylesheet/less" type="text/css" href="/static/hope.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.0/less.min.js"></script>

</head>
<body>
<a href="http://github.com/nonchip/money.nonchip.de" target="_blank" style="z-index:999"><img style="z-index:999;position: absolute; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>
<div id="layout">
<a href="#menu" id="menuLink" class="menu-link">
    <span></span>
</a>
<div id="menu">
    <div class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="/">ncMoney</a>
        <ul>
            <?php if(isset($automenu)) foreach($automenu as $name=>$link): ?>
                <li>
                    <a href="<?=$link?>"><?=$name?></a>
                </li>
            <?php endforeach; ?>
            <?=$staticmenu?>
            <?=$usermenublock?>
        </ul>
    </div>
</div>


<div id="main">
    <?php if(strlen($header)>0): ?>
        <div class="header">
            <?=$header?> :: money.nonchip.de
        </div>
    <?php endif; ?>
    <div class="content">
        <?=$content?>
    </div>
</div>


<script src="//purecss.io/combo/1.11.5?/js/ui.js&/vendor/rainbow/js/rainbow.min.js&/vendor/rainbow/js/language/generic.js&/vendor/rainbow/js/language/html.js&/vendor/rainbow/js/language/css.js&/vendor/rainbow/js/language/javascript.js&/vendor/rainbow/js/language/shell.js"></script>


</body>
</html>
