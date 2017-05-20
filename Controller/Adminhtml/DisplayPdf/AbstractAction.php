<?php

namespace Twinsen\PdfTester2\Controller\Adminhtml\DisplayPdf;
abstract class AbstractAction extends \Magento\Backend\App\Action
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
     * @var \Magento\Sales\Model\Order\Invoice
     */
    private $pdfInvoice;
    /**
     * @var \Magento\Sales\Model\Order\Pdf\Invoice
     */
    private $pdfInvoicePdf;


    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Framework\App\Response\Http $response,
        \Magento\Sales\Model\Order\Invoice $pdfInvoice,
        \Magento\Sales\Model\Order\Pdf\Invoice $pdfInvoicePdf
    )
    {
        parent::__construct($context);

        $this->request = $request;

        $this->response = $response;

        $this->pdfInvoice = $pdfInvoice;
        $this->pdfInvoicePdf = $pdfInvoicePdf;
    }

    /**
     * Index Action for Employee
     * @return Void
     * */

    public function execute()
    {
        $invoiceId = $this->request->getParam('invoice_id');
        if ($entity = $this->getEntity("", $invoiceId)) {
            $pdf = $this->getPdfEntity($entity, $entity);
            $this->getResponse()->setHeader('Content-type', 'application/pdf');
            $this->getResponse()->setHeader('Content-Disposition', 'inline; filename="pdf.pdf"');
            $this->getResponse()->setBody($pdf->render());


        } else {
            $this->_forward('noRoute');
        }
    }

    public function getEntity($entityName, $id)
    {
        return $this->pdfInvoice->load($id);
    }

    public function getPdfEntity($entityName, $entity)
    {
        return $this->pdfInvoicePdf->getPdf(array($entity));
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