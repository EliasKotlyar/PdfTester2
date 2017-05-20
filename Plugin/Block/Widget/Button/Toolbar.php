<?php
namespace Twinsen\PdfTester2\Plugin\Block\Widget\Button;

use Magento\Backend\Block\Widget\Button\Toolbar as ToolbarContext;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Backend\Block\Widget\Button\ButtonList;

/**
 * Got from https://www.maxpronko.com/blog/how-to-change-order-buttons-in-magento-2
 * Class Toolbar
 * @package Dalton\OrderExport\Plugin\Block\Widget\Button
 */
class Toolbar
{
    /**
     * @param ToolbarContext $toolbar
     * @param AbstractBlock $context
     * @param ButtonList $buttonList
     * @return array
     */
    public function beforePushButtons(
        ToolbarContext $toolbar,
        \Magento\Framework\View\Element\AbstractBlock $context,
        \Magento\Backend\Block\Widget\Button\ButtonList $buttonList
    ) {
        if (!$context instanceof \Magento\Sales\Block\Adminhtml\Order\Invoice\View) {
            return [$context, $buttonList];
        }

        $buttonList->add('display_pdf',
            [
                'label' => __('Display PDF'),
                'onclick' => 'setLocation(\'' . $context->getUrl('twinsen/displayPdf/index') . '\')',
                'class' => 'review'
            ]
        );

        return [$context, $buttonList];
    }
}