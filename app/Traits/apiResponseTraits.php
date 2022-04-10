<?php
    namespace App\Traits;

    trait apiResponseTraits{
        function apiResponse($status,$massage,$data=null){
            $response=[
                'status'    =>$status,
                'massage'   =>$massage,
                'data'      =>$data
            ];
            return response()->json($response);
        }
    }
?>
