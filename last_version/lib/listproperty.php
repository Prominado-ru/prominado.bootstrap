<?

namespace Prominado\Bootstrap;

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class ListProperty
{
    function GetUserTypeDescription()
    {
        return Array(
            "PROPERTY_TYPE" => "E",
            "USER_TYPE" => "EListPlus",
            "DESCRIPTION" => Loc::getMessage("PROMINADO_BOOTSTRAP_PROPERTY_NAME"),
            "GetPropertyFieldHtml" => Array(__CLASS__, "GetPropertyFieldHtml"),
        );
    }

    function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {
        static $cache = array();
        $IBLOCK_ID = $arProperty["LINK_IBLOCK_ID"];
        if (!array_key_exists($IBLOCK_ID, $cache))
        {
            $cache[$IBLOCK_ID] = array();
            $rsItems = \CIBlockElement::GetList(array("NAME" => "ASC", "ID" => "ASC"), array("IBLOCK_ID"=> $arProperty["LINK_IBLOCK_ID"], "ACTIVE" => "Y", "CHECK_PERMISSIONS" => "Y"), false, false, array("ID", "NAME"));
            while($arItem = $rsItems->GetNext())
            {
                $cache[$IBLOCK_ID][] = $arItem;
            }
        }
        $varName = str_replace("VALUE", "DESCRIPTION", $strHTMLControlName["VALUE"]);
        $html = '<select name="' . $strHTMLControlName["VALUE"] . '">
                    <option value=""></option>';
        foreach($cache[$IBLOCK_ID] as $arItem)
        {
            $html .= '<option value="' . $arItem["ID"] . '"';
            if($value["VALUE"] == $arItem["~ID"])
            {
                $html .= ' selected';
            }
            $html .= '>' . $arItem["NAME"] . '</option>';
        }
        $html .= '</select>';
        $html .= ' ';
        $html .= '<input type="text" name="' . $varName . '" value="' . $value["DESCRIPTION"] . '" />';
        return  $html;
    }
}