<?php 

/**
 * Interface de base pour les modeles
 * 
 * @version 	1.00
 * @license 	http://www.gnu.org/copyleft/gpl.html GPL
 * @package 	Modeles	
 */

interface ModelInterface
{
	
	public function add();

	public function delete($id);

	public function update($id);

	public function check($id);

}



 ?>