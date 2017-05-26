<template>
    <div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Основные параметры</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div :class="{'form-group': true, 'has-error': errors.has('table_name')}">
                            <label>Название таблицы</label>
                            <input name="table_name" v-validate="'required'" data-vv-delay="1000" v-model="tableName" :class="{'form-control': true}" type="text" placeholder="">
                            <span v-show="errors.has('table_name')" class="help-block">{{ errors.first('table_name')}}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div :class="{'form-group': true, 'has-error': errors.has('visual_table_name')}">
                            <label>Визуальное представление</label>
                            <input name="visual_table_name" v-validate="'required'" data-vv-delay="1000" v-model="tableVisualName" :class="{'form-control': true}" type="text" placeholder="">
                            <span v-show="errors.has('visual_table_name')" class="help-block">{{ errors.first('visual_table_name')}}</span>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <label class="control-label">Доступные действия:</label>
                        <label><input type="checkbox" v-model="createTable"> Создать </label> |
                        <label><input type="checkbox" v-model="editTable"> Редактировать </label> |
                        <label><input type="checkbox" v-model="showTable"> Отобразить </label> |
                        <label><input type="checkbox" v-model="deleteTable"> Удалить </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Добалвление полей</h3>
            </div>
            <div class="panel-body">
                <em><b>Примечание:</b>"вам" <b>не</b> нужно добавлять поля <b>ID</b> и <b>timestamp</b> они добавятся автоматически</em>
                <div class="row">
                    <div class="col-xs-12 form-group hidden" id="alert-saving">
                        <div class="alert alaert-danger">
                            <p>
                                Нажмите сохранить таблицу для создания/редактирования полей.
                            </p>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-toggle="tooltip" data-placement="top" title width="5" data-original-title="Переупрядочить поля"></th>
                                    <th data-toggle="tooltip" data-placement="top" data-original-title="Тип поля в форме">Тип поля</th>
                                    <th data-toggle="tooltip" data-placement="top" data-original-title="Имя поля в форме и в базе данных">Столбец БД</th>
                                    <th data-toggle="tooltip" data-placement="top" data-original-title="Метка поля в форме и на страницце отображения">Визуальное представление</th>
                                    <th>Список</th>
                                    <th>Создать</th>
                                    <th>Отображать</th>
                                    <th>Обязательное</th>
                                    <th data-toggle="tooltip" data-placement="top" title width="30" class="text-center" data-original-title="Редактировать">Редактировать</th>
                                    <th data-toggle="tooltip" data-placement="top" title width="30" class="text-center" data-original-title="Удалить поле из отображения">Удалить</th>
                                </tr>
                            </thead>
                            <tbody  class="sortable ui-sortable">
                                <tr v-if="fields.length == 0" id="no-fields">
                                    <td colspan="5000" class="text-center">
                                        Вы не имеете полей в таблице. <a href="#" class="add-field">Добавить новое поле</a>
                                    </td>
                                </tr>
                                <tr v-for="field of fields">
                                    <td></td>
                                    <td>{{ field.type }}</td>
                                    <td>{{ field.name }}</td>
                                    <td>{{ field.visual }}</td>
                                    <td>{{ field.show_list }}</td>
                                    <td>{{ field.create_field }}</td>
                                    <td>{{ field.show_field }}</td>
                                    <td>{{ field.required_field }}</td>
                                    <td>{{ field.edit_field }}</td>
                                    <td>{{ field.delete_field}}</td>
                                </tr>
                                <tr v-if="flagAddFields || fields.length>0">
                                    <td></td>
                                    <td width="295px">
                                        <div :class="{'form-group': true, 'has-error': errors.has('type')}">
                                            <input name="type" v-validate="'required'" max-width="293"  :class="{'form-control': true}"  v-model="field.type" type="text" placeholder="">
                                            <span v-show="errors.has('type')" class="help-block">{{ errors.first('type')}}</span>
                                        </div>
                                    </td>
                                    <td width="295px">
                                        <div :class="{'form-group': true, 'has-error': errors.has('name')}">
                                            <input name="name" v-validate="'required'"  :class="{'form-control': true}" v-model="field.name" type="text" placeholder="">
                                            <span v-show="errors.has('name')" class="help-block">{{ errors.first('name')}}</span>
                                        </div>
                                    </td>
                                    <td width="295px">
                                        <div :class="{'form-group': true, 'has-error': errors.has('visual')}">
                                            <input name="visual" v-validate="'required'"  :class="{'form-control': true}" class="form-control" v-model="field.visual" type="text" placeholder="">
                                            <span v-show="errors.has('visual')" class="help-block">{{ errors.first('visual')}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <input v-model="field.show_list" type="checkbox">
                                    </td>
                                    <td>
                                        <input v-model="field.create_field" type="checkbox">
                                    </td>
                                    <td>
                                        <input v-model="field.show_field" type="checkbox">
                                    </td>
                                    <td>
                                        <input v-model="field.required_field" type="checkbox">
                                    </td>
                                    <td>
                                        <input v-model="field.edit_field" type="checkbox">
                                    </td>
                                    <td>
                                        <input v-model="field.delete_field" type="checkbox">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center" colspan="11">
                                        <button class="btn btn-danger add-field" v-on:click="addField" style="width:100%"><i class="fa fa-plus"></i> Добавить поле</button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data()
        {
          return {
                    // флаг: true - массив fields имеет значения
                    flagAddFields: true,
                    tableName: '',
                    tableVisualName: '',
                    createTable: false,
                    editTable: false,
                    showTable: false,
                    deleteTable: false,
                    fields:[
                   ],
                    // для сброса в изначальное состояние
                    defaultfield: {
                        type: '',
                        name: '',
                        visual: '',
                        show_list: false,
                        create_field: false,
                        show_field: false,
                        required_field: false,
                        edit_field: false,
                        delete_field: false
                    },
                    // текущие значения
                    field: {
                        type: '',
                        name: '',
                        visual: '',
                        show_list: false,
                        create_field: false,
                        show_field: false,
                        required_field: false,
                        edit_field: false,
                        delete_field: false
                    }
           }
        },
        methods: {
                addField: function () {
                //this.flagAddFields = true;
                this.$validator.validateAll().then(() => {
                    this.fields.push(this.field);
                    this.field = null;
                    this.field = _.clone(this.defaultfield, true);
                    this.$nextTick(function () {

                    });
                }).catch(() => {
                });
            }
        }
    }
</script>