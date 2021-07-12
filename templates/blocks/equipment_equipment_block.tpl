<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_EQUIPMENT_ID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_OWNER}></th>
        <th><{$smarty.const.MB_EQUIPMENT_NAME}></th>
        <th><{$smarty.const.MB_EQUIPMENT_AMOUNT}></th>
        <th><{$smarty.const.MB_EQUIPMENT_TOTAL}></th>
        <th><{$smarty.const.MB_EQUIPMENT_IMAGE}></th>
    </tr>
    <{foreachq item=equipment from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$equipment.id}>
            <{$equipment.owner}>
            <{$equipment.name}>
            <{$equipment.amount}>
            <{$equipment.total}>
            <{$equipment.image}>
        </td>
    </tr>
    <{/foreach}>
</table>
