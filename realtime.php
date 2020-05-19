<?php
require_once 'vendor/autoload.php';

use Kreait\Firebase\Factory;
//$varDb = 'e-exam-ad982-e77f4f6caa15.json';
//$Dburl ='https://e-exam-ad982.firebaseio.com/';
//$factory = (new Factory)->withServiceAccount('secret/'.$varDb);
//$database = $factory->createDatabase();


function SelectWithNode($tablename){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename)->getSnapshot()->getValue();
    return $result;
}
function SelectWithTwoNodes($tablename,$node1){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1)->getSnapshot()->getValue();
    return $result;
}





function SelectWithThree($tablename,$node1,$node2){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';

    $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename.'/'.$node1.'/'.$node2)->getSnapshot()->getValue();
    return $result;
}

function InsertInToDataBase($tableName,$country,$clinic){
    $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
    $database = $factory->createDatabase();

    $database->getReference($tableName.'/'.$country.'/'.$clinic)
        ->set([
            'arabicName' => 'My Application',
            'clinicDetails' =>[
                'ss' =>'..'
            ],
            'doctorDescription'=>'',
            'doctorName'=>'',
            'englishName'=>'',
            'image'=>'',
            'requestsTime'=>[
                't'=>'..',
            ],
            'workTimeFrom'=>'',
            'workTimeTo'=>'',
        ]);
}


//InsertInToDataBase('clinicCategory','alshakek','x');

///
///

//
//Add New User
//
function InsertNewUser($city,$email,$image,$name,$password,$phone){
    $notValidEmail=false;
    @$users = SelectWithNode('SystemUsers');
    if(count(@$users) > 0) {
        foreach ($users as $u) {
            if ($u['email'] == $email) {
                $notValidEmail = true;
            }
        }
    }
    if($notValidEmail == false) {
        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();
        $newPostKey = $database->getReference('Chats')->push()->getKey();

        $database->getReference('SystemUsers' . '/' . $newPostKey)
            ->set([
                'email' => $email,
                'image' => $image,
                'name' => $name,
                'password' => $password,
                'phone' => $phone,
                'isAdmin' => 'false',
                'city' => $city,
                'userId' => $newPostKey,
            ]);
    }else{
        echo "البريد الإلكتروني موجود بالفعل";
    }


}

function DelNot($userid,$postid){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
   // $database = $factory->createDatabase();
    $database = $factory->getDatabase();

    @$res = SelAnyTableWithOneNode('notifications',$userid);
    if(@count($res) > 0){
        foreach ($res as $r){
            if($r['postid'] == $postid){
                $database->getReference('notifications/'.$userid.'/'.$r['$saveCurrentDate'])->remove();
            }
        }
    }



}
function register($name,$email,$password,$phone)
{
    $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
    $database = $factory->createDatabase();


    $newPostKey = $database->getReference('Users')->push()->getKey();

    //$newPostKey = $userid->uid;

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId' =>$newPostKey,
        'image'=>'',
    ];

    $Register= [
        'Users/'.$newPostKey=>$userData,
    ];

    $addedDocRef= $database->getReference()->update($Register);





}
function modify($name,$email,$password,$phone,$documentid,$img1){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/secret/'.$varDb);
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://shopping-ae1ba.firebaseio.com/')
        ->create();
    $database = $firebase->getDatabase();


    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId'=>$documentid,
        'image'=>$img1,

    ];
    $Register= [
        'Users/'.$documentid=>$data,
    ];

    $addedDocRef= $database->getReference()->update($Register);

    return $addedDocRef;
    //$this->db->collection('Users')->document($documentid)->set($data);
}


function GetArrayFromArray($farray,$sarray){
        $cats = SelectWithNode($farray);
        for($i = 0;$i<count($cats) ;$i++){
            if(array_keys($cats)[$i] == $sarray){
                $x =$cats[array_keys($cats)[$i]];
                for($j=0;$j<count($x);$j++){
                    $res[] = array_keys($x)[$j];
                }
                return $res;
            }
        }


}

//My Project
//Student Register

