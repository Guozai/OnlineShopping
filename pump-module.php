<?php
  session_start();
  include_once('pumps-page-tools.php');
  
  top_part('Pumps Page');
?>
  
      <h1>Gas Pumps</h1>
      <img SRC="titl_gaspump.gif" ALT="Gas Pumps" BORDER=0 height=54 width=244>
  	  <img src="../cart.gif" width="35" height="20" alt="Add to cart" > 
      <P>Click on a shopping cart to add to your order</P>  
      <P>Free shipping quote estimates</P> 

<?php mid_part(); ?>

      <sections>
       
    	<h1>The Restoration Process</h1>
    	<p>Bob's Garage restored vintage gas pumps are completely disassembled and motor and pump removed.  In most cases, sandblasting/rust removal is required and a heavy epoxy primer 
        is applied when rust  is present. Each panel is then painted with multiple coats of automotive acrylic enamel paint mixed from the original paint codes. </P>   <!css>
        <br/>
        <p>The meter is cleaned and reworked, lights rewired, all sheet metal trim, signs and decals are attached, and new glass and gaskets installed.  All components are then mounted in
        the frame and the panels reattached and finally the proper globe affixed to the top.  We spare no expense and pay strict attention to detail to ensure a first quality antique 
        restoration that will last for years and appreciate in value. (scroll down to view pumps) </p>
        <br/>
        <p><b>Do you have an old gas pump that you need to have restored? </b> Send it to us and we'll send it back to you looking like new.<strong>Call Bob 678 494-2996</strong></P> <!css>
        <br/>
        <br/>
        <p><b>We provide our restored antique electric gas pumps to the Veeder Root Company!</b></p>
        <br/>
        <p>Other satisfied customers include Disney, Saks Fifth Ave, priceline.com., TransMontaigne, Mobil Oil, Speed Television Network, Johns Hopkins University, and others.</p>
        <p><string>Note:</string>Veeder Root invented the electric gas pump computer in the late 1930's that allowed the calculation of sale based on gallons delivered and current price per gallon. </p>
        <img src="fix_before.jpg" alt="BEFORE" border="1">
        <img src="fix_after.jpg" alt="AFTER" border="1">
        <hr/>
      </sections>
    <!--------------------------------------------------------------------------------------------------------------------------------------- -->
    
        <br/>
        <br/>
    
    <!-- ========================= Christmas ===================================-->

    <!-- <img src="../tree.gif" width="89" height="134" allign="left">
    <!P> Christmas is on it's way and you don't want <br/>to get caught short this year! Please order early to insure a timely delivery.</P>

    <!-- ========================= End Christmas ===================================-->
       <sections>
        <h2> More Antique Pumps</h2>
        <form action="pumps.php" method="post">
        
<?php include_once('pump-module.php');

pump_module();
//var_dump($_POST);

?>
    </sections>
    <sections>
        <articles>
          <p>Name:</p>
          <input type="text" id="name1" name="name"/>
          <p>Email:</P>
          <input type="email" id="email1" name="email"/>
          <P> Address:</p>
          <textarea name="address" id="address1" ></textarea>
          <p>Please Input an Phone No:</p>
          <input type='text' id='phoneno1' name='phoneno' pattern="[+ 0-9x()]+" 
                oninput="validateNANP()" onblur="removeilliegalchar()" />
          <img id="img1" src="../Others/NANP.png" width="20" height="20" /><br><br> 
          <input type="checkbox" id="checkbox1" name="remember-me" value="remember-me-chekbox" />Remember-Me
          <br><br>
          <button tybe="button" value="submit">Checkout</button>
          <br><br><br>
          </articles>
        </form>
      </sections>
    </Main>
  
    <aside>
	    <p><b> Sorry, but I have no idea what that gas pump or soda machine that you have in the garage or that you're neighbor is trying to sell you is worth.  It's impossible for me to inspect, look at, 
        visualize or otherwise peruse these  pieces from thousands of miles away in order to give you an accurate valuation.  Sorry, it's just impossible. I do appraisals either hands on or with lots 
        of high quality digital pictures.  Call me for a price</b></p>
     
        <p>Bob's Easy Payment Terms: 50% deposit buys the gas pump and begins the build (restoration).  The balance is due when it's complete.
        Build time varies.  Credit cards preferred but we also take  money orders, bank wire transfers and cash. </p>
    
        <p><string>ALWAYS BUYING OLD GAS PUMPS AND SODA MACHINES</string></p>
    </aside>
  
    <footer>
    	<h1><u id="myU">Custom pump work </u><a>doneon request.</h1>
        <p><b>Good selection of unrestored pumps available from $550 up. 
        <br/>Pump type limited to stock on hand. Call Bob for availability.
        <br/>We also do gas pump and soda machine restoration estimates. </b></p>
        <br>
        <br>
        
        <img src="../cc1.gif" width="207" height="35" alt="Credit Cards" border="0">
        <p>$10 service charge on orders under $50</font></center></P>
        <br/>
        <br/>
 
        <p>Items shipped from Bob's Garage are packed with the utmost care, however, delivery to shipper constitutes delivery to purchaser.All claims for missing or damaged merchandise must be filed with the carrier within five days of receipt of goods.</p>
        <br/>
        <br/>
        <br/>
        <p><b>For additional pricing and product information<u id="myU">email Bob</u>directly.To place an order or for product questions call: 678-494-2996</b></p>

        <p>Page designed and maintained<string> RCS</string><address>Copyright@ Bob's Garage</address></P>

<?php end_part();
include_once('debug-lite.php');
?>