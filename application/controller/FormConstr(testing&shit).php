<?php
/**
 * 
 */

abstract class FormConstr{
  protected $form;
   
  public function __construct(Entity $entity)
  {
    $this->setForm($entity);
  }
   
  abstract public function build();
   
  public function setForm(Form $form)
  {
    $this->form = $form;
  }
   
  public function form()
  {
    return $this->form;
  }
}
?>
