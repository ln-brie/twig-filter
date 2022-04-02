<?php 

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FiltreExtension extends AbstractExtension {


    public function getFilters() {
        return [
            new TwigFilter('speCharSlug', [$this, 'speCharSlug']),
            new TwigFilter('capEachWord', [$this, 'capEachWord']),
        ];
        
    }

    /**
     * passe le mot en minuscules et remplace les caractères spéciaux
     * 
     * @var string $word
     * @return string $slug
     */
    public function speCharSlug($word) {
        $slug = strtolower($word);
        $slug = str_ireplace('é', 'e', $slug);
        $slug = str_ireplace('è', 'e', $slug);
        $slug = str_ireplace('ê', 'e', $slug);
        $slug = str_ireplace('ë', 'e', $slug);
        $slug = str_ireplace('ï', 'i', $slug);
        $slug = str_ireplace('î', 'i', $slug);
        $slug = str_ireplace('ö', 'o', $slug);
        $slug = str_ireplace('ô', 'o', $slug);
        $slug = str_ireplace('û', 'u', $slug);
        $slug = str_ireplace('ü', 'u', $slug);
        $slug = str_ireplace('ù', 'u', $slug);
        $slug = str_ireplace('ÿ', 'y', $slug);
        $slug = str_ireplace('ñ', 'n', $slug);
        $slug = str_ireplace(' ', '-', $slug);
        $slug = str_ireplace('œ', 'oe', $slug);
        $slug = str_ireplace('æ', 'ae', $slug);        

        return $slug;
    }

    /**
     * passe le mot en minuscules et chaque première lettre en majuscule
     * 
     * @var string $expression
     * @return string $firstCapitalize
     */
    public function capEachWord(string $expression) {
        $expression = strtolower($expression);
        $tab = explode(' ', $expression);
        $array = array();
        
        foreach ($tab as $t) {
            $t = ucfirst($t);
            $array[] = $t;
        }

        $firstCapitalize = implode(' ', $array);    

        return $firstCapitalize;
    }




}