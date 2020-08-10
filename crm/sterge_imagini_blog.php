<?php include("../__connect.php");

if(is_numeric($_GET['id'])) {

    if(is_numeric($_POST['imagine_principala'])) {

        $reset_query = "UPDATE `imagini_noutati` SET `imagine_principala` = 0 WHERE `id_noutate` = " . $_GET['id'];
        mysqli_query($link, $reset_query);
        
        $update_query = "UPDATE `imagini_noutati` SET `imagine_principala` = 1 WHERE `id_imagine` = " . $_POST['imagine_principala'];
        mysqli_query($link, $update_query);
        
    }


    foreach($_POST['galerie'] as $imagine_noutate_id) {

        if(is_numeric($imagine_noutate_id)) {

            $select_imagine_query="SELECT * FROM `imagini_noutati` WHERE `id_imagine` = " . $imagine_noutate_id;
            $select_imagine = mysqli_query($link, $select_imagine_query);
            $imagine = mysqli_fetch_array($select_imagine);

            unlink(dirname( __FILE__ ) . '/../images/blog/' . $imagine['imagine']);

            $delete_query = "DELETE FROM `imagini_noutati` WHERE `id_imagine` = " . $imagine_noutate_id;

            mysqli_query($link, $delete_query);

        }

    }
    
    header("Location: modifica_blog.php?id=" . $_GET['id']);
    exit;
   
}

header("Location: modifica_blog.php?id=" . $_GET['id']);
exit;


?>