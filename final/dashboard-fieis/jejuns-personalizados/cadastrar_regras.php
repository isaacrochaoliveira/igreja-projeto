<?php

require_once('../../conexao.php');


$id_jejum = addslashes($_POST['id_jejumCadRegras']);
if (empty($id_jejum)) {
	$id_jejum = addslashes($_POST['id_jejumRegras']);
}
$_1 = addslashes($_POST['_1']);
$_2 = addslashes($_POST['_2']);
$_3 = addslashes($_POST['_3']);
$_4 = addslashes($_POST['_4']);
$_5 = addslashes($_POST['_5']);
$_6 = addslashes($_POST['_6']);
$_7 = addslashes($_POST['_7']); 
$_8 = addslashes($_POST['_8']);
$_9 = addslashes($_POST['_9']);
$_10 = addslashes($_POST['_10']);

$cont = 1;

if (!(empty($_1))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_1']))) {
		$r_1 = $pdo->prepare("INSERT INTO regras_jejum SET _1 = :_1, _id_regras_jejum = :id_jejum");
		$r_1->bindValue(':_1', $_1);
		$r_1->bindValue(':id_jejum', $id_jejum);
		if ($r_1->execute()) {
			echo 2;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_1 = $pdo->prepare("UPDATE regras_jejum SET _1 = :_1 WHERE _id_regras_jejum = :id_jejum");
		$r_1->bindValue(':_1', $_1);
		$r_1->bindValue(':id_jejum', $id_jejum);
		if (!($r_1->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_2))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_2']))) {
		$r_2 = $pdo->prepare("UPDATE regras_jejum SET _2 = :_2 WHERE _id_regras_jejum = :id_jejum");
		$r_2->bindValue(':_2', $_2);
		$r_2->bindValue(':id_jejum', $id_jejum);
		if ($r_2->execute()) {
			echo 3;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_2 = $pdo->prepare("UPDATE regras_jejum SET _2 = :_2 WHERE _id_regras_jejum = :id_jejum");
		$r_2->bindValue(':_2', $_2);
		$r_2->bindValue(':id_jejum', $id_jejum);
		if (!($r_2->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_3))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_3']))) {
		$r_3 = $pdo->prepare("UPDATE regras_jejum SET _3 = :_3 WHERE _id_regras_jejum = :id_jejum");
		$r_3->bindValue(':_3', $_3);
		$r_3->bindValue(':id_jejum', $id_jejum);
		if ($r_3->execute()) {
			echo 4;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_3 = $pdo->prepare("UPDATE regras_jejum SET _3 = :_3 WHERE _id_regras_jejum = :id_jejum");
		$r_3->bindValue(':_3', $_3);
		$r_3->bindValue(':id_jejum', $id_jejum);
		if (!($r_3->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_4))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_4']))) {
		$r_4 = $pdo->prepare("UPDATE regras_jejum SET _4 = :_4 WHERE _id_regras_jejum = :id_jejum");
		$r_4->bindValue(':_4', $_4);
		$r_4->bindValue(':id_jejum', $id_jejum);
		if ($r_4->execute()) {
			echo 5;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_4 = $pdo->prepare("UPDATE regras_jejum SET _4 = :_4 WHERE _id_regras_jejum = :id_jejum");
		$r_4->bindValue(':_4', $_4);
		$r_4->bindValue(':id_jejum', $id_jejum);
		if (!($r_4->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_5))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_5']))) {
		$r_5 = $pdo->prepare("UPDATE regras_jejum SET _5 = :_5 WHERE _id_regras_jejum = :id_jejum");
		$r_5->bindValue(':_5', $_5);
		$r_5->bindValue(':id_jejum', $id_jejum);
		if ($r_5->execute()) {
			echo 6;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_5 = $pdo->prepare("UPDATE regras_jejum SET _5 = :_5 WHERE _id_regras_jejum = :id_jejum");
		$r_5->bindValue(':_5', $_5);
		$r_5->bindValue(':id_jejum', $id_jejum);
		if (!($r_5->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_6))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_6']))) {
		$r_6 = $pdo->prepare("UPDATE regras_jejum SET _6 = :_6 WHERE _id_regras_jejum = :id_jejum");
		$r_6->bindValue(':_6', $_6);
		$r_6->bindValue(':id_jejum', $id_jejum);
		if ($r_6->execute()) {
			echo 7;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_6 = $pdo->prepare("UPDATE regras_jejum SET _6 = :_6 WHERE _id_regras_jejum = :id_jejum");
		$r_6->bindValue(':_6', $_6);
		$r_6->bindValue(':id_jejum', $id_jejum);
		if (!($r_6->execute())) {
			echo "Errado!";
		}	
	}
}
if (!(empty($_7))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_7']))) {
		$r_7 = $pdo->prepare("UPDATE regras_jejum SET _7 = :_7 WHERE _id_regras_jejum = :id_jejum");
		$r_7->bindValue(':_7', $_7);
		$r_7->bindValue(':id_jejum', $id_jejum);
		if ($r_7->execute()) {
			echo 8;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_7 = $pdo->prepare("UPDATE regras_jejum SET _7 = :_7 WHERE _id_regras_jejum = :id_jejum");
		$r_7->bindValue(':_7', $_7);
		$r_7->bindValue(':id_jejum', $id_jejum);
		if (!($r_7->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_8))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_8']))) {
		$r_8 = $pdo->prepare("UPDATE regras_jejum SET _8 = :_8 WHERE _id_regras_jejum = :id_jejum");
		$r_8->bindValue(':_8', $_8);
		$r_8->bindValue(':id_jejum', $id_jejum);
		if ($r_8->execute()) {
			echo 9;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_8 = $pdo->prepare("UPDATE regras_jejum SET _8 = :_8 WHERE _id_regras_jejum = :id_jejum");
		$r_8->bindValue(':_8', $_8);
		$r_8->bindValue(':id_jejum', $id_jejum);
		if (!($r_8->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_9))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_9']))) {
		$r_9 = $pdo->prepare("UPDATE regras_jejum SET _9 = :_9 WHERE _id_regras_jejum = :id_jejum");
		$r_9->bindValue(':_9', $_9);
		$r_9->bindValue(':id_jejum', $id_jejum);
		if ($r_9->execute()) {
			echo 10;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_9 = $pdo->prepare("UPDATE regras_jejum SET _9 = :_9 WHERE _id_regras_jejum = :id_jejum");
		$r_9->bindValue(':_9', $_9);
		$r_9->bindValue(':id_jejum', $id_jejum);
		if (!($r_9->execute())) {
			echo "Errado!";
		}
	}
}
if (!(empty($_10))) {
	$query = $pdo->query("SELECT * FROM regras_jejum WHERE _id_regras_jejum = '$id_jejum'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if (!(isset($res[0]['_10']))) {
		$r_10 = $pdo->prepare("UPDATE regras_jejum SET _10 = :_10 WHERE _id_regras_jejum = :id_jejum");
		$r_10->bindValue(':_10', $_10);
		$r_10->bindValue(':id_jejum', $id_jejum);
		if ($r_10->execute()) {
			echo 11;
			exit();
		} else {
			echo "Errado!";
			exit();
		}
	} else {
		$r_10 = $pdo->prepare("UPDATE regras_jejum SET _10 = :_10 WHERE _id_regras_jejum = :id_jejum");
		$r_10->bindValue(':_10', $_10);
		$r_10->bindValue(':id_jejum', $id_jejum);
		if (!($r_10->execute())) {
			echo "Errado!";
		}
	}
}
echo "$_1!@#$_2!@#$_3!@#$_4!@#$_5!@#$_6!@#$_7!@#$_8!@#$_9!@#$_10";