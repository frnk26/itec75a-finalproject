<?php 
  session_start();
  require_once('../createDB.php');
  require_once('../component.php');

  $database = new CreateDb("plantDb", "plantTb");

  if(isset($_POST['add'])){
    // print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");

      if(in_array($_POST['product_id'], $item_array_id)){
        echo "<script>alert('Product is already added in the cart!')</script>";
        echo "<script>window.location = 'index1.php'</script>";
      }else{
        $count = count($_SESSION['cart']);
        $item_array = array('product_id' => $_POST['product_id']);

        $_SESSION['cart'][$count] = $item_array;
        echo "<script>alert('Purchase Success!')</script>";
        echo "<script>window.location = 'index1.php'</script>";
      }
    }else{
      $item_array = array('product_id' => $_POST['product_id']);


      //create new session variable

      $_SESSION['cart'][0] = $item_array;
      echo "<script>alert('Purchase Success!')</script>";
      echo "<script>window.location = 'index1.php'</script>";
    }
  }

  if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
      foreach($_SESSION['cart'] as $key => $value){
        if($value['product_id'] == $_GET['id']){
          unset($_SESSION['cart'][$key]);
          echo "<script>alert('Product has been Removed!');</script>";
          echo "<script>window.location = 'index1.php'</script>";
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Vite App</title>
    <script type="module" crossorigin src="../assets/index.9148c794.js"></script>
    <link rel="stylesheet" href="../glider.min.css" />
    <link rel="stylesheet" href="../assets/index.b247ee62.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="bg-whiteg text-pureblk">
    <header class="bg-third p-4 shadow-xl">
      <div class="container mx-auto flex items-center justify-around">
        <div class="logo">
          <a href="#" class="font-sansita text-4xl text-whiteg">Asphodel</a>
        </div>
        <div
          class="header-links hidden absolute flex-col text-whiteg font-sansita text-lg top-16 right-0 left-0 bg-third shadow-xl text-center p-8 gap-8 font-bold items-center z-20 md:flex md:flex-row md:static md:shadow-none md:z-0"
          role="menubar"
        >
          <a href="" role="menuitem" class="">Home</a>
          <a href="#about" role="menuitem" class="">About</a>
          <a
            href="#shop"
            role="menuitem"
            class="bg-primary px-8 py-2 text-third rounded-md shadow-xl md:shadow-none md:text-whiteg md:bg-third md:px-0 md:py-0"
            >Shop</a
          >
        </div>
        <div class="nav-icon flex text-whiteg items-center gap-4">
          <button id="menu-btn" class="md:hidden" aria-expanded="false">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
          <button id="cart-btn" aria-expanded="false">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
          <a class="btn btn-danger" style="font-weight: bold;" href="logout.php">Logout</a>
        </div>
      </div>
    </header>
    <!-- cart drawer -->
    <div
      class="cart-drawer hidden fixed flex-col justify-start top-0 right-0 text-pureblk h-full w-full z-20 bg-whiteg p-8 md:max-w-[30vw]"
      role="cartdrawer"
    >
      <div class="cart-heading flex justify-between items-center">
        <h3 class="text-4xl font-sansita">Your Cart</h3>
        <button id="xbtn">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8 w-8"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
      </div>
      <div class="cart flex flex-col justify-between h-full py-8">
        <ul class="cart-list space-y-4 overflow-scroll h-full">
            <?php
            if(isset($_SESSION['cart'])){
                $result = $database->getData();
                $product_id = array_column($_SESSION['cart'], 'product_id');

              while($row = mysqli_fetch_assoc($result)){
                foreach ($product_id as $id) {
                  if($row['id'] == $id){
                    cartItem($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                  }
                }
                }
              }
            ?>
        </ul>
        <form>
        <div class="btn">
          <button type="submit"
            class="bg-third w-full text-2xl text-whiteg font-sansita rounded-xl py-4"
          >
            CHECKOUT
          </button>
        </div>
      </form>
      </div>
    </div>
    <!-- cart drawer ending -->
    <!-- hero section -->
    <section
      class="relative bg-[url(./img/hero__img.jpg)] h-[100vh] bg-center bg-cover before:absolute before:bg-black/50 before:top-0 before:left-0 before:h-full before:w-full flex justify-center items-center md:justify-start"
    >
      <div
        class="relative space-y-8 flex flex-col flex-wrap text-center px-8 md:text-start md:mx-32"
      >
        <div class="space-y-2 md:max-w-[60%]">
          <h1 class="text-primary font-sansita text-6xl font-bold md:text-9xl">
            Asphodel
          </h1>
          <p class="text-whiteg text-base font-inter md:text-2xl">
            We offer excellent quality of plants as we source directly from
            top-rated plant experts, so we guarantee to sell only the finest
            quality plants at the very best prices and our plants are delivered
            straight to your doorstep.
          </p>
        </div>
        <div>
          <a
            href=""
            class="font-sansita text-lg bg-primary px-8 py-2 text-third rounded-md shadow-xl md:text-2xl hover:text-[1.6rem] hover:bg-third hover:text-whiteg"
            >SEE MORE</a
          >
        </div>
      </div>
    </section>
    <!-- hero section end -->
    <!--  everything section start-->
    <section class="everything py-16 px-8 md:py-32 md:px-32">
      <div class="flex flex-col gap-8 items-center md:flex-row">
        <div class="space-y-8 md:max-w-[45%]">
          <h3 class="text-third font-sansita text-4xl font-bold md:text-8xl">
            Everything Is Simple With Plants
          </h3>
          <p
            class="font-inter text-base whitespace-normal text-justify leading-relaxed md:text-lg"
          >
            Our mission is to introduce indoor planting that will help you feel
            connected with nature right in your home. Also we wanted to make
            gardening easy and fun for everyone. We in Business Name believed in
            creating art that focuse on natural beauty.
          </p>
        </div>
        <div>
          <img
            src="../assets/everything__section.be33034b.jpg"
            alt=""
            class="h-full min-w-full drop-shadow-2xl rounded-sm"
          />
        </div>
      </div>
    </section>
    <!-- everything section end -->
    <!-- featured plants start -->
    <section id="shop">
      <div class="py-16 px-8 md:py-32 md:px-32">
        <div class="headings flex flex-col justify-center items-center gap-2">
          <h3 class="font-sansita text-third text-4xl font-bold md:text-8xl">
            Available Plants
          </h3>
        </div>
        <div class="mt-8 md:mt-16">
          <div class="glider-contain relative">
            <!-- arrow left -->
            <button aria-label="Previous" class="glider-prev">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 bg-primary text-third"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
            <div class="glider">
              
              <?php 

              $result = $database->getData();

              while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'], $row['product_price'], $row['product_description'],$row['product_image'], $row['id']);
                }
              ?>
              </div>

              <!-- container end -->
              <button aria-label="Next" class="glider-next">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 bg-primary text-third"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
            </div>
            <!-- arrow right -->
          </div>
        </div>
      </div>
    </section>
    <!-- featured plants end -->
    <!-- about us -->
    <section id="about" class="everything py-16 px-8 md:py-32 md:px-32">
      <div class="flex flex-col gap-8 items-center md:flex-row">
        <div>
          <img
            src="../assets/everything__section.be33034b.jpg"
            alt=""
            class="h-full min-w-full drop-shadow-2xl rounded-md"
          />
        </div>
        <div class="space-y-8 md:max-w-[50%]">
          <h3 class="text-third font-sansita text-4xl font-bold md:text-8xl">
            About Us
          </h3>
          <p
            class="font-inter text-base whitespace-normal text-justify leading-relaxed md:text-lg"
          >
            Asphodel was founded in 2022 by our founder Jobert Eewan. The
            Asphodel was established for the reason of strengthening your
            relationship with plants. Because we believed that not only do
            plants can instantly beautify a space/your home but they can also
            boost your mood.
          </p>
        </div>
      </div>
    </section>
    <!-- about us ending -->
    <!-- footer -->
    <section class="bg-third text-whiteg p-8 md:py-16 md:px-32">
      <div class="grid grid-cols-1 gap-y-4 md:grid-cols-2">
        <div class="grid grid-cols-1 gap-y-2 md:grid-cols-3 md:gap-x-8">
          <div class="font-semibold">
            <div class="uppercase text-whiteg/80">company</div>
            <div class="font-inter text-sm mt-2">
              <ul class="space-y-2">
                <hr />
                <li>About</li>
                <li>Mission</li>
                <li>Shop</li>
              </ul>
            </div>
          </div>
          <div class="font-semibold">
            <div class="uppercase text-whiteg/80">support</div>
            <div class="font-inter text-sm mt-2">
              <ul class="space-y-2">
                <hr />
                <li>Help + FAQs</li>
                <li>Shipping</li>
                <li>Returns</li>
                <li>Contact Support</li>
              </ul>
            </div>
          </div>
          <div class="font-semibold">
            <div class="uppercase text-whiteg/80">plant questions</div>
            <div class="font-inter text-sm mt-2">
              <ul class="space-y-2">
                <hr />
                <li>Plant Care Tips</li>
                <li>Asphodel Location</li>
                <li>Contact Thee Grow-How Team</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer_logo flex md:items-center md:justify-center">
          <a href="" class="text-7xl font-sansita font-bold md:text-8xl"
            >Asphodel</a
          >
        </div>
      </div>
    </section>
    <!-- footer ending -->

    <script src="../glider.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  </body>
</html>
