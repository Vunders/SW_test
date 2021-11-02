<?php
header('Content-type: application/json');
include('../private/config.php');

$output = [
    'status' => false
];



if (isset($_GET['api-name']) && is_string($_GET['api-name'])) {

    if ($_GET['api-name'] == 'new_post') {
        
        $output['status'] = true;
        include_once(PRIVATE_DIR . "/classes/DB.php");
        $project_db = new DB('products');
                if($_POST['size']!==""){
            $result = $project_db->add([
            'sku' =>  $_POST['sku'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'size' => $_POST['size']
            
        ]);
        $output['products'] = [
            'sku' => $result['entity']['sku'],
            'name' => $result['entity']['name'],
            'price' => $result['entity']['price'],
            'size' => $result['entity']['size'],
                    ];
    }
        elseif($_POST['lenght']!==""){
            $result = $project_db->add([
            'sku' =>  $_POST['sku'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
             'height' => $_POST['height'],
            'width' => $_POST['width'],
            'lenght' => $_POST['lenght']
            ]);
            $output['products'] = [
                'sku' => $result['entity']['sku'],
                'name' => $result['entity']['name'],
                'price' => $result['entity']['price'],
                'height' => $result['entity']['height'],
                'width' => $result['entity']['width'],
                'lenght' => $result['entity']['lenght']
                
            ];}
            elseif($_POST['weight']!==""){
                $result = $project_db->add([
                'sku' =>  $_POST['sku'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'weight' => $_POST['weight']
                ]);
                $output['products'] = [
                    'sku' => $result['entity']['sku'],
                    'name' => $result['entity']['name'],
                    'price' => $result['entity']['price'],
                    'weight' => $result['entity']['weight']
                ];}      
            
    } elseif ($_GET['api-name'] == 'posts') {
        include_once(PRIVATE_DIR . "/classes/DB.php");
        $project_db = new DB('products');
        $data = $project_db->getAll();
        if ($data['status']) {
            $entries = [];

            $ids = array_keys($data['entities']);
            for ($i = count($data['entities']) - 1; $i >= 0; $i--) {
                $post = $data['entities'][$ids[$i]];

                //foreach ($data['entities'] as $post) {
                $template = [
                    'id' => $post['id'],
                    'sku' => $post['sku'],
                    'name' => $post['name'],
                    'price' =>  $post['price'],
                    'size' => $post['size'],
                    'height' =>  $post['height'],
                    'width' =>  $post['width'],
                    'lenght' =>  $post['lenght'],
                    'weight' =>  $post['weight']
                ];
                $entries[] = $template;
            }
            $output['status'] = true;
            $output['posts'] = $entries;
        }
    }
    elseif ($_GET['api-name'] == 'posts') {
        include_once(PRIVATE_DIR . "/classes/DB.php");
        $project_db = new DB('products');
        $output['status'] = $db_manager->deleteTask($_GET['delete']);
    
    }

}


//tas ko izvada response sadaļā, tapēc pārvērš no php uz json

echo json_encode($output, JSON_PRETTY_PRINT);
