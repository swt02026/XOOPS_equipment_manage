<{include file="db:equipment_header.tpl"}>
<div class="panel panel-info">
    <div class="panel-heading"><h2 class="panel-title">Customer </h2></div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_ID}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_FIRST}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_LAST}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_ADDRESS}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_CITY}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_COUNTRY}></th>
            <th><{$smarty.const.MD_EQUIPMENT_CUSTOMER_CREATED}></th>
            <th><{$smarty.const.MD_EQUIPMENT_ACTION}></th>
        </tr>
        </thead>
        <{foreach item=customer from=$customer}>
            <tbody>
            <tr>

                <td><{$customer.id}></td>
                <td><{$customer.first}></td>
                <td><{$customer.last}></td>
                <td><{$customer.address}></td>
                <td><{$customer.city}></td>
                <td><{$customer.country}></td>
                <td><{$customer.created}></td>
                <td>
                    <a href="customer.php?op=view&id=<{$customer.id}>" title="<{$smarty.const._PREVIEW}>"><img src="<{xoModuleIcons16 search.png}>" alt="<{$smarty.const._PREVIEW}>"
                                                                                                               title="<{$smarty.const._PREVIEW}>"</a> &nbsp;
                    <{if $xoops_isadmin == true}>
                        <a href="admin/customer.php?op=edit&id=<{$customer.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}>"
                                                                                                                      title="<{$smarty.const._EDIT}>"></a>
                        &nbsp;
                        <a href="admin/customer.php?op=delete&id=<{$customer.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}>"
                                                                                                                          title="<{$smarty.const._DELETE}>"</a>
                    <{/if}>
                </td>
            </tr>
            </tbody>
        <{/foreach}>
    </table>
</div>
<{$commentsnav}> <{$lang_notice}>
<{if $comment_mode == "flat"}> <{include file="db:system_comments_flat.tpl"}> <{elseif $comment_mode == "thread"}> <{include file="db:system_comments_thread.tpl"}> <{elseif $comment_mode == "nest"}> <{include file="db:system_comments_nest.tpl"}> <{/if}>
<{include file="db:equipment_footer.tpl"}>
