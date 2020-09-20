<?php
namespace includes;

include_once('models/Menuk.php');
include_once('models/Jogosultsagok.php');

use models\Menuk;
use models\Jogosultsagok;

class Menu {

    public static function getMenu() {
        $result = '';
        $menuModel = new Menuk(Database::getConnection());
        $rightModel = new Jogosultsagok(Database::getConnection());
        $right = $rightModel->getByRightLevel(Session::getSessionVariable('userlevel'));
        $menuItemList = $menuModel->getByRightId($right->id);

        foreach ($menuItemList as $menuitem) {
            $children = self::getChildren($menuitem->nev);
            if ($children == null) {
                $result .= '<a href="'.SITE_ROOT.$menuitem->url.'" class="w3-bar-item w3-button">'.$menuitem->nev.'</a>';
            } else {
                $result .= '<div class="w3-dropdown-hover">'.
                    '<button class="w3-button">'.$menuitem->nev.'</button>'.
                    '<div class="w3-dropdown-content w3-bar-block w3-card-4">';

                foreach ($children as $child) {
                    $result .= '<a href="'.SITE_ROOT.$child->url.'" class="w3-bar-item w3-button">'.$child->nev.'</a>';
                }

                $result .= '</div></div>';
            }
        }

        return $result;
    }

    private static function getChildren($itemName): array {
        $menuModel = new Menuk(Database::getConnection());

        return $menuModel->getByParentName($itemName);
    }
}
