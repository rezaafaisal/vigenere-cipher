<?php 

    $plain = "";
    $key = "";
    $chipper ="";
    $keyBaru="";

    if(isset($_POST['submit'])){
        $data = $_POST;
        $plain = explode(' ', strtoupper($data['plain']));
        $plain = implode($plain);
        $key = strtoupper($data['key']);
        $chipper = enkripsi($plain,$key);
        $keyBaru = implode(keyPlain($key, $plain));
    }
    

    if(isset($_POST['dekripsi'])){
        $data = $_POST;
        $plain = strtoupper($data['plain']);
        $key = strtoupper($data['key']);
        $keyBaru = implode(keyPlain($key, $plain));
        $temp = dekripsi($plain,$key);
        $chipper = strtoupper($data['plain']);
        $plain = $temp;


    }

    // fungsi untuk mengatur panjang key sesuai panjang plaintext
    function keyPlain($key, $plain){

        $plainLen = strlen($plain);
        $keyLen = strlen($key);
        $key = str_split($key);
        
        $newKey = [];
        $plain = str_split($plain);
        if($keyLen < $plainLen){
            $set = $plainLen - $keyLen;
            $j=0;
            for ($i=0; $i < $set; $i++) {
                
                if($j==$keyLen){
                    $j=0;
                }
                $newKey[$i] = $key[$j];

                $j++;
            }

        }

        else if($keyLen > $plainLen){
    
            for ($i=$plainLen; $i < $keyLen ; $i++) { 
                unset($key[$i]);
            }
            
        }

        $newKey = array_merge($key,$newKey);

        return $newKey;
    }

    // fungsi untuk melakukan enkripsi
    function enkripsi($plain, $key){
        $plainLen = strlen($plain);
        $key = keyPlain($key, $plain);
        $plain = str_split($plain);
        
        $hasilDec = [];
        $hasilAlp = [];
        $temp="";
        for ($i=0; $i < $plainLen; $i++) { 
            $temp = (alphaToDec($plain[$i]) + alphaToDec($key[$i]));
            if($temp <= 26){
                $hasilDec[$i] = $temp%26;
            }

            else{
                $hasilDec[$i] = $temp-26;
            }

            $hasilAlp[$i] = decToAlpha($hasilDec[$i]);
        }

        return implode($hasilAlp);
        
    }

    // fungsi untuk melakukan dekripsi
    function dekripsi($plain, $key){
        $plainLen = strlen($plain);
        $key = keyPlain($key, $plain);
        $plain = str_split($plain);
        
        $hasilDec = [];
        $hasilAlp = [];
        $temp="";
        for ($i=0; $i < $plainLen; $i++) { 
            
            $temp = (alphaToDec($plain[$i]) - alphaToDec($key[$i]));
            if($temp >= 0){
                $hasilDec[$i] = $temp%26;
            }

            else{
                $hasilDec[$i] = $temp+26;
            }

            $hasilAlp[$i] = decToAlpha($hasilDec[$i]);
        }

        return implode($hasilAlp);
        
    }

    function alphaToDec($alpha){
        $alphabets = range('A', 'Z');
        return array_search($alpha,$alphabets);
    }

    function decToAlpha($dec){
        $alphabets = range('A', 'Z');
        return $alphabets[$dec];
    }

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere Chipper</title>
    <link rel="stylesheet" href="src/css/mdb.mi.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center">Laporan 1 Kemanan Digital - Reza Faisal</h3>
        <div class="row mt-5">
            <div class="col-12 col-lg-4">
                <div class="p-4 shadow-1-strong rounded-3 mb-4">
                    <form action="" method="POST">
                        <input type="text" name="plain" id="" class="form-control form-control-lg mb-3" placeholder="Plaintext/Chipper" autocomplete="off" value="">
                        <input type="text" name="key" id="" class="form-control form-control-lg mb-3" placeholder="Key" autocomplete="off">
                        <button name="submit" class="btn btn-success btn-lg">Enkripsi</button>
                        <button name="dekripsi" class="btn btn-warning btn-lg">Dekripsi</button>
                    </form>
                </div>
                <!-- <div class="p-4 shadow-1-strong rounded-3">
                    <form action="" method="GET">
                        <input type="text" name="plain" id="" class="form-control form-control-lg mb-3"
                            placeholder="Plaintext">
                        <input type="text" name="key" id="" class="form-control form-control-lg mb-3" placeholder="Key">
                        <button name="submit" class="btn btn-primary btn-lg">Dekripsi</button>
                    </form>
                </div>   -->

            </div>
            <div class="col-8">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-success">
                            <th class="fw-bold">PLAINTEXT</th>
                            <th class="fw-bold">KEY</th>
                            <th class="fw-bold">CHIPPER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $plain ?></td>
                            <td><?= $keyBaru ?> 
                                <?php 
                                    if(isset($_POST['submit']) || isset($_POST['dekripsi'])){
                                        echo "(".$key.")";
                                    } 
                                ?></td>
                            <td><?= $chipper ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
<script src="src/js/mb.min.js"></script>

</html>