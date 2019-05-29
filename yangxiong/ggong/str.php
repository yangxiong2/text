<?php
	function mysubstr($string,$length,$apped=false)
	{
		if(strlen($string) <= $length)
		{
			return $string;
		}
		else
		{
			$i=0;
			while($i<$length)
			{
				$stringTMP=substr($string,$i,1);
				if(ord($stringTMP) >=224)
				{
					$stringTMP=substr($string,$i,3);
					$i=$i+3;
				}
				elseif(ord($stringTMP)>=192)
				{
					$stringTMP=substr($string,$i,2);
					$i=$i+2;
				}
				else
				{
					$i=$i+1;
				}
				$stringLast[]=$stringTMP;
			}
			$stringLast=implode("",$stringLast);
			if($apped)
			{
				$stringLast.="...";
			}
			return $stringLast;
		}
	}
?>