<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_EQUIPMENT_ID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_FIRST}></th>
        <th><{$smarty.const.MB_EQUIPMENT_LAST}></th>
        <th><{$smarty.const.MB_EQUIPMENT_ADDRESS}></th>
        <th><{$smarty.const.MB_EQUIPMENT_CITY}></th>
        <th><{$smarty.const.MB_EQUIPMENT_COUNTRY}></th>
        <th><{$smarty.const.MB_EQUIPMENT_CREATED}></th>
    </tr>
    <{foreachq item=customer from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$customer.id}>
            <{$customer.first}>
            <{$customer.last}>
            <{$customer.address}>
            <{$customer.city}>
            <{$customer.country}>
            <{$customer.created}>
        </td>
    </tr>
    <{/foreach}>
</table>
