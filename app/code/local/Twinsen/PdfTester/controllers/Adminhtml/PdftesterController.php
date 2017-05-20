<?php

/**
 * Created by PhpStorm.
 * User: ekotlyar
 * Date: 02.02.2016
 * Time: 12:00
 */
class Twinsen_Pdftester_Adminhtml_PdftesterController
    extends Mage_Adminhtml_Controller_Action
{
    public function _processEntity($getParameterName,$entityName,$pdfEntityName){
        if ($invoiceId = $this->getRequest()->getParam($getParameterName)) {
            if ($invoice = Mage::getModel($entityName)->load(
                $invoiceId
            )
            ) {
                $pdf = Mage::getModel($pdfEntityName)->getPdf(
                    array($invoice)
                );
                $this->getResponse()->setHeader('Content-type', 'application/pdf');
                $this->getResponse()->setHeader('Content-Disposition', 'inline; filename="pdf.pdf"');
                $this->getResponse()->setBody($pdf->render());


            } else {
                $this->_forward('noRoute');
            }
        }
    }

    /**
     *
     */
    public function invoiceAction()
    {
        return $this->_processEntity('invoice_id',"sales/order_invoice","sales/order_pdf_invoice");
    }

    public function shipmentAction()
    {
        return $this->_processEntity('shipment_id',"sales/order_shipment","sales/order_pdf_shipment");
    }
    public function creditMemoAction()
    {
        return $this->_processEntity('creditmemo_id',"sales/order_creditmemo","sales/order_pdf_creditmemo");
    }
}