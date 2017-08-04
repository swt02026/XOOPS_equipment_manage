<{include file="db:equipment_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Equipment </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_ID}></th>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_OWNER}></th>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_NAME}></th>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_AMOUNT}></th>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_TOTAL}></th>
            <th><{$smarty.const.MD_EQUIPMENT_EQUIPMENT_IMAGE}></th>
            <th><{$smarty.const.MD_EQUIPMENT_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=equipment from=$equipment}>
            <tbody>
            <tr>

                <td><{$equipment.id}></td>
                <td><{$equipment.owner}></td>
                <td><{$equipment.name}></td>
                <td><{$equipment.amount}></td>
                <td><{$equipment.total}></td>
                <td><img src="<{$xoops_url}>/uploads/equipment/images/<{$equipment.image}>" width="120" alt="equipment"></td>
                <td>
                    <a href="equipment.php?op=view&id=<{$equipment.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>"
                                                                                                                 title="<{$smarty.const._PREVIEW}>"</a> &nbsp;
                    <{if $xoops_isadmin == true}>
                        <a href="admin/equipment.php?op=edit&id=<{$equipment.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>"
                                                                                                                        title="<{$smarty.const._EDIT}>"></a>
                        &nbsp;
                        <a href="admin/equipment.php?op=delete&id=<{$equipment.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>"
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
