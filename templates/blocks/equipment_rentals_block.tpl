<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_EQUIPMENT_ID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_CUSTOMERID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_EQUIPMENTID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_QUANTITY}></th>
        <th><{$smarty.const.MB_EQUIPMENT_DATEFROM}></th>
        <th><{$smarty.const.MB_EQUIPMENT_DATETO}></th>
    </tr>
    <{foreachq item=rentals from=$block}>
    <tr class="<{cycle values = 'even,odd'}>">
        <td>
            <{$rentals.id}>
            <{$rentals.customerid}>
            <{$rentals.equipmentid}>
            <{$rentals.quantity}>
            <{$rentals.datefrom}>
            <{$rentals.dateto}>
        </td>
    </tr>
    <{/foreach}>
</table>
