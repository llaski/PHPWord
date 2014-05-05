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

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Cell as CellStyle;

/**
 * Table cell element
 */
class Cell extends AbstractContainer
{
    /**
     * Cell width
     *
     * @var int
     */
    private $width = null;

    /**
     * Cell style
     *
     * @var \PhpOffice\PhpWord\Style\Cell
     */
    private $cellStyle;

    /**
     * Create new instance
     *
     * @param string $docPart section|header|footer
     * @param int $docPartId
     * @param int $width
     * @param array|\PhpOffice\PhpWord\Style\Cell $style
     */
    public function __construct($docPart, $docPartId, $width = null, $style = null)
    {
        $this->container = 'cell';
        $this->setDocPart($docPart, $docPartId);
        $this->width = $width;
        $this->cellStyle = $this->setStyle(new CellStyle(), $style, true);
    }

    /**
     * Get cell style
     *
     * @return \PhpOffice\PhpWord\Style\Cell
     */
    public function getStyle()
    {
        return $this->cellStyle;
    }

    /**
     * Get cell width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
}