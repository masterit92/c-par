<?php
/**


  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<?php
if (!defined('SERVER_ROOT'))
    exit('No direct script access allowed');

$data_form_struct = $VIEW_DATA['data_form_struct'];
$i = 0;

$v_record_type_code = 'TP04'; //get_request_var('sel_record_type');
$xml_file_path = $this->get_xml_config($v_record_type_code, 'form_struct');

if (is_file($xml_file_path))
{
    $v_xml_string = file_get_contents($xml_file_path);
}
else
{
    $v_xml_string = '';
    $xml_file_path = SERVER_ROOT . 'apps' . DS . $this->app_name . DS . 'xml-config' . DS . $v_record_type_code . DS . $v_record_type_code . '_' . 'form_struct' . '.xml';
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

        <style>
            ul { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
            li { margin: 5px; padding: 5px; }
            #dialog_attr label{display: block}
        </style>

    </head>
    <body>
        <form >
            <?php
            echo $this->hidden('controller', $this->get_controller_url());
            ?>
            <div id="form_struct_object_attr">
                <ul>
                    <?php if (count($data_form_struct) > 0): ?>
                        <?php foreach ($data_form_struct as $line): ?>
                            <li class="ui-state-default obj_line" id="li_line_<?php echo $i ?>">
                                <?php $line_id = "line_id_$i"; ?>
                                <?php echo __('Lable Line:') ?>
                                <input type="text" class="input_line_label" value="<?php echo $line['line_label'] ?>" id="<?php echo $line_id; ?>"/>
                                <?php $num_atrr = count($line) - 1; ?>
                                <?php if (is_array($line)): ?>
                                    <ul class="ui-sortable" id="<?php echo "obj_attr_$i" ?>">
                                        <?php for ($k = 0; $k < $num_atrr; $k++): ?>
                                            <li class="ui-state-default" id="li_attr_<?php echo $i ?>">
                                                <label class="label_attr" type="type" data="<?php echo $line[$k]['item_type'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Type:') . $line[$k]['item_type']; ?>
                                                </label>
                                                <label class="label_attr" type="id" data="<?php echo $line[$k]['item_id'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-ID:') . $line[$k]['item_id']; ?>
                                                </label>
                                                <label class="label_attr" type="name" data="<?php echo $line[$k]['item_id'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Name:') . $line[$k]['item_name']; ?>
                                                </label>
                                                <label class="label_attr" type="allownull" data="<?php echo $line[$k]['item_allownull'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Allow Null:') . $line[$k]['item_allownull']; ?>
                                                </label>
                                                <label class="label_attr" type="validate" data="<?php echo $line[$k]['item_validate'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Validate:') . $line[$k]['item_validate']; ?>
                                                </label>
                                                <label class="label_attr" type="label" data="<?php echo $line[$k]['item_label'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Label:') . $line[$k]['item_label']; ?>
                                                </label>
                                                <label class="label_attr" type="default_value" data="<?php echo $line[$k]['item_default_value'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Default Value:') . $line[$k]['item_default_value']; ?>
                                                </label>
                                                <label class="label_attr" type="size" data="<?php echo $line[$k]['item_size'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-Size:') . $line[$k]['item_size']; ?>
                                                </label>
                                                <label class="label_attr" type="view" data="<?php echo $line[$k]['item_view'] ?>" line_id="<?php echo $line_id ?>">
                                                    <?php echo __('-View:') . $line[$k]['item_view']; ?>
                                                </label>
                                                <button type="button" class="btn_edit_attr"><?php echo __('Edit') ?></button>
                                                <button type="button" class="remove_attr" id_attr="<?php echo $i ?>"><?php echo __('Remove') ?></button>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                <?php endif; ?>
                                <button type="button" class="btn_add_object" id="add_obj_<?php echo $i ?>" id_ul="<?php echo $i ?>">Add Object</button>
                                <button type="button" class="btn_remove_object" id_ul="<?php echo $i ?>">Remove Object</button>
                            </li>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" name="btn_add_line" id="btn_add_line" value="<?php echo __('Add New Line') ?>" ><?php echo __('Add New Line') ?></button>
                <button type="button" name="btn_save_attr" id="btn_save_attr" value="<?php echo __('Save') ?>" ><?php echo __('Save') ?></button>
            </div>
        </form>
        <div id="dialog_attr">
            <form>
                <label><?php echo __('Type:') ?>
                    <select name="so_attr_type" id="so_attr_type">
                        <option value="TextboxName">TextboxName</option>
                        <option value="TextboxMoney">TextboxMoney</option>
                        <option value="Textbox">Textbox</option>
                        <option value="TextboxDate">TextboxDate</option>
                        <option value="DropDownList">DropDownList</option>
                        <option value="RadioButton">RadioButton</option>
                        <option value="Textarea">Textarea</option>
                        <option value="Button">Button</option>
                        <option value="MultiCheckbox">MultiCheckbox</option>
                        <option value="Checkbox">Checkbox</option>
                        <option value="TextboxArea">TextboxArea</option>
                        <option value="TextboxDocSEQ">TextboxDocSEQ</option>
                    </select>
                </label>
                <label>
                    <?php echo __('ID:') ?>
                    <input type="text" name="txt_attr_id" id="txt_attr_id"/>
                </label>
                <label>
                    <?php echo __('Name:') ?>
                    <input type="text" name="txt_attr_name" id="txt_attr_name"/>
                </label>
                <label>
                    <?php echo __('Allow null:') ?>
                    <input type="radio" checked name="rd_attr_allownull" class="rd_attr_allownull" value="yes"/>Yes
                    <input type="radio" name="rd_attr_allownull" class="rd_attr_allownull" value="no"/>No
                </label>
                <label><?php echo __('Validater:') ?>
                    <select name="so_attr_validate" id="so_attr_validate" >
                        <option value="text">text</option>
                        <option value="email">email</option>
                        <option value="number">number</option>
                        <option value="phone">phone</option>
                        <option value="money">money</option>
                        <option value="date">date</option>
                        <option value="ddli">ddli</option>
                        <option value="fax">fax</option>
                        <option value="numberString">numberString</option>
                    </select>
                </label>
                <label>
                    <?php echo __('Label Object:') ?>
                    <input type="text" name="txt_attr_label_obj" id="txt_attr_label_obj"/>
                </label>
                <label>
                    <?php echo __('Default value:') ?>
                    <input type="text" name="txt_attr_default_value" id="txt_attr_default_value"/>
                </label>
                <label>
                    <?php echo __('Size:') ?>
                    <input type="text" name="txt_attr_size" id="txt_attr_size"/>
                </label>
                <label>
                    <?php echo __('View:') ?>
                    <input type="radio" name="rd_attr_view" class="rd_attr_view" value="true" checked/>True
                    <input type="radio" name="rd_attr_view" class="rd_attr_view" value="false"/>False
                </label>
                <label>
                    <button type="button"><?php echo __('OK') ?></button>
                    <button type="button" id="dialog_attr_cancel"><?php echo __('Cancel') ?></button>
                </label>
            </form>
        </div>

    </div>
</body>
</html>
<script>
    var i = 0;
    if (i <= 0)
    {
        i = <?php echo $i ?>;
    }
    jQuery(document).ready(function($) {
        $('#btn_add_line').on('click', function() {
            $('#form_struct_object_attr ul:first').append("<li class='ui-state-default ui-sortable-handle obj_line'><?php echo __('Lable Line:') ?><input type='text' class='input_line_label' id='line_id_" + i + "'/><ul class='ui-sortable' id='obj_attr_" + i + "'></ul><button type='button' class='btn_add_object' id_ul='" + i + "'>Add Object</button></li>");
            i++;
        });
        $(document).on('click', '.btn_add_object', function() {
            var id_obj = $(this).attr('id_ul');
            var id_ul = '#obj_attr_' + id_obj;
            var num_li = $(id_ul).children().length;
            if (num_li >= 2)
            {
                $(this).hide();
                return;
            }
            var str = get_form_atrr(i, id_obj);
            $(id_ul).append("<li class='ui-state-default ui-sortable-handle'>" + str + "</li>");
            i++;
            var num_li = $(id_ul).children().length;
            if (num_li >= 2)
            {
                $(this).hide();
                return;
            }

        });
        //Dag and drop element
        $(function() {
            $("#form_struct_object_attr ul").sortable({
                revert: true
            });
        });
        $(document).on('click', '#btn_save_attr', function() {
            var arr_line = get_line_label();
            var arr_item = get_attr_item();
            var url = $('#controller').val() + 'update_form_struct';
            $.ajax({
                type: "POST",
                url: url,
                data: {arr_line: arr_line, arr_item: arr_item},
                success: function() {
                    alert('<?php echo __('Save success!') ?>');
                },
                error: function() {
                    alert('<?php echo __('Save fail!') ?>');
                }
            });
        });
        function get_line_label()
        {
            var arr_label = [];
            $('.input_line_label').each(function() {
                var label_data = $(this).val();
                var line_id = $(this).attr('id');
                arr_label.push(line_id + '-' + label_data);
            });
            return arr_label;
        }
        function get_attr_item() {
            var arr_item = new Array();
            $('.label_attr').each(function() {
                var item_type = $(this).attr('type');
                var item_data = $(this).attr('data');
                var line_id = $(this).attr('line_id');
                arr_item.push(line_id + '-' + item_type + '/' + item_data);
            });
            return arr_item;
        }
        $(document).on('click', '.remove_attr', function() {
            $(this).parent().remove();
            var id_attr = $(this).attr('id_attr');
            var id_add_obj = '#add_obj_' + id_attr;
            $(id_add_obj).show();

        });
        $(document).on('click', '.btn_remove_object', function() {
            $(this).parent().remove();
        });
        $(document).on('click', '.btn_attr_cancel', function() {
            $(this).parent().parent().remove();
            $('.btn_add_object').show();
        });
        function get_form_atrr(_i, _id_obj) {
            var str = '<label line_id="line_id_' + _i + '"><?php echo __('Type:') ?>';
            str += '<select name="sel_object_type_' + _id_obj + '" id="sel_object_type_' + _id_obj + '">';
            str += '<option value="TextboxName">TextboxName</option>';
            str += '<option value="TextboxMoney">TextboxMoney</option>';
            str += '<option value="Textbox">Textbox</option>';
            str += '<option value="TextboxDate">TextboxDate</option>';
            str += '<option value="DropDownList">DropDownList</option>';
            str += '<option value="RadioButton">RadioButton</option>';
            str += '<option value="Textarea">Textarea</option>';
            str += '<option value="Button">Button</option>';
            str += '<option value="MultiCheckbox">MultiCheckbox</option>';
            str += '<option value="Checkbox">Checkbox</option>';
            str += '<option value="TextboxArea">TextboxArea</option>';
            str += '<option value="TextboxDocSEQ">TextboxDocSEQ</option>';
            str += '</select></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('ID:') ?>';
            str += '<input type="text" name="id_obj_' + _id_obj + '" id="id_obj_' + _id_obj + '"/></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Name:') ?>';
            str += '<input type="text" name="name_obj_' + _id_obj + '" id="name_obj_' + _id_obj + '"/></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Allow Null:') ?>';
            str += '<input type="radio" checked name="allow_obj_' + _id_obj + '" class="allow_obj_' + _id_obj + '" value="Yes"/><?php echo __('Yes') ?>';
            str += '<input type="radio" name="allow_obj_' + _id_obj + '" class="allow_obj_' + _id_obj + '" value="No"/><?php echo __('No') ?></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Validater:') ?>';
            str += '<select name="validate_obj_' + _id_obj + '" id="validate_obj_' + _id_obj + '">';
            str += '<option value="text">text</option>';
            str += '<option value="email">email</option>';
            str += '<option value="number">number</option>';
            str += '<option value="phone">phone</option>';
            str += '<option value="money">money</option>';
            str += '<option value="date">date</option>';
            str += '<option value="ddli">ddli</option>';
            str += '<option value="fax">fax</option>';
            str += '<option value="numberString">numberString</option>';
            str += '</select></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Label Object:') ?>';
            str += '<input type="text" name="label_obj_' + _id_obj + '" id="label_obj_' + _id_obj + '"/></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Default value:') ?>';
            str += '<input type="text" name="default_value_obj_' + _id_obj + '" id="default_value_obj_' + _id_obj + '"/></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('Size:') ?>';
            str += '<input type="text" name="size_obj_' + _id_obj + '" id="size_obj_' + _id_obj + '"/></label>';
            str += '<label line_id="line_id_' + _i + '"><?php echo __('View:') ?>';
            str += '<input type="radio" checked name="view_obj_' + _id_obj + '" class="view_obj_' + _id_obj + '" value="True"/><?php echo __('True') ?>';
            str += '<input type="radio" name="view_obj_' + _id_obj + '" class="view_obj_' + _id_obj + '" value="False"/><?php echo __('False') ?></label>';
            str += '<label><button type="button" class="btn_apply_attr"><?php echo __('Apply') ?></button><button type="button" class="btn_attr_cancel"><?php echo __('Cancel') ?></button></label>';
            return str;
        }
        $(document).on('click', '.btn_edit_attr', function() {
            var li_parent = $(this).siblings('label');
            $(li_parent).each(function() {
                var type_item = $(this).attr('type');
                switch (type_item)
                {
                    case 'type':
                        var selected = '#so_attr_type option[value="' + $(this).attr('data') + '"]';
                        $("#so_attr_type option:selected").prop("selected", false);
                        $(selected).prop("selected", true);
                        break;
                    case 'id':
                        $('#txt_attr_id').attr('value', $(this).attr('data'));
                        break;
                    case 'name':
                        $('#txt_attr_name').attr('value', $(this).attr('data'));
                        break;
                    case 'allownull':
                        var checked = '[value="' + $(this).attr('data') + '"]';
                        $('.rd_attr_allownull').filter(checked).attr('checked', true);
                        break;
                    case 'validate':
                        var selected = '#so_attr_validate option[value="' + $(this).attr('data') + '"]';
                        $("#so_attr_validate option:selected").prop("selected", false);
                        $(selected).prop("selected", true);
                        break;
                    case 'label':
                        $('#txt_attr_label_obj').attr('value', $(this).attr('data'));
                        break;
                    case 'default_value':
                        $('#txt_attr_default_value').attr('value', $(this).attr('data'));
                        break;
                    case 'size':
                        $('#txt_attr_size').attr('value', $(this).attr('data'));
                        break;
                    case 'view':
                        var checked = '[value="' + $(this).attr('data') + '"]';
                        $('.rd_attr_view').filter(checked).attr('checked', true);
                        break;
                }
            });
            $("#dialog_attr").dialog("open");
        });
        $('#dialog_attr_cancel').click(function() {
            $("#dialog_attr").dialog("close");
        });
        $("#dialog_attr").dialog({
            autoOpen: false,
            title: "<?php echo __('Object') ?>",
            width: 450,
            resizable: false,
            show: {
                duration: 1000
            },
            hide: {
                duration: 1000
            }
        });

    })(jQuery);

</script>