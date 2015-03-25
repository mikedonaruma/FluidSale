<?php 
    session_start(); 
    require("includes/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("menu", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="menu"; 
              
        } 
          
    }else{ 
          
        $_page="menu"; 
          
    }
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products 
                WHERE id_product={$id}"; 
            $query_s=mysql_query($sql_s); 
            if(mysql_num_rows($query_s)!=0){ 
                $row_s=mysql_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['id_product']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
?>
<!DOCTYPE html>

<html>
<head>
    <title>FluidSale Point of Sale System</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header><img src="fluidSaleLogo.png"></header>
        <section>
        <article class="tabs">
<?php require($_page.".php"); ?>
	<section id="tab1">
		<h2><a href="#tab1">Smoothies</a></h2>
        <p> 
            <button type="button" class="action-button shadow animate blue">Blueberry</button>
            <button type="button" class="action-button shadow animate red">Strawberry</button>
            <button type="button" class="action-button shadow animate green">Kale</button>
            <button type="button" class="action-button shadow animate yellow">Banana</button>
            <button type="button" class="action-button shadow animate red">Cherry</button>
        </p>
        </section>
	
	<section id="tab2">
		<h2><a href="#tab2">Sandwiches</a></h2>
		
	</section>
	
	<section id="tab3">
		<h2><a href="#tab3">Drinks</a></h2>
		
	</section>

</article>
    </section>
    <aside>
        <h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM MenuItem WHERE miID IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysql_query($sql); 
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_product']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
    </section>    
    <hr /> 
        <a href="index.php?page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          
    } 
  
?>
    </aside>



</body>
</html>
