<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Curso extends DataMapper
{

	public $table = "cursos";

	//relación a muchos con users, una ciudad muchos usuarios
	public $has_many = array("user");

	public $validation = array(
        'curso' => array(
            'label' => 'Curso',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 2, 'max_length' => 100),
        ),
        'precio' => array(
            'label' => 'Precio',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 2, 'max_length' => 100),
        )
    );
}
/* End of file curso.php */
/* Location: ./application/models/curso.php */