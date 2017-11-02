<?php
defined('TYPO3_MODE') || die;

call_user_func(function () {
    $ll = 'LLL:EXT:pxa_product_manager/Resources/Private/Language/locallang_db.xlf:';

    $tempColumns = [
        'keywords' => [
            'exclude' => 1,
            'label' => $GLOBALS['TCA']['pages']['columns']['keywords']['label'],
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ]
        ],
        'meta_description' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.description_formlabel',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ]
        ],
        'alternative_title' => [
            'exclude' => 0,
            'label' => $ll . 'tx_pxaproductmanager_domain_model_product.alternative_title',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ]
        ],
        'path_segment' => [
            'exclude' => 0,
            'label' => $ll . 'tx_pxaproductmanager_domain_model_product.path_segment',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,alphanum_x,lower'
            ]
        ],
        'pxapm_image' => [
            'exclude' => 1,
            'label' => $ll . 'sys_category.pxapm_image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'pxapm_image',
                [
                    'appearance' => [
                        // @codingStandardsIgnoreStart
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                        'fileUploadAllowed' => false
                        // @codingStandardsIgnoreEnd
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;;filePalette'
                        ]
                    ],
                    'maxitems' => 1,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true
                    ]
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            )
        ],
        /* This field is mainly used for sorting */
        'pxapm_subcategories' => [
            'label' => $ll . 'sys_category.pxapm_subcategories',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_category',
                'foreign_field' => 'parent',
                'foreign_match_fields' => [
                    'sys_language_uid' => 0, /* To hide localized elements, sorting is done in Default language */
                ],
                'maxitems' => 9999,
                'behaviour' => [],
                'appearance' => [
                    'levelLinksPosition' => 'none',
                    'collapseAll' => true,
                    'useSortable' => true,
                    'enabledControls' => [
                        'new' => false,
                        'info' => false,
                        'hide' => false,
                        'delete' => false,
                        'localize' => false,
                    ]
                ]
            ]
        ],
        'pxapm_attributes_sets' => [
            'exclude' => 0,
            'label' => $ll . 'sys_category.pxapm_attributes_sets',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_pxaproductmanager_domain_model_attributeset',
                // @codingStandardsIgnoreStart
                'foreign_table_where' => ' AND tx_pxaproductmanager_domain_model_attributeset.pid = ###CURRENT_PID### AND tx_pxaproductmanager_domain_model_attributeset.sys_language_uid IN (-1,0) ORDER BY tx_pxaproductmanager_domain_model_attributeset.sorting',
                // @codingStandardsIgnoreEndZ
                'MM' => 'tx_pxaproductmanager_category_attributeset_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ]
                ]
            ]
        ],
        'pxapm_description' => [
            'exclude' => 0,
            'label' => $ll . 'sys_category.pxapm_description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'enableRichtext' => true,
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false
                    ]
                ]
            ]
        ],
        'pxapm_banner_image' => [
            'exclude' => 1,
            'label' => $ll . 'sys_category.pxapm_banner_image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'pxapm_banner_image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' =>
                            'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                        'showPossibleLocalizationRecords' => false,
                        'showRemovedLocalizationRecords' => true,
                        'showAllLocalizationLink' => false,
                        'showSynchronizationLink' => false
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'pxapm_banner_image',
                        'tablenames' => 'sys_category',
                        'table_local' => 'sys_file',
                    ],
                    // @codingStandardsIgnoreStart
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ]
                    ],
                    // @codingStandardsIgnoreEnd
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                        'localizeChildrenAtParentLocalization' => true,
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'pxapm_card_view_template' => [
            'exclude' => 0,
            'onChange' => 'reload',
            'label' => $ll . 'sys_category.pxapm_card_view_template',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$ll . 'sys_category.default', ''],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ]
        ],
        'pxapm_single_view_template' => [
            'exclude' => 0,
            'onChange' => 'reload',
            'label' => $ll . 'sys_category.pxapm_single_view_template',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [$ll . 'sys_category.default', '']
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ]
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $tempColumns);

    // Additional fields
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'sys_category',
        '--div--;' . $ll . 'sys_category.additional_fields_tab,
        pxapm_image,
        pxapm_banner_image,
        pxapm_card_view_template,
        pxapm_single_view_template,
        pxapm_description',
        '',
        'after:items'
    );

    // Attibutes
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'sys_category',
        '--div--;' . $ll . 'sys_category.attributes_tab,
        pxapm_attributes_sets',
        '',
        'after:pxapm_description'
    );

    // Subcategories
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'sys_category',
        '--div--;' . $ll . 'sys_category.subcategories_tab,
        pxapm_subcategories',
        '',
        'after:pxapm_attributes'
    );

    // Metadata
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'sys_category',
        '--div--;' . $ll . 'sys_category.metadata_tab,
        meta_description,
        keywords,
        alternative_title,
        path_segment',
        '',
        'after:pxapm_subcategories'
    );

    if (!empty($categoryWhere = \Pixelant\PxaProductManager\Utility\CategoryUtility::getCategoriesTCAWhereClause())) {
        $categoriesCongifuration = &$GLOBALS['TCA']['sys_category']['columns']['parent']['config'];
        $categoriesCongifuration['foreign_table_where'] =
            $categoryWhere . ' ' . $categoriesCongifuration['foreign_table_where'];
    }
});
