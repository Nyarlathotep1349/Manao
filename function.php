<?php
function clean($postValue)
{
    $value = htmlspecialchars(trim($postValue));
    return $value;
}

function jsonResponse($success, $errors = NULL)
{
    echo json_encode([
        'success' => $success,
        'errors' => $errors
    ]);
    exit();
}

//$xml - объект SimpleXMLElement
function saveXml($xml)
{
    $save = $xml->asXML('db/xmlDataStorage.xml');
    if ($save){
        jsonResponse(true);
    }else{
        $errors[]['info'] = 'Ошибка. Не удалось сохранить данные.';
        jsonResponse(false, $errors);
    }
}
