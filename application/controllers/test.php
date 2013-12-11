<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

class Test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	//creamos un nuevo usuario
	public function index()
	{

		//creamos un objeto user para un nuevo usuario
		$user = new User();
		$user->username = "unodepiera";
		$user->password = "123456";
		$user->confirm_password = "123456";
		$user->email = "unodepiera@uno-de-piera.com";
		$user->estado_id = 1;

		//si el usuario se crea correctamente mostramos la información del mismo
		if($user->save())
		{
			echo "El usuario se ha guardado correctamente \n";
			echo "Nombre : $user->username \n";
			echo "Password : $user->password \n";
			echo "Email : $user->email \n";
			echo "Estado : $user->estado_id \n";

		}else{
			//si no se crea el usuario y hay un error de validación mostramos
			//dos posibles formas de mostrar estos errores
			//individualmente
            echo $user->error->username;
            echo $user->error->password;
            echo $user->error->email;

            //o en un loop
            foreach ($user->error->all as $error)
            {
                echo $error;
            }
		}
	}

	//creamos un nuevo estado en la tabla estados
	public function add_estado()
	{
		//creamos un objeto estado para añadir un nuevo registro
		$estado = new Estado();
		$estado->nombre = "Spain";
		$estado->codigo = "ES";

		//si se ha podido guardar la estado
		if($estado->save())
		{
			echo "El estado se ha guardado correctamente \n";
			echo "Nombre : $estado->nombre \n";
			echo "Codigo : $estado->codigo \n";

		}else{
			// si la validación falla mostramos varias formas de mostrar los errores
            echo $estado->error->nombre;
            echo $estado->error->codigo;
		}
	}

	//creamos un nuevo curso en la tabla cursos
	public function add_curso()
	{
		$curso = new Curso();
		$curso->curso = "PHP";
		$curso->precio = "150";

		//si se ha podido guardar la estado
		if($curso->save())
		{
			echo "El curso se ha guardado correctamente \n";
		}else{
            foreach ($curso->error->all as $error)
            {
                echo $error;
            }
		}
	}

	//relacionamos un curso a un usuario, de esta forma insertamos un nuevo
	//registro en la tabla cursos_users 
	public function relation_user_curso()
	{
		//creamos un usuario user
		$user = new User();
		//obtenemos un usuario por su username
		$user->where('username', 'unodepiera')->get();
		//también podemos hacer
		//$user->get_by_username('unodepiera');

		//creamos un objeto curso
		$curso = new Curso();

		//obtenemos un curso
		$curso->where('curso', 'PHP')->get();

		//esta es la forma de insertar el nuevo registro
		if($user->save($curso))
		{
			echo "La curso ha sido asociadO al usuario correctamente";
		}else{
			echo "Ha ocurrido un error";
		}
	}

	//obtenemos los datos del usuario, su estado y su dni
	public function get_all_data($name)
	{
		$user = new User();
		//métodos dinamicos
		$user->get_by_username("unodepiera");

		//obtenemos los datos del estado asociado al usuario
		$user->estado->get();

		//obtenemos los datos del dni asociado al usuario
		$user->dni->get();

		//obtenemos los datos de los cursos asociados al usuario
		$cursos = $user->curso->get();

		//mostramos la información del usuario
		echo '<p>El estado del usuario ' . $user->username . ' es ' . $user->estado->nombre . ', y el código de '
		. $user->estado->nombre . ' es ' . $user->estado->codigo . '. Su dni tiene el número ' . $user->dni->numero . '.</p>';

		//obtenemos todos sus cursos contratados
		echo "Sus cursos contratados son: ";
		echo "<br />";
		foreach ($cursos as $curso) {
			echo $curso->curso . ': ' . $curso->precio;
			echo "<br />";
		}
	}
 
 	//añadimos un nuevo dni a un usuario por su id
	public function add_dni_user($user_id)
	{
		$dni = new Dni();
		$dni->numero = "55555555-X";
		$dni->user_id = $user_id;

		//si se ha podido guardar el dni
		if($dni->save())
		{
			echo "El dni se ha guardado correctamente \n";
		}else{
			// si la validación falla mostramos los errores
            echo $dni->error->numero;
            echo $dni->error->user_id;
		}
	}

	//eliminamos todos los datos de un usuario junto con sus relaciones
	public function delete_user_data($id)
    {

		$user = new User();
		$dni = new Dni();
		$user->get_by_id($id);
		$dni->get_by_user_id($id);

		//si tiene un dni asociado lo eliminamos
		if($dni->exists())
		{
			$dni->delete();
		}

		//eliminamos todos los datos de un usuario por su id
		if($user->delete())
		{
			echo "El usuario se ha eliminado correctamente \n";
		}else{
			echo "Ha ocurrido un error";
		}
    }
}
/* End of file test.php */
/* Location: ./application/controllers/test.php */