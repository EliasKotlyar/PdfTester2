<?php

namespace Twinsen\PdfTester2\Controller\Adminhtml\DisplayPdf;

use Magento\Framework\Exception\LocalizedException;


class Index extends \Magento\Backend\App\Action
{


    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;

    /**
     * @var \Magento\Framework\App\Response\Http
     */
    private $response;


    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(\Magento\Backend\App\Action\Context $context,
                                \Magento\Framework\App\Request\Http $request,
                                \Magento\Framework\App\Response\Http $response)
    {
        parent::__construct($context);

        $this->request = $request;

        $this->response = $response;

    }

    /**
     * Index Action for Employee
     * @return Void
     * */

    public function execute()
    {
        $orderID = $this->request->getParam('order_id');
        die("Test");
        $xmlString = $this->converter->generateXML($orderID);
        $this->getResponse()->setHeader('Content-type:', 'text/xml', true);
        $this->getResponse()->setContent($xmlString);
    }


    /**
     * Is the user allowed to view the blog post grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}

