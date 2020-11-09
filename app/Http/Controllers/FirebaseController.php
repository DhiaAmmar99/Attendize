<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Database;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;


class FirebaseController extends Controller
{

    public function index(){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseKey.json');

		$firebase= (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://ica-2020.firebaseio.com')->create();

		$database= $firebase->getDatabase()->getReference()->getvalue();

      
        dd($database);

		// print_r($database);
    }
    

    public function fire()
    {
        $db = new FirestoreClient();
        // $db = new FirestoreClient([
        //     'projectId' => 'ica-2020',
        // ]);

        $ref = $db->collection('Chats');

        $documents = $ref->documents();
        // foreach ($documents as $user) {
            // if ($user->exists()) {
            //     printf('Document data for document %s:');
            //     print_r($user->data());
            //     printf(PHP_EOL);
            // } else {
            //     printf('Document %s does not exist!');
            // }
            // printf('Document returned by query '. $user->id());
            
        // }
        dd ('Document returned by query '. $documents);
        
        
    }
    
}
