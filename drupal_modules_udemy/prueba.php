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



