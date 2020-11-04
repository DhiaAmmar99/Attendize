<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;


class FirebaseController extends Controller
{
    
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri("https://ica-2020.firebaseio.com/")
        ->create();

        $database = $firebase->getDatabase('subjects');

        $ref = $database->getReference('ICA-2020');
        $sub = $ref->getValue();
        foreach($sub as $s){
            $all_subject[] = $s;
        }
        return json_encode($all_subject) ;
       
       
        
    }
    public function fire()
    {
        // $db = new FirestoreClient();
        $db = new FirestoreClient([
            'projectId' => 'ICA 2020',
        ]);

        $Ref = $db->collection('Chats');
        // $query = $citiesRef->where('state', '=', 'CA');
        // $snapshot = $Ref->documents();
        // foreach ($snapshot as $document) {
        //     printf('Document returned by query '. $document);
        // }

        return json_encode($db);
        
    }
    
}
