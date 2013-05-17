<?php

/**
 * gestion des formulaires
 *
 * @author internet07
 */

class FormController {
    
  protected $form;
  protected $manager;
  protected $request;
 
  public function __construct($form, $manager, $request)
  {
    $this->setForm($form);
    $this->setManager($manager);
    $this->setRequest($request);
  }
   
  /**
   * verifie le type de requete, et la validation
   * @return boolean
   */
  public function process()
  {
    if($this->request->method() == 'POST' && $this->form->Valide())
    {
      $this->manager->save($this->form->entity());
       
      return true;
    }
 
    return false;
  }
   
  public function setForm($form)
  {
    $this->form = $form;
  }
   
  public function setManager($manager)
  {
    $this->manager = $manager;
  }
   
  public function setRequest($request)
  {
    $this->request = $request;
  }

}

?>
