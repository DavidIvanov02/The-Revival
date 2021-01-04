<?php

error_reporting(E_ALL);
ini_set("display_error",1);

class DB
{
    //Construct
    public function __construct($dbopts)
    {
        $attributes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
        $this->pdo = new PDO("mysql:host=" . $dbopts['DB_host'] . ";dbname=" . $dbopts['DB_name'], $dbopts['DB_user'], $dbopts['DB_pass'], $attributes);
    }

    //User_Functions

    public function getUser($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email`=:email AND `password`=:password";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":password", $password, PDO::PARAM_STR);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
    }

    public function insertUser($first_name,$last_name,$email,$password,$token)
    {
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`,`access_token`) VALUES (:first_name, :last_name, :email, :password, :access_token)";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":first_name",$first_name, PDO::PARAM_STR);
        $query->bindValue(":last_name",$last_name, PDO::PARAM_STR);
        $query->bindValue(":email",$email, PDO::PARAM_STR);
        $query->bindValue(":password",$password, PDO::PARAM_STR);
        $query->bindValue(":access_token",$token, PDO::PARAM_STR);
        $query->execute();

        return $this->pdo->lastInsertId();
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM `users` WHERE `user_id`=:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
    }

    public function getUserByToken($token){
        $sql = "SELECT * FROM `users` WHERE `access_token`=:access_token";

        $query = $this->pdo->prepare($sql);
        $query->bindValue("access_token", $token);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        
        return false;
    }

    public function checkEmail($email)
    {
        $sql = "SELECT * FROM `users` WHERE `email`=:email";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
    }

    public function setPosition($user_id, $position_x, $position_z, $position_y, $island){
        $sql = "UPDATE `users` SET `position_x`=:position_x,`position_z`=:position_z, `position_y`=:position_y, `island`=:island WHERE `user_id`=:user_id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":position_x", $position_x);
        $query->bindValue(":position_z", $position_z);
        $query->bindValue(":position_y", $position_y);
        $query->bindValue(":island", $island);
        $query->bindValue(":user_id", $user_id);
        $query->execute();
        return ($query->rowCount() > 0 ? true : false);
    }
    
    //Admin_Functions
    
    public function getAdmin($email, $password)
    {
        $sql = "SELECT * FROM `admins` WHERE `email`=:email AND `password`=:password";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":password", $password, PDO::PARAM_STR);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        
        return false;
    }
    
    public function getAdminByToken($token){
        $sql = "SELECT * FROM `admins` WHERE `access_token`=:access_token";

        $query = $this->pdo->prepare($sql);
        $query->bindValue("access_token", $token);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }
    
    //Heroes

    public function getHero($hero_id){
        $sql = "SELECT * FROM `heroes` WHERE `hero_id`=:hero_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue("hero_id", $hero_id);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getAllHeroes()
    {
        $sql = "SELECT * FROM `heroes` ";


        $query = $this->pdo->prepare($sql);
        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function setHero($user_id, $hero_id){
        $sql = "UPDATE `users` SET `selected_hero`=:hero_id WHERE `user_id`=:user_id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue("hero_id", $hero_id);
        $query->bindValue("user_id", $user_id);
        $query->execute();
        return ($query->rowCount() > 0 ? true : false);
    }

    public function getSpellsForHero($hero_id)
    {
        $sql = "SELECT * FROM spells INNER JOIN spell_heroes ON spell_heroes.`spell_id` = spells.`spell_id` WHERE spell_heroes.`hero_id` = $hero_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":hero_id", $hero_id);
        $query->execute();
        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    //Missions

    public function getMission($mission_id){
        $sql = "SELECT * FROM `missions` WHERE `mission_id`=:mission_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":mission_id", $mission_id);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getAllMissions()
    {
        $sql = "SELECT * FROM `missions`";

        $query = $this->pdo->prepare($sql);
        $query->execute();

        $result_array = $query->fetchAll();

        if(count($result_array) > 0) return $result_array;
        return false;
    }

    public function insertMissionByUser($mission_id, $user_id)
    {
        $sql = "INSERT INTO `mission_done` (mission_id, user_id) VALUES (:mission_id, :user_id)";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":mission_id",$mission_id);
        $query->bindValue(":user_id",$user_id);

        $query->execute();

        return ($query->rowCount() > 0 ? true : false);
    }

    public function getMissionsDone($user_id)
    {
        $sql = "SELECT * FROM mission_done INNER JOIN missions ON mission_done.`mission_id` = missions.`mission_id` WHERE mission_done.`user_id`=$user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id);

        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function missionsCompleted($user_id)
    {
        $sql = "SELECT COUNT(mission_id) as count FROM mission_done WHERE user_id =:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function deleteCompletedMissions($user_id)
    {
        $sql = "DELETE FROM mission_done WHERE user_id = :user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    //Items

    public function getItem($item_id){
        $sql = "SELECT * FROM `items` WHERE `item_id`=:item_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":item_id",$item_id);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function insertItemByUser($item_id, $user_id)
    {
        $sql = "INSERT INTO `item_ownership` (item_id, user_id) VALUES (:item_id, :user_id)";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":item_id",$item_id);
        $query->bindValue(":user_id",$user_id);

        $query->execute();

        return ($query->rowCount() > 0 ? true : false);
    }

    public function getAllItems()
    {
        $sql = "SELECT * FROM `items` ";

        $query = $this->pdo->prepare($sql);
        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getItemsByPurchase($user_id)
    {
        $sql = "SELECT * FROM item_ownership INNER JOIN items ON item_ownership.`item_id` = items.`item_id` WHERE item_ownership.`user_id`=:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id);

        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function itemsPurchased($user_id)
    {
        $sql = "SELECT COUNT(item_id) as count FROM item_ownership WHERE user_id =:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getUserPurchase($user_id)
    {
        $sql = "SELECT item_id  FROM item_ownership WHERE `user_id` = :user_id";

        // $sql = "SELECT * FROM item_ownership INNER JOIN items ON item_ownership.`item_id` = items.`item_id` WHERE item_ownership.`user_id`=:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getItemOwnership($user_id, $item_id)
    {
        $sql = "SELECT item_id  FROM item_ownership WHERE `user_id` = :user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function deletePurchasedItems($user_id)
    {
        $sql = "DELETE FROM item_ownership WHERE user_id = :user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetchAll();

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function checkUserPurchase($item_id, $user_id)
    {
        $sql = "SELECT * FROM `item_ownership` WHERE `item_id`=:item_id AND `user_id`=:user_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":item_id", $item_id, PDO::PARAM_INT);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    //User_points

    public function setPoints($user_id, $user_points){
        $sql = "UPDATE `users` SET `user_points` = (`user_points` + :user_points) WHERE `user_id`=:user_id";
        $query = $this->pdo->prepare($sql);

        $query->bindValue(":user_points", $user_points);
        $query->bindValue(":user_id", $user_id);


        $query->execute();

        return ($query->rowCount() > 0 ? true : false);
    }

    public function decreasePoints($user_id, $item_price)
    {
        $sql = "UPDATE `users` SET `user_points` = (`user_points` - :item_price) WHERE `user_id`=:user_id";
        $query = $this->pdo->prepare($sql);

        $query->bindValue(":item_price", $item_price);
        $query->bindValue(":user_id", $user_id);

        $query->execute();

        return ($query->rowCount() > 0 ? true : false);
    }

    //News

    public function getAllNewsLimited($starting_point, $offset)
    {
        $sql = "SELECT * FROM `news` LIMIT :starting_point, :offset";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':starting_point', (int)$starting_point, PDO::PARAM_INT);
        $query->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $query->execute();

        $result_array = $query->fetchAll(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as cnt FROM `news`";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if (is_countable($result_array) && count($result_array) > 0) {
            return (int)$result_array['cnt'];
        }
        return false;
    }
    
    public function getNews($news_id){
        $sql = "SELECT * FROM `news` WHERE `news_id`=:news_id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(":news_id",$news_id);
        $query->execute();
        $result_array = $query->fetch(PDO::FETCH_ASSOC);

        if(is_countable($result_array) && count($result_array) > 0){
            return $result_array;
        }
        return false;
    }
    
    public function insertNews($news_name,$news_shortDesc,$news_longDesc, $news_img)
    {
        $sql = "INSERT INTO `news` (`news_name`, `news_shortDesc`, `news_longDesc`, `news_img`) VALUES (:news_name, :news_shortDesc, :news_longDesc, :news_img)";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":news_name",$news_name, PDO::PARAM_STR);
        $query->bindValue(":news_shortDesc",$news_shortDesc, PDO::PARAM_STR);
        $query->bindValue(":news_longDesc",$news_longDesc, PDO::PARAM_STR);
        $query->bindValue(":news_img",$news_img, PDO::PARAM_STR);
        $query->execute();

        return $this->pdo->lastInsertId();
    }
    
}

?>