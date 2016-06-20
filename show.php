<?php


function useruploads($p,$userid)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =5;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>File ID</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Name</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Type</a></th><th class='table-header-repeat line-left'><a href=''>Security  Type</a></th><th class='table-header-repeat line-left'><a href=''>File size</a></th><th class='table-header-repeat line-left'><a href=''>Date</a></th><th class='table-header-options line-left'><a href=''>Options</a></th></tr>";
		$query1 = "select * from ipc_files  where userid='$userid' order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 

$pieces = explode(".", $row1[6]);

          if ($row1[12] == 1)
		   {
		   $rowColor="Low";
		   }
		   elseif($row1[12] == 2)
		   {
           $rowColor = "Medium";
		   	}	
			else
		   {
           $rowColor = "Strong";
		   	}	


  		   
	       $hint=$hint."<tr><td> $row1[1]</td><td>$row1[3]</td><td>$pieces[1]</td><td>$rowColor</td><td>$row1[8]</td><td><a href=''>$row1[7]</a></td><td class='options-width'><a href='fileview.php?id=$row1[1]' title='View' class='icon-3 info-tooltip'></a></td></tr>";
				
		}
				$query2   = "SELECT COUNT(id) AS numrows FROM ipc_files where userid='$userid'";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"filedetails.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"filedetails.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"filedetails.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"filedetails.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"filedetails.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}


function useruploadsall($p,$userid)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =5;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>File ID</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Name</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Type</a></th><th class='table-header-repeat line-left'><a href=''>Security  Type</a></th><th class='table-header-repeat line-left'><a href=''>File size</a></th><th class='table-header-repeat line-left'><a href=''>Date</a></th></tr>";
		$query1 = "select * from ipc_files  where status <= 2 order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 

$pieces = explode(".", $row1[6]);

          if ($row1[12] == 1)
		   {
		   $rowColor="Low";
		   }
		   elseif($row1[12] == 2)
		   {
           $rowColor = "Medium";
		   	}	
			else
		   {
           $rowColor = "Strong";
		   	}	


  		   
	       $hint=$hint."<tr><td> $row1[1]</td><td>$row1[3]</td><td>$pieces[1]</td><td>$rowColor</td><td>$row1[8]</td><td><a href=''>$row1[7]</a></td></tr>";
				
		}
				$query2   = "SELECT COUNT(id) AS numrows FROM ipc_files where userid='$userid'";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"filedetails.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"filedetails.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"filedetails.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"filedetails.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"filedetails.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}


function useruploadsv($p)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =15;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>File Owner</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Name</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Type</a></th><th class='table-header-repeat line-left'><a href=''>Verify Status</a></th><th class='table-header-repeat line-left'><a href=''>Download Status</a></th><th class='table-header-repeat line-left'><a href=''>Date</a></th><th class='table-header-options line-left'><a href=''>Options</a></th></tr>";
		$query1 = "select * from ipc_files order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 

$pieces = explode(".", $row1[6]);

          if ($row1[12] == 0)
		   {
		   $rowColor="Not verified";
		   }
		   else 
		   {
           $rowColor = "verified";
		   	}	
		   	
		   	
		   	          if ($row1[11] == 0)
		   {
		   $down="Block";
		   }
		   else 
		   {
           $down = "Allow";
		   	}

 if ($row1[11] == 0)
		   {
		   $dow="5";
		   }
		   else 
		   {
           $dow = "2";
		   	}

  		   
	       $hint=$hint."<tr><td> $row1[2]</td><td>$row1[3]</td><td>$pieces[1]</td><td>$rowColor</td><td>$down</td><td><a href=''>$row1[7]</a></td><td class='options-width'><a href='fileviewtpa.php?id=$row1[1]' title='View' class='icon-3 info-tooltip'></a><a href='approvedownload.php?id=$row1[1]' title='Approve download' class='icon-$dow info-tooltip'></a></td></tr>";
				
		}
				$query2   = "SELECT COUNT(id) AS numrows FROM ipc_files";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"fileverifytpa.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"fileverifytpa.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"fileverifytpa.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"fileverifytpa.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"fileverifytpa.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}




function cryuploadsv($p)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =15;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>File ID</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>User Name</a>	</th><th class='table-header-options line-left'><a href=''>Options</a></th></tr>";
		$query1 = "select * from ipc_crypt where status=0 order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 
 		   
	       $hint=$hint."<tr><td> $row1[1]</td><td>$row1[2]</td><td class='options-width'><a href='fileviewtpa.php?id=$row1[1]' title='View' class='icon-3 info-tooltip'></a><a href='senddownloadcry.php?id=$row1[1]' title='Send Key' class='icon-5 info-tooltip'></a></td></tr>";
				
		}
				$query2   = "SELECT COUNT(id) AS numrows from ipc_crypt where status=0";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"filedetailstpa.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"filedetailstpa.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"filedetailstpa.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"filedetailstpa.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"filedetailstpa.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}



function warning($p)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =15;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>File Owner</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Name</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>File Type</a></th><th class='table-header-repeat line-left'><a href=''>Verify Status</a></th><th class='table-header-repeat line-left'><a href=''>Download Status</a></th><th class='table-header-repeat line-left'><a href=''>Date</a></th><th class='table-header-options line-left'><a href=''>Options</a></th></tr>";
		$query1 = "select * from ipc_files where model=1 order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 
 		   
	  
$pieces = explode(".", $row1[6]);

          if ($row1[12] == 0)
		   {
		   $rowColor="Not verified";
		   }
		   else 
		   {
           $rowColor = "verified";
		   	}	
		   	
		   	
		   	          if ($row1[11] == 0)
		   {
		   $down="Block";
		   }
		   else 
		   {
           $down = "Allow";
		   	}


  		   
	       $hint=$hint."<tr><td> $row1[2]</td><td>$row1[3]</td><td>$pieces[1]</td><td>$rowColor</td><td>$down</td><td><a href=''>$row1[7]</a></td><td class='options-width'><a href='mailwarning.php?id=$row1[1]' title='Send Warning Email' class='icon-5 info-tooltip'></a></td></tr>";
				
				
		}
				$query2   = "SELECT COUNT(id) AS numrows from ipc_files where status=1 and download=1 ";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"filedetailstpa.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"filedetailstpa.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"filedetailstpa.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"filedetailstpa.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"filedetailstpa.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}






function owner($p)
{
	include "dbaseopen.php";
		$hint="";
		$rowsPerPage =15;
		$pageNum = 1;
		$post=0;
		$tit="";
		if($p!=0)
		{
			$pageNum = $p;
		}
		$offset = ($pageNum - 1) * $rowsPerPage;

		$hinthead="<div id='table-content'><table border='0' width='100%' cellpadding='0' cellspacing='0' id='product-table'><tr><th class='table-header-repeat line-left minwidth-1'><a href=''>Owner/User Name</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>Gender</a>	</th><th class='table-header-repeat line-left minwidth-1'><a href=''>Mobile Number</a></th><th class='table-header-repeat line-left'><a href=''>Email id</a></th><th class='table-header-repeat line-left'><a href=''>Joined date</a></th><th class='table-header-repeat line-left'><a href=''>Age</a></th></tr>";
		$query1 = "select * from ipc_users where id>2 order by id desc limit $offset,$rowsPerPage";
		$result1 = mysql_query($query1) or die('Error(code=101), Please report to our Tech team <br /><a 	href="/error_report/"> Report Error</a>');
		while($row1=mysql_fetch_array($result1))
				{
		 
  		   
	       $hint=$hint."<tr><td> $row1[1]</td><td>$row1[10]</td><td>$row1[9]</td><td>$row1[8]</td><td>$row1[4]</td><td><a href=''>$row1[11]</a></td></tr>";
				
		}
				$query2   = "SELECT COUNT(id) AS numrows FROM ipc_users where id>2 ";
		$result2  = mysql_query($query2) or die('Error(code=102), Please report to our Tech team <br />	    <a href="/error_report/"> Report Error</a>');
		$row2     = mysql_fetch_array($result2, MYSQL_ASSOC);
		$numrows = $row2['numrows'];
		$maxPage = ceil($numrows/$rowsPerPage);
		$self = $_SERVER['PHP_SELF'];
		$nav  = '';
	
		for($page = $pageNum; $page <= $pageNum+5; $page++)
		{
			if ($page <= $maxPage)
			{
			   if ($page == $pageNum)
			   {
				  if($page !=0)
				  {
					 $nav .= "<div id='page-info'>Page <strong><li class='current'><a href=\"\">$page</a></li></strong></div>";
				  }
			   }
			   else
			   {
				  $nav .= "<div id='page-info'><strong><li class='current'><a href=\"fileverifytpa.php?p=$page\">$page</a></li></strong></div>";
			   }
			 }
		}
	
		if ($pageNum > 1)
		{
		   $page  = $pageNum - 1;
		   $prev  = " <a href=\"ownerdetail.php?p=$page\" class='page-far-left' > </a> ";
		   $first = " <a href=\"ownerdetail.php?p=1\" class='page-left' > </a> ";
		}
		else
		{
		   $prev  = '&nbsp;';
		   $first = '&nbsp;';
		}
		if ($pageNum < $maxPage)
		{
		   $page = $pageNum + 1;
		   $next = "<a href=\"ownerdetail.php?p=$page\" class='page-right'> </a>";
		   $last = "<a href=\"ownerdetail.php?p=$maxPage\"  class='page-far-right'> </a>";
		}
		else
		{
		   $next = '&nbsp;'; 
		   $last = '&nbsp;'; 
		}
		$hintfoot1="</div><table border='0' cellpadding='0' cellspacing='0' id='paging-table'><tr><td> $first $prev  $next $last </td></tr></table>";
	
		echo $hinthead.$hint.$hintfoot1;
	include "dbaseclose.php";
}



?>