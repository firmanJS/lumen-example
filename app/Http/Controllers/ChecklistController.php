<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{

  public function index(Request $request)
  {
    $data = array (
      'meta' => 
      array (
        'count' => 10,
        'total' => 100,
      ),
      'links' => 
      array (
        'first' => 'https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=0',
        'last' => 'https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=10',
        'next' => 'https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=10',
        'prev' => 'null',
      ),
      'data' => 
      array (
        0 => 
        array (
          'type' => 'checklists',
          'id' => '1',
          'attributes' => 
          array (
            'object_domain' => 'contact',
            'object_id' => '1',
            'description' => 'Need to verify this guy house.',
            'is_completed' => false,
            'due' => NULL,
            'task_id' => 1,
            'urgency' => NULL,
            'completed_at' => NULL,
            'last_update_by' => NULL,
            'update_at' => NULL,
            'created_at' => '2018-01-25T07:50:14+00:00',
          ),
          'links' => 
          array (
            'self' => 'https://kong.command-api.kw.com/api/v1/checklists/1/',
          ),
        ),
      ),
    );
    return response()->json($data);
  }
  
  public function store(Request $request)
  {
    $content = json_decode($request->getContent(),true);
    $checklist = array (
      'data' => 
      array (
        'type' => 'checklists',
        'id' => '1547',
        'attributes' => 
        array (
          'object_domain' => $content['data']['attributes']['object_domain'],
          'object_id' => $content['data']['attributes']['object_id'],
          'task_id' => $content['data']['attributes']['task_id'],
          'description' => 'Need to verify this guy house.',
          'is_completed' => false,
          'due' => $content['data']['attributes']['due'],
          'urgency' => $content['data']['attributes']['urgency'],
          'completed_at' => NULL,
          'updated_by' => NULL,
          'created_by' => 556396,
          'created_at' => '2019-04-12T14:13:42+00:00',
          'updated_at' => '2019-04-12T14:13:42+00:00',
        ),
        'links' => 
        array (
          'self' => 'http://localhost:8000/api/v1/checklists/1547',
        ),
      ),
    );
    return response()->json($checklist);
  }
  
  public function show($id)
  {
    $checklist = array (
      'data' => 
      array (
        'type' => 'checklists',
        'id' => 1,
        'attributes' => 
        array (
          'object_domain' => 'contact',
          'object_id' => '1',
          'description' => 'Need to verify this guy house.',
          'is_completed' => false,
          'due' => NULL,
          'urgency' => 0,
          'completed_at' => NULL,
          'last_update_by' => NULL,
          'update_at' => NULL,
          'created_at' => '2018-01-25T07:50:14+00:00',
        ),
        'links' => 
        array (
          'self' => 'https://dev-kong.command-api.kw.com/checklists/50127',
        ),
      ),
    );
    return response()->json($checklist);
    
  }
  
  public function update(Request $request, $id)
  {
    $content = json_decode($request->getContent(),true);
    $checklist = array (
      'data' => 
      array (
        'type' => 'checklists',
        'id' => $content['data']['attributes']['object_id'],
        'attributes' => 
        array (
          'object_domain' => $content['data']['attributes']['object_domain'],
          'object_id' => $content['data']['attributes']['object_id'],
          'description' => 'Need to verify this guy house.',
          'is_completed' => false,
          'due' => NULL,
          'urgency' => 0,
          'completed_at' => NULL,
          'last_update_by' => NULL,
          'update_at' => NULL,
          'created_at' => '2018-01-25T07:50:14+00:00',
        ),
        'links' => 
        array (
          'self' => 'https://dev-kong.command-api.kw.com/checklists/50127',
        ),
      ),
    );
    return response()->json($checklist);
  }
  
  public function destroy($id)
  {
    if ($id != 1){
      return response()->json(['status' => 404, 'error'=> 'Not Found']);
    }
    return response()->json(['status' => 204]);
  }
}