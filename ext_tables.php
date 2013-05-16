<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$tempColumns = array(
	'tx_simpleyoutube_code' => array(		
		'exclude' => 0,		
		'label' => 'LLL:EXT:simpleyoutube/locallang_db.xml:backend_layout.tx_simpleyoutube_code',		
		'config' => array(
			'type' => 'input',	
			'size' => '30',
		)
	),
);



t3lib_div::loadTCA('tt_content');

t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);

t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/', 'Simpleyoutube');

t3lib_extMgm::addPlugin(array(
	'LLL:EXT:simpleyoutube/locallang_db.xml:tt_content.CType_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'CType');


$TCA['tt_content']['types'][$_EXTKEY . '_pi1']['showitem'] = '
	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,tx_simpleyoutube_code,bodytext;;9;richtext:rte_transform[flag=rte_enabled|mode=ts_css],rte_enabled,
    
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
    	--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
    
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,tx_adcontentslide_slide,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,

    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.behaviour,
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended';
?>