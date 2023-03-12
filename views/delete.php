

<?php
include "../constant/itemType.php";
include "../Utils/init_include_template_util.php";
include "../helpers/GeneratorHelper.php";


$items=$_SESSION["items"]["deleted"];
?>

    <!-- ::put the (todo, completed, or archived) content here;; -->
    <div class="bg-gray-100 space-y-12 py-10 rounded-2xl">
        <div>
            <form action="home.php" method="POST">
                <button class="text-sm bg-green-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-green-500 duration-500">
                    Home Page
                </button>
            </form>
            <h3 class="text-3xl text-center font-source-code-pro">

                Archived items
            </h3>

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
        <div class="container mx-auto">
            <!-- ::loop of items.deleted should start here;; -->

            <?php
            $index=1;
            foreach ($items as $id => $item){

            ?>
            <div class="bg-white my-4 max-w-sm mx-auto rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
                <div class="h-20 bg-red-500 flex items-center justify-start gap-3">
                    <h1 class="text-white ml-4 border-2 py-2 px-4 rounded-full">
                        <!-- {$index} -->
                        <?php

                        echo $index++;
                        ?>
                    </h1>
                    <p class="mr-20 text-white text-lg">
                        <!-- {$title} -->
                        <?php
                        echo $item["title"];

                        ?>
                    </p>
                </div>

                <p class="py-6 text-lg tracking-wide px-4 flex items-center gap-2 text-red-800">
                    <!-- {$description} -->
                    <?php
                    echo $item["description"];
                    ?>
                </p>

                <div>
                    <!-- ::if the items.deleted `deleted_from` is todo;; -->
                    <?php
                    if ($item["deleted_from"]==ItemType::TODO){

                    ?>
                    <form action="../action/recover_item_action.php" method="POST">
                        <!-- {$id} -->
                        <input hidden name="item_id" value=<?php echo $id ?>>
                        <input hidden name="recover_to" value=<?php echo ItemType::TODO?> />
                        <button type="submit" class="text-sm bg-purple-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-purple-500 duration-500">
                            Recover
                        </button>
                    </form>
                    <?php
                    }
                    ?>

                    <!-- ::if the items.deleted `deleted_from` is completed;; -->
                    <?php
                    if ($item["deleted_from"]==ItemType::COMPLETED){

                    ?>
                    <form action="../action/recover_item_action.php" method="POST">
                        <!-- {$id} -->
                        <input hidden name="item_id" value=<?php echo $id ?>>
                        <input hidden name="recover_to" value=<?php echo ItemType::COMPLETED ?>>
                        <button class="text-sm bg-green-500 text-white px-3 py-2 mx-4 rounded hover:bg-white hover:text-green-500 duration-500">
                            Recover
                        </button>
                    </form>
                    <?php

                    }
                    ?>
                </div>
                <!-- <hr > -->
                <div class="flex justify-between px-5 mb-2 text-sm text-gray-600">
                    <p>Deleted at</p>
                    <p>
                        <!-- {$deleted_at} -->
                        <?php

                        echo $item["deleted_at"];
                        ?>
                    </p>
                </div>
            </div>
            <!-- ::loop of items.deleted should end here;; -->
            <?php
            }
            ?>

        </div>
        </div>
<?php

include "../Utils/render_template_util.php";
?>