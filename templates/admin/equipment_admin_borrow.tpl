<{if $borrowRows > 0}>
    <div class="outer">
         <form name="select" action="borrow.php?op=" method="POST"
              onsubmit="if(window.document.select.op.value =='') {return false;} else if (window.document.select.op.value =='delete') {return deleteSubmitValid('borrowId[]');} else if (isOneChecked('borrowId[]')) {return true;} else {alert('<{$smarty.const.AM_BORROW_SELECTED_ERROR}>'); return false;}">
            <input type="hidden" name="confirm" value="1"/>
            <div class="floatleft">
                   <select name="op">
                       <option value=""><{$smarty.const.AM_EQUIPMENT_SELECT}></option>
                       <option value="delete"><{$smarty.const.AM_EQUIPMENT_SELECTED_DELETE}></option>
                   </select>
                   <input id="submitUp" class="formButton" type="submit" name="submitselect" value="<{$smarty.const._SUBMIT}>" title="<{$smarty.const._SUBMIT}>"  />
               </div>
            <div class="floatcenter0">
                <div id="pagenav"><{$pagenav}></div>
            </div>



          <table class="$borrow" cellpadding="0" cellspacing="0" width="100%">
            <tr><th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All"  value="Check All" /></th>  <th class="center"><{$selectorid}></th>  <th class="center"><{$selectorborrower}></th>  <th class="center"><{$selectoramount}></th>

<th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
</tr>
<{foreach item=borrowArray from=$borrowArrays}>
<tr class="<{cycle values="odd,even"}>">

<td align="center" style="vertical-align:middle;"><input type="checkbox" name="borrow_id[]"  title ="borrow_id[]" id="borrow_id[]" value="<{$borrowArray.borrow_id}>" /></td>
<td class='center'><{$borrowArray.id}></td>
<td class='center'><{$borrowArray.borrower}></td>
<td class='center'><{$borrowArray.amount}></td>


<td class="center width5"><{$borrowArray.edit_delete}></td>
</tr>
<{/foreach}>
</table>
<br>
<br>
<{else}>
<table width="100%" cellspacing="1" class="outer">
<tr>

<th align="center" width="5%"><input name="allbox" title="allbox" id="allbox" onclick="xoopsCheckAll('select', 'allbox');" type="checkbox" title="Check All"  value="Check All" /></th>  <th class="center"><{$selectorid}></th>  <th class="center"><{$selectorborrower}></th>  <th class="center"><{$selectoramount}></th>

<th class="center width5"><{$smarty.const.AM_EQUIPMENT_FORM_ACTION}></th>
</tr>
<tr>
<td class="errorMsg" colspan="11">There are no $borrow</td>
</tr>
</table>
</div>
<br>
<br>
<{/if}>
