<?php

/**
 * la class form doit pouvoir : 
 *  -stocker les champs
 *  -stocker une entité 'formulaire'
 *  -recuperer l'entité dans un construct ?
 *  -methode ajout de champ
 *  -methode generer form
 *  -methode validation
 */
abstract class Form {

    protected $entity;
    protected $fields_liste;

    public function __construct(Entity $entity) {
        $this->setEntity($entity);
    }
    /**
     * stockage
     * @param Field $field
     * @return \Field
     */
    public function add(Field $field) {
        $attr = $field->getname(); /* recup le nom du champ */
        $field->setValue($this->entity->$attr()); /* on lui colle la valeur */

        $this->fields_liste[] = $field;
        return $field;
    }
    /**
     * vue (finir dans classe fille)
     * @return string
     */
    public function createView() {
        $view = '';

        foreach ($this->fields as $field) {
            $view .= $field->buildMyForm() . '<br />';
        } //fct appellée chez les class filles (type/valeur/validateur?)

        return $view;
    }
    /**
     * 
     */
    public function isValid() {
        /* no idea */
    }
    
    public function entity() {
        return $this->entity;
    }

    public function setEntity(Entity $entity) {
        $this->entity = $entity;
    }

}

?>
