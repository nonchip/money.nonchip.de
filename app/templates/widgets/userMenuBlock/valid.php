<li class="menu-item-divided pure-menu-disabled userMenuBlock">
    <a name="userMenuBlock-greeting" class="greeting">Hi,
        <span class="username"><?=$user->username?></span>!</a>
    <a name="userMenuBlock-balanceSum" class="balanceSum">
        Your Balance: <?=$balanceSum?>
    </a>
</li>
<li class="userMenuBlock">
    <a href="/account">Accounts</a>
</li>
<li class="userMenuBlock">
    <a href="/auth/logout">Log out</a>
</li>
