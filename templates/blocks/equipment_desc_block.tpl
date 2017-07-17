<table class="outer">
    <tr class="head">
        <th><{$smarty.const.MB_EQUIPMENT_ID}></th>
        <th><{$smarty.const.MB_EQUIPMENT_OWNER}></th>
        <th><{$smarty.const.MB_EQUIPMENT_NAME}></th>
        <th><{$smarty.const.MB_EQUIPMENT_AMOUNT}></th>
        <th><{$smarty.const.MB_EQUIPMENT_TOTAL}></th>
        <th><{$smarty.const.MB_EQUIPMENT_IMAGE_B64}></th>
    </tr>
    <{foreachq item=desc from=$block}>
        <tr class = "<{cycle values = 'even,odd'}>">
            <td>
            <{$desc.id}>
            <{$desc.owner}>
            <{$desc.name}>
            <{$desc.amount}>
            <{$desc.total}>
            <{$desc.image_b64}>
            </td>
        </tr>
    <{/foreach}>
</table>