//Student
function registerSt($name,$email,$password,$phone,$lvl)
{
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';

    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();

    $auth = $factory->createAuth();

    $newuser =$auth->createUserWithEmailAndPassword($email,$password) ;
    $userid = $auth->getUserByEmail($email);
    //$newPostKey = $database->getReference('Users')->push()->getKey();

    $newPostKey = $userid->uid;

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId' =>$newPostKey,
        'image'=>'',
        'level'=>$lvl
    ];

    $Register= [
        'Users/'.'student/'.$newPostKey=>$userData,
    ];

    $addedDocRef= $database->getReference()->update($Register);
}
function modifySt($name,$email,$password,$phone,$documentid,$img1,$level){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $Dburl ='https://e-exam-ad982.firebaseio.com/';

    $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
    $database = $factory->createDatabase();


    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId'=>$documentid,
        'image'=>$img1,
        'level'=>$level

    ];
    $Register= [
        'Users/student/'.$documentid=>$data,
    ];

    $addedDocRef= $database->getReference()->update($Register);

    return $addedDocRef;
    //$this->db->collection('Users')->document($documentid)->set($data);
}

//Doctor
function registerDoc($name,$email,$password,$phone)
{
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';

    $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
    $database = $factory->createDatabase();

    $auth = $factory->createAuth();

    $newuser =$auth->createUserWithEmailAndPassword($email,$password) ;
    $userid = $auth->getUserByEmail($email);
    //$newPostKey = $database->getReference('Users')->push()->getKey();

    $newPostKey = $userid->uid;

    $userData = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone' => $phone,
        'userId' =>$newPostKey,
        'image'=>'',
        'isAdmin'=>0,
        
    ];

    $Register= [
        'Users/'.'doctor/'.$newPostKey=>$userData,
    ];

    $addedDocRef= $database->getReference()->update($Register);


}
function DoctorLogin($tablename,$node1){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1)->getSnapshot()->getValue();
    return $result;
}
function selectDoctorSubjects($tablename,$level,$doctorid){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
        $database = $factory->createDatabase();
        $result = $database->getReference($tablename .'/'. $level.'/'.$doctorid)->getSnapshot()->getValue();
        return $result;

}
function modifyDoc($name,$email,$password,$phone,$documentid,$img1,$admin){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';

        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();


            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'userId'=>$documentid,
                'image'=>$img1,
                'isAdmin'=>$admin

            ];
            $Register= [
                'Users/doctor/'.$documentid=>$data,
            ];

            $addedDocRef= $database->getReference()->update($Register);

            return $addedDocRef;
    //$this->db->collection('Users')->document($documentid)->set($data);
}

//Add Level
function InsertLvl($table,$name,$namearab){

          $varDb = 'e-exam-ad982-e77f4f6caa15.json';

        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();


       // $newPostKey = $database->getReference('categories')->push()->getKey();

        $database->getReference($table.'/'.$name )
            ->set([
                'name' => $name,
                'name_arabic' => $namearab,
            ]);


}
//Select Levels
function SelectLevels($tablename){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename)->getSnapshot()->getValue();
    return $result;
}


//Add Subject 

function InsertSubject($table,$level,$doctor,$name,$namearab){

          $varDb = 'e-exam-ad982-e77f4f6caa15.json';

        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();


       // $newPostKey = $database->getReference('categories')->push()->getKey();

         

            $data = [
                'name' => $name,
                'name_arabic' => $namearab,
               

            ];
            $Register= [
                $table.'/'.$level.'/'.$doctor.'/'.$name =>$data,
                'LevelSubjects/'.$level.'/'.$name=>$data
            ];

            $addedDocRef= $database->getReference()->update($Register);



}



function QuestionType($table,$difficulty,$name,$namearab,$score,$time){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();
        $database->getReference($table.'/'.$difficulty.'/'.$name )
            ->set([
                'name' => $name,
                'name_arabic'=>$namearab,
                'score' => $score,
                'time'=>$time,
            ]);
}

