<?php
class Twinsen_PdfTester_Model_Observer{
    public function core_block_abstract_to_html_before($observer)
    {
        $block = $observer->getBlock();
        if ($block instanceof Mage_Adminhtml_Block_Sales_Order_Invoice_View) {
            $invoice = Mage::registry('current_invoice');
            //var_dump($invoiceId);
            $url =  Mage::helper("adminhtml")->getUrl('adminhtml/pdftester/invoice',array('invoice_id'=>$invoice->getid())) ;
            $block->addButton('testpdf', array(
                'label' => 'Test PDF Print',
                'onclick' => 'window.open(\'' .$url. '\',\'_blank\')',
                'class' => 'go'
            ));
        }
        if ($block instanceof Mage_Adminhtml_Block_Sales_Order_Shipment_View) {
            $invoice = Mage::registry('current_shipment');
            //var_dump($invoiceId);
            $url =  Mage::helper("adminhtml")->getUrl('adminhtml/pdftester/shipment',array('shipment_id'=>$invoice->getid())) ;
            $block->addButton('testpdf', array(
                'label' => 'Test PDF Print',
                'onclick' => 'window.open(\'' .$url. '\',\'_blank\')',
                'class' => 'go'
            ));
        }
        if ($block instanceof Mage_Adminhtml_Block_Sales_Order_Creditmemo_View) {
            $creditmemo = Mage::registry('current_creditmemo');
            //var_dump($invoiceId);
            $url =  Mage::helper("adminhtml")->getUrl('adminhtml/pdftester/creditmemo',array('creditmemo_id'=>$creditmemo->getid())) ;
            $block->addButton('testpdf', array(
                'label' => 'Test PDF Print',
                'onclick' => 'window.open(\'' .$url. '\',\'_blank\')',
                'class' => 'go'
            ));
        }
    }
}