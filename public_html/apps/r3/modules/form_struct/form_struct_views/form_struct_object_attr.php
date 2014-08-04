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
<?php if (!defined('SERVER_ROOT')) exit('No direct script access allowed');

$v_record_type_code = 'TP04';//get_request_var('sel_record_type');
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
            <div id="form_struct_object_attr">
                <textarea name="txt_xml_string" style="width: 954px; margin: 2px 0px; height: 466px;"><?php echo $v_xml_string;?></textarea>
                <ul>
                </ul>
                <button type="button" name="btn_add_line" id="btn_add_line" value="<?php echo __('Add New Line') ?>" ><?php echo __('Add New Line') ?></button>
                <button type="button" name="btn_add_line" id="btn_add_line" value="<?php echo __('Save') ?>" ><?php echo __('Save') ?></button>
            </div>
        </form>
    </body>
</html>
<script>
    var i = 0;
    jQuery(document).ready(function($) {
        $('#btn_add_line').on('click', function() {
            $('#form_struct_object_attr ul:first').append("<li class='ui-state-default'><ul class='ui-sortable' id='obj_attr_" + i + "'><liclass='ui-state-default'><?php echo __('Lable Line:') ?><input type='text' name='lable_line_" + i + "' id='lable_line_" + i + "'</li></ul><button type='button' class='btn_add_object' id_ul='" + i + "'>Add Object</button></li>");
            i++;
        });
        $(document).on('click', '.btn_add_object', function() {
            var id_obj = $(this).attr('id_ul');
            var id_ul = '#obj_attr_' + id_obj;
            var str = '<?php echo __('Type:') ?>';
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
            str += '</select><br/>';
            str += '<?php echo __('ID:') ?>';
            str += '<input type="text" name="id_obj_' + id_obj + '" id="id_obj_' + id_obj + '"/><br/>';
            str += '<?php echo __('Name:') ?>';
            str += '<input type="text" name="name_obj_' + id_obj + '" id="name_obj_' + id_obj + '"/><br/>';
            str += '<?php echo __('Allow Null:') ?>';
            str += '<label><input type="radio" checked name="allow_obj_' + id_obj + '" class="allow_obj_' + id_obj + '" value="Yes")/><?php echo __('Yes') ?></label>';
            str += '<label><input type="radio" name="allow_obj_' + id_obj + '" class="allow_obj_' + id_obj + '" value="No")/><?php echo __('No') ?></label><br/>';
            str += '<?php echo __('Validater:') ?>';
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
            str += '</select><br/>';
            str += '<?php echo __('Label Object:') ?>';
            str += '<input type="text" name="label_obj_' + id_obj + '" id="label_obj_' + id_obj + '"/><br/>';
            str += '<?php echo __('Default value:') ?>';
            str += '<input type="text" name="default_value_obj_' + id_obj + '" id="default_value_obj_' + id_obj + '"/><br/>';
            str += '<?php echo __('Size:') ?>';
            str += '<input type="text" name="size_obj_' + id_obj + '" id="size_obj_' + id_obj + '"/><br/>';
              str += '<?php echo __('View:') ?>';
            str += '<label><input type="radio" checked name="view_obj_' + id_obj + '" class="view_obj_' + id_obj + '" value="True")/><?php echo __('True') ?></label>';
            str += '<label><input type="radio" name="view_obj_' + id_obj + '" class="view_obj_' + id_obj + '" value="False")/><?php echo __('False') ?></label><br/>';
            $(id_ul).append("<li class='ui-state-default'>" + str + "</li>");
        });
        //Dag and drop element
        $(function() {
            $("#form_struct_object_attr ul").sortable({
                revert: true
            });
        });
    })(jQuery);

</script>