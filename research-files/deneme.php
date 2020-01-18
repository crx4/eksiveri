    <?php
         
		 $str1="edit : bırakın artık şu diyarbakır cezaevi işkence muhabbetlerini , bu ülkede tek işkenceyi oradakiler görmedi , ama hep bunu bahane edenler teröre destek oldu , adam olun biraz korkak değil ... insanların saf düşüncelerini kullanarak dağa çıkartıp eline silah vermeyin . eline silah verdiğiniz kaç insan komunizmi biliyor sosyalizmi biliyor, merkantalizmi , realizmi , liberalliği veya diğer yönetim şekillerini ,bana hikaye okumayın özgürlük, insanlık hiç okumayın ... mhp ye faşist deyip kürt faşistliği yapan insanların yanında olmamı beklemeyin , faşizm her yerde faşizmdir bunu kürt yapınca komunizm veya halkların demokratik kardeşliği olmuyor. ben yukarıda insan diyorum adam babama bok yedirdiler diyor , hayır babana bok yedirmemişler o gençleri gaza getirip cahil insanların duygularını kullanarak eline silah vermekle bok yemişler, öyle bir bok yemişler ki karşısındaki askeri polisi insan olarak görmekten vazgeçip keyifle döşediği mayın videolarını çekmişler , sonrada elinde bomba olan , sivil insanlara saldırmaya hazırlanan sıçmıkları savunmaya başlamışlar... lan tezatlık sende buna laf ediyorsan git diğer ana kuzusunada üzül bunada sitem et...";
		 $str2="sonuç ne olursa olsun bir insanın öldürülmesi hoş değil arkadaşlar yazacam bir gülme alıyor.kedi gibi gezinirlerken çat çat gidiyolar,götünden vurulan";
		 $str=$str2;
		 
		 
		if(!(strlen($str)<=200)){
			 $str3 = substr($str, 0, 200);
			 $str3 .= "<span  class='collapse out' id='entry'>";
			 $str3 .= substr($str, 200, strlen($str));
			 $str3 .= "</span>";
		}else
			$str3 = $str;
		echo $str3;
		 
		 // print date_diff(date_create("2013-03-15 23:15:42"),date_create(date("Y-m-d H:i:s")))->format("%d gn %H sa %i dk");
    ?>