<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

    public function index()
    {
        $histories = array (
          'meta' => 
          array (
            'count' => 1,
            'total' => 1,
          ),
          'data' => 
          array (
            0 => 
            array (
              'type' => 'history',
              'id' => '270',
              'attributes' => 
              array (
                'loggable_type' => 'items',
                'loggable_id' => 791,
                'action' => 'assign',
                'kwuid' => 556396,
                'value' => '123',
                'created_at' => '2019-04-26T15:10:32+00:00',
                'updated_at' => '2019-04-26T15:10:32+00:00',
              ),
              'links' => 
              array (
                'self' => 'http://localhost:8002/api/v1/history/270',
              ),
            ),
          ),
          'links' => 
          array (
            'first' => 'http://localhost:8002/api/v1/history?page[limit]=10&page[offset]=0',
            'last' => 'http://localhost:8002/api/v1/history?page[limit]=10&page[offset]=0',
            'next' => NULL,
            'prev' => NULL,
          ),
        );
        return response()->json($histories);
    }

    public function show($id)
    {
        $histories = array (
            'data' => 
            array (
              'type' => 'history',
              'id' => $id,
              'attributes' => 
              array (
                'loggable_type' => 'items',
                'loggable_id' => 133,
                'action' => 'assign',
                'kwuid' => 556396,
                'value' => '123',
                'created_at' => '2019-04-26T16:46:56+00:00',
                'updated_at' => '2019-04-26T16:46:56+00:00',
              ),
              'links' => 
              array (
                'self' => 'http://localhost:8002/api/v1/history/'.$id,
              ),
            ),
        );
        return response()->json($histories);
    }
}