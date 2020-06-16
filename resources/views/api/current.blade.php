<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
</head>
<body>
    <?php
        $data = array();
        $temp = array();
        array_push($data, $temp);
    
        foreach($technologies as $tech){
            $commodityTemp = array();
            $sectorTemp = array();
            $categoryTemp = array();
            $temp = array(
                $tech->name,
                $tech->region,
                $tech->year_developed,
                $tech->description
                );
            if($tech->commodities->count() > 0){
                array_push($temp, $tech->commodities->get(0)->name);
                array_push($temp, $tech->commodities->get(0)->sector->name);
                array_push($temp, $tech->commodities->get(0)->sector->industry->name);
            }
            if($tech->technology_categories->count() > 0){
                array_push($temp, $tech->technology_categories->get(0)->name);
            }
            array_push($data, $temp);
        }
          /*  $fp = fopen('php://output', 'wb');
            foreach ( $data as $line ) {
                $val = explode(",", $line);
                fputcsv($fp, $val);
            } 
            */
        $fp = fopen('file.csv', 'wb');

        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        echo($fp);
        fclose($fp);
        print_r($data);
    ?>
 
</body>
    
</html>
