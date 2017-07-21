<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <{*<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>*}>
    <{*<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.js"></script>*}>
    <{*<{$xoTheme->addScript("https://unpkg.com/vue/dist/vue.min.js")}>*}>
    <{*<{$xoTheme->addScript("https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.js")}>*}>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
</head>

<body>
<div class="row">
    <h1 style="text-align: center"><{$smarty.const.MI_EQUIPMENT_EQUIPMENT_BORROWING}></h1>
    <div id="selected-list">

        <div v-if="query_rows.length > 0">
            <form action="admin/crud/borrow.php" method="post" enctype="multipart/form-data">
                <div v-for="row in query_rows">
                    <div class="col-md-3 col-sm-3">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 hidden-sm hidden-xs">
                                    <button type="button"
                                            data-toggle="modal"
                                            data-target="#imageModal"
                                            @click="showImageModal(image_URL + row.image)"
                                            style="border:0;background:transparent">
                                        <img :src="image_URL + row.image"
                                             alt="<{$smarty.const.MI_EQUIPMENT_NO_PICTURE}>"
                                             width="160"
                                             height="80">
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <{$smarty.const.MI_EQUIPMENT_EQUIPMENT}> {{ row.name }}<br/>
                                    <{$smarty.const.MI_EQUIPMENT_OWNER}> {{ row.owner }}<br/>
                                    <{$smarty.const.MI_EQUIPMENT_QUANTITY}> {{ row.amount }}<br/>
                                    <div v-if="row.amount > 0">
                                        <div class="form-group">
                                            <label :for="'a' + row.id"><{$smarty.const.MI_EQUIPMENT_BORROWED_QUANTITY}>：</label>

                                            <input :id="'a' + row.id"
                                                   class="form-control"
                                                   type="number"
                                                   :name="'borrow_number[' + row.id + ']'"
                                                   min="0"
                                                   :max="row.amount"
                                                   :placeholder="'<{$smarty.const.MI_EQUIPMENT_BORROWED_QUANTITY}>(1~' + row.amount + ')'"
                                                   @change="append(row, $event)"
                                            />

                                        </div>
                                    </div>
                                    <input type="hidden" :id="row.id">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="items.length > 0">
                    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#submitModal"><{$smarty.const.MI_EQUIPMENT_SENT_OUT}></button>
                </div>

                <div class="modal fade" id="submitModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button data-dismiss="modal" class="close">&times;</button>
                                <h4 class="modal-title"><{$smarty.const.MI_EQUIPMENT_BORROWING_CONFIRMATION}></h4>
                            </div>

                            <div class="modal-body">
                                <div v-for="item in items">
                                    <p><{$smarty.const.MI_EQUIPMENT_NAME}>：{{ item.name }}<br/><{$smarty.const.MI_EQUIPMENT_BORROWED_QUANTITY}>:{{ item.amount }}<br/></p>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg"><{$smarty.const.MI_EQUIPMENT_CONFIRM_DELIVERY}></button>

                                <button data-dismiss="modal" class="btn btn-lg"><{$smarty.const.MI_EQUIPMENT_CANCEL}></button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="imageModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button data-dismiss="modal" class="close">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>

                            <div class="modal-body">
                                <img :src="image_modal_src"
                                     class="img-responsive"
                                />
                            </div>

                            <div class="modal-footer">

                                <button data-dismiss="modal" class="btn btn-lg"><{$smarty.const.MI_EQUIPMENT_SHUT_DOWN}></button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<hr/>
<div class="row">

    <div id="borrow-list">
        <div v-if="borrow_rows.length > 0">
            <h1 style="text-align: center"><{$smarty.const.MI_EQUIPMENT_EQUIPMENT_NOT_RETURNED}></h1>
            <table class="table" style="text-align: center">
                <thead>
                <tr>

                    <td v-for="row_name in row_names">
                        {{ row_name }}
                    </td>

                </tr>
                </thead>
                <tbody>
                <tr v-for="row in borrow_rows">
                    <td>{{ row.name }}</td>
                    <td>{{ row.last }}</td>
                    <td>{{ row.quantity }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var sel_list = new Vue({
        el: '#selected-list',
        data: {
            items: [],
            image_URL: "<{$xoops_url}>/uploads/equipment/images/",
            image_modal_src: "",
            query_rows:<{$json_data}>
        },
        methods: {

            showImageModal: function (src) {
                this.image_modal_src = src;
            },
            append: function (row, event) {

                var checkNotExist = function (checkId) {

                    return function (item) {
                        return !(item.id == checkId);
                    };
                }(row.id);

                this.items = this.items.filter(checkNotExist);

                if (event.target.value != "" && event.target.value != 0) {
                    this.items.push({
                        id: row.id,
                        name: row.name,
                        owner: row.owner,
                        amount: event.target.value
                    });
                }
            }
        }
    });

    var borrow_list = new Vue({
        el: '#borrow-list',
        data: {
            row_names: [
                "<{$smarty.const.MI_EQUIPMENT_ADMENU2}>",
                "<{$smarty.const.MI_EQUIPMENT_HOLDER}>",
                "<{$smarty.const.MI_EQUIPMENT_QUANTITY}>"
            ],
            borrow_rows: <{$borrow_data}>
        }

    });

</script>

</body>

</html>
