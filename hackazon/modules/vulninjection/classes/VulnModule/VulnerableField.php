<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nikolay Chervyakov 
 * Date: 24.12.2014
 * Time: 13:01
 */


namespace VulnModule;


use App\Pixifier;
use VulnModule\Config\FieldDescriptor;
use VulnModule\Config\VulnerableElement;
use VulnModule\Vulnerability as V;

class VulnerableField
{
    /**
     * @var FieldDescriptor
     */
    protected $descriptor;

    /**
     * @var VulnerableElement
     */
    protected $vulnerableElement;

    /**
     * @var mixed|string
     */
    protected $rawValue;

    /**
     * @var string
     */
    protected $vulnerableElementId;

    function __construct(FieldDescriptor $descriptor, $value = null, VulnerableElement $vulnerabilities = null)
    {
        $this->descriptor = $descriptor;
        $this->rawValue = $value;
        $this->vulnerableElement = $vulnerabilities ?: new VulnerableElement();
    }

    /**
     * @return mixed
     */
    public function raw()
    {
        return $this->rawValue;
    }

    /**
     * @param mixed $rawValue
     */
    public function setRaw($rawValue)
    {
        $this->rawValue = $rawValue;
    }

    /**
     * @return VulnerableElement
     */
    public function getVulnerableElement()
    {
        return $this->_getVulnElement();
    }

    /**
     * @param VulnerabilitySet $vulnerableElement
     */
    public function setVulnerableElement($vulnerableElement)
    {
        $this->vulnerableElement = $vulnerableElement;
    }

    /**
     * @param $name
     * @return null|Vulnerability|V\SQL|V\XSS
     */
    public function getVulnerability($name)
    {
        return $this->_getVulnElement()->getComputedVulnerability($name);
    }

    /**
     * @param $name
     * @return bool
     */
    public function isVulnerableTo($name)
    {
        $vuln = $this->getVulnerability($name);
        return $vuln->isEnabled();
    }

    /**
     * @param null $value
     * @return VulnerableField
     */
    public function copy($value = null)
    {
        if (is_array($value)) {
            /** @var VulnerableField[] $result */
            $result = [];
            foreach ($value as $key => $val) {
                $result[$key] = clone $this;
                $result[$key]->setRaw($val);
            }

        } else {
            $result = clone $this;
            if ($value !== null) {
                $result->setRaw($value);
            }
        }
        return $result;
    }

    public function __toString()
    {
        return (string) $this->rawValue;
    }

    public function escapeXSS()
    {
        if ($this->isVulnerableTo('XSS')) {
            return (string) $this->getFilteredValue();
        }

        return htmlspecialchars($this->getFilteredValue(), ENT_COMPAT, 'UTF-8');
    }

    public function getName()
    {
        return $this->descriptor->getName();
    }

    public function getSource()
    {
        return $this->descriptor->getSource();
    }

    /**
     * @return FieldDescriptor
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    public function getFilteredValue()
    {
        $value = $this->rawValue;

        /** @var Vulnerability $vuln */
        foreach ($this->vulnerableElement->getComputedVulnerabilities() as $vuln) {
            if ($vuln) {
                $value = $vuln->filter($value);
            }
        }

        return $value;
    }

    public function __sleep()
    {
        if ($this->_getVulnElement()) {
            $this->vulnerableElementId = $this->_getVulnElement()->getPath();
        }

        return ['descriptor', 'vulnerableElementId', 'rawValue'];
    }

    protected function _getVulnElement()
    {
        if ($this->vulnerableElementId) {
            $pixie = Pixifier::getInstance()->getPixie();
            $service = $pixie->vulninjection->service();
            $vulnElement = $service->getElementByPath($this->vulnerableElementId);
            $this->vulnerableElement = $vulnElement ?: new VulnerableElement();
            $this->vulnerableElementId = null;
        }

        return $this->vulnerableElement;
    }
}