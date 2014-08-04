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
if (!defined('SERVER_ROOT'))
    exit('No direct script access allowed');

class form_struct_Controller extends Controller {

    /**
     *
     * @var \record_type_Model 
     */
    public $model;

    /**
     *
     * @var \View 
     */
    public $view;

    function __construct() {
        parent::__construct('r3', 'form_struct');
        $this->view->template->show_left_side_bar = FALSE;

        $this->view->template->app_name = 'R3';

        //Kiem tra session
        session::init();
        //Kiem tra dang nhap
        session::check_login();
    }

    public function dsp_plaintext_form_struct() {
        $v_record_type_code = 'TP04'; //get_request_var('sel_record_type');
        $xml_file_path = $this->view->get_xml_config($v_record_type_code, 'form_struct');
        $line =simplexml_load_file($xml_file_path);
        foreach ($line->line as $value) {
            var_dump($value);
            echo '<br/>';
        }
        $this->view->render('form_struct_object_attr');
    }

}
