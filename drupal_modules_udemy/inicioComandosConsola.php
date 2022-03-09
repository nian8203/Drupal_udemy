<?php

//opcion 1
\Drupal::messenger()->addMessage(t('Datos guardados correctamente'));
\Drupal::messenger()->addMessage(t('Datos guardados correctamente con status'),'status');
\Drupal::messenger()->addMessage(t('Deseas eliminar los datos?'),'warning');
\Drupal::messenger()->addMessage(t('Se ha presentado un error'),'error');

//opcion 2
\Drupal::messenger()->addStatus(t('Datos guardados correctamente con status'));
\Drupal::messenger()->addWarning(t('Datos guardados correctamente con status'));
\Drupal::messenger()->addError(t('Datos guardados correctamente con status'));

$nodo = \Drupal\node\Entity\Node::load(1); //leer nodos
ksm($nodo);

//opcion2
use Drupal\node\Entity\Node;
$nodo = Node::load(1);
ksm($nodo);

//obtener un campo en particular
$nodo = \Drupal\node\Entity\Node::load(1); //leer nodos
ksm($nodo);
dpm($nodo->get('title')->getValue());

$nodo = \Drupal\node\Entity\Node::load(1); //leer nodos
ksm($nodo);
dpm($nodo->get('title')->getValue()[0]['value']);
dpm($nodo->get('body')->getValue()[0]['value']);
dpm($nodo->get('uid')->getValue()[0]['target_id']);
dpm($nodo->get('field_tags')->getValue()[0]['target_id']);

//modificar datos
$nodo->get('title')->value="nuevo titulo";
$nodo->get('body')->value="nuevo body";
$nodo->get('uid')->target_id=0;
$nodo->save();
\Drupal::messenger()->addMessage(t('Datos guardados correctamente'));

//crear un nodo completo
//crear un nodo completo
$nodo = \Drupal\node\Entity\Node::create(array(
    'title'=>"creación de nodo",
    "body"=>"cuerpo de nodo nuevo",
    "type"=>"article",
    "uid"=>1
    
    ));
    
    $nodo->save();
    \Drupal::messenger()->addMessage(t("Nodo creado exitosamente!".$nodo->id()));


//borrar nodo
$nodo = \Drupal\node\Entity\Node::load(2);
$nodo->delete();

//ver informacion de usuario
use Drupal\user\Entity\User;
$usuario = User::load(1);

// //otra forma a la anterior igual respuesta
// $usuario = Drupal\user\Entity\Node::load(1);

ksm($usuario);


//buscar usuarios
$usuario = Drupal::currentUser(); //buscar el susuario que esta logueado actualmente
ksm($usuario); //mostrar informacion en arbol

$usuario_id = Drupal::currentUser()->id(); //buscar el id del usuario logueado
dpm($usuario_id); //mostrar info solo el numero del id

//buscar info de usuario por id\
$usuario_id = Drupal::currentUser()->id();
$data = Drupal\user\Entity\User::load($usuario_id);
ksm($data);

//==========forma abreviada=================
dpm($data->get("roles")[0]->target_id);
dpm($data->get("name")->value);
//==========================================

dpm($data->get("name")->getValue()[0]['value']); //acceder al nombre
dpm($data->get("roles")->getValue()[1]['target_id']); //acceder al tipo de rol [0 ó 1] dependiendo del numero de roles

if (isset($data->get("roles")->getValue()[1]['target_id'])) {
    Drupal::messenger()->addMessage("El usuario existe");
}
else{
    Drupal::messenger()->addMessage("El usuario no existe");
}

//EJEMPLO
$user_id = Drupal::currentUser()->id();
$user = Drupal\user\Entity\User::load($user_id);
ksm($user);

$nombre = $user->get("name")->value;
$correo = $user->get("mail")->value;
dpm($nombre);
dpm($correo);

$nombre = $user->get("name")->value = "Nelson Rodriguez"; //cambiar valor del campo

Drupal::messenger()->addMessage("el usuario es ".$nombre." y su correo es ".$correo);

$user->save();

//====================crear usuario nuevo========================
\Drupal\user\Entity\User::create(array(
    "name"=>"Nelson",
    "mail"=>"nelson@gmail.com",
    "roles"=>"Admin", //o el rol que se desee dar
    "status"=>1
))->save();


//====================eliminar usuario nuevo========================
$user = Drupal\user\Entity\User::load(5); //numero de user que desea eliminar
$user->delete();




   

