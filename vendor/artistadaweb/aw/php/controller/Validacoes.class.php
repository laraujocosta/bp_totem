<?php
class Validacoes{
    public static function validaSearch($var){
        
        if(isset($var) && is_array($var) && count($var)>0){

            foreach($var as $nomes => $val){
                if(strlen($val[1])>0){
                    if(preg_match("/^([a-zA-Z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\-\.\,]+\s?)*\s*$/",$val[1])){
                        continue;
                    }else{
                        return array(false,"O valor do campo ".$nomes."=<br/>".$val[1]." <br/>está inválido.");
                    }
                }else if(strlen($val[1])==0){
                    //SE ESTIVER VAZIO, RETORNA ERRO SE FOR CAMPO OBRIGATORIO
                    if($val[0]==1){
                        return array(false,"Preencha todos os campos obrigatórios: ".$nomes);
                    }else{}
                }else{
                    return array(false,"O valor do campo ".$nomes." está muito curto.");
                }
            }

            //SE NAO DER ERROS
            return array(true,"");
        }else{
            return array(false,"Nenhum campo para validação");
        }
    }
    public static function vencParcela($periodo,$data){
        return date("Y-m-d", strtotime($periodo.$data));
    }
    public static function validaNomes($var){

        if(isset($var) && is_array($var) && count($var)>0){
                
            foreach($var as $nomes => $val){
                if(strlen($val[1])>2){
                    //if(preg_match("/^([a-zA-Z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ\-\.\,]+\s?)*\s*$/",$val[1])){
                        continue;
                   // }else{
                       // return array(false,"O valor do campo ".$nomes." está inválido.");
                   // }
                }else if(strlen($val[1])==0){
                    //SE ESTIVER VAZIO, RETORNA ERRO SE FOR CAMPO OBRIGATORIO


                    if($val[0]==1){
                        return array(false,"Preencha todos os campos obrigatórios: ");
                    }
                }else{
                    return array(false,"O valor do campo ".$nomes." está muito curto.");
                }
            }

            //SE NAO DER ERROS
            return array(true,"");
        }else{
            return array(false,"Nenhum campo para validação");
        }
    }
    public static function valNomes($val){
        if(strlen($val)>4 && strlen($val)<255){
            if(preg_match("/^([a-zA-Z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ \-\.\,]+\s?)*\s*$/",$val)){
                return array(true,"O valor do campo nome está inválido.");
            }else{
                return array(false,"O valor do campo nome está inválido.");
            }
        }else{
            return array(false,"O valor do campo nome está muito curto.");
        }
    }
    public static function validaNomeCespecial($var,$f,$error){
        
        if($f){
            if(preg_match("/^[\w\W]{1,255}$/",$var)){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[\w\W]{1,255}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaSenhaNovo($var,$f,$error){
        
        if($f){
            if(preg_match("/^[\w\W]{6,255}$/",$var)){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[\w\W]{6,255}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaUsuario($var,$f,$error){
        
        if($f){
            if(preg_match("/^[a-zA-Z0-9_.]{4,255}$/",$var)){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[a-zA-Z0-9_.]{4,255}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaTextoCespecial($var,$f,$error){
        
        if($f){
            if(preg_match("/^[\w\W]{4,}$/",$var)){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[\w\W]{4,}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaArrayNums($var,$f,$error){
        //exemplo [1,2,3,4,5,6,7]
        if($f){
            if(isset($var) && is_array($var) && count($var)>0){

                foreach($var as $v){
                    if(!(preg_match("/^[0-9]{1,10}$/",$v) && $v>0)){
                        return array(false,$error);
                   }
                }
                return array(true,'ok');

            }else{
                return array(false,$error);
            }

        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && is_array($var) && count($var)>0){

                foreach($var as $v){
                    if(!(preg_match("/^[0-9]{1,10}$/",$v) && $v>0)){
                        return array(false,$error);
                   }
                }
                
                return array(true,'ok');
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaArrayNums2D($var,$f,$error){
        //Exemplo [1,6],[3,3],[1,9]
        if($f){
            if(isset($var) && is_array($var) && count($var)>0){

                foreach($var as $v){
                    if(!(preg_match("/^[0-9]{1,10}$/",$v[0]) && $v[0]>0)){
                        return array(false,$error);
                   }
                    if(!(preg_match("/^[0-9]{1,10}$/",$v[1]) && $v[1]>0)){
                        return array(false,$error);
                   }
                }
                return array(true,'ok');

            }else{
                return array(false,$error);
            }

        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && is_array($var) && count($var)>0){

                foreach($var as $v){
                    if(!(preg_match("/^[0-9]{1,10}$/",$v[0]) && $v[0]>0)){
                        return array(false,$error);
                   }
                    if(!(preg_match("/^[0-9]{1,10}$/",$v[1]) && $v[1]>0)){
                        return array(false,$error);
                   }
                }

                return array(true,'ok');
            }else{
                return array(true,'');
            }
        }

    }
   
    public static function validaTelParaNumero($var){
        
        if(isset($var) && is_array($var) && count($var)>0){

            foreach($var as $nomes => $val){
                if(strlen($val[1])>9){
                    if(preg_match("/^[0-9]{10,11}$/",$val[1])){
                        continue;
                    }else{
                        return array(false,"O valor do campo ".$nomes." está inválido.");
                    }
                }else if(strlen($val[1])==0){
                    //SE ESTIVER VAZIO, RETORNA ERRO SE FOR CAMPO OBRIGATORIO
                    if($val[0]==1){
                        return array(false,"Preencha todos os campos obrigatórios: ".$nomes);
                    }else{}
                }else{
                    return array(false,"O valor do campo ".$nomes." está muito curto.");
                }
            }

            //SE NAO DER ERROS
            return array(true,"");
        }else{
            return array(false,"Nenhum campo para validação");
        }
    }

    public static function validaNomeArray($var){
        
        if(isset($var) && is_array($var) && count($var)>0){

            foreach($var as $nomes => $val){
                if(strlen($val[1])>3){
                    if(preg_match("/^([a-zA-Z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ \-\.\,]+\s?)*\s*$/",$val[1])){
                        continue;
                    }else{
                        return array(false,"O valor do campo ".$nomes." está inválido.");
                    }
                }else if(strlen($val[1])==0){
                    //SE ESTIVER VAZIO, RETORNA ERRO SE FOR CAMPO OBRIGATORIO
                    if($val[0]==1){
                        return array(false,"Preencha todos os campos obrigatórios: ".$nomes);
                    }else{}
                }else{
                    return array(false,"O valor do campo ".$nomes." está muito curto.");
                }
            }

            //SE NAO DER ERROS
            return array(true,"");
        }else{
            return array(false,"Nenhum campo para validação");
        }
    }
    public static function validaTelefoneArray($var){
        
        if(isset($var) && is_array($var) && count($var)>0){

            foreach($var as $nomes => $val){
                if(strlen($val[1])>3){
                    if(preg_match("/^[0-9]{10,11}$/",$val[1])){
                        continue;
                    }else{
                        return array(false,"O valor do campo ".$nomes." está inválido.");
                    }
                }else if(strlen($val[1])==0){
                    //SE ESTIVER VAZIO, RETORNA ERRO SE FOR CAMPO OBRIGATORIO
                    if($val[0]==1){
                        return array(false,"Preencha todos os campos obrigatórios: ".$nomes);
                    }else{}
                }else{
                    return array(false,"O valor do campo ".$nomes." está muito curto.");
                }
            }

            //SE NAO DER ERROS
            return array(true,"");
        }else{
            return array(false,"Nenhum campo para validação");
        }
    }

    public static function validaEmail($var,$f,$error){
        
            if($f){
                if(preg_match('/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD',$var)){
                    return array(true,'ok');
               }else{
                   return array(false,$error);
               }
            }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
                if(isset($var) && strlen($var)>0){
                    if(preg_match('/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD',$var)){
                        return array(true,'');
                   }else{
                       return array(false,$error);
                   }
                }else{
                    return array(true,'');
                }
            }
    }
    public static function validaUf($var){
        
       if(preg_match("/^[A-Za-z]{2}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'o campo UF está no formato incorreto (ex: SP).');
       }
    }
    public static function validaSenha($var){
        
       if(preg_match("/^[0-9A-Za-z*_.]{4,30}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'A senha está incorreta='.$var);
       }
    }
    public static function validaSite($var){
        
       if(!preg_match("/[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+/",$var) && strlen($var)>0){
           return array(false,'o campo Site está no formato incorreto (ex: www.eximia.com.br ou eximia.com.br).');
       }else{
            return array(true,'');
       }
    }
    public static function validaCep($var){
        
       if(preg_match("/^[0-9]{8}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'o campo CEP está no formato incorreto (ex: 00000-000).');
       }
    }
    public static function validaCnpj($var){
        
       if(preg_match("/^[0-9]{14}$/",$var)){
           if(Validacoes::isValidCNPJ($var)){
                return array(true,'');
           }else{
            return array(false,'O CNPJ está incorreto..');
           }
            
       }else if(preg_match("/^[0-9]{11}$/",$var)){
        if(Validacoes::validaCPF($var)){
             return array(true,'');
        }else{
         return array(false,'O CPF está incorreto..');
        }
         
    }else{
           return array(false,'o campo CPF está no formato incorreto (ex: 000.000.000-00).');
       }
    }
    public static function validaPeriodo($data1,$data2){
        
   
            if($data2[1] >= $data1[1]){
                 return array(true,'');
            }else{
             return array(false,$data1[0]." não pode ser maior que ".$data2[0]);
            }
             
        
     }
     private static function validaCPF($cpf = null) {

        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         // Calcula os digitos verificadores para verificar se o
         // CPF é válido
         } else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
    
            return true;
        }
    }
    private static function isValidCNPJ($cnpj = null) {

        // Verifica se um número foi informado
        if(empty($cnpj)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpj) != 14) {
            return false;
        }
        
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' || 
            $cnpj == '11111111111111' || 
            $cnpj == '22222222222222' || 
            $cnpj == '33333333333333' || 
            $cnpj == '44444444444444' || 
            $cnpj == '55555555555555' || 
            $cnpj == '66666666666666' || 
            $cnpj == '77777777777777' || 
            $cnpj == '88888888888888' || 
            $cnpj == '99999999999999') {
            return false;
            
         // Calcula os digitos verificadores para verificar se o
         // CPF é válido
         } else {   
         
            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";
    
            for ($i = 0; $i < 13; $i++) {
    
                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;
    
                $soma2 += ($cnpj{$i} * $k);
    
                if ($i < 12) {
                    $soma1 += ($cnpj{$i} * $j);
                }
    
                $k--;
                $j--;
    
            }
    
            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
    
            return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
         
        }
    }
    
    public static function validaFlag($var,$f,$error){
        
        if($f){
            if(preg_match("/^[0-9]{1,4}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{1,4}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaTipo($var,$f,$error){
        
        if($f){
            if(preg_match("/^[1-2]{1}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[1-2]{1}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaNumeros($var,$f,$error){
        
        if($f){
            if(preg_match("/^[0-9]{1,255}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{1,255}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function DAESPvalidaVolumes($var,$f,$error){
        
        if($f){
            if(preg_match("/^[0-9]{1,2}$/",$var) && $var > 0 && $var <= 50){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{1,2}$/",$var) && $var > 0 && $var <= 50){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaNumMaiorZero($var,$f,$error){
        
        if($f){
            if(preg_match("/^[0-9]{1,10}$/",$var) && $var > 0){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{1,10}$/",$var) && $var > 0){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaNumComZero($var,$f,$error){
        
        if($f){
            if(preg_match("/^[0-9]{1,14}$/",$var)){
                return array(true,'ok');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{1,14}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }

    }
    public static function validaArrayNum($var){
        

        foreach($var as $v => $f){
            if(!preg_match("/^[0-9]{1,4}$/",$f)){
                return array(false,'Valor incorreto');
               die;
           }
        }

        return array(true,'');

    }
    public static function validaDv($var){
        
       if(preg_match("/^[0-9]{1}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'DV Inválido');
       }
    }
    public static function validaBanco($var){
        
       if(preg_match("/^[0-9]{3,4}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'Banco Inválido');
       }
    }
    public static function validaDadosBancarios($var){
        
        if(!is_null($var)){
            if(preg_match("/^[0-9]{1,4}$/",$var)){
                return array(true,'');
           }else{
               return array(false,'Dados Bancários Incorretos');
           }
        }else{return array(true,'');}

    }
    public static function validaAgencia($var){
        
       if(preg_match("/^[0-9]{4}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'Agência Inválida');
       }
    }
    public static function validaNf($var){
        
       if(preg_match("/^[0-9a-zA-Z]{3,15}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'NF Inválida');
       }
    }
    public static function validaConta($var){
        
       if(preg_match("/^[0-9]{4,8}$/",$var)){
            return array(true,'');
       }else{
           return array(false,'Conta Inválida');
       }
    }
    public static function validaContrato($var){
        
       if(isset($var) && strlen($var)>1){
            return array(true,'');
       }else{
           return array(false,'O contrato é inválido');
       }
    }
    public static function validaDataBr($var,$f,$error){
        if($f){
            if(preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }
    }
    public static function validaDataUs($var,$f,$error){
        if($f){
            if(preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }
    }
    public static function validaHoraMinuto($var,$f,$error){
        if($f){
            if(preg_match("/^[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/",$var)){
                return array(true,'');
           }else{
               return array(false,$error);
           }
        }else{//SE NAO FOR OBRIGATORIO MAS ESTIVER PREENCHIDO TAMBEM VALIDA
            if(isset($var) && strlen($var)>0){
                if(preg_match("/^[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/",$var)){
                    return array(true,'');
               }else{
                   return array(false,$error);
               }
            }else{
                return array(true,'');
            }
        }
    }
    public static function validaMoneyBr($var){
        
        if (strlen($var) > 6) 
        {
            return array(true,'');
       }else{
           return array(false,'O valor está incorreto');
       }
    }
    public static function moneyToUs($var){
        
        if (strlen($var) > 6) 
        {
            $money=str_replace("R$ ","",str_replace(",",".",str_replace(".","",$var)));
            return array(true,$money);
       }else{
           return array(false,'O valor está incorreto');
       }
    }

}

?>