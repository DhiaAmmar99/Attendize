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
    
    // public function index()
    // {
    //     $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseKey.json');
    //     $firebase = (new Factory)
    //     ->withServiceAccount($serviceAccount)
    //     ->withDatabaseUri("https://ica-2020.firebaseio.com/")
    //     ->create();

    //     $database = $firebase->getDatabase('subjects');

    //     $ref = $database->getReference('ICA-2020');
    //     $sub = $ref->getValue();
    //     foreach($sub as $s){
    //         $all_subject[] = $s;
    //     }
    //     return json_encode($all_subject) ;
       
       
        
    // }


    public function index(){

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseKey.json');

		$firebase= (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://ica-2020.firebaseio.com')->create();

		$database= $firebase->getDatabase()->getReference();

      
        dd($database);

		// print_r($newPost);
    }
    

    public function fire()
    {
        // $db = new FirestoreClient();
        $db = new FirestoreClient([
            'projectId' => 'Chats',
        ]);

        $Ref = $db->collection('Chats');

        $snapshot = $Ref->documents();
        foreach ($snapshot as $user) {
            printf('Document returned by query '. $user->id());
        }

        dd ($Ref);
        
    }
    
}
