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
defined('DS')  OR define('DS', DIRECTORY_SEPARATOR);
defined('_PATH_TO_PEAR') OR define('_PATH_TO_PEAR',  __DIR__ . DS . 'libs' . DS . 'PEAR' . DS);

ini_set('include_path', _PATH_TO_PEAR);
require_once('Image/Barcode2.php');

Image_Barcode2::draw($_GET['bc'], 'code128', 'png');