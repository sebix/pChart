<?php

/**
 *    pChart - a PHP class to build charts!
 *
 *    http://pchart.sourceforge.net
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 1,2,3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Color is an immutable class, so all mutator methods return a new
 * Color instance rather than modifying this instance.
 *
 * The immutability is in practice undermined by the fact that the RGB
 * components are public. This is a transitional detail that should
 * eventually be done away with.
 */
class Color {
	public function __construct($red, $green, $blue) {
		if ($red < 0 || $red > 255) {
			throw new InvalidArgumentException("Invalid Red component");
		}

		if ($green < 0 || $green > 255) {
			throw new InvalidArgumentException("Invalid Green component");
		}

		if ($blue < 0 || $blue > 255) {
			throw new InvalidArgumentException("Invalid Blue component");
		}

		$this->r = $red;
		$this->g = $green;
		$this->b = $blue;
	}

	/**
	 * Return a new color formed by adding the specified increment to
	 * the R, G and B values
	 */
	public function addRGBIncrement($increment) {
		$incremented = new Color($this->r, $this->g, $this->b);

		$incremented->r = $this->truncateColorComponentRange($incremented->r + $increment);
		$incremented->g = $this->truncateColorComponentRange($incremented->g + $increment);
		$incremented->b = $this->truncateColorComponentRange($incremented->b + $increment);

		return $incremented;
	}

	private function truncateColorComponentRange($input) {
		if ($input > 255) {
			return 255;
		}
		elseif ($input < 0) {
			return 0;
		}
		else {
			return $input;
		}
	}

	public $r;
	public $g;
	public $b;
}