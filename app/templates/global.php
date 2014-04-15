<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(strlen($header)>0?$header.' :: ':'')?>money.nonchip.de</title>
    <link rel="stylesheet" href="/static/pure-min.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet"
          href="/static/pure-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet"
          href="/static/pure-style.css">
    <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="/static/html5shiv.js"></script>
    <![endif]-->

    <link rel="stylesheet/less" type="text/css" href="/static/hope.less" />
    <script src="/static/less.min.js"></script>

</head>
<body>
<a href="//github.com/nonchip/money.nonchip.de" target="_blank" style="z-index:999"><img style="z-index:999;position: absolute; top: 0; right: 0; border: 0;" src="/static/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>
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


<script src="/static/pure-script.js"></script>


</body>
</html>
