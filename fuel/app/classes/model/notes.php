<?php

class Model_notes extends Orm\Model
{
    protected static $_table_name = 'notes';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK

        'content' => array(
            'data_type' => 'varchar'    
        ),

        'favourite' => array(
            'data_type' => 'tinyint'  
        )

    );

}