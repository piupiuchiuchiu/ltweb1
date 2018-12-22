<?php 
function FindUserbyID($id)
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM users WHERE id=? LIMIT 1");
	$stmt->execute(array($id));
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	return $user;
}
function FindUserbyEmail($email)
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
	$stmt->execute(array($email));
	$email = $stmt->fetch(PDO::FETCH_ASSOC);
	return $email;
}
function FindAllPosts()
{
	global $db;
	$stmt = $db->prepare("SELECT p.*, u.fullname FROM posts AS p LEFT JOIN users AS u ON u.id = p.userId ORDER BY createdAt DESC");
	$stmt->execute();
	$posts = $stmt->fetchALL(PDO::FETCH_ASSOC);
	return $posts;
}
function createUser($email, $fullname, $passwordHash, $phonenumber, $sex, $created_date)
{
	global $db;
	$stmt = $db->prepare("INSERT INTO users(email, fullname, password, phonenumber, sex, created_date) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->execute(array($email, $fullname, $passwordHash, $phonenumber, $sex, $created_date));
	return $db->lastInsertID();
}
function changepwd($email, $n_pwd_Hash)
{
	global $db;
	$stmt = $db->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->execute(array($n_pwd_Hash, $email));
    return $db->lastInsertId();
}
function createpost($content, $id, $time)
{
	global $db;
    $stmt = $db->prepare("INSERT INTO posts(content, userId, createdAt) VALUES (?, ?, ?)");
    $stmt->execute(array($content, $id, $time));
    return $db->lastInsertId();
}
function updateprofile($fullname, $phonenumber, $sex, $email)
{
	global $db;
	$stmt = $db->prepare("UPDATE users SET fullname = ?, phonenumber = ?, sex = ? WHERE email = ?");
	$stmt -> execute(array($fullname, $phonenumber, $sex, $email));
    return $db->lastInsertId();
}
function findcomment()
{
	global $db;
	$stmt = $db->prepare("SELECT c.* FROM commet AS c LEFT JOIN posts AS p ON p.id = c.userID ORDER BY createdAt DESC LIMIT 3");
	$stmt->execute();
	$comments = $stmt->fetch(PDO::FETCH_ASSOC);
	return $comments;
}
function createComment($name, $postID, $comment)
{
	global $db;
    $stmt = $db->prepare("INSERT INTO comment(fullname, postID, content) VALUES (?, ?, ?)");
    $stmt->execute(array($name, $postID, $comment));
    return $db->lastInsertId();
}
?>

