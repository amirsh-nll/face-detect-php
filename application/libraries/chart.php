<?php

	/**
	* Class Name : Chart
	* Author : A.shokri
	* Date : 2018/04/29
	*/

defined('BASEPATH') or exit('No direct script access allowed');

class chart {
	public function draw_chart($number1, $number2, $number3, $name1, $name2, $name3)
	{
		$max 				= max($number1, $number2, $number3);
		$min 				= min($number1, $number2, $number3);
		$number 	 		= 0;
		$number1_capacity 	= 0;
		$number2_capacity 	= 0;
		$number3_capacity 	= 0;
		$number_up			= $max/5;
		$row				= array('', '', '', '', '', '', '', '', '');
		$chart_number		= array(0, 0, 0, 0, 0, 0, 0, 0, 0);

		for($i=0;$i<=7;$i++)
		{
			if($number1 >= $number)
			{
				$number1_capacity = $number1_capacity + 1;
			}
			if($number2 >= $number)
			{
				$number2_capacity = $number2_capacity + 1;
			}
			if($number3 >= $number)
			{
				$number3_capacity = $number3_capacity + 1;
			}

			if($max < $number)
			{
				if($chart_number[$i-1] != $max)
				{
					$chart_number[$i] = $max;
					$chart_number[$i+1] = $max + $number_up;
				}
				else
				{
					$chart_number[$i] = $max + $number_up;
				}
				break;
			}
			else
			{
				$chart_number[$i]	= $number;
			}

			$number = $number + $number_up;
		}

		$table = '<table width="100%" class="chart" cellspacing="0" cellpadding="0">';

		for($i=0;$i<=7;$i++)
		{
			$row[$i] = $row[$i] . '<tr>';
			if($number1_capacity != 0)
			{
				if($number1_capacity!=1)
				{
					$row[$i] = $row[$i] . '<td><p class="bar1">&nbsp;</p></td>';
				}
				else
				{
					$row[$i] = $row[$i] . '<td><p class="bar1">&nbsp;<small>' . $this->tr_num($number1) . '</small></p></td>';
				}
				$number1_capacity = $number1_capacity - 1;
			}
			else
			{
				$row[$i] = $row[$i] . '<td></td>';
			}

			if($number2_capacity != 0)
			{
				if($number2_capacity!=1)
				{
					$row[$i] = $row[$i] . '<td><p class="bar2">&nbsp;</p></td>';
				}
				else
				{
					$row[$i] = $row[$i] . '<td><p class="bar2">&nbsp;<small>' . $this->tr_num($number2) . '</small></p></td>';
				}
				$number2_capacity = $number2_capacity - 1;
			}
			else
			{
				$row[$i] = $row[$i] . '<td></td>';
			}

			if($number3_capacity != 0)
			{
				if($number3_capacity!=1)
				{
					$row[$i] = $row[$i] . '<td><p class="bar3">&nbsp;</p></td>';
				}
				else
				{
					$row[$i] = $row[$i] . '<td><p class="bar3">&nbsp;<small>' . $this->tr_num($number3) . '</small></p></td>';
				}
				$number3_capacity = $number3_capacity - 1;
			}
			else
			{
				$row[$i] = $row[$i] . '<td></td>';
			}

			$row[$i] = $row[$i] . '<td><small>' . $this->tr_num(round($chart_number[$i])) . '</small></td></tr>';
		}

		for($i=6;$i>=0;$i--)
		{
			$table = $table . $row[$i];
		}

		$table = $table . '<tr><td><small>' . $name1 . '</small></td><td><small>' . $name2 . '</small></td><td><small>' . $name3 . '</small></td><td><small>نمودار</small></td></tr></table>';
		
		return $table;
	}

	public function tr_num($str,$mod='fa',$mf='٫')
	{
		$num_a=array('0','1','2','3','4','5','6','7','8','9','.');
		$key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
		return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
	}
}