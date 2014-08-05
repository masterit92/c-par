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
                            <li class="ui-state-default obj_line">
                                <?php $line_id = "line_id_$i"; ?>
                                <?php echo __('Lable Line:') ?>
                                <input type="text" class="input_line_label" value="<?php echo $line['line_label'] ?>" id="<?php echo $line_id; ?>"/>
                                <?php $num_atrr = count($line) - 1; ?>
                                <?php if (is_array($line)): ?>
                                    <ul class="ui-sortable" id="<?php echo "obj_attr_$i" ?>">
                                        <?php for ($k = 0; $k < $num_atrr; $k++): ?>
                                            <li class="ui-state-default">
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
                                                <a href="#" ><?php echo __('Edit') ?></a>
                                                <a href="#" ><?php echo __('Remove') ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                <?php endif; ?>
                                <button type="button" class="btn_add_object" id_ul="<?php echo $i ?>">Add Object</button>
                            </li>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <button type="button" name="btn_add_line" id="btn_add_line" value="<?php echo __('Add New Line') ?>" ><?php echo __('Add New Line') ?></button>
                <button type="button" name="btn_save_attr" id="btn_save_attr" value="<?php echo __('Save') ?>" ><?php echo __('Save') ?></button>
            </div>
        </form>
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
            var str = '<label line_id="line_id_'+i+'"><?php echo __('Type:') ?>';
            str += '<select name="sel_object_type_' + id_obj + '" id="sel_object_type_' + id_obj + '">';
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
            str += '<label line_id="line_id_'+i+'"><?php echo __('ID:') ?>';
            str += '<input type="text" name="id_obj_' + id_obj + '" id="id_obj_' + id_obj + '"/></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('Name:') ?>';
            str += '<input type="text" name="name_obj_' + id_obj + '" id="name_obj_' + id_obj + '"/></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('Allow Null:') ?>';
            str += '<input type="radio" checked name="allow_obj_' + id_obj + '" class="allow_obj_' + id_obj + '" value="Yes")/><?php echo __('Yes') ?>';
            str += '<input type="radio" name="allow_obj_' + id_obj + '" class="allow_obj_' + id_obj + '" value="No")/><?php echo __('No') ?></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('Validater:') ?>';
            str += '<select name="validate_obj_' + id_obj + '" id="validate_obj_' + id_obj + '">';
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
            str += '<label line_id="line_id_'+i+'"><?php echo __('Label Object:') ?>';
            str += '<input type="text" name="label_obj_' + id_obj + '" id="label_obj_' + id_obj + '"/></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('Default value:') ?>';
            str += '<input type="text" name="default_value_obj_' + id_obj + '" id="default_value_obj_' + id_obj + '"/></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('Size:') ?>';
            str += '<input type="text" name="size_obj_' + id_obj + '" id="size_obj_' + id_obj + '"/></label>';
            str += '<label line_id="line_id_'+i+'"><?php echo __('View:') ?>';
            str += '<input type="radio" checked name="view_obj_' + id_obj + '" class="view_obj_' + id_obj + '" value="True")/><?php echo __('True') ?>';
            str += '<input type="radio" name="view_obj_' + id_obj + '" class="view_obj_' + id_obj + '" value="False")/><?php echo __('False') ?></label>';
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
                data: {arr_line: arr_line, arr_item: arr_item}
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
    })(jQuery);

</script>