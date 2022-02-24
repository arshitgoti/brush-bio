<?php

if (!function_exists('uniResponse')) {
    function uniResponse($status = 'success'||'error', $message = null, $data = null, $http_code = 500)
    {
        $res = [];

        if (!is_null($status)) {
            $res['status'] = $status;
        }

        if (!is_null($message)) {
            $res['message'] = $message;
        }

        // Check if the data object / array is instance of paginator
        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $paginate = [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ];
            $res['paginate'] = $paginate;
            $data = $data->items();
        }

        if (!is_null($data)) {
            $res['data'] = $data;
        }

        return response()->json($res, $http_code);
    }
}

if (!function_exists('str_replace_between')) {
    /**
     * Replace string between two characters, mostly special characters
     */
    function str_replace_between($string, $replace, $from, $to)
    {
        $search = "/[^" . $from . "](.*)[^" . $to . "]/";
        return preg_replace($search, $replace, $string);
    }
}


if (!function_exists('getSQL')) {
    function getSQL($builder)
    {
        $sql = $builder->toSql();
        foreach ($builder->getBindings() as $binding) {
            $value = is_numeric($binding) ? $binding : "'" . $binding . "'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }
        return $sql;
    }
}

/**
 * Set the flash data according to it's type for displaying notification
 * @param $title String
 * @param $message string
 * @param $type String
 */
if ( !function_exists('setFlash') ) {
    function setFlash($title = null, $message = null, $type = null)
    {
        if ($title) {
            Session::flash('alert-title', $title);
        }
        if ($message) {
            Session::flash('alert-message', $message);
        }
        if ($type) {
            Session::flash('alert-class', $type);
        }
    }
}
