<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Estado extends DataMapper
{

	//no hace falta en este caso, pero es una buena costumbre definir la propiedad table
	public $table = "estados";

	//relación a muchos con users, un estado puede pertenecer a muchos usuarios
	public $has_many = array("user");

	public $validation = array(
        'nombre' => array(
            'label' => 'Estado',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 2, 'max_length' => 100),
        ),
        'codigo' => array(
            'label' => 'Codigo',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 2, 'max_length' => 100),
        )
    );
}
/* End of file estado.php */
/* Location: ./application/models/estado.php */