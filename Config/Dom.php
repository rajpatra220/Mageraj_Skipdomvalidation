<?php
/**
 * Skip DOM Validation
 *
 * @package Mageraj_Skipdomvalidation
 * @author Rajesh Patra <rajpatra220@gmail.com>
 * @copyright 2020-2030 Oleg Koval
 * @license OSL-3.0, AFL-3.0
 */
namespace Mageraj\Skipdomvalidation\Config;

class Dom extends \Magento\Framework\Config\Dom
{
    /**
     * Create DOM document based on $xml parameter
     *
     * @param string $xml
     * @return \DOMDocument
     * @throws \Magento\Framework\Config\Dom\ValidationException
     */
    protected function _initDom($xml)
    {
        $dom = new \DOMDocument();
        $useErrors = libxml_use_internal_errors(true);
        $res = $dom->loadXML($xml);
        if (!$res) {
            $errors = self::getXmlErrors($this->errorFormat);
            libxml_use_internal_errors($useErrors);
            throw new \Magento\Framework\Config\Dom\ValidationException(implode("\n", $errors));
        }
        libxml_use_internal_errors($useErrors);

        $skipDomValidation = true;
        if ($skipDomValidation === false) {
            if ($this->validationState->isValidationRequired() && $this->schema) {
                $errors = $this->validateDomDocument($dom, $this->schema, $this->errorFormat);
                if (count($errors)) {
                    throw new \Magento\Framework\Config\Dom\ValidationException(implode("\n", $errors));
                }
            }
        }
        return $dom;
    }
}
