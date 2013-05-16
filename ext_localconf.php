<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$pageTsConfig = <<<'EOT'
	mod.wizards.newContentElement.wizardItems.special.elements.simpleyoutube_pi1 {
		icon = ../typo3conf/ext/simpleyoutube/ext_icon.gif
		title = YouTube Video
		description = Simple YouTube video
		tt_content_defValues {
			CType = simpleyoutube_pi1
		}
	}
	mod.wizards.newContentElement.wizardItems.special.show := addToList(simpleyoutube_pi1)
EOT;

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);


Tx_Extbase_Utility_Extension::configurePlugin(
    
    // The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
    'Simpleyoutube',
    
     // A unique name of the plugin in UpperCamelCase
    'ContentRenderer',

    // An array holding the controller-action-combinations that are accessible
    array (
         // The first controller and its first action will be the default
        'Simpleyoutube' => 'index',
    ),

    // An array of non-cachable controller-action-combinations (they must already be enabled)
    array (
        'Simpleyoutube' => 'index',
    )
);

t3lib_extMgm::addTypoScript($_EXTKEY,'setup',
    '[GLOBAL]
    tt_content.simpleyoutube_pi1 < tt_content.list.20.simpleyoutube_contentrenderer
    tt_content.simpleyoutube_pi1.action = index',
    true
);
?>