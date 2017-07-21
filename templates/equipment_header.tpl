<div class="header">
    <span class="left"><b><{$smarty.const.MD_EQUIPMENT_TITLE}></b>&#58;&#160;</span>
    <span class="left"><{$smarty.const.MD_EQUIPMENT_DESC}></span><br>
</div>
<div class="head">
    <{if $adv != ''}>
        <div class="center"><{$adv}></div>
    <{/if}>
</div>
<br>
<ul class="nav nav-pills">
    <li class="active"><a href="<{$equipment_url}>"><{$smarty.const.MD_EQUIPMENT_INDEX}></a></li>

    <li><a href="<{$equipment_url}>/equipment.php"><{$smarty.const.MD_EQUIPMENT_EQUIPMENT}></a></li>
    <li><a href="<{$equipment_url}>/rentals.php"><{$smarty.const.MD_EQUIPMENT_RENTALS}></a></li>
    <li><a href="<{$equipment_url}>/customer.php"><{$smarty.const.MD_EQUIPMENT_CUSTOMER}></a></li>
</ul>

<br>
