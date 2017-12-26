<?

namespace Prominado\Bootstrap;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class ListProperty
{
    public function GetUserTypeDescription()
    {
        return [
            'PROPERTY_TYPE'        => 'E',
            'USER_TYPE'            => 'EListPlus',
            'DESCRIPTION'          => Loc::getMessage('PROMINADO_BOOTSTRAP_PROPERTY_NAME'),
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
        ];
    }

    public function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {
        static $cache = [];
        $iblockId = $arProperty['LINK_IBLOCK_ID'];

        if (!array_key_exists($iblockId, $cache)) {
            $cache[$iblockId] = [];
            $rsItems = \CIBlockElement::GetList(['NAME' => 'ASC', 'ID' => 'ASC'],
                ['IBLOCK_ID' => $arProperty['LINK_IBLOCK_ID'], 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'Y'], false,
                false, ['ID', 'NAME']);
            while ($arItem = $rsItems->GetNext()) {
                $cache[$iblockId][] = $arItem;
            }
        }
        $varName = str_replace('VALUE', 'DESCRIPTION', $strHTMLControlName['VALUE']);
        $html = '<select name="' . $strHTMLControlName['VALUE'] . '">
                    <option value=""></option>';
        foreach ($cache[$iblockId] as $arItem) {
            $html .= '<option value="' . $arItem['ID'] . '"';
            if ($value['VALUE'] === $arItem['~ID']) {
                $html .= ' selected';
            }
            $html .= '>' . $arItem['NAME'] . '</option>';
        }
        $html .= '</select>';
        $html .= ' ';
        $html .= '<input type="text" name="' . $varName . '" value="' . $value['DESCRIPTION'] . '" />';

        return $html;
    }
}