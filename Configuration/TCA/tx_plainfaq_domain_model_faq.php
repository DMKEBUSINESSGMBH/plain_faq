<?php

use TYPO3\CMS\Core\Resource\File;

$rteImageSoftref = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rte_ckeditor_image') ? ',rtehtmlarea_images' : '';

return [
    'ctrl' => [
        'title' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq',
        'label' => 'question',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'sortby' => 'sorting',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'searchFields' => 'question,answer,keywords,images,files',
        'typeicon_classes' => [
            'default' => 'ext-plainfaq-faq',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => '
            question, slug, answer, keywords,

            --div--;LLL:EXT:plain_faq/Resources/Private/Language/locallang_be.xlf:tabs.categories,
                categories,

            --div--;LLL:EXT:plain_faq/Resources/Private/Language/locallang_be.xlf:tabs.media,
                images, files,

            --div--;LLL:EXT:plain_faq/Resources/Private/Language/locallang_be.xlf:tabs.relations,
                related,

            --div--;LLL:EXT:plain_faq/Resources/Private/Language/locallang_be.xlf:tabs.language,
                --palette--;;language,

            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                hidden, starttime, endtime, fe_group',
        ],
    ],
    'palettes' => [
        'language' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_plainfaq_domain_model_faq',
                'foreign_table_where' => 'AND tx_plainfaq_domain_model_faq.pid=###CURRENT_PID### AND tx_plainfaq_domain_model_faq.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'fe_group' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        'value' => -1,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        'value' => -2,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        'value' => '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'categories' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.categories',
            'config' => [
                'type' => 'category',
            ],
        ],

        'question' => [
            'exclude' => true,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.question',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:pages.slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['question'],
                    'replacements' => [
                        '/' => '-',
                    ],
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ],
        'answer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.answer',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'softref' => 'typolink_tag,images,email[subst],url' . $rteImageSoftref,
            ],
        ],
        'keywords' => [
            'exclude' => true,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.keywords',
            'config' => [
                'type' => 'text',
                'cols' => 60,
                'rows' => 5,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 999,
                'allowed' => 'common-image-types',
                'overrideChildTca' => [
                    'types' => [
                        File::FILETYPE_IMAGE => [
                            'showitem' => '
                                        --palette--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;eventPalette,
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette',
                        ],
                    ],
                ],
            ],
        ],
        'files' => [
            'exclude' => true,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.files',
            'config' => [
                'type' => 'file',
            ],
        ],
        'related' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:plain_faq/Resources/Private/Language/locallang_db.xlf:tx_plainfaq_domain_model_faq.related',
            'config' => [
                'type' => 'group',
                'allowed' => 'tx_plainfaq_domain_model_faq',
                'foreign_table' => 'tx_plainfaq_domain_model_faq',
                'size' => 5,
                'minitems' => 0,
                'maxitems' => 100,
                'MM' => 'tx_plainfaq_domain_model_faq_related_mm',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],

    ],
];
