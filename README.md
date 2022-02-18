# PHP-EXTEND

Conjunto de helpers facilitadoras para desenvolvimento PHP

    composer require elegance/php-extend

---

Tratameto de acentuação de strings

**remove_accents**
Remove os acentos de uma string

    remove_accents($string)

---

Manipulação de caracters de uma string

**char_replace**
Realiza o replace de caracteres de uma string

    char_replace($string, $charSearch, $charReplace)

**char_deny**
Remove caracteres de uma string

    char_deny($string, $charDeny, $charAllow = '')

**char_deny_case**
Remove caracteres de uma string diferenciando maiusculas e minusculas

    char_deny_case($string, $charDeny, $charAllow = '')

**char_only**
Mantem apenas alguns caracteres de uma string

    char_only($string, $charOnly)

**char_only_case**
Mantem apenas alguns caracteres de uma string diferenciando maiusculas e minusculas

    char_only_case($string, $charOnly)
    

---

Mostra valores de variaveis para inspeção de codigo

**dbug**
Realiza o debug de uma ou mais variaveis

    dbug()

**dd**
Realiza o debug de uma ou mais variaveis e finaliza o sistema

    dd()

**dbugpre**
Realiza o debug de uma ou mais variaveis formatando o resultado com uma tag [pre]

    dbugpre()

**ddpre**
Realiza o debug de uma ou mais variaveis e finaliza o sistema formatando o resultado com uma tag [pre]

    ddpre()

---

Garante tipos especificos de variaveis

> Uma helper **ensure** não retorna resultado. Ao inves disso, manipula diretamente uma variavel fornecida

**ensure_array**
Garante que uma variavel seja um array

    ensure_array(&$var)

**ensure_char_array**
Garante que uma variavel seja um array de caracteres

    ensure_char_array(&$var)

**ensure_string**
Garante que uma varaivel seja uma string

    ensure_string(&$var)

---

Varificações diversas

**is_blank**
Verifica se uma variavel está vazia
    
    is_blank($var)

**is_closure**
Verifica se uma variavel é uma função anonima
    
    is_closure($var)

**is_md5**
Verifica se uma string é um MD5
    
    is_md5($string)

**is_class**
Verifiaca se um objeto é ou extende uma classe
    
    is_class($obj, $class)

**is_extend**
Verifiaca se um objeto extende uma classe
    
    is_extend($obj, $class)

**is_serialized**
Verifica se uma string é um objeto serializado
    
    is_serialized($string)

**is_json**
Verifica se uma string é um objeto JSON
    
    is_json($string)

---

Combina o valor de variaveis

**merge**
Combina os valores de duas variaveis

    merge($var1, $var2, $typeMerge = 1)

---

Manipulação de numeros

**num_format**
Formata um numero em float
    
    num_format($number, $decimals = 2, $roundType = -1)

**num_round**
Arredonda um numero
    
    num_round($number, $roundType = 0)

**num_interval**
Garante que um numero esteja dentro de um intervalo
    
    num_interval($number, $min = 0, $max = 0)

**num_positive**
Retorna o representativo positivo de um numero
    
    num_positive($number)

**num_negative**
Retorna o representativo negativo de um numero
    
    num_negative($number)

---

Limpeza de uma string representando caminhos

**path**
Formata uma string como caminho de diretório

    path($path)

---

Manipulação de strings

**mb_str_replace**
Substitui todas as ocorrências da string de procura com a string de substituição

    mb_str_replace($search, $replace, $subject, &$count = 0)

**mb_str_replace_all**
Substitui todas as ocorrências da string de procura com a string de substituição

    mb_str_replace_all($search, $replace, $subject, $loop = 10)

**mb_str_split**
Corta uma string em um array

    mb_str_split($string, $string_length = 1)

**str_replace_all**
Substitui todas as ocorrências da string de procura com a string de substituição

    str_replace_all($search, $replace, $subject, $loop = 10)

**str_replace_first**
Substitui a primeira ocorrência da string

    str_replace_first($search, $replace, $subject)

**str_replace_last**
Substitui a ultima ocorrência da string

    str_replace_last($search, $replace, $subject)

**str_trim**
Aplica o efeito TRIM em um grupo de caracteres dentro de uma string, removendo um ou mais caracteres a seu redor

    str_trim($string, $search, $trim = ' ')
    
---

Formatação de strings

> O uso encadeados dos metodos ToCase pode causar resultado inesperado

**toCase_upper**
Transforma uma string em maiuscula 

    toCase_upper($string)

**toCase_lower**
Transforma uma string em minuscula 

    toCase_lower($string)

**toCase_simple**
Formata uma string separando as palavas por espaços

    toCase_simple($string, $separator = ' ')

**toCase_pascal**
Formata uma string como PascalCase

    toCase_pascal($string)

**toCase_camel**
Formata uma string como CamelCase

    toCase_camel($string)

**toCase_snake**
Formata uma string como SnakeCase

    toCase_snake($string)

**toCase_kebab**
Formata uma string como KebabCase

    toCase_kebab($string)


---

Extrai o valor respresentado de uma string

**valueIn**
Retorna o valor representado dentro de uma string

    valueIn($string)
