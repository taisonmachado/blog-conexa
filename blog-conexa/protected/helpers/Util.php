<?php

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Util {

    public static function dataHora($data) {
        if (!empty($data) && $data != '0000-00-00') {
            return date('d/m/Y H:i', strtotime($data));
        }
    }

    public static function hora($data) {
        if (!empty($data) && $data != '00:00:00') {
            return date('H:i', strtotime($data));
        }
    }

    public static function getFirstName($nome) {
        if (!empty($nome)) {
            return explode(" ", $nome)[0];
        }
    }

    public static function removeHash($nome) {
        if (!empty($nome)) {
            return str_ireplace("#", "", $nome);
        }
    }

    public static function dataTime($data) {
        if (!empty($data) && $data != '0000-00-00 00:00:00') {
            return date('d/m/Y', strtotime($data));
        }
    }

    public static function data($data) {
        if (!empty($data) && $data != '0000-00-00') {
            return date('d/m/Y', strtotime($data));
        }
    }

    public static function mascara($mascara, $string) {
        $string = str_replace(" ", "", $string);
        if (substr_count($mascara, '#') == strlen($string)) {
            for ($i = 0; $i < strlen($string); $i++) {
                $mascara[strpos($mascara, "#")] = $string[$i];
            }
            return $mascara;
        } else {
            return $string;
        }
    }

    public static function formataUrl($url) {
        $url = str_replace([' ', '/', 'º', 'ª'], ['-', '-', '', ''], $url);
        $url = Util::retiraAcentos($url);
        $url = strtolower($url);
        $url = preg_replace('/[^a-z\d\+\-]/', '', $url);
        $url = preg_replace('/\+(\++)/', '-', $url);
        $url = preg_replace('/-(-+)/', '-', $url);
        return $url;
    }

    public static function formataTexto($texto) {
        $texto = str_replace('white-space: pre', "", $texto);
        return $texto;
    }

    public static function limitaTexto($texto, $limite) {
        if (strlen($texto) > $limite) {
            $texto = strip_tags($texto);
            $resumo = substr($texto, '0', $limite);
            $last = strrpos($resumo, " ");
            $resumo = substr($resumo, 0, $last);
            return $resumo . "...";
        } else {
            return $texto;
        }
    }

    public static function truncate($text, $length, $suffix = '...', $isHTML = true) {
        $i = 0;
        $simpleTags=array('br'=>true,'hr'=>true,'input'=>true,'image'=>true,'link'=>true,'meta'=>true);
        $tags = array();
        if($isHTML){
            preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            foreach($m as $o){
                if($o[0][1] - $i >= $length)
                break;
                $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                // test if the tag is unpaired, then we mustn't save them
                if($t[0] != '/' && (!isset($simpleTags[$t])))
                $tags[] = $t;
                elseif(end($tags) == substr($t, 1))
                array_pop($tags);
                $i += $o[1][1] - $o[0][1];
            }
        }
        
        // output without closing tags
        $output = substr($text, 0, $length = min(strlen($text),  $length + $i));
        // closing tags
        $output2 = (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '');
        
        // Find last space or HTML tag (solving problem with last space in HTML tag eg. <span class="new">)
        $aux = preg_split('/<.*>| /', $output, -1, PREG_SPLIT_OFFSET_CAPTURE);
        $aux = end($aux);
        $pos = (int) end($aux);
        // Append closing tags to output
        $output.=$output2;
    
        // Get everything until last space
        $one = substr($output, 0, $pos);
        // Get the rest
        $two = substr($output, $pos, (strlen($output) - $pos));
        // Extract all tags from the last bit
        preg_match_all('/<(.*?)>/s', $two, $tags);
        // Add suffix if needed
        if (strlen($text) > $length) { $one .= $suffix; }
        // Re-attach tags
        $output = $one . implode($tags[0]);
    
        //added to remove  unnecessary closure
        $output = str_replace('</!-->','',$output); 
    
        return $output;
    }

    public static function retiraUrl($texto) {
        $texto = strtoupper($texto);
        $texto = str_replace("WWW.", " ", $texto);
        $texto = str_replace(".COM.BR", " ", $texto);
        $texto = str_replace("HTTP://", " ", $texto);
        $texto = str_replace(".COM", " ", $texto);
        return $texto;
    }


    public static function caixaAlta($texto) {
        $texto = strtoupper($texto);
        return $texto;
    }

    public static function moedaForm($valor, $sifrao = '') {
        if (!empty($valor) && $valor != '0.00') {
            $var = number_format($valor, '2', ',', '.');
            if (!empty($sifrao)) {
                $var = $sifrao . " " . $var;
            }
            return $var;
        }
    }

    public static function moedaDb($valor) {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    public static function getString($menos = '') {
        $arr_menos = array();
        if (!empty($menos)) {
            $menos = str_replace(' ', '', $menos);
            $arr = explode(",", $menos);
            foreach ($arr as $item) {
                array_push($arr_menos, trim($item));
            }
        }
        reset($_GET);
        while (list($chaveGet, $valorGet) = each($_GET)) {
            if (!in_array($chaveGet, $arr_menos)) {
                if (empty($getString))
                    $getString = "?" . $chaveGet . "=" . $valorGet;
                else
                    $getString .= "&" . $chaveGet . "=" . $valorGet;
            }
        }
        return $getString;
    }

    public static function idYoutube($url) {
        if (!empty($url)) {
            $arr_url = explode("v=", $url);
            if (!empty($arr_url[1])) {
                $arr2_url = explode("&", $arr_url[1]);
                return $arr2_url[0];
            } else {
                return $arr_url[0];
            }
        }
    }

    public static function tamanhoDownload($arquivo) {
        $tamanhoDownload = filesize($arquivo);
        $bytes = array('B', 'KB', 'MB', 'GB', 'TB');
        foreach ($bytes as $val) {
            if ($tamanhoDownload > 1024) {
                $tamanhoDownload = $tamanhoDownload / 1024;
            } else {
                break;
            }
        }
        return round($tamanhoDownload, 2) . " " . $val;
    }

    public static function retiraAcentos($entrada) {
        $acc = ['á', 'à', 'â', 'ã', 'ä', 'ª', 'é', 'è', 'ê', 'ẽ', 'ë', 'í', 'ì', 'î',
            'ĩ', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'º', 'ú', 'ù', 'û', 'ũ', 'ü', 'ç',
            'Á', 'À', 'Â', 'Ã', 'Ä', 'É', 'È', 'Ê', 'Ẽ', 'Ë', 'Í', 'Ì', 'Î',
            'Ĩ', 'Ï', 'Ó', 'Ò', 'Ô', 'Õ', 'Ö', 'Ú', 'Ù', 'Û', 'Ũ', 'Ü', 'Ç'];
        $ncc = ['a', 'a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i',
            'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'c',
            'A', 'A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'I',
            'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'U', 'C'];
        return str_replace($acc, $ncc, $entrada);
    }

    public static function removeLixoTexto($texto) {
        $texto = strip_tags($texto, '<p><a><strong><img><iframe>');
        $texto = preg_replace('#\s(id|class)="[^"]+"#', '', $texto);
        return str_replace("&nbsp;", "", preg_replace("@<p>(\s|&nbsp;|</?\s?br\s?/?>)*</?p>@", "", $texto));
    }

    public function strpad($input, $pad_length, $pad_string = "'0'", $pad_type = 'STR_PAD_LEFT') {
        return str_pad($input, $pad_length, '0', STR_PAD_LEFT);
    }

    public static function onlyNumber($value) {
        return preg_replace('/[^0-9]/', '', $value);
    }

    public static function unformatDate($value, $format = "d/m/Y"){
        $data = DateTime::createFromFormat($format, $value);
        return $data->format("Y-m-d");
    }

    static function getDDD($value){
        return substr($value, 1, 2);
    }

    static function getTelefone($value){
        return substr($value, 5);
    }

    static function removerPalavrasLigacao($string){
        return str_ireplace ( array (
            " de ",
            " da ",
            " das ",
            " do ",
            " dos ",
            " na ",
            " nas ",
            " no ",
            " nos ",
            " em ",
            " a ",
            " o ",
            " e ",
            " as ",
            " os ",
            " para ",
            " pra ",
            " este ",
            " esta ",
            " esse ",
            " essa ",
            " estes ",
            " estas ",
            " esses ",
            " essas ",
            " um ",
            " uma ",
            " uns ",
            " umas ",
            " que ",
            " lhe ",
            " por "
            ), " ", $string );
    }

    public static function browser_detection($which_test) {
        // initialize variables
        $browser_name = '';
        $browser_number = '';
        // get userAgent string
        $browser_user_agent = ( isset($_SERVER['HTTP_USER_AGENT']) ) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
        //pack browser array
        // values [0]= user agent identifier, lowercase, [1] = dom browser, [2] = shorthand for browser,
        $a_browser_types = array(
            array('opera', true, 'op'),
            array('msie', true, 'ie'),
            array('konqueror', true, 'konq'),
            # comment out safari if you just want basic webkit detection. 
            array('safari', true, 'saf'),
            # note, sometimes 'like gecko' string is in webkit ua so needs to be before gecko
            array('webkit', true, 'webkit'),
            array('gecko', true, 'moz'),
            array('mozilla/4', false, 'ns4'),
            # this will set a default 'unknown' value
            array('other', false, 'other')
        );

        $i_count = count($a_browser_types);
        for ($i = 0; $i < $i_count; $i++) {
            $s_browser = $a_browser_types[$i][0];
            $b_dom = $a_browser_types[$i][1];
            $browser_name = $a_browser_types[$i][2];
            // if the string identifier is found in the string
            if (stristr($browser_user_agent, $s_browser)) {
                // we are in this case actually searching for the 'rv' string, not the gecko string
                // this test will fail on Galeon, since it has no rv number. You can change this to 
                // searching for 'gecko' if you want, that will return the release date of the browser
                if ($browser_name == 'moz') {
                    $s_browser = 'rv';
                }
                $browser_number = Util::browser_version($browser_user_agent, $s_browser);
                break;
            }
        }
        // which variable to return
        if ($which_test == 'browser') {
            return $browser_name;
        } elseif ($which_test == 'number') {
            # this will be null for default other category, so make sure to test for null
            return $browser_number;
        }

        /* this returns both values, then you only have to call the function once, and get
          the information from the variable you have put it into when you called the function */ elseif ($which_test == 'full') {
            $a_browser_info = array($browser_name, $browser_number);
            return $a_browser_info;
        }
    }

    public static function browser_version($browser_user_agent, $search_string) {
        $string_length = 8; // this is the maximum  length to search for a version number
        //initialize browser number, will return '' if not found
        $browser_number = '';

        // which parameter is calling it determines what is returned
        $start_pos = strpos($browser_user_agent, $search_string);

        // start the substring slice 1 space after the search string
        $start_pos += strlen($search_string) + 1;

        // slice out the largest piece that is numeric, going down to zero, if zero, function returns ''.
        for ($i = $string_length; $i > 0; $i--) {
            // is numeric makes sure that the whole substring is a number
            if (is_numeric(substr($browser_user_agent, $start_pos, $i))) {
                $browser_number = substr($browser_user_agent, $start_pos, $i);
                break;
            }
        }
        return $browser_number;
    }

    /**
    * Gera a paginação dos itens de um array ou collection.
    *
    * @param array|Collection      $items
    * @param int   $perPage
    * @param int  $page
    * @param array $options
    *
    * @return LengthAwarePaginator
    *
    * Exemplo de uso: $produtos = Util::paginate($produtos, 20, $request->get('page'), ['path' => '/'.$request->path()]);
    */
    public static function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
