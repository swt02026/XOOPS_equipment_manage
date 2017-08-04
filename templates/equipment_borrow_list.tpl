<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <{*<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>*}>
    <{*<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.js"></script>*}>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <{*<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">*}>

    <!-- Optional theme -->
    <{*<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">*}>

    <!-- Latest compiled and minified JavaScript -->
    <{*<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>*}>
</head>
<body>
<div id="show_record">
    <table class="table">
        <thead>
        <tr>
            <td><{$smarty.const.MI_EQUIPMENT_ITEM_NAME}></td>
            <td><{$smarty.const.MI_EQUIPMENT_BORROWED_QUANTITY}></td>
            <td><{$smarty.const.MI_EQUIPMENT_BORROWER}></td>
        </tr>
        </thead>
        <tbody>
        <tr v-for="record in records">
            <td>
                {{ record.name }}
            </td>
            <td>
                {{ record.amount }}
            </td>
            <td>
                {{ record.borrower }}
            </td>
            <td>
                <div v-if="record.permission">
                    <button type="button"
                            data-toggle="modal"
                            data-target="#submitModal"
                            @click="setReturnAll(false, record)">
                        <{$smarty.const.MI_EQUIPMENT_PART_OF_THE_RETURN}>
                    </button>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#submitModal"
                            @click="setReturnAll(true, record)">
                        <{$smarty.const.MI_EQUIPMENT_ALL_RETURNED}>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="modal" id="submitModal" role="dialog" tabindex='-1'>
        <form method="post" enctype="multipart/form-data" action="crud/return.php">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">
                            <{$smarty.const.MI_EQUIPMENT_RETURN_CONFIRMATION}>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <h4><{$smarty.const.MI_EQUIPMENT_NAME}>：{{ operating_record.name }}</h4>
                        <h4><{$smarty.const.MI_EQUIPMENT_BORROWER}>：{{ operating_record.borrower }}</h4>

                        <div v-if="return_all">
                            <h4> <{$smarty.const.MI_EQUIPMENT_NUMBER_OF_RETURNS}>：{{ operating_record.amount }}</h4>
                            <input type="hidden"
                                   name="return_amount"
                                   v-model="operating_record.amount">
                        </div>
                        <div v-else>
                            <h4><{$smarty.const.MI_EQUIPMENT_NUMBER_OF_RETURNS}>：
                                <input type="number"
                                       name="return_amount"
                                       min="1"
                                       :max="max_amount"
                                       value="1"
                                >
                            </h4>
                        </div>
                        <input type="hidden"
                               name="id"
                               v-model="operating_record.id">
                        <input type="hidden"
                               name="borrower"
                               v-model="operating_record.borrower">
                    </div>
                    <div class="modal-footer">
                        <input type="submit"
                               value="<{$smarty.const.MI_EQUIPMENT_CONFIRM}>">


                        <button type="button"
                                data-dismiss="modal">
                            <{$smarty.const.MI_EQUIPMENT_CANCEL}>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<script>
    var vm = new Vue({

        el: '#show_record',
        data: {
            operating_record: {
                name: "", amount: 0, borrower: "", id: 0
            },
            return_all: false,
            max_amount: 0,
            records:<{$json_data}>
        },
        methods: {
            setReturnAll: function (return_all, record) {
                this.return_all = return_all;
                this.operating_record = JSON.parse(JSON.stringify(record));
                this.max_amount = this.operating_record.amount;
            }
        }
    });

</script>
</body>
</html>
