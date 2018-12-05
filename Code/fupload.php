<?php
		session_start();
		include_once 'dbconnect.php';
		if(isset($_POST['close'])){
			header("Location: profile.php");
		}
		else{
			$exts = array('aspx','json','jsp','do','htm','ser','jad','php','cfm','xml','js','pod','asp','atomsvc','pou','rdf','jsf','abs','pl','asm','srz','luac','cod','lib','arxml','bas','ejs','fs','hbs','ss','s','cms','pyc','vcxproj','jse','smali','lxk','xla','src','pdb','cs','ipb','ave','vls','mst','rcc','sax','scr','dtd','axd','mrl','xsl','ino','spr','xsd','cgi','isa','ws','dvb','rss','xlm','v4e','rss','nupkg','prg','form','bat','mrc','asi','jdp','fmb','graphml','gcode','aia','atp','mzp','py','o','scs','cpp','mm','java','gypi','idb','txml','vip','c','tra','rc','action','vlx','asta','pyo','lua','gml','prl','rfs','cpb','sh','rbf','scb','phtml','gp','bp','sln','vbp','wbf','bdt','mac','rpy','eaf','mc','mwp','gnt','h','swift','e','styl','as','cxx','liquid','dep','aps','fas','vbs','lss','cmake','vbe','resx','dpk','csb','pdml','txx','dbg','jsa','sxs','sasf','csx','pm','au3','r','wml','stm','cc','cls','ins','dwp','jsc','rpg','arb','inc','bml','eld','sct','sm','wbt','tcz','gbl','html5','cmd','csproj','tpl','dlg','rbt','xcp','qry','tpm','lsp','mfa','pag','php3','ebc','ptx','csc','cob','dwt','pyt','rb','lap','wsdl','textile','sfx','a5r','dbp','x','pmp','ipr','pbl','fwx','vbw','cbl','phl','pas','mom','dbmdl','lol','plx','wdl','ppam','cgx','lst','vb','vd','lmp','scpt','isu','thtml','bcp','mrd','perl','f','dtx','ipf','hx','luca','wpk','uvproj','ptl','qvs','vba','xjb','appxupload','ti','svn-base','mak','vcproj','bsc','dsd','mo','ksh','pyw','bxml','gcl','irc','dbml','mlv','dqy','ssi','wsf','pbxproj','tcl','bal','trt','hkp','sal','vbi','htc','dob','ats','p','seam','loc','pxml','rptproj','pli','pkb','dpr','dsb','bb','scss','vbproj','rml','nbk','nvi','lmv','ash','dso','jl','jks','mw','run','cba','clm','vps','ary','brml','msha','mdp','tmh','rdf','jsx','ptxml','sdl','wmw','fxl','dcr','cbp','bcc','bmo','bsv','obr','less','ctl','gss','ascx','rpyc','odc','wiki','l','bpr','smm','sqlproj','axs','dsr','ppa','rpo','rc2','jsonp','obj','din','xme','ml','arq','cla','jml','myapp','jsdtscope','gyp','cp','rh','lpx','datasource','ctp','script','a2w','ulp','nt','bxl','gs','mg','zpd','xslt','mhl','psm1','pch','jacl','asz','pym','rws','m','acu','ssq','zero','akt','pyx','wxs','coffee','ncb','mkb','hs','tru','opv','sbr','sca','mfl','xul','matlab','master','sami','pbl','tea','slim','m51','agc','asc','mec','enml','ino','gch','dfb','jade','ips','vbx','kst','rgs','cspkg','brs','ncx','nse','nas','ifp','xtx','wfs','cx','j','mk','ccs','ps1','vrp','lnp','cml','exp','c#','idl','nsi','asmx','apb','tdo','mf','fdt','s5d','pjt','jardesc','mvba','tgml','odl','moc','wxi','cpz','fsx','bzs','ocb','agi','tec','jav','txl','mscr','pun','amw','f95','dgml','diff','dfd','dpd','airi','vdproj','xsc','wxl','rbw','kmt','sas','ksc','io','vcp','cg','resources','param','bgm','hlsl','vssscc','targets','xn','sl','gsc','devpak','phps','qs','owl','xaml','hdf','pri','nbin','poc','tk','s4e','scm','factorypath','clw','s43','pickle','rob','php2','htr','ebx','msil','uix','swt','classpath','vup','lml','tsq','awd','f90','lds','ig','pbi','vap','pdo','c++','frt','fcg','aar','dfn','xcl','dhtml','re','twig','for','hc','ebm','bsh','csp','pro','rule','ahk','wsdd','bash','jcs','zsc','drc','html'); 


			$target_dir = "uploads/";
	        $u = $_SESSION["usr_name"];
	        if(isset($_FILES["fileToUpload"]["name"])){
	          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	          $n = basename($_FILES["fileToUpload"]["name"]);
	          $des = $_POST['des'];
	          $tmp_name = $_FILES["fileToUpload"]["tmp_name"]; 
	          $extf = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
	          $ok = 0;
	          foreach ($exts as  $v) {
	          	if($v==$extf){
	          		$ok=1;
	          	}
	          }
	        
	          if(!empty($n) && $ok==1){
	            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	            $sql2 = "insert into upload values('$u','$n','$des')";
	            mysql_query($sql2);
	            mysql_query("COMMIT", $con);
	            header("Location: profile.php");
	          }
	          else{
	          	header("Location: profile.php");
	          } 
	        }
	        
		}
        
       

        ?> 
