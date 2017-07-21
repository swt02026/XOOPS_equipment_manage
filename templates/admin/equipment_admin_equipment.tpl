<{if $equipmentRows > 0}>
    <div class="outer">
        <form name="select" action="equipment.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('equipmentId[]');} else if (isOneChecked('equipmentId[]')) {return true;} else {alert('<{$smarty.const.AM_EQUIPMENT_SELECTED_ERROR}>'); return false;}">
            <input type="hidden" name="confirm" value="1"/>
            <div class="floatleft">
                <select name="op">
                    <option value=""><{$smarty.const.AM_EQUIPMENT_SELECT}></option>
                    <option value="delete"><{$smarty.const.AM_EQUIPMENT_SELECTED_DELETE}></option>
                </select>
                <input id="submitUp" class="formButton" type="submit" name="submitselect" value="<{$smarty.const._SUBMIT}>" title="<{$smarty.const._SUBMIT}>"/>
            </div>
            <div class="floatcenter0">
                <div id="pagenav"><{$pagenav}></div>
            </div>


            <table class="$equipment" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/>
                    </th>
                    <th class="center"><{$selectorid}></th>
                    <th class="center"><{$selectorowner}></th>
                    <th class="center"><{$selectorname}></th>
                    <th class="center"><{$selectoramount}></th>
                    <th class="center"><{$selectortotal}></th>
                    <th class="center"><{$selectorimage}></th>

                    <th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
                </tr>
                <{foreach item=equipmentArray from=$equipmentArrays}>
                    <tr class="<{cycle values="odd,even"}>">

                        <td align="center" style="vertical-align:middle;"><input type="checkbox" name="equipment_id[]" title="equipment_id[]" id="equipment_id[]"
                                                                                 value="<{$equipmentArray.equipment_id}>"/></td>
                        <td class='center'><{$equipmentArray.id}></td>
                        <td class='center'><{$equipmentArray.owner}></td>
                        <td class='center'><{$equipmentArray.name}></td>
                        <td class='center'><{$equipmentArray.amount}></td>
                        <td class='center'><{$equipmentArray.total}></td>
                        <td class='center'><{$equipmentArray.image}></td>


                        <td class="center width5"><{$equipmentArray.edit_delete}></td>
                    </tr>
                <{/foreach}>
            </table>
            <br>
            <br>
            <{else}>
            <table width="100%" cellspacing="1" class="outer">
                <tr>

                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/>
                    </th>
                    <th class="center"><{$selectorid}></th>
                    <th class="center"><{$selectorowner}></th>
                    <th class="center"><{$selectorname}></th>
                    <th class="center"><{$selectoramount}></th>
                    <th class="center"><{$selectortotal}></th>
                    <th class="center"><{$selectorimage}></th>

                    <th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
                </tr>
                <tr>
                    <td class="errorMsg" colspan="11">There are no $equipment</td>
                </tr>
            </table>
    </div>
    <br>
    <br>
<{/if}>
