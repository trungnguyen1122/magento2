<?php
namespace Packt\HelloWorld\Model\Config\Source;
class Relation implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,'label' => __('--Please Select--')
            ],
            [
                'value' => '1',
                'label' => __('1')
            ],
            [
                'value' => '2',
                'label' => __('2')
            ],

        ];
    }
}