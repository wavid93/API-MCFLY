<?php

use \Firebase\JWT\JWT;

class Controller_notes extends Controller_Rest
{
	
    //CREAR NUEVA NOTA

    public function post_create()
    {
        $notes = new Model_notes(); 

        $content = Input::post('content');
        //$favourite = Input::post('favourite');


            if (empty($content))
            {
                return [
                        'ERROR' => 'NOTA VACIA'
                                    
                    ];
            }
            else 
            {
                $notes->content = $content;
                $notes->save();

                return [
                        'AVISO' => 'NOTA CREADA'
                                    
                    ];
 
            }
        


    }

    
    //OBTENER TODAS LAS NOTAS

    public function get_notes()
    {
        

        $notes = Model_notes::find('all');

        if (! empty($notes))
        {
            return $notes;
        }
        else return [
                        'ERROR' => 'No existe nota con dicho ID'
                                    
                    ];


                 
    }

    //OBTENER NOTA ESPECIFICA

    public function get_specificNote($id)
    {
        

        $notes = Model_notes::find ('all', array(
        'where' => array(
            array('id', $id),
            )
        ));

        if (! empty($notes))
        {
            return $notes;
        }
        else return [
                        'ERROR' => 'No existe nota con dicho ID'
                                    
                    ];

    }

    //MARCAR NOTA ESPECIFICA COMO FAV

    public function post_favNote($id)
    {
       
        //Obtencion nota

       $note = Model_notes::find ('all', array(
        'where' => array(
            array('id', $id),
            )
        ));


       //Modificar valor FAV de nota

       $setFav = Input::post('favourite'); //POST CON LO QUE LE PASAS POR BODY


            foreach ($note as $key) 
            {
                if ($key['id'] == $id ){

                    $key->favourite = $setFav;    
                    $key->save();        
                }
    
            }

        return [
                    'MENSAJE' => 'NOTA MARCADA COMO FAV'
                                    
                ];
    }


    //OBTENER LISTAS FAVS

    public function get_favNotes()
    {

        $fav = 1;

        $notes = Model_notes::find ('all', array(
        'where' => array(
            array('favourite', $fav),
            )
        ));

        if (! empty($notes))
        {
            return $notes;
        }
        else return [
                        'ERROR' => 'NO TIENES NOTAS FAVORITAS'
                                    
                    ];
        
    }

}