//Add Question
function SubjectsQustionsMcq($table,$level,$subname,$difficulty,$type,$questionContent,$validanswer,$wronganswer1,$wronganswer2,$wronganswer3){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
        $database = $factory->createDatabase();
        $newPostKey = $database->getReference('Questions')->push()->getKey();
        $database->getReference($table.'/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey )
            ->set([
                'questionContent' => $questionContent,
                'validAnswer'=>$validanswer,
                'wrongAnswer1' => $wronganswer1,
                'wrongAnswer2'=>$wronganswer2,
                'wrongAnswer3'=>$wronganswer3,
                'questionId'=>$newPostKey,
                 'type'=>$type,
                'difficulty'=>$difficulty,
            ]);
}
function ModifyQustionsMcq($table,$level,$subname,$difficulty,$type,$questionContent,$validanswer,$wronganswer1,$wronganswer2,$wronganswer3,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $newPostKey = $id;
    $database->getReference($table.'/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey )
        ->set([
            'questionContent' => $questionContent,
            'validAnswer'=>$validanswer,
            'wrongAnswer1' => $wronganswer1,
            'wrongAnswer2'=>$wronganswer2,
            'wrongAnswer3'=>$wronganswer3,
            'questionId'=>$newPostKey,
            'type'=>$type,
            'difficulty'=>$difficulty,
        ]);
}
function AddMcqQuestionToExam($level,$subname,$difficulty,$type,$questionContent,$validanswer,$wronganswer1,$wronganswer2,$wronganswer3,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $newPostKey = $id;


    $questionData = [
        'questionContent' => $questionContent,
        'validAnswer'=>$validanswer,
        'questionId'=>$newPostKey,
        'type'=>$type,
        'difficulty'=>$difficulty,
        'wrongAnswer1' => $wronganswer1,
        'wrongAnswer2'=>$wronganswer2,
        'wrongAnswer3'=>$wronganswer3,
        'exam'=>1
    ];

    $Register= [
        'Questions/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey=>$questionData,
        'Exam/'.$level.'/'.$subname.'/'.$newPostKey =>$questionData
    ];

    $addedDocRef= $database->getReference()->update($Register);

}


function SubjectsQustionsTf($table,$level,$subname,$difficulty,$type,$questionContent,$validanswer){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
        $database = $factory->createDatabase();
        $newPostKey = $database->getReference('Questions')->push()->getKey();
        $database->getReference($table.'/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey )
            ->set([
                'questionContent' => $questionContent,
                'validAnswer'=>$validanswer,
                'type'=>$type,
                'difficulty'=>$difficulty,
                'questionId'=>$newPostKey
            ]);
}
function ModifyQuestionsTf($table,$level,$subname,$difficulty,$type,$questionContent,$validanswer,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $newPostKey = $id;
    $database->getReference($table.'/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey )
        ->set([
            'questionContent' => $questionContent,
            'validAnswer'=>$validanswer,
            'type'=>$type,
            'difficulty'=>$difficulty,
            'questionId'=>$newPostKey
        ]);
}
function AddTfQuestionToExam($level,$subname,$difficulty,$type,$questionContent,$validanswer,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $newPostKey = $id;


    $questionData = [
        'questionContent' => $questionContent,
        'validAnswer'=>$validanswer,
        'questionId'=>$newPostKey,
        'type'=>$type,
        'difficulty'=>$difficulty,
        'exam'=>1
    ];

    $Register= [
        'Questions/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$newPostKey=>$questionData,
        'Exam/'.$level.'/'.$subname.'/'.$newPostKey =>$questionData
    ];

    $addedDocRef= $database->getReference()->update($Register);

}

//Delete Question
function deleteQuestion($table,$level,$subname,$difficulty,$type,$questionId){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $database->getReference($table.'/'.$level.'/'.$subname.'/'.$difficulty.'/'.$type.'/'.$questionId)->remove();


}

function AddMcqToExam($table,$level,$subname,$questionId,$difficulty,$type,$questionContent,$validanswer,$wronganswer1,$wronganswer2,$wronganswer3){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();
        //$newPostKey = $database->getReference('Questions')->push()->getKey();
        $database->getReference($table.'/'.$level.'/'.$subname.'/'.$questionId)
            ->set([
                'questionContent' => $questionContent,
                'validAnswer'=>$validanswer,
                'wrongAnswer1' => $wronganswer1,
                'wrongAnswer2'=>$wronganswer2,
                'wrongAnswer3'=>$wronganswer3,
                'questionId'=>$questionId,
                 'type'=>$type,
                'difficulty'=>$difficulty,
            ]);
}
function AddTfToExam($table,$level,$subname,$questionId,$difficulty,$type,$questionContent,$validanswer,$wronganswer1){
        $varDb = 'e-exam-ad982-e77f4f6caa15.json';
        $factory = (new Factory)->withServiceAccount('secret/'.$varDb);
        $database = $factory->createDatabase();
        //$newPostKey = $database->getReference('Questions')->push()->getKey();
        $database->getReference($table.'/'.$level.'/'.$subname.'/'.$questionId)
            ->set([
                'questionContent' => $questionContent,
                'validAnswer'=>$validanswer,
                'wrongAnswer1' => $wronganswer1,
                'questionId'=>$questionId,
                 'type'=>$type,
                'difficulty'=>$difficulty,
            ]);
}

//Get Difficulty Questions For Specific Question
function GetDifficlty($level,$subject,$diifculty){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference( 'Questions/'. $level.'/'.$subject.'/'.$diifculty)->getSnapshot()->getValue();
    if($result > 0){
        return $result;
    }
}
function GetQuestions($level,$subject,$diifculty,$type){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference( 'Questions/'. $level.'/'.$subject.'/'.$diifculty.'/'.$type)->getSnapshot()->getValue();
    if($result > 0){
        return $result;
    }
}
function GetQuestionForExam($level,$subject,$diifculty,$type){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference( 'Questions/'. $level.'/'.$subject.'/'.$diifculty.'/'.$type)->getSnapshot()->getValue();
    if($result > 0){
        return $result;
    }
}

function GetRealExam($level,$subject){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference( 'Exam/'. $level.'/'.$subject)->getSnapshot()->getValue();
    if($result > 0){
        return $result;
    }
}

function GetSpecificQuestion($level,$subject,$diifculty,$type,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference( 'Questions/'. $level.'/'.$subject.'/'.$diifculty.'/'.$type.'/'.$id)->getSnapshot()->getValue();
    return $result;
}


// Submit Exam
function SubmitExam($table,$total,$score,$correctAnswer,$wrongAnswer,$level,$subject,$userId,$questionNumbre,$missedPoints){

    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();

    $data = [
        'totalScore'=>$total,
        'score' => $score,
        'correctAnswers' => $correctAnswer,
        'wrongAnswers'=>$wrongAnswer,
        'questionsNumber'=>$questionNumbre,
        'missedPoints'=>$missedPoints

    ];
    $examData = [
        'name' => $subject
    ];
    $Register= [
        $table.'/'.$level.'/'.$subject.'/'.$userId =>$data,
        'StudentsExams/'.$userId.'/'.$level.'/'.$subject=>$examData
    ];

    $addedDocRef= $database->getReference()->update($Register);



}
//
function GetRegisteredSubjects($table,$userId,$level){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($table.'/'.$userId.'/'.$level)->getSnapshot()->getValue();
    if($result > 0){
        return $result;
    }
}













//Test
//1 Register Student
//registerSt('mohamed','mohamed@yahoo.com','123123','123123','lvl2');
//Modify Student
//modifySt('mohamededited','mohamed@yahoo.com','123123','123123','AbJTTjOSY4O5PfHbR6qgA8OxDqu2','img1111','lvl2');


//2 Register Doctor
//registerDoc('mohamedDoc','mohamed1@yahoo.com','123123','123123');
//2.1 modifyDoc('mohamededited','mohamed@yahoo.com','123123','123123','AbJTTjOSY4O5PfHbR6qgA8OxDqu2','img1111','lvl2');
//2.2 Select Doctor Subjects

//3 Add Level
//InsertLvl('Levels','Level Four','المستوى الرابع');
//3.1 Select ALL Levels
//SelectLevels('Levels');

//4 Add Subject
//InsertSubject('Subjects','Level One','AbJTTjOSY4O5PfHbR6qgA8OxDqu2','English','لغة أنجليزية');

//Add New Question Type
//QuestionType('QuestionTypes','B','trueFalse','صح ام خطأ',3,3);

//Add Questions to subjects
//Mcq
//SubjectsQustionsMcq('Questions','Level One','Arabic','A','mcq','how are you ?','mohamed','yara','mahmoud','ali');
//TrueFalse
//SubjectsQustionsTf('Questions','Level One','Arabic','A','trueFalse','how are you ?','t','f');


//Add  Questions To Exam
//MCQ
//AddMcqToExam('Exam','Level One','Arabic','M6u5M6VNqJvPeVxV15B','A','mcq','how are you ? ','mohamed','yara','ali','moka');
//
//AddTfToExam('Exam','Level One','Arabic','M6u5MUuT4x4iCAqSWVU','A','tF','how are you ? ','mohamed','yara');








































/////////////////
///Get Things with other things
///
function GetUserNameWithId($tablename,$node1,$id){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $node1.'/'.$id)->getSnapshot()->getValue();
    return $result['name'];
}
function GetQuestionScore($tablename,$diff,$type){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $diff.'/'.$type)->getSnapshot()->getValue();
    return $result['score'];
}
function GetQuestionTime($tablename,$diff,$type){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($tablename .'/'. $diff.'/'.$type)->getSnapshot()->getValue();
    return $result['time'];
}
function GetStudentExams($table,$studentId,$level,$subject){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($table .'/'. $studentId.'/'.$level.'/'.$subject)->getSnapshot()->getValue();
    return $result['name'];
}

function GetStudentDegrees($table,$level,$subject,$studentId){
    $varDb = 'e-exam-ad982-e77f4f6caa15.json';
    $factory = (new Factory)->withServiceAccount('../../secret/'.$varDb);
    $database = $factory->createDatabase();
    $result = $database->getReference($table .'/'.$level.'/'.$subject.'/'.$studentId)->getSnapshot()->getValue();
    return $result;
}