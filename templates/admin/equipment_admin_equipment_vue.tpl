<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <{*<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>*}>
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <{*<{$xoTheme->addScript("https://unpkg.com/vue")}>*}>
    <!-- Latest compiled and minified CSS -->
    <{*<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">*}>

    <!-- Optional theme -->
    <{*<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">*}>

    <!-- Latest compiled and minified JavaScript -->
    <{*<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>*}>

</head>
<body>
<div id="manage_table">

    <table class="table">
        <thead>
        <tr>
            <td v-for="row_name in row_names">
                {{ row_name }}
            </td>
        </tr>
        </thead>
        <tbody>

        <tr v-for="row in query_rows">
            <div v-if="query_rows.length > 0">
                <td>
                    <button type="button"
                            data-toggle="modal"
                            data-target="#imageModal"
                            @click="showImageModal(image_URL + row.image)"
                            style="border:0;background:transparent">
                        <img :src="image_URL + row.image"
                             width="80"
                                <{*height="120"*}>
                             alt="<{$smarty.const.MI_EQUIPMENT_NO_PICTURE}>">
                    </button>

                </td>
                <td>
                    {{ row.name }}
                </td>
                <td>
                    {{ row.owner }}
                </td>
                <td>
                    {{ row.amount }}
                </td>
                <td>
                    {{ row.total }}
                </td>
                <td>
                    <div v-if="row.permission">
                        <input type="button"
                               value="<{$smarty.const.MI_EQUIPMENT_DELETE}>"
                               data-toggle="modal"
                               data-target="#deleteModal"
                               @click="delete_id = row.id;modal_data=row;">
                        <button
                                type="button"
                                data-toggle="modal"
                                data-target="#submitModal"
                                @click="setUpdateModal(row)"
                        >
                            <{$smarty.const.MI_EQUIPMENT_MODIFY}>
                        </button>
                    </div>
                </td>
            </div>
        </tr>

        </tbody>

    </table>

    <button data-toggle="modal"
            data-target="#submitModal"
            @click="setAppendModal"
    >
        <{$smarty.const.MI_EQUIPMENT_ADD_INFORMATION}>
    </button>

    <div class="modal fade" id="deleteModal" role="dialog" tabindex='-1'>
        <form action="crud/delete.php"
              method="post"
              enctype="multipart/form-data">

            <input type="hidden" name="delete_id" v-model="delete_id"/>

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            <{$smarty.const.MI_EQUIPMENT_DELETE}>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <{$smarty.const.MI_EQUIPMENT_NAME}>：{{ modal_data.name }}

                    </div>
                    <div class="modal-footer">
                        <input type="submit"
                               value="<{$smarty.const.MI_EQUIPMENT_DELETE}>"/>
                        <button data-dismiss="modal">
                            <{$smarty.const.MI_EQUIPMENT_CANCEL}>
                        </button>
                    </div>
                </div>
            </div>

        </form>
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

    <div class="modal fade" id="submitModal" role="dialog">

        <form :action="'crud/' + operation + '.php'"
              id="modal_AU_form"
              method="post"
              enctype="multipart/form-data">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close"
                                data-dismiss="modal"
                                @click="clearUpload();">
                            &times;
                        </button>
                        <h4 class="modal-title">
                            {{ modal_op }}<{$smarty.const.MI_EQUIPMENT_CONFIRM}>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <label for="data_image"><{$smarty.const.MI_EQUIPMENT_PHOTO}>：</label>
                            <input id="data_image"
                                   name="image"
                                   type="file"
                                   accept="image/*"
                                   @change="loadImage"/>
                            <img alt="<{$smarty.const.MI_EQUIPMENT_NO_PICTURE}>"
                                 :src="image_URL"/>
                        </div>
                        <input type="hidden"
                               name="update_id"
                               v-model="modal_data.id">
                        <label for="data_name">
                            <{$smarty.const.MI_EQUIPMENT_NAME}>：
                        </label>
                        <input type="text"
                               id="data_name"
                               name="name"
                               pattern="[^-*`.,!;#%&|*'><\[\]=\+?/\\]+"
                               v-model="modal_data.name"
                               required/>

                        <label for="data_amount">
                            <{$smarty.const.MI_EQUIPMENT_QUANTITY}>：
                        </label>
                        <input type="number"
                               id="data_amount"
                               name="amount"
                               min="1"
                               v-model="modal_data.total"
                               @change="setAmountDiff"
                               required/>
                        <input type="hidden"
                               name="amount_diff"
                               v-model="amount_diff"/>


                    </div>
                    <div class="modal-footer">
                        <input type="submit"
                               :value="'<{$smarty.const.MI_EQUIPMENT_CONFIRM}>' + modal_op"/>
                        <button data-dismiss="modal"
                                @click="clearUpload();">
                            <{$smarty.const.MI_EQUIPMENT_CANCEL}>
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <script>
        var vm = new Vue({

            el: "#manage_table",
            data: {
                delete_id: 0,
                image_URL: "<{$xoops_url}>/uploads/equipment/images/",
                modal_op: "",
                operation: "",
                amount_diff: 0,
                old_amount: 0,
                check_image: false,
                image_modal_src: "",
                modal_data: {},
                row_names: [
                    "<{$smarty.const.MI_EQUIPMENT_PHOTO}>",
                    "<{$smarty.const.MI_EQUIPMENT_NAME}>",
                    "<{$smarty.const.MI_EQUIPMENT_THE_HOLDER}>",
                    "<{$smarty.const.MI_EQUIPMENT_CAN_BE_BORROWED}>",
                    "<{$smarty.const.MI_EQUIPMENT_TOTAL}>",
                    "<{$smarty.const.MI_EQUIPMENT_OPERATING}>"
                ],
                //query_rows :[]
                query_rows: <{$json_data}>
            },
            methods: {

                showImageModal: function (src) {
                    this.image_modal_src = src;
                },
                setAmountDiff: function (event) {

                    this.amount_diff = event.target.value - this.old_amount;
                },
                setUpdateModal: function (row) {
                    this.modal_data = JSON.parse(JSON.stringify(row));
                    this.modal_op = '<{$smarty.const.MI_EQUIPMENT_MODIFY}>';
                    this.operation = 'update';
                    this.old_amount = row.total;
                },
                setAppendModal: function () {
                    this.modal_data = {};
                    this.modal_op = '<{$smarty.const.MI_EQUIPMENT_ADDED}>';
                    this.operation = 'append';
                },
                loadImage: function (event) {

                    var reader = new FileReader();
                    var vm = this;
                    reader.onload = function (e) {
                        vm.image_URL = this.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                    this.check_image = true;
                },
                clearUpload: function () {
                    this.image_URL = '';
                    document.querySelector('#modal_AU_form').reset();
                },
                clearImage: function () {
                    this.image_URL = '';
                    document.querySelector("input[type='file']").value = '';

                }
            }

        });
    </script>
</body>
</html>
