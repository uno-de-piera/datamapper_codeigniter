<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Dni extends DataMapper
{

	//nombre de la tabla
	public $table = "dnis";

    //un usuario tiene un sólo dni
	public $has_one = array("user");

    //validación de los campos de la tabla dnis
	public $validation = array(
        'user_id' => array(
            'label' => 'Id del usuario',
            'rules' => array('required', 'trim', 'unique'),
        ),
        'numero' => array(
            'label' => 'Nuúmero de dni',
            'rules' => array('required', 'min_length' => 8, 'max_length' => 12, 'alpha_dash_dot'),
        )
    );
}
/* End of file dni.php */
/* Location: ./application/models/dni.php */