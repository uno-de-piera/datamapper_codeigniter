<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class User extends DataMapper
{

    //nombre de la tabla, es recomendable establecerlo
    //podemos llamarle usuarios o como queramos, pero de la misma forma que la tabla
	public $table = "users";

    //un usuario puede tener un estado y un dni
	public $has_one = array("dni","estado");

    //un usuario puede tener muchos cursos
    public $has_many = array("curso");

    //validación de los campos de la tabla users
	public $validation = array(
        'username' => array(
            'label' => 'Nombre de usuario',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required', 'min_length' => 6, 'encrypt'),
        ),
        'confirm_password' => array(
            'label' => 'Confirma el Password',
            'rules' => array('required', 'encrypt', 'matches' => 'password'),
        ),
        'email' => array(
            'label' => 'Dirección de email',
            'rules' => array('required', 'trim', 'valid_email')
        ),
        'estado_id' => array(
            'label' => 'Id del estado',
            'rules' => array('required', 'trim')
        )
    );

    //validación para encriptar los passwords ofrecida por el mismo datamapper
    public function _encrypt($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }
}
/* End of file user.php */
/* Location: ./application/models/user.php */