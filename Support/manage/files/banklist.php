<?php
session_start();
$bank = $_SESSION['bank_name'];
      if(preg_match('/WELLS/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="120" src="./../assets/img/bank/wellsfargo.png">';
      }
      elseif(preg_match('/ANZ/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/anz.png">';
      }
      elseif(preg_match('/HSBC/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="150" src="./../assets/img/bank/hsbc.png">';
      }
      elseif(preg_match('/CIBC/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="65" src="./../assets/img/bank/cibc.png">';
      }
      elseif(preg_match('/RBC/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/rbc.png">';
      }
      elseif(preg_match('/BARCLAYS/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/barclays.png">';
      }
      elseif(preg_match('/CITIBANK/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/citibank.png">';
      }
      elseif($bank == "CANADIAN IMPERIAL BANK OF COMMERCE") {
      echo '<img style="position:absolute margin-top: 1px;" width="65" src="./../assets/img/bank/cibc.png">';
      }
      elseif($bank == "CAPITAL ONE") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/capitalone.png">';
      }
      elseif($bank == "CAPITAL ONE BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/capitalone.png">';
      }
      elseif($bank == "LLOYDS TSB BANK PLC") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/llyods-tsb.png">';
      }
      elseif($bank == "BANK OF IRELAND") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bor.png">';
      }
      elseif($bank == "HDFC") {
      echo '<img style="position:absolute margin-top: 1px;" width="195" src="./../assets/img/bank/hdfc.png">';
      }
      elseif($bank == "SCOTIABANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/scotiabank.png">';
      }
      elseif($bank == "JPMORGAN CHASE BANK, N.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/jpmorganchase.png">';
      }
      elseif($bank == "JPMORGANCHASE") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/jpmorganchase.png">';
      }
      elseif(preg_match('/SANTANDER/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/santander.png">';
      }
      elseif($bank == "BANCO SANTANDER, S.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/santander.png">';
      }
      elseif($bank == "SANTANDER DIREKT BANK AG") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/santander.png">';
      }
      elseif($bank == "TD CANADA TRUST BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/canadatrust.png">';
      }
      elseif($bank == "BANK OF MONTREAL") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/bmo.png">';
      }
      elseif($bank == "CHASE") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/chase.png">';
      }
      elseif($bank == "STATE EMPLOYEES' CREDIT UNION") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/secu.png">';
      }
      elseif($bank == "NAVY FEDERAL CREDIT UNION") {
      echo '<img style="position:absolute margin-top: 1px;" width="90" src="./../assets/img/bank/nfcu.png">';
      }
      elseif($bank == "TD BANK, N.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/tdbank.png">';
      }
      elseif($bank == "TDBANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/tdbank.png">';
      }
      elseif($bank == "ARVEST BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/arvest.png">';
      }
      elseif($bank == "CITIZENS") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/rbscitizens.png">';
      }
      elseif($bank == "FIFTH THIRD BANK, THE") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/53.png">';
      }
      elseif(preg_match('/COMMONWEALTH/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/commonwealth.png">';
      }
      elseif(preg_match('/WESTPAC/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/westpac.png">';
      }
      elseif($bank == "NATIONAL AUSTRALIA BANK, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/nab.png">';
      }
      elseif($bank == "NATIONAL AUSTRALIA BANK LIMITED") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/nab.png">';
      }
      elseif(preg_match('/NATIONAL AUSTRALIA BANK/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/nab.png">';
      }
      elseif($bank == "DBS") {
      echo '<img style="position:absolute margin-top: 1px;" width="130" src="./../assets/img/bank/dbs.png">';
      }
      elseif($bank == "POSB") {
      echo '<img style="position:absolute margin-top: 1px;" width="130" src="./../assets/img/bank/posb.png">';
      }
      elseif($bank == "OCBC") {
      echo '<img style="position:absolute margin-top: 1px;" width="150" src="./../assets/img/bank/ocbc.png">';
      }
      elseif($bank == "BANK OF CHINA") {
      echo '<img style="position:absolute margin-top: 1px;" width="150" src="./../assets/img/bank/boc.png">';
      }
      elseif($bank == "BANK OF EAST ASIA, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/bea.png">';
      }
      elseif($bank == "MITSUBISHI UFJ FINANCIAL GROUP, INC.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/mufg.png">';
      }
      elseif($bank == "SUMITOMO MITSUI CARD COMPANY, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="210" src="./../assets/img/bank/smfg.png">';
      }
      elseif($bank == "RAKUTEN KC CO., LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/rakuten.png">';
      }
      elseif($bank == "SONY FINANCE INTERNATIONAL") {
      echo '<img style="position:absolute margin-top: 1px;" width="150" src="./../assets/img/bank/sonybank.png">';
      }
      elseif($bank == "DEUTSCHE BANK S.P.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="165" src="./../assets/img/bank/deutsche.png">';
      }
      elseif($bank == "BNP PARIBAS") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bnp.png">';
      }
      elseif($bank == "CREDIT AGRICOLE, S.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="185" src="./../assets/img/bank/creditagri.png">';
      }
      elseif($bank == "CREDIT SUISSE") {
      echo '<img style="position:absolute margin-top: 1px;" width="185" src="./../assets/img/bank/creditsuis.png">';
      }
      elseif($bank == "ROYAL BANK OF SCOTLAND") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/rbscotland.png">';
      }
      elseif($bank == "SOCIETE GENERALE") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/socgen.png">';
      }
      elseif($bank == "UBS AG") {
      echo '<img style="position:absolute margin-top: 1px;" width="120" src="./../assets/img/bank/ubs.png">';
      }
      elseif(preg_match('/BBVA/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="120" src="./../assets/img/bank/bbva.png">';
      }
      elseif($bank == "BANCO DO BRASIL S.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="230" src="./../assets/img/bank/bancobrasil.png">';
      }
      elseif($bank == "BANCO DO BRASIL, S.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="230" src="./../assets/img/bank/bancobrasil.png">';
      }
      elseif($bank == "BANCO DO BRASIL") {
      echo '<img style="position:absolute margin-top: 1px;" width="230" src="./../assets/img/bank/bancobrasil.png">';
      }
      elseif($bank == "BANGKOK BANK PUBLIC CO., LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/bangkokbank.png">';
      }
      elseif($bank == "BANK OF COMMUNICATIONS") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bocom.png">';
      }
      elseif($bank == "STATE BANK OF INDIA") {
      echo '<img style="position:absolute margin-top: 1px;" width="165" src="./../assets/img/bank/bankofindia.png">';
      }
      elseif($bank == "CHINA CONSTRUCTION BANK CORPORATION") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/ccb.png">';
      }
      elseif($bank == "CHINATRUST COMMERCIAL BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="155" src="./../assets/img/bank/ctbc.png">';
      }
      elseif($bank == "COMMERZBANK AG") {
      echo '<img style="position:absolute margin-top: 1px;" width="220" src="./../assets/img/bank/commerz.png">';
      }
      elseif($bank == "ING BANK, N.V.") {
      echo '<img style="position:absolute margin-top: 1px;" width="220" src="./../assets/img/bank/ing.png">';
      }
      elseif($bank == "BB&T") {
      echo '<img style="position:absolute margin-top: 1px;" width="135" src="./../assets/img/bank/bbt.png">';
      }
      elseif($bank == "BRANCH BANKING AND TRUST COMPANY") {
      echo '<img style="position:absolute margin-top: 1px;" width="135" src="./../assets/img/bank/bbt.png">';
      }
      elseif($bank == "CITI") {
      echo '<img style="position:absolute margin-top: 1px;" width="90" src="./../assets/img/bank/citi.png">';
      }
      elseif($bank == "CITIFINANCIAL EUROPE PLC") {
      echo '<img style="position:absolute margin-top: 1px;" width="90" src="./../assets/img/bank/citi.png">';
      }
      elseif($bank == "CITIFINANCIAL EUROPE") {
      echo '<img style="position:absolute margin-top: 1px;" width="90" src="./../assets/img/bank/citi.png">';
      }
      elseif($bank == "BANK OF AMERICA") {
      echo '<img style="position:absolute margin-top: 1px;" width="200" src="./../assets/img/bank/boa.png">';
      }
      elseif($bank == "BANK OF AMERICA, N.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="200" src="./../assets/img/bank/boa.png">';
      }
      elseif($bank == "BANK OF AMERICA, NATIONAL ASSOCIATION") {
      echo '<img style="position:absolute margin-top: 1px;" width="200" src="./../assets/img/bank/boa.png">';
      }
      elseif($bank == "TCF NATIONAL BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/tcf.png">';
      }
      elseif($bank == "SOVEREIGN BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="200" src="./../assets/img/bank/sovereign.png">';
      }
      elseif($bank == "BANKWEST") {
      echo '<img style="position:absolute margin-top: 1px;" width="200" src="./../assets/img/bank/bankwest.png">';
      }
      elseif(preg_match('/ITAU/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="50" src="./../assets/img/bank/itau.png">';
      }
      elseif($bank == "COMERICA BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/comerica.png">';
      }
      elseif($bank == "GE MONEY") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/gemoney.png">';
      }
      elseif($bank == "GE CAPITAL FINANCE AUSTRALIA") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/gecapital.png">';
      }
      elseif($bank == "GE CAPITAL RETAIL") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/gecapital.png">';
      }
      elseif($bank == "WOODFOREST NATIONAL") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/woodforest.png">';
      }
      elseif(preg_match('/USBANK/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/usbank.png">';
      }
      elseif($bank == "U.S. BANK NATIONAL ASSOCIATION, ND") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/usbank.png">';
      }
      elseif($bank == "U.S. BANK N.A. ND") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/usbank.png">';
      }
      elseif($bank == "USAA") {
      echo '<img style="position:absolute margin-top: 1px;" width="60" src="./../assets/img/bank/usaa.png">';
      }
      elseif($bank == "DEUTSCHE APOTHEKER-UND AERZTEBANK EG") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/apotheker.png">';
      }
      elseif($bank == "SANTANDER CONSUMER BANK AG") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/santander-consumer.png">';
      }
      elseif($bank == "LANDESBANK BERLIN") {
      echo '<img style="position:absolute margin-top: 1px;" width="130" src="./../assets/img/bank/lbb.png">';
      }
      elseif($bank == "ZAO RAIFFEISENBANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="150" src="./../assets/img/bank/zaoraif.png">';
      }
      elseif($bank == "OLDENBURGISCHE LANDESBANK AG") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/olb.png">';
      }
      elseif($bank == "BANK ISLAM") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/bankislam.png">';
      }
      elseif($bank == "PEOPLES BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/peoplesbank.png">';
      }
      elseif($bank == "BANK AUSTRIA") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/bankaustria.png">';
      }
      elseif($bank == "INDUE, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/indue.png">';
      }
      elseif($bank == "TEACHERS CREDIT UNION") {
      echo '<img style="position:absolute margin-top: 1px;" width="210" src="./../assets/img/bank/tcu.png">';
      }
      elseif($bank == "HERITAGE BUILDING SOCIETY, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/heritage.png">';
      }
      elseif($bank == "BENDIGO BANK LIMITED") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bendigo.png">';
      }
      elseif($bank == "CUSCAL, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/cuscal.png">';
      }
      elseif($bank == "CREDIT UNION SERVICES CORPORATION (AUSTRALIA) LIMITED") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/cuscal.png">';
      }
      elseif($bank == "EURO KARTENSYSTEME GMBH") {
      echo '<img style="position:absolute margin-top: 1px;" width="170" src="./../assets/img/bank/eurokarten.png">';
      }
      elseif($bank == "VERBAND DER SPARDA BANKEN E.V.") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/verband.png">';
      }
      elseif($bank == "STANDARD CHARTERED BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="120" src="./../assets/img/bank/standar-chartered.png">';
      }
      elseif($bank == "FIDELITY") {
      echo '<img style="position:absolute margin-top: 1px;" width="140" src="./../assets/img/bank/fidelity.png">';
      }
      elseif($bank == "FIRST TENNESSEE BANK N.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/first-ten.png">';
      }
      elseif($bank == "CHOICE") {
      echo '<img style="position:absolute margin-top: 1px;" width="120" src="./../assets/img/bank/choice.png">';
      }
      elseif($bank == "METABANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/meta.png">';
      }
      elseif($bank == "NORTHWEST") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/northwest.png">';
      }
      elseif($bank == "NB&T") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/nbt.png">';
      }
      elseif($bank == "PNC BANK N.A.") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/pnc.png">';
      }
      elseif($bank == "TOYOTA") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/toyota.png">';
      }
      elseif($bank == "UNITED NATIONS F.C.U.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/unfcu.png">';
      }
      elseif($bank == "DORAL BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/doral.png">';
      }
      elseif($bank == "CANADIAN TIRE") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/canadiantire.png">';
      }
      elseif($bank == "BANK OF HAWAII") {
      echo '<img style="position:absolute margin-top: 1px;" width="230" src="./../assets/img/bank/boh.png">';
      }
      elseif($bank == "ASB BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/asb.png">';
      }
      elseif($bank == "BANK OF NEW ZEALAND") {
      echo '<img style="position:absolute margin-top: 1px;" width="100" src="./../assets/img/bank/bnz.png">';
      }
      elseif($bank == "HEARTLAND BANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/heartland.png">';
      }
      elseif($bank == "KIWIBANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="50" src="./../assets/img/bank/kiwi.png">';
      }
      elseif($bank == "MAYBANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/maybank.png">';
      }
      elseif($bank == "MALAYAN BANKING BERHAD") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/maybank.png">';
      }
      elseif($bank == "CIMB") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/cimb.png">';
      }
      elseif($bank == "PUBLIC BANK BERHAD") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/public.png">';
      }
      elseif($bank == "AMBANK") {
      echo '<img style="position:absolute margin-top: 1px;" width="80" src="./../assets/img/bank/ambank.png">';
      }
      elseif($bank == "UNITED OVERSEAS BANK, LTD.") {
      echo '<img style="position:absolute margin-top: 1px;" width="160" src="./../assets/img/bank/uob.png">';
      }
      elseif($bank == "NBAD") {
      echo '<img style="position:absolute margin-top: 1px;" width="80" src="./../assets/img/bank/nbad.png">';
      }
      elseif($bank == "NATIONAL BANK OF ABU DHABI") {
      echo '<img style="position:absolute margin-top: 1px;" width="80" src="./../assets/img/bank/nbad.png">';
      }
      elseif($bank == "BANK OF NOVA SCOTIA") {
      echo '<img style="position:absolute margin-top: 1px;" width="180" src="./../assets/img/bank/scotiabank.png">';
      }
      elseif($bank == "BANK OF NEW YORK MELLON") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bny.png">';
      }
      elseif($bank == "LOS ANGELES POLICE F.C.U.") {
      echo '<img style="position:absolute margin-top: 1px;" width="87" src="./../assets/img/bank/lapcu.png">';
      }
      elseif($bank == "BANCOLOMBIA") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bancolombia.png">';
      }
      elseif($bank == "BANCO AV VILLAS") {
      echo '<img style="position:absolute margin-top: 1px;" width="210" src="./../assets/img/bank/bancoav.png">';
      }
      elseif(preg_match('/BANCAFE/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="130" src="./../assets/img/bank/bancafe.png">';
      }
      elseif($bank == "BANCO DE BOGOTA") {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bancobogota.png">';
      }
      elseif(preg_match('/DAVIVIENDA/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/davidienda.png">';
      }
      elseif(preg_match('/COLPATRIA/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/colpatria.png">';
      }
      elseif(preg_match('/BCSC/',$bank)) {
      echo '<img style="position:absolute margin-top: 1px;" width="190" src="./../assets/img/bank/bcsc.png">';
      }else{
            echo "<br></br>";
      }
      ?>