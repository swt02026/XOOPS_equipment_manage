<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_EQUIPMENT_ID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_BORROWER}></th>
        <th><{$smarty.const.MB_EQUIPMENT_AMOUNT}></th>
    </tr>
    <{foreachq item=borrow from=$block}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
            <{$borrow.id}>
            <{$borrow.borrower}>
            <{$borrow.amount}>
            </td>
        </tr>
    <{/foreach}>
</table>