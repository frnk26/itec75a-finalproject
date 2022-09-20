<?php 

	function component($plantName, $plantPrice, $plantDescript, $plantImg, $productId){
		$element ='<div
                class="max-w-md mx-4 bg-third rounded-xl shadow-md overflow-hidden md:max-w-2xl text-whiteg"
              >
              <form method="POST" action="index1.php">
                <div class="md:flex">
                  <div class="md:shrink-0">
                    <img
                      class="h-48 w-full object-cover md:h-full md:w-48"
                      src="'.$plantImg.'"
                      alt="Man looking at item at a store"
                    />
                  </div>
                  <div class="p-8">
                    <div class="uppercase tracking-wide text-sm font-semibold">
                      '.$plantName.'
                    </div>
                    <p class="mt-2">
                      ₱'.$plantPrice.'
                    </p>
                    <p class="mt-2">
                      '.$plantDescript.'
                    </p>
                    <button type="submit"
                      class="font-sansita text-lg bg-primary px-8 py-2 text-third mt-2 rounded-md shadow-lg"
                    name="add">
                      Buy now
                    </button>
                    <input type="hidden" name="product_id" value="'.$productId.'"></input>
                  </div>
                </div>
                </form>
              </div>';
		echo $element;
	};


function cartItem($plantName, $plantPrice, $plantImg, $productId){
	$cartElement = '
	<form action="index1.php?action=remove&id='.$productId.'" method="POST">
  <div
    class="max-w-full bg-third rounded-xl shadow-md overflow-hidden md:max-w-2xl text-whiteg"
    role="cartitem">
    <div class="flex">
    <div class="max-w-[30%] max-h-full">
      <img
        class="h-full w-full object-cover md:h-full md:w-full"
        src="'.$plantImg.'"
        alt="Man looking at item at a store"
      />
    </div>
    <div class="py-8 px-4 space-y-4 w-full">
      <div
        class="uppercase tracking-wide text-xs font-semibold flex justify-between"
      >
        <div>'.$plantName.'</div>
        <span>₱'.$plantPrice.'</span>
      </div>
      <div class="flex justify-between items-center">
        <div class="text-pureblk">
          <input
            type="number"
            min="1"
            step="1"
            value="1"
            pattern="[0-9]*"
            class="bg-primary w-16 text-center rounded-sm"
          />
        </div>
        <button class="uppercase font-semibold" name="remove">Remove</button>
      </div>
    </div>
  </div>
  </div>
  </form>';

	echo $cartElement;
};
