<{include file="db:equipment_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Rentals </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_ID}></th>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_CUSTOMERID}></th>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_EQUIPMENTID}></th>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_QUANTITY}></th>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_DATEFROM}></th>
            <th><{$smarty.const.MD_EQUIPMENT_RENTALS_DATETO}></th>
            <th><{$smarty.const.MD_EQUIPMENT_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=rentals from=$rentals}>
            <tbody>
            <tr>

                <td><{$rentals.id}></td>
                <td><{$rentals.customerid}></td>
                <td><{$rentals.equipmentid}></td>
                <td><{$rentals.quantity}></td>
                <td><{$rentals.datefrom}></td>
                <td><{$rentals.dateto}></td>
                <td>
                    <a href="rentals.php?op=view&id=<{$rentals.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>"
                                                                                                             title="<{$smarty.const._PREVIEW}>"</a> &nbsp;
                    <{if $xoops_isadmin == true}>
                        <a href="admin/rentals.php?op=edit&id=<{$rentals.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>"
                                                                                                                    title="<{$smarty.const._EDIT}>"/></a>
                        &nbsp;
                        <a href="admin/rentals.php?op=delete&id=<{$rentals.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>"
                                                                                                                        title="<{$smarty.const._DELETE}>"</a>
                    <{/if}>
                </td>
            </tr>
            </tbody>
        <{/foreach}>
    </table>
</div>
<{$pagenav}>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:equipment_footer.tpl"}>
