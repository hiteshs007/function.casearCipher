<?php 
  
//function for casearCiphering of a text 
function cipher($str, $shift)
    {
      $string=strtolower($str); 
    if(is_array($string)==true)
     {
      throw new Exception("Can't use array as string");     
     }
    if($shift>0)
     {
      $alpha=array('a'=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5','f'=>'6','g'=>'7','h'=>'8','i'=>'9','j'=>'10','k'=>'11','l'=>'12','m'=>'13','n'=>'14','o'=>'15','p'=>'16','q'=>'17','r'=>'18','s'=>'19','t'=>'20','u'=>'21','v'=>'22','w'=>'23','x'=>'24','y'=>'25','z'=>'26');
      $alpha_num=array_keys($alpha);
      $match_num=array(); 
      $nums=array_flip($alpha);     
      $encoded=array();
      
    if($shift>26)
     {
        $shift=$shift%26;
     }
    for ($i=0; $i <strlen($string) ; $i++)
     { 
        for ($j=0; $j <26 ; $j++)
            {
             $match=preg_match("/".$alpha_num[$j]."/",$string[$i]);
             if($match==1)
               {
              
              $match_num[$i]=$alpha[$alpha_num[$j]];
              $match_num[$i]+=$shift;
                     if($match_num[$i]>26)
                     {
                      $match_num[$i]=$match_num[$i]-26;
                     }
              $encoded[$i]=$nums[$match_num[$i]];

               }
              
             

             } 
        $matchtwo=preg_match('/[^a-z]/',$string[$i]);
       if($matchtwo==1)
       {
        
        $encoded[$i]=$string[$i];
       }

  }
    $enc=implode('',$encoded);
    return $enc;   


     }
     else
     {
      return null;
     }   

}