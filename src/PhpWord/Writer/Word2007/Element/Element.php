<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\Word2007\Element;

use PhpOffice\PhpWord\Element\AbstractElement;
use PhpOffice\PhpWord\Shared\XMLWriter;
use PhpOffice\PhpWord\Writer\Word2007\Part\AbstractPart;

/**
 * Generic element writer
 *
 * @since 0.10.0
 */
class Element
{
    /**
     * XML writer
     *
     * @var \PhpOffice\PhpWord\Shared\XMLWriter
     */
    protected $xmlWriter;

    /**
     * Parent writer
     *
     * @var \PhpOffice\PhpWord\Writer\Word2007\Part\AbstractPart
     */
    protected $parentWriter;

    /**
     * Element
     *
     * @var \PhpOffice\PhpWord\Element\AbstractElement
     */
    protected $element;

    /**
     * Without paragraph
     *
     * @var bool
     */
    protected $withoutP = false;

    /**
     * Create new instance
     *
     * @param bool $withoutP
     */
    public function __construct(XMLWriter $xmlWriter, AbstractPart $parentWriter, AbstractElement $element, $withoutP = false)
    {
        $this->xmlWriter = $xmlWriter;
        $this->parentWriter = $parentWriter;
        $this->element = $element;
        $this->withoutP = $withoutP;
    }

    /**
     * Write element
     *
     * @return string
     */
    public function write()
    {
        $elmName = str_replace('PhpOffice\\PhpWord\\Element\\', '', get_class($this->element));
        $elmWriterClass = 'PhpOffice\\PhpWord\\Writer\\Word2007\\Element\\' . $elmName;
        if (class_exists($elmWriterClass) === true) {
            $elmWriter = new $elmWriterClass($this->xmlWriter, $this->parentWriter, $this->element, $this->withoutP);
            $elmWriter->write();
        }
    }
}