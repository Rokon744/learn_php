<nav class="bg-white border-b border-gray-200 fixed w-full z-20 top-0 start-0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="./" class="flex items-center space-x-3">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Logo" />
      <span class="text-xl font-semibold">MySite</span>
    </a>

    <button data-collapse-toggle="navbar-main" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100">
      <span class="sr-only">Open menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-main">
      <ul class="font-medium flex flex-col md:items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li><a href="./" class="block py-2 px-3 text-blue-700 md:p-0">Home</a></li>

        <?php
        if ($_SESSION['user']['username']) { ?>
          <li><a href="./server/requests.php?logout=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">Logout (<?php echo $_SESSION['user']['username'] ?>)</a></li>
          <li><a href="./?askquestion=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">Ask A Question</a></li>
          <li><a href="./?my-question=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">My Question</a></li>
        <?php   } ?>

        <?php
        if (!$_SESSION['user']['username']) { ?>
          <li><a href="?login=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">Login</a></li>
          <li><a href="?signup=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">Sign Up</a></li>
        <?php   } ?>

        <li><a href="./?latest-question=true" class="block py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:text-blue-700 md:p-0">Latest Question</a></li>
        <form action="" method="get">
          <input type="text" name="search" placeholder="search questions">
          <button class="px-6 py-2 rounded-sm bg-blue-800 text-white" type="submit">Search</button>
        </form>
      </ul>
    </div>
  </div>
</nav>