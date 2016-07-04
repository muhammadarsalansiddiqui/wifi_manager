<?php
// app/Model/User.php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {

    #public $belongsTo = 'Usergroup';
    public $hasMany = array('Hotspot', 'Package');
    
    public $validate = array(
        
        'username' => array(
           
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'last'      => true,
                'allowEmpty' => false,
                'message'  => 'Alphabets and numbers only'
            ),
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters'
            ),
            'isUnique' => array(
                'rule'    => 'isUnique',
                'message' => 'This username has already been taken.'
            )
        ),
        
        'pwd' => array(
            'required' => array(
                'on' => 'create',
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            ),
            'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Between 5 to 15 characters'
            ),
         ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'user')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['pwd'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['pwd']);
        }
        return true;
    }

} // User
