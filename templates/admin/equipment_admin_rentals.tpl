<{if $rentalsRows > 0}>
    <div class="outer">
        <form name="select" action="rentals.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('rentalsId[]');} else if (isOneChecked('rentalsId[]')) {return true;} else {alert('<{$smarty.const.AM_RENTALS_SELECTED_ERROR}>'); return false;}">
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


            <table class="$rentals" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All" value="Check All"/>
                    </th>
                    <th class="center"><{$selectorid}></th>
                    <th class="center"><{$selectorcustomerid}></th>
                    <th class="center"><{$selectorequipmentid}></th>
                    <th class="center"><{$selectorquantity}></th>
                    <th class="center"><{$selectordatefrom}></th>
                    <th class="center"><{$selectordateto}></th>

                    <th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
                </tr>
                <{foreach item=rentalsArray from=$rentalsArrays}>
                    <tr class="<{cycle values="odd,even"}>">

                        <td align="center" style="vertical-align:middle;"><input type="checkbox" name="rentals_id[]" title="rentals_id[]" id="rentals_id[]" value="<{$rentalsArray.rentals_id}>"/></td>
                        <td class='center'><{$rentalsArray.id}></td>
                        <td class='center'><{$rentalsArray.customerid}></td>
                        <td class='center'><{$rentalsArray.equipmentid}></td>
                        <td class='center'><{$rentalsArray.quantity}></td>
                        <td class='center'><{$rentalsArray.datefrom}></td>
                        <td class='center'><{$rentalsArray.dateto}></td>


                        <td class="center width5"><{$rentalsArray.edit_delete}></td>
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
                    <th class="center"><{$selectorcustomerid}></th>
                    <th class="center"><{$selectorequipmentid}></th>
                    <th class="center"><{$selectorquantity}></th>
                    <th class="center"><{$selectordatefrom}></th>
                    <th class="center"><{$selectordateto}></th>

                    <th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
                </tr>
                <tr>
                    <td class="errorMsg" colspan="11">There are no $rentals</td>
                </tr>
            </table>
    </div>
    <br>
    <br>
<{/if}>
