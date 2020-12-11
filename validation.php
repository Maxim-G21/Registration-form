<?php

function validation($mail) { 
        $i = 0;
        while ($i < strlen($mail)) {
            if($mail[$i] === '@') {
                return 'correct';
            };
            $i++;
        };  
    return 'error';    
};

function searchMail($array, $mail){
    foreach($array as $value1){
        foreach($value1 as $value2) {
            if($value2 === $mail){
                return 'success';
            };
        };
    };
    return 'error';
};

$userList = array(
    array(
        'name' => "FirstName1 SecondName1",
        'e-mail' => "email_1@d.com",
        'id' => 0
        ),
    array(
        'name' => "FirstName2 SecondName2", 
        'e-mail' => "email_2@d.com", 
        'id' => 1
        ),
    array(
        'name' => "FirstName3 SecondName3",
        'e-mail' => "email_3@d.com",
        'id' => 2
        ),
);


if(empty($_POST['first-name']) || empty($_POST['second-name']) || empty($_POST['e-mail']) || empty($_POST['password-one']) || empty($_POST['password-two'])) {
    $errorType = "Заполните все поля";
}
else{
    $firstName = $_POST['first-name'];
    $secondName = $_POST['second-name'];
    $eMail = $_POST['e-mail'];
    $passwordOne = $_POST['password-one'];
    $passwordTwo = $_POST['password-two'];

    $lastKey = array_keys($userList);
    $newUserId = end($lastKey) + 1;

    if($passwordOne === $passwordTwo) {
        if(validation($eMail) === 'correct'){
            $userList[] = array( 
            'name' => "{$firstName} {$secondName}",
            'e-mail' => "{$eMail}", 
            'id' => "{$newUserId}"
            );
        }
        else {
            $errorType = "Некорректный адрес электронной почты";
        };
    }
    else {       
        $errorType = "Пароли не совпадают";
    };
};

if(searchMail($userList,$eMail) === 'success'){
    $information = 'Новый пользователь успешно записан';
}
else {
    $information = 'Ошибка записи';
    print_r($errorType);
};
$file = 'test.txt';
$log = date('Y-m-d H:i:s');
file_put_contents($file, "{$log} {$information}\n", FILE_APPEND);



