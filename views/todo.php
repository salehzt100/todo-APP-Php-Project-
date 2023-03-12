<?php
include "../constant/itemType.php";
include "../Utils/init_include_template_util.php";
include "../helpers/GeneratorHelper.php";
?>



    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
        <div>
            <form action="home.php" method="POST">
                <button class="text-sm bg-green-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-green-500 duration-500">
                    Home Page
                </button>
            </form>
            <h3 class="text-3xl text-center font-source-code-pro"> Todo items </h3>
            <!-- ::if statement start here to show this message once;; -->
            <?php if (key_exists('message', $_SESSION)) { ?>

            <div class="bg-purple-500 my-8 py-4 font-source-code-pro text-lg text-white text-center">
                <!-- {$redirect_message} -->
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
            <!-- ::if statement end here to show this message once;; -->
            <?php } ?>
        </div>
        <!-- to-do item element -->
        <div class="container flex justify-center gap-16">
            <div class="w-80 border-r border-r-2 pr-4 border-purple-500">
                <form action="../action/insert_todo_action.php" method="post">
                    <div class="mb-6">
                        <label for="title"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                        <input type="text" id="title" name="title"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="i have to .." required="">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                        <input type="text" id="description" name="description"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="i have to more details" required="">
                    </div>
                    <button type="submit"
                            class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>

            </div>
            <div>
                <div class="w-80 mb-6">
                    <!-- ::loop of items.todo should start here;; -->
                    <?php
                    $index=1;
                    $items=$_SESSION["items"]["todo"] ;
                    foreach ($items as  $id=> $item){

                    ?>
                    <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                        <div class="h-20 bg-purple-500 flex items-center justify-start gap-3">
                            <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                                <!-- {$index} -->
                                <?php

                                echo $index++;
                                ?>

                            </h1>
                            <p class="mr-20 text-white text-lg">
                                <!-- {$title} -->

                                <?php
                                echo $item["title"] ;
                                ?>


                            </p>
                        </div>
                        <form action="../action/assign_todo_item_as_completed_action.php"
                              method="post" id="todo-item-<?php echo $id; ?>"
                              class="my-0 flex items-center px-4 gap-3">
                                <span class=''>
                                  <input hidden name="item_id" value="<?php echo $id; ?>">
                                  <input type="checkbox"
                                         onclick="document.getElementById('todo-item-<?php echo $id; ?>').submit()"
                                         class='h-6 w-6 bg-white checked:scale-75 transition-all duration-200 peer'/>
                                </span>
                            <p class="py-6 text-lg tracking-wide gap-2 text-purple-800">
                                <!-- {$description} -->

                                <?php

                                echo $item["description"];
                                ?>
                            </p>
                        </form>


                        <form action="../action/assign_item_as_deleted_action.php" method="post">
                            <input hidden name="item_id" value="<?php  echo $id?>">

                            <input hidden name="delete_from" value=<?php echo ItemType::TODO;?>>
                            <button type="submit"
                                    class="text-sm bg-red-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-red-500 duration-500">
                                Delete
                            </button>
                        </form>
                        <div class="flex justify-between px-5 my-4 text-sm text-gray-600">
                            <p>Created at</p>
                            <p>
                                <!-- {$created_at} -->
                                <?php


                                echo $item["created_at"]
                                ?>
                            </p>
                        </div>
                    </div>
                    <!-- ::loop of items.todo should end here;; -->

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php

include "../Utils/render_template_util.php";

?>